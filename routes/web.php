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

Route::post('lampen', 'LampenController@lampenOverzicht');
Route::get('/', 'LampenController@getIndex');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product/{partnr}', 'LampenController@Update');
Route::post('/Product/Update', 'LampenController@store');
