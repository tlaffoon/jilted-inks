@extends('layouts.master')

@section('content')

<div class="page-header"><h1>Blog Posts</h1></div>

@foreach ($posts as $post)
    <article>
        <h2>{{{ $post->title }}}</h2>
        <p>{{{ $post->body }}}</p>
        
        <a href="{{{ action('PostsController@show', $post->id) }}}">Read More</a>
    </article>
@endforeach

{{ $posts->links() }}

@stop
