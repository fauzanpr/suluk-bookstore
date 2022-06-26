<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{
    public function index()
    {

        $transactions = Transaction::with('user')
            ->where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->paginate(5);

        $transactiondetil = DB::table('transactions')
            ->join('book_users', 'transactions.id', '=', 'book_users.transaction_id')
            ->join('books', 'book_users.book_id', '=', 'books.id')
            ->join('users', 'book_users.user_id', '=', 'users.id')
            ->select('transactions.*', 'book_users.*', 'books.*', 'users.*')
            ->where('users.id', '=', auth()->user()->id)
            ->get();

        $chart = Chart::where('user_id', auth()->user()->id)->get();

        return view('pelanggan.transaction', [
            'title' => 'Checkout',
            'transactions' => $transactions,
            'chart_count' => count($chart),
            'transactiondetil' => $transactiondetil
        ]);
    }
}
