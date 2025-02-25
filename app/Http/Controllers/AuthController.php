<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;


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

        // if (env('APP_ENV') == 'local') {
        // $user->email_verified_at = now();
        // $user->save();

        // Auth::login($user);

        // return redirect()->route('home');
        // }

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

    public function storeForgotPassword(Request $request)
    {

        // return $request;
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword($token)
    {
        return view('login.reset-password', ['token' => $token]);
    }

    public function storeResetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function fillUsername()
    {
        return view('login.fill-username');
    }

    public function storeUsername(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'unique:users', 'regex:/^[a-zA-Z0-9]+$/'],
        ], [
            'username.regex' => 'Username must not contain special characters and spaces.',
        ]);
        // custom validasi tidak boleh ada karakter khusus dan tidak boleh ada spasi

        $user = Auth::user();
        $user->username = $request->username;
        $user->save();

        return redirect()->route('home')->with('success', 'Username successfully added.');
    }
}