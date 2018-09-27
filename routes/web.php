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

Route::get('/home', 'HomeController@index')->name('home');

Route::group( [ 'prefix' => 'admin','middleware' => 'admin'], function()
{
Route::get('/', 'AdminController@dashboard')->middleware('admin');

Route::get('/users', 'AdminController@users');
Route::get('/users/create', 'AdminController@create');
Route::post('/users/create', 'AdminController@store')->name('createuser');
Route::get('/users/edit/{user}', 'AdminController@edit')->name('users.edit');
Route::post('/users/{user}/update', 'AdminController@update')->name('updateuser');
Route::delete('/users/destroy/{user}', 'AdminController@destroy');
});