<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User();
		$this->saveUser($user);
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$user = User::findUser($id);
		return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findUser($id);
		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$user = User::findUser($id);
		$this->saveUser($user);
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
		return Redirect::route('users.index');
	}

	protected function saveUser($user)
	{
	    $input = Input::all();

	    $rules = array(
	    	'username'  => 'required|unique:users,username,' . $user->id,
	    	'name' => 'required|max:100',
	    	'email'  => 'required|unique:users,email,' . $user->id,
	    	'password' => 'required'
	    );

	    $validator = Validator::make($input, $rules);
	    
	    if ($validator->fails()) {

	        Log::info("User made a bad UsersController request", $input);

	        Session::flash('errorMessage', 'Failed to save your user!');

	        return Redirect::back()->withInput()->withErrors($validator);
	    
	    } else {
	        
	    	$user->username = Input::get('username');
	    	$user->name 	= Input::get('name');
	    	$user->email 	= Input::get('email');
	    	$user->password = Input::get('password');
	    	$user->save();

	        if (Input::hasFile('image') && Input::file('image')->isValid())
	        {
	            $user->addUploadedImage(Input::file('image'));
	            $user->save();
	        }

	        $user->save();

	        Session::flash('successMessage', 'User saved successfully!');

	        return Redirect::action('PostsController@index');
	    }
	}
}
