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

// Bombs Controller routes
Route::get('/bombs', 'App\Http\Controllers\BombController@index')->name('bomb.index');
Route::get('/bombs/create', 'App\Http\Controllers\BombController@create')->name('bomb.create');
Route::post('/bombs/save', 'App\Http\Controllers\BombController@save')->name('bomb.save');
Route::get('/bombs/{id}', 'App\Http\Controllers\BombController@show')->name('bomb.show');
Route::delete('/bombs/destroy', 'App\Http\Controllers\BombController@destroy')->name('bomb.destroy');
