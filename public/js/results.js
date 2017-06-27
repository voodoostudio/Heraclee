$(document).ready(function () {

    // $(window).on('resize orientationChange', function(event) {
    //    console.log('test');
    //     $('.results_carousel').slick('resize');
    // });

    // $(window).resize(function() {
    //     $('.results_carousel').slick('unslick');
    //     resultsCarouselInit();
    //     console.log('test');
    // });

    // $(window).on('orientationchange', function() {
    //     $('.results_carousel').slick('resize');
    // });

    $('.view_type li').on('click', function () {
        $(this).parent().find('li').removeClass('active');
        $(this).addClass('active');
        var this_class = $(this).attr('class');
        var toRemove = '_btn active';
        var view_type = this_class.replace(toRemove, '');
        $('.results_container').attr("class", "results_container " + view_type);

        if ($(this).hasClass('map_view_btn')) {
            setCookie('typeView', 'map_view');
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
                setCookie('typeView', 'grid_view');
                if ($('.result_preview_gallery').hasClass('slick-initialized')) {
                    $('.result_preview_gallery').slick('unslick');
                }
            }
            else if ($(this).hasClass('list_view_btn')) {
                setCookie('typeView', 'list_view');
                listView_galleryInit();
            }
        }
    });

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    function setCookie(name, value, options) {
        options = options || {};

        var expires = options.expires;

        if (typeof expires == "number" && expires) {
            var d = new Date();
            d.setTime(d.getTime() + expires * 1000);
            expires = options.expires = d;
        }
        if (expires && expires.toUTCString) {
            options.expires = expires.toUTCString();
        }

        value = encodeURIComponent(value);

        var updatedCookie = name + "=" + value;

        for (var propName in options) {
            updatedCookie += "; " + propName;
            var propValue = options[propName];
            if (propValue !== true) {
                updatedCookie += "=" + propValue;
            }
        }

        document.cookie = updatedCookie;
    }


});

