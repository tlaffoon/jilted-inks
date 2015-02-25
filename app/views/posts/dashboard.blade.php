@extends('layouts.awesome')

@section('css')
@stop

@section('topscript')

{{-- @include('layouts.partials.sidebar') --}}


    <div class="col-md-12">
        <h2 class="page-header">
            Manage Your Posts
        </h2>
    
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th width="60">Delete?</th>
            </tr>

            @foreach ($posts as $key => $post)
            <tr>
                <td>{{{ $post->id }}}</td>
                <td>{{{ $post->title }}}</td>
                <td>{{{ $post->user->username }}}</td>
                <td>
                    <a href="{{{ action('PostsController@destroy', $post->id) }}}" class="btn btn-default btn-danger btn-block"><i class="fa fa-trash-o fa-2x"></i></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

@stop

@section('content')
@stop

@section('bottomscript')
@stop