@extends('layouts.awesome')

@section('content')

<div class="page-header"><h1>Blog Posts</h1></div>

@if(count($posts) == 0)

    <h3> No posts found. </h3>

@endif

@foreach ($posts as $post)

    <div class="col-md-12 blog-box img-rounded">

        <div class="col-md-8 text-left">
            <h3><a href="{{{ action('PostsController@show', $post->slug) }}}" class="blog-title"> {{{ $post->title }}} </a></h3>
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
                <img class="img-responsive img-bordered header-image" src="{{{ $post->img_path }}}" alt="">
            @else
                <img class="img-responsive img-bordered" src="http://placehold.it/900x200" alt="">
            @endif
        </div>

        <div class="col-md-12">
            <div class="post-body">
                {{ $post->renderBody() }}
            </div>
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
