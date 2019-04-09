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
})->middleware('auth')->name('welcome');

Auth::routes();

Route::get('/all', 'HomeController@index')->middleware('auth')->name('all');

Route::post('/msg', 'UserMessageController@pushmsg') -> middleware('msgfilter');


