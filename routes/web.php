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

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/me/{userId}', 'UserController@getWall')->name('getWall');

    Route::get('get-post-by-user-id', 'PostController@getPostByUserId')->name('getPostByUserId');

    Route::post('create-post', 'PostController@createPost')->name('createPost');
});

Route:: get('test', 'TestController@test');
/**
 * create seed db
 */
Route::get('create-seed-user', 'SeedController@createUser');
Route::get('create-seed-user-friend', 'SeedController@createUserFriend');
Route::get('create-seed-user-friend-v2', 'SeedController@createUserFriendV2');

Route::get('list-arr', "ShortPathController@run");

Route::get('check-unique', "ShortPathController@checkUnique");