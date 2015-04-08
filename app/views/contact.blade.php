@extends('layouts.awesome')

@section('topscript')
<style type="text/css">

    #info-box {
        font-size: 18px;
    }

</style>
@stop

@section('content')

<div class="col-md-6 col-md-offset-3">
    <h3 class="page-header"> Send A Message! </h3>
    <p id="info-box" class="text-center">Please enter your contact information below.</p>

    <hr>

        {{ Form::open(array('action' => 'HomeController@sendEmail')) }}

            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', Input::old('name'), array('placeholder' => 'Name', 'class' => 'form-group form-control')) }}
            {{ $errors->first('name', '<span class="help-block text-warning">:message</span><br>') }}

            {{ Form::label('email', 'Email')}}
            {{ Form::text('email', Input::old('email'), array('placeholder' => 'Email', 'class' => 'form-group form-control')) }}
            {{ $errors->first('email', '<span class="help-block text-warning">:message</span><br>') }}

            {{ Form::label('phone', 'Phone')}}
            <div class="text-muted pull-right"><small>This field is optional.</small></div>
            {{ Form::text('phone', Input::old('phone'), array('placeholder' => 'Phone', 'class' => 'form-group form-control')) }}
            {{ $errors->first('phone', '<span class="help-block text-warning">:message</span><br>') }}

            {{ Form::label('subject', 'Subject')}}
            {{ Form::text('subject', Input::old('subject'), array('placeholder' => 'Subject', 'class' => 'form-group form-control')) }}
            {{ $errors->first('subject', '<span class="help-block text-warning">:message</span><br>') }}

            {{ Form::label('content', 'Message') }}
            {{ Form::textarea('content', Input::old('content'), array('placeholder' => 'Once upon a time in a land far, far away...', 'class' => 'form-group form-control', 'rows' => '4' )) }}
            {{ $errors->first('content', '<span class="help-block text-warning">:message</span><br>') }}

            {{ Form::hidden('honey_pot', null) }}

        {{ Form::submit('Submit', array('class' => 'btn btn-default pull-right')) }}
        {{ Form::close() }}
</div>
@stop

@section('bottomscript')
@stop