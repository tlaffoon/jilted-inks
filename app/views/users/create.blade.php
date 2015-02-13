@extends('layouts.awesome')

@section('content')

<div class="page-header"><h1>Create User</h1></div>

{{ Form::open(array('action' => 'UsersController@store')) }}
    
    @include('users.partials.form')
    
    <a href="/" class="btn btn-default">Cancel</a>
    {{ Form::submit('Create User', array('class' => 'btn btn-primary pull-right')) }}
{{ Form::close() }}

@stop

@section('bottomscript')
@stop