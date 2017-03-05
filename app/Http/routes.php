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

// Users
Route::get('users', 'UserController@index');
Route::get('users/{id}', 'UserController@info');
Route::get('users/{id}/cars', 'UserController@cars');

// Cars
Route::get('cars', 'CarController@index');
Route::get('cars/{id}', 'CarController@info');
