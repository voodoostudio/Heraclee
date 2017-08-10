function activateResetFiltser() {
    var empty_flag = 0;
    var amount_of_selected = $(".search_section select :selected").length;
    $('.search_section .input_container input').each(function( index ) {
        if($(this).val()) {
            empty_flag = 1;
        }
    });
    if((empty_flag > 0)||(amount_of_selected > 0)) {
        $('.reset_filters_btn').addClass('active');
    }
    else {
        $('.reset_filters_btn').removeClass('active');
    }
}

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
            position: google.maps.ControlPosition.LEFT_CENTER
        },
        streetViewControlOptions: {
            position: google.maps.ControlPosition.LEFT_CENTER
        }
    });
    var markerImage = new google.maps.MarkerImage('/img/map_pin.svg');

    marker = new google.maps.Marker({
        position: latlong,
        map: map,
        icon: markerImage
    });
}