$(document).ready(function() {

    setBodyPaddingBottom();
    $(window).resize(function () {
        setBodyPaddingBottom();
    });
    $(window).on("orientationchange", function () {
        setBodyPaddingBottom();
    });

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
        if
        ($(document).scrollTop() > 500){
            $("footer .scroll_to_top").fadeIn();
        }
        else
        {
            $("footer .scroll_to_top").fadeOut();
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
    var country_arr = [];
    var countryWithoutPage = country.substr(0, country.lastIndexOf("?"));
    var lang = $('html').attr('lang');

    if(countryWithoutPage === '') {
        country_arr = [country][0];
    } else {
        country_arr = [countryWithoutPage][0];
    }

    $('section.search_section ul.nav-tabs li.nav-item a.nav-link').on('click', function () {
        var type_value = $('section.search_section input#sell_type_val').val();
        var form_action = $(this).closest('form').attr('action');
        if ((form_action.indexOf("locations") >= 0)&&(type_value === '1')) {
            if((country_arr !== 'results' && country !== 'fr') && (country_arr !== 'results' && country !== 'en')) {
                $(this).closest('form').attr('action', '/' + lang + '/achat/results/' + country_arr);
            } else {
                $(this).closest('form').attr('action', '/' + lang + '/achat/results');
            }
        }
        else if ((form_action.indexOf("achat") >= 0)&&(type_value === '3')) {
            if((country_arr !== 'results' && country !== 'fr') && (country_arr !== 'results' && country !== 'en')) {
                $(this).closest('form').attr('action', '/' + lang + '/locations/results/' + country_arr);
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

    $('button#submit_search_form').on('click', function () {
        $(".search_section form").submit();
    });

    $('#agencyContactModal').on('hidden.bs.modal', function (e) {
        // do something...
    })
});
