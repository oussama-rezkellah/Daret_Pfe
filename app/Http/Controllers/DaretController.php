<?php

namespace App\Http\Controllers;

use  App\Http\Controllers\MembreController;
use App\Models\Daret;
use App\Models\Membre;
use App\Http\Requests\StoreDaretRequest;
use App\Http\Requests\UpdateDaretRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DaretController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return view('daret.daret', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("daret.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDaretRequest $request)
    {
        $montant = $request->montant;
        $nbr_membre = $request->nbr_membre;
        $type_periode = $request->type_periode;
        $type_ordre = $request->type_ordre;

        $daret = Daret::create([
            'type_ordre' => $type_ordre,
            'type_periode' => $type_periode,
            'montant' => $montant,
            'nbr_tour' => $nbr_membre,
            'etat' => 0,
            'nbr_membre' => $nbr_membre,
        ]);

        Membre::create([
            'daret_id' => $daret->id,
            'role' => 1,
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('daret.darets', Auth::id())->with('success', 'your daret successfl added ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Daret $daret)
    {
        return view('daret.show', compact('daret'));
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
