function activateResetFiltser(selected_event) {
    var empty_flag = 0;
    var selected_flag = selected_event;
    var city_selected_option =  $('#cities_select option:selected').attr('value');
    var property_type_selected_option =  $('#property_type_select option:selected').attr('value');
    $(this).parent().find('select option:selected');
    // var amount_of_selected = $(".search_section select :selected").length;
    $('.search_section .input_container input').each(function() {
        if($(this).val()) {
            empty_flag = 1;
        }
    });
    if((empty_flag > 0)||(selected_flag)||(city_selected_option !== '35970')||(property_type_selected_option !== '1')) {
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
    var this_page = $('body').attr('id');

    console.log(this_page);
    if(this_page === 'index') {
        var latlang = {lat: 43.281306, lng: 6.565533};
        var map = new google.maps.Map(document.getElementById('results_map'), {
            zoom: 11,
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
    } else {
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
    }


    var infowindow = new google.maps.InfoWindow({
        maxWidth: '300px'
    });

    // Add some markers to the map.
    // Note: The code uses the JavaScript Array.prototype.map() method to
    // create an array of markers based on a given "locations" array.
    // The map() method here has nothing to do with the Google Maps API.
    var markers = locations.map(function (location) {

        var markerIcon;

        // if (location['counter'] > '1') {
        //     markerIcon = {
        //         url: '/img/map_pin_multi.svg',
        //         labelOrigin: new google.maps.Point(21, 21)
        //     };
        // } else {
        //     markerIcon = {
        //         url: '/img/map_pin.svg',
        //         labelOrigin: new google.maps.Point(21, 21)
        //     };
        // }
        markerIcon = {
            url: '/img/map_pin_multi.svg',
            labelOrigin: new google.maps.Point(21, 21)
        };


        var marker = new google.maps.Marker({
            position: location,
            icon: markerIcon,
            label: {
                // text: (location['counter'] > '1') ? '' + location['counter'] + '' : ' ',
                text: '' + location['counter'] + '',
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
        prevArrow: '<button type="button" class="slick-prev tooltip" title="' + trans('lang.previous') + '"><i class="icn icon-arrow_big_left"></i></button>',
        nextArrow: '<button type="button" class="slick-next tooltip" title="' + trans('lang.next') + '"><i class="icn icon-arrow_big_right"></i></button>'
    });
    $('.infowindow_container button.tooltip').tooltipster({
        animation: 'fade',
        delay: 100,
        repositionOnScroll: true,
        theme: 'tooltipster-punk',
        side: 'bottom'
    });
}

function dpe_ges_pointer(dpe_pointer, ges_pointer) {
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

function tallestArticleBlock() {
    var maxHeight = -1;

    $('section.news_list_section .article_info_block').each(function() {
        maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
    });

    $('section.news_list_section .article_info_block').each(function() {
        $(this).height(maxHeight);
    });
}

function setBodyPaddingBottom() {
    //this function sets body padding-bottom according to the footer size
    var footer_height = $('footer').height() + 90;

    $('body').css({"padding-bottom": footer_height});
}

function showSelectedFileName() {
    $( '.input_file' ).each( function()
    {
        var $input	 = $( this ),
            $label	 = $input.next( 'label' ),
            labelVal = $label.html();

        $input.on( 'change', function( e )
        {
            var fileName = '';

            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else if( e.target.value )
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                $label.find( 'span' ).html( fileName );
            else
                $label.html( labelVal );
        });
        $input.on( 'focus', function(){ $input.addClass( 'has-focus' ); });
        $input.on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
    });
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function disableSearchFields() {
    if( $('.search_input input').val() ) {
        $('.search_section .input_container input').not('.search_input input').each(function(){
            $(this).attr('disabled', 'disabled');
        });
        $('.search_section select').each(function(){
            $(this).multiselect('disable');
        });

        $('.multiselect.btn_default').attr('disabled', 'disabled');
    } else {
        $('.search_section .input_container input').not('.search_input input').each(function(){
            $(this).prop("disabled", false);
        });
        $('.search_section select').each(function(){
            $(this).multiselect('enable');
        });
    }
}

// Sorting select options in the Alphabetical order
function orderSelectOptions() {
    var options = $('.search_section select#cities_select option');
    var arr = options.map(function(_, o) {
        return {
            t: $(o).text(),
            v: o.value
        };
    }).get();
    arr.sort(function(o1, o2) {
        return o1.t > o2.t ? 1 : o1.t < o2.t ? -1 : 0;
    });
    options.each(function(i, o) {
        o.value = arr[i].v;
        $(o).text(arr[i].t);
    });

    $('.search_section select#cities_select').multiselect('rebuild');
}

function minimizeSearchBlock() {
    if ($(window).width() < 576) {
        if ($('section.search_section form').hasClass('minimized')) {
            $('section.search_section form').removeClass('minimized')
        } else {
            $('section.search_section form').addClass('minimized');
        }
    }
}