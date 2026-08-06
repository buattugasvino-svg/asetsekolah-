<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\barangcontroller;
use App\Http\Controller\kategoricontroller;
use App\Http\Controller\pengajuancontroller;
use App\Http\Controller\penyusutancontroller;
use App\Http\Controller\stockcontroller;

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

// Barang
Route::get('/barang', 'barangcontroller@index')->name('barang.index');
Route::get('/barang/create', 'barangcontroller@create')->name('barang.create');
Route::post('/barang', 'barangcontroller@store')->name('barang.store');
Route::get('/barang/{barang}', 'barangcontroller@show')->name('barang.show');
Route::get('/barang/{barang}/edit', 'barangcontroller@edit')->name('barang.edit');
Route::put('/barang/{barang}', 'barangcontroller@update')->name('barang.update');
Route::delete('/barang/{barang}', 'barangcontroller@destroy')->name('barang.destroy');

// Kategori
Route::get('/kategori', 'kategoricontroller@index')->name('kategori.index');
Route::get('/kategori/create', 'kategoricontroller@create')->name('kategori.create');
Route::post('/kategori', 'kategoricontroller@store')->name('kategori.store');
Route::get('/kategori/{id}', 'kategoricontroller@show')->name('kategori.show');
Route::get('/kategori/{id}/edit', 'kategoricontroller@edit')->name('kategori.edit');
Route::put('/kategori/{id}', 'kategoricontroller@update')->name('kategori.update');
Route::delete('/kategori/{id}', 'kategoricontroller@destroy')->name('kategori.destroy');

// Pengajuan
Route::get('/pengajuan', 'pengajuancontroller@index')->name('pengajuan.index');
Route::get('/pengajuan/create', 'pengajuancontroller@create')->name('pengajuan.create');
Route::post('/pengajuan', 'pengajuancontroller@store')->name('pengajuan.store');
Route::get('/pengajuan/{id}', 'pengajuancontroller@show')->name('pengajuan.show');
Route::get('/pengajuan/{id}/edit', 'pengajuancontroller@edit')->name('pengajuan.edit');
Route::put('/pengajuan/{id}', 'pengajuancontroller@update')->name('pengajuan.update');
Route::delete('/pengajuan/{id}', 'pengajuancontroller@destroy')->name('pengajuan.destroy');

// Penyusutan
Route::get('/penyusutan', 'penyusutancontroller@index')->name('penyusutan.index');
Route::get('/penyusutan/create', 'penyusutancontroller@create')->name('penyusutan.create');
Route::post('/penyusutan', 'penyusutancontroller@store')->name('penyusutan.store');
Route::get('/penyusutan/{id}', 'penyusutancontroller@show')->name('penyusutan.show');
Route::get('/penyusutan/{id}/edit', 'penyusutancontroller@edit')->name('penyusutan.edit');
Route::put('/penyusutan/{id}', 'penyusutancontroller@update')->name('penyusutan.update');
Route::delete('/penyusutan/{id}', 'penyusutancontroller@destroy')->name('penyusutan.destroy');

// Stock
Route::get('/stock', 'stockcontroller@index')->name('stock.index');
Route::get('/stock/create', 'stockcontroller@create')->name('stock.create');
Route::post('/stock', 'stockcontroller@store')->name('stock.store');
Route::get('/stock/{id}', 'stockcontroller@show')->name('stock.show');
Route::get('/stock/{id}/edit', 'stockcontroller@edit')->name('stock.edit');
Route::put('/stock/{id}', 'stockcontroller@update')->name('stock.update');
Route::delete('/stock/{id}', 'stockcontroller@destroy')->name('stock.destroy');