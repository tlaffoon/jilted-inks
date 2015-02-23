@extends('layouts.awesome')

@section('content')

<div class="page-header"><h1>Update Post</h1></div>

<div class="col-md-8">
    {{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'method' => 'put', 'files' => true)) }}        

        @include('posts.partials.form')
        
        <a href="{{{ action('PostsController@index') }}}" class="btn btn-default">Cancel</a>
        
        {{ Form::submit('Create Post', array('class' => 'btn btn-primary pull-right')) }}
    {{ Form::close() }}
</div>

<div class="col-md-4">
    @include('posts.partials.tag-form')
</div>

@stop

@section('bottomscript')
<script type="text/javascript">

    var title = $('#title');
    var $slug = $('#slug');
    var value;

    // Trigger callback function when title value changes
    title.on('change', function () {
        
        // Formats the slug from the value entered for title.
        value = title.val().replace(/[^a-z0-9\s]/gi, '');
        $slug.val(value.toLowerCase().trim().split(/\s+/).join('-'));

    });

</script>
@stop
