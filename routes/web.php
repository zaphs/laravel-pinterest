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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PhotoController@dashboard');

// Authentication Routes...
Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile/{user}', 'ProfileController@profile')->name('user.view');
    Route::get('/dashboard', 'PhotoController@dashboard');
    Route::get('/photo/{id}', 'PhotoController@view')->name('photo.view');

    Route::get('/follow/{user}', 'ActionController@follow')->name('follow');
    Route::get('/like/{photo}', 'ActionController@like')->name('like');

//    Route::get('/photos', 'PhotoController@list');

});

//Route::post('/add', 'ShoutboxController@add');
//Route::delete('/message/{message}', 'ShoutboxController@destroy');
//Route::get('/messages', 'ShoutboxController@messages');
//Route::get('/shoutbox', 'ShoutboxController@shoutbox');

