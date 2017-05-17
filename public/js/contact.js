$(document).ready(function() {
    initContactMap();


    function initContactMap() {
        var map;
        var latlong;
        var marker;

        latlong = {lat: 43.257450, lng: 6.633978};
        map = new google.maps.Map(document.getElementById('contact_map'), {
            zoom: 14,
            center: latlong,
            scrollwheel: false,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position: google.maps.ControlPosition.TOP_RIGHT
            },
            zoomControlOptions: {
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
            streetViewControlOptions: {
                position: google.maps.ControlPosition.RIGHT_CENTER
            }
        });
        var markerImage = new google.maps.MarkerImage('img/map_pin.svg');

        marker = new google.maps.Marker({
            position: latlong,
            map: map,
            icon: markerImage
        });
        google.maps.event.addListener(map, 'zoom_changed', function () {
            checkPlaceMarkers(map.getZoom());
        });
    }
});