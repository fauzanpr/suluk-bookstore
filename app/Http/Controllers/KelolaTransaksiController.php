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
        $transactions = Transaction::with('bookusertransaction')->orderBy('id', 'desc')->paginate(5);

        // $transactions = DB::table('transactions')
        // ->join()
        $title = "kelolatransaksi";


        return view('admin.kelolatransaksi', ['transactions' => $transactions, 'title' => $title]);
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
