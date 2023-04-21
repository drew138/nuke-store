<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/bombs', 'App\Http\Controllers\api\BombApiController@index')->name('api.bomb.index');
Route::get('/bombs/{id}', 'App\Http\Controllers\api\BombApiController@show')->name('api.bomb.show');
