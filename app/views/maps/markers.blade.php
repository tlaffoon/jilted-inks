@extends('layouts.awesome')

@section('css')
<style type="text/css">
    
    .no-padding {
        padding-left: 0px;
        padding-right: 0px;
    }

    #map-canvas {
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
    
    // Autocomplete Block

    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.

    var placeSearch, autocomplete, geocoder;

    function initialize() {
        // Create the autocomplete object, restricting the search
        // to geographical location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
            { types: ['geocode'] });
    }

    // [START region_geolocation]
    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    
    function geolocate() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {

          var geolocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
          var circle = new google.maps.Circle({
            center: geolocation,
            radius: position.coords.accuracy
          });

          autocomplete.setBounds(circle.getBounds());
        });
      }
    }
    // [END region_geolocation]

    // End Autocomplete Block
    </script>
@stop

@section('content')
    
    <h2 class="page-header">Google Maps JavaScript API v3 <small>Plotting Markers</small></h2>

    <div class="row">

        <div class="col-md-11">

            {{ Form::open() }}
            {{ Form::text('autocomplete', null, array('id' => 'autocomplete', 'class' => 'form-group form-control', 'placeholder' => 'Enter your address...')) }}

        </div>

        <div class="col-md-1">
            {{ Form::submit('Submit', array('id' => 'btn-plot', 'class' => 'btn btn-default pull-right')) }}
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
            <p> This is an example of a simple map which can accept address input and plot <a href="https://developers.google.com/maps/documentation/javascript/markers">markers</a> accordingly. </p>
            <p> It's primary limitation is that it cannot reset its bounds according to the markers which are included in its array. </p>
            <p> There are solutions out there which <em>are</em> intelligent enough to do so, like <a href="http://stackoverflow.com/questions/6332970/reset-bounds-on-google-maps-api-v3">this one</a>. </p>
            <p> To understand fully the solution outlined there, you'll need to understand <a href="http://www.sitepoint.com/use-jquerys-ajax-function/">AJAX requests</a>.</p>
        </div>
    </div>

    <div class="col-md-12">
        <div class="row">
            <a href="/gmaps/geocode" class="btn btn-default pull-left"><i class="fa fa-arrow-left"></i></a>
            <a href="/gmaps/ajax" class="btn btn-default pull-right"><i class="fa fa-arrow-right"></i></a>
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

        // Add a marker to the map and push to the array.
        function addMarker(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map,
                draggable: false,
                animation: google.maps.Animation.DROP
            });
            
            markers.push(marker);
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setAllMap(null);
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }

        // Autocomplete        
        initialize();
        $('#autocomplete').focus(geolocate);

        $('#btn-plot').click(function(event) {
            event.preventDefault();

            // Get address value from input
            var address = $('#autocomplete').val();
            
            // Redeclare geocoder variable
            var geocoder = new google.maps.Geocoder();
            
            // Geocode address
            geocoder.geocode({ 'address': address }, function(result, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latLngObj = result[0]["geometry"]["location"];
                    // add marker to array
                    addMarker(latLngObj);
                }
            });
        });
    });
</script>
@stop