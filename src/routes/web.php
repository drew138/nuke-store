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
// user routes
Route::get('/', 'App\Http\Controllers\user\HomeController@index')->name('home.index');

// Language Controller routes
Route::get('/language', 'App\Http\Controllers\LanguageController@locale')->name('language.locale');

Auth::routes();

// admin routes
Route::middleware('admin')->group(function () {
    // Bombs Controller routes
    Route::get('/admin', 'App\Http\Controllers\admin\AdminHomeController@index')->name('admin.home.index');
    Route::get('/admin/bombs/', 'App\Http\Controllers\admin\AdminBombController@index')->name('admin.bombs.index');
    Route::post('/admin/bombs/', 'App\Http\Controllers\admin\AdminBombController@search')->name('admin.bombs.search');
    Route::get('/admin/bombs/create', 'App\Http\Controllers\admin\AdminBombController@create')->name('admin.bombs.create');
    Route::post('/admin/bombs/create', 'App\Http\Controllers\admin\AdminBombController@save')->name('admin.bombs.save');
    Route::get('/admin/bombs/{id}', 'App\Http\Controllers\admin\AdminBombController@show')->name('admin.bombs.show');
    Route::delete('/admin/bombs/{id}', 'App\Http\Controllers\admin\AdminBombController@destroy')->name('admin.bombs.destroy');
    // Reviews Controller routes
    Route::get('admin/reviews', 'App\Http\Controllers\admin\AdminReviewController@index')->name('admin.reviews.index');
    Route::get('admin/reviews/create', 'App\Http\Controllers\admin\AdminReviewController@create')->name('admin.reviews.create');
    Route::post('admin/reviews/create', 'App\Http\Controllers\admin\AdminReviewController@save')->name('admin.reviews.save');
    Route::delete('admin/reviews/{id}', 'App\Http\Controllers\admin\AdminReviewController@destroy')->name('admin.reviews.destroy');
    Route::get('admin/reviews/{id}', 'App\Http\Controllers\admin\AdminReviewController@show')->name('admin.reviews.show');
    // Orders Controller routes
    Route::get('admin/orders', 'App\Http\Controllers\admin\AdminOrderController@index')->name('admin.orders.index');
    Route::get('admin/orders/create', 'App\Http\Controllers\admin\AdminOrderController@create')->name('admin.orders.create');
    Route::post('admin/orders/create', 'App\Http\Controllers\admin\AdminOrderController@save')->name('admin.orders.save');
    Route::get('admin/orders/{id}', 'App\Http\Controllers\admin\AdminOrderController@show')->name('admin.orders.show');
    Route::delete('admin/orders/{id}', 'App\Http\Controllers\admin\AdminOrderController@destroy')->name('admin.orders.destroy');
});

Route::middleware('auth')->group(function () {
    // Bombs Controller routes
    Route::get('/bombs', 'App\Http\Controllers\user\BombController@index')->name('bombs.index');
    Route::post('/bombs', 'App\Http\Controllers\user\BombController@search')->name('bombs.search');
    Route::get('/bombs/{id}', 'App\Http\Controllers\user\BombController@show')->name('bombs.show');
    // Reviews Controller routes
    Route::get('/reviews', 'App\Http\Controllers\user\ReviewController@index')->name('reviews.index');
    Route::post('/reviews/create', 'App\Http\Controllers\user\ReviewController@save')->name('reviews.save');
    Route::delete('/reviews/{id}', 'App\Http\Controllers\user\ReviewController@destroy')->name('reviews.destroy');
    Route::get('/reviews/{id}', 'App\Http\Controllers\user\ReviewController@show')->name('reviews.show');
    // Orders Controller routes
    Route::get('/orders', 'App\Http\Controllers\user\OrderController@index')->name('orders.index');
    Route::get('/orders/create', 'App\Http\Controllers\user\OrderController@create')->name('orders.create');
    Route::post('/orders/create', 'App\Http\Controllers\user\OrderController@save')->name('orders.save');
    Route::get('/orders/{id}', 'App\Http\Controllers\user\OrderController@show')->name('orders.show');
    Route::delete('/orders/{id}', 'App\Http\Controllers\user\OrderController@destroy')->name('orders.destroy');
    // Shopping Cart Controller routes
    Route::get('/cart', 'App\Http\Controllers\user\ShoppingCartController@index')->name('shopping_cart.index');
    Route::post('/cart', 'App\Http\Controllers\user\ShoppingCartController@add')->name('shopping_cart.add');
    Route::delete('/cart', 'App\Http\Controllers\user\ShoppingCartController@delete')->name('shopping_cart.delete');
});
