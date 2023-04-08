<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login()
    {
        return view('users.login');
    }
    public function register()
    {
        return view('users.register');
    }
    public function store()
    {
        $formFields = request()->validate([
            'name' => ['required', 'min:3'],
            'username' => ['required', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }
    public function auth()
    {
        $formFields = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            request()->session()->regenerate();
            $user = Auth::user();
            $message = 'You are now logged in!';
            session()->put('user', $user);

            return redirect('/')->with(['message' => $message]);
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }
    function show(User $user)
    {
        //    // $user = User::find($id);
        //     dd($user);
        return view('users.profile', compact('user'));
    }
    function update_img(request $request, User $user)
    {
        $formFields = request()->validate([
            'image' => 'image|mimes:png,jpg,jpeg,svg'

        ]);

        $user->update([
            'image' => $request->file('image')->store('images', 'public')
        ]);
    }
}
