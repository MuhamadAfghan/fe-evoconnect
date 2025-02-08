<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        ])->onlyInput('email');
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            // 'phone' => 'required|numeric|unique:users',
            'password' => 'required|min:6',
        ]);

        // return $request;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'phone' => $request->phone,
            // 'phone' => rand(1000000000, 9999999999),
            'password' => bcrypt($request->password),
        ]);

        if (env('APP_ENV') == 'local') {
            $user->email_verified_at = now();
            $user->save();

            Auth::login($user);

            return redirect()->route('home');
        }

        event(new Registered($user));

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('verification.notice');
    }

    public function verifyEmailPage()
    {
        return view('login.verification-email');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/login')->with('success', 'You have been logged out!');
    }
}
