$(document).ready(function () {
    // $('.refresh_results').on('click', function () {
    //     $('.search_section .search_input button[type="submit"]').trigger("click");
    // });
    activateResetFiltser();

    $('.view_type li').on('click', function () {
        if (!$(this).hasClass('active')) {
            $(this).parent().find('li').removeClass('active');
            $(this).addClass('active');
            var this_class = $(this).attr('class');
            var toRemove = '_btn active';
            var view_type = this_class.replace(toRemove, '');
            $('.results_container').attr("class", "results_container " + view_type);

            if ($(this).hasClass('map_view_btn')) {
                setCookie('typeView', 'map_view');
                $('.results_section .multiselect-native-select').hide();
                if ($('.result_preview_gallery').hasClass('slick-initialized')) {
                    $('.result_preview_gallery').slick('unslick');
                }
                resultsMapInit();
                resultsCarouselInit();
            }
            else {
                if ($('.results_carousel').hasClass('slick-initialized')) {
                    $('.results_carousel').slick('unslick');
                }
                $(this).closest('.row').find('.multiselect-native-select').show();

                if ($(this).hasClass('grid_view_btn')) {
                    setCookie('typeView', 'grid_view');
                    if ($('.result_preview_gallery').hasClass('slick-initialized')) {
                        $('.result_preview_gallery').slick('unslick');
                    }
                }
                else if ($(this).hasClass('list_view_btn')) {
                    setCookie('typeView', 'list_view');
                    listView_galleryInit();
                }
            }
        }
    });

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    function setCookie(name, value, options) {
        options = options || {};

        var expires = options.expires;

        if (typeof expires == "number" && expires) {
            var d = new Date();
            d.setTime(d.getTime() + expires * 1000);
            expires = options.expires = d;
        }
        if (expires && expires.toUTCString) {
            options.expires = expires.toUTCString();
        }

        value = encodeURIComponent(value);

        var updatedCookie = name + "=" + value;

        for (var propName in options) {
            updatedCookie += "; " + propName;
            var propValue = options[propName];
            if (propValue !== true) {
                updatedCookie += "=" + propValue;
            }
        }

        document.cookie = updatedCookie;
    }
});

function setSellType(id) {
    $('#sell_type_val').val(id);
}

function setItems() {
    var items = $('#sorting_type').val();
    window.location.href='?items='+items;
}
