<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\UserController::class, 'news'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\UserController@news')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('users', ['as' => 'pages.users', 'uses' => 'App\Http\Controllers\UserController@users']);
    Route::get('user/{id}', ['as' => 'pages.user', 'uses' => 'App\Http\Controllers\UserController@user']);
    Route::post('user/update', ['as' => 'pages.user.update', 'uses' => 'App\Http\Controllers\UserController@update']);
    Route::get('delete-user/{id}', ['as' => 'pages.user.delete_view', 'uses' => 'App\Http\Controllers\UserController@delete_view']);
    Route::get('new-user', ['as' => 'pages.user.create_view', 'uses' => 'App\Http\Controllers\UserController@create_view']);
    Route::get('new-news', ['as' => 'pages.news.create_view', 'uses' => 'App\Http\Controllers\NewsController@create_view']);
    Route::get('/news-view/{id}', ['as' => 'pages.news.view', 'uses' => 'App\Http\Controllers\NewsController@view']);
    Route::post('new-news-create', ['as' => 'pages.news.create', 'uses' => 'App\Http\Controllers\NewsController@create']);
    Route::post('user/register', ['as' => 'pages.user.create', 'uses' => 'App\Http\Controllers\UserController@create']);
    Route::get('news-update-up/{id}', ['as' => 'pages.news-update', 'uses' => 'App\Http\Controllers\NewsController@update_view']);
    Route::post('news-update-update', ['as' => 'pages.news-update.update', 'uses' => 'App\Http\Controllers\NewsController@update']);
    Route::get('delete-news/{id}', ['as' => 'pages.news.delete_view', 'uses' => 'App\Http\Controllers\NewsController@delete_view']);
    Route::post('delete-news-delete', ['as' => 'pages.news.delete', 'uses' => 'App\Http\Controllers\NewsController@delete']);
		Route::get('news', ['as' => 'pages.news.news', 'uses' => 'App\Http\Controllers\UserController@news']);
    Route::get('news/{searchValue}', ['as' => 'pages.news.news.search', 'uses' => 'App\Http\Controllers\UserController@newsSearch']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

