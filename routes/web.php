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

Route::get('/','ClientController@index');
Route::post('/store','ClientController@store');

Route::get('/edit-client/{id}','ClientController@edit');
Route::post('/update','ClientController@update');

Route::get('/delete-client/{id}','ClientController@delete');