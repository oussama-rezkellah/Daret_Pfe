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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


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
        //dd($membres);
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
                return redirect()->route('show', $membre)->with('msgerror', 'select');
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
            $tour['tour'] = $his_tour;
            Tour::create($tour);

            for ($i = 1; $i <= $membre->daret->nbr_tour; $i++) {
                if ($i != $his_tour) {
                    $tour1['membre_id'] = $member->id;
                    $tour1['etat'] = "not_payed";
                    $tour1['tour'] = $i;

                    Tour::create($tour1);
                }
            }
        }
        return
            redirect()->route('show', $membre)->with('msg', 'your tours successfully added');
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
            $tour['tour'] = $his_tour;
            unset($arr[$randomKey]);

            Tour::create($tour);

            for ($i = 1; $i <= $nbr; $i++) {
                if ($i != $his_tour) {
                    $tour1['membre_id'] = $member->id;
                    $tour1['etat'] = "not_payed";
                    $tour1['tour'] = $i;
                    Tour::create($tour1);
                }
            }
        }
        return
            redirect()->route('show', $membre)->with('msg', 'your tours successfully added');
    }



    public function show(Daret $daret)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daret $daret)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDaretRequest $request, Daret $daret)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daret $daret)
    {
        //
    }
}
