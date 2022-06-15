<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuKeranjangTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_keranjang_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_buku_keranjang');
            $table->unsignedBigInteger('id_transaksi');
            $table->timestamps();

            // foreign key setup
            $table->foreign('id_buku_keranjang')->references('id')->on('buku_keranjang');
            $table->foreign('id_transaksi')->references('id')->on('transaksi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku_keranjang_transaksi');
    }
}
