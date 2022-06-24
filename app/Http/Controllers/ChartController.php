<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\BookUser;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BookUserTransaction;
use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    public function index()
    {
        $data_get = BookUser::where('user_id', auth()->user()->id)->get();
        return view('pelanggan.chart', [
            'title' => 'chart',
            'chart_items' => $data_get,
            'chart_count' => count($data_get)
        ]);
    }

    public function destroy($id)
    {
        DB::table('book_users')->where('id', $id)->delete();
        return redirect('/homepage');
    }

    public function checkout(Request $request)
    {
        $books = BookUser::find($request->id);
        // return dd(sizeof($books));
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

        for ($i = 0; $i < sizeof($books); $i++) {
            BookUserTransaction::create([
                'book_user_id' => $request->id[$i],
                'transaction_id' => $trans->id
            ]);
            DB::table('book_users')->delete($request->id[$i]);
        }
        return redirect('/homepage');
    }

    public function add(Request $request, $id)
    {
        $num_product = ($request->num_product);
        $book = Book::find($id);
        $sub_cost = ($book->price * $num_product);
        BookUser::create([
            'user_id' => auth()->user()->id,
            'book_id' => $id,
            'sub_item' => $num_product,
            'sub_cost' => $sub_cost,
            'status' => 'proses',
        ]);
        return redirect('/homepage');
    }
}
