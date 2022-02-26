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

Route::get('/', 'EnqueteController@index');
Route::get('/nova-enquete', 'EnqueteController@create');
Route::get('/nova-enquete/{id}', 'OptionsController@create');
Route::post('/nova-enquete', 'EnqueteController@store');
Route::get('/enquete', 'EnqueteController@read');
Route::get('/editar-enquete/{id}', 'EnqueteController@editForm');
Route::post('/editar-enquete/{id}', 'EnqueteController@update');
Route::delete('/{id}', 'EnqueteController@destroy');

