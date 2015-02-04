<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostsController extends \BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::paginate(4);
        return View::make('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $post = new Post();
        return $this->savePost($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $post = Post::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::warning("User made a bad PostsController request", array('id' => $id));
            App::abort(404);
        }

        return View::make('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        try {
            $post = Post::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::warning("User made a bad PostsController request", array('id' => $id));
            App::abort(404);
        }

        return View::make('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        try {
            $post = Post::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Log::warning("User made a bad PostsController request", array('id' => $id));
            App::abort(404);
        }

        return $this->savePost($post);
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

    protected function savePost($post)
    {
        $input = Input::all();

        $validator = Validator::make($input, Post::$rules);
        
        if ($validator->fails()) {

            Log::info("User made a bad PostsController request", $input);

            Session::flash('errorMessage', 'Failed to save your post!');

            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            $post->title = Input::get('title');
            $post->body  = Input::get('body');

            $post->save();

            Session::flash('successMessage', 'Post saved successfully!');

            return Redirect::action('PostsController@show', $post->id);
        }
    }
}
