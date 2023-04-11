<?php

namespace App\Http\Controllers;

use App\Models\Membre;

use Illuminate\Support\Facades\Auth;


use App\Http\Requests\StoreMembreRequest;
use App\Http\Requests\UpdateMembreRequest;

class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMembreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Membre $membre)
    {



        if (auth::id() == $membre->user_id) {

            return view('daret.show', compact('membre'));
        } else {

            return redirect()->to(route('my_daret'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Membre $membre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMembreRequest $request, Membre $membre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Membre $membre)
    {
        //
    }
}
