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
Route::resource('bukus','BukuController');
Route::resource('siswas','SiswaController');
Route::resource('penerbits','PenerbitController');
Route::resource('books','BookController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
