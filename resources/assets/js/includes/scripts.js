$(document).ready(function() {

    setBodyPaddingBottom();
    minimizeSearchBlock();
    MyOutdatedBrowser();
    function MyOutdatedBrowser() {
        //TODO create a public api to have these set from the cloud rather than having them hardcoded in typescript
        var browsers = {
            GoogleChrome: {
                name: "chrome",
                version: 53
            },
            MozillaFirefox: {
                name: "firefox",
                version: 46
            },
            InternetExplorer: {
                name: "msie",
                version: 10
            },
            InternetExplorerElse: {
                name: "ie",
                version: 10
            },
            AppleSafari: {
                name: "safari",
                version: 5
            },
            Opera: {
                name: "opera",
                version: 38
            }
        };


        function getBrowserKeys() {
            return Object.getOwnPropertyNames(browsers)
        }

        function isBrowserOutdated(curBrowser) {
            var curBrowserName = curBrowser.name.toLowerCase();

            var keys = getBrowserKeys();

            var browser_version = curBrowser.version;

            for(var i=0; i< keys.length ; i++) {
                var browser = browsers[keys[i]];

                if(curBrowserName == browser.name) {
                    return curBrowser.version <= browser.version;
                } else {
                    //continue
                }
            }
            return true;  //browser is found and version is equal or greater than ours
        }

        function get_browser_info() {
            var ua = navigator.userAgent, tem, M = ua.match(/(opera|chrome|safari|firefox|msie|ie|trident(?=\/))\/?\s*(\d+)/i) || [];
            if (/trident/i.test(M[1])) {
                tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
                return {name: 'msie', version: (tem[1] || '')};
            }
            if (M[1] === 'Chrome') {
                tem = ua.match(/\bOPR\/(\d+)/);
                if (tem != null) {
                    return {name: 'Opera', version: tem[1]};
                }
            }
            M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
            if ((tem = ua.match(/version\/(\d+)/i)) != null) {
                M.splice(1, 1, tem[1]);
            }
            return {
                name: M[0],
                version: M[1]
            };

        }

        function addLoadEvent(func) {
            var oldonload = window.onload;
            if (typeof window.onload != 'function') {
                window.onload = func;
            } else {
                window.onload = function() {
                    if (oldonload) {
                        oldonload();
                    }
                    func();
                }
            }
        }

        var blockID = "outdated";
        var closeButtonID = "btnCloseUpdateBrowser";

        addLoadEvent(function() {
            if(isBrowserOutdated(get_browser_info())) {
                //var block = document.getElementById(blockID);
                //show
                $('#outdatedBrowser').show();
                //block.setAttribute("style", "display: block;");
            } else {
                //nop
            }
        })
    }

    $(window).resize(function () {
        setBodyPaddingBottom();
        if ($(window).width() > 576) {
            if ($('section.search_section form').hasClass('minimized')) {
                $('section.search_section form').removeClass('minimized')
            }
        }
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
        ($(document).scrollTop() > 10){
            $("header").addClass("minimized");
            $("section.page_title_section").addClass("minimized");
        }
        else
        {
            $("header").removeClass("minimized");
            $("section.page_title_section").removeClass("minimized");
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


    ///multiselect on ios START
    document.addEventListener('touchstart', function(e) {
        if($(e.target).attr('class').indexOf("active") >= 0) {
            e.preventDefault();
            $('.dropdown-toggle.btn[aria-expanded="true"]').trigger('click');
        }

        if($(e.target).attr('class').indexOf("dropdown-toggle") >= 0) {
        } else {
            $('.dropdown-toggle.btn[aria-expanded="true"]').trigger('click');
        }
    }, false);
    ///multiselect on ios END


    $('.tooltip').tooltipster({
        animation: 'fade',
        delay: 100,
        repositionOnScroll: true,
        theme: 'tooltipster-punk',
        side: 'top'
    });

    $('header .menu-icon').on('click', function () {
        $('header').toggleClass('opened');
        $('section.page_title_section').toggleClass('hidden');
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
            $('#cities_select option[value="35970"]').prop('selected', true);
            $(this).parent().find('select').multiselect('refresh');
            $(this).removeClass('active');

            $('.search_section .input_container input').not('.search_input input').each(function(){
                $(this).prop("disabled", false);
            });
            $('.search_section select').each(function(){
                $(this).multiselect('enable');
            });
        }
    });

    $('button#submit_search_form').on('click', function () {
        $(".search_section form").submit();
    });

    if ($(window).width() < 576) {
        $('#agencyContactModal').on('show.bs.modal', function (e) {
            $('body').css('overflow','hidden');
            $('body').css('position','fixed');
        });
        $('#agencyContactModal').on('hide.bs.modal', function (e) {
            $('body').css('overflow','initial');
            $('body').css('position','relative');
        });
    }

    disableSearchFields();
    $(".search_input input").on("change paste keyup", function() {
        disableSearchFields();
    });

    $('section.search_section .show_options button').on('click', function () {
        var this_form = $(this).closest('form');
        this_form.toggleClass('minimized');

        $('html, body').animate({
            scrollTop: $(".search_section").offset().top-100
        }, 300);
    });

    $('section.search_section .show_extra_options button').on('click', function () {
        var this_form = $(this).closest('form');
        this_form.toggleClass('minimized_extra_options');

        $('html, body').animate({
            scrollTop: $(".search_section").offset().top-100
        }, 300);
    });

    var body_id = $('body').attr('id');
    var active_country = $('header .dropdown .dropdown-menu a.active').html();
    if(body_id == 'swiss' || body_id == 'usa' || body_id == 'mauritius') {
        $('header .dropdown .dropdown-toggle').text(active_country);
    }
});
