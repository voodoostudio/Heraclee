$(document).ready(function() {

    $('.view_type li').on('click', function () {
        $(this).parent().find('li').removeClass('active');
        $(this).addClass('active');
        var this_class = $(this).attr('class');
        var toRemove = '_btn active';
        var view_type = this_class.replace(toRemove, '');
        $('.results_container').attr("class", "results_container " + view_type);

        if ($(this).hasClass('map_view_btn')) {
            $(this).closest('.row').find('.multiselect-native-select').hide();
            if ($('.result_preview_gallery').hasClass('slick-initialized')) {
                $('.result_preview_gallery').slick('unslick');
            }
            initResultsMap();
            resultsCarouselInit();
        }
        else {
            if ($('.results_carousel').hasClass('slick-initialized')) {
                $('.results_carousel').slick('unslick');
            }
            $(this).closest('.row').find('.multiselect-native-select').show();

            if ($(this).hasClass('grid_view_btn')) {
                if ($('.result_preview_gallery').hasClass('slick-initialized')) {
                    $('.result_preview_gallery').slick('unslick');
                }
            }
            else if ($(this).hasClass('list_view_btn')) {
                listView_galleryInit();
            }
        }
    });


    $('.results_section .pagination .page-item .page-link').on('click', function(event) {
        event.preventDefault();
        $('.results_section .pagination .page-item.active').removeClass("active");
        $(this).closest(".page-item").addClass("active");
    });

    function resultsCarouselInit() {
        $('.results_carousel').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            prevArrow: '<button type="button" class="slick-prev"><i class="icn icon-arrow_big_left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="icn icon-arrow_big_right"></i></button>',
            dots: true
        });
    }

    function listView_galleryInit() {
        $('.result_preview_gallery').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            speed: 100,
            prevArrow: '<button type="button" class="slick-prev"><i class="icn icon-arrow_big_left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="icn icon-arrow_big_right"></i></button>'
        });
    }

    function initResultsMap() {
        var latlang = {lat: 46.207389, lng: 6.155903};
        var map = new google.maps.Map(document.getElementById('results_map'), {
            zoom: 5,
            center: latlang,
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

        var infowindow = new google.maps.InfoWindow();

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = locations.map(function(location) {
            var marker = new google.maps.Marker({
                position: location,
                icon: '/img/map_pin.svg'
            });
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(location.info);
                infowindow.open(map, marker);
            });

            google.maps.event.addListener(map, "click", function() {
                infowindow.close(map, marker);
            });
            return marker;
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(
            map,
            markers,
            {imagePath: '/img/map_markerclusterer/m'}
        );

    }
    var locations = [
        {
            lat: 47.061703,
            lng: 9.008789,
            info: '<div class="object_info_container"><div class="object_info"><a href="#">Saint-Tropez</a><div class="subtitle"> <span class="city">Vanades</span> <span class="price">3 000 000 000 €</span> </div> <div class="properties_block"> <ul class="properties"> <li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">300 m</span><sup>2</sup> </li> <li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">8</span> </li> <li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">5</span> </li> <li> <span class="property_container"> <span class="icn_container tooltip" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">Dégagée Jardin Mer</span> </span> </li> </ul> </div> </div> </div>'
        },
        {
            lat: 46.207389,
            lng: 6.155903,
            info: '<span style="color: black;">test 2</span>'
        },
        {
            lat: 46.254593,
            lng: 6.143417,
            info: '<span style="color: black;">test 3</span>'
        },
        {
            lat: 46.355873,
            lng: 6.479187,
            info: '<span style="color: black;">test 4</span>'
        },
        {
            lat: 47.260126,
            lng: 8.569336,
            info: '<span style="color: black;">test 5</span>'
        },
        {
            lat: 47.512447,
            lng: 8.695679,
            info: '<span style="color: black;">test 6</span>'
        }
        ,
        {
            lat: 47.671745,
            lng: 8.382568,
            info: '<span style="color: black;">test 7</span>'
        },
        {
            lat: 47.608825,
            lng: 8.750610,
            info: '<span style="color: black;">test 8</span>'
        },
        {
            lat: 47.579189,
            lng: 8.684692,
            info: '<span style="color: black;">test 9</span>'
        },
        {
            lat: 47.675444,
            lng: 8.366089,
            info: '<span style="color: black;">test 10</span>'
        },
        {
            lat: 47.582895,
            lng: 8.497925,
            info: '<span style="color: black;">test 11</span>'
        },
        {
            lat: 47.434474,
            lng: 8.728638,
            info: '<span style="color: black;">test 12</span>'
        },
        {
            lat: 47.512447,
            lng: 8.415527,
            info: '<span style="color: black;">test 13</span>'
        },
        {
            lat: 46.240348,
            lng: 6.146507,
            info: '<span style="color: black;">test 14</span>'
        }
    ]

});