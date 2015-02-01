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

	public function showResume($name)
	{
		return View::make('resume')->with('name', $name);
	}

	public function showPortfolio()
	{
		return View::make('portfolio');
	}

	public function showParks()
	{
	    return View::make('parks');
	}

	public function showWelcome()
	{
		return Redirect::action('HomeController@sayHello', array('name' => $name));
	}

	public function sayHello($name = 'No-Name', $age = 'timeless')
	{
    	return View::make('sayhello')->with('name', $name)->with('age', $age);
	}

}

