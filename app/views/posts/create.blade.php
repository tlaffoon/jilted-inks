@extends('layouts.master')

@section('content')

<div class="page-header"><h1>Create Post</h1></div>

<form action="{{{ action('PostsController@store') }}}" method="post">
    <div class="form-group {{{ $errors->has('title') ? 'has-error' : '' }}}">
        <label for="title">Post Title</label>
        <input type="text" id="title" name="title" class="form-control" value="{{{ Input::old('title') }}}" />
        {{ $errors->first('title', '<p class="help-block">:message</p>') }}
    </div>
    
    <div class="form-group {{{ $errors->has('body') ? 'has-error' : '' }}}">
        <label for="body">Post Body</label>
        <textarea id="body" name="body" class="form-control" rows="4">{{{ Input::old('body') }}}</textarea>
        {{ $errors->first('body', '<p class="help-block">:message</p>') }}
    </div>
    
    <input type="submit" value="Save Post" class="btn btn-primary">
</form>

@stop
