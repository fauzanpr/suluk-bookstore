<?php

namespace App\Http\Controllers;

use App\Models\BookUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chart;
use App\Models\Transaction;

class CheckoutController extends Controller
{
    public function index()
    {
        $data_get = BookUser::where('user_id', auth()->user()->id)->get();
        $chart = Chart::where('user_id', auth()->user()->id)->get();
        return view('pelanggan.checkout', [
            'title' => 'Checkout',
            'books' => $data_get,
            'chart_count' => count($chart),
        ]);
    }

    public function StoreTransaction(Request $request)
    {
        return dd($request);
        // $data_get = Chart::where('user_id', auth()->user()->id)->get();
        // $request->file('bukti_transfer')->store('bukti_transfer');

        // $transaction = Transaction::where('user_id', auth()->user()->id)->get();
        // return view('pelanggan.transaction', [
        //     'title' => 'transaction',
        //     'chart_count' => count($data_get),
        //     'transaction' => $transaction
        // ]);
    }
}
