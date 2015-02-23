<?php

class HomeController extends \BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showHome() {
		return Redirect::action('PostsController@index');
	}

	public function showLogin()
	{
		return View::make('login');
	}
	
	public function doLogin()
	{
		$email    = Input::get('email');
		$password = Input::get('password');
		
		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
			Session::flash('successMessage', "Login successful.");
			
		    return Redirect::intended('/');
		} else {
			Session::flash('errorMessage', 'Failed to log in!');
			
		    return Redirect::action('HomeController@showLogin');
		}
	}
	
	public function doLogout()
	{
		Auth::logout();
		Session::flash('successMessage', 'Logout successful.');
		return Redirect::action('HomeController@showHome');
	}

	public function showResume()
	{
		return View::make('resume');
	}

	public function showPortfolio()
	{
		return View::make('portfolio');
	}

	public function showGmaps() {
		return View::make('maps.index');
	}

	public function showAutocomplete() {
		return View::make('maps.autocomplete');
	}

	public function showGeocode() {
		return View::make('maps.geocode');
	}

	public function showMarkers() {
		return View::make('maps.markers');
	}

	public function showAjax() {
		return View::make('maps.ajax');
	}
}

