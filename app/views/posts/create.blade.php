@extends('layouts.master')

@section('content')

<div class="page-header"><h1>Create Post</h1></div>

{{ Form::open(array('action' => 'PostsController@store')) }}
    @include('posts.form')
    
    <a href="{{{ action('PostsController@index') }}}" class="btn btn-default">Nevermind</a>
    {{ Form::submit('Create Post', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

@stop
