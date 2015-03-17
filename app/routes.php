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

Route::get('/coderbyte', 'HomeController@showCoderbyte');

Route::get('/sitemap', 'PostsController@showSitemap');

Route::get('login',  'HomeController@showLogin');
Route::post('login', 'HomeController@doLogin');
Route::get('logout', 'HomeController@doLogout');

// Gmaps Routes.
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

// Random views.
Route::get('/resume', function() {
    return View::make('resume');
});

Route::get('/portfolio', function() {
    return View::make('portfolio');
});

Route::get('/contact', function() {
    return View::make('contact');
});

Route::post('/contact', 'HomeController@sendEmail');

Route::get('search', function() {
    return View::make('maps.search');
});

Route::post('/addTag', function() {
    
    $post = Post::findPost(Input::get('post_id'));
    $tag = Input::get('tag');

    return Response::json(array($post, $tag));
});

// Dashboard routes.
Route::get('/dashboard', 'PostsController@showDashboard');
Route::post('/dashboard', function() {
    return View::make('posts.dashboard');
});

// Resource routes.
Route::resource('addresses', 'AddressesController');
Route::resource('messages', 'MessagesController');
Route::resource('posts', 'PostsController');
Route::resource('profiles', 'ProfilesController');
Route::resource('users', 'UsersController');
Route::resource('tags', 'TagsController');    