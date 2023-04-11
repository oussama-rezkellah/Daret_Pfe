<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ResetMail;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;

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
    public function forgetform()
    {
        return view('users.forget');
    }
    public function resetform(Request $request)
    {
        $resetCode = $request->input('reset');
        $userId = $request->input('id');
        $user = User::find($userId);
        if (!$user) {
            abort(404, 'user not found');
        }
        if ($user->code_reset !== $resetCode) {
            abort(404, 'user not found');
        }

        return view('users.reset', ['id' => $userId]);
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
        $formFields['code'] = bcrypt(rand());
        $user = User::create($formFields);

        Mail::to($user->email)->send(new VerificationMail($user->id, $user->code));

        return redirect('/login')->with('message', 'We have sent a verification email');
    }
    public function auth()
    {
        $formFields = request()->validate([
            'login' => 'required',
            'password' => 'required'
        ]);
        $fieldType = filter_var($formFields['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $user = User::where(function ($query) use ($formFields) {
            $query->where('email', $formFields['login'])
                ->orWhere('username', $formFields['login']);
        })->first();

        if (!$user) {
            return back()->withErrors(['login' => 'Invalid Credentials'])->onlyInput('login');
        }

        if ($user->code !== null) {
            return back()->with('message', 'Your account is not verified. Please verify your email.');
        }
        if (auth()->attempt([$fieldType => $formFields['login'], 'password' => $formFields['password']])) {
            request()->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['login' => 'Invalid Credentials'])->onlyInput('login');
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }
    public function verify(Request $request)
    {
        $verificationCode = $request->input('verification');
        $userId = $request->input('id');

        // Get the user record from the database using the user id
        $user = User::find($userId);

        // Check if the verification code matches the one in the user record
        if ($user->code === $verificationCode) {
            // Update the user record to mark the email as verified
            $user->email_verified_at = now();
            $user->code = null;
            $user->save();

            // Redirect the user to the login page with a success message
            return redirect('/login')->with('message', 'Your email has been verified. Please login to continue.');
        } else {
            // Redirect the user to the login page with an error message
            return redirect('/login')->with('error', 'Invalid verification link.');
        }
    }
    public function forget()
    {
        $formFields = request()->validate([
            'email' => ['required', 'email']
        ]);
        $user = User::where('email', $formFields['email'])->first();
        if (!$user) {
            return back()->withErrors(['email' => 'We could not find an account with that email address.']);
        }
        $formFields['code_reset'] = bcrypt(rand());
        $user->code_reset = $formFields['code_reset'];
        $user->save();
        Mail::to($user->email)->send(new ResetMail($user->id, $user->code_reset));

        return redirect('/login')->with('message', 'We have sent a reset email');
    }
    public function reset()
    {
        $formFields = request()->validate([
            'password' => 'required|confirmed|min:6'
        ]);
        $formFields['id'] = request()->id;
        $user = User::find($formFields['id']);
        if (!$user) {
            abort(404, 'user not found');
        }
        $formFields['password'] = bcrypt($formFields['password']);
        $user->code_reset = null;
        $user->password = $formFields['password'];
        $user->save();
        return redirect('/login')->with('message', 'Your password has been changed');
    }
}
