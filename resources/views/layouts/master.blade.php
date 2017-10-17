
<!doctype html>

<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>Heraclee - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale = 1.0, user-scalable=no" />
        <meta name="description" content="Heraclee website">
        <meta name="keywords" content="heraclee, website, responsive">
        <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">

        {{ csrf_field() }}
        <link rel="stylesheet" type="text/css" href="/css/libraries/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="/css/libraries/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/libraries/bootstrap/bootstrap-multiselect.css">
        <link rel="stylesheet" type="text/css" href="/css/libraries/tooltipster.min.css">
        <link rel="stylesheet" type="text/css" href="/css/libraries/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/css/libraries/slick.css">
        <link rel="stylesheet" type="text/css" href="/css/custom_icons/style.css">
        <link rel="stylesheet" type="text/css" href="/css/global.min.css">

        <style>
            .cssload-loader {
                position: relative;
                left: calc(50% - 68px);
                width: 136px;
                height: 136px;
                border-radius: 50%;
                -o-border-radius: 50%;
                -ms-border-radius: 50%;
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                perspective: 1700px;
            }
            .cssload-inner {
                position: absolute;
                width: 100%;
                height: 100%;
                box-sizing: border-box;
                -o-box-sizing: border-box;
                -ms-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                border-radius: 50%;
                -o-border-radius: 50%;
                -ms-border-radius: 50%;
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
            }
            .cssload-inner.cssload-one {
                left: 0%;
                top: 0%;
                animation: cssload-rotate-one 1s linear infinite;
                -o-animation: cssload-rotate-one 1s linear infinite;
                -ms-animation: cssload-rotate-one 1s linear infinite;
                -webkit-animation: cssload-rotate-one 1s linear infinite;
                -moz-animation: cssload-rotate-one 1s linear infinite;
                border-bottom: 6px solid rgb(204,172,131);
            }
            .cssload-inner.cssload-two {
                right: 0%;
                top: 0%;
                animation: cssload-rotate-two 1s linear infinite;
                -o-animation: cssload-rotate-two 1s linear infinite;
                -ms-animation: cssload-rotate-two 1s linear infinite;
                -webkit-animation: cssload-rotate-two 1s linear infinite;
                -moz-animation: cssload-rotate-two 1s linear infinite;
                border-right: 6px solid rgb(204,172,131);
            }
            .cssload-inner.cssload-three {
                right: 0%;
                bottom: 0%;
                animation: cssload-rotate-three 1s linear infinite;
                -o-animation: cssload-rotate-three 1s linear infinite;
                -ms-animation: cssload-rotate-three 1s linear infinite;
                -webkit-animation: cssload-rotate-three 1s linear infinite;
                -moz-animation: cssload-rotate-three 1s linear infinite;
                border-top: 6px solid rgb(204,172,131);
            }
            @keyframes cssload-rotate-one {
                0% {
                    transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
                }
                100% {
                    transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
                }
            }
            @-o-keyframes cssload-rotate-one {
                0% {
                    -o-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
                }
                100% {
                    -o-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
                }
            }
            @-ms-keyframes cssload-rotate-one {
                0% {
                    -ms-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
                }
                100% {
                    -ms-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
                }
            }
            @-webkit-keyframes cssload-rotate-one {
                0% {
                    -webkit-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
                }
                100% {
                    -webkit-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
                }
            }
            @-moz-keyframes cssload-rotate-one {
                0% {
                    -moz-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
                }
                100% {
                    -moz-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
                }
            }
            @keyframes cssload-rotate-two {
                0% {
                    transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
                }
                100% {
                    transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
                }
            }
            @-o-keyframes cssload-rotate-two {
                0% {
                    -o-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
                }
                100% {
                    -o-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
                }
            }
            @-ms-keyframes cssload-rotate-two {
                0% {
                    -ms-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
                }
                100% {
                    -ms-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
                }
            }
            @-webkit-keyframes cssload-rotate-two {
                0% {
                    -webkit-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
                }
                100% {
                    -webkit-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
                }
            }
            @-moz-keyframes cssload-rotate-two {
                0% {
                    -moz-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
                }
                100% {
                    -moz-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
                }
            }
            @keyframes cssload-rotate-three {
                0% {
                    transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
                }
                100% {
                    transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
                }
            }
            @-o-keyframes cssload-rotate-three {
                0% {
                    -o-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
                }
                100% {
                    -o-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
                }
            }
            @-ms-keyframes cssload-rotate-three {
            0% {
                    -ms-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
                }
                100% {
                    -ms-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
                }
            }
            @-webkit-keyframes cssload-rotate-three {
                0% {
                    -webkit-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
                }
                100% {
                    -webkit-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
                }
            }
            @-moz-keyframes cssload-rotate-three {
                0% {
                    -moz-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
                }
                100% {
                    -moz-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
                }
            }
        </style>
        @yield('css')
        @include('js-localization::head')
        <link rel="stylesheet" type="text/css" href="/css/media_queries.min.css">
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

        <script type="text/javascript" src="/js/libraries/jquery-3.2.1.min.js"></script>
        {{--<script type="text/javascript" src="/js/libraries/jquery-ui.min.js"></script>--}}
        <script type="text/javascript" src="/js/libraries/tether.min.js"></script>
        <script type="text/javascript" src="/js/libraries/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/libraries/bootstrap/bootstrap-multiselect.js"></script>
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
        @if( LaravelLocalization::getCurrentLocale() == 'fr' )
            <script type="text/javascript" src="/js/libraries/messages_fr.js"></script>
        @endif

        {{--<script type="text/javascript" src="/js/scripts.min.js"></script>--}}
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
                        phone: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        message: {
                            required: true
                        }
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
                        var $response   = $('#message-box'),
                            $mail       = $('#contactForm').find('#email').val(),
                            $phone       = $('#contactForm').find('#phone').val(),
                            $name       = $('#contactForm').find('#name').val(),
                            $message    = $('#contactForm').find('#message').val(),
                            $form       = $('#contactForm')[0],
                            testmail    = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i,
                            hasError    = false;

                        $response.find('p').remove();

                        if (!testmail.test($mail) || !$phone || !$name || !$message) {
                            hasError = true;
                        }

                        console.log(form.action);

                        if (hasError === false) {
                            $response.find('p').remove();
                            $.ajax({
                                type: form.method,
                                dataType: 'json',
                                cache: false,
                                url: form.action,
                                data: $(form).serialize()
                            }).done(function (data) {
                                $response.html('<p class = "'+ data.status +'">' + data.msg + '</p>');
                                if(data.status == 'success') {
                                    $form.reset();
                                }
                            }).fail(function() {
                                $response.html('<p>{{ trans('lang.an_error_has_occured') }}</p>');
                            })
                        }
                        return false;
                    }
                })
            })
        </script>

        <script>
            $(document).ready(function () {
                $('#newsletter').submit(function () {
                    var $this       = $(this),
                        $response   = $('#response'),
                        $mail       = $('#newsletter').find('#email').val(),
                        $form       = $('#newsletter')[0],
                        testmail    = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i,
                        hasError    = false;

                        $response.find('p').remove();

                    if (!testmail.test($mail)) {
                        $response.html('<p class="error">{{ trans('lang.please_provide_valid_email_address') }}</p>');
                        hasError = true;
                    }

                    if (hasError === false) {
                        $response.find('p').remove();
                        $.ajax({
                            type: "POST",
                            dataType: 'json',
                            cache: false,
                            url: $this.attr('action'),
                            data: $this.serialize()
                        }).done(function (data) {
                            $response.html('<p class = "'+ data.status +'">' + data.msg + '</p>');
                            if(data.status == 'success') {
                                $form.reset();
                                setTimeout(function(){
                                    $('.bottom_footer_section #response').fadeOut();
                                }, 4000);
                            }
                        }).fail(function() {
                            $response.html('<p>{{ trans('lang.an_error_has_occured') }}</p>');
                        })
                    }
                    return false;
                });
            });
        </script>

        @yield('js-localization.head')
        @yield('javascript')
        <script>
            $(window).on('load', function() {
                $('body').removeClass('preloader_active');
                $('.preloader_container').fadeOut();
            });
        </script>
    </body>
</html>