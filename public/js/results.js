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
            //initialize();
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
















        google.maps.event.addListener(infowindow, 'domready', function() {

            // Reference to the DIV that wraps the bottom of infowindow
            var iwOuter = $('.gm-style-iw');



            iwOuter.parent().parent().css({width: '300px !important'});


            /* Since this div is in a position prior to .gm-div style-iw.
             * We use jQuery and create a iwBackground variable,
             * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
             */
            var iwBackground = iwOuter.prev();
            //iwBackground.css({display: 'none'});

            // Removes background shadow DIV
            iwBackground.children(':nth-child(2)').css({'display' : 'none'});
            //iwBackground.children(':nth-child(2)').css({'top' : '0', 'left' : '0', 'width' : '300px !important', 'height' : '100% !important'});

            // Removes white background DIV
            iwBackground.children(':nth-child(4)').css({'display' : 'none'});
            //iwBackground.children(':nth-child(4)').css({'top' : '0', 'left' : '0', 'width' : '300px !important', 'height' : '100% !important'});

            // Moves the infowindow 115px to the right.
            //iwOuter.parent().parent().css({left: '0px'});

            // Moves the shadow of the arrow 76px to the left margin.
            //iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

            // Moves the arrow 76px to the left margin.
            //iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

            // Changes the desired tail shadow color.
            iwBackground.children(':nth-child(3)').find('div').children().css({'background-color': '#272727'});

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










//    function initialize() {
//
//        // map center
//        var center = new google.maps.LatLng(40.589500, -8.683542);
//
//// marker position
//        var factory = new google.maps.LatLng(40.589500, -8.683542);
//
//        var mapOptions = {
//            center: center,
//            zoom: 16,
//            mapTypeId: google.maps.MapTypeId.ROADMAP
//        };
//
//
//
//        var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);
//
//        // InfoWindow content
//        var content = '<div id="iw-container">' +
//            '<div class="iw-title">Porcelain Factory of Vista Alegre</div>' +
//            '<div class="iw-content">' +
//            '<div class="iw-subTitle">History</div>' +
//            '<img src="http://maps.marnoto.com/en/5wayscustomizeinfowindow/images/vistalegre.jpg" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
//            '<p>Founded in 1824, the Porcelain Factory of Vista Alegre was the first industrial unit dedicated to porcelain production in Portugal. For the foundation and success of this risky industrial development was crucial the spirit of persistence of its founder, José Ferreira Pinto Basto. Leading figure in Portuguese society of the nineteenth century farm owner, daring dealer, wisely incorporated the liberal ideas of the century, having become "the first example of free enterprise" in Portugal.</p>' +
//            '<div class="iw-subTitle">Contacts</div>' +
//            '<p>VISTA ALEGRE ATLANTIS, SA<br>3830-292 Ílhavo - Portugal<br>'+
//            '<br>Phone. +351 234 320 600<br>e-mail: geral@vaa.pt<br>www: www.myvistaalegre.com</p>'+
//            '</div>' +
//            '<div class="iw-bottom-gradient"></div>' +
//            '</div>';
//
//        // A new Info Window is created and set content
//        var infowindow = new google.maps.InfoWindow({
//            content: content,
//
//            // Assign a maximum value for the width of the infowindow allows
//            // greater control over the various content elements
//            maxWidth: 350
//        });
//
//        // marker options
//        var marker = new google.maps.Marker({
//            position: factory,
//            map: map,
//            title:"Porcelain Factory of Vista Alegre"
//        });
//
//        // This event expects a click on a marker
//        // When this event is fired the Info Window is opened.
//        google.maps.event.addListener(marker, 'click', function() {
//            infowindow.open(map,marker);
//        });
//
//        // Event that closes the Info Window with a click on the map
//        google.maps.event.addListener(map, 'click', function() {
//            infowindow.close();
//        });
//
//        // *
//        // START INFOWINDOW CUSTOMIZE.
//        // The google.maps.event.addListener() event expects
//        // the creation of the infowindow HTML structure 'domready'
//        // and before the opening of the infowindow, defined styles are applied.
//        // *
//        google.maps.event.addListener(infowindow, 'domready', function() {
//
//            // Reference to the DIV that wraps the bottom of infowindow
//            var iwOuter = $('.gm-style-iw');
//
//            /* Since this div is in a position prior to .gm-div style-iw.
//             * We use jQuery and create a iwBackground variable,
//             * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
//             */
//            var iwBackground = iwOuter.prev();
//
//            // Removes background shadow DIV
//            iwBackground.children(':nth-child(2)').css({'display' : 'none'});
//
//            // Removes white background DIV
//            iwBackground.children(':nth-child(4)').css({'display' : 'none'});
//
//            // Moves the infowindow 115px to the right.
//            iwOuter.parent().parent().css({left: '115px'});
//
//            // Moves the shadow of the arrow 76px to the left margin.
//            iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
//
//            // Moves the arrow 76px to the left margin.
//            iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
//
//            // Changes the desired tail shadow color.
//            iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});
//
//            // Reference to the div that groups the close button elements.
//            var iwCloseBtn = iwOuter.next();
//
//            // Apply the desired effect to the close button
//            iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', border: '7px solid #48b5e9', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
//
//            // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
//            if($('.iw-content').height() < 140){
//                $('.iw-bottom-gradient').css({display: 'none'});
//            }
//
//            // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
//            iwCloseBtn.mouseout(function(){
//                $(this).css({opacity: '1'});
//            });
//        });
//    }
//    google.maps.event.addDomListener(window, 'load', initialize);






});
