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

    $('section.search_section ul.nav-tabs li.nav-item a.nav-link').on('click', function () {
        var type_value = $(this).attr('type_value');
        $('section.search_section input.sell_type_val').val(type_value);
    });
    console.log($('section.search_section input.sell_type_val').val());
});