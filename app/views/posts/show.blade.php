@extends('layouts.master')

@section('content')

<h1>{{{ $post->title }}}</h1>
<p>{{{ $post->body }}}</p>

<a href="{{{ action('PostsController@edit', $post->id) }}}">Edit Post</a>

@stop
