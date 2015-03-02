@extends('layouts.awesome')

@section('content')

<div class="page-header"><h1>Blog Posts</h1></div>

@if(count($posts) == 0)

    <h3> No posts found. </h3>

@endif

@foreach ($posts as $post)

    <div class="col-md-12 blog-box img-rounded">

        <div class="col-md-12">
            <p class="text-muted pull-right">
                <span class="glyphicon glyphicon-time"></span> 
                Posted {{{ $post->updated_at->diffForHumans() }}}
            </p>        
        </div>

        {{-- Header Image --}}
        <div class="col-md-3">
            @if(!empty($post->img_path))
                <a href="{{{ action('PostsController@show', $post->slug) }}}">
                    <img class="img-responsive img-rounded" src="{{{ $post->img_path }}}" alt="">
                </a>
            @else
                <a href="{{{ action('PostsController@show', $post->slug) }}}">
                    <img class="img-responsive img-rounded" src="http://placehold.it/200x200" alt="">
                </a>
            @endif
        </div>

        {{-- Header Text / Link --}}
        <div class="col-md-9">
            
                <h4><a href="{{{ action('PostsController@show', $post->slug) }}}" class="blog-title"> {{{ $post->title }}} </a></h4>
                <h5>by {{{ $post->user->username }}}</h5>
                
                <div class="post-body">
                    {{ $post->description }}
                </div>

        </div>

        <div class="col-md-12 text-center">
            @foreach ($post->tags as $tag)
                <a href="/posts?search={{{$tag->name}}}" class="badge">{{ $tag->name }}</a>
            @endforeach
        </div>

        <div class="col-md-12">
            <a href="{{{ action('PostsController@show', $post->slug) }}}" class="btn btn-default pull-right">View Post</a>
        </div>

    </div>

@endforeach

<div class="text-center blog-links">
    <!-- Pager -->
    {{ $posts->appends(array('search' => Input::get('search')))->links() }}
</div>

@stop

@section('bottomscript')
<script type="text/javascript">
    $(document).ready(function() {
        $('.blog-box').hide();
        $('.blog-box').fadeDelay();

        $('.blog-links').hide();
        $('.blog-links').fadeDelay();
    });
</script>
@stop