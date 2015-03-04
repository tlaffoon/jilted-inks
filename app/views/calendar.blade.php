@extends('layouts.awesome')

@section('css')
@stop

@section('topscript')



<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h2 class="page-header">Make A Reservation</h2>
        {{ $calendar->generate() }}
    </div>
</div>

@stop

@section('content')
@stop

@section('bottomscript')
@stop