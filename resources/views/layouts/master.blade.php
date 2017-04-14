<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Heraclee - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale = 1.0, user-scalable=no" />
        <meta name="description" content="Heraclee website">
        <meta name="keywords" content="heraclee, website, responsive">

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
        <script type="text/javascript" src="/js/libraries/tooltipster.min.js"></script>
        <script type="text/javascript" src="/js/libraries/slick.min.js"></script>
        <script type="text/javascript" src="/js/scripts.js"></script>

        @yield('javascript')

    </body>
</html>