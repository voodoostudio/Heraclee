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
                            <li><img src="/img/details/img_1.png" alt=""></li>
                        @endif
                    @endforeach
                </ul>
                {{--<a data-fancybox="gallery" class="fullscreen_btn" href="/img/details/img_7.png"><i class="icn icon-fullscreen"></i></a>--}}
                <button class="fullscreen_btn"><i class="icn icon-fullscreen"></i></button>
                <div class="object_title">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="object_status">{{$property['category']}}</div>
                                <h2>{{$property['type']}}</h2>
                                <h3>{{$property['city']}} {{ (!empty($property['district'])) ? ' / ' : '' }} {{ $property['district'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gradient_bottom"></div>
                <div class="panorama_link_container">
                    <button>Go to virtual tour<i class="icn icon-arrow_right"></i></button>
                </div>
                <div id="object_panorama"></div>
                <button class="close_panorama"><i class="icn icon-arrow_right"></i>Back to gallery</button>
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
                        @if(!empty($property['area_surface']))
                            <li><span class="icn_container tooltip" title="Living space"><i class="icn icon-area"></i></span><span class="prop_val"><span>{{$property['area_surface']}}m<sup>2</sup></span></span></li>
                        @endif
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
                        @if(!empty($property['floor']['type']))
                            <li><span class="icn_container tooltip" title="Floor"><i class="icn icon-floor"></i></span><span class="prop_val"><span> {{$property['floor']['type']}}</span></span></li>
                        @endif

                        @foreach($services as $service)
                            @switch($service->reference)
                                {{-- Wi-Fi --}}
                                @case(1)
                                    <li class="no_text {{ (!empty($property['services']['1'])) ? '' : 'inactive' }}"><span class="icn_container tooltip" title="{{ $service->value }}"><i class="icn icon-wifi"></i></span><span class="prop_val"></span></li>
                                @break
                                {{-- Disabled access --}}
                                @case(3)
                                    <li class="no_text {{ (!empty($property['services']['3'])) ? '' : 'inactive' }}"><span class="icn_container tooltip" title="{{ $service->value }}"><i class="icn icon-wheelchair"></i></span><span class="prop_val"></span></li>
                                @break
                                {{-- Air conditioner --}}
                                @case(4)
                                    <li class="no_text {{ (!empty($property['services']['4'])) ? '' : 'inactive' }}"><span class="icn_container tooltip" title="{{ $service->value }}"><i class="icn icon-conditioner"></i></span><span class="prop_val"></span></li>
                                @break
                                {{-- Security --}}
                                @case(5)
                                    <li class="no_text {{ (!empty($property['services']['5'])) ? '' : 'inactive' }}"><span class="icn_container tooltip" title="{{ $service->value }}"><i class="icn icon-security"></i></span><span class="prop_val"></span></li>
                                @break
                                {{-- Elevator --}}
                                @case(6)
                                    <li class="no_text {{ (!empty($property['services']['6'])) ? '' : 'inactive' }}"><span class="icn_container tooltip" title="{{ $service->value }}"><i class="icn icon-elevator"></i></span><span class="prop_val"></span></li>
                                @break
                                {{-- Swimming pool --}}
                                @case(11)
                                    <li class="no_text {{ (!empty($property['services']['11'])) ? '' : 'inactive' }}"><span class="icn_container tooltip" title="{{ $service->value }}"><i class="icn icon-swim"></i></span><span class="prop_val"></span></li>
                                @break
                                {{-- Furniture --}}
                                @case(47)
                                    <li class="no_text {{ (!empty($property['services']['47'])) ? '' : 'inactive' }}"><span class="icn_container tooltip" title="{{ $service->value }}"><i class="icn icon-furniture"></i></span><span class="prop_val"></span></li>
                                @break
                            @endswitch
                        @endforeach
                    </ul>
                </div>
            </div>
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
                                    <img src="/img/details/no_agent_photo.svg" alt="">
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
                            @if(!empty($property['type']))
                                <li><span class="detail_name">Type</span><span class="detail_value">{{$property['type']}}</span></li>
                            @endif
                            @if(!empty($property['subtype']))
                                <li><span class="detail_name">Sous-type</span><span class="detail_value">{{$property['subtype']}}</span></li>
                            @endif
                            @if(!empty($property['condition']))
                                <li><span class="detail_name">État</span><span class="detail_value">{{$property['condition']}}</span></li>
                            @endif
                            @if(!empty($property['style']))
                                <li><span class="detail_name">Style</span><span class="detail_value">{{$property['style']}}</span></li>
                            @endif
                            @if(!empty($property['floor']['type']))
                                <li><span class="detail_name">Étage</span><span class="detail_value">{{$property['floor']['type']}}</span></li>
                            @endif
                            @if(!empty($property['view']['landscape']))
                                <li><span class="detail_name">Voir le paysage</span><span class="detail_value">{{$property['view']['landscape']}}</span></li>
                            @endif
                            @if(!empty($property['heating']['device']))
                                <li><span class="detail_name">Type de chauffage</span><span class="detail_value">{{$property['heating']['device']}}</span></li>
                            @endif
                            @if(!empty($property['construction_year']))
                                <li><span class="detail_name">Année de construction</span><span class="detail_value">{{$property['construction_year']}}</span></li>
                            @endif
                            @if(!empty($property['renovation_year']))
                                <li><span class="detail_name">Année de rénovation</span><span class="detail_value">{{$property['renovation_year']}}</span></li>
                            @endif
                            @if(!empty($property['orientations']))
                                <li><span class="detail_name">Orientation</span><span class="detail_value">{{ implode(" | ", $property['orientations']) }}</span></li>
                            @endif
                            @if(!empty($property['heating']))
                                <li><span class="detail_name">Heating</span><span class="detail_value">{{$property['heating']}}</span></li>
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
                            @if(!empty($property['rooms']))
                                <li><span class="detail_name">Piéces </span><span class="detail_value">{{$property['rooms']}}</span></li>
                            @endif
                            @if(!empty($property['bedrooms']))
                                <li><span class="detail_name">Chambres</span><span class="detail_value">{{$property['bedrooms']}}</span></li>
                            @endif
                            {{--<li><span class="detail_name">Terrain</span><span class="detail_value">1 | 1300 m<sup>2</sup></span></li>--}}
                            {{--<li><span class="detail_name">Suites</span><span class="detail_value">5</span></li>--}}
                            {{--<li><span class="detail_name">Sous-sol</span><span class="detail_value">1</span></li>--}}
                            {{--<li><span class="detail_name">Salon</span><span class="detail_value">1</span></li>--}}
                            {{--<li><span class="detail_name">Chambre de maître</span><span class="detail_value">1</span></li>--}}
                            {{--<li><span class="detail_name">Cinéma</span><span class="detail_value">1</span></li>--}}
                            {{--<li><span class="detail_name">Salle à manger</span><span class="detail_value">1</span></li>--}}
                            {{--<li><span class="detail_name">Studios</span><span class="detail_value">2</span></li>--}}
                            {{--<li><span class="detail_name">Piscine intérieure</span><span class="detail_value">1</span></li>--}}
                            {{--<li><span class="detail_name">Cuisine</span><span class="detail_value">1</span></li>--}}
                            {{--<li><span class="detail_name">Dressings</span><span class="detail_value">6</span></li>--}}
                            {{--<li><span class="detail_name">Pool house</span><span class="detail_value">1</span></li>--}}
                        </ul>
                        <h4>Prestations</h4>
                        <h5>Équipments</h5>
                        <ul class="object_add_info_list">
                            @if((!empty($property['services']['1'])) || (!empty($property['services']['2'])) || (!empty($property['services']['4'])) ||
                                (!empty($property['services']['6'])) || (!empty($property['services']['10'])) || (!empty($property['services']['17'])) ||
                                (!empty($property['services']['20'])) || (!empty($property['services']['21'])) || (!empty($property['services']['22'])) ||
                                (!empty($property['services']['23'])) || (!empty($property['services']['24'])) || (!empty($property['services']['25'])) ||
                                (!empty($property['services']['26'])) || (!empty($property['services']['27'])) || (!empty($property['services']['28'])) ||
                                (!empty($property['services']['31'])) || (!empty($property['services']['32'])) || (!empty($property['services']['33'])) ||
                                (!empty($property['services']['38'])) || (!empty($property['services']['39'])) || (!empty($property['services']['40'])) ||
                                (!empty($property['services']['41'])) || (!empty($property['services']['42'])) || (!empty($property['services']['43'])) ||
                                (!empty($property['services']['45'])) || (!empty($property['services']['46'])) || (!empty($property['services']['47'])) ||
                                (!empty($property['services']['48'])) || (!empty($property['services']['49'])) || (!empty($property['services']['50'])) ||
                                (!empty($property['services']['51'])) || (!empty($property['services']['52'])) || (!empty($property['services']['53'])) ||
                                (!empty($property['services']['54'])) || (!empty($property['services']['55'])) || (!empty($property['services']['56'])) ||
                                (!empty($property['services']['57'])) || (!empty($property['services']['58'])) || (!empty($property['services']['61'])) ||
                                (!empty($property['services']['62'])) || (!empty($property['services']['64'])) || (!empty($property['services']['65'])) ||
                                (!empty($property['services']['66'])) || (!empty($property['services']['70'])) || (!empty($property['services']['72'])) ||
                                (!empty($property['services']['73'])) || (!empty($property['services']['74'])) || (!empty($property['services']['75']))
                                )
                                @foreach($services as $service)
                                    @switch($service->reference)

                                        @case(1)
                                            @if(!empty($property['services']['1']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(2)
                                            @if(!empty($property['services']['2']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(4)
                                            @if(!empty($property['services']['4']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(6)
                                            @if(!empty($property['services']['6']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(10)
                                            @if(!empty($property['services']['10']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(17)
                                            @if(!empty($property['services']['17']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(20)
                                            @if(!empty($property['services']['20']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(21)
                                            @if(!empty($property['services']['21']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(22)
                                            @if(!empty($property['services']['22']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(23)
                                            @if(!empty($property['services']['23']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(24)
                                            @if(!empty($property['services']['24']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(25)
                                            @if(!empty($property['services']['25']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(26)
                                            @if(!empty($property['services']['26']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(27)
                                            @if(!empty($property['services']['27']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(28)
                                            @if(!empty($property['services']['28']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(31)
                                            @if(!empty($property['services']['31']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(32)
                                            @if(!empty($property['services']['32']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(33)
                                            @if(!empty($property['services']['33']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(38)
                                            @if(!empty($property['services']['38']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(39)
                                            @if(!empty($property['services']['39']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(40)
                                            @if(!empty($property['services']['40']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(41)
                                            @if(!empty($property['services']['41']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(42)
                                            @if(!empty($property['services']['42']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(43)
                                            @if(!empty($property['services']['43']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(45)
                                            @if(!empty($property['services']['45']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(46)
                                            @if(!empty($property['services']['46']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(47)
                                            @if(!empty($property['services']['47']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(48)
                                            @if(!empty($property['services']['48']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(49)
                                            @if(!empty($property['services']['49']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(50)
                                            @if(!empty($property['services']['50']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(51)
                                            @if(!empty($property['services']['51']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(52)
                                            @if(!empty($property['services']['52']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(53)
                                            @if(!empty($property['services']['53']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(54)
                                            @if(!empty($property['services']['54']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(55)
                                            @if(!empty($property['services']['55']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(56)
                                            @if(!empty($property['services']['56']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(57)
                                            @if(!empty($property['services']['57']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(58)
                                            @if(!empty($property['services']['58']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(61)
                                            @if(!empty($property['services']['61']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(62)
                                            @if(!empty($property['services']['62']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(64)
                                            @if(!empty($property['services']['64']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(65)
                                            @if(!empty($property['services']['65']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(66)
                                            @if(!empty($property['services']['66']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(70)
                                            @if(!empty($property['services']['70']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(72)
                                            @if(!empty($property['services']['72']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(73)
                                            @if(!empty($property['services']['73']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(74)
                                            @if(!empty($property['services']['74']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(75)
                                            @if(!empty($property['services']['75']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break
                                    @endswitch
                                @endforeach
                            @else
                                -
                            @endif
                        </ul>
                        <h5>Espaces extérieurs</h5>
                        <ul class="object_add_info_list">
                            @if((!empty($property['services']['11'])) || (!empty($property['services']['14'])) || (!empty($property['services']['15'])) ||
                                (!empty($property['services']['16'])) || (!empty($property['services']['18'])) || (!empty($property['services']['29'])) ||
                                (!empty($property['services']['30'])) || (!empty($property['services']['35'])) || (!empty($property['services']['44'])) ||
                                (!empty($property['services']['59'])) || (!empty($property['services']['69']))
                            )
                                @foreach($services as $service)
                                    @switch($service->reference)

                                        @case(11)
                                            @if(!empty($property['services']['11']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(14)
                                            @if(!empty($property['services']['14']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(15)
                                            @if(!empty($property['services']['15']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(16)
                                            @if(!empty($property['services']['16']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(18)
                                            @if(!empty($property['services']['18']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(29)
                                            @if(!empty($property['services']['29']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(30)
                                            @if(!empty($property['services']['30']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(35)
                                            @if(!empty($property['services']['35']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(44)
                                            @if(!empty($property['services']['44']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(59)
                                            @if(!empty($property['services']['59']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(69)
                                            @if(!empty($property['services']['69']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break
                                    @endswitch
                                @endforeach
                            @else
                                -
                            @endif
                        </ul>
                        <h5>Sécurité</h5>
                        <ul class="object_add_info_list">
                            @if((!empty($property['services']['3'])) || (!empty($property['services']['5'])) || (!empty($property['services']['7'])) ||
                                (!empty($property['services']['12'])) || (!empty($property['services']['19'])) || (!empty($property['services']['34'])) ||
                                (!empty($property['services']['36'])) || (!empty($property['services']['37'])) || (!empty($property['services']['60'])) ||
                                (!empty($property['services']['63'])) || (!empty($property['services']['67'])) || (!empty($property['services']['68']))
                            )
                                @foreach($services as $service)
                                    @switch($service->reference)

                                        @case(3)
                                            @if(!empty($property['services']['3']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(5)
                                            @if(!empty($property['services']['5']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(7)
                                            @if(!empty($property['services']['7']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(12)
                                            @if(!empty($property['services']['12']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(19)
                                            @if(!empty($property['services']['19']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(34)
                                            @if(!empty($property['services']['34']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(36)
                                            @if(!empty($property['services']['36']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(37)
                                            @if(!empty($property['services']['37']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(60)
                                            @if(!empty($property['services']['60']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(63)
                                            @if(!empty($property['services']['63']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(67)
                                            @if(!empty($property['services']['67']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(68)
                                            @if(!empty($property['services']['68']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break
                                    @endswitch
                                @endforeach
                            @else
                                -
                            @endif
                        </ul>
                        <h5>Équipments sportifs</h5>
                        <ul class="object_add_info_list">
                            @if((!empty($property['services']['13'])) || (!empty($property['services']['71'])))
                                @foreach($services as $service)
                                    @switch($service->reference)

                                        @case(13)
                                            @if(!empty($property['services']['13']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break

                                        @case(71)
                                            @if(!empty($property['services']['71']))
                                                <li><span class="detail_name">{{ $service->value }}</span></li>
                                            @endif
                                        @break
                                    @endswitch
                                @endforeach
                            @else
                                -
                            @endif
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

    <script>
        embedpano({
            swf:"/krpano/Barnes-sttropez.com_les_vanades.swf",
            xml:"/krpano/Barnes-sttropez.com_les_vanades.xml",
            target:"object_panorama"
        });
    </script>

    <script>
        var object_lat = {{$property['latitude']}};
        var object_long = {{$property['longitude']}};
    </script>

    <script type="text/javascript" src="/js/libraries/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="/js/details.js"></script>
@stop


