<!doctype html>
<html lang="en"
      prefix="og: http://ogp.me/ns#"
      xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">

<head>
    <meta charset="utf-8">
    <title>Heraclee - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale = 1.0, user-scalable=no" />
    <meta name="description" content="Heraclee website">
    <meta name="keywords" content="heraclee, website, responsive">

    @php
        $comment_description = (isset($property['comments']['comment']) ? $property['comments']['comment'] : '');
        $comment_title = (isset($property['comments']['title']) ? $property['comments']['title'] : '');
    @endphp

    <!-- SOCIAL SHARE -->
    <meta property="og:title" content="{{ $comment_title }}" />
    <meta property="og:description" content="{{ $comment_description }}"/>
    <meta property="og:type" content="{{ $property['type'] }}" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />

    <meta prefix="og: http://ogp.me/ns#" property="og:title" content="{{ $comment_title }}" />
    <meta prefix="og: http://ogp.me/ns#" property="og:type" content="{{ $property['type'] }}" />
    <meta prefix="og: http://ogp.me/ns#" property="og:url" content="{{ Request::fullUrl() }}" />

    @php
        $image_counter = 1;
    @endphp
    @foreach($property['pictures'] as $picture)
        @if($image_counter == 1)
            <meta property="og:image" content="{{$picture['url']}}" />
            <meta prefix="og: http://ogp.me/ns#" property="og:image" content="{{$picture['url']}}" />
        @endif
        @php
            $image_counter++;
        @endphp
    @endforeach
    <!-- END SOCIAL SHARE -->

    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">

    <link rel="stylesheet" type="text/css" href="/css/libraries/normalize.css">
    <link rel="stylesheet" type="text/css" href="/css/libraries/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/libraries/bootstrap-multiselect.css">
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

    <link rel="stylesheet" type="text/css" href="/css/media_queries.min.css">
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>

<body id="{{ !empty(Route::getCurrentRoute()) ? Route::getCurrentRoute()->getName() : '' }}">

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
<script>
    $('select').multiselect({
        includeSelectAllOption: true,
        selectAllValue: 'select-all-value',
        selectAllText: '{{ trans('lang.all') }}',
        nonSelectedText: '{{ trans('lang.none_selected') }}',
        nSelectedText: '{{ trans('lang.selected') }}',
        allSelectedText: '{{ trans('lang.all_selected') }}'
    });
</script>
<script type="text/javascript" src="/js/libraries/tooltipster.min.js"></script>
<script type="text/javascript" src="/js/libraries/slick.min.js"></script>
<script type="text/javascript" src="/js/libraries/jquery.validate.min.js"></script>
@if( LaravelLocalization::getCurrentLocale() == 'fr' )
    <script type="text/javascript" src="/js/libraries/messages_fr.js"></script>
@endif
<script type="text/javascript" src="/js/scripts.min.js"></script>


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
    $(document).ready(function(){
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
    $(window).on('load', function() {
        $('body').removeClass('preloader_active');
        $('.preloader_container').fadeOut();
    });
</script>

</body>
</html>