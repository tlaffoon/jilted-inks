<?php

class MessageController extends \BaseController {


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('contact');
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
            $message->content = Input::get('content');

            $message->save();

            Mail::send('emails.message', $data, function($message) use ($data) {
                $message->from($data['email'] , $data['name']);
                $message->to('tjl@thomasjlaffoon.com', 'Admin');
                $message->subject('Blog Contact Form');
            });

            Session::flash('message', 'Your message has been sent. Thank You!');

            // Redirect to page
            return Redirect::back();

        } else {
            //return contact form with errors
            Session::flash('error', 'There were errors submitting your form.  Did you include all fields?');
            return Redirect::back()->withInput()->withErrors($validator);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}