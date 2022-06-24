<?php

namespace App\Http\Controllers;

use App\Models\BookUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BookUserTransaction;
use App\Models\Transaction;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function index() {
        $data_get = BookUser::where('user_id', auth()->user()->id)->get();
        return view('pelanggan.chart',[
            'title' => 'chart',
            'chart_items' => $data_get,
            'chart_count' => count($data_get)
        ]);
    }

    public function destroy($id) {
        DB::table('book_users')->where('id', $id)->delete();
        return redirect('/homepage');
    }

    public function checkout(Request $request) {
        $books = BookUser::find($request->id);
        $item_total = 0;
        $price_total = 0;
        foreach ($books as $b) {
            $item_total += $b->sub_item;
            $price_total += $b->sub_cost;
        }
        $trans = Transaction::create([
            'user_id' => auth()->user()->id,
            'item_total' => $item_total,
            'price_total' => $price_total,
            'transaction_date' => Carbon::now(),
            'transaction_status' => 'proses'
        ]);
        BookUserTransaction::create([
            'book_user_id' => auth()->user()->id,
            'transaction_id' => $trans->id
        ]);
        DB::table('book_users')->delete($request->id);
        return redirect('/homepage');
    }
}
