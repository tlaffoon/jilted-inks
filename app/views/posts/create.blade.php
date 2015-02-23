@extends('layouts.awesome')

@section('content')

<h1 class="page-header">Create Post</h1>

<div class="col-md-8">
    {{ Form::open(array('action' => 'PostsController@store', 'files' => true)) }}
        
        @include('posts.partials.form')
        
        <a href="{{{ action('PostsController@index') }}}" class="btn btn-default">Cancel</a>
        
        {{ Form::hidden('tag_list', null, array('id' => 'tag_list')) }}

        {{ Form::submit('Create Post', array('class' => 'btn btn-primary pull-right')) }}
    {{ Form::close() }}
</div>

<div class="col-md-4">
    
    <form id="addTagForm" action="/addTag" method="POST">
        <label for="tag">Add Tag</label>
        <div class="input-group">
            <input type="text" class="form-control" name="tag">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus-square-o"></i>
                </button>
            </span>
        </div>
    </form>

    <h5 class="page-header">Tags</h5>
    <div id="tag-box"></div>
</div>

@stop

@section('bottomscript')
<script type="text/javascript">

$(document).ready(function() {
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

    $('#addTagForm').on('submit', function (e) {
        e.preventDefault();
        
        // grab tag value
        tag = $('#addTagForm :input').val();

        // sanitize that input
        // ... 

        // add to array
        tags.push(tag);
        // console.log(tags);

        // reset add tag from input value
        $('#addTagForm :input').val('');

        // Reset Tag Box
        $('#tag-box').html('');

        // Add Tag Values to Tag Box
        for (var i = 0; i < tags.length; i++) {
            $('#tag-box').append('<span class="badge">' + tags[i] + '</span>');
        };

        // Update Form Input w/Tags Array
        $('#tag_list').val(tags);
        // console.log($('#tag_list').val());

    });
});


</script>
@stop