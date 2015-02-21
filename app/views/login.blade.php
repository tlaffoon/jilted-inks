@extends('layouts.awesome')

@section('content')


<div class="row">
    <div class="col-md-6 col-md-offset-3">
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

    </div>
</div>
@stop
