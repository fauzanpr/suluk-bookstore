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
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelolaTransaksiController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\MasterLayoutAdminController;



Route::get('/', [BookController::class, 'index'])->middleware('guest');


// ROUTE FOR ADMIN
Route::put('/dashboard/{id}', [MasterLayoutAdminController::class, 'update'])->name('profiladmin.update');
Route::post('/admin/edit', [MasterLayoutAdminController::class, 'updateAll']);

//dashboard
Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard')->middleware('checkRole:1');

// kelola buku
Route::get('/kelolabuku', [BookController::class, 'tampil'])->name('kelolabuku.tampil');
Route::post('/kelolabuku', [BookController::class, 'store'])->name('kelolabuku.store');
Route::put('/kelolabuku/{id}', [BookController::class, 'update'])->name('kelolabuku.update');
Route::delete('/kelolabuku/{id}', [BookController::class, 'destroy'])->name('kelolabuku.destroy');

// kelola pelanggan
Route::get('/kelolapelanggan', [UserController::class, 'index'])->name('kelolapelanggan.index');
Route::put('/kelolapelanggan/{id}', [UserController::class, 'update'])->name('kelolapelanggan.update');
Route::delete('/kelolapelanggan/{id}', [UserController::class, 'destroy'])->name('kelolapelanggan.destroy');

// kelola transaksi
Route::get('/kelolatransaksi', [KelolaTransaksiController::class, 'index'])->name('kelolatransaksi.index');
Route::get('/kelolatransaksi/cetak', [KelolaTransaksiController::class, 'cetak'])->name('kelolatransaksi.cetak');
Route::put('/kelolatransaksi/{id}', [KelolaTransaksiController::class, 'update'])->name('kelolatransaksi.update');




// ROUTE FOR PELANGGAN
//homepage
Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage')->middleware('auth');
Route::post('/account/edit', [HomepageController::class, 'edit'])->middleware('auth');

//chart
Route::get('/chart', [ChartController::class, 'index'])->name('chart')->middleware('auth');

//transaction
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
Route::post('/transaction', [CheckoutController::class, 'StoreTransaction'])->name('transaction.store');

//checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

// REGISTER ROUTE
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// LOGIN ROUTE
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/admin/login', [LoginController::class, 'admin_authenticate']);

// LOGOUT ROUTE
Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth');

// DELETE CHART
Route::get('chart/delete/{id}', [ChartController::class, 'destroy']);

Route::post('/chart/checkout', [ChartController::class, 'checkout']);

Route::post('/chart/add/{id}', [ChartController::class, 'add']);
