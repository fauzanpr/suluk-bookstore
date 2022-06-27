<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;



class KelolaTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::with('user')->orderBy('id', 'desc')->paginate(5);

        $transactiondetil = DB::table('transactions')
            ->join('book_users', 'transactions.id', '=', 'book_users.transaction_id')
            ->join('books', 'book_users.book_id', '=', 'books.id')
            ->join('users', 'book_users.user_id', '=', 'users.id')
            ->select('transactions.*', 'book_users.*', 'books.*', 'users.*')
            ->get();


        $title = "kelolatransaksi";


        return view('admin.kelolatransaksi', ['transactions' => $transactions, 'title' => $title, 'transactiondetil' => $transactiondetil]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        $transaction->transaction_status = $request->transaction_status;

        $transaction->save();

        // if ($transaction->transaction_status === 'success') {

        //     $transactiondetil = DB::table('transactions')
        //         ->join('book_users', 'transactions.id', '=', 'book_users.transaction_id')
        //         ->join('books', 'book_users.book_id', '=', 'books.id')
        //         ->join('users', 'book_users.user_id', '=', 'users.id')
        //         ->select('transactions.', 'book_users.', 'books.', 'users.')
        //         ->where('transactions.id', '=', $id)
        //         ->get();

        //     dd($transactiondetil);
        //     // $i = count($transactiondetil);


        //     // for ($j = 0; $j < $i; $j++) {
        //     //     $book_id = $transactiondetil[$j]->book_id;
        //     //     Book::where('id', $book_id)->update([
        //     //         'stock' =>
        //     //     ]);
        //     // }
        // }
        return redirect()->route('kelolatransaksi.index')
            ->with('success', 'transaksi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cetak()
    {
        $total = DB::table('transactions')
            ->where('transactions.transaction_status', 'success')
            ->sum('transactions.price_total');
        $transactions = Transaction::with('user')->where('transaction_status', 'success')->get();
        $pdf = PDF::loadview('admin.laporan', ['transactions' => $transactions, 'total' => $total]);
        return $pdf->stream();
    }
}
