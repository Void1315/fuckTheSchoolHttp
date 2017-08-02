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


Auth::routes();

Route::group(['namespace' => 'Auth','middleware' => 'web','middleware' => 'login'],function(){
	Route::any('/login','LoginController@index');
	Route::any('/register','RegisterController@index');
	Route::any('/forgot','ForgotController@index');
});

Route::group(['middleware' => 'auth'],function()
{
	Route::any('/index','Index\IndexController@index');
	Route::any('/config','Index\ConfigController@index');
	Route::get('/logout','Auth\LoginController@logout');
});


