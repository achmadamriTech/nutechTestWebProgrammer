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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/barang', 'BarangController@index')->name('barang');
Route::get('/barang/form', 'BarangController@form')->name('formBarang');
Route::post('/barang/store', 'BarangController@store')->name('simpanBarang');
Route::get('/barang/delete/{barangId}', 'BarangController@delete')->name('hapusBarang');
Route::get('/barang/form/{barangId}', 'BarangController@formEditBarang')->name('formEditBarang');
Route::post('/barang/ganti', 'BarangController@ganti')->name('gantiBarang');
