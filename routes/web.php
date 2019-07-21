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

Auth::routes();

Route::get('/home', 'BookmarkController@index')->name('home');
Route::post('/store', 'BookmarkController@store')->name('bookmarks.store');
Route::get('/bookmarks/{id}', 'BookmarkController@destroy');
