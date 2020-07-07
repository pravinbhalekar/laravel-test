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


Route::get('/','UserController@index')->name('user');
Route::get('/user/add','UserController@create')->name('add-user');
Route::post('/user/register','UserController@store')->name('register-user');
Route::post('/user/show','UserController@show')->name('show-user');
Route::post('/user/update','UserController@update')->name('update-user');
Route::post('/user/delete','UserController@destroy')->name('delete-user');
