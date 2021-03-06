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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'BaseController@index')->name('main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'backend', 'as' => 'backend.'], function ()
{
    Route::get('/', 'Backend\BaseController@index')->name('main');

    Route::get('/kategori', 'Backend\CategoryController@index')->name('kategori');
    Route::get('/barang', 'Backend\StuffController@index')->name('barang');
    Route::get('/barang-masuk', 'Backend\BarangMasukController@index')->name('barang-masuk');
    Route::post('/barang-masuk/create', 'Backend\BarangMasukController@store')->name('barang-masuk-create');
    Route::get('/barang-keluar', 'Backend\BarangKeluarController@index')->name('barang-keluar');
    Route::post('/barang-keluar/create', 'Backend\BarangKeluarController@store')->name('barang-keluar-create');
    Route::get('/barang-print', 'Backend\StuffController@print')->name('barang-print');
});
