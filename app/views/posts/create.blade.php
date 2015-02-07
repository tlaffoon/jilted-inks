@extends('layouts.awesome')

@section('content')

<div class="page-header"><h1>Create Post</h1></div>

{{ Form::open(array('action' => 'PostsController@store')) }}
    
    @include('posts.partials.form')
    
    <a href="{{{ action('PostsController@index') }}}" class="btn btn-default">Nevermind</a>
    {{ Form::submit('Create Post', array('class' => 'btn btn-primary pull-right')) }}
{{ Form::close() }}

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
