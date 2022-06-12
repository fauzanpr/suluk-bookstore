<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
});

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
