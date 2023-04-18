<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Demande;
use App\Models\Daret;
use App\Http\Requests\StoreDemandeRequest;
use App\Http\Requests\UpdateDemandeRequest;
use App\Models\User;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(daret $daret)
    {

        return view('daret.demands', compact('daret'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(daret $daret)
    {
        $check = true;
        if ($daret->membre->count() == $daret->nbr_membre) {
            $check = false;
            return back()->withErrors(['message' => 'daret  pleine.']);
        }

        foreach ($daret->demandes as $demande) {
            if ($demande->user_id == auth::id()) {
                $check = false;
                return back()->withErrors(['message' => 'deja fair demande.']);
            }
        }
        foreach ($daret->invitations as $invitations) {
            if ($invitations->user_id == auth::id()) {
                $check = false;
                return back()->withErrors(['message' => 'check your notification admin de .' . $daret->name . 'deja invite ']);
            }
        }
        if ($check) {
            $demande = Demande::create([
                'user_id' => auth::id(),
                'daret_id' => $daret->id,
            ]);
            if ($demande) {
                return back()->with(['msg' => 'votre demande a ' . $daret->name . 'est envoyer']);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDemandeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Demande $demande)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDemandeRequest $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    function accept(daret $daret, User $user)
    {
        $check = DaretController::adduser($daret, $user);

        if ($check == 1) {
            return back()->with('msg', 'Daret is full');
        }

        if ($check == 2) {
            return back()->with('msg', 'already existe');
        }

        if ($check == 0) {
            return back()->with('msg', 'add well');
        }
    }
    public function destroy(Demande $demande)
    {
        //  dd($demande);
        $name = $demande->user->username;
        $demande->delete();
        //dd($name);
        return back()->with('msg', 'request is deleted');
    }
}
