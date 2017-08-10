$(document).ready(function() {
    activateResetFiltser();

    $('.results_carousel').slick({
        infinite: true,
        lazyLoad: 'progressive',
        slidesToShow: 2,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><i class="icn icon-arrow_big_left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="icn icon-arrow_big_right"></i></button>',
        autoplay: true,
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

    function setSellType(id) {
        $('#sell_type_val').val(id);
    }

    $('.loading').on('click', function(){
        var this_link =  $(this).parent().find('a').attr('href');
        document.location.href = this_link;
    });

});

function setSellType(id) {
    $('#sell_type_val').val(id);
}