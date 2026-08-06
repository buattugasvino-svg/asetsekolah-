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

// Redirect halaman utama langsung ke daftar barang
Route::get('/', function () {
    return redirect()->route('barang.index');
});

// Resource Routes untuk 5 Modul Inventaris
Route::resource('kategori', 'kategoricontroller');
Route::resource('barang', 'barangcontroller');
Route::resource('stok', 'stokcontroller');
Route::resource('penyusutan', 'penyusutancontroller');
Route::resource('pengajuan', 'pengajuancontroller');