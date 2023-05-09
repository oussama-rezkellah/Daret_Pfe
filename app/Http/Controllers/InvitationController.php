<?php

namespace App\Http\Controllers;

use  App\Http\Controllers\DaretController;
use Illuminate\Support\Facades\Auth;
use App\Models\Invitation;
use App\Http\Requests\StoreInvitationRequest;
use App\Http\Requests\UpdateInvitationRequest;
use App\Models\Daret;
use App\Models\Demande;
use App\Models\Membre;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invitation = auth::user()->invitations;

        return view('daret.invitation', compact('invitation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Daret $daret)
    {
        $form = request()->validate([
            'search' => 'required',
        ]);


        $user = User::where(function ($query) use ($form) {
            $query->where('email', $form['search'])
                ->orWhere('username', $form['search']);
        })->first();

        $check_membre = false;
        if ($daret->membre->count() == $daret->nbr_membre) {

            return back()->withErrors(['message' => 'daret is full.s']);
        }

        if (!$user) {
            return back()->withErrors(['message' => 'email or username incorrect.']);
        }

        foreach ($daret->membre as $membre) {

            if ($membre->user_id == $user->id) {
                $check_membre = true;
            }
        }
        if ($check_membre) {
            return back()->withErrors(['message' => 'already exist.']);
        }


        foreach ($daret->invitations as $invitations) {

            if ($invitations->user_id == $user->id) {
                return back()->withErrors(['message' => 'already sent invitation to.' . $user->name]);
            }
        }

        foreach ($daret->demandes as $demandes) {

            if ($demandes->user_id == $user->id) {
                return back()->withErrors(['message' => 'be sure to consult the table of requests.']);
            }
        }

        if (!$check_membre) {
            $invit = Invitation::create([

                'user_id' =>   $user->id,
                'daret_id' => $daret->id

            ]);
            return back()->with(['msg' => 'the invitation is sent']);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvitationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvitationRequest $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function accept(Invitation $invitation)
    {


        $check = DaretController::adduser($invitation->daret,  auth::user());
        // echo $check;
        if ($check == 1) {
            return back()->with('msg', 'Daret is full');
        }

        if ($check == 2) {
            return back()->with('msg', 'already existe');
        }

        if ($check == null) {
            return back()->with('msg', 'add well');
        }


        // echo  $check;
    }
    public function destroy(Invitation $invitation)
    {

        $name = $invitation->daret->name;
        $invitation->delete();

        return redirect()->route('indexinvit')->with('msg', 'invitation from daret ' . $name . ' is deleted');
    }
}
