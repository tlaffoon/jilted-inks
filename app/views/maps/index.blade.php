@extends('layouts.awesome')

@section('css')
@stop

@section('topscript')
@stop

@section('content')

    <h2 class="page-header">Google Maps Demo Index</h2>

    <div class="col-md-12">

        <p>These are some of the pages available to help you figure out the Google Maps features.</p>

        <ul>
            <li><a href="/gmaps/autocomplete">Autocomplete Form</a></li>
            <li><a href="/gmaps/geocode">Geocoding An Address</a></li>
            <li><a href="/gmaps/markers">Plotting Multiple Markers</a></li>
            <li><a href="/gmaps/ajax">Performing Ajax Requests</a></li>
            <li><a href="/gmaps/search">Searching For Addresses</a></li>
            <li><a href="/gmaps/distance-query">Distance Queries Using MySQL</a></li>
        </ul>

        <p>This is an additional resource which can help you customize your map, and its behavior:
            <a href="https://code.tutsplus.com/courses/custom-interactive-maps-with-the-google-maps-api">Tuts+ Tutorial</a>
        </p>
    </div>

    <div class="col-md-12">
        <div class="row">
            <a href="/gmaps/autocomplete" class="btn btn-default pull-right"><i class="fa fa-arrow-right"></i></a>
        </div>
    </div>

@stop

@section('bottomscript')
@stop