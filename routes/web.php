<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Models\Book;
use Illuminate\Auth\Events\Logout;
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
    return view('pelanggan.homepage', [
        'title' => 'homepage',
        'book' => Book::all()
    ]);
})->name('homepage')->middleware('auth');
Route::get('/chart', [ChartController::class, 'index'])->name('chart')->middleware('auth');
Route::get('/transaction', function () {
    return view('pelanggan.transaction', ['title' => 'transaction']);
})->name('transaction');
Route::get('/checkout', function () {
    return view('pelanggan.checkout', ['title' => 'checkout']);
})->name('checkout');

// REGISTER ROUTE
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// LOGIN ROUTE
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

// LOGOUT ROUTE
Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth');
