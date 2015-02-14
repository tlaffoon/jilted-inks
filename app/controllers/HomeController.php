<?php

class HomeController extends BaseController {

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

	public function showGeolocate() {
		return View::make('geolocate');
	}

	public function showAutocomplete() {
		return View::make('autocomplete');
	}

	public function showResume()
	{
		return View::make('resume');
	}

	public function showPortfolio()
	{
		return View::make('portfolio');
	}

	public function sayHello($name = 'No-Name', $age = 'timeless')
	{
    	return View::make('sayhello')->with('name', $name)->with('age', $age);
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
}

