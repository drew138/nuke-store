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
Route::get('/', 'App\Http\Controllers\User\HomeController@index')->name('home.index');

// Language Controller routes
Route::get('/language', 'App\Http\Controllers\LanguageController@locale')->name('language.locale');

// Authentication Controllers routes
Auth::routes();

// Admin routes
Route::middleware('admin')->group(function () {
    // Home Controller routes
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');

    // Bombs Controller routes
    Route::get('/admin/bombs/', 'App\Http\Controllers\Admin\AdminBombController@index')->name('admin.bombs.index');
    Route::get('/admin/bombs/search/{query}', 'App\Http\Controllers\Admin\AdminBombController@search')->name('admin.bombs.search');
    Route::get('/admin/bombs/create', 'App\Http\Controllers\Admin\AdminBombController@create')->name('admin.bombs.create');
    Route::post('/admin/bombs/create', 'App\Http\Controllers\Admin\AdminBombController@save')->name('admin.bombs.save');
    Route::get('/admin/bombs/{id}', 'App\Http\Controllers\Admin\AdminBombController@show')->name('admin.bombs.show');
    Route::delete('/admin/bombs/{id}', 'App\Http\Controllers\Admin\AdminBombController@destroy')->name('admin.bombs.destroy');
    Route::get('/admin/bombs/update/{id}', 'App\Http\Controllers\Admin\AdminBombController@update')->name('admin.bombs.update');
    Route::post('/admin/bombs/update', 'App\Http\Controllers\Admin\AdminBombController@saveUpdate')->name('admin.bombs.save_update');

    // Reviews Controller routes
    Route::get('admin/reviews', 'App\Http\Controllers\Admin\AdminReviewController@index')->name('admin.reviews.index');
    Route::post('admin/reviews/verify', 'App\Http\Controllers\Admin\AdminReviewController@verify')->name('admin.reviews.verify');
    Route::post('admin/reviews/unverify', 'App\Http\Controllers\Admin\AdminReviewController@unverify')->name('admin.reviews.unverify');
    Route::delete('admin/reviews/{id}', 'App\Http\Controllers\Admin\AdminReviewController@destroy')->name('admin.reviews.destroy');
    Route::get('admin/reviews/{id}', 'App\Http\Controllers\Admin\AdminReviewController@show')->name('admin.reviews.show');

    // Orders Controller routes
    Route::get('admin/orders', 'App\Http\Controllers\Admin\AdminOrderController@index')->name('admin.orders.index');
    Route::get('admin/orders/{id}', 'App\Http\Controllers\Admin\AdminOrderController@show')->name('admin.orders.show');
    Route::delete('admin/orders/{id}', 'App\Http\Controllers\Admin\AdminOrderController@destroy')->name('admin.orders.destroy');
    Route::post('admin/reviews/ship', 'App\Http\Controllers\Admin\AdminOrderController@ship')->name('admin.orders.ship');
    Route::post('admin/reviews/cancelship', 'App\Http\Controllers\Admin\AdminOrderController@cancelShip')->name('admin.orders.cancel_ship');

    // Users Controller routes
    Route::get('admin/users', 'App\Http\Controllers\Admin\AdminUserController@index')->name('admin.users.index');
    Route::get('/admin/users/create', 'App\Http\Controllers\Admin\AdminUserController@create')->name('admin.users.create');
    Route::post('/admin/users/create', 'App\Http\Controllers\Admin\AdminUserController@save')->name('admin.users.save');
    Route::delete('/admin/users/{id}', 'App\Http\Controllers\Admin\AdminUserController@destroy')->name('admin.users.destroy');
    Route::get('/admin/users/update/{id}', 'App\Http\Controllers\Admin\AdminUserController@update')->name('admin.users.update');
    Route::post('/admin/users/update', 'App\Http\Controllers\Admin\AdminUserController@saveUpdate')->name('admin.users.save_update');
});

// User routes
Route::middleware('auth')->group(function () {
    // Bombs Controller routes
    Route::get('/bombs', 'App\Http\Controllers\User\BombController@index')->name('bombs.index');
    Route::get('/bombs/search/{query}', 'App\Http\Controllers\User\BombController@search')->name('bombs.search');
    Route::get('/bombs/{id}', 'App\Http\Controllers\User\BombController@show')->name('bombs.show');

    // Reviews Controller routes
    Route::post('/reviews/create', 'App\Http\Controllers\User\ReviewController@save')->name('reviews.save');

    // Users Controller routes
    Route::get('/users', 'App\Http\Controllers\User\UserController@index')->name('users.index');
    Route::get('/users/{id}', 'App\Http\Controllers\User\UserController@profile')->name('users.profile');

    // Map Controller route
    Route::get('/map', 'App\Http\Controllers\User\MapController@index')->name('map.index');

    // Account routes
    Route::get('/account', 'App\Http\Controllers\User\UserController@account')->name('users.account');
    Route::get('/account/compare/{id}', 'App\Http\Controllers\User\UserController@compare')->name('users.compare');
    Route::get('/account/update', 'App\Http\Controllers\User\UserController@update')->name('users.update');
    Route::post('/account/update', 'App\Http\Controllers\User\UserController@saveUpdate')->name('users.save_update');
    Route::get('/account/cart', 'App\Http\Controllers\User\ShoppingCartController@index')->name('shopping_cart.index');
    Route::post('/account/cart', 'App\Http\Controllers\User\ShoppingCartController@add')->name('shopping_cart.add');
    Route::post('/account/buy', 'App\Http\Controllers\User\ShoppingCartController@buy')->name('shopping_cart.buy');
    Route::delete('/account/cart', 'App\Http\Controllers\User\ShoppingCartController@delete')->name('shopping_cart.delete');
    Route::get('/account/orders', 'App\Http\Controllers\User\OrderController@index')->name('orders.index');
    Route::get('/account/orders/download/{id}', 'App\Http\Controllers\User\OrderController@download')->name('orders.download');
    Route::post('/account/orders/create', 'App\Http\Controllers\User\OrderController@save')->name('orders.save');

    // Rick and Mort

});
Route::get('/rickandmorty', 'App\Http\Controllers\User\RickAndMortyController@index')->name('rickandmorty.index');
