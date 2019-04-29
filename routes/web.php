<?php

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

// Route Auth
Auth::routes();

// Route Home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

// Route Buku
Route::resource('buku', 'bukuController');
Route::get('/buku/delete/{id}','bukuController@destroy');
Route::get('/format_buku', 'BukuController@format');
Route::post('/import_buku', 'BukuController@import');

// Route User
Route::resource('user', 'userController');
Route::get('/user/delete/{id}','userController@destroy');

// Route Member
Route::resource('member', 'memberController');
Route::get('/member/delete/{id}','memberController@destroy');

// Route Transaksi
Route::resource('transaksi', 'transaksiController');
Route::get('/transaksi/delete/{id}','transaksiController@destroy')->name('transaksi.delete');
Route::get('/transaksi/update/{id}', 'transaksiController@update')->name('transaksi.update');

// Route Laporan Transaksi
Route::get('/laporan/transaksi', 'LaporanController@transaksi');
Route::get('/laporan/transaksi/pdf', 'LaporanController@transaksiPdf');
Route::get('/laporan/transaksi/excel', 'LaporanController@transaksiExcel');

// Route Laporan Buku
Route::get('/laporan/buku', 'LaporanController@buku');
Route::get('/laporan/buku/pdf', 'LaporanController@bukuPdf');
Route::get('/laporan/buku/excel', 'LaporanController@bukuExcel');
