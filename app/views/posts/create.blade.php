@extends('layouts.master')

@section('content')

<form action="{{{ action('PostsController@store') }}}" method="post">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" id="title" name="title" class="form-control" value="{{{ Input::old('title') }}}" />
        {{ $errors->first('title', '<p class="help-block">:message</p>') }}
    </div>
    <div class="form-group">
        <label for="body">Post Body</label>
        <textarea id="body" name="body" class="form-control">{{{ Input::old('body') }}}</textarea>
        {{ $errors->first('body', '<p class="help-block">:message</p>') }}
    </div>
    <input type="submit" value="Save Post">
</form>

@stop
