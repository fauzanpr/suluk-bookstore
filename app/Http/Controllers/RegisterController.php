<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function store(Request $request) {

        $mail = User::where('email', $request->email)->get();

        if (sizeof($mail) > 0) {
            return redirect('/')->with('registerEmailError', 'Email sudah digunakan');
        }

        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $validated_data['password'] = Hash::make($validated_data['password']);
        User::create($validated_data);
        return redirect('/');
    }
}
