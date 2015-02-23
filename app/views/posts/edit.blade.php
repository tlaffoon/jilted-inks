@extends('layouts.awesome')

@section('content')

<div class="page-header"><h1>Update Post</h1></div>

<div class="col-md-8">
    {{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'method' => 'put', 'files' => true)) }}        

        @include('posts.partials.form')
        
        <a href="{{{ action('PostsController@index') }}}" class="btn btn-default">Cancel</a>
        
        {{ Form::submit('Save Post', array('class' => 'btn btn-primary pull-right')) }}
    {{ Form::close() }}
</div>

<div class="col-md-4">
    
    @include('posts.partials.tag-form')

    <h5 class="page-header">Tags</h5>
    <div id="tag-box">
        @foreach ($post->tags as $tag)
           <span class="badge"> {{ $tag->name }} </span>
        @endforeach
    </div>
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

    // Grab existing tags on page load
    tags = $('#tag-box').text().trim().split(/\s+/);

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

    });
});
</script>
@stop
