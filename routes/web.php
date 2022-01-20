<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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





Route::get('/', 'App\Http\Controllers\GameController@index');
Route::post('/', 'App\Http\Controllers\GameController@search')->name('search');
Route::get('/home', 'App\Http\Controllers\HomeController@index');


Route::middleware(['admin'])->group(function () {
    Route::get('/game/add', 'App\Http\Controllers\GameController@add');
    Route::get('/game/delete/{id}', 'App\Http\Controllers\GameController@delete')->name('delete');
    Route::post('/game/insert', 'App\Http\Controllers\GameController@insert')->name('insert');
    Route::get('/game/edit/{id}', 'App\Http\Controllers\GameController@edit');
    Route::post('/game/edit/{id}', 'App\Http\Controllers\GameController@update')->name('update');

});

Route::middleware(['member'])->group(function () {
    Route::get('/cart', 'App\Http\Controllers\CartController@index');
    Route::get('/cart/delete/{cart_id}/{game_id}', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
    Route::get('/checkout/{cart_id}', 'App\Http\Controllers\CartController@checkout')->name('checkout');
    Route::get('/history', 'App\Http\Controllers\TransactionController@index');
    Route::get('/history/{trans_id}', 'App\Http\Controllers\TransactionController@detail')->name('trans.details');

});

Route::get('/game/{id}', 'App\Http\Controllers\GameController@show');
Route::post('/game/{id}', 'App\Http\Controllers\CartController@add')->name('add');


Auth::routes();