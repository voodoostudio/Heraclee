<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Heraclee - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale = 1.0, user-scalable=no" />
        <meta name="description" content="Heraclee website">
        <meta name="keywords" content="heraclee, website, responsive">
        {{ csrf_field() }}
        <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">


        <link rel="stylesheet" type="text/css" href="/css/libraries/normalize.css">
        <link rel="stylesheet" type="text/css" href="/css/libraries/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/libraries/bootstrap-multiselect.css">
        <link rel="stylesheet" type="text/css" href="/css/libraries/tooltipster.min.css">
        <link rel="stylesheet" type="text/css" href="/css/libraries/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/css/libraries/slick.css">
        <link rel="stylesheet" type="text/css" href="/css/custom_icons/style.css">
        <link rel="stylesheet" type="text/css" href="/css/global.css">
        @yield('css')

        <link rel="stylesheet" type="text/css" href="/css/media_queries.css">
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->
    </head>

    <body id="{{ !empty(Route::getCurrentRoute()) ? Route::getCurrentRoute()->getName() : '' }}" class="preloader_active">

        @include('includes.header')

        <div class="preloader_container">
            <div class="preloader">
                <div class="cssload-loader">
                    <div class="cssload-inner cssload-one"></div>
                    <div class="cssload-inner cssload-two"></div>
                    <div class="cssload-inner cssload-three"></div>
                </div>
            </div>
        </div>

        <main>
            @yield('content')
        </main>

        @include('includes.footer')

        <script type="text/javascript" src="/js/libraries/jquery-3.2.0.min.js"></script>
        <script type="text/javascript" src="/js/libraries/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/js/libraries/tether.min.js"></script>
        <script type="text/javascript" src="/js/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/libraries/bootstrap-multiselect.js"></script>
        <script type="text/javascript" src="/js/functions.js"></script>
        <script>
            $('select').multiselect({
                includeSelectAllOption: true,
                selectAllValue: 'select-all-value',
                selectAllText: '{{ trans('lang.all') }}',
                nonSelectedText: '{{ trans('lang.none_selected') }}',
                nSelectedText: '{{ trans('lang.selected') }}',
                allSelectedText: '{{ trans('lang.all_selected') }}',
                onSelectAll: function () {
                    activateResetFiltser();
                },
                onDeselectAll: function () {
                    activateResetFiltser();
                },
                onChange: function() {
                    activateResetFiltser();
                }
            });
        </script>
        <script type="text/javascript" src="/js/libraries/tooltipster.min.js"></script>
        <script type="text/javascript" src="/js/libraries/slick.min.js"></script>
        <script type="text/javascript" src="/js/libraries/jquery.validate.min.js"></script>
        @if(LaravelLocalization::getCurrentLocale() == 'fr')
            <script type="text/javascript" src="/js/libraries/messages_fr.js"></script>
        @endif
        <script type="text/javascript" src="/js/scripts.js"></script>

        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId      : '1820110634732413',
                    xfbml      : true,
                    version    : 'v2.10'
                });
                FB.AppEvents.logPageView();
            };

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <script>
            jQuery(document).ready(function () {
                jQuery("#contactForm").validate({
                    rules: {
                        name: {
                            required: true,
                            minlength: 2
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        message: "{{ trans('lang.required') }}"
                    },
                    messages: {
                        name: {
                            minlength: "{{ trans('lang.your_name_must_consist_at_least_characters') }}"
                        },
                        email: {
                            email: "{{ trans('lang.please_provide_valid_email_address') }}"
                        }
                    },
                    submitHandler: function (form) {
                        form.submit();
                    }
                })
            })
        </script>

        <script>
            jQuery(document).ready(function () {
                jQuery("#newsletter").validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        }
                    },

                    email: {
                        email: "{{ trans('lang.please_provide_valid_email_address') }}"
                    },

                    submitHandler: function (form) {
                        form.submit();
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function(){

              /*var mylink = $('#newsletter label');
                $( "#email" ).focus(function() {
                    if (mylink.hasClass('error') === false) {
                        $('#newsletter_submit').removeAttr('disabled', 'disabled');
                        console.log('test');
                    }
                });*/


                $('#newsletter_submit').one("click", function (e) {
                    e.preventDefault();

                    var url = "../newsletter";
                    var csrf = $('input[name=_token]').val();
                    var email = $('#newsletter').find('#email').val();
                    var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

                    if (pattern.test(email)) {
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: {email: email, _token: csrf},
                            cache: false,
                            success: function () {
                                $('.message-send').append('<div class = \"success\" style = \"color: forestgreen; font-size: 0.75rem; position: absolute;\">{{ trans('lang.message_send') }}</div>').hide(3000);
                                $('#newsletter_submit').attr('disabled', 'disabled');
                            }
                        });
                    } else {
                        $('#newsletter_submit').removeAttr('disabled', 'disabled');
                    }
                });
            });
        </script>

        @yield('javascript')
        <script>
            $(window).on('load', function () {
                $('body').removeClass('preloader_active');
                $('.preloader_container').fadeOut();
            });
        </script>
    </body>
</html>