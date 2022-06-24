<?php

use App\Models\Book;
use App\Models\BookUser;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\UserController;


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

// kelola pelanggan
Route::get('/kelolapelanggan', [UserController::class, 'index'])->name('kelolapelanggan.index');
Route::put('/kelolapelanggan/{id}', [UserController::class, 'update'])->name('kelolapelanggan.update');
Route::delete('/kelolapelanggan/{id}', [UserController::class, 'destroy'])->name('kelolapelanggan.destroy');


Route::get('/kelolatransaksi', function () {
    return view('admin.kelolatransaksi', ['title' => 'kelolatransaksi']);
})->name('kelolatransaksi');



// ROUTE FOR PELANGGAN
Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage')->middleware('auth');


Route::get('/chart', [ChartController::class, 'index'])->name('chart')->middleware('auth');
Route::get('/transaction', function () {
    $data_get = BookUser::where('user_id', auth()->user()->id)->get();
    return view('pelanggan.transaction', [
        'title' => 'transaction',
        'chart_count' => count($data_get)
    ]);
})->name('transaction');
Route::get('/checkout', function () {
    $data_get = BookUser::where('user_id', auth()->user()->id)->get();
    return view('pelanggan.checkout', [
        'title' => 'checkout',
        'chart_count' => count($data_get)
    ]);
})->name('checkout');

// REGISTER ROUTE
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// LOGIN ROUTE
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

// LOGOUT ROUTE
Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth');

// DELETE CHART
Route::get('/delete/{id}', [ChartController::class, 'destroy']);
