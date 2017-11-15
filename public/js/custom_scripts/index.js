$(document).ready(function() {
    activateResetFiltser();

    $('.results_carousel').slick({
        infinite: true,
        lazyLoad: 'progressive',
        slidesToShow: 2,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><i class="icn icon-arrow_big_left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="icn icon-arrow_big_right"></i></button>',
        // autoplay: true,
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

    if($('.index_main_carousel_section')[0]) {
        $('.index_main_carousel').slick({
            infinite: true,
            lazyLoad: 'progressive',
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="icn icon-arrow_big_left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="icn icon-arrow_big_right"></i></button>',
            autoplay: true
            // adaptiveHeight: true
        });
    }

    function setSellType(id) {
        $('#sell_type_val').val(id);
    }

    $('.loading').on('click', function(){
        var this_link =  $(this).parent().find('a').attr('href');
        document.location.href = this_link;
    });

    $('.marquee').marquee({
        //speed in milliseconds of the marquee
        duration: 15000,
        //gap in pixels between the tickers
        // gap: 50,
        //time in milliseconds before the marquee will start animating
        delayBeforeStart: 0,
        //'left' or 'right'
        direction: 'left',
        //true or false - should the marquee be duplicated to show an effect of continues flow
        // duplicated: true,
        pauseOnHover: true
    });

});

function setSellType(id) {
    $('#sell_type_val').val(id);
}