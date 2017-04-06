<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Heraclee results</title>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale = 1.0, user-scalable=no" />
    <meta name="description" content="Heraclee website">
    <meta name="keywords" content="heraclee, website, responsive">

    <link rel="stylesheet" type="text/css" href="/css/libraries/normalize.css">
    <link rel="stylesheet" type="text/css" href="/css/libraries/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/libraries/bootstrap-multiselect.css">
    <link rel="stylesheet" type="text/css" href="/css/libraries/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/libraries/slick.css">
    <link rel="stylesheet" type="text/css" href="/css/custom_icons/style.css">
    <link rel="stylesheet" type="text/css" href="/css/global.css">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>

<body>
    @include('includes.header')

    <section class="search_section">
        <div class="container-fluid">
            <div class="search_block_container">
                <div class="search_block">
                    <div class="row">
                        <div class="col-4">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a data-toggle="tab" class="nav-link active" href="#">Location</a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" class="nav-link" href="#">Vente</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-4">
                                    <label class="form_el_label light"><i class="icn icon-building"></i><span>Type de bien</span></label>
                                    <div class="margin_bottom_10">
                                        <select multiple="multiple" name="object_type">
                                            <option value="House">House</option>
                                            <option value="Apartment">Apartment</option>
                                            <option value="Building plot">Building plot</option>
                                            <option value="Building">Building</option>
                                            <option value="Parking space">Parking space</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label class="form_el_label light"><i class="icn icon-country"></i><span>Commune</span></label>
                                    <div class="margin_bottom_10">
                                        <select multiple="multiple" name="object_place">
                                            <option value="Geneva">Geneva</option>
                                            <option value="Bern">Bern</option>
                                            <option value="Zurich">Zurich</option>
                                            <option value="Paris">Paris</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input_container search_input">
                                        <input type="text" placeholder="Entrer un mot-clé">
                                        <button type="submit"><i class="icn icon-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-2 margin_bottom_10">
                            <label class="form_el_label light"><i class="icn icon-price"></i><span>Prix min</span></label>
                            <div class="input_container light margin_bottom_10">
                                <input type="text" placeholder="Min">
                                <div class="input_label">&euro;</div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 margin_bottom_10">
                            <label class="form_el_label light"><i class="icn icon-price"></i><span>Prix max</span></label>
                            <div class="input_container light margin_bottom_10">
                                <input type="text" placeholder="Max">
                                <div class="input_label">&euro;</div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 margin_bottom_10">
                            <label class="form_el_label light"><i class="icn icon-area"></i><span>Surface min</span></label>
                            <div class="input_container light margin_bottom_10">
                                <input type="text" placeholder="Min">
                                <div class="input_label"><span>m<sup>2</sup></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 margin_bottom_10">
                            <label class="form_el_label light"><i class="icn icon-area"></i><span>Surface max</span></label>
                            <div class="input_container light margin_bottom_10">
                                <input type="text" placeholder="Max">
                                <div class="input_label"><span>m<sup>2</sup></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 margin_bottom_10">
                            <label class="form_el_label light"><i class="icn icon-rooms"></i><span>Chambres min</span></label>
                            <div class="input_container light margin_bottom_10">
                                <input type="text" placeholder="Min">
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 margin_bottom_10">
                            <label class="form_el_label light"><i class="icn icon-rooms"></i><span>Chambres max</span></label>
                            <div class="input_container light margin_bottom_10">
                                <input type="text" placeholder="Max">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--<section class="carousel_offers_section">--}}
        {{--<div class="container-fluid">--}}
            {{--<h2>Votre recherche immobiliére</h2>--}}
            {{--<div class="row">--}}
                {{--<div class="col-10">--}}
                    {{--<div class="view_type_container">--}}
                        {{--<ul class="view_type">--}}
                            {{--<li class="hidden-sm-down list_view_btn"><i class="icn icon-list_icn"></i>Liste (371)</li>--}}
                            {{--<li class="grid_view_btn active"><i class="icn icon-grid_icn"></i>Grille (371)</li>--}}
                            {{--<li class="map_view_btn"><i class="icn icon-map_pin"></i>Carte (152)</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="offers_carousel carousel">--}}
                {{--<div>your content</div>--}}
                {{--<div>your content</div>--}}
                {{--<div>your content</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

    @include('includes.footer')

    <script type="text/javascript" src="/js/libraries/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="/js/libraries/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/js/libraries/tether.min.js"></script>
    <script type="text/javascript" src="/js/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/libraries/bootstrap-multiselect.js"></script>
    <script type="text/javascript" src="/js/libraries/slick.min.js"></script>
    <script type="text/javascript" src="/js/scripts.js"></script>
</body>
</html>
