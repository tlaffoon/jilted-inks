@extends('layouts.awesome')

@section('css')
@stop

@section('topscript')
@stop

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">

        <h3 class="page-header">Sitemap</h3>

        @foreach ($posts as $post)
            {{ $post->childList($post) }}
        @endforeach


        {{--  Doesn't recurse --}}
{{--         @foreach ($posts as $post)
            <ul>
                <li>
                    <a href="{{{ action('PostsController@show', $post->id) }}}"></a> {{ $post->title }}
                        @foreach($post->children as $child)
                            <ul>
                                <li><a href="{{{ action('PostsController@show', $post->id) }}}"></a> {{ $post->title }}</li>
                            </ul>
                        @endforeach
                </li>
            </ul>
        @endforeach --}}

    </div>
</div>

@stop

@section('bottomscript')
@stop