var locations = [
    {
        lat: 47.061703,
        lng: 9.008789,
        info: '<div class="object_info_container">' +
        '<div class="object_info">' +
        '<a href="#">Saint-Tropez</a>' +
        '<div class="subtitle"> ' +
        '<span class="city">Vanades</span> ' +
        '<span class="price">3 000 000 000 €</span> ' +
        '</div> ' +
        '<div class="properties_block"> ' +
        '<ul class="properties"> ' +
        '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">300 m</span><sup>2</sup> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">8</span> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">5</span> </li> ' +
        '<li> <span class="property_container"> <span class="icn_container" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">Dégagée Jardin Mer</span> </span> </li> ' +
        '</ul> ' +
        '</div> ' +
        '</div> ' +
        '</div>'
    },
    {
        lat: 46.207389,
        lng: 6.155903,
        info: '<div class="object_info_container">' +
        '<div class="object_info">' +
        '<a href="#">Saint-Tropez</a>' +
        '<div class="subtitle"> ' +
        '<span class="city">Vanades</span> ' +
        '<span class="price">3 000 000 000 €</span> ' +
        '</div> ' +
        '<div class="properties_block"> ' +
        '<ul class="properties"> ' +
        '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">300 m</span><sup>2</sup> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">8</span> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">5</span> </li> ' +
        '<li> <span class="property_container"> <span class="icn_container" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">Dégagée Jardin Mer</span> </span> </li> ' +
        '</ul> ' +
        '</div> ' +
        '</div> ' +
        '</div>'
    },
    {
        lat: 46.254593,
        lng: 6.143417,
        info: '<div class="object_info_container">' +
        '<div class="object_info">' +
        '<a href="#">Saint-Tropez</a>' +
        '<div class="subtitle"> ' +
        '<span class="city">Vanades</span> ' +
        '<span class="price">3 000 000 000 €</span> ' +
        '</div> ' +
        '<div class="properties_block"> ' +
        '<ul class="properties"> ' +
        '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">300 m</span><sup>2</sup> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">8</span> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">5</span> </li> ' +
        '<li> <span class="property_container"> <span class="icn_container" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">Dégagée Jardin Mer</span> </span> </li> ' +
        '</ul> ' +
        '</div> ' +
        '</div> ' +
        '</div>'
    },
    {
        lat: 46.355873,
        lng: 6.479187,
        info: '<div class="object_info_container">' +
        '<div class="object_info">' +
        '<a href="#">Saint-Tropez</a>' +
        '<div class="subtitle"> ' +
        '<span class="city">Vanades</span> ' +
        '<span class="price">3 000 000 000 €</span> ' +
        '</div> ' +
        '<div class="properties_block"> ' +
        '<ul class="properties"> ' +
        '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">300 m</span><sup>2</sup> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">8</span> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">5</span> </li> ' +
        '<li> <span class="property_container"> <span class="icn_container" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">Dégagée Jardin Mer</span> </span> </li> ' +
        '</ul> ' +
        '</div> ' +
        '</div> ' +
        '</div>'
    },
    {
        lat: 47.260126,
        lng: 8.569336,
        info: '<div class="object_info_container">' +
        '<div class="object_info">' +
        '<a href="#">Saint-Tropez</a>' +
        '<div class="subtitle"> ' +
        '<span class="city">Vanades</span> ' +
        '<span class="price">3 000 000 000 €</span> ' +
        '</div> ' +
        '<div class="properties_block"> ' +
        '<ul class="properties"> ' +
        '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">300 m</span><sup>2</sup> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">8</span> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">5</span> </li> ' +
        '<li> <span class="property_container"> <span class="icn_container" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">Dégagée Jardin Mer</span> </span> </li> ' +
        '</ul> ' +
        '</div> ' +
        '</div> ' +
        '</div>'
    },
    {
        lat: 47.512447,
        lng: 8.695679,
        info: '<div class="object_info_container">' +
        '<div class="object_info">' +
        '<a href="#">Saint-Tropez</a>' +
        '<div class="subtitle"> ' +
        '<span class="city">Vanades</span> ' +
        '<span class="price">3 000 000 000 €</span> ' +
        '</div> ' +
        '<div class="properties_block"> ' +
        '<ul class="properties"> ' +
        '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">300 m</span><sup>2</sup> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">8</span> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">5</span> </li> ' +
        '<li> <span class="property_container"> <span class="icn_container" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">Dégagée Jardin Mer</span> </span> </li> ' +
        '</ul> ' +
        '</div> ' +
        '</div> ' +
        '</div>'
    }
    ,
    {
        lat: 47.671745,
        lng: 8.382568,
        info: '<div class="object_info_container">' +
        '<div class="object_info">' +
        '<a href="#">Saint-Tropez</a>' +
        '<div class="subtitle"> ' +
        '<span class="city">Vanades</span> ' +
        '<span class="price">3 000 000 000 €</span> ' +
        '</div> ' +
        '<div class="properties_block"> ' +
        '<ul class="properties"> ' +
        '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">300 m</span><sup>2</sup> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">8</span> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">5</span> </li> ' +
        '<li> <span class="property_container"> <span class="icn_container" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">Dégagée Jardin Mer</span> </span> </li> ' +
        '</ul> ' +
        '</div> ' +
        '</div> ' +
        '</div>'
    },
    {
        lat: 47.608825,
        lng: 8.750610,
        info: '<div class="object_info_container">' +
        '<div class="object_info">' +
        '<a href="#">Saint-Tropez</a>' +
        '<div class="subtitle"> ' +
        '<span class="city">Vanades</span> ' +
        '<span class="price">3 000 000 000 €</span> ' +
        '</div> ' +
        '<div class="properties_block"> ' +
        '<ul class="properties"> ' +
        '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">300 m</span><sup>2</sup> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">8</span> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">5</span> </li> ' +
        '<li> <span class="property_container"> <span class="icn_container" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">Dégagée Jardin Mer</span> </span> </li> ' +
        '</ul> ' +
        '</div> ' +
        '</div> ' +
        '</div>'
    },
    {
        lat: 47.579189,
        lng: 8.684692,
        info: '<div class="object_info_container">' +
        '<div class="object_info">' +
        '<a href="#">Saint-Tropez</a>' +
        '<div class="subtitle"> ' +
        '<span class="city">Vanades</span> ' +
        '<span class="price">3 000 000 000 €</span> ' +
        '</div> ' +
        '<div class="properties_block"> ' +
        '<ul class="properties"> ' +
        '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">300 m</span><sup>2</sup> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">8</span> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">5</span> </li> ' +
        '<li> <span class="property_container"> <span class="icn_container" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">Dégagée Jardin Mer</span> </span> </li> ' +
        '</ul> ' +
        '</div> ' +
        '</div> ' +
        '</div>'
    },
    {
        lat: 47.675444,
        lng: 8.366089,
        info: '<div class="object_info_container">' +
        '<div class="object_info">' +
        '<a href="#">Saint-Tropez</a>' +
        '<div class="subtitle"> ' +
        '<span class="city">Vanades</span> ' +
        '<span class="price">3 000 000 000 €</span> ' +
        '</div> ' +
        '<div class="properties_block"> ' +
        '<ul class="properties"> ' +
        '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">300 m</span><sup>2</sup> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">8</span> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">5</span> </li> ' +
        '<li> <span class="property_container"> <span class="icn_container" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">Dégagée Jardin Mer</span> </span> </li> ' +
        '</ul> ' +
        '</div> ' +
        '</div> ' +
        '</div>'
    },
    {
        lat: 47.582895,
        lng: 8.497925,
        info: '<div class="object_info_container">' +
        '<div class="object_info">' +
        '<a href="#">Saint-Tropez</a>' +
        '<div class="subtitle"> ' +
        '<span class="city">Vanades</span> ' +
        '<span class="price">3 000 000 000 €</span> ' +
        '</div> ' +
        '<div class="properties_block"> ' +
        '<ul class="properties"> ' +
        '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">300 m</span><sup>2</sup> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">8</span> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">5</span> </li> ' +
        '<li> <span class="property_container"> <span class="icn_container" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">Dégagée Jardin Mer</span> </span> </li> ' +
        '</ul> ' +
        '</div> ' +
        '</div> ' +
        '</div>'
    },
    {
        lat: 47.434474,
        lng: 8.728638,
        info: '<div class="object_info_container">' +
        '<div class="object_info">' +
        '<a href="#">Saint-Tropez</a>' +
        '<div class="subtitle"> ' +
        '<span class="city">Vanades</span> ' +
        '<span class="price">3 000 000 000 €</span> ' +
        '</div> ' +
        '<div class="properties_block"> ' +
        '<ul class="properties"> ' +
        '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">300 m</span><sup>2</sup> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">8</span> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">5</span> </li> ' +
        '<li> <span class="property_container"> <span class="icn_container" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">Dégagée Jardin Mer</span> </span> </li> ' +
        '</ul> ' +
        '</div> ' +
        '</div> ' +
        '</div>'
    },
    {
        lat: 47.512447,
        lng: 8.415527,
        info: '<div class="object_info_container">' +
        '<div class="object_info">' +
        '<a href="#">Saint-Tropez</a>' +
        '<div class="subtitle"> ' +
        '<span class="city">Vanades</span> ' +
        '<span class="price">3 000 000 000 €</span> ' +
        '</div> ' +
        '<div class="properties_block"> ' +
        '<ul class="properties"> ' +
        '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">300 m</span><sup>2</sup> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">8</span> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">5</span> </li> ' +
        '<li> <span class="property_container"> <span class="icn_container" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">Dégagée Jardin Mer</span> </span> </li> ' +
        '</ul> ' +
        '</div> ' +
        '</div> ' +
        '</div>'
    },
    {
        lat: 46.240348,
        lng: 6.146507,
        info: '<div class="object_info_container">' +
        '<div class="object_info">' +
        '<a href="#">Saint-Tropez</a>' +
        '<div class="subtitle"> ' +
        '<span class="city">Vanades</span> ' +
        '<span class="price">3 000 000 000 €</span> ' +
        '</div> ' +
        '<div class="properties_block"> ' +
        '<ul class="properties"> ' +
        '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">300 m</span><sup>2</sup> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">8</span> </li> ' +
        '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">5</span> </li> ' +
        '<li> <span class="property_container"> <span class="icn_container" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">Dégagée Jardin Mer</span> </span> </li> ' +
        '</ul> ' +
        '</div> ' +
        '</div> ' +
        '</div>'
    }
];

