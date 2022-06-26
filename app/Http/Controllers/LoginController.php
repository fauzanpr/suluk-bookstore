<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/homepage');
        }
        return back()->with('loginError', 'Login Failed!!');
    }

    public function admin_authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            if (auth()->user()->role === 1) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            } else {
                return redirect('/homepage')->with('adminLoginError', 'error');
            }
        }
        return back()->with('loginError', 'Login Failed!!');
    }
}
