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

Route::get('login',  'HomeController@showLogin');
Route::post('login', 'HomeController@doLogin');
Route::get('logout', 'HomeController@doLogout');

Route::get('/findPost/{id}', function ($id) {
    $post = Post::findPost($id);
    dd($post);
});

Route::post('/addTag', function() {
    
    $post = Post::findPost(Input::get('post_id'));
    $tag = Input::get('tag');

    return Response::json(array($post, $tag));
});

Route::get('/', 'HomeController@showHome');

Route::get('/gmaps', 'HomeController@showGmaps');
Route::get('/gmaps/geolocate', 'HomeController@showGeolocate');

Route::get('/gmaps/autocomplete', 'HomeController@showAutocomplete');
Route::post('/gmaps/autocomplete', 'HomeController@storeAddress');

Route::get('/gmaps/geocode', 'HomeController@showGeocode');

Route::get('/gmaps/markers', 'HomeController@showMarkers');

Route::get('/gmaps/ajax', 'HomeController@showAjax');

Route::post('/gmaps/ajax', function() {
    $addresses = Address::all();
    return Response::json($addresses);
});

Route::get('/resume', function() {
    return View::make('resume');
});

Route::get('/portfolio', function() {
    return View::make('portfolio');
});

Route::get('/contact', function() {
    return View::make('contact');
});

Route::get('search', function() {
    return View::make('maps.search');
});


Route::resource('addresses', 'AddressesController');
Route::resource('messages', 'MessagesController');
Route::resource('posts', 'PostsController');
Route::resource('profiles', 'ProfilesController');
Route::resource('users', 'UsersController');    