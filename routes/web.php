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
    return view('frontend');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('lotteries', 'LotteriesController');
    Route::get('trashed-lotteries', 'LotteriesController@trashed')->name('trashed-lotteries.index');
    Route::put('restore-lotteries/{lottery}', 'LotteriesController@restore')->name('restore-lotteries');
    Route::get('lottery/{lottery}/results', 'LotteriesController@showResults')->name('lottery.results');

    Route::resource('times', 'TimesController');
    Route::get('trashed-times', 'TimesController@trashed')->name('trashed-times.index');
    Route::put('restore-times/{time}', 'TimesController@restore')->name('restore-times');

    Route::resource('results', 'ResultsController')->except('create');
    Route::get('results/create/{type}', 'ResultsController@create');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
    Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
    Route::put('users/profile', 'UsersController@update')->name('users.update-profile');
});
