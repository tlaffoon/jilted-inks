@extends('layouts.awesome')

@section('content')
<div class="blog-box img-rounded">

    <h3> {{{ $post->title }}} </h3>
    <h5>by {{{ $post->user->email }}}</h5>
    <p class="text-muted pull-right"><span class="glyphicon glyphicon-time"></span> Posted {{{ $post->updated_at->diffForHumans() }}}</p>
   
    <img class="img-responsive img-bordered" src="http://placehold.it/900x200" alt="">

    <div class="post-body">
        <p>{{{ $post->body }}}</p>
        @if (Auth::check())
            <a href="{{{ action('PostsController@edit', $post->slug) }}}" class="btn btn-default pull-right">Edit Post</a>
            
            {{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'delete')) }}
                {{ Form::submit('Delete Post', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
        @endif
    </div>

</div>
@stop
