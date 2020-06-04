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



Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'TweetController@index')->name('home');
    Route::post('/tweet-create', 'TweetController@store')->name('tweet-create');

    Route::post('/tweets/{tweet}/like', 'TweetLikesController@store')->name('like');
    Route::delete('/tweets/{tweet}/like', 'TweetLikesController@destroy')->name('dislike');


    Route::get('/profile/{user:userName}', 'ProfileController@show')->name('profile');
    Route::get('/profile/{user:userName}/edit', 'ProfileController@edit')->middleware('can:edit,user');
    Route::post('/profile/{user:userName}/follow', 'FollowController@store')->name('follow');
    Route::patch(
        '/profile/{user:username}',
        'ProfileController@update'
    )->middleware('can:edit,user');
    
    Route::get('/explore', 'ExploreController');

});

