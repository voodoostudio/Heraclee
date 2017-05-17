@extends('layouts.master')
@section('title', 'Home page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/index.css">
@stop

@section('content')
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
            <div class="outer_block_container">
                <div class="inner_block_container">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <ul class="nav nav-tabs margin_bottom_10">
                                <li class="nav-item">
                                    <a data-toggle="tab" class="nav-link active" href="#">Location</a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" class="nav-link" href="#">Vente</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="row">
                                <div class="col-xl-4 col-sm-6 margin_bottom_10">
                                    <label class="form_el_label"><i class="icn icon-building"></i><span>Type de bien</span></label>
                                    <select multiple="multiple" name="object_type">
                                        <option value="House">House</option>
                                        <option value="Apartment">Apartment</option>
                                        <option value="Building plot">Building plot</option>
                                        <option value="Building">Building</option>
                                        <option value="Parking space">Parking space</option>
                                    </select>
                                </div>
                                <div class="col-xl-4 col-sm-6 margin_bottom_10">
                                    <label class="form_el_label"><i class="icn icon-country"></i><span>Commune</span></label>
                                    <select multiple="multiple" name="object_place">
                                        <option value="Geneva">Geneva</option>
                                        <option value="Bern">Bern</option>
                                        <option value="Zurich">Zurich</option>
                                        <option value="Paris">Paris</option>
                                    </select>
                                </div>
                                <div class="col-xl-4 col-sm-12 margin_bottom_10">
                                    <div class="input_container search_input">
                                        <input type="text" placeholder="Entrer un mot-clé">
                                        <button type="submit"><i class="icn icon-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-price"></i><span>Prix min</span></label>
                            <div class="input_container">
                                <input type="text" placeholder="Min">
                                <div class="input_label">&euro;</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-price"></i><span>Prix max</span></label>
                            <div class="input_container">
                                <input type="text" placeholder="Max">
                                <div class="input_label">&euro;</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-area"></i><span>Surface min</span></label>
                            <div class="input_container">
                                <input type="text" placeholder="Min">
                                <div class="input_label"><span>m<sup>2</sup></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-area"></i><span>Surface max</span></label>
                            <div class="input_container">
                                <input type="text" placeholder="Max">
                                <div class="input_label"><span>m<sup>2</sup></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-rooms"></i><span>Chambres min</span></label>
                            <div class="input_container">
                                <input type="text" placeholder="Min">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-rooms"></i><span>Chambres max</span></label>
                            <div class="input_container">
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
                        <div class="loading"><i class="icn icon-more"></i></div>
                    </div>
                    <div class="object_info_container">
                        <div class="object_info">
                            <a href="#">Saint-Tropez</a>
                            <div class="subtitle">
                                <span class="city">Vanades</span>
                                <span class="price">3 000 000 000 €</span>
                            </div>
                            <div class="properties_block">
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
                                    <span class="property_container">
                                        <span class="icn_container tooltip" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span>
                                        <span class="prop_val">Dégagée Jardin Mer</span>
                                    </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="object_block">
                    <div class="object_img_container">
                        <a href="#"><img src="/img/objects/object_2.png"></a>
                        <div class="loading"><i class="icn icon-more"></i></div>
                    </div>
                    <div class="object_info_container">
                        <div class="object_info">
                            <a href="#">Ramatuelle</a>
                            <div class="subtitle">
                                <span class="city">Les Marres</span>
                                <span class="price">2 500 000 000 €</span>
                            </div>
                            <div class="properties_block">
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
                                    <span class="property_container">
                                        <span class="icn_container tooltip" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span>
                                        <span class="prop_val">Dégagée Jardin Mer</span>
                                    </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="object_block">
                    <div class="object_img_container">
                        <a href="#"><img src="/img/objects/object_3.png"></a>
                        <div class="loading"><i class="icn icon-more"></i></div>
                    </div>
                    <div class="object_info_container">
                        <div class="object_info">
                            <a href="#">VILLA DES PARCS</a>
                            <div class="subtitle">
                                <span class="city">Saint-Tropez</span>
                                <span class="price">Prix sur demande</span>
                            </div>
                            <div class="properties_block">
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
                                    <span class="property_container">
                                        <span class="icn_container tooltip" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span>
                                        <span class="prop_val">Dégagée Jardin Mer</span>
                                    </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="object_block">
                    <div class="object_img_container">
                        <a href="#"><img src="/img/objects/object_4.png"></a>
                        <div class="loading"><i class="icn icon-more"></i></div>
                    </div>
                    <div class="object_info_container">
                        <div class="object_info">
                            <a href="#">VILLAGE</a>
                            <div class="subtitle">
                                <span class="city">Saint-Tropez</span>
                                <span class="price">5 625 €</span>
                            </div>
                            <div class="properties_block">
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
                                        <span class="icn_container tooltip" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span>
                                        <span class="prop_val">Dégagée Jardin Mer</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script src="/js/index.js"></script>
@stop
