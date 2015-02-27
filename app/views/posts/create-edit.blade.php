@extends('layouts.awesome')

@section('css')
<link rel="stylesheet" type="text/css" href="/includes/css/pagedown.css" />
<link rel="stylesheet" type="text/css" href="/includes/css/jquery.tagsinput.css" />
<style type="text/css">
    .preview {
        margin-top: 20px;
    }
</style>
@stop

@section('content')

<div class="page-header">
    @if (isset($post))
            <h2>Edit Post: {{{ $post->title }}}</h2>
        {{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'class'=>'form', 'role'=>'form', 'method' => 'PUT', 'files' => true)) }}
    @else
            <h2>Create New Post</h2>
        {{ Form::open(array('action' => 'PostsController@store'), array('files' => true)) }}
    @endif
</div>

<div class="row">

<div class="col-md-6">
    {{ Form::open(array('action' => 'PostsController@store', 'files' => true)) }}
        
        @include('posts.partials.form')
        
        <a href="{{{ action('PostsController@index') }}}" class="btn btn-default">Cancel</a>
        
        {{ Form::submit('Save', array('class' => 'btn btn-primary pull-right')) }}
    {{ Form::close() }}
</div>

<div class="col-md-6">
    {{ Form::label('', 'Preview')}}
    <div id="wmd-preview" class="wmd-panel wmd-preview"></div>
</div>

</div>

@stop

@section('bottomscript')
<script type="text/javascript" src="/includes/js/Markdown.Converter.js"></script>
<script type="text/javascript" src="/includes/js/Markdown.Sanitizer.js"></script>
<script type="text/javascript" src="/includes/js/Markdown.Editor.js"></script>
<script type="text/javascript" src="/includes/js/jquery.tagsinput.js"></script>

<script type="text/javascript">
$(document).ready(function() {

    // WMD WSIWYG Editor
    (function () {
        // init the markdown editor and preview
        var converter = Markdown.getSanitizingConverter();
        var editor = new Markdown.Editor(converter);
        editor.run();

        // init tag editor
        $('#txtTags').tagsInput();
    })();
    
    // Handle slug generation
    var title = $('#title');
    var $slug = $('#slug');
    var value;

    // Trigger callback function when title value changes
    title.on('change', function () {
        
        // Formats the slug from the value entered for title.
        value = title.val().replace(/[^a-z0-9\s]/gi, '');
        $slug.val(value.toLowerCase().trim().split(/\s+/).join('-'));

    });
    // End slug generation

    // Limit characters in description field
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