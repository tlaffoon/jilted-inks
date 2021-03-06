@extends('layouts.awesome')

@section('css')
<link rel="stylesheet" type="text/css" href="/includes/css/pagedown.css" />
<link rel="stylesheet" type="text/css" href="/includes/css/jquery.tagsinput.css" />
<style type="text/css">
    #description {
         white-space: pre-wrap;
    }
</style>
<style type="text/css">
    .preview {
        margin-top: 20px;
    }
</style>
@stop

@section('content')

<h1 class="page-header">
    @if (isset($post))
            <h2>Edit Post: {{{ $post->title }}}</h2>
        {{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'class'=>'form', 'role'=>'form', 'method' => 'PUT', 'files' => true)) }}
    @else
            <h2>Create New Post</h2>
        {{ Form::open(array('action' => 'PostsController@store'), array('files' => true)) }}
    @endif
</h1>

<div class="row">

<div class="col-md-6">
    {{ Form::open(array('action' => 'PostsController@store', 'files' => true)) }}
        
        @include('posts.partials.form')
        
        <a href="{{{ action('PostsController@index') }}}" class="btn btn-default">Cancel</a>
        
        {{ Form::submit('Create Post', array('class' => 'btn btn-primary pull-right')) }}
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

    var tags = [];
    var tag;

    // Trigger callback function when title value changes
    title.on('change', function () {
        
        // Formats the slug from the value entered for title.
        value = title.val().replace(/[^a-z0-9\s]/gi, '');
        $slug.val(value.toLowerCase().trim().split(/\s+/).join('-'));

    });
    // End slug generation




    // $('#addTagForm').on('submit', function (e) {
    //     e.preventDefault();
        
    //     // grab tag value
    //     tag = $('#addTagForm :input').val();

    //     // sanitize that input
    //     // ... 

    //     // add to array
    //     tags.push(tag);

    //     // reset add tag from input value
    //     $('#addTagForm :input').val('');

    //     // Reset Tag Box
    //     $('#tag-box').html('');

    //     // Add Tag Values to Tag Box
    //     for (var i = 0; i < tags.length; i++) {
    //         $('#tag-box').append('<span class="badge">' + tags[i] + '</span>');
    //     };

    //     // Update Form Input w/Tags Array
    //     $('#tag_list').val(tags);

    // });

});
</script>
@stop