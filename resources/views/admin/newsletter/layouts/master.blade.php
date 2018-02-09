
<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Heraclee - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale = 1.0, user-scalable=no" />
        <meta name="description" content="Heraclee website">
        <meta name="keywords" content="heraclee, website, responsive">
        <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">

        <!-- Preloader styling -->
        <style>
            #door-wrapper {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                z-index: 99999;
                background: #151414;
            }
            #door-left,
            #door-right{
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                bottom: 0;
                margin: 0;
                background-color: #151414;
                -webkit-transition: 3s;
                -moz-transition: 3s;
                -o-transition: 3s;
                transition: 3s;
            }
            #door-right {
                box-shadow: 2px 0 0 0 #ccac83;
                -webkit-transform: skewX(-31deg) translate(-50%);
                transform: skewX(-31deg) translate(-50%)
            }
            #door-left {
                -webkit-transform: skewX(-31deg) translate(50%);
                transform: skewX(-31deg) translate(50%)
            }
            #door-wrapper.loaded {
                background: transparent;
            }
            #door-wrapper.loaded #door-left {
                -webkit-transform: skewX(-31deg) translate(200%);
                transform: skewX(-31deg) translate(200%)
            }
            #door-wrapper.loaded #door-right {
                -webkit-transform: skewX(-31deg) translate(-200%);
                transform: skewX(-31deg) translate(-200%)
            }
            .square {
                display: block;
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                width: 130px;
                height: 130px;
                border-radius: 50%;
                margin: auto;
                overflow: hidden;
                border: 2px solid #1b1b1b;
                background: #151414
            }
            .square-animated {
                height: 200px;
                display: block;
                position: absolute
            }
            .square-animated {
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                overflow: hidden;
                width: 130px;
                height: 130px;
                padding: 5px;
                border-radius: 50%;
                border: 2px solid #ccac83;
            }
            .square-animated img {
                width: 100%;
            }
            #loader {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
                transition: opacity .9s 0s, visibility 1332ms 1332ms
            }
            #door-wrapper.loaded #loader {
                visibility: hidden;
                opacity: 0
            }
            #loader.loaded #loader-inner {
                -webkit-transform: scale(1.1);
                transform: scale(1.1)
            }
            .sk-cube-grid {
                width: 130px;
                height: 130px;
                margin: auto;
                position: absolute;
                top: 0;
                left: 0;
            }
            .sk-cube-grid .sk-cube {
                width: 33%;
                height: 33%;
                background-color: rgba(0, 0, 0, 0.9);
                float: left;
                -webkit-animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
                animation: sk-cubeGridScaleDelay 1.3s infinite ease-in-out;
            }
            .sk-cube-grid .sk-cube1 {
                -webkit-animation-delay: 0.2s;
                animation-delay: 0.2s; }
            .sk-cube-grid .sk-cube2 {
                -webkit-animation-delay: 0.3s;
                animation-delay: 0.3s; }
            .sk-cube-grid .sk-cube3 {
                -webkit-animation-delay: 0.4s;
                animation-delay: 0.4s; }
            .sk-cube-grid .sk-cube4 {
                -webkit-animation-delay: 0.1s;
                animation-delay: 0.1s; }
            .sk-cube-grid .sk-cube5 {
                -webkit-animation-delay: 0.2s;
                animation-delay: 0.2s; }
            .sk-cube-grid .sk-cube6 {
                -webkit-animation-delay: 0.3s;
                animation-delay: 0.3s; }
            .sk-cube-grid .sk-cube7 {
                -webkit-animation-delay: 0s;
                animation-delay: 0s; }
            .sk-cube-grid .sk-cube8 {
                -webkit-animation-delay: 0.1s;
                animation-delay: 0.1s; }
            .sk-cube-grid .sk-cube9 {
                -webkit-animation-delay: 0.2s;
                animation-delay: 0.2s; }
            @-webkit-keyframes sk-cubeGridScaleDelay {
                0%, 70%, 100% {
                    -webkit-transform: scale3D(1, 1, 1);
                    transform: scale3D(1, 1, 1);
                } 35% {
                      -webkit-transform: scale3D(0, 0, 1);
                      transform: scale3D(0, 0, 1);
                  }
            }
            @keyframes sk-cubeGridScaleDelay {
                0%, 70%, 100% {
                    -webkit-transform: scale3D(1, 1, 1);
                    transform: scale3D(1, 1, 1);
                } 35% {
                      -webkit-transform: scale3D(0, 0, 1);
                      transform: scale3D(0, 0, 1);
                  }
            }
        </style>
        {{ csrf_field() }}
        <link rel="stylesheet" type="text/css" href="{{mix('css/libraries.css')}}">
        <link rel="stylesheet" type="text/css" href="{{mix('css/app.css')}}">

        @yield('css')
        <link rel="stylesheet" type="text/css" href="{{asset('/css/custom_styles/dashboard.min.css')}}">
        @include('js-localization::head')
        {{--<link rel="stylesheet" type="text/css" href="/css/media_queries.min.css">--}}
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->
    </head>

        <div id="door-wrapper">
            <div id="door-left"></div>
            <div id="door-right"></div>
            <div id="loader" class="active">
                <div id="loader-inner">
                    <div class="square"></div>
                    <div class="square-animated">
                        <div class="sk-cube-grid">
                            <div class="sk-cube sk-cube1"></div>
                            <div class="sk-cube sk-cube2"></div>
                            <div class="sk-cube sk-cube3"></div>
                            <div class="sk-cube sk-cube4"></div>
                            <div class="sk-cube sk-cube5"></div>
                            <div class="sk-cube sk-cube6"></div>
                            <div class="sk-cube sk-cube7"></div>
                            <div class="sk-cube sk-cube8"></div>
                            <div class="sk-cube sk-cube9"></div>
                        </div>
                        <img src="/img/logo.svg" alt="Heraclee logo">
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        @include('includes.footer')

        <script type="text/javascript" src="{{mix('js/libraries.js')}}"></script>
        <script type="text/javascript" src="{{mix('js/app.js')}}"></script>

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
        @if( LaravelLocalization::getCurrentLocale() == 'fr' )
            <script type="text/javascript" src="{{mix('js/messages_fr.js')}}"></script>
        @endif

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
                            $name       = $('#contactForm').find('#name').val(),
                            $message    = $('#contactForm').find('#message').val(),
                            $form       = $('#contactForm')[0],
                            testmail    = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i,
                            hasError    = false;

                        $response.find('p').remove();

                        if (!testmail.test($mail) || !$name || !$message) {
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
                $('#door-wrapper').addClass('loaded');
                setTimeout(function(){
                    $('#door-wrapper').fadeOut();
                }, 500);
            });
        </script>
    </body>
</html>