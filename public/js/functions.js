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

function contactMapInit() {
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

function resultsCarouselInit() {
    $('.results_carousel').slick({
        infinite: true,
        lazyLoad: 'progressive',
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

function resultsMapInit()  {
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
            position: google.maps.ControlPosition.LEFT_TOP
        },
        streetViewControlOptions: {
            position: google.maps.ControlPosition.LEFT_TOP
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

        var markerIcon;

        if (location['counter'] > '1') {
            markerIcon = {
                url: '/img/map_pin_multi.svg',
                labelOrigin: new google.maps.Point(21, 21)
            };
        } else {
            markerIcon = {
                url: '/img/map_pin.svg',
                labelOrigin: new google.maps.Point(21, 21)
            };
        }

        var marker = new google.maps.Marker({
            position: location,
            icon: markerIcon,
            label: {
                text: (location['counter'] > '1') ? '' + location['counter'] + '' : ' ',
                color: 'white',
                fontSize: '14px',
                fontWeight: '400'
            }
        });

        if (location.hasOwnProperty("info")) {
            marker.setVisible(true);
        } else {
            marker.setVisible(false);
        }

        google.maps.event.addListener(marker, 'click', function () {
            infowindow.setContent(location.info);
            infowindow.open(map, marker);
            map.setCenter(marker.getPosition());
            infowindow_objectsInit();
        });

        google.maps.event.addListener(map, "click", function () {
            infowindow.close(map, marker);
        });

        return marker;
    });

    var mcOptions = {
        gridSize: 50,
        styles: [{
            url: '/img/map_markerclusterer/claster_img_sm.svg',
            height: 30,
            width: 30,
            anchor: [0, 0],
            textColor: '#000000',
            textSize: 12
        }, {
            url: '/img/map_markerclusterer/claster_img_md.svg',
            height: 40,
            width: 40,
            anchor: [0, 0],
            textColor: '#000000',
            textSize: 12
        }, {
            url: '/img/map_markerclusterer/claster_img_lg.svg',
            width: 52,
            height: 52,
            anchor: [0, 0],
            textColor: '#000000',
            textSize: 12
        }],
        maxZoom: 15
    };
    // Add a marker clusterer to manage the markers.
    var markerCluster = new MarkerClusterer(
        map,
        markers,
        mcOptions
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
        iwOuter.parent().parent().css({left: '-5px'});

        // Moves the shadow of the arrow 76px to the left margin.
        iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: -5px !important;'});

        // Moves the arrow 76px to the left margin.
        iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: -5px !important;'});

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
        lazyLoad: 'progressive',
        fade: true,
        speed: 100,
        prevArrow: '<button type="button" class="slick-prev"><i class="icn icon-arrow_big_left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="icn icon-arrow_big_right"></i></button>'
    });
}

function infowindow_objectsInit() {
    $('.infowindow_container').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        lazyLoad: 'progressive',
        autoplay: true,
        pauseOnFocus: true,
        fade: false,
        speed: 100,
        dots: true,
        swipe: true,
        prevArrow: '<button type="button" class="slick-prev tooltip" title="Prev property"><i class="icn icon-arrow_big_left"></i></button>',
        nextArrow: '<button type="button" class="slick-next tooltip" title="Next property"><i class="icn icon-arrow_big_right"></i></button>'
    });
    $('.infowindow_container button.tooltip').tooltipster({
        animation: 'fade',
        delay: 100,
        repositionOnScroll: true,
        theme: 'tooltipster-punk',
        side: 'bottom'
    });
}