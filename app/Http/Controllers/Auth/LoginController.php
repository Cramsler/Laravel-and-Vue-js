<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authorization(Request $request)
    {
        $remember    = (bool)$request->remember;
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, $remember))
        {
            $request->session()->regenerate();

            return redirect()->intended();
        } else {
            return back()->withErrors('The provided credentials do not match our records.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
