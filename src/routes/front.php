<?php
use Illuminate\Support\Facades\Route;

// Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('register', 'Auth\RegisterController@showRegisterForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::get('password/rest', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'WithMayoController@index')->name('home');
Route::resource('with_mayos', 'WithMayoController')->except(['edit','update', 'show']);

Route::resource('users', 'UserController')->only(['show', 'edit', 'update']);