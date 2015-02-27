@extends('layouts.awesome')

@section('topscript')
    <link rel="stylesheet" type="text/css" href="/includes/css/pagedown.css" />
    <link rel="stylesheet" type="text/css" href="/includes/css/jquery.tagsinput.css" />
    <style type="text/css">
        #description {
             white-space: pre-wrap;
        }
    </style>
@stop

@section('content')

<div class="row">

    <div class="col-md-6"> <!-- begin left container -->

        <div class="clearfix"></div>

        <div class="page-header">

        @if (isset($post))
                <h2>Edit Post: {{{ $post->title }}}</h2>
            {{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'class'=>'form', 'role'=>'form', 'method' => 'PUT', 'files' => true)) }}
        @else
                <h2>Create New Post</h2>
            {{ Form::open(array('action' => 'PostsController@store'), array('files' => true)) }}
        @endif

        </div>

        <div class="clearfix"></div>

        {{ Form::label('', 'Body') }}
        <div id="wmd-button-bar"></div>
        {{ Form::textarea('body', Input::old('body'), array('id' => 'wmd-input', 'class' => 'wmd-input wmd-panel form-group form-control')) }}
        {{ $errors->first('body', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', Input::old('title'), array('class' => 'form-group form-control')) }}
        {{ $errors->first('title', '<span class="help-block"><p class="text-warning">:message</span></p><br>') }}

        <div id="characterLeft" class="pull-right"></div>
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', Input::old('description'), array('rows' => '5', 'class' => 'form-group form-control', 'maxlength' => '400')) }}
        {{ $errors->first('description', '<span class="help-block"><p class="text-warning">:message</p></span><br>')}}

        <div class="form-group {{ $errors->has('tag_list') ? 'has-error' : '' }}">
            {{ Form::label('tag_list', 'Tags') }}
            {{ Form::text('tag_list', null, array('class' => 'form-group form-control', 'id' => 'txtTags')) }}
            {{ $errors->first('tag_list', '<span class="help-block">:message</span>') }}
        </div>

        {{ Form::label('image', 'Image') }}
        {{ Form::file('image', array('class' => 'form-group')) }}
        {{ $errors->first('image', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

        <div class="clearfix"></div>

        {{ Form::submit('Submit', array('class' => 'btn btn-default pull-right')) }}
        {{ Form::close() }}

    </div> <!-- end left container -->

    <div class="col-md-6"> <!-- begin right container -->

        <div class="page-header">
            <h2 class="text-right"> Post Preview </h2>
        </div>

{{--         @foreach (Tag::getAll() as $tag)
            <a href="{{ action('TagsController@show', $tag->name) }}" class="tag-link">
                <span class="label label-primary"><span class="glyphicon glyphicon-tag"></span> {{{ $tag->name }}} </span> 
            </a> 
        @endforeach --}}

        <br>
        <div class="clearfix"></div>

        <div id="wmd-preview" class="wmd-panel wmd-preview"></div>

        <div class="clearfix"></div>

    </div> <!-- end right container -->

    </div>

    @if (!empty($post->img_path))

        <div class="container col-md-12">
            <div class="page-header">
                <h2> Image Preview </h2>
            </div>

            <img src="{{{ $post->img_path }}}" class="img-responsive" alt="">
        </div>

    @endif
@stop

@section('bottomscript')
<script type="text/javascript" src="/includes/js/Markdown.Converter.js"></script>
<script type="text/javascript" src="/includes/js/Markdown.Sanitizer.js"></script>
<script type="text/javascript" src="/includes/js/Markdown.Editor.js"></script>
<script type="text/javascript" src="/includes/js/jquery.tagsinput.js"></script>

<script type="text/javascript">
$(document).ready(function() {

    (function () {

    // init the markdown editor and preview
    var converter = Markdown.getSanitizingConverter();
    var editor = new Markdown.Editor(converter);
    editor.run();

    // init tag editor
    $('#txtTags').tagsInput();

    })();

    // Count characters in description field
    var charLeft = $('#characterLeft');
    var descField = $('#description');

    charLeft.text('400 characters left.');
    descField.on("keyup focus", function () {
        var max = 400;
        var descValue = $(this).val().slice(0, max);
        var len = $(this).val().length;

        if (len >= max) {
            descField.val(descValue);
            charLeft.addClass('text-danger');
            charLeft.text('You have reached the character limit.');
        } else {
            var ch = max - len;
            charLeft.removeClass('text-danger');
            charLeft.text(ch + ' characters left.');
        }
    });
});
</script>

@stop