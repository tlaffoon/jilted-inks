@extends('layouts.awesome')

@section('css')
<style type="text/css">
    
    .no-padding {
        padding-left: 0px;
        padding-right: 0px;
    }

    #map-canvas {
        margin-top: 15px;
        height: 350px;
    }

    #autocomplete {
        width: 90%;
    }

</style>
@stop

@section('topscript')
    
    <script src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
    
    <script src="/includes/geocomplete/jquery.geocomplete.js"></script>
@stop

@section('content')
    
    <h2 class="page-header">Google Maps JavaScript API v3 <small>Geocoding An Address</small></h2>

    <div class="col-md-12">
        <div class="row">
            <p>This is an example of geocoding with a map option specified, using the <a href="https://github.com/ubilabs/geocomplete#adding-a-map-preview">Geocomplete Jquery Plugin.</a></p>
        </div>
    </div>

    <div class="col-md-12   ">

        {{ Form::open(array('url' => '/geocode', 'class' => 'form-inline')) }}
        
        <div class="row">
            {{ Form::text('autocomplete', null, array('id' => 'autocomplete', 'class' => 'form-group form-control', 'placeholder' => 'Enter your address...')) }}
            {{ Form::submit('Submit', array('id' => 'btn-geocode', 'class' => 'btn btn-default pull-right')) }}
        </div>

        <div class="row">
        </div>

        {{ Form::close() }}

    </div>

    <div class="col-md-12 form-group">
        <div class="row">
            <div id="map-canvas"></div>
        </div>  
    </div>


    <div class="col-md-12 text-right">

        <div class="row">
            <a href="/geocode" class="btn btn-default"><i class="fa fa-arrow-right"></i></a>
        </div>
    </div>

@stop

@section('bottomscript')
<script type="text/javascript">
    $(document).ready(function () {


        // Autocomplete
        $("#autocomplete").geocomplete();

        // Trigger geocoding request.
        $("#btn-geocode").click(function(event){
            event.preventDefault();
          $("#autocomplete").trigger("geocode");
          // Autocomplete w/Map Option       
          $("#autocomplete").geocomplete({
            map: "#map-canvas"
          });
        });

    });
</script>
@stop