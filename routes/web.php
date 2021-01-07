<?php

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

Route::get('/', function () {
    return view('top');
});

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::get('/home','Admin\MovieController@home');
    Route::get('movie/insert', 'Admin\MovieController@add');
    Route::get('movie', 'Admin\MovieController@index');
    Route::post('movie/insert', 'Admin\MovieController@register');
    
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

