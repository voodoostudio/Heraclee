@extends('layouts.master')
@section('title', 'Details page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/libraries/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="/css/details.css">

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy3z5ZYvr8P0eXpKg8QhcqZU6yYg4Nl6k&libraries=drawing,places&language=en"></script>
@stop

@section('content')

    <section class="gallery_section">
        <div class="gallery_container">
            <div class="gallery_view">
                <ul class="gallery details_gallery">
                    <li><img src="/img/details/img_1.png" alt=""></li>
                    <li><img src="/img/details/img_2.png" alt=""></li>
                    <li><img src="/img/details/img_3.png" alt=""></li>
                    <li><img src="/img/details/img_4.png" alt=""></li>
                    <li><img src="/img/details/img_5.png" alt=""></li>
                    <li><img src="/img/details/img_6.png" alt=""></li>
                    <li><img src="/img/details/img_7.png" alt=""></li>
                    <li><img src="/img/details/img_8.png" alt=""></li>
                </ul>
                {{--<a data-fancybox="gallery" class="fullscreen_btn" href="/img/details/img_7.png"><i class="icn icon-fullscreen"></i></a>--}}
                <button class="fullscreen_btn"><i class="icn icon-fullscreen"></i></button>
                <div class="object_title">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="object_status">Vente</div>
                                <h2>Maison de standing</h2>
                                <h3>Maison, Villa / Saint-Tropez</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gradient_bottom"></div>
                <div class="panorama_link_container">
                    <button>Go to virtual tour<i class="icn icon-arrow_right"></i></button>
                </div>
                <div id="object_panorama"></div>
                <button class="close_panorama"><i class="icn icon-cancel"></i></button>
            </div>
            <div class="gallery_nav">
                <div class="container-fluid">
                    <ul class="gallery_thumbnails details_gallery_thumbnails">
                        <li><img src="/img/details/img_1.png" alt=""></li>
                        <li><img src="/img/details/img_2.png" alt=""></li>
                        <li><img src="/img/details/img_3.png" alt=""></li>
                        <li><img src="/img/details/img_4.png" alt=""></li>
                        <li><img src="/img/details/img_5.png" alt=""></li>
                        <li><img src="/img/details/img_6.png" alt=""></li>
                        <li><img src="/img/details/img_7.png" alt=""></li>
                        <li><img src="/img/details/img_8.png" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="container-fluid">
                <div class="properties_container">
                    <ul class="properties">
                        <li><span class="icn_container tooltip" title="Living space"><i class="icn icon-area"></i></span><span class="prop_val"><span>300m<sup>2</sup></span></span></li>
                        <li><span class="icn_container tooltip" title="Number of rooms"><i class="icn icon-rooms"></i></span><span class="prop_val"><span>4</span></span></li>
                        <li><span class="icn_container tooltip" title="Number of bedrooms"><i class="icn icon-bedroom"></i></span><span class="prop_val"><span>4</span></span></li>
                        <li><span class="icn_container tooltip" title="Number of bathrooms"><i class="icn icon-bathroom"></i></span><span class="prop_val"><span>2</span></span></li>
                        <li><span class="icn_container tooltip" title="Window view"><i class="icn icon-window_view"></i></span><span class="prop_val">Dégagée Jardin Collines</span></li>
                        <li><span class="icn_container tooltip" title="Floor"><i class="icn icon-floor"></i></span><span class="prop_val"><span>2ème/2<sup>2</sup></span></span></li>
                        <li><span class="icn_container tooltip" title="Parking"><i class="icn icon-parking"></i></span></li>
                        <li><span class="icn_container tooltip" title="Disabled access"><i class="icn icon-wheelchair"></i></span></li>
                        <li><span class="icn_container tooltip" title="Garden"><i class="icn icon-garden"></i></span></li>
                        <li class="inactive"><span class="icn_container tooltip" title="Swimming pool"><i class="icn icon-swim"></i></span></li>
                        <li><span class="icn_container tooltip" title="Air conditioner"><i class="icn icon-conditioner"></i></span></li>
                        <li><span class="icn_container tooltip" title="Securit"><i class="icn icon-security"></i></span></li>
                        <li><span class="icn_container tooltip" title="Wi-Fi"><i class="icn icon-wifi"></i></span></li>
                        <li class="inactive"><span class="icn_container tooltip" title="Furniture"><i class="icn icon-furniture"></i></span></li>
                        <li class="inactive"><span class="icn_container tooltip" title="Elevator"><i class="icn icon-elevator"></i></span></li>
                        <li><span class="icn_container tooltip" title="Beach"><i class="icn icon-beach"></i></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="contact_section">
        <div class="container-fluid">
            <div class="agent_info_container">
                <div class="agent_info_block">
                    <div class="row">
                        <div class="col-xs-12 col-sm-7 col-md-6 col-lg-8">
                            <div class="agent_img">
                                <img src="img/details/agent.jpg" alt="">
                            </div>
                            <div class="agent_info">
                                <p>Contact agent to visit</p>
                                <p class="agent_name">Pascal de Boo</p>
                                <ul>
                                    <li>+33 4 94 54 20 01</li>
                                    <li><a href="mailto:nego@heraclee.com">nego@heraclee.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-6 col-lg-4">
                            <div class="object_info">
                                <p class="object_id">ID : 1239806</p>
                                <div class="object_price">CHF 2'990'001</div>
                                <button class="btn dark">Je suis intéressé</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="object_info_section">
        <div class="container-fluid">
            <div class="object_info_container">
                <div class="object_info_block">
                    <p class="margin_bottom_20">Propriété Les Vanades, villa d'exception entourée de vignes et vue sur le Golfe de Saint-Tropez, elle dispose d'une surface habitable de 470m2 avec possibilité d'agrandissement en rez-de-jardin de 100m2 environ. La villa offre 5 chambres dont 1 chambre de Maître, chacune possédant sa salle de bains et dressing, très belle cuisine américaine Gaggeneau entièrement équipée ouvrant sur les larges terrasses extérieures en pierre naturelle avec vue sur la piscine et le jardin, le lumineux salon dispose de sa cheminée.
                        Les Vanades se situant quartier des Salins, la villa n'est qu'à quelques mètres de la plage des Canoubiers et à 10 minutes du centre du village.</p>
                    <p class="margin_bottom_30">En détail: <br> Terrain de 4269m2, piscine chauffée avec éclairage LED et son pool house, cave à vins, garage, carport, interphone, digicode, portail électrique, wifi, domotique, climatisation réversible, système de caméras complet, arrosage automatique, hélisurface.</p>
                    <div class="object_details_container">
                        <h4>Informations</h4>
                        <ul class="object_info_list">
                            <li><span class="detail_name">Piéces </span><span class="detail_value">9</span></li>
                            <li><span class="detail_name">État</span><span class="detail_value">Excellent étata</span></li>
                            <li><span class="detail_name">Niveaux</span><span class="detail_value">2</span></li>
                            <li><span class="detail_name">Nombre d’étages</span><span class="detail_value">4</span></li>
                            <li><span class="detail_name">Style</span><span class="detail_value">Contemporain</span></li>
                            <li><span class="detail_name">Étage</span><span class="detail_value">2</span></li>
                        </ul>
                        <h4>Surfaces</h4>
                        <ul class="object_info_list main_info">
                            <li><span class="detail_name">Surface totale</span><span class="detail_value">700 m<sup>2</sup></span></li>
                            <li><span class="detail_name">Superficie pondérée</span><span class="detail_value">300 m<sup>2</sup></span></li>
                        </ul>
                        <ul class="object_info_list">
                            <li><span class="detail_name">Terrain</span><span class="detail_value">1 | 1300 m<sup>2</sup></span></li>
                            <li><span class="detail_name">Suites</span><span class="detail_value">5</span></li>
                            <li><span class="detail_name">Sous-sol</span><span class="detail_value">1</span></li>
                            <li><span class="detail_name">Salon</span><span class="detail_value">1</span></li>
                            <li><span class="detail_name">Chambre de maître</span><span class="detail_value">1</span></li>
                            <li><span class="detail_name">Cinéma</span><span class="detail_value">1</span></li>
                            <li><span class="detail_name">Salle à manger</span><span class="detail_value">1</span></li>
                            <li><span class="detail_name">Studios</span><span class="detail_value">2</span></li>
                            <li><span class="detail_name">Piscine intérieure</span><span class="detail_value">1</span></li>
                            <li><span class="detail_name">Cuisine</span><span class="detail_value">1</span></li>
                            <li><span class="detail_name">Dressings</span><span class="detail_value">6</span></li>
                            <li><span class="detail_name">Pool house</span><span class="detail_value">1</span></li>
                        </ul>
                        <h4>Prestations</h4>
                        <h5>Équipments</h5>
                        <ul class="object_add_info_list">
                            <li><span class="detail_name">Maison de gardien</span></li>
                            <li><span class="detail_name">Double vitrage</span></li>
                            <li><span class="detail_name">Meublé</span></li>
                            <li><span class="detail_name">Baies vitréesublé</span></li>
                        </ul>
                        <h5>Espaces extérieurs</h5>
                        <ul class="object_add_info_list">
                            <li><span class="detail_name">Héliport</span></li>
                            <li><span class="detail_name">Arrosage</span></li>
                        </ul>
                        <h5>Sécurité</h5>
                        <ul class="object_add_info_list">
                            <li><span class="detail_name">Alarme</span></li>
                            <li><span class="detail_name">Gardien</span></li>
                        </ul>
                        <h5>Équipments sportifs</h5>
                        <ul class="object_add_info_list">
                            <li><span class="detail_name">Piscine</span></li>
                            <li><span class="detail_name">Tennis</span></li>
                            <li><span class="detail_name">Cuisinière</span></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="location_section">
        <div class="map_container">
            <div id="object_map"></div>
            <div class="map_sidebar">
                <div id="layers"></div>
                <ul>
                    <li class="map_banks">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_banks" value="bank" name="map_banks">
                            <label for="map_banks" class="checkbox_label"><i class="icn icon-price"></i><span>Banques</span></label>
                        </div>
                    </li>
                    <li class="map_bakeries">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_bakeries" value="bakery" name="map_bakeries">
                            <label for="map_bakeries" class="checkbox_label"><i class="icn icon-bakery"></i><span>Boulangeries</span></label>
                        </div>
                    </li>
                    <li class="map_cafes">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_cafes" value="cafe" name="map_cafes">
                            <label for="map_cafes" class="checkbox_label"><i class="icn icon-cafe"></i><span>Cafés/Pubs</span></label>
                        </div>
                    </li>
                    <li class="map_dentists">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_dentists" value="dentist" name="map_dentists">
                            <label for="map_dentists" class="checkbox_label"><i class="icn icon-dentist"></i><span>Dentistes</span></label>
                        </div>
                    </li>
                    <li class="map_schools">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_schools" value="school" name="map_schools">
                            <label for="map_schools" class="checkbox_label"><i class="icn icon-school"></i><span>Ecoles</span></label>
                        </div>
                    </li>
                    <li class="map_hospitals">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_hospitals" value="hospital" name="map_hospitals">
                            <label for="map_hospitals" class="checkbox_label"><i class="icn icon-hospital"></i><span>Hôpitaux</span></label>
                        </div>
                    </li>
                    <li class="map_dostors">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_dostors" value="doctor" name="map_dostors">
                            <label for="map_dostors" class="checkbox_label"><i class="icn icon-doctor"></i><span>Médecins</span></label>
                        </div>
                    </li>
                    <li class="map_parkings">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_parkings" value="parking" name="map_parkings">
                            <label for="map_parkings" class="checkbox_label"><i class="icn icon-parking"></i><span>Parkings</span></label>
                        </div>
                    </li>
                    <li class="map_pharmacies">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_pharmacies" value="pharmacy" name="map_pharmacies">
                            <label for="map_pharmacies" class="checkbox_label"><i class="icn icon-pharmacy"></i><span>Pharmacies</span></label>
                        </div>
                    </li>
                    <li class="map_police">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_police" value="police" name="map_police">
                            <label for="map_police" class="checkbox_label"><i class="icn icon-police"></i><span>Police</span></label>
                        </div>
                    </li>
                    <li class="map_post_offices">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_post_offices" value="post_office" name="map_post_offices">
                            <label for="map_post_offices" class="checkbox_label"><i class="icn icon-posts"></i><span>Postes</span></label>
                        </div>
                    </li>
                    <li class="map_restaurants">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_restaurants" value="restaurant" name="map_restaurants">
                            <label for="map_restaurants" class="checkbox_label"><i class="icn icon-restaurant"></i><span>Restaurants</span></label>
                        </div>
                    </li>
                    <li class="map_gas_stations">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_gas_stations" value="gas_station" name="map_gas_stations">
                            <label for="map_gas_stations" class="checkbox_label"><i class="icn icon-petrol"></i><span>Stations service</span></label>
                        </div>
                    </li>
                    <li class="map_universities">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_universities" value="university" name="map_universities">
                            <label for="map_universities" class="checkbox_label"><i class="icn icon-university"></i><span>Universités</span></label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script type="text/javascript" src="/krpano/Barnes-sttropez.com_les_vanades.js"></script>

    <script>
        embedpano({
            swf:"/krpano/Barnes-sttropez.com_les_vanades.swf",
            xml:"/krpano/Barnes-sttropez.com_les_vanades.xml",
            target:"object_panorama"
        });
    </script>

    <script type="text/javascript" src="/js/libraries/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/details.js"></script>
@stop


