@extends('layouts.awesome')

@section('content')

<div class="page-header"><h1>Blog Posts</h1></div>

@foreach ($posts as $post)

    <div class="blog-box img-rounded">

        <h3> {{{ $post->title }}} </h3>
        <h5>by {{{ $post->user->email }}}</h5>
        <p class="text-muted pull-right"><span class="glyphicon glyphicon-time"></span> Posted {{{ $post->updated_at->diffForHumans() }}}</p>
       
        <img class="img-responsive img-bordered" src="http://placehold.it/900x200" alt="">

        <div class="post-body">
            {{ $post->renderBody() }}
            <a href="{{{ action('PostsController@show', $post->slug) }}}" class="btn btn-default pull-right">View Post</a>
        </div>

    </div>

    <hr>

@endforeach
<div class="text-center">
    <!-- Pager -->
    {{ $posts->appends(array('search' => Input::get('search')))->links() }}
</div>

@stop
