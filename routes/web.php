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

    Route::get('/profile/{user:username}/follows', 'FollowController@follows')->name('profile-following')->middleware('traffic-watcher');
    Route::get('/profile/{user:username}/followers', 'FollowController@followers')->name('profile-followers')->middleware('traffic-watcher');

    Route::get('/profile/{user:username}', 'ProfileController@show')->name('profile')->middleware('traffic-watcher');
    Route::get('/profile/{user:username}/edit', 'ProfileController@edit')->middleware('can:edit,user');
    Route::post('/profile/{user:username}/follow', 'FollowController@store')->name('follow');
    Route::patch(
        '/profile/{user:username}',
        'ProfileController@update'
    )->name('profile-edit')->middleware('can:edit,user');

    Route::get('/explore', 'ExploreController');


    Route::get('/traffic', 'TrafficController@index');

    Route::get('/notifications', 'NotificationController@index');



});

