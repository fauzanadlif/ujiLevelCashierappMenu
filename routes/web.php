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
    return view('welcome');
});


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('index');

Route::get('/table', function () {
    return view('tables');
});

Route::resource('menus', 'menucontroller');

Route::group(['middleware' => ['auth', 'CekLevel:admin,waiter,kasir,owner']], function () {
    Route::get('/home', 'HomeController@index')->name('index');
});

Route::group(['middleware' => ['auth', 'CekLevel:waiter,kasir,owner']], function () {
    Route::get('/orderan', 'KasirController@orderan')->name('orderan');
    Route::get('/orderanpdf', 'KasirController@orderanpdf')->name('orderanpdf');
});

Route::group(['middleware' => ['auth', 'CekLevel:admin,waiter']], function () {
    Route::get('/pdfpreviewmakanan', 'MakananController@pdfpreviewmakanan')->name('pdfpreviewmakanan');
    Route::resource('menus', 'MenuController');
});

Route::group(['middleware' => ['auth', 'CekLevel:admin']], function () {
    Route::get('/pdfpreviewuser', 'UserController@pdfpreviewuser')->name('pdfpreviewuser');
    Route::resource('user', 'UserController');
});

Route::group(['middleware' => ['auth', 'CekLevel:kasir']], function () {
    Route::resource('order', 'KasirController');
});