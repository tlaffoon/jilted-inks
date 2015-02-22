@extends('layouts.awesome')

@section('content')


<div class="row">
    <div class="col-md-6 col-md-offset-3">

        @if(Auth::check())

            <h3>You are already logged in.</h3>
            
        @else

        <h1 class="page-header">Please Sign In</h1>

        {{ Form::open(array('action' => 'HomeController@doLogin')) }}
            <div class="form-group">
                {{ Form::label('email', 'Email Address') }}
                {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class' => 'form-control')) }}
            </div>
            
            <div class="form-group">
                {{ Form::submit('Sign In!', array('class' => 'btn btn-primary pull-right')) }}
            </div>
        {{ Form::close() }}

        @endif

    </div>
</div>
@stop
