@extends('layouts.awesome')

@section('css')
@stop

@section('topscript')
{{ $calendar->generate() }}
@stop

@section('content')
@stop

@section('bottomscript')
@stop