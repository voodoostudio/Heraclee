$(document).ready(function() {


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
    }, 100);
    
    function initObjectMap() {
        var latlong = {lat: 46.207389, lng: 6.155903};

        var map = new google.maps.Map(document.getElementById('object_map'), {
            zoom: 13,
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
    }

    $('.gallery_view .panorama_link_container button').on('click', function () {
       $('.gallery_view').addClass('display_panorama');
    });
    $('.gallery_view button.close_panorama').on('click', function () {
       $('.gallery_view').removeClass('display_panorama');
    });
});