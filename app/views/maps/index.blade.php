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
            <li><a href="/autocomplete">Autocomplete Form</a></li>
            <li><a href="/geocode">Geocoding An Address</a></li>
            <li><a href="/markers">Plotting Multiple Markers</a></li>
            <li><a href="/ajax">Performing Ajax Requests</a></li>
            <li><a href="/search">Searching For Addresses</a></li>
            <li><a href="/distance-query">Distance Queries Using MySQL</a></li>
        </ul>

        <p>This is an additional resource which can help you customize your map, and its behavior:
            <a href="https://code.tutsplus.com/courses/custom-interactive-maps-with-the-google-maps-api">Tuts+ Tutorial</a>
        </p>
    </div>

@stop

@section('bottomscript')
@stop