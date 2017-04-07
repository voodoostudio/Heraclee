<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Heraclee</title>
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

    <section class="top_offer_section" style="background-image: url('/img/homepage_img.jpg')">
        <div class="info_block">
            <h1>Maison de standing</h1>
            <h3>Saint-tropez</h3>
            <a href="#" class="btn">Voir le bien</a>
        </div>
        <div class="gradient_bottom"></div>
    </section>

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

    <section class="carousel_offers_section">
        <div class="container-fluid">
            <h2>Nos derniers biens</h2>
            <div class="offers_carousel carousel">
                <div class="object_block">
                    <div class="object_img_container">
                        <a href="#"><img src="/img/objects/object_1.png"></a>
                        <div class="loading"></div>
                    </div>
                    <div class="object_info_container">
                        <div class="object_info">
                            <a href="#">Saint-Tropez</a>
                            <span class="city">Vanades</span>
                            <span class="price">3 000 000 000 €</span>
                            <ul class="properties">
                                <li>
                                    <span class="icn_container"><i class="icn icon-area"></i></span>
                                    <span class="prop_title">300 m</span><sup>2</sup>
                                </li>
                                <li>
                                    <span class="icn_container"><i class="icn icon-rooms"></i></span>
                                    <span class="prop_title">8</span>
                                </li>
                                <li>
                                    <span class="icn_container"><i class="icn icon-bedroom"></i></span>
                                    <span class="prop_title">5</span>
                                </li>
                                <li>
                                    <span class="icn_container"><i class="icn icon-bathroom"></i></span>
                                    <span class="prop_title">3</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="object_block">
                    <div class="object_img_container">
                        <a href="#"><img src="/img/objects/object_2.png"></a>
                        <div class="loading"></div>
                    </div>
                    <div class="object_info_container">
                        <div class="object_info">
                            <a href="#">Ramatuelle</a>
                            <span class="city">Les Marres</span>
                            <span class="price">2 500 000 000 €</span>
                            <ul class="properties">
                                <li>
                                    <span class="icn_container"><i class="icn icon-area"></i></span>
                                    <span class="prop_title">200 m</span><sup>2</sup>
                                </li>
                                <li>
                                    <span class="icn_container"><i class="icn icon-rooms"></i></span>
                                    <span class="prop_title">7</span>
                                </li>
                                <li>
                                    <span class="icn_container"><i class="icn icon-bedroom"></i></span>
                                    <span class="prop_title">4</span>
                                </li>
                                <li>
                                    <span class="icn_container"><i class="icn icon-bathroom"></i></span>
                                    <span class="prop_title">2</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="object_block">
                    <div class="object_img_container">
                        <a href="#"><img src="/img/objects/object_3.png"></a>
                        <div class="loading"></div>
                    </div>
                    <div class="object_info_container">
                        <div class="object_info">
                            <a href="#">VILLA DES PARCS</a>
                            <span class="city">Saint-Tropez</span>
                            <span class="price">Prix sur demande</span>
                            <ul class="properties">
                                <li>
                                    <span class="icn_container"><i class="icn icon-area"></i></span>
                                    <span class="prop_title">400 m</span><sup>2</sup>
                                </li>
                                <li>
                                    <span class="icn_container"><i class="icn icon-rooms"></i></span>
                                    <span class="prop_title">12</span>
                                </li>
                                <li>
                                    <span class="icn_container"><i class="icn icon-bedroom"></i></span>
                                    <span class="prop_title">6</span>
                                </li>
                                <li>
                                    <span class="icn_container"><i class="icn icon-bathroom"></i></span>
                                    <span class="prop_title">6</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="object_block">
                    <div class="object_img_container">
                        <a href="#"><img src="/img/objects/object_4.png"></a>
                        <div class="loading"></div>
                    </div>
                    <div class="object_info_container">
                        <div class="object_info">
                            <a href="#">VILLAGE</a>
                            <span class="city">Saint-Tropez</span>
                            <span class="price">5 625 €</span>
                            <ul class="properties">
                                <li>
                                    <span class="icn_container"><i class="icn icon-area"></i></span>
                                    <span class="prop_title">380 m</span><sup>2</sup>
                                </li>
                                <li>
                                    <span class="icn_container"><i class="icn icon-rooms"></i></span>
                                    <span class="prop_title">2</span>
                                </li>
                                <li>
                                    <span class="icn_container"><i class="icn icon-bedroom"></i></span>
                                    <span class="prop_title">1</span>
                                </li>
                                <li>
                                    <span class="icn_container"><i class="icn icon-bathroom"></i></span>
                                    <span class="prop_title">1</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


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