function setSellType(id) {
    $('#sell_type_val').val(id);
}

function setItems() {
    var items = $('#sorting_type').val()
    window.location.href='/results?items='+items;
    console.log(items);
}

function resultsCarouselInit() {
    $('.results_carousel').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><i class="icn icon-arrow_big_left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="icn icon-arrow_big_right"></i></button>',
        dots: true,

        responsive: [
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
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

    var infowindow = new google.maps.InfoWindow({
        maxWidth: '300px'
    });

    // Add some markers to the map.
    // Note: The code uses the JavaScript Array.prototype.map() method to
    // create an array of markers based on a given "locations" array.
    // The map() method here has nothing to do with the Google Maps API.
    var markers = locations.map(function (location) {
        var marker = new google.maps.Marker({
            position: location,
            icon: '/img/map_pin.svg'
        });
        google.maps.event.addListener(marker, 'click', function () {
            infowindow.setContent(location.info);
            infowindow.open(map, marker);
            map.setCenter(marker.getPosition());
        });

        google.maps.event.addListener(map, "click", function () {
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

    google.maps.event.addListener(infowindow, 'domready', function () {

        // Reference to the DIV that wraps the bottom of infowindow
        var iwOuter = $('.gm-style-iw');

        /* Since this div is in a position prior to .gm-div style-iw.
         * We use jQuery and create a iwBackground variable,
         * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
         */
        var iwBackground = iwOuter.prev();
        //iwBackground.css({display: 'none'});

        // Removes background shadow DIV
        iwBackground.children(':nth-child(2)').css({'display': 'none'});

        // Removes white background DIV
        iwBackground.children(':nth-child(4)').css({'display': 'none'});

        // Moves the infowindow 115px to the right.
        iwOuter.parent().parent().css({left: '-10px'});

        // Moves the shadow of the arrow 76px to the left margin.
        //iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

        // Moves the arrow 76px to the left margin.
        //iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

        // Changes the desired tail shadow color.
        iwBackground.children(':nth-child(3)').find('div').children().css({
            'background-color': '#272727',
            'box-shadow': 'none'
        });

        // Reference to the div that groups the close button elements.
        var iwCloseBtn = iwOuter.next();

        // Apply the desired effect to the close button
        iwCloseBtn.css({display: 'none'});

        // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
        //if($('.iw-content').height() < 140){
        //    $('.iw-bottom-gradient').css({display: 'none'});
        //}

        // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
        //iwCloseBtn.mouseout(function(){
        //    $(this).css({opacity: '1'});
        //});
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
