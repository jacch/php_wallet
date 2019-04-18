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
});

//auth :
// 認證路由...
//Route::get('auth/login', 'Auth\AuthController@getLogin');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');

// 註冊路由...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');




Route::get('/index','walletpost@index');
Route::get('/IdbKjq04uPPvENV7SAYyzM1q20d792OQ','walletpost@create');

//Auth::routes();

Auth::routes(["register"=>false]);


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/loadjson', 'HomeController@loadjson');

//loadjson

//Route::get('/login', 'HomeController@index')->name('home');
