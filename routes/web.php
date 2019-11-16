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

Route::get('login', "UserController@getLogin")->name('login');
Route::post('login', "UserController@postLogin");

Route::get('logout', "UserController@logout")->name('logout');

Route::group(['middleware' => 'custom.auth'], function() {

    Route::get('/dashboard', 'HomeController@index')->name('home');
});

/**
 * create seed db
 */
Route::get('create-seed-user', 'SeedController@createUser');
Route::get('create-seed-user-friend', 'SeedController@createUserFriend');

