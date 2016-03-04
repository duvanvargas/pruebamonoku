<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('index', 'crud@index');
Route::post('store','crud@store');
Route::get('show/{id}','crud@show');
Route::post('update/{id}','crud@update');
Route::post('destroy/{id}','crud@destroy');
Route::get('all','crud@all');