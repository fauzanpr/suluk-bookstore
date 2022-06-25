<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Chart;
use App\Models\BookUser;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        // return dd($request);
        $item_total = 0;
        $price_total = 0;

        $data_get = Chart::where('user_id', auth()->user()->id)->get();
        $photo = $request->file('bukti_transfer')->store('bukti_transfer', 'public');
        $book_user = BookUser::where('user_id', auth()->user()->id)->get();

        foreach ($book_user as $bu) {
            $item_total += $bu->sub_item;
            $price_total += $bu->sub_cost;
        }

        Transaction::create([
            'user_id' => auth()->user()->id,
            'transfer_proof' => $photo,
            'item_total' => $item_total,
            'price_total' => $price_total,
            'transaction_date' => Carbon::now(),
            'transaction_status' => 'payyed'
        ]);

        BookUser::truncate();

        $transaction = Transaction::where('user_id', auth()->user()->id)->get();
        return view('pelanggan.transaction', [
            'title' => 'Transaction',
            'chart_count' => count($data_get),
            'transaction' => $transaction,
        ]);
    }
}
