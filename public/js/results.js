$(document).ready(function() {

    $('.view_type li').on('click', function () {
        $(this).parent().find('li').removeClass('active');
        $(this).addClass('active');
        var this_class = $(this).attr('class');
        var toRemove = '_btn active';
        var view_type = this_class.replace(toRemove, '');
        $('.results_container').attr("class", "results_container " + view_type);

        if ($(this).hasClass('map_view_btn')) {
            initResultsMap();
            resultsCarouselInit();
            $(this).closest('.row').find('.multiselect-native-select').hide();
            if ($('.result_preview_gallery').hasClass('slick-initialized')) {
                $('.result_preview_gallery').slick('unslick');
            }
        }
        else {
            if ($('.carousel').hasClass('flickity-enabled')) {
                $('.carousel').flickity('destroy');
            }
            $(this).closest('.row').find('.multiselect-native-select').show();

            if ($(this).hasClass('grid_view_btn')) {
                if ($('.result_preview_gallery').hasClass('slick-initialized')) {
                    $('.result_preview_gallery').slick('unslick');
                }
            }
            else if ($(this).hasClass('list_view_btn')) {
                $('.result_preview_gallery').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    fade: true,
                    speed: 100,
                    prevArrow: '<button type="button" class="slick-prev"><i class="icn icon-arrow_big_left"></i></button>',
                    nextArrow: '<button type="button" class="slick-next"><i class="icn icon-arrow_big_right"></i></button>'
                });
            }

        }
    });


    $('.results_section .pagination .page-item .page-link').on('click', function(event) {
        event.preventDefault();
        $('.results_section .pagination .page-item.active').removeClass("active");
        $(this).closest(".page-item").addClass("active");
    });

});