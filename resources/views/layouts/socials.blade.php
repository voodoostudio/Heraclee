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

    <!-- SOCIAL SHARE -->
    <meta property="og:title" content="{{ $property['comments']['title'] }}" />
    <meta property="og:description" content="{{$property['comments']['comment']}}"/>
    <meta property="og:type" content="{{$property['type']}}" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />

    <meta prefix="og: http://ogp.me/ns#" property="og:title" content="{{ $property['comments']['title'] }}" />
    <meta prefix="og: http://ogp.me/ns#" property="og:type" content="{{$property['type']}}" />
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
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    @yield('css')

    <link rel="stylesheet" type="text/css" href="/css/media_queries.css">
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>

<body id="{{ !empty(Route::getCurrentRoute()) ? Route::getCurrentRoute()->getName() : '' }}">

@include('includes.header')

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
        selectAllText: 'Tout',
        nonSelectedText: 'Aucune sélection',
        nSelectedText: 'sélectionné',
        allSelectedText: 'Tous sélectionnés'
    });
</script>
<script type="text/javascript" src="/js/libraries/tooltipster.min.js"></script>
<script type="text/javascript" src="/js/libraries/slick.min.js"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
<script type = "text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>

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
                message: "required"
            },
            messages: {
                name: {
                    minlength: "Your name must consist at least 2 characters"
                },
                email: {
                    email: "Please provide a valid email address"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        })
    })
</script>

@yield('javascript')

</body>
</html>