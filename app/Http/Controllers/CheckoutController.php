<?php

namespace App\Http\Controllers;

use App\Models\BookUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;

class CheckoutController extends Controller
{
    public function index()
    {
        $data_get = BookUser::where('user_id', auth()->user()->id)->get();
        $books = Transaction::where('user_id', auth()->user()->id)->get();
        return view('pelanggan.checkout', [
            'title' => 'transaction',
            'chart_count' => count($data_get),
            'books' => $books
        ]);
    }

    public function toTransaction()
    {
        $data_get = BookUser::where('user_id', auth()->user()->id)->get();
        $transaction = Transaction::where('user_id', auth()->user()->id)->get();
        return view('pelanggan.transaction', [
            'title' => 'transaction',
            'chart_count' => count($data_get),
            'transaction' => $transaction
        ]);
    }
}
