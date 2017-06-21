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

    @include('includes.search_block')

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
