@extends('layouts.master')

@section('content')
    <h1>My Awesome Portfolio of Projects and Work</h1>




    <a href="{{ action('HomeController@showResume', array('name' => $name)) }}">Click to view my resume</a>

@stop
