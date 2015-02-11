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

Route::get('/findPost/{id}', function ($id) {
    $post = Post::findPost($id);
    dd($post);
});

Route::get('/', 'HomeController@showHome');

Route::resource('posts', 'PostsController');
Route::resource('profiles', 'ProfilesController');
Route::resource('roles', 'RolesController');
Route::resource('users', 'UsersController');    

Route::get('login',  'HomeController@showLogin');
Route::post('login', 'HomeController@doLogin');
Route::get('logout', 'HomeController@doLogout');