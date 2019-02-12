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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/masuk', 'MasukController@create')->name('create.masuk');
Route::post('/masuk', 'MasukController@store')->name('masuk.store');
Route::delete('/delete/{masuk}/uang', 'MasukController@destroy')->name('masuk.destroy');
Route::get('/keluar', 'KeluarController@create')->name('keluar.create');
Route::post('/keluar', 'KeluarController@store')->name('keluar.store');
Route::delete('/delete/uang/{keluar}', 'KeluarController@destroy')->name('keluar.destroy');