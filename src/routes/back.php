<?php
use Illuminate\Support\Facades\Route;
 
Route::group(['middleware' => 'can:admin'], function () {
    Route::get('/', 'UserController@index')->name('home');
    Route::resource('users', 'UserController')->only(['index', 'destroy']);
});