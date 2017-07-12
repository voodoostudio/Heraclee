$(document).ready(function() {

    $('.scroll_to_top a').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

    $('select').multiselect({
        includeSelectAllOption: true,
        selectAllValue: 'select-all-value',
        selectAllText: 'Tout',
        nonSelectedText: 'Aucune sélection',
        nSelectedText: 'sélectionné',
        allSelectedText: 'Tous sélectionnés'
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
        var type_value = $('section.search_section input#sell_type_val').val();
        var form_action = $(this).closest('form').attr('action');
        if ((form_action.indexOf("locations") >= 0)&&(type_value === '3')) {
            $(this).closest('form').attr('action', '../achat/results');
        }
        else if ((form_action.indexOf("achat") >= 0)&&(type_value === '1')) {
            $(this).closest('form').attr('action', '../locations/results');
        }
    });
});