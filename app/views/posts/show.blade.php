@extends('layouts.awesome')

@section('content')
<div class="col-md-12 blog-box img-rounded">

    <div class="col-md-8 text-left">
        <h3><a href="{{{ action('PostsController@show', $post->slug) }}}"> {{{ $post->title }}} </a></h3>
        <h5>by {{{ $post->user->username }}}</h5>  
    </div>

    <div class="col-md-4">
        <p class="text-muted text-right">
            <span class="glyphicon glyphicon-time"></span> 
            Posted {{{ $post->updated_at->diffForHumans() }}}
        </p>
    </div>

    <div class="col-md-12">
        @if(!empty($post->img_path))
            <img class="img-responsive img-bordered" src="{{{ $post->img_path }}}" alt="">
        @else
            <img class="img-responsive img-bordered" src="http://placehold.it/900x200" alt="">
        @endif
    </div>

    <div class="col-md-12">
        <div class="post-body">
            {{ $post->renderBody() }}
        </div>
    </div>

    <div class="col-md-6">
        @if (Auth::check())
            {{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'delete')) }}
                {{ Form::submit('Delete Post', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
        @endif
    </div>
    <div class="col-md-6">
        <a href="{{{ action('PostsController@edit', $post->slug) }}}" class="btn btn-default pull-right">Edit Post</a>
    </div>
</div>
@stop
