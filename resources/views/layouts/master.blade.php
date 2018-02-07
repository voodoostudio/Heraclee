
<!doctype html>

<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale = 1.0, user-scalable=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Heraclee website">
        <meta name="keywords" content="heraclee, website, responsive">
        <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">


        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-71420108-6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-71420108-6');
        </script>


        <style>


            #door-wrapper {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                z-index: 99999;
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
                box-shadow: 0 0 0 2px #cdae6d;
                -webkit-transform: skewX(-31deg) translate(-50%);
                transform: skewX(-31deg) translate(-50%)
            }

            #door-left {
                -webkit-transform: skewX(-31deg) translate(50%);
                transform: skewX(-31deg) translate(50%)
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
                border: 2px solid #cdae6d;
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
        {{--<style>--}}
            {{--.cssload-loader {--}}
                {{--position: relative;--}}
                {{--left: calc(50% - 68px);--}}
                {{--width: 136px;--}}
                {{--height: 136px;--}}
                {{--border-radius: 50%;--}}
                {{---o-border-radius: 50%;--}}
                {{---ms-border-radius: 50%;--}}
                {{---webkit-border-radius: 50%;--}}
                {{---moz-border-radius: 50%;--}}
                {{--perspective: 1700px;--}}
            {{--}--}}
            {{--.cssload-inner {--}}
                {{--position: absolute;--}}
                {{--width: 100%;--}}
                {{--height: 100%;--}}
                {{--box-sizing: border-box;--}}
                {{---o-box-sizing: border-box;--}}
                {{---ms-box-sizing: border-box;--}}
                {{---webkit-box-sizing: border-box;--}}
                {{---moz-box-sizing: border-box;--}}
                {{--border-radius: 50%;--}}
                {{---o-border-radius: 50%;--}}
                {{---ms-border-radius: 50%;--}}
                {{---webkit-border-radius: 50%;--}}
                {{---moz-border-radius: 50%;--}}
            {{--}--}}
            {{--.cssload-inner.cssload-one {--}}
                {{--left: 0%;--}}
                {{--top: 0%;--}}
                {{--animation: cssload-rotate-one 1s linear infinite;--}}
                {{---o-animation: cssload-rotate-one 1s linear infinite;--}}
                {{---ms-animation: cssload-rotate-one 1s linear infinite;--}}
                {{---webkit-animation: cssload-rotate-one 1s linear infinite;--}}
                {{---moz-animation: cssload-rotate-one 1s linear infinite;--}}
                {{--border-bottom: 6px solid rgb(204,172,131);--}}
            {{--}--}}
            {{--.cssload-inner.cssload-two {--}}
                {{--right: 0%;--}}
                {{--top: 0%;--}}
                {{--animation: cssload-rotate-two 1s linear infinite;--}}
                {{---o-animation: cssload-rotate-two 1s linear infinite;--}}
                {{---ms-animation: cssload-rotate-two 1s linear infinite;--}}
                {{---webkit-animation: cssload-rotate-two 1s linear infinite;--}}
                {{---moz-animation: cssload-rotate-two 1s linear infinite;--}}
                {{--border-right: 6px solid rgb(204,172,131);--}}
            {{--}--}}
            {{--.cssload-inner.cssload-three {--}}
                {{--right: 0%;--}}
                {{--bottom: 0%;--}}
                {{--animation: cssload-rotate-three 1s linear infinite;--}}
                {{---o-animation: cssload-rotate-three 1s linear infinite;--}}
                {{---ms-animation: cssload-rotate-three 1s linear infinite;--}}
                {{---webkit-animation: cssload-rotate-three 1s linear infinite;--}}
                {{---moz-animation: cssload-rotate-three 1s linear infinite;--}}
                {{--border-top: 6px solid rgb(204,172,131);--}}
            {{--}--}}
            {{--@keyframes cssload-rotate-one {--}}
                {{--0% {--}}
                    {{--transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);--}}
                {{--}--}}
                {{--100% {--}}
                    {{--transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);--}}
                {{--}--}}
            {{--}--}}
            {{--@-o-keyframes cssload-rotate-one {--}}
                {{--0% {--}}
                    {{---o-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);--}}
                {{--}--}}
                {{--100% {--}}
                    {{---o-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);--}}
                {{--}--}}
            {{--}--}}
            {{--@-ms-keyframes cssload-rotate-one {--}}
                {{--0% {--}}
                    {{---ms-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);--}}
                {{--}--}}
                {{--100% {--}}
                    {{---ms-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);--}}
                {{--}--}}
            {{--}--}}
            {{--@-webkit-keyframes cssload-rotate-one {--}}
                {{--0% {--}}
                    {{---webkit-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);--}}
                {{--}--}}
                {{--100% {--}}
                    {{---webkit-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);--}}
                {{--}--}}
            {{--}--}}
            {{--@-moz-keyframes cssload-rotate-one {--}}
                {{--0% {--}}
                    {{---moz-transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);--}}
                {{--}--}}
                {{--100% {--}}
                    {{---moz-transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);--}}
                {{--}--}}
            {{--}--}}
            {{--@keyframes cssload-rotate-two {--}}
                {{--0% {--}}
                    {{--transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);--}}
                {{--}--}}
                {{--100% {--}}
                    {{--transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);--}}
                {{--}--}}
            {{--}--}}
            {{--@-o-keyframes cssload-rotate-two {--}}
                {{--0% {--}}
                    {{---o-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);--}}
                {{--}--}}
                {{--100% {--}}
                    {{---o-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);--}}
                {{--}--}}
            {{--}--}}
            {{--@-ms-keyframes cssload-rotate-two {--}}
                {{--0% {--}}
                    {{---ms-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);--}}
                {{--}--}}
                {{--100% {--}}
                    {{---ms-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);--}}
                {{--}--}}
            {{--}--}}
            {{--@-webkit-keyframes cssload-rotate-two {--}}
                {{--0% {--}}
                    {{---webkit-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);--}}
                {{--}--}}
                {{--100% {--}}
                    {{---webkit-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);--}}
                {{--}--}}
            {{--}--}}
            {{--@-moz-keyframes cssload-rotate-two {--}}
                {{--0% {--}}
                    {{---moz-transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);--}}
                {{--}--}}
                {{--100% {--}}
                    {{---moz-transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);--}}
                {{--}--}}
            {{--}--}}
            {{--@keyframes cssload-rotate-three {--}}
                {{--0% {--}}
                    {{--transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);--}}
                {{--}--}}
                {{--100% {--}}
                    {{--transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);--}}
                {{--}--}}
            {{--}--}}
            {{--@-o-keyframes cssload-rotate-three {--}}
                {{--0% {--}}
                    {{---o-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);--}}
                {{--}--}}
                {{--100% {--}}
                    {{---o-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);--}}
                {{--}--}}
            {{--}--}}
            {{--@-ms-keyframes cssload-rotate-three {--}}
            {{--0% {--}}
                    {{---ms-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);--}}
                {{--}--}}
                {{--100% {--}}
                    {{---ms-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);--}}
                {{--}--}}
            {{--}--}}
            {{--@-webkit-keyframes cssload-rotate-three {--}}
                {{--0% {--}}
                    {{---webkit-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);--}}
                {{--}--}}
                {{--100% {--}}
                    {{---webkit-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);--}}
                {{--}--}}
            {{--}--}}
            {{--@-moz-keyframes cssload-rotate-three {--}}
                {{--0% {--}}
                    {{---moz-transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);--}}
                {{--}--}}
                {{--100% {--}}
                    {{---moz-transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);--}}
                {{--}--}}
            {{--}--}}
        {{--</style>--}}




        @yield('css')
        @include('js-localization::head')
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->
    </head>

    <body id="{{ !empty(Route::getCurrentRoute()) ? Route::getCurrentRoute()->getName() : '' }}" class="preloader_active">

        @include('includes.header')

        {{--<div class="preloader_container">--}}
            {{--<div class="preloader">--}}
                {{--<div class="cssload-loader">--}}
                    {{--<div class="cssload-inner cssload-one"></div>--}}
                    {{--<div class="cssload-inner cssload-two"></div>--}}
                    {{--<div class="cssload-inner cssload-three"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div id="door-wrapper">
            <!-- <div id="door-cover"></div> -->
            <div id="door-left" style="/* transform: translate(100%, 0%) matrix(1, 0, 0, 1.16663, 622.79, 0); */"></div>
            <div id="door-right" style="/* box-shadow: rgb(27, 27, 27) 0px 0px 0px 2px; *//* transform: translate(-100%, 0%) matrix(1, 0, 0, 1.16663, -622.79, 0); */"></div>
            <!-- <div id="preloader" style="opacity: 0";></div> -->

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

        <div class="cookies_alert">
            <div class="container-fluid">
                <p>{{trans('lang.cookies_warning_text')}}</p>
                <button class="close_cookies_warning"><i class="icn icon-cancel"></i></button>
            </div>
        </div>

        <main>
            @yield('content')
        </main>

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
                    activateResetFiltser(true);
                },
                onDropdownShow: function() {
                    $('.multiselect-native-select .btn-group .multiselect-container.dropdown-menu li.active a').attr('touch-action', 'none');
                },
                onDropdownHide: function() {
                    $('.multiselect-native-select .btn-group .multiselect-container.dropdown-menu li a').removeAttr('touch-action');
                }
            });
        </script>

        @if( LaravelLocalization::getCurrentLocale() == 'fr' )
            <script type="text/javascript" src="/js/libraries/messages_fr.js"></script>
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
        @yield('javascript_search')
        <script>
            $(window).on('load', function() {
                $('body').removeClass('preloader_active');
                $('.preloader_container').fadeOut();

                $('#door-wrapper').addClass('loaded1');
//                setTimeout(function(){
//                    $('#door-wrapper').fadeOut();
//                }, 1000);
            });
        </script>
    </body>
</html>