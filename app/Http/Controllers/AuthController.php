<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.sign-in');
    }

    public function register()
    {
        return view('login.sign-up');
    }

    public function storeLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            // 'phone' => 'required|numeric|unique:users',
            'password' => 'required|min:6',
        ]);

        // return $request;
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            // 'phone' => $request->phone,
            'phone' => '083808383191',
            'password' => bcrypt($request->password),
        ]);


        auth()->login($user);

        return redirect('/')->with('success', 'Welcome to our platform!');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/login')->with('success', 'You have been logged out!');
    }
}
