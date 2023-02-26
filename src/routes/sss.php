<?php
// Bombs Controller routes
Route::get('   /bombs',        'App\Http\Controllers\BombController@index')->name('bomb.index');
Route::get('   /bombs/create', 'App\Http\Controllers\BombController@create')->name('bomb.create');
Route::post('  /bombs/save',   'App\Http\Controllers\BombController@save')->name('bomb.save');
Route::get('   /bombs/{id}',   'App\Http\Controllers\BombController@show')->name('bomb.show');
Route::delete('/bombs/destroy','App\Http\Controllers\BombController@destroy')->name('bomb.destroy');