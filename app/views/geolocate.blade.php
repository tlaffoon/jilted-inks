@extends('layouts.awesome')

@section('css')
<style>
    #map-canvas {
        height: 500px;
        width: 100%;
        margin: 0px;
        padding: 0px;
    }
</style>
@stop

@section('topscript')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>

<script>
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see a blank space instead of the map, this
// is probably because you have denied permission for location sharing.

var map;

function initialize() {
  var mapOptions = {
    zoom: 6
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content: 'Location found using HTML5.'
      });

      map.setCenter(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
}

function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(60, 105),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}

</script>
@stop

@section('content')
    
    <h2 class="page-header">Geolocation Example</h2>

        <div id="map-canvas"></div>
        
@stop

@section('bottomscript')
<script type="text/javascript">
    $(document).ready(function() {
        google.maps.event.addDomListener(window, 'load', initialize);

        console.log()
    });
</script>


@stop