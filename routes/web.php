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
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function() {


    Route::get('login', "UserController@getLogin")->name('login');
    Route::post('login', "UserController@postLogin");

    Route::get('logout', "UserController@logout")->name('logout');

    Route::group(['middleware' => 'custom.auth'], function() {

        Route::get('/dashboard', 'HomeController@index')->name('home');
    });
});
Route::get('get-list','ListFriendsController@getList');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
