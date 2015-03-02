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

	public function sendEmail() {

		// Get all the input and store it inside variable.
		$data = Input::all();

		//Validate data
		$validator = Validator::make(Input::all(), Message::$rules);

		//If everything is correct than run passes.
		if ($validator->passes()) {

			// Store message in db
		    $message = new Message();
		    $message->name = Input::get('name');
		    $message->email = Input::get('email');
		    $message->phone = Input::get('phone');
		    $message->content = Input::get('content');
		    $message->save();

		    // Fire off message with data.
		    Mailgun::send('emails.message', $data, function($message) use ($data) {
		        $message->from($data['email'] , $data['name']);
		        $message->to($_ENV['DEFAULT_USER_EMAIL'], $_ENV['DEFAULT_USER_NAME']);
		        $message->subject($data['subject']);
		    });

			Session::flash('successMessage', 'Your message has been sent. Thank You!');

			// Redirect back with success.
			return Redirect::back();
		
		} else {
			
			Session::flash('errorMessage', 'There was a problem validating your input.');
			
			// Redirect back with errors etc.
			return Redirect::back()->withInput()->withErrors($validator);
		}
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

