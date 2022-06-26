<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Transaction;



class DashboardAdminController extends Controller
{
    public function index()
    {

        $title = 'dashboard';
        $month = Carbon::now()->month;
        // $sum = DB::table('transactions')
        //     ->where('transactions.transaction_date', '=', $month)
        //     ->where('transactions.transaction_status', '=', 'success')
        //     ->sum('transactions.price_total');

        $sum = Transaction::whereMonth('transaction_date', $month)
            ->where('transaction_status', 'success')
            ->sum('price_total');

        $books = DB::table('books')->count();
        $transactions = DB::table('transactions')->count();
        $users = DB::table('users')
            ->where('users.role', '2')
            ->count();

        return view('admin.dashboard', ['books' => $books, 'transactions' => $transactions, 'users' => $users, 'sum' => $sum, 'title' => $title]);
    }
}
