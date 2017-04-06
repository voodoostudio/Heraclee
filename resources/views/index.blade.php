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
    <link rel="stylesheet" type="text/css" href="/css/custom_icons/style.css">
    <link rel="stylesheet" type="text/css" href="/css/global.css">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="logo">
                <img src="/img/logo.svg" alt="Heraclee logo">
            </div>
            <div class="navigation_container">
                <div class="row">
                    <div class="col-6">
                        <p class="header_tel">+33 (0)4 94 54 20 01</p>
                    </div>
                    <div class="col-6">
                        <ul class="lang_currency_container">
                            <li>
                                <ul class="language_select">
                                    <li><a href="#" class="active">Fra</a></li>
                                    <li><a href="#">Eng</a></li>
                                </ul>
                            </li>
                            <li>
                                <select name="currency">
                                    <option value="chf">chf</option>
                                    <option value="eur">euro</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
                <nav>
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Achat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Location</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Promotions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Locaux commerciaux</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Agence</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </header>

    <section class="top_offer_section">
        <div class="my_checkbox">
            <label>
                <input required="" type="checkbox" name="" value="">
                <span class="fake_checkbox"></span>
                <span class="my_checkbox_text">Subscribe to the newsletter</span>
            </label>
        </div>
    </section>

    <section class="search_section">
        <div class="container-fluid">
            <div class="search_block">
                <div class="row">
                    <div class="col-4">
                        Achat-Location
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col-4">
                                <label class="form_el_label light"><i class="icn icon-building"></i><span>Type de bien</span></label>
                                <div class="min_select_container margin_bottom_10">
                                    <select multiple="multiple" name="object_type">
                                        <option value="">House</option>
                                        <option value="">Apartment</option>
                                        <option value="">Building plot</option>
                                        <option value="">Building</option>
                                        <option value="">Parking space</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <label class="form_el_label light"><i class="icn icon-country"></i><span>Lieu</span></label>
                                <div class="min_select_container margin_bottom_10">
                                    <select multiple="multiple" name="object_place">
                                        <option value="">Geneva</option>
                                        <option value="">Bern</option>
                                        <option value="">Zurich</option>
                                        <option value="">Paris</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input_container">
                                    <input type="text" placeholder="Rechercher votre bien">
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
                            <div class="input_label">CHF</div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-2 margin_bottom_10">
                        <label class="form_el_label light"><i class="icn icon-price"></i><span>Prix max</span></label>
                        <div class="input_container light margin_bottom_10">
                            <input type="text" placeholder="Max">
                            <div class="input_label">CHF</div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-2 margin_bottom_10">
                        <label class="form_el_label light"><i class="icn icon-area"></i><span>Surface min</span></label>
                        <div class="input_container light margin_bottom_10">
                            <input type="text" placeholder="Min">
                            <div class="input_label">m<sup>2</sup></div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-2 margin_bottom_10">
                        <label class="form_el_label light"><i class="icn icon-area"></i><span>Surface max</span></label>
                        <div class="input_container light margin_bottom_10">
                            <input type="text" placeholder="Max">
                            <div class="input_label">m<sup>2</sup></div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-2 margin_bottom_10">
                        <label class="form_el_label light"><i class="icn icon-bedroom"></i><span>Chambres min</span></label>
                        <div class="input_container light margin_bottom_10">
                            <input type="text" placeholder="Min">
                            <div class="input_label">CHF</div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-2 margin_bottom_10">
                        <label class="form_el_label light"><i class="icn icon-bedroom"></i><span>Chambres max</span></label>
                        <div class="input_container light margin_bottom_10">
                            <input type="text" placeholder="Max">
                            <div class="input_label">CHF</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="carousel_offers_section">
        Carousel with offers
    </section>

    <footer>
        <section class="top_footer_section">
            Lots of links
        </section>
        <section class="bottom_footer_section">
            Here is footer
        </section>
    </footer>

    <script type="text/javascript" src="/js/libraries/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="/js/libraries/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/js/libraries/tether.min.js"></script>
    <script type="text/javascript" src="/js/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/libraries/bootstrap-multiselect.js"></script>
    <script type="text/javascript" src="/js/scripts.js"></script>
</body>
</html>
