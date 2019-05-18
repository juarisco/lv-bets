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

Route::resource('lotteries', 'LotteriesController');
Route::get('trashed-lotteries', 'LotteriesController@trashed')->name('trashed-lotteries.index');
Route::put('restore-lotteries/{lottery}', 'LotteriesController@restore')->name('restore-lotteries');
