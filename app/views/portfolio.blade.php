@extends('layouts.awesome')

@section('css')
<style type="text/css">
    .img-box {
        margin: 5px;
    }
</style>
@stop

@section('content')

<div class="col-md-10 col-md-offset-1">

    <h2 class="page-header">Portfolio</h2>

    <div class="row">
        <!-- <div class="col-md-4">
            <a href="/whack-a-mole">
                <img src="/includes/img/cat_whack_a_mole.png" class="img-responsive img-rounded img-box">
            </a>
        </div> -->
        <div class="col-md-4">
            <a href="/gmaps/">
                <img src="/includes/img/gmaps_logo.png" class="img-responsive img-rounded img-box">
            </a>
        </div>
        <div class="col-md-4">
            <img src="http://placehold.it/220x220" class="img-responsive img-rounded img-box">
        </div>
        <div class="col-md-4">
            <img src="http://placehold.it/220x220" class="img-responsive img-rounded img-box">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <img src="http://placehold.it/220x220" class="img-responsive img-rounded img-box">
        </div>
        <div class="col-md-4">
            <img src="http://placehold.it/220x220" class="img-responsive img-rounded img-box">
        </div>
        <div class="col-md-4">
            <img src="http://placehold.it/220x220" class="img-responsive img-rounded img-box">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <img src="http://placehold.it/220x220" class="img-responsive img-rounded img-box">
        </div>
        <div class="col-md-4">
            <img src="http://placehold.it/220x220" class="img-responsive img-rounded img-box">
        </div>
        <div class="col-md-4">
            <img src="http://placehold.it/220x220" class="img-responsive img-rounded img-box">
        </div>
    </div>
</div>

@stop
