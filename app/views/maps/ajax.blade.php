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
    
    // Autocomplete Block

    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.

    var placeSearch, autocomplete, geocoder;
    var componentForm = {
      street_number: 'short_name',
      route: 'long_name',
      locality: 'long_name',
      administrative_area_level_1: 'short_name',
      country: 'long_name',
      postal_code: 'short_name',
      latitude: 'latitude',
      longitude: 'longitude'
    };

    function initialize() {

      // Create the autocomplete object, restricting the search
      // to geographical location types.
      
      autocomplete = new google.maps.places.Autocomplete(
          /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
          { types: ['geocode'] });
      // When the user selects an address from the dropdown,
      // populate the address fields in the form.
      google.maps.event.addListener(autocomplete, 'place_changed', function() {
        fillInAddress();
      });
    }

    // [START region_fillform]
    function fillInAddress() {
      // Get the place details from the autocomplete object.
      var place = autocomplete.getPlace();

      for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
      }

      // Get each component of the address from the place details
      // and fill the corresponding field on the form.
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
          var val = place.address_components[i][componentForm[addressType]];
          document.getElementById(addressType).value = val;
        }
      }

      // Fill in lat/lng on form.
      document.getElementById('latitude').value = place.geometry.location.lat();
      document.getElementById('longitude').value = place.geometry.location.lng();
    }
    // [END region_fillform]

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
        {{ Form::open(array('action' => 'AddressesController@store')) }}
        
            <div class="col-md-11">
                {{ Form::text('address', null, array('id' => 'autocomplete', 'class' => 'form-group form-control', 'placeholder' => 'Enter your address...')) }}
            </div>

            <div class="col-md-1">                
                {{ Form::submit('Submit', array('class' => 'btn btn-default pull-right')) }}
            </div>
       
        {{ Form::hidden('street_number', null, array('id' => 'street_number', 'class' => 'form-group form-control', 'disabled' => true)) }}
        {{ Form::hidden('street_name', null, array('id' => 'route', 'class' => 'form-group form-control', 'disabled' => true)) }}
        {{ Form::hidden('city', null, array('id' => 'locality', 'class' => 'form-group form-control', 'disabled' => true)) }}
        {{ Form::hidden('state', null, array('id' => 'administrative_area_level_1', 'class' => 'form-group form-control', 'disabled' => true)) }}
        {{ Form::hidden('zip', null, array('id' => 'postal_code', 'class' => 'form-group form-control', 'disabled' => true)) }}
        {{ Form::hidden('country', null, array('id' => 'country', 'class' => 'form-group form-control', 'disabled' => true)) }}
        {{ Form::hidden('latitude', null, array('id' => 'latitude', 'class' => 'form-group form-control', 'disabled' => true)) }}
        {{ Form::hidden('longitude', null, array('id' => 'longitude', 'class' => 'form-group form-control', 'disabled' => true)) }}

        {{ Form::close() }}
    </div>

    <div class="row">
        <div class="col-md-12">
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
            <a href="/markers" class="btn btn-default pull-left"><i class="fa fa-arrow-left"></i></a>
            <a href="/ajax" class="btn btn-default pull-right"><i class="fa fa-arrow-right"></i></a>
        </div>
    </div>

@stop

@section('bottomscript')
<script type="text/javascript">
    
    // Initialize map
    var mapOptions = {
      center: new google.maps.LatLng(29.4814305, -98.5144044),
      zoom: 10
    };

    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

    var markers = [];

    function removeMarkers()
    {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
    }

    $(document).ready(function () {

        // Autocomplete form
        initialize();

        // Trigger setMarkers on form submit
        $('#ajax-form').on('submit', function (e) {
            e.preventDefault();
            
            var bounds = new google.maps.LatLngBounds();

            // Perform ajax request to get all addresses in db            
            $.ajax({
                type: "POST",
                url: "/ajax",
                dataType: "json",
                data: {}
            })
            .done(function(data) {
                for (var i = 0; i < data.length; i++) {

                    console.log(data[i]);

                    var geoCode = new google.maps.LatLng(data[i].latitude, data[i].longitude);
                    var marker = new google.maps.Marker({
                        position: geoCode,
                        map: map
                    });

                    markers.push(marker);
                    bounds.extend(geoCode);

                };

                map.fitBounds(bounds);

            });    
        });
    });

</script>
@stop