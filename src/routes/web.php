<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/language/{locale}', 'App\Http\Controllers\HomeController@locale')->name('home.language');

// Orders Controller routes
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('orders.index');
Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('orders.create');
Route::post('/orders/save', 'App\Http\Controllers\OrderController@save')->name('orders.save');
Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('orders.show');
Route::delete('/orders/destroy', 'App\Http\Controllers\OrderController@destroy')->name('orders.destroy');
