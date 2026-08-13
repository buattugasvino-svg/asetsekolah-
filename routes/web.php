<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\barangcontroller;
use App\Http\Controller\kategoricontroller;
use App\Http\Controller\pengajuancontroller;
use App\Http\Controller\penyusutancontroller;
use App\Http\Controller\stokcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group.
|
*/


// ======================================================
// DASHBOARD
// ======================================================

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// ======================================================
// HALAMAN UTAMA
// ======================================================
// Ketika membuka http://127.0.0.1:8000
// langsung diarahkan ke Dashboard.

Route::get('/', function () {
    return redirect()->route('dashboard');
});


// ======================================================
// BARANG
// ======================================================

Route::get('/barang', 'barangcontroller@index')
    ->name('barang.index');

Route::get('/barang/create', 'barangcontroller@create')
    ->name('barang.create');

Route::post('/barang', 'barangcontroller@store')
    ->name('barang.store');

Route::get('/barang/{barang}', 'barangcontroller@show')
    ->name('barang.show');

Route::get('/barang/{barang}/edit', 'barangcontroller@edit')
    ->name('barang.edit');

Route::put('/barang/{barang}', 'barangcontroller@update')
    ->name('barang.update');

Route::delete('/barang/{barang}', 'barangcontroller@destroy')
    ->name('barang.destroy');


// ======================================================
// KATEGORI
// ======================================================

Route::get('/kategori', 'kategoricontroller@index')
    ->name('kategori.index');

Route::get('/kategori/create', 'kategoricontroller@create')
    ->name('kategori.create');

Route::post('/kategori', 'kategoricontroller@store')
    ->name('kategori.store');

Route::get('/kategori/{id}', 'kategoricontroller@show')
    ->name('kategori.show');

Route::get('/kategori/{id}/edit', 'kategoricontroller@edit')
    ->name('kategori.edit');

Route::put('/kategori/{id}', 'kategoricontroller@update')
    ->name('kategori.update');

Route::delete('/kategori/{id}', 'kategoricontroller@destroy')
    ->name('kategori.destroy');


// ======================================================
// PENGAJUAN
// ======================================================

Route::get('/pengajuan', 'pengajuancontroller@index')
    ->name('pengajuan.index');

Route::get('/pengajuan/create', 'pengajuancontroller@create')
    ->name('pengajuan.create');

Route::post('/pengajuan', 'pengajuancontroller@store')
    ->name('pengajuan.store');

Route::get('/pengajuan/{id}', 'pengajuancontroller@show')
    ->name('pengajuan.show');

Route::get('/pengajuan/{id}/edit', 'pengajuancontroller@edit')
    ->name('pengajuan.edit');

Route::put('/pengajuan/{id}', 'pengajuancontroller@update')
    ->name('pengajuan.update');

Route::delete('/pengajuan/{id}', 'pengajuancontroller@destroy')
    ->name('pengajuan.destroy');


// ======================================================
// PENYUSUTAN
// ======================================================

Route::get('/penyusutan', 'penyusutancontroller@index')
    ->name('penyusutan.index');

Route::get('/penyusutan/create', 'penyusutancontroller@create')
    ->name('penyusutan.create');

Route::post('/penyusutan', 'penyusutancontroller@store')
    ->name('penyusutan.store');

Route::get('/penyusutan/{id}', 'penyusutancontroller@show')
    ->name('penyusutan.show');

Route::get('/penyusutan/{id}/edit', 'penyusutancontroller@edit')
    ->name('penyusutan.edit');

Route::put('/penyusutan/{id}', 'penyusutancontroller@update')
    ->name('penyusutan.update');

Route::delete('/penyusutan/{id}', 'penyusutancontroller@destroy')
    ->name('penyusutan.destroy');


// ======================================================
// STOK
// ======================================================

Route::get('/stok', 'stokcontroller@index')
    ->name('stok.index');

Route::get('/stok/create', 'stokcontroller@create')
    ->name('stok.create');

Route::post('/stok', 'stokcontroller@store')
    ->name('stok.store');

Route::get('/stok/{id}', 'stokcontroller@show')
    ->name('stok.show');

Route::get('/stok/{id}/edit', 'stokcontroller@edit')
    ->name('stok.edit');

Route::put('/stok/{id}', 'stokcontroller@update')
    ->name('stok.update');

Route::delete('/stok/{id}', 'stokcontroller@destroy')
    ->name('stok.destroy');