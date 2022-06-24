<?php

use App\Models\Book;
use App\Models\BookUser;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomepageController;


Route::get('/', [BookController::class, 'index'])->middleware('guest');



// ROUTE FOR ADMIN
Route::get('/dashboard', function () {
    return view('admin.dashboard', ['title' => 'dashboard']);
})->name('dashboard');

// kelola buku
Route::get('/kelolabuku', [BookController::class, 'tampil'])->name('kelolabuku.tampil');
Route::post('/kelolabuku', [BookController::class, 'store'])->name('kelolabuku.store');
Route::put('/kelolabuku/{id}', [BookController::class, 'update'])->name('kelolabuku.update');
Route::delete('/kelolabuku/{id}', [BookController::class, 'destroy'])->name('kelolabuku.destroy');

Route::get('/kelolapelanggan', function () {
    return view('admin.kelolapelanggan', ['title' => 'kelolapelanggan']);
})->name('kelolapelanggan');
Route::get('/kelolatransaksi', function () {
    return view('admin.kelolatransaksi', ['title' => 'kelolatransaksi']);
})->name('kelolatransaksi');



// ROUTE FOR PELANGGAN
Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage')->middleware('auth');


Route::get('/chart', [ChartController::class, 'index'])->name('chart')->middleware('auth');
Route::get('/transaction', [CheckoutController::class, 'toTransaction'])->name('transaction');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

// REGISTER ROUTE
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// LOGIN ROUTE
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

// LOGOUT ROUTE
Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth');

// DELETE CHART
Route::get('/delete/{id}', [ChartController::class, 'destroy']);

Route::post('/chart/checkout', [ChartController::class, 'checkout']);

Route::post('/chart/add/{id}', [ChartController::class, 'add']);
