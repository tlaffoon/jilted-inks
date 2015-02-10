<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostsController extends \BaseController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->beforeFilter('auth', array('except' => array('index', 'show')));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $query = Post::with('user');
        
        if (Input::has('search')) {
            $search = '%' . Input::get('search') . '%';
            
            $query->where('title', 'like', $search);
            
            $query->orWhereHas('user', function($q) {
                $search = '%' . Input::get('search') . '%';
                
                $q->where('email', 'like', $search);
            });
        }
        
        $posts = $query->orderBy('created_at', 'desc')->paginate(4);
        
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
        
        $post->user_id = Auth::id();
        
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

            if (ctype_digit($id)) {
                $post = Post::findOrFail($id);
            } else {
                $post = Post::where('slug', '=', $id)->firstOrFail();
            }

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

            if (ctype_digit($id)) {
                $post = Post::findOrFail($id);
            } else {
                $post = Post::where('slug', '=', $id)->firstOrFail();
            }

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
            
            if (ctype_digit($id)) {
                $post = Post::findOrFail($id);
            } else {
                $post = Post::where('slug', '=', $id)->firstOrFail();
            }

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
        try {
            
            if (ctype_digit($id)) {
                $post = Post::findOrFail($id);
            } else {
                $post = Post::where('slug', '=', $id)->firstOrFail();
            }

        } catch (ModelNotFoundException $e) {
            Log::warning("User made a bad PostsController request", array('id' => $id));
            App::abort(404);
        }
        
        $post->delete();
        
        Session::flash('successMessage', 'Post deleted!');
        
        return Redirect::action('PostsController@index');
    }

    protected function savePost($post)
    {
        $input = Input::all();

        $rules = array(
                'title' => 'required|max:100',
                'body'  => 'required',
                'slug' => 'required|unique:posts,slug,'.$post->id
            );

        $validator = Validator::make($input, $rules);
        
        if ($validator->fails()) {

            Log::info("User made a bad PostsController request", $input);

            Session::flash('errorMessage', 'Failed to save your post!');

            return Redirect::back()->withInput()->withErrors($validator);
        
        } else {
            
            $post->title = Input::get('title');
            $post->body  = Input::get('body');
            $post->slug  = Input::get('slug');
            $post->save();

            Session::flash('successMessage', 'Post saved successfully!');

            return Redirect::action('PostsController@show', $post->slug);
        }
    }
}
