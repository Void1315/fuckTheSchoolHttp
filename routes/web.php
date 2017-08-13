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
	Route::get('/geet','LoginController@geet');
	Route::post('/validity','RegisterController@isRegister');

	Route::get('/reset','ForgotController@reset');
    Route::post('/updatePasswd','ForgotController@resetPassword');
});
Route::group(['middleware' => 'auth'],function()
{
	Route::any('/','Index\IndexController@index');
	Route::any('/settime','Index\IndexController@getTime');
	Route::any('/config','Index\ConfigController@index');
	Route::post('/config/stupasswd','Index\ConfigController@stuPasswd');
	Route::any('/auth','Index\ConfigController@auth');
	Route::get('/logout','Auth\LoginController@logout');
	Route::any('/message','Index\MessageController@index');
	Route::get('/about','Index\IndexController@about');
	Route::get('/getResults','Index\IndexController@getResults');

	Route::any('/addMessage','Index\MessageController@addMessage');
});


