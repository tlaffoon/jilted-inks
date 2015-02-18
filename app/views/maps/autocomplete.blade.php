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
    
    <h2 class="page-header">Google Maps JavaScript API v3 <small>Address Autocomplete</small></h2>

        <div class="col-md-7">

            {{ Form::open(array('action' => 'AddressesController@store')) }}
            
            <div class="row">
                {{ Form::text('autocomplete', null, array('id' => 'autocomplete', 'class' => 'form-group form-control', 'placeholder' => 'Enter your address...')) }}
            </div>
           
            <div class="row">
                <div class="col-md-4 no-padding">
                    {{ Form::label('street_number', 'Street Number') }}
                    {{ Form::text('street_number', null, array('id' => 'street_number', 'class' => 'form-group form-control', 'disabled' => true)) }}
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

            <div class="row">
                {{ Form::label('latitude', 'Latitude') }}
                {{ Form::text('latitude', null, array('id' => 'latitude', 'class' => 'form-group form-control', 'disabled' => true)) }}
            </div>

            <div class="row">
                {{ Form::label('longitude', 'Longitude') }}
                {{ Form::text('longitude', null, array('id' => 'longitude', 'class' => 'form-group form-control', 'disabled' => true)) }}
            </div>

            <div class="row">
                {{ Form::reset('Reset', array('class' => 'btn btn-default pull-left')) }}
                {{ Form::submit('Submit', array('class' => 'btn btn-default pull-right')) }}
            </div>

            {{ Form::close() }}

        </div>

        <div class="col-md-5">


                <p>This is an example of an autocomplete form.</p>  

                <p>These fields can be auto-populated, even hidden, from the user.</p>

                <p>After receiving a valid address, you can geocode that address to get a latitude and longitude.  These values can also be stored in the database.</p>

                <p>This page uses the vanilla javascript syntax found in google's <a href="https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform">documentation</a>.</p>  

                <p>A couple of modifications allow us to pull the latitude/longitude along with our other desired fields.</p>

                <p>There are other, easier ways to configure autocomplete fields such as this jQuery <a href="https://github.com/ubilabs/geocomplete"> plugin</a>.</p>

                <p>The next thing you can do once you capture an address is <a href="https://developers.google.com/maps/documentation/javascript/geocoding#Geocoding"> geocode</a> it to plot markers.</p>
                
        </div>

        <div class="col-md-12 text-right">

            <a href="/geocode" class="btn btn-default"><i class="fa fa-arrow-right"></i></a>

        </div>

@stop

@section('bottomscript')
<script type="text/javascript">
    $(document).ready(function () {

        // Autocomplete        
        initialize();
        $('#autocomplete').focus(geolocate);
        // $('#autocomplete').change(codeAddress);

    });
</script>
@stop