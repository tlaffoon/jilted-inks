@extends('layouts.awesome')

@section('css')
<style>
   #controls {
     position: relative;
     width: 480px;
   }
   #autocomplete {
     position: absolute;
     top: 0px;
     left: 0px;
     width: 99%;
   }
   .label {
     text-align: right;
     font-weight: bold;
     width: 100px;
     color: #303030;
   }
   #address {
     background-color: #fff;
     width: 480px;
     padding-right: 2px;
     position: relative;
     top: 40px;
     left: 0px;
   }
   #address td {
     font-size: 10pt;

   }
   .field {
     width: 99%;
   }
   .slimField {
     width: 80px;
   }
   .wideField {
     width: 200px;
   }
 </style>
@stop

@section('topscript')
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <script>
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
          var geolocation = new google.maps.LatLng(
              position.coords.latitude, position.coords.longitude);
          var circle = new google.maps.Circle({
            center: geolocation,
            radius: position.coords.accuracy
          });
          autocomplete.setBounds(circle.getBounds());
        });
      }
    }
    // [END region_geolocation]

    </script>
@stop

@section('content')
    <h2 class="page-header">Autocomplete Example</h2>

    <div class="col-md-12">
        
        <input id="autocomplete" placeholder="Enter your address" type="text" class="form-group form-control"></input>

        <table id="address">
          <tr>
            <td class="label">Street address</td>
            <td class="slimField"><input class="field" id="street_number"
                  disabled="true"></input></td>
            <td class="wideField" colspan="2"><input class="field" id="route"
                  disabled="true"></input></td>
          </tr>
          <tr>
            <td class="label">City</td>
            <td class="wideField" colspan="3"><input class="field" id="locality"
                  disabled="true"></input></td>
          </tr>
          <tr>
            <td class="label">State</td>
            <td class="slimField"><input class="field"
                  id="administrative_area_level_1" disabled="true"></input></td>
            <td class="label">Zip code</td>
            <td class="wideField"><input class="field" id="postal_code"
                  disabled="true"></input></td>
          </tr>
          <tr>
            <td class="label">Country</td>
            <td class="wideField" colspan="3"><input class="field"
                  id="country" disabled="true"></input></td>
          </tr>
        </table>
    </div>

    <hr>

    <div class="col-md-12">

    </div>

@stop

@section('bottomscript')
<script type="text/javascript">
    $(document).ready(function () {
        initialize();

        $('#autocomplete').focus(geolocate);
    });
</script>
@stop