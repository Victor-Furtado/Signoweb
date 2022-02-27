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
Route::get('/enquete/{id}', 'EnqueteController@read');
Route::post('/enquete/{id}', 'EnqueteController@answer');
Route::delete('/enquete/{id}', 'EnqueteController@destroy');
Route::get('/nova-enquete', 'EnqueteController@create');
Route::get('/nova-enquete/{id}', 'OptionsController@create');
Route::post('/nova-enquete/{id}', 'OptionsController@store');
Route::delete('/nova-enquete/{id}', 'OptionsController@cancel');
Route::post('/nova-enquete', 'EnqueteController@store');
Route::get('/editar-enquete/{id}', 'EnqueteController@editForm');
Route::post('/editar-enquete/{id}', 'EnqueteController@update');
Route::get('/editar-enquete/options/{id}', 'OptionsController@editForm');
Route::post('/editar-enquete/options/{id}', 'OptionsController@update');
Route::delete('/editar-enquete/options/{id}', 'OptionsController@cancelUpdate');

