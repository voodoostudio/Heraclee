$(document).ready(function() {

    $('.scroll_to_top a').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

    $(document).on("scroll", function(){
        if
        ($(document).scrollTop() > 100){
            $("header").addClass("minimized");
        }
        else
        {
            $("header").removeClass("minimized");
        }
    });

    $('.tooltip').tooltipster({
        animation: 'fade',
        delay: 100,
        repositionOnScroll: true,
        theme: 'tooltipster-punk',
        side: 'top'
    });

    $('header .menu-icon').on('click', function () {
        $('header').toggleClass('opened');
    });

    var country = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);
    var lang = $('html').attr('lang');
    console.log(country);
    console.log(lang);

    $('section.search_section ul.nav-tabs li.nav-item a.nav-link').on('click', function () {
        var type_value = $('section.search_section input#sell_type_val').val();
        var form_action = $(this).closest('form').attr('action');
        if ((form_action.indexOf("locations") >= 0)&&(type_value === '1')) {
            if((country !== 'results' && country !== 'fr') && (country !== 'results' && country !== 'en')) {
                $(this).closest('form').attr('action', '/' + lang + '/achat/results/' + country);
            } else {
                $(this).closest('form').attr('action', '/' + lang + '/achat/results');
            }
        }
        else if ((form_action.indexOf("achat") >= 0)&&(type_value === '3')) {
            if((country !== 'results' && country !== 'fr') && (country !== 'results' && country !== 'en')) {
                $(this).closest('form').attr('action', '/' + lang + '/locations/results/' + country);
            } else {
                $(this).closest('form').attr('action', '/' + lang + '/locations/results');
            }
        }
    });

    $('.search_section .input_container input').keyup(function() {
       activateResetFiltser();
    });

    $('.reset_filters_btn').on('click', function () {
        if ($(this).hasClass('active')) {
            $(this).parent().find('.input_container input').val('');
            $(this).parent().find('select option:selected').each(function() {
                $(this).prop('selected', false);
            });
            $(this).parent().find('select').multiselect('refresh');

            $(this).removeClass('active');
        }
    });

});
