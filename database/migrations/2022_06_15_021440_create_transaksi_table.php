<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_admin');
            $table->string('bukti_transfer')->nullable();
            $table->integer('total_item');
            $table->integer('total_harga');
            $table->date('tanggal_transaksi');
            $table->string('status_transaksi')->default('proses');
            $table->timestamps();

            // foreign key setup
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan');
            $table->foreign('id_admin')->references('id')->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
