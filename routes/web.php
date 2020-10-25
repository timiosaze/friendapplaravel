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



Route::get('/friends', 'FriendController@index')->name('friend.index');
Route::post('/friends', 'FriendController@store')->name('friend.store');
Route::get('/friends/{id}/edit', 'FriendController@edit')->name('friend.edit');
Route::put('/friends/{id}', 'FriendController@update')->name('friend.update');
Route::delete('/friends/{id}', 'FriendController@destroy')->name('friend.destroy');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
