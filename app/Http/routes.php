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
Route::get('/', 'WebController@home');
Route::get('home', 'WebController@home');

Route::resource('banners', 'BannersController');

Route::post('/store', ['as' =>'generator/store', 'uses' => 'GeneratorController@store']);
Route::post('/generator', ['as' =>'generator/show', 'uses' => 'GeneratorController@show']);


// Authentication routes...
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);



Route::post('home', ['as' => 'home', 'uses' => 'GeneratorController@show']);
/* Para bajar el archivo
Route::post('home', function () {

    $public_path = public_path();
    $url = $public_path.'/storage/layout.json';

    //verificamos si el archivo existe y lo retornamos

        return response()->download($url);



});*/