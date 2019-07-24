<?php
/**
 * Created by PhpStorm.
 * User: riadsasila
 * Date: 4/7/19
 * Time: 10:10 AM
 */

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple Markers</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 425px;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="map" data-lng="" data-lat="" ></div>
<script>

    var map;
    var markers = [];

        function initMap() {
        var myLatLng = {lat: 33.514587, lng: 36.295107};

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: myLatLng
        });
        google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng,map);
        });
    }

    function deleteMarker() {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
    }

    function placeMarker(position) {
        deleteMarker();
        var marker = new google.maps.Marker({
            position: position,
            map: map
        });
        // $('#map').attr('data-lng',position.lng());
        // $('#map').attr('data-lat',position.lat());
        markers.push(marker);
        map.panTo(position);
    }

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoB68k4mJsqBcL_GomhhaDHVJhgXfbcik&callback=initMap">
</script>
</body>
</html>
