<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\MembreController;
use App\Models\Daret;
use App\Models\Membre;
use App\Http\Requests\StoreDaretRequest;
use App\Http\Requests\UpdateDaretRequest;
use App\Models\Tour;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\SupportMessage;


class DaretController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = Auth::user();
        $darets = Daret::whereNotIn('id', function ($query) use ($user) {
            $query->select('Daret_id')
                ->from('membres')
                ->where('user_id', $user->id);
        })->get();

        return view('daret.home', compact('darets', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('daret.create');
    }
    public function daret(User $user)
    {

        $user = Auth::user();

        $membres = $user->membres;

        return view('daret.Mydaret', compact('membres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'montant' => 'required|numeric',
            'nbr_per' => 'required|integer|min:2',
            'type_periode' => 'required|in:week,month',
            'type_order' => 'required|in:manually,random',
        ]);



        $daret = Daret::create([
            'name' => $request->nom,
            'montant' => $request->montant,
            'nbr_membre' => $request->nbr_per,
            'type_ordre' => $request->type_order,
            'type_periode' => $request->type_periode,
            'nbr_tour' => $request->nbr_per,

            'etat' => 0,
            'periode_ac' => 0,

        ]);

        Membre::create([
            'daret_id' => $daret->id,
            'role' => 'admin',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('my_daret', Auth::id())->with('success', 'your daret successfully added ');
    }

    /**
     * Display the specified resource.
     */

    public static  function adduser(Daret $daret, User $user)
    {

        $check = null;

        if ($daret->nbr_membre == $daret->membre->count()) {
            $check = 1;
        }


        if ($daret->demandes) {

            foreach ($daret->demandes as $demande) {
                if ($demande->user_id == $user->id) {

                    $demande->delete();
                }
            }
        }


        if ($daret->invitations) {
            foreach ($daret->invitations as $invitations) {
                if ($invitations->user_id == $user->id) {
                    $invitations->delete();
                }
            }
        }


        foreach ($daret->membre as $membre) {
            if ($membre->user_id == $user->id) {
                $check = 2;
                return $check;
            }
        }


        if ($check == null) {
            $membre = membre::create([
                'user_id' => $user->id,
                'daret_id' => $daret->id,
                'role' => 'user'
            ]);
        }
        return $check;
    }

    function tours(Membre $membre, Request $request)
    {

        $selects = [];
        foreach ($membre->daret->membre as $key => $sub) {
            $name = 'select-' . $key;
            $selects[$key] = $request->input($name);

            if ($selects[$key] == null) {
                return redirect()->back()->with('msgerror', 'select');
            }
        }


        $values = [];
        foreach ($request->all() as $key => $value) {

            if (strpos($key, 'select-') === 0) {
                $values[$key] = $value;
                if ($values[$key] == null) {
                }
            }
        }

        foreach ($membre->daret->membre as  $key => $member) {
            $tour['membre_id'] = $member->id;
            $tour['etat'] = "not_taked";

            $his_tour = $values['select-' . $key];
            $tour['nbr'] = $his_tour;
            Tour::create($tour);

            for ($i = 1; $i <= $membre->daret->nbr_tour; $i++) {
                if ($i != $his_tour) {
                    $tour1['membre_id'] = $member->id;
                    $tour1['etat'] = "not_payed";
                    $tour1['nbr'] = $i;

                    Tour::create($tour1);
                }
            }
        }
        return
            redirect()->back()->with('msg', 'your tours successfully added');
    }
    function toursrandom(Membre $membre)
    {
        $nbr = $membre->daret->nbr_tour; // the number of elements
        $arr = []; // initialize an empty array
        for ($i = 1; $i <= $nbr; $i++) {
            $arr[] = $i; // add each number to the array
        }


        foreach ($membre->daret->membre as $member) {
            $tour['membre_id'] = $member->id;
            $tour['etat'] = "not_taked";
            $randomKey = array_rand($arr);
            $his_tour = $arr[$randomKey];
            $tour['nbr'] = $his_tour;
            unset($arr[$randomKey]);

            Tour::create($tour);

            for ($i = 1; $i <= $nbr; $i++) {
                if ($i != $his_tour) {
                    $tour1['membre_id'] = $member->id;
                    $tour1['etat'] = "not_payed";
                    $tour1['nbr'] = $i;
                    Tour::create($tour1);
                }
            }
        }
        return
            redirect()->route('show', $membre)->with('msg', 'your tours successfully added');
    }









    function start(Membre $membre)
    {
        if ($membre->daret->nbr_membre - $membre->daret->membre->count() == 0 && $membre->tours->count() != 0) {
            $membre->daret->update([
                'date_start' => now(),
                'etat' => 1,
                'curent_tour' => 1
            ]);

            if ($membre->daret->type_periode == 'week') {

                $date_final = Carbon::now()->addWeeks($membre->daret->nbr_tour);
            } else {

                $date_final = Carbon::now()->addMonths($membre->daret->nbr_tour);
            }
            $membre->daret->date_final = $date_final;
        }
        $membre->daret->save();
        return redirect()->route('show', $membre)->with('msg', 'your daret successfully started');
    }
    function updatetour(Tour $tour, membre $mem, $per)
    {
        $tours = $mem->tours()
            ->where('nbr', '<', $per)
            ->where('etat', 'not_payed')
            ->get();

        if ($tours->isEmpty() || $per == 1) {
            $tour->etat = 'payed';

            $tour->save();
            return back();
        } else {
            return back()->withErrors('virife first');
        }
    }
    function updatetourtake(Tour $tour, Membre $membre, $per)
    {
        $tourss = collect();
        $x = 1;
        $tours = $membre->tours()
            ->where('nbr', '<', $per)
            ->where('etat', 'not_payed')
            ->get();
        foreach ($membre->daret->membre as $mem) {
            $tourss = $tourss->merge($mem->tours->where('nbr', $per));
        }

        foreach ($tourss  as $t) {
            if ($t->etat == 'not_payed') {
                $x = 0;
            }
        }

        if ($x == 1 && $tours->isEmpty()) {

            $tour->update([
                'etat' => 'taked',
            ]);

            $tour->save();
            return  back();
        } else {
            return back()->withErrors(['msg' => 'error not payed']);
        }
    }

    public function destroy(Daret $daret)
    {
        $name = $daret->name;

        $membres = Membre::with('tours')->where('daret_id', $daret->id)->get();

        $hasTours = false;
        foreach ($membres as $membre) {
            if ($membre->tours->count() > 0) {
                $hasTours = true;
                break;
            }
        }

        if (!$hasTours) {
            $daret->delete();
            return redirect()->route('my_daret')->with('msg', 'Your Daret `' . $name . '` has been deleted.');
        } else {
            return back()->with('error', 'Cannot delete the Daret `' . $name . '` because it has associated tours.');
        }
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $membre  = Membre::with('daret')
            ->whereHas('daret', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('query') . '%');
            })
            ->where('user_id', Auth::id())
            ->get();


        return response()->json($membre);
    }

    public function searchdaretD(Request $request)
    {
        $query = $request->input('query');

        $user = Auth::user();
        $darets = Daret::whereNotIn('id', function ($query) use ($user) {
            $query->select('Daret_id')
                ->from('membres')
                ->where('user_id', $user->id);
        })
            ->where('name', 'like', '%' . $query . '%')
            ->get();

        return response()->json($darets);
    }


    public function sendEmail(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $title = $request->input('title');
        $description = $request->input('description');

        $userEmail = Auth::user()->email;

        Mail::to('eladnan871@gmail.com')->send(new SupportMessage($title, $description, $userEmail));

        return redirect()->back()->with('success', 'Le formulaire a été soumis avec succès !');
    }
}
