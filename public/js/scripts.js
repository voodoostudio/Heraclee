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
    
    $('.tooltip').tooltipster({
        animation: 'fade',
        delay: 100,
        theme: 'tooltipster-punk'
    });

    $('header .menu-icon').on('click', function () {
        $('header').toggleClass('opened');
    });
});