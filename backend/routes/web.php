<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('posts')->group(function () {
    Route::get('', 'API\PostController@index');
    Route::get('{slug}', 'API\PostController@show');
    Route::post('store', 'API\PostController@store');
    Route::post('{post}/update', 'API\PostController@update');
    Route::get('{post}/delete', 'API\PostController@destroy');
});

Route::prefix('users')->group(function () {
    Route::get('', 'API\UserController@index');
    Route::get('store', 'API\UserController@store');
    Route::get('{user}/update', 'API\UserController@update');
    Route::get('{user}/delete', 'API\UserController@destroy');
});

Route::prefix('comments')->group(function () {
    Route::get('store', 'API\UserController@store');
    Route::get('{user}/delete', 'API\UserController@destroy');
});

Route::get('/logout', 'UserController@logout');
Route::group(['prefix' => 'auth'], function () {
  Auth::routes();
});
