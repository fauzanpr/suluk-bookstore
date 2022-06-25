<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index() {
        $chart = Chart::where('user_id', auth()->user()->id)->get();
        $transaction = Transaction::where('user_id', auth()->user()->id)->get();
        return view('pelanggan.transaction', [
            'title' => 'Checkout',
            'transaction' => $transaction,
            'chart_count' => count($chart)
        ]);
    }
}
