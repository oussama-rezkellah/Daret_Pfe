<?php

namespace App\Http\Controllers;

use App\Models\Daret;
use App\Models\Tour;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(Request $request)
    {
        switch ($request->route()->getName()) {
            case 'darets':
                $darets = $this->daret();
                return view('admin.index', compact('darets'));
            case 'daret0':
                $darets = $this->daret0();
                return view('admin.index', compact('darets'));
            case 'daretl':
                $darets = $this->daretlaunch();
                return view('admin.index', compact('darets'));

            case 'daretf':
                $darets =  $this->Daretfinish();
                return view('admin.index', compact('darets'));
            case 'users':
                $users = User::all();
                return view('admin.users', compact('users'));
            default:
                abort(404);
        }
    }

    static function daret()
    {
        return Daret::all();
    }

    static  function daret0()
    {
        return Daret::where('etat', 0)->get();
    }

    static  function daretlaunch()
    {
        return Daret::where('etat', 1)->get();
    }
    static function Daretfinish()
    {


        return Daret::where('etat', 2)->get();
    }
    static function user()
    {
        return  User::all();
    }
    function createDaret(Request $request)
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
        return redirect()->back()->with('success', 'Daret created successfully');
    }
    static function checkdaret(Daret $daret)
    {
        $x = 0;
        foreach ($daret->membre as $mem) {

            if ($mem->role == "admin") {
                $x = 1;
            }
        }
        if ($x == 0 || $daret->membre->count() == 0) {
            return true;
        } else {
            return false;
        }
    }
    function showdaret(Daret $daret, $per = 0)
    {

        if ($per === 0) {
            $per = $daret->curent_tour;
        }
        return  view('admin.daret', compact('daret', 'per'));
    }



    static function checktours(Daret $daret)
    {

        if ($daret->membre->count() != 0) {


            foreach ($daret->membre as $mem) {
                if ($mem->tours->count() == 0) {
                    return false;
                } else {
                    return true;
                }
            }
        } else {
            return true;
        }
    }

    static function checktours2(Daret $daret)
    {

        if ($daret->membre->count() != 0) {


            foreach ($daret->membre as $mem) {
                if ($mem->tours->count() == 0) {
                    return false;
                } else {
                    return true;
                }
            }
        } else {
            return false;
        }
    }
    function startdaret(Daret $daret)
    {
        $dd = null;
        if ($daret->nbr_membre - $daret->membre->count() == 0 && $this->checktours($daret)) {
            $dd = $daret->update([
                'date_start' => now(),
                'etat' => 1,
                'curent_tour' => 1,
            ]);

            if ($daret->type_periode == 'week') {

                $date_finale = Carbon::now()->addWeeks($daret->nbr_tour);
            } else {

                $date_finale = Carbon::now()->addMonths($daret->nbr_tour);
            }
            $daret->date_final = $date_finale;
            $daret->save();
        }
        if ($dd) {
            return redirect()->back()->with('msg', 'your daret successfully started');
        } else {
            return redirect()->back()->withErrors('msg', 'impossible');
        }
    }
    function toursmanuallyA(Daret $daret)
    {
    }
    function toursrandomA(Daret $daret)
    {
        $nbr = $daret->nbr_tour; // the number of elements
        $arr = []; // initialize an empty array
        for ($i = 1; $i <= $nbr; $i++) {
            $arr[] = $i; // add each number to the array
        }


        foreach ($daret->membre as $member) {
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
            redirect()->back()->with('msg', 'your tours successfully added');
    }


    function charts()
    {
        $darets =   Daret::all();
        return view('admin.charts', compact('darets'));
    }
    function support()
    {
        return view('support');
    }
}
