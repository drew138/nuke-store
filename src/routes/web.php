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
// admin user
Route::get('/admin', 'App\Http\Controllers\admin\HomeController@index')->name('admin.home.index');
// user routes
Route::get('/', 'App\Http\Controllers\user\HomeController@index')->name('home.index');

// Language Controller routes
Route::get('/language', 'App\Http\Controllers\LanguageController@locale')->name('language.locale');

// Bombs Controller routes
// admin routes
Route::get('/admin/bombs', 'App\Http\Controllers\admin\BombController@index')->name('admin.bombs.index');
Route::get('/admin/bombs/create', 'App\Http\Controllers\admin\BombController@create')->name('admin.bombs.create');
Route::post('/admin/bombs/create', 'App\Http\Controllers\admin\BombController@save')->name('admin.bombs.save');
Route::get('/admin/bombs/{id}', 'App\Http\Controllers\admin\BombController@show')->name('admin.bombs.show');
Route::delete('/admin/bombs/{id}', 'App\Http\Controllers\admin\BombController@destroy')->name('admin.bombs.destroy');
// user routes
Route::get('/bombs', 'App\Http\Controllers\user\BombController@index')->name('bombs.index');
Route::get('/bombs/{id}', 'App\Http\Controllers\user\BombController@show')->name('bombs.show');

// Reviews Controller routes
// admin routes
Route::get('admin/reviews', 'App\Http\Controllers\admin\ReviewController@index')->name('admin.reviews.index');
Route::get('admin/reviews/create', 'App\Http\Controllers\admin\ReviewController@create')->name('admin.reviews.create');
Route::post('admin/reviews/create', 'App\Http\Controllers\admin\ReviewController@save')->name('admin.reviews.save');
Route::delete('admin/reviews/{id}', 'App\Http\Controllers\admin\ReviewController@destroy')->name('admin.reviews.destroy');
Route::get('admin/reviews/{id}', 'App\Http\Controllers\admin\ReviewController@show')->name('admin.reviews.show');
// user routes
Route::get('/reviews', 'App\Http\Controllers\user\ReviewController@index')->name('reviews.index');
Route::post('/reviews/create', 'App\Http\Controllers\user\ReviewController@save')->name('reviews.save');
Route::delete('/reviews/{id}', 'App\Http\Controllers\user\ReviewController@destroy')->name('reviews.destroy');
Route::get('/reviews/{id}', 'App\Http\Controllers\user\ReviewController@show')->name('reviews.show');

// Orders Controller routes
// admin routes
Route::get('admin/orders', 'App\Http\Controllers\admin\OrderController@index')->name('admin.orders.index');
Route::get('admin/orders/create', 'App\Http\Controllers\admin\OrderController@create')->name('admin.orders.create');
Route::post('admin/orders/create', 'App\Http\Controllers\admin\OrderController@save')->name('admin.orders.save');
Route::get('admin/orders/{id}', 'App\Http\Controllers\admin\OrderController@show')->name('admin.orders.show');
Route::delete('admin/orders/{id}', 'App\Http\Controllers\admin\OrderController@destroy')->name('admin.orders.destroy');
// user routes
Route::get('/orders', 'App\Http\Controllers\user\OrderController@index')->name('orders.index');
Route::get('/orders/create', 'App\Http\Controllers\user\OrderController@create')->name('orders.create');
Route::post('/orders/create', 'App\Http\Controllers\user\OrderController@save')->name('orders.save');
Route::get('/orders/{id}', 'App\Http\Controllers\user\OrderController@show')->name('orders.show');
Route::delete('/orders/{id}', 'App\Http\Controllers\user\OrderController@destroy')->name('orders.destroy');
