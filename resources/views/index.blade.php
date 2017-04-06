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
                                            <option value="">House</option>
                                            <option value="">Apartment</option>
                                            <option value="">Building plot</option>
                                            <option value="">Building</option>
                                            <option value="">Parking space</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label class="form_el_label light"><i class="icn icon-country"></i><span>Commune</span></label>
                                    <div class="margin_bottom_10">
                                        <select multiple="multiple" name="object_place">
                                            <option value="">Geneva</option>
                                            <option value="">Bern</option>
                                            <option value="">Zurich</option>
                                            <option value="">Paris</option>
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
        <h2>Nos derniers biens</h2>

    </section>

    <footer>
            <section class="top_footer_section">
                <div class="container-fluid">
                    <h3>Heraclee - Agence Immobilière Saint Tropez</h3>
                    <div class="row">
                        <div class="col-md-2">
                            <ul>
                                <li><a href="#">Gent immobilier de luxe Genève</a></li>
                                <li><a href="#">Immobilier de luxe Genève</a></li>
                                <li><a href="#">Appartement à vendre Genève</a></li>
                                <li><a href="#">Villa à vendre Genève</a></li>
                                <li><a href="#">Villa à vendre Cologny</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <ul>
                                <li><a href="#">Villa à vendre Colonge Bellerive</a></li>
                                <li><a href="#">Villa à vendre Corsier</a></li>
                                <li><a href="#">Villa à vendre Anières</a></li>
                                <li><a href="#">Villa à vendre Vandoeuvres</a></li>
                                <li><a href="#">Propriété à vendre Colonge Bellerive</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <ul>
                                <li><a href="#">Propriété à vendre Cologny</a></li>
                                <li><a href="#">Propriété à vendre Corsier</a></li>
                                <li><a href="#">Propriété à vendre Anières</a></li>
                                <li><a href="#">Propriété à vendre Vandoeuvres</a></li>
                                <li><a href="#">Maison à vendre Genève</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <ul>
                                <li><a href="#">Villa de luxe à vendre Genève</a></li>
                                <li><a href="#">Appartements à vendre à Genève</a></li>
                                <li><a href="#">Maisons et villas à vendre à Genève</a></li>
                                <li><a href="#">Appartement à louer Genève</a></li>
                                <li><a href="#">Appartement à louer Vaud</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <ul>
                                <li><a href="#">Appartement à louer Valais</a></li>
                                <li><a href="#">Appartement à vendre Vaud</a></li>
                                <li><a href="#">Appartement à vendre Valais</a></li>
                                <li><a href="#">Maison à vendre Genève</a></li>
                                <li><a href="#">Maison à vendre Vaud</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <ul>
                                <li><a href="#">Chalet terrain Genève Valais</a></li>
                                <li><a href="#">Immobilier de prestige Genève</a></li>
                                <li><a href="#">Immobilier Genève</a></li>
                                <li><a href="#">Immobilier Vaud</a></li>
                                <li><a href="#">Immobilier Valais</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bottom_footer_section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut</p>
                            <p class="copyright">© 2016 - Heraclee- Création et développement par voodoo studio</p>
                        </div>
                        <div class="col-md-4">
                            <h4>Heraclee - Agence Immobilière Saint Tropez</h4>
                            <div class="contact_block">
                                <a href="/"><img src="/img/logo.svg"></a>
                                <ul>
                                    <li>+33 (0)4 94 54 20 01</li>
                                    <li>44, Route des Plages<br>83990 Saint-Tropez</li>
                                </ul>
                            </div>
                            <div class="input_container light">
                                <input type="text" placeholder="Inscrivez-vous à notre newsletter">
                                <button type="submit"><i class="icn icon-send_message" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
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
