@extends('layouts.awesome')

@section('css')
<style type="text/css">
    #disqus_thread {
        margin-top: 10px;
    }
</style>
@stop

@section('content')
<div class="row">
    <div class="col-md-12 blog-box img-rounded">

        <div class="col-md-8 text-left">
            <h3> {{{ $post->title }}} </h3>
            <h5>by {{{ $post->user->username }}}</h5>
        </div>

        <div class="col-md-4">
            <p class="text-muted text-right">
                <span class="glyphicon glyphicon-time"></span> 
                Posted {{{ $post->updated_at->diffForHumans() }}}
            </p>
        </div>

        <div class="col-md-12 text-center">
            @if(!empty($post->img_path))
                <img class="img-responsive img-bordered header-image" src="{{{ $post->img_path }}}" alt="">
            @else
                <img class="img-responsive img-bordered" src="http://placehold.it/900x200" alt="">
            @endif
        </div>

        <div class="col-md-12 text-center">
            @foreach ($post->tags as $tag)
                <a href="/posts?search={{{$tag->name}}}" class="badge">{{ $tag->name }}</a>
            @endforeach
        </div>

        <div class="col-md-12">
            <div class="post-body">
                {{ $post->renderBody() }}
            </div>
        </div>

        @if (Auth::check())
            <div class="col-md-6">
                    {{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'delete')) }}
                        {{ Form::submit('Delete Post', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
            </div>
            <div class="col-md-6">
                <a href="{{{ action('PostsController@edit', $post->slug) }}}" class="btn btn-default pull-right">Edit Post</a>
            </div>
        @endif
    </div>
</div>

<div class="row">
    <div id="disqus_thread" class="col-md-12"></div>
</div>

@stop

@section('bottomscript')
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'consideratecoder'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@stop
