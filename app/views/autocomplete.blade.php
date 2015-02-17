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

</style>
@stop

@section('topscript')
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <script>
    
    // Autocomplete Block

    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.

    var placeSearch, autocomplete;
    var componentForm = {
      street_number: 'short_name',
      route: 'long_name',
      locality: 'long_name',
      administrative_area_level_1: 'short_name',
      country: 'long_name',
      postal_code: 'short_name'
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
    
    <h2 class="page-header">Google Maps JavaScript API v3 <small>Address Autocomplete</small></h2>

        <div class="col-md-6">
            <div class="row">
                <a href="https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform">Developer Documentation</a>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>

        <div class="col-md-6">

            <div class="row">
                {{ Form::label('autocomplete', null)}}
                {{ Form::text('autocomplete', null, array('class' => 'form-group form-control', 'placeholder' => 'Enter your address...')) }}
            </div>
           
            <div class="row">
                <div class="col-md-4 no-padding">
                    {{ Form::label('street_number', 'Street Number') }}
                    {{ Form::text('street_number', null, array('class' => 'form-group form-control', 'disabled' => true)) }}
                </div>

                <div class="col-md-8 no-padding">
                    {{ Form::label('street_name', 'Street Name') }}
                    {{ Form::text('street_name', null, array('id' => 'route', 'class' => 'form-group form-control', 'disabled' => true)) }}
                </div>
            </div>

            <div class="row">
                {{ Form::label('city', 'City') }}
                {{ Form::text('city', null, array('id' => 'locality', 'class' => 'form-group form-control', 'disabled' => true)) }}
            </div>

            <div class="row">
                <div class="col-md-4 no-padding">
                    {{ Form::label('state', 'State') }}
                    {{ Form::text('state', null, array('id' => 'administrative_area_level_1', 'class' => 'form-group form-control', 'disabled' => true)) }}
                </div>

                <div class="col-md-8 no-padding">
                    {{ Form::label('zip', 'Zip') }}
                    {{ Form::text('zip', null, array('id' => 'postal_code', 'class' => 'form-group form-control', 'disabled' => true)) }}
                </div>
            </div>

            <div class="row">
                {{ Form::label('country', 'Country') }}
                {{ Form::text('country', null, array('id' => 'country', 'class' => 'form-group form-control', 'disabled' => true)) }}
            </div>

        </div>

@stop

@section('bottomscript')
<script type="text/javascript">
    $(document).ready(function () {

        // Autocomplete        
        initialize();
        $('#autocomplete').focus(geolocate);

    });
</script>
@stop