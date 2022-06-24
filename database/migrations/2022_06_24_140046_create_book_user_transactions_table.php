<?php

use App\Models\BookUser;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookUserTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_user_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_user_id');
            $table->unsignedBigInteger('transaction_id');
            $table->timestamps();

            $table->foreign('book_user_id')->references('id')->on('book_users');
            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_user_transactions');
    }
}
