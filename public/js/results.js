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


    function initResultsMap() {
        var latlang = {lat: 46.207389, lng: 6.155903};
        var map = new google.maps.Map(document.getElementById('results_map'), {
            zoom: 14,
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
        var marker = new google.maps.Marker({
            position: latlang,
            map: map,
            icon: '/img/map_pin.svg'
        });
    }

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
});