<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BukuController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index']);

Route::get('/quickview/{book:id}', [BookController::class, 'show']);

// ROUTE FOR ADMIN
Route::get('/dashboard', function () {
    return view('admin.dashboard', ['title' => 'dashboard']);
})->name('dashboard');
Route::get('/kelolabuku', function () {
    return view('admin.kelolabuku', ['title' => 'kelolabuku']);
})->name('kelolabuku');
Route::get('/kelolapelanggan', function () {
    return view('admin.kelolapelanggan', ['title' => 'kelolapelanggan']);
})->name('kelolapelanggan');
Route::get('/kelolatransaksi', function () {
    return view('admin.kelolatransaksi', ['title' => 'kelolatransaksi']);
})->name('kelolatransaksi');

// ROUTE FOR PELANGGAN
Route::get('/homepage', function () {
    return view('pelanggan.homepage', ['title' => 'homepage']);
})->name('homepage');
Route::get('/chart', function () {
    return view('pelanggan.chart', ['title' => 'chart']);
})->name('chart');
Route::get('/transaction', function () {
    return view('pelanggan.transaction', ['title' => 'transaction']);
})->name('transaction');
Route::get('/checkout', function () {
    return view('pelanggan.checkout', ['title' => 'checkout']);
})->name('checkout');
