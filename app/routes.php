<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showHome');

Route::get('portfolio', 'HomeController@showPortfolio');

Route::get('resume', 'HomeController@showResume');

Route::get('parks', 'HomeController@showParks');

Route::get('say-hello/{name?}/{age?}', 'HomeController@sayHello');

Route::resource('posts', 'PostsController');

Route::get('login',  'HomeController@showLogin');
Route::post('login', 'HomeController@doLogin');
Route::get('logout', 'HomeController@doLogout');
