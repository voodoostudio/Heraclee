$(document).ready(function() {


    $('button.fullscreen_btn').on('click', function () {
        var currentSlide = $('.details_gallery').slick('slickCurrentSlide');
        var slide_scr = $('.details_gallery .slick-slide[data-slick-index="'+currentSlide+'"] img').attr('src');
        $.fancybox.open([{src  : slide_scr}]);
    });



    $('.details_gallery').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        speed: 200,
        asNavFor: '.details_gallery_thumbnails',
        prevArrow: '<button type="button" class="slick-prev"><i class="icn icon-arrow_big_left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="icn icon-arrow_big_right"></i></button>'
    });
    $('.details_gallery_thumbnails').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        speed: 200,
        asNavFor: '.details_gallery',
        dots: false,
        arrows: false,
        focusOnSelect: true
    });

    setTimeout(function(){
        initObjectMap();
        // initialize();
    }, 100);

    $('.gallery_view .panorama_link_container button').on('click', function () {
        $('.gallery_view').addClass('display_panorama');
    });
    $('.gallery_view button.close_panorama').on('click', function () {
        $('.gallery_view').removeClass('display_panorama');
    });

    var map;
    var latlong;
    var service;
    var placesMarkers = [];
    function initObjectMap() {
        latlong = {lat: object_lat, lng: object_long};
        map = new google.maps.Map(document.getElementById('object_map'), {
            zoom: 17,
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

        var marker = new google.maps.Marker({
            position: latlong,
            map: map,
            icon: markerImage
        });
        google.maps.event.addListener(map, 'zoom_changed', function () {
            checkPlaceMarkers(map.getZoom());
        });
    }
    $(document).on('click', '.map_sidebar .checkbox_container input[type="checkbox"]', function () {
        var checkbox = $(this).parents('.checkbox_container'),
            type = $(this).val();

        if ($(this).is(':checked')) {
            var icon = 'img/map/sidebar_icons/'+type+'.svg',
                dot_icon = icon.replace('sidebar_icons', 'sidebar_icons/small_dots');

            checkbox.addClass('loading');
            setTimeout(function () {
                var request = {
                    location: latlong,
                    radius: '1000',
                    types: [type] //e.g.school,restaurant,bank etc..
                };
         
                service = new google.maps.places.PlacesService(map);
                service.nearbySearch(request, function (results, status) {
                    if (status == google.maps.places.PlacesServiceStatus.OK) {
                        for (var i = 0; i < results.length; i++) {

                            results[i].html_attributions = '';
                            var show_icon = (map.getZoom() >= 15) ? icon : dot_icon,
                                htmlContent = "<div class='place-content'><b>" + results[i].name + "</b><br><span>" + results[i].vicinity + "</span></div>";

                            createMarker(results[i], show_icon, type, {
                                'icon': icon,
                                'dot_icon': dot_icon,
                                'htmlContent': htmlContent
                            });
                        }
                    }
                });

                checkbox.removeClass('loading');
            }, 100);
        } else {
            removeMarkersByType(type);
        }
    });
    function createMarker(place, icon, type, customData) {
        customData = customData ? customData : {};

        var marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location,
            icon: icon,
            visible: true,
            type: type,
            customData: customData,
            optimized: false
        });
        placesMarkers.push(marker);

        if (customData && customData.htmlContent) {
            var infowindow = new google.maps.InfoWindow({
                content: customData.htmlContent
            });

            google.maps.event.addListener(marker, 'click', function () {
                infowindow.open(map, marker);
            });
        }
    }
    function checkPlaceMarkers(zoom) {
        var type;

        if (zoom >= 15) {
            type = "icon";
        } else {
            type = "dot";
        }

        $.each(placesMarkers, function (m, n) {
            if (n && n.customData) {
                n.setIcon(type == 'icon' ? n.customData.icon : n.customData.dot_icon);
            }
        });
    }
    function removeMarkersByType(type) {
        $.each(placesMarkers, function (m, n) {
            if (n && n.type == type) {
                n.setMap(null);
                delete placesMarkers[m];
            }
        });
    }
});