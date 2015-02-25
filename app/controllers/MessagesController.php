<?php

class MessagesController extends \BaseController {

	/**
	 * Display a listing of messages
	 *
	 * @return Response
	 */
	public function index()
	{
		$messages = Message::all();

		return View::make('messages.index', compact('messages'));
	}

	/**
	 * Show the form for creating a new message
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('messages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    // Get all the input and store it inside variable.
	    $data = Input::all();

	    //Validate data
	    $validator = Validator::make(Input::all(), Message::$rules);

	    //If everything is correct than run passes.
	    if ($validator -> passes()) {

	        $message = new Message();
	        $message->name = Input::get('name');
	        $message->email = Input::get('email');
	        $message->subject = Input::get('subject');
	        $message->content = Input::get('content');
	        $message->save();

	        Session::flash('message', 'Your message has been sent. Thank You!');

	        // Redirect to page
	        return Redirect::to('/');

	    } else {
	        //return contact form with errors
	        Session::flash('error', 'There were errors submitting your form.  Did you include all fields?');
	        return Redirect::back()->withInput()->withErrors($validator);
	    }
	}

	/**
	 * Display the specified message.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$message = Message::findOrFail($id);

		return View::make('messages.show', compact('message'));
	}

	/**
	 * Show the form for editing the specified message.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$message = Message::find($id);

		return View::make('messages.edit', compact('message'));
	}

	/**
	 * Update the specified message in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$message = Message::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Message::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$message->update($data);

		return Redirect::route('messages.index');
	}

	/**
	 * Remove the specified message from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Message::destroy($id);

		return Redirect::route('messages.index');
	}

}
