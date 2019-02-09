<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser')->name('verify');

// protected routes
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', 'Auth\LoginController@logout');
});

