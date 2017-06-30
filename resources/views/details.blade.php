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
                    @foreach($property['pictures'] as $picture)
                        @if(!empty($picture['url']))
                            <li><img src="{{$picture['url']}}" alt=""></li>
                        @else
                            <li><img src="img/details/img_1.png" alt=""></li>
                        @endif
                    @endforeach
                </ul>
                {{--<a data-fancybox="gallery" class="fullscreen_btn" href="/img/details/img_7.png"><i class="icn icon-fullscreen"></i></a>--}}
                <button class="fullscreen_btn"><i class="icn icon-fullscreen"></i></button>
                <div class="object_title">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="object_status">Vente</div>
                                <h2>{{$property['type']}}</h2>
                                <h3>{{$property['city']}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gradient_bottom"></div>
                {{--<div class="panorama_link_container">--}}
                    {{--<button>Go to virtual tour<i class="icn icon-arrow_right"></i></button>--}}
                {{--</div>--}}
                {{--<div id="object_panorama"></div>--}}
                {{--<button class="close_panorama"><i class="icn icon-arrow_right"></i>Back to gallery</button>--}}
            </div>
            <div class="gallery_nav">
                <div class="container-fluid">
                    <ul class="gallery_thumbnails details_gallery_thumbnails">
                        @foreach($property['pictures'] as $picture)
                            @if(!empty($picture['url']))
                                <li><img src="{{$picture['url']}}" alt=""></li>
                            @else
                                <li><img src="img/details/img_1.png" alt=""></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="container-fluid">
                <div class="properties_container">
                    <ul class="properties">
                        <li><span class="icn_container tooltip" title="Living space"><i class="icn icon-area"></i></span><span class="prop_val"><span>300m<sup>2</sup></span></span></li>
                        @if(!empty($property['rooms']))
                            <li><span class="icn_container tooltip" title="Number of rooms"><i class="icn icon-rooms"></i></span><span class="prop_val"><span>{{$property['rooms']}}</span></span></li>
                        @endif
                        @if(!empty($property['bedrooms']))
                            <li><span class="icn_container tooltip" title="Number of bedrooms"><i class="icn icon-bedroom"></i></span><span class="prop_val"><span>{{$property['bedrooms']}}</span></span></li>
                        @endif
                        @if(!empty($property['bathrooms']))
                            <li><span class="icn_container tooltip" title="Number of bathrooms"><i class="icn icon-bathroom"></i></span><span class="prop_val"><span>{{$property['bathrooms']}}</span></span></li>
                        @endif
                        @if(!empty($property['view']['type']))
                            <li><span class="icn_container tooltip" title="Window view"><i class="icn icon-window_view"></i></span><span class="prop_val">{{$property['view']['type']}}</span></li>
                        @endif
                        @if(!empty($property['floor']))
                            <li><span class="icn_container tooltip" title="Floor"><i class="icn icon-floor"></i></span><span class="prop_val"><span>{{$property['floor']}}</span></span></li>
                        @endif
                        <li class="no_text"><span class="icn_container tooltip" title="Parking"><i class="icn icon-parking"></i></span><span class="prop_val"></span></li>
                        <li class="no_text"><span class="icn_container tooltip" title="Disabled access"><i class="icn icon-wheelchair"></i></span><span class="prop_val"></span></li>
                        <li class="no_text"><span class="icn_container tooltip" title="Garden"><i class="icn icon-garden"></i></span><span class="prop_val"></span></li>
                        <li class="no_text inactive"><span class="icn_container tooltip" title="Swimming pool"><i class="icn icon-swim"></i></span><span class="prop_val"></span></li>
                        <li class="no_text"><span class="icn_container tooltip" title="Air conditioner"><i class="icn icon-conditioner"></i></span><span class="prop_val"></span></li>
                        <li class="no_text"><span class="icn_container tooltip" title="Security"><i class="icn icon-security"></i></span><span class="prop_val"></span></li>
                        <li class="no_text"><span class="icn_container tooltip" title="Wi-Fi"><i class="icn icon-wifi"></i></span><span class="prop_val"></span></li>
                        <li class="no_text inactive"><span class="icn_container tooltip" title="Furniture"><i class="icn icon-furniture"></i></span><span class="prop_val"></span></li>
                        <li class="no_text inactive"><span class="icn_container tooltip" title="Elevator"><i class="icn icon-elevator"></i></span><span class="prop_val"></span></li>
                        <li class="no_text"><span class="icn_container tooltip" title="Beach"><i class="icn icon-beach"></i></span><span class="prop_val"></span></li>
                    </ul>
                </div>
            </div>
            {{--@foreach($property['services'] as $service)--}}
                {{--{{$service}}--}}
            {{--@endforeach--}}
        </div>
    </section>

    <section class="agent_info_section">
        <div class="container-fluid">
            <div class="outer_block_container">
                <div class="inner_block_container">
                    <div class="row">
                        <div class="col-xs-12 col-xl-8">
                            <div class="agent_img">
                                @if(!empty($property['user']['picture']))
                                    <img src="{{$property['user']['picture']}}" alt="">
                                @else
                                    <img src="img/details/no_agent_photo.svg" alt="">
                                @endif
                            </div>
                            <div class="agent_info">
                                <p>Contact agent to visit</p>
                                <p class="agent_name">
                                    {{$property['user']['firstname']}} {{$property['user']['lastname']}}
                                </p>
                                <ul>
                                    <li>{{$property['user']['phone']}}</li>
                                    <li><a href="mailto:{{$property['user']['email']}}">{{$property['user']['email']}}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-xl-4">
                            <div class="object_info">
                                <p class="object_id">ID : {{$property['property_id']}}</p>
                                <div class="object_price">{{$property['price_currency']}} {{$property['price']}}</div>
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
            <div class="outer_block_container">
                <div class="inner_block_container">
                    @if(!empty($property['comments']['comment']))
                        <p class="margin_bottom_20">
                            {{$property['comments']['comment']}}
                        </p>
                    @endif
                    <div class="object_details_container">
                        <h4>Informations</h4>
                        <ul class="object_info_list">
                            @if(!empty($property['rooms']))
                                <li><span class="detail_name">Piéces </span><span class="detail_value">{{$property['rooms']}}</span></li>
                            @endif
                            @if(!empty($property['condition']))
                                <li><span class="detail_name">État</span><span class="detail_value">{{$property['condition']}}</span></li>
                            @endif
                            <li><span class="detail_name">Niveaux</span><span class="detail_value">2</span></li>
                            <li><span class="detail_name">Nombre d’étages</span><span class="detail_value">4</span></li>
                            @if(!empty($property['style']))
                                <li><span class="detail_name">Style</span><span class="detail_value">{{$property['style']}}</span></li>
                            @endif
                            @if(!empty($property['floor']))
                                <li><span class="detail_name">Étage</span><span class="detail_value">{{$property['floor']}}</span></li>
                            @endif
                        </ul>
                        <h4>Surfaces</h4>
                        <ul class="object_info_list main_info">
                            @if(!empty($property['area_surface']))
                                <li><span class="detail_name">Surface totale</span><span class="detail_value">{{$property['area_surface']}} m<sup>2</sup></span></li>
                            @endif

                            {{--<li><span class="detail_name">Superficie pondérée</span><span class="detail_value">300 m<sup>2</sup></span></li>--}}
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
                            <input type="checkbox" id="map_cafes" value="bar" name="map_cafes">
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

    {{--<script>--}}
        {{--embedpano({--}}
            {{--swf:"/krpano/Barnes-sttropez.com_les_vanades.swf",--}}
            {{--xml:"/krpano/Barnes-sttropez.com_les_vanades.xml",--}}
            {{--target:"object_panorama"--}}
        {{--});--}}
    {{--</script>--}}

    <script>
        var object_lat = {{$property['latitude']}};
        var object_long = {{$property['longitude']}};
    </script>

    <script type="text/javascript" src="/js/libraries/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/details.js"></script>
@stop


