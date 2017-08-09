function activateResetFiltser() {
    var empty_flag = 0;
    var amount_of_selected = $(".search_section select :selected").length;
    $('.search_section .input_container input').each(function( index ) {
        if($(this).val()) {
            empty_flag = 1;
        }
    });
    if((empty_flag > 0)||(amount_of_selected > 0)) {
        $('.reset_filters_btn').addClass('active');
    }
    else {
        $('.reset_filters_btn').removeClass('active');
    }
}