@extends('layouts.awesome')

@section('css')
<link rel="stylesheet" type="text/css" href="/includes/css/jquery.tagsinput.css" />
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

    <div class="col-md-8">
        
        @include('posts.partials.form')
            
        <a href="{{{ action('PostsController@index') }}}" class="btn btn-default">Cancel</a>
            
        {{ Form::submit('Save', array('class' => 'btn btn-primary pull-right')) }}
        {{ Form::close() }}
        
    </div>

    <div class="col-md-4">
        {{-- Display post series information if applicable --}}
        @if(isset($post) && $post->series != '')
            <a href="{{{ action('SeriesController@edit', $post->series->id) }}}" class="btn btn-default btn-xs pull-right"> <i class="fa fa-edit"></i></a>
            <p> Number #{{{ $post->order }}} in "<a href="{{{ action('SeriesController@show', $post->series->id) }}}">{{ $post->series->name }}</a>" series.</p>
        @else
            {{ Form::label('series', 'Assign to post series?') }}
            <span class="pull-right">
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#seriesCreateModal"> <i class="fa fa-plus"></i></button>
            </span>

            {{ Form::select('series', array('default' => Input::old('series')) + $series, 'default', array('class' => 'form-group form-control')) }}

            @include('modals.series.create')

        @endif
    </div>

</div>

@stop

@section('bottomscript')

<script type="text/javascript" src="/includes/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/includes/js/jquery.tagsinput.js"></script>

<script type="text/javascript">

</script>


<script type="text/javascript">
$(document).ready(function() {
    
    // TinyMCE Initialization
    tinymce.init({
        selector: "#wysiwyg",
        plugins: [
            "advlist autolink lists link image charmap preview anchor",
            "searchreplace visualblocks code",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });

    // init tag editor
    $('#txtTags').tagsInput();

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