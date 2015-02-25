@extends('layouts.awesome')

@section('topscript')
@stop

@section('content')

<div class="col-md-12">
    <h3 class="page-header"> Send A Message! </h3>

        {{ Form:: open(array('action' => 'MessagesController@store')) }}

            {{ Form::label('name', 'Your Name') }}
            {{ Form::text('name', Input::old('name'), array('placeholder' => 'Name', 'class' => 'form-group form-control')) }}
            {{ $errors->first('name', '<span class="help-block text-warning">:message</span><br>') }}

            {{ Form::label('email', 'Your Email')}}
            {{ Form::text('email', Input::old('email'), array('placeholder' => 'user@domain.com', 'class' => 'form-group form-control')) }}
            {{ $errors->first('email', '<span class="help-block text-warning">:message</span><br>') }}

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