@extends('layouts.awesome')

@section('css')
@stop

@section('topscript')
@stop

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1">

        <h3 class="page-header">Sitemap</h3>

        {{ Post::generateSiteMap() }}

    </div>
</div>

@stop

@section('bottomscript')
@stop