@extends('layouts.awesome')

@section('css')
@stop

@section('topscript')
@stop

@section('content')

    <div class="row">
        <h2 class="page-header">
            Manage Your Posts
        </h2>
   
        @if (count($posts) == 0)
            <h4>No posts found.</h4>
        @else

            <table class="table table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Author</th>
                    <th>Action</th>
                </tr>

                @foreach ($posts as $key => $post)
                <tr>
                    <td>{{{ $post->id }}}</td>
                    <td>{{{ $post->title }}}</td>
                    <td>{{{ $post->slug }}}</td>
                    <td>{{{ $post->user->username }}}</td>
                    <td width="140">
                        <div class="btn-group">
                            <a href="{{{ action('PostsController@show', $post->id) }}}" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </a>
                            <a href="{{{ action('PostsController@edit', $post->id) }}}" class="btn btn-default">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-default btn-danger deletePost" data-postid="{{{ $post->id }}}">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>

            <div class="text-center">
                {{ $posts->links() }}
            </div>

            {{ Form::open(array('action' => 'PostsController@destroy', 'id' => 'deleteForm', 'method' => 'DELETE')) }}
            {{ Form::close() }}

        @endif

    </div>
@stop

@section('bottomscript')
<script type="text/javascript">
    $(document).ready( function() {
        $(".deletePost").click(function() {
            var postID = $(this).data('postid');
            $("#deleteForm").attr('action', '/posts/' + postID);
            if (confirm("Are you sure you want to delete this post?")) {
                $('#deleteForm').submit();
            }
        }); 

        $('.clickable').click(function() {
            var postID = $(this).data('postid');
            window.location('/posts/' + postID);
        });
   });


</script>
@stop