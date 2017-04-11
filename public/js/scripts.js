$(document).ready(function() {

    $('.scroll_to_top a').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

    $('select').multiselect({
        includeSelectAllOption: true,
        selectAllValue: 'select-all-value',
        selectAllText: 'Tout'
    });

    $('.carousel').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><i class="icn icon-arrow_big_left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="icn icon-arrow_big_right"></i></button>',
        autoplay: true
    });

    $('.tooltip').tooltipster({
        animation: 'fade',
        delay: 100,
        theme: 'tooltipster-punk'
    });

    $('header .menu-icon').on('click', function () {
        $('header').toggleClass('opened');
    });
});