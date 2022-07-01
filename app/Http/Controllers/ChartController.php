<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\BookUserTransaction;
use App\Models\Transaction;
use Carbon\Carbon;
use App\Models\Chart;

class ChartController extends Controller
{
    public function index()
    {
        $data_get = Chart::where('user_id', auth()->user()->id)->get();
        $checkout = BookUser::where('user_id', auth()->user()->id)
            ->where('status', '=', 'tampil')
            ->get();
        $transaction = Transaction::where('user_id', auth()->user()->id)->get();

        return view('pelanggan.chart', [
            'title' => 'chart',
            'chart_items' => $data_get,
            'chart_count' => count($data_get),
            'checkout_count' => count($checkout),
            'transaction_count' => count($transaction),
        ]);
    }

    public function destroy($id)
    {

        DB::table('charts')->where('id', $id)->delete();
        return redirect('/chart');
    }

    // public function checkout(Request $request)
    // {
    //     $books = BookUser::find($request->id);
    //     // return dd(sizeof($books));
    //     $item_total = 0;
    //     $price_total = 0;
    //     foreach ($books as $b) {
    //         $item_total += $b->sub_item;
    //         $price_total += $b->sub_cost;
    //     }
    //     $trans = Transaction::create([
    //         'user_id' => auth()->user()->id,
    //         'item_total' => $item_total,
    //         'price_total' => $price_total,
    //         'transaction_date' => Carbon::now(),
    //         'transaction_status' => 'proses'
    //     ]);

    //     for ($i = 0; $i < sizeof($books); $i++) {
    //         BookUserTransaction::create([
    //             'book_user_id' => $request->id[$i],
    //             'transaction_id' => $trans->id
    //         ]);
    //         DB::table('book_users')->delete($request->id[$i]);
    //     }
    //     return redirect('/homepage');
    // }

    // public function add(Request $request, $id)
    // {
    //     $num_product = ($request->num_product);
    //     $book = Book::find($id);
    //     $sub_cost = ($book->price * $num_product);
    //     BookUser::create([
    //         'user_id' => auth()->user()->id,
    //         'book_id' => $id,
    //         'sub_item' => $num_product,
    //         'sub_cost' => $sub_cost,
    //         'status' => 'proses',
    //     ]);
    //     return redirect('/homepage');
    // }

    // public function add(Request $request, $id)
    // {
    //     $num_product = ($request->num_product);
    //     $book = Book::find($id);
    //     $sub_cost = ($book->price * $num_product);
    //     Chart::create([
    //         'user_id' => auth()->user()->id,
    //         'book_id' => $id,
    //         'sub_item' => $num_product,
    //         'sub_cost' => $sub_cost,
    //     ]);
    //     return redirect('/homepage');
    // }

    public function add(Request $request, $id)
    {
        $stock = Book::find($id);
        if ($request->num_product > $stock->stock) {
            return redirect('homepage')->with('errorAddChart', 'Lebih dari Stock');
        } else {
            $num_product = ($request->num_product);
            $book = Book::find($id);
            $sub_cost = ($book->price * $num_product);
            Chart::create([
                'user_id' => auth()->user()->id,
                'book_id' => $id,
                'sub_item' => $num_product,
                'sub_cost' => $sub_cost,
            ]);
            return redirect('/homepage');
        }
    }

    public function checkout(Request $request)
    {
        // ddd($request->id);
        if ($request->id == null) {
            return redirect('chart')->with('errorValidation', 'Harus memilih salah satu');
        }
        $books = Chart::find($request->id);

        // for ($i = 0; $i < sizeof($books); $i++) {
        //     BookUser::create([
        //         'user_id' => auth()->user()->id,
        //         'book_id' => $books[$i]->Book->id,
        //         'sub_item' => $books[$i]->sub_item,
        //         'sub_cost' => $books[$i]->sub_cost,
        //         'status' => 'proses'
        //     ]);
        // }
        foreach ($books as $book) {
            BookUser::create([
                'user_id' => auth()->user()->id,
                'book_id' => $book->Book->id,
                'sub_item' => $book->sub_item,
                'sub_cost' => $book->sub_cost,
                'status' => 'tampil'
            ]);
        }

        return redirect()->route('checkout');
    }

    // public function checkout(Request $request)
    // {
    //     $books = BookUser::find($request->id);
    //     $item_total = 0;
    //     $price_total = 0;
    //     foreach ($books as $b) {
    //         $item_total += $b->sub_item;
    //         $price_total += $b->sub_cost;
    //     }
    //     $trans = Transaction::create([
    //         'user_id' => auth()->user()->id,
    //         'item_total' => $item_total,
    //         'price_total' => $price_total,
    //         'transaction_date' => Carbon::now(),
    //         'transaction_status' => 'proses'
    //     ]);
    //     BookUserTransaction::create([
    //         'book_user_id' => auth()->user()->id,
    //         'transaction_id' => $trans->id
    //     ]);
    //     DB::table('book_users')->delete($request->id);
    //     return redirect('/homepage');
    // }

    public function update(Request $request)
    {
        $sub_cost = Chart::find($request->id)->sub_cost;
        $sub_cost *= $request->num_product;
        Chart::find($request->id)->update([
            'sub_item' => $request->num_product,
            'sub_cost' => $sub_cost
        ]);
        return redirect('/chart');
    }
}
