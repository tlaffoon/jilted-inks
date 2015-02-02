@extends('layouts.master')

@section('content')
    <h1> My Awesome Resume </h1>

    <a href="{{ action('HomeController@showPortfolio') }}">Click to view my portfolio of projects!</a>

    {{ $name }}
@stop
