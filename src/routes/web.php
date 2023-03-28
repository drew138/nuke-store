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

// Authentication Controllers routes
Auth::routes();

// Admin routes
Route::middleware('admin')->group(function () {
    // Home Controller routes
    Route::get('/admin', 'App\Http\Controllers\admin\AdminHomeController@index')->name('admin.home.index');

    // Bombs Controller routes
    Route::get('/admin/bombs/', 'App\Http\Controllers\admin\AdminBombController@index')->name('admin.bombs.index');
    Route::get('/admin/bombs/search/{query}', 'App\Http\Controllers\admin\AdminBombController@search')->name('admin.bombs.search');
    Route::get('/admin/bombs/create', 'App\Http\Controllers\admin\AdminBombController@create')->name('admin.bombs.create');
    Route::post('/admin/bombs/create', 'App\Http\Controllers\admin\AdminBombController@save')->name('admin.bombs.save');
    Route::get('/admin/bombs/{id}', 'App\Http\Controllers\admin\AdminBombController@show')->name('admin.bombs.show');
    Route::delete('/admin/bombs/{id}', 'App\Http\Controllers\admin\AdminBombController@destroy')->name('admin.bombs.destroy');
    Route::get('/admin/bombs/update/{id}', 'App\Http\Controllers\admin\AdminBombController@update')->name('admin.bombs.update');
    Route::post('/admin/bombs/update', 'App\Http\Controllers\admin\AdminBombController@saveUpdate')->name('admin.bombs.save_update');

    // Reviews Controller routes
    Route::get('admin/reviews', 'App\Http\Controllers\admin\AdminReviewController@index')->name('admin.reviews.index');
    Route::post('admin/reviews/verify', 'App\Http\Controllers\admin\AdminReviewController@verify')->name('admin.reviews.verify');
    Route::post('admin/reviews/unverify', 'App\Http\Controllers\admin\AdminReviewController@unverify')->name('admin.reviews.unverify');
    Route::delete('admin/reviews/{id}', 'App\Http\Controllers\admin\AdminReviewController@destroy')->name('admin.reviews.destroy');
    Route::get('admin/reviews/{id}', 'App\Http\Controllers\admin\AdminReviewController@show')->name('admin.reviews.show');

    // Orders Controller routes
    Route::get('admin/orders', 'App\Http\Controllers\admin\AdminOrderController@index')->name('admin.orders.index');
    Route::get('admin/orders/{id}', 'App\Http\Controllers\admin\AdminOrderController@show')->name('admin.orders.show');
    Route::delete('admin/orders/{id}', 'App\Http\Controllers\admin\AdminOrderController@destroy')->name('admin.orders.destroy');
    Route::post('admin/reviews/ship', 'App\Http\Controllers\admin\AdminOrderController@ship')->name('admin.orders.ship');
    Route::post('admin/reviews/cancelship', 'App\Http\Controllers\admin\AdminOrderController@cancelShip')->name('admin.orders.cancel_ship');

    // Users Controller routes
    Route::get('admin/users', 'App\Http\Controllers\admin\AdminUserController@index')->name('admin.users.index');
    Route::get('/admin/users/create', 'App\Http\Controllers\admin\AdminUserController@create')->name('admin.users.create');
    Route::post('/admin/users/create', 'App\Http\Controllers\admin\AdminUserController@save')->name('admin.users.save');
    Route::delete('/admin/users/{id}', 'App\Http\Controllers\admin\AdminUserController@destroy')->name('admin.users.destroy');
    Route::get('/admin/users/update/{id}', 'App\Http\Controllers\admin\AdminUserController@update')->name('admin.users.update');
    Route::post('/admin/users/update', 'App\Http\Controllers\admin\AdminUserController@saveUpdate')->name('admin.users.save_update');
});

// User routes
Route::middleware('auth')->group(function () {
    // Bombs Controller routes
    Route::get('/bombs', 'App\Http\Controllers\user\BombController@index')->name('bombs.index');
    Route::get('/bombs/search/{query}', 'App\Http\Controllers\user\BombController@search')->name('bombs.search');
    Route::get('/bombs/{id}', 'App\Http\Controllers\user\BombController@show')->name('bombs.show');

    // Reviews Controller routes
    Route::post('/reviews/create', 'App\Http\Controllers\user\ReviewController@save')->name('reviews.save');

    // Users Controller routes
    Route::get('/users', 'App\Http\Controllers\user\UserController@index')->name('users.index');
    
    // Map Controller route
    Route::get('/map', 'App\Http\Controllers\user\MapController@index')->name('map.index');

    // Account routes
    Route::get('/account/profile/{id}', 'App\Http\Controllers\user\UserController@profile')->name('users.profile');
    Route::get('/account/compare/{id}', 'App\Http\Controllers\user\UserController@compare')->name('users.compare');
    Route::get('/account/update', 'App\Http\Controllers\user\UserController@update')->name('users.update');
    Route::post('/account/update', 'App\Http\Controllers\user\UserController@saveUpdate')->name('users.save_update');
    Route::get('/account/cart', 'App\Http\Controllers\user\ShoppingCartController@index')->name('shopping_cart.index');
    Route::post('/account/cart', 'App\Http\Controllers\user\ShoppingCartController@add')->name('shopping_cart.add');
    Route::post('/account/buy', 'App\Http\Controllers\user\ShoppingCartController@buy')->name('shopping_cart.buy');
    Route::delete('/account/cart', 'App\Http\Controllers\user\ShoppingCartController@delete')->name('shopping_cart.delete');
    Route::get('/account/orders', 'App\Http\Controllers\user\OrderController@index')->name('orders.index');
    Route::get('/account/orders/download/{id}', 'App\Http\Controllers\user\OrderController@download')->name('orders.download');
    Route::post('/account/orders/create', 'App\Http\Controllers\user\OrderController@save')->name('orders.save');
    
});
