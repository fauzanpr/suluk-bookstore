<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuKeranjangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku_keranjang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_buku');
            $table->unsignedBigInteger('id_keranjang');
            $table->integer('sub_item');
            $table->integer('sub_harga');
            $table->string('status')->default('keranjang');
            $table->timestamps();

            // foreign key definition
            $table->foreign('id_buku')->references('id')->on('buku');
            $table->foreign('id_keranjang')->references('id')->on('keranjang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku_keranjang');
    }
}
