@extends('layouts.awesome')

@section('css')
<style type="text/css">
    
    .no-padding {
        padding-left: 0px;
        padding-right: 0px;
    }

    #map-canvas {
        margin-top: 10px;   
        margin-bottom: 10px; 
        height: 500px;
    }

    #autocomplete {
        width: 99%;
    }

</style>
@stop

@section('topscript')
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    
    <script>

    var placeSearch, autocomplete, geocoder;

    </script>
@stop

@section('content')
    
    <h2 class="page-header">Google Maps JavaScript API v3 <small>Plotting Markers</small></h2>


    <div class="col-md-12">
        <div class="row">

            {{ Form::open(array('url' => '/ajax', 'method' => 'POST', 'id' => 'ajax-form')) }}
                {{ Form::submit('Send Ajax Request', array('id' => 'btn-ajax', 'class' => 'btn btn-default btn-block')) }}
            {{ Form::close() }}

        </div>
    </div>

    <div class="col-md-12">
        <div class="row">
            <div id="map-canvas" class="img-rounded"></div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="row">
           
        </div>
    </div>

    <div class="col-md-12">
        <div class="row">
            <a href="/geocode" class="btn btn-default pull-left"><i class="fa fa-arrow-left"></i></a>
            <a href="/ajax" class="btn btn-default pull-right"><i class="fa fa-arrow-right"></i></a>
        </div>
    </div>

@stop

@section('bottomscript')
<script type="text/javascript">
    $(document).ready(function () {

        // Initialize map
        var mapOptions = {
          center: new google.maps.LatLng(29.4814305, -98.5144044),
          zoom: 10
        };

        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        
        var markers = [];

        $('#ajax-form').on('submit', function (e) {
            e.preventDefault();
            var formValues = $(this).serialize();
            
            // console.log(formValues);
            
            $.ajax({
              type: "POST",
              url: "/ajax",
              data: formValues,
              dataType: "json"
            })
            .done(function(addresses) {
              // console.log(addresses);

              for (var i = 0; i < addresses.length; i++) {
                  console.log(addresses[i]);
              };

            });



            // $.ajax({
            //     url: "/ajax",
            //     type: "POST",
            //     data: formValues,
            //     dataType: "json",
            //     success: function (data) {
            //         $('#ajax-message').html(data.message);
            //     }
            // });
        }); // end ajax form submit block


        
    });
</script>
@stop