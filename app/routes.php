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

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('login',  'HomeController@showLogin');
Route::post('login', 'HomeController@doLogin');
Route::get('logout', 'HomeController@doLogout');


/*
|--------------------------------------------------------------------------
| Main View Routes
|--------------------------------------------------------------------------
*/

//  -- Move to home controller.

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


/*
|--------------------------------------------------------------------------
| Reservation Calendar Routes
|--------------------------------------------------------------------------
*/

Route::get('/calendar', 'HomeController@showCalendar');


/*
|--------------------------------------------------------------------------
| Google Maps Demo Routes
|--------------------------------------------------------------------------
*/

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


/*
|--------------------------------------------------------------------------
| Tag Routes
|--------------------------------------------------------------------------
*/

//  -- Move to tag controller.

Route::post('/addTag', function() {
    
    $post = Post::findPost(Input::get('post_id'));
    $tag = Input::get('tag');

    return Response::json(array($post, $tag));
});


/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', 'PostsController@showDashboard');
Route::post('/dashboard', function() {
    return View::make('posts.dashboard');
});


/*
|--------------------------------------------------------------------------
| Resourceful Routes
|--------------------------------------------------------------------------
*/

Route::resource('addresses', 'AddressesController');
Route::resource('messages', 'MessagesController');
Route::resource('posts', 'PostsController');
Route::resource('profiles', 'ProfilesController');
Route::resource('reservations', 'ReservationsController');
Route::resource('tags', 'TagsController');    
Route::resource('users', 'UsersController');


// Extra trash.

// Route::get('alt-index', function() {
//     $query = Post::with('user');
    
//     if (Input::has('search')) {
//         $search = '%' . Input::get('search') . '%';
        
//         $query->where('title', 'like', $search);
        
//         $query->orWhereHas('user', function($q) {
//             $search = '%' . Input::get('search') . '%';
            
//             $q->where('email', 'like', $search);
//         });

//         $query->orWhereHas('tags', function($q) {
//             $search = '%' . Input::get('search') . '%';
            
//             $q->where('name', 'like', $search);
//         });
//     }
    
//     $posts = $query->orderBy('created_at', 'desc')->paginate(4);
    
//     return View::make('posts.alt-index')->with('posts', $posts);
// });