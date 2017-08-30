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
        $('.gallery_container').addClass('display_panorama');
    });
    $('.gallery_view button.close_panorama').on('click', function () {
        $('.gallery_container').removeClass('display_panorama');
    });

    dpe_ges_pointer();

    function dpe_ges_pointer() {
        var dpe_pointer = 131;
        var ges_pointer = 39;
        $( "section.object_info_section .outer_block_container .inner_block_container .object_details_container .energy_block.dpe .energy_block_diagram .energy_block_diagram_right .energy_block_diagram_pointer" ).css( "top", function() {
            if ($(window).width() < 576) {
                if (dpe_pointer <= 50) {
                    return 22;
                }
                else if ((dpe_pointer >= 51) && (dpe_pointer <= 90)) {
                    return 48;
                }
                else if ((dpe_pointer >= 91) && (dpe_pointer <= 150)) {
                    return 75;
                }
                else if ((dpe_pointer >= 151) && (dpe_pointer <= 230)) {
                    return 101;
                }
                else if ((dpe_pointer >= 231) && (dpe_pointer <= 330)) {
                    return 128;
                }
                else if ((dpe_pointer >= 331) && (dpe_pointer <= 450)) {
                    return 154;
                }
                else if (dpe_pointer > 450) {
                    return 180;
                }
            }
            else {
                if (dpe_pointer <= 50) {
                    return 22;
                }
                else if ((dpe_pointer >= 51) && (dpe_pointer <= 90)) {
                    return 57;
                }
                else if ((dpe_pointer >= 91) && (dpe_pointer <= 150)) {
                    return 92;
                }
                else if ((dpe_pointer >= 151) && (dpe_pointer <= 230)) {
                    return 127;
                }
                else if ((dpe_pointer >= 231) && (dpe_pointer <= 330)) {
                    return 162;
                }
                else if ((dpe_pointer >= 331) && (dpe_pointer <= 450)) {
                    return 197;
                }
                else if (dpe_pointer > 450) {
                    return 232;
                }
            }
        });
        $( "section.object_info_section .outer_block_container .inner_block_container .object_details_container .energy_block.dpe .energy_block_diagram .energy_block_diagram_right .energy_block_diagram_pointer_line" ).css( "top", function() {
            if ($(window).width() < 576) {
                if (dpe_pointer <= 50) {
                    return 33;
                }
                else if ((dpe_pointer >= 51) && (dpe_pointer <= 90)) {
                    return 59;
                }
                else if ((dpe_pointer >= 91) && (dpe_pointer <= 150)) {
                    return 86;
                }
                else if ((dpe_pointer >= 151) && (dpe_pointer <= 230)) {
                    return 112;
                }
                else if ((dpe_pointer >= 231) && (dpe_pointer <= 330)) {
                    return 139;
                }
                else if ((dpe_pointer >= 331) && (dpe_pointer <= 450)) {
                    return 165;
                }
                else if (dpe_pointer > 450) {
                    return 191;
                }
            }
            else {
                if (dpe_pointer <= 50) {
                    return 36;
                }
                else if ((dpe_pointer >= 51) && (dpe_pointer <= 90)) {
                    return 71;
                }
                else if ((dpe_pointer >= 91) && (dpe_pointer <= 150)) {
                    return 106;
                }
                else if ((dpe_pointer >= 151) && (dpe_pointer <= 230)) {
                    return 141;
                }
                else if ((dpe_pointer >= 231) && (dpe_pointer <= 330)) {
                    return 176;
                }
                else if ((dpe_pointer >= 331) && (dpe_pointer <= 450)) {
                    return 211;
                }
                else if (dpe_pointer > 450) {
                    return 246;
                }
            }
        });
        $( "section.object_info_section .outer_block_container .inner_block_container .object_details_container .energy_block.ges .energy_block_diagram .energy_block_diagram_right .energy_block_diagram_pointer" ).css( "top", function() {
            if ($(window).width() < 576) {
                if (ges_pointer <= 5) {
                    return 22;
                }
                else if ((ges_pointer >= 6) && (ges_pointer <= 10)) {
                    return 48;
                }
                else if ((ges_pointer >= 11) && (ges_pointer <= 20)) {
                    return 75;
                }
                else if ((ges_pointer >= 21) && (ges_pointer <= 35)) {
                    return 101;
                }
                else if ((ges_pointer >= 36) && (ges_pointer <= 55)) {
                    return 128;
                }
                else if ((ges_pointer >= 56) && (ges_pointer <= 80)) {
                    return 154;
                }
                else if (ges_pointer > 80) {
                    return 180;
                }
            }
            else {
                if (ges_pointer <= 5) {
                    return 22;
                }
                else if ((ges_pointer >= 6) && (ges_pointer <= 10)) {
                    return 57;
                }
                else if ((ges_pointer >= 11) && (ges_pointer <= 20)) {
                    return 92;
                }
                else if ((ges_pointer >= 21) && (ges_pointer <= 35)) {
                    return 127;
                }
                else if ((ges_pointer >= 36) && (ges_pointer <= 55)) {
                    return 162;
                }
                else if ((ges_pointer >= 56) && (ges_pointer <= 80)) {
                    return 197;
                }
                else if (ges_pointer > 80) {
                    return 232;
                }
            }
        });
        $( "section.object_info_section .outer_block_container .inner_block_container .object_details_container .energy_block.ges .energy_block_diagram .energy_block_diagram_right .energy_block_diagram_pointer_line" ).css( "top", function() {
            if ($(window).width() < 576) {
                if (ges_pointer <= 5) {
                    return 33;
                }
                else if ((ges_pointer >= 6) && (ges_pointer <= 10)) {
                    return 59;
                }
                else if ((ges_pointer >= 11) && (ges_pointer <= 20)) {
                    return 86;
                }
                else if ((ges_pointer >= 21) && (ges_pointer <= 35)) {
                    return 112;
                }
                else if ((ges_pointer >= 36) && (ges_pointer <= 55)) {
                    return 139;
                }
                else if ((ges_pointer >= 56) && (ges_pointer <= 80)) {
                    return 165;
                }
                else if (ges_pointer > 80) {
                    return 191;
                }
            }
            else {
                if (ges_pointer <= 5) {
                    return 36;
                }
                else if ((ges_pointer >= 6) && (ges_pointer <= 10)) {
                    return 71;
                }
                else if ((ges_pointer >= 11) && (ges_pointer <= 20)) {
                    return 106;
                }
                else if ((ges_pointer >= 21) && (ges_pointer <= 35)) {
                    return 141;
                }
                else if ((ges_pointer >= 36) && (ges_pointer <= 55)) {
                    return 176;
                }
                else if ((ges_pointer >= 56) && (ges_pointer <= 80)) {
                    return 211;
                }
                else if (ges_pointer > 80) {
                    return 246;
                }
            }
        });
    }

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
        var markerImage = new google.maps.MarkerImage('/img/map_pin.svg');

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
            var icon = '/img/map/sidebar_icons/'+type+'.svg',
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