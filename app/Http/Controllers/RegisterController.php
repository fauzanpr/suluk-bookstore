<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function store(Request $request) {
        $validated_data = $request->validate([
            'customer_email' => 'required|email',
            'customer_password' => 'required'
        ]);
        $validated_data['customer_password'] = Hash::make($validated_data['customer_password']);
        Customer::create($validated_data);
        return redirect('/homepage');
    }
}
