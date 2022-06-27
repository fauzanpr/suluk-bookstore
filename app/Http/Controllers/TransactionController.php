<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\BookUser;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{
    public function index()
    {

        $transaction = Transaction::with('user')
            ->where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->paginate(5);

        $details = DB::table('transactions')
            ->join('book_users', 'transactions.id', '=', 'book_users.transaction_id')
            ->join('books', 'book_users.book_id', '=', 'books.id')
            ->join('users', 'book_users.user_id', '=', 'users.id')
            ->select('transactions.*', 'book_users.*', 'books.*', 'users.*')
            ->where('users.id', '=', auth()->user()->id)
            ->get();

        $chart = Chart::where('user_id', auth()->user()->id)->get();
        $checkout = BookUser::where('user_id', auth()->user()->id)
            ->where('status', '=', 'tampil')
            ->get();
        $transaction_count = Transaction::where('user_id', auth()->user()->id)->get();

        // redirect()->route('transaction')
        return view('pelanggan.transaction', [
            'title' => 'Checkout',
            'transaction' => $transaction,
            'chart_count' => count($chart),
            'checkout_count' => count($checkout),
            'transaction_count' => count($transaction_count),
            'details' => $details,
        ]);
    }
}
