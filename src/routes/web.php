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

// Home Controller routes
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

// Language Controller routes
Route::get('/language', 'App\Http\Controllers\LanguageController@locale')->name('language.locale');

// Bombs Controller routes
Route::get('/bombs', 'App\Http\Controllers\BombController@index')->name('bombs.index');
Route::get('/bombs/create', 'App\Http\Controllers\BombController@create')->name('bombs.create');
Route::post('/bombs/save', 'App\Http\Controllers\BombController@save')->name('bombs.save');
Route::get('/bombs/{id}', 'App\Http\Controllers\BombController@show')->name('bombs.show');
Route::delete('/bombs/destroy', 'App\Http\Controllers\BombController@destroy')->name('bombs.destroy');

// Reviews Controller routes
Route::get('/reviews', 'App\Http\Controllers\ReviewController@index')->name('reviews.index');
Route::get('/reviews/create', 'App\Http\Controllers\ReviewController@create')->name('reviews.create');
Route::post('/reviews/create', 'App\Http\Controllers\ReviewController@save')->name('reviews.save');
Route::delete('/reviews/{id}', 'App\Http\Controllers\ReviewController@destroy')->name('reviews.destroy');
Route::get('/reviews/{id}', 'App\Http\Controllers\ReviewController@show')->name('reviews.show');

// Orders Controller routes
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('orders.index');
Route::get('/orders/create', 'App\Http\Controllers\OrderController@create')->name('orders.create');
Route::post('/orders/save', 'App\Http\Controllers\OrderController@save')->name('orders.save');
Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('orders.show');
Route::delete('/orders/{id}', 'App\Http\Controllers\OrderController@destroy')->name('orders.destroy');