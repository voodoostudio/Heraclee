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
    <link rel="stylesheet" type="text/css" href="/css/results.css">

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

    <section class="results_section">
        <div class="container-fluid">
            <h1 class="margin_bottom_30">Votre recherche immobiliére</h1>
            <div class="row">
                <div class="col-xs-12 col-md-8 col-lg-6 margin_bottom_10">
                    <div class="view_type_container">
                        <ul class="view_type">
                            <li class="hidden-sm-down list_view_btn"><i class="icn icon-list_icn"></i>Liste (371)</li>
                            <li class="grid_view_btn active"><i class="icn icon-grid_icn"></i>Grille (371)</li>
                            <li class="map_view_btn"><i class="icn icon-map_pin"></i>Carte (152)</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 offset-sm-6 col-sm-6 col-md-4 offset-md-0 col-lg-3 offset-lg-3 margin_bottom_10">
                    <select class="selectpicker" name="sorting_type">
                        <option value="">Tout</option>
                        <option value="">10 résultats par page</option>
                        <option value="">50 résultats par page</option>
                        <option value="">100 résultats par page</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="results_container list_view">
            <div id="results_map"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-lg-4 object_block_container">
                        <div class="object_block">
                            <div class="img_block">
                                <div class="activity_label">Loué</div>
                                <div class="exclusive_label">Exclusif</div>
                                <div class="gallery_view">
                                    <ul class="gallery result_preview_gallery">
                                        <li><img src="img/objects/object_1.png" alt=""></li>
                                        <li><img src="img/objects/object_2.png" alt=""></li>
                                        <li><img src="img/objects/object_3.png" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="info_block">
                                <div class="title_container">
                                    <a href="details_for_sale.php"><h2>Amazing apartment</h2></a>
                                    <ul class="social_networks">
                                        <li><a href="#"><i class="icn icon-twitter"></i></a></li>
                                        <li><a href="#"><i class="icn icon-linked_in"></i></a></li>
                                        <li><a href="#"><i class="icn icon-facebook"></i></a></li>
                                    </ul>
                                </div>
                                <div class="description_container">
                                    <h3>Maison à vendre / <span>cologny</span></h3>
                                    <p class="object_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <a href="#" class="btn dark_inverse">Contactez l'agent</a>
                                    <div class="object_price">CHF 2'990'001</div>
                                </div>
                                <div class="properties_container">
                                    <ul class="properties">
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de chambres"><i class="icn icon-bedroom"></i></span>
                                            <span class="prop_title">Nombre de chambres</span><span class="prop_val">5</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de salles de bain"><i class="icn icon-bathroom"></i></span>
                                            <span class="prop_title">Nombre de salles de bain</span><span class="prop_val">4</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de WC"><i class="icn icon-wc"></i></span>
                                            <span class="prop_title">Nombre de WC</span><span class="prop_val">3</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Surface habitable"><i class="icn icon-living_area"></i></span>
                                            <span class="prop_title">Surface habitable</span><span class="prop_val">200m<sup>2</sup></span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Surface du terrain"><i class="icn icon-usable_area"></i></span>
                                            <span class="prop_title">Surface du terrain</span><span class="prop_val">300m<sup>2</sup></span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Etage"><i class="icn icon-outdoor_area"></i></span>
                                            <span class="prop_title">Etage</span><span class="prop_val">400m<sup>2</sup></span>
                                        </li>
                                        <li class="hidden_list"><i class="icn icon-outdoor_area"></i><span class="prop_title">Balcon</span><span class="prop_val">4</span></li>
                                        <li class="empty hidden_list"><i class="icn icon-outdoor_area"></i><span class="prop_title">Terrasse</span><span class="prop_val"></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="gradient_bg"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4 object_block_container">
                        <div class="object_block">
                            <div class="img_block">
                                <div class="activity_label">Loué</div>
                                <div class="exclusive_label">Exclusif</div>
                                <div class="gallery_view">
                                    <ul class="gallery result_preview_gallery">
                                        <li><img src="img/for_sale/for_sale2.jpg" alt=""></li>
                                        <li><img src="img/for_sale/for_sale1.jpg" alt=""></li>
                                        <li><img src="img/for_sale/for_sale3.jpg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="info_block">
                                <div class="title_container">
                                    <a href="details_for_sale.php"><h2>Amazing apartment</h2></a>
                                    <ul class="social_networks">
                                        <li><a href="#"><i class="icn icon-twitter"></i></a></li>
                                        <li><a href="#"><i class="icn icon-linked_in"></i></a></li>
                                        <li><a href="#"><i class="icn icon-facebook"></i></a></li>
                                    </ul>
                                </div>
                                <div class="description_container">
                                    <h3>Maison à vendre / <span>cologny</span></h3>
                                    <p class="object_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <a href="#" class="btn dark_inverse">Contactez l'agent</a>
                                    <div class="object_price">CHF 2'990'000</div>
                                </div>
                                <div class="properties_container">
                                    <ul class="properties">
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de chambres"><i class="icn icon-bedroom"></i></span>
                                            <span class="prop_title">Nombre de chambres</span><span class="prop_val">5</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de salles de bain"><i class="icn icon-bathroom"></i></span>
                                            <span class="prop_title">Nombre de salles de bain</span><span class="prop_val">4</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de WC"><i class="icn icon-wc"></i></span>
                                            <span class="prop_title">Nombre de WC</span><span class="prop_val">3</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Surface habitable"><i class="icn icon-living_area"></i></span>
                                            <span class="prop_title">Surface habitable</span><span class="prop_val">200m<sup>2</sup></span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Surface du terrain"><i class="icn icon-usable_area"></i></span>
                                            <span class="prop_title">Surface du terrain</span><span class="prop_val">300m<sup>2</sup></span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Etage"><i class="icn icon-outdoor_area"></i></span>
                                            <span class="prop_title">Etage</span><span class="prop_val">400m<sup>2</sup></span>
                                        </li>
                                        <li class="hidden_list"><i class="icn icon-outdoor_area"></i><span class="prop_title">Balcon</span><span class="prop_val">4</span></li>
                                        <li class="empty hidden_list"><i class="icn icon-outdoor_area"></i><span class="prop_title">Terrasse</span><span class="prop_val"></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="gradient_bg"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4 object_block_container">
                        <div class="object_block">
                            <div class="img_block">
                                <div class="activity_label">Loué</div>
                                <div class="exclusive_label">Exclusif</div>
                                <div class="gallery_view">
                                    <ul class="gallery result_preview_gallery">
                                        <li><img src="img/for_sale/for_sale3.jpg" alt=""></li>
                                        <li><img src="img/for_sale/for_sale2.jpg" alt=""></li>
                                        <li><img src="img/for_sale/for_sale1.jpg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="info_block">
                                <div class="title_container">
                                    <a href="details_for_sale.php"><h2>Amazing apartment</h2></a>
                                    <ul class="social_networks">
                                        <li><a href="#"><i class="icn icon-twitter"></i></a></li>
                                        <li><a href="#"><i class="icn icon-linked_in"></i></a></li>
                                        <li><a href="#"><i class="icn icon-facebook"></i></a></li>
                                    </ul>
                                </div>
                                <div class="description_container">
                                    <h3>Maison à vendre / <span>cologny</span></h3>
                                    <p class="object_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <a href="#" class="btn dark_inverse">Contactez l'agent</a>
                                    <div class="object_price">CHF 2'990'000</div>
                                </div>
                                <div class="properties_container">
                                    <ul class="properties">
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de chambres"><i class="icn icon-bedroom"></i></span>
                                            <span class="prop_title">Nombre de chambres</span><span class="prop_val">5</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de salles de bain"><i class="icn icon-bathroom"></i></span>
                                            <span class="prop_title">Nombre de salles de bain</span><span class="prop_val">4</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de WC"><i class="icn icon-wc"></i></span>
                                            <span class="prop_title">Nombre de WC</span><span class="prop_val">3</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Surface habitable"><i class="icn icon-living_area"></i></span>
                                            <span class="prop_title">Surface habitable</span><span class="prop_val">200m<sup>2</sup></span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Surface du terrain"><i class="icn icon-usable_area"></i></span>
                                            <span class="prop_title">Surface du terrain</span><span class="prop_val">300m<sup>2</sup></span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Etage"><i class="icn icon-outdoor_area"></i></span>
                                            <span class="prop_title">Etage</span><span class="prop_val">400m<sup>2</sup></span>
                                        </li>
                                        <li class="hidden_list"><i class="icn icon-outdoor_area"></i><span class="prop_title">Balcon</span><span class="prop_val">4</span></li>
                                        <li class="empty hidden_list"><i class="icn icon-outdoor_area"></i><span class="prop_title">Terrasse</span><span class="prop_val"></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="gradient_bg"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4 object_block_container">
                        <div class="object_block">
                            <div class="img_block">
                                <div class="activity_label">Loué</div>
                                <div class="exclusive_label">Exclusif</div>
                                <div class="gallery_view">
                                    <ul class="gallery result_preview_gallery">
                                        <li><img src="img/for_sale/for_sale1.jpg" alt=""></li>
                                        <li><img src="img/for_sale/for_sale2.jpg" alt=""></li>
                                        <li><img src="img/for_sale/for_sale3.jpg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="info_block">
                                <div class="title_container">
                                    <a href="details_for_sale.php"><h2>Amazing apartment</h2></a>
                                    <ul class="social_networks">
                                        <li><a href="#"><i class="icn icon-twitter"></i></a></li>
                                        <li><a href="#"><i class="icn icon-linked_in"></i></a></li>
                                        <li><a href="#"><i class="icn icon-facebook"></i></a></li>
                                    </ul>
                                </div>
                                <div class="description_container">
                                    <h3>Maison à vendre / <span>cologny</span></h3>
                                    <p class="object_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <a href="#" class="btn dark_inverse">Contactez l'agent</a>
                                    <div class="object_price">CHF 2'990'000</div>
                                </div>
                                <div class="properties_container">
                                    <ul class="properties">
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de chambres"><i class="icn icon-bedroom"></i></span>
                                            <span class="prop_title">Nombre de chambres</span><span class="prop_val">5</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de salles de bain"><i class="icn icon-bathroom"></i></span>
                                            <span class="prop_title">Nombre de salles de bain</span><span class="prop_val">4</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de WC"><i class="icn icon-wc"></i></span>
                                            <span class="prop_title">Nombre de WC</span><span class="prop_val">3</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Surface habitable"><i class="icn icon-living_area"></i></span>
                                            <span class="prop_title">Surface habitable</span><span class="prop_val">200m<sup>2</sup></span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Surface du terrain"><i class="icn icon-usable_area"></i></span>
                                            <span class="prop_title">Surface du terrain</span><span class="prop_val">300m<sup>2</sup></span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Etage"><i class="icn icon-outdoor_area"></i></span>
                                            <span class="prop_title">Etage</span><span class="prop_val">400m<sup>2</sup></span>
                                        </li>
                                        <li class="hidden_list"><i class="icn icon-outdoor_area"></i><span class="prop_title">Balcon</span><span class="prop_val">4</span></li>
                                        <li class="empty hidden_list"><i class="icn icon-outdoor_area"></i><span class="prop_title">Terrasse</span><span class="prop_val"></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="gradient_bg"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4 object_block_container">
                        <div class="object_block">
                            <div class="img_block">
                                <div class="activity_label">Loué</div>
                                <div class="exclusive_label">Exclusif</div>
                                <div class="gallery_view">
                                    <ul class="gallery result_preview_gallery">
                                        <li><img src="img/for_sale/for_sale2.jpg" alt=""></li>
                                        <li><img src="img/for_sale/for_sale3.jpg" alt=""></li>
                                        <li><img src="img/for_sale/for_sale1.jpg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="info_block">
                                <div class="title_container">
                                    <a href="details_for_sale.php"><h2>Amazing apartment</h2></a>
                                    <ul class="social_networks">
                                        <li><a href="#"><i class="icn icon-twitter"></i></a></li>
                                        <li><a href="#"><i class="icn icon-linked_in"></i></a></li>
                                        <li><a href="#"><i class="icn icon-facebook"></i></a></li>
                                    </ul>
                                </div>
                                <div class="description_container">
                                    <h3>Maison à vendre / <span>cologny</span></h3>
                                    <p class="object_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <a href="#" class="btn dark_inverse">Contactez l'agent</a>
                                    <div class="object_price">CHF 2'990'000</div>
                                </div>
                                <div class="properties_container">
                                    <ul class="properties">
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de chambres"><i class="icn icon-bedroom"></i></span>
                                            <span class="prop_title">Nombre de chambres</span><span class="prop_val">5</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de salles de bain"><i class="icn icon-bathroom"></i></span>
                                            <span class="prop_title">Nombre de salles de bain</span><span class="prop_val">4</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de WC"><i class="icn icon-wc"></i></span>
                                            <span class="prop_title">Nombre de WC</span><span class="prop_val">3</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Surface habitable"><i class="icn icon-living_area"></i></span>
                                            <span class="prop_title">Surface habitable</span><span class="prop_val">200m<sup>2</sup></span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Surface du terrain"><i class="icn icon-usable_area"></i></span>
                                            <span class="prop_title">Surface du terrain</span><span class="prop_val">300m<sup>2</sup></span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Etage"><i class="icn icon-outdoor_area"></i></span>
                                            <span class="prop_title">Etage</span><span class="prop_val">400m<sup>2</sup></span>
                                        </li>
                                        <li class="hidden_list"><i class="icn icon-outdoor_area"></i><span class="prop_title">Balcon</span><span class="prop_val">4</span></li>
                                        <li class="empty hidden_list"><i class="icn icon-outdoor_area"></i><span class="prop_title">Terrasse</span><span class="prop_val"></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="gradient_bg"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4 object_block_container">
                        <div class="object_block">
                            <div class="img_block">
                                <div class="activity_label">Loué</div>
                                <div class="exclusive_label">Exclusif</div>
                                <div class="gallery_view">
                                    <ul class="gallery result_preview_gallery">
                                        <li><img src="img/for_sale/for_sale3.jpg" alt=""></li>
                                        <li><img src="img/for_sale/for_sale1.jpg" alt=""></li>
                                        <li><img src="img/for_sale/for_sale2.jpg" alt=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="info_block">
                                <div class="title_container">
                                    <a href="details_for_sale.php"><h2>Amazing apartment</h2></a>
                                    <ul class="social_networks">
                                        <li><a href="#"><i class="icn icon-twitter"></i></a></li>
                                        <li><a href="#"><i class="icn icon-linked_in"></i></a></li>
                                        <li><a href="#"><i class="icn icon-facebook"></i></a></li>
                                    </ul>
                                </div>
                                <div class="description_container">
                                    <h3>Maison à vendre / <span>cologny</span></h3>
                                    <p class="object_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <a href="#" class="btn dark_inverse">Contactez l'agent</a>
                                    <div class="object_price">CHF 2'990'000</div>
                                </div>
                                <div class="properties_container">
                                    <ul class="properties">
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de chambres"><i class="icn icon-bedroom"></i></span>
                                            <span class="prop_title">Nombre de chambres</span><span class="prop_val">5</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de salles de bain"><i class="icn icon-bathroom"></i></span>
                                            <span class="prop_title">Nombre de salles de bain</span><span class="prop_val">4</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Nombre de WC"><i class="icn icon-wc"></i></span>
                                            <span class="prop_title">Nombre de WC</span><span class="prop_val">3</span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Surface habitable"><i class="icn icon-living_area"></i></span>
                                            <span class="prop_title">Surface habitable</span><span class="prop_val">200m<sup>2</sup></span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Surface du terrain"><i class="icn icon-usable_area"></i></span>
                                            <span class="prop_title">Surface du terrain</span><span class="prop_val">300m<sup>2</sup></span>
                                        </li>
                                        <li>
                                            <span class="icn_container tooltip" title="Etage"><i class="icn icon-outdoor_area"></i></span>
                                            <span class="prop_title">Etage</span><span class="prop_val">400m<sup>2</sup></span>
                                        </li>
                                        <li class="hidden_list"><i class="icn icon-outdoor_area"></i><span class="prop_title">Balcon</span><span class="prop_val">4</span></li>
                                        <li class="empty hidden_list"><i class="icn icon-outdoor_area"></i><span class="prop_title">Terrasse</span><span class="prop_val"></span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="gradient_bg"></div>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <ul class="pagination">
                    <li class="page-item">
                        <a href="#" class="page-link" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                        </a>
                    </li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item">
                        <a href="#" class="page-link" aria-label="Next">
                            <span aria-hidden="true">»</span>
                        </a>
                    </li>
                </ul>
            </nav>
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
    <script type="text/javascript" src="/js/results.js"></script>
</body>
</html>
