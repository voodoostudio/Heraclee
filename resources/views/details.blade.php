@extends('layouts.socials')

@section('title', (isset($property['comments']['comment'])) ? substr($property['comments']['comment'],0,70) : '')

@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp

@section('css')
    {{--<link rel="stylesheet" type="text/css" href="/css/libraries/jquery.fancybox.min.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="/css/details.min.css">--}}
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy3z5ZYvr8P0eXpKg8QhcqZU6yYg4Nl6k&libraries=drawing,places&language={{$lang}}"></script>
    <script src='https://www.google.com/recaptcha/api.js?hl={{$lang}}'></script>
    <style>
        .rc-anchor-light {
            background: transparent!important;
        }
    </style>
@stop

@section('content')

    @php
        $comment_description = (isset($property['comments']['comment']) ? $property['comments']['comment'] : '');
        $comment_title = (isset($property['comments']['title']) ? $property['comments']['title'] : '');
    @endphp

    @php
        $image = [];
        foreach($property['pictures'] as $picture) {
            $image[$picture['rank']] = $picture['url'];
        }
        ksort($image);
    @endphp

    @if(!empty($_GET['page']) == 'slider')
        <section class="objects_nav_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        @if($mp_prev > -1)
                            <a href="{{ ($property['category']['reference'] == 1) || ($property['category']['reference'] == 4) || ($property['category']['reference'] == 5) || ($property['category']['reference'] == 6) ? route('details', ['subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])), 'city' => mb_strtolower(str_replace(" ", "-", $property['city'])), 'id' => $mp_property_id[$mp_prev]]) : route('locationsDetails', ['subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])), 'city' => mb_strtolower(str_replace(" ", "-", $property['city'])), 'id' => $mp_property_id[$mp_prev]]) }}?page=main" class="nav_link prev">
                                <i class="icn icon-arrow_big_left"></i>
                                <span>{{ trans('lang.previous') }}</span>
                            </a>
                        @endif
                    </div>
                    <div class="col-6">
                        @if($mp_next < count($mp_property_id))
                            <a href="{{ ($property['category']['reference'] == 1) || ($property['category']['reference'] == 4) || ($property['category']['reference'] == 5) || ($property['category']['reference'] == 6) ? route('details', ['subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])), 'city' => mb_strtolower(str_replace(" ", "-", $property['city'])), 'id' => $mp_property_id[$mp_next]]) : route('locationsDetails', ['subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])), 'city' => mb_strtolower(str_replace(" ", "-", $property['city'])), 'id' => $mp_property_id[$mp_next]]) }}?page=main" class="nav_link next">
                                <span>{{ trans('lang.next') }}</span>
                                <i class="icn icon-arrow_big_right"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="objects_nav_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        @if($prev > -1)
                            <a href="{{ ($property['category']['reference'] == 1) || ($property['category']['reference'] == 4) || ($property['category']['reference'] == 5) || ($property['category']['reference'] == 6) ? route('details', ['subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])), 'city' => mb_strtolower(str_replace(" ", "-", $property['city'])), 'id' => $property_id[$prev]]) : route('locationsDetails', ['subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])), 'city' => mb_strtolower(str_replace(" ", "-", $property['city'])), 'id' => $property_id[$prev]]) }}" class="nav_link prev">
                                <i class="icn icon-arrow_big_left"></i>
                                <span>{{ trans('lang.previous') }}</span>
                            </a>
                        @endif
                    </div>
                    <div class="col-6">
                        @if($next < count($property_id))
                            <a href="{{ ($property['category']['reference'] == 1) || ($property['category']['reference'] == 4) || ($property['category']['reference'] == 5) || ($property['category']['reference'] == 6) ? route('details', ['subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])), 'city' => mb_strtolower(str_replace(" ", "-", $property['city'])), 'id' => $property_id[$next]]) : route('locationsDetails', ['subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])), 'city' => mb_strtolower(str_replace(" ", "-", $property['city'])), 'id' => $property_id[$next]]) }}" class="nav_link next">
                                <span>{{ trans('lang.next') }}</span>
                                <i class="icn icon-arrow_big_right"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="gallery_section">
        <div class="gallery_container">
            <ul class="social_networks_share">
                <li><a class="twitter-share-button" onclick="window.open($(this).attr('href'), 'Twitter', config='height=216, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://twitter.com/home?status={{ $comment_title }}+{{ Request::fullUrl() }}"><i class="icn icon-twitter"></i></a></li>
                {{--<li><a class="linkedin-share-button" onclick="window.open($(this).attr('href'), 'Linkedin', config='height=560, width=500, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&url={{ Request::fullUrl() }}&title={{ $comment_title }}&summary={{ $comment_description }}"><i class="icn icon-linked_in"></i></a></li>--}}
                <li><a class="fb-share-button" onclick="window.open($(this).attr('href'), 'Facebook', config='height=100, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://www.facebook.com/share.php?u={{ Request::fullUrl() }}"><i class="icn icon-facebook"></i></a></li>
            </ul>
            <div class="gallery_view">
                <ul class="gallery details_gallery">
                    @foreach($image as $picture)
                        @if(!empty($picture))
                            <li><img src="{{$picture}}" alt=""></li>
                        @else
                            <li><img src="/img/details/img_1.png" alt=""></li>
                        @endif
                    @endforeach
                </ul>
                <button class="fullscreen_btn tooltip" title="{{ trans('lang.show_image_on_fullscreen') }}" data-placement="right"><i class="icn icon-fullscreen"></i></button>
                <div class="object_title">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="object_status"><span class="img_bg_text">{{$property['category']['value']}}</span></div>
                                <h2>{{$property['type']}}</h2>
                                <h3>{{$property['city']}} {{ (!empty($property['district'])) ? ' / ' : '' }} {{ $property['district'] }}</h3>
                                @php
                                    $date_created = new DateTime($property['created_at']);
                                    $date_updated = new DateTime($property['updated_at']);
                                    $now = new DateTime();
                                    $past = new DateTime('1970-01-01');
                                @endphp

                                {{--<ul class="creation_date">--}}
                                {{--<li><b>{{ trans('lang.created_at') }}</b>  {{ date('d.m.Y', strtotime($property['created_at'])) }}</li>--}}
                                {{--<li><b>{{ trans('lang.updated_at') }}</b>  {{ date('d.m.Y', strtotime($property['updated_at'])) }}</li>--}}
                                {{--</ul>--}}
                                @if($date_created->diff($now)->format("%m") < 3 && $date_created->diff($now)->format("%y") == 0 ||
                                    $date_updated->diff(($date_created->diff($now)->format("%m") < 3 && $date_created->diff($now)->format("%y") == 0) ? $date_created : $past)->format("%m") < 3 &&
                                    $date_updated->diff(($date_created->diff($now)->format("%m") < 3 && $date_created->diff($now)->format("%y") == 0) ? $date_created : $past)->format("%y") == 0
                                )
                                    <div class="new_label">
                                        @if($date_created->diff($now)->format("%m") < 3 && $date_created->diff($now)->format("%y") == 0)
                                            <span>{{ trans('lang.new') }}</span>
                                        @endif

                                        @if($date_updated->diff(($date_created->diff($now)->format("%m") < 3 && $date_created->diff($now)->format("%y") == 0) ? $date_created : $past)->format("%m") < 3 &&
                                            $date_updated->diff(($date_created->diff($now)->format("%m") < 3 && $date_created->diff($now)->format("%y") == 0) ? $date_created : $past)->format("%y") == 0
                                            )
                                                {{--<span class="updated">{{ trans('lang.updated') }}</span>--}}
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                @if(!empty($property['agreement']) && $property['agreement']['reference'] == 3)
                    <div class="exclusive_label_container">
                        <div class="exclusive_label">{{ $property['agreement']['value'] }}</div>
                    </div>
                @endif

                <div class="gradient_bottom"></div>
                @if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/virtual_tours/' . $property['property_id'] . '/property_' . $property['property_id'] . '.js'))
                    <div class="panorama_link_container">
                        <button>{{ trans('lang.virtual_tour') }}<i class="icn icon-arrow_right"></i></button>

                        <a href="/virtual_tours/{{ $property['property_id'] }}/property_{{ $property['property_id'] }}.html" >{{ trans('lang.virtual_tour') }}<i class="icn icon-arrow_right"></i></a>
                    </div>
                @endif
                <div id="object_panorama"></div>
            </div>

            <div class="close_panorama_container">
                <button class="close_panorama"><i class="icn icon-arrow_right"></i>{{ trans('lang.back_to_gallery') }}</button>
            </div>
            <div class="gallery_nav">
                <div class="container-fluid">
                    <ul class="gallery_thumbnails details_gallery_thumbnails">
                        @foreach($image as $picture)
                            @if(!empty($picture))
                                <li><img src="{{$picture}}" alt=""></li>
                            @else
                                <li><img src="img/details/img_1.png" alt=""></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="container-fluid">
                <div class="parameters_container">
                    <ul class="parameters">
                        @if(!empty($property['area_surface']))
                            <li><span class="icn_container tooltip" title="{{ trans('lang.living_space') }}"><i class="icn icon-area"></i></span><span class="prop_val"><span>{{$property['area_surface']}}m<sup>2</sup></span></span></li>
                        @endif
                        @if(!empty($property['rooms']))
                            <li><span class="icn_container tooltip" title="{{ trans('lang.number_of_pieces') }}"><i class="icn icon-rooms"></i></span><span class="prop_val"><span>{{$property['rooms']}}</span></span></li>
                        @endif
                        @if(!empty($property['bedrooms']))
                            <li><span class="icn_container tooltip" title="{{ trans('lang.number_of_rooms') }}"><i class="icn icon-bedroom"></i></span><span class="prop_val"><span>{{$property['bedrooms']}}</span></span></li>
                        @endif
                        @if(!empty($property['bathrooms']))
                            <li><span class="icn_container tooltip" title="{{ trans('lang.number_of_bathrooms') }}"><i class="icn icon-bathroom"></i></span><span class="prop_val"><span>{{$property['bathrooms']}}</span></span></li>
                        @endif
                        @if(!empty($property['landscape']))
                            <li><span class="icn_container tooltip" title="{{ trans('lang.view') }}"><i class="icn icon-window_view"></i></span><span class="prop_val">{{ implode(", ", $property['landscape']) }}</span></li>
                        @endif
                        @if(!empty($property['floor']['type']))
                            <li><span class="icn_container tooltip" title="{{ trans('lang.floor') }}"><i class="icn icon-floor"></i></span><span class="prop_val"><span> {{$property['floor']['type']}}</span></span></li>
                        @endif
                        @foreach($services as $service)
                            @if($service->reference == '1' && $service->locale == $lang)
                                <li class="no_text {{ (!empty($property['services']['1'])) ? '' : 'inactive' }}"><span class="icn_container tooltip" title="{{ $service->value }}"><i class="icn icon-wifi"></i></span><span class="prop_val"></span></li>
                            @endif
                            @if($service->reference == '3' && $service->locale == $lang)
                                <li class="no_text {{ (!empty($property['services']['3'])) ? '' : 'inactive' }}"><span class="icn_container tooltip" title=" {{ $service->value }} "><i class="icn icon-wheelchair"></i></span><span class="prop_val"></span></li>
                            @endif
                            @if($service->reference == '4' && $service->locale == $lang)
                                <li class="no_text {{ (!empty($property['services']['4'])) ? '' : 'inactive' }}"><span class="icn_container tooltip" title="{{ $service->value }}"><i class="icn icon-conditioner"></i></span><span class="prop_val"></span></li>
                            @endif
                            @if($service->reference == '5' && $service->locale == $lang)
                                <li class="no_text {{ (!empty($property['services']['5'])) ? '' : 'inactive' }}"><span class="icn_container tooltip" title="{{ $service->value }}"><i class="icn icon-alarm"></i></span><span class="prop_val"></span></li>
                            @endif
                            @if($service->reference == '6' && $service->locale == $lang)
                                <li class="no_text {{ (!empty($property['services']['6'])) ? '' : 'inactive' }}"><span class="icn_container tooltip" title="{{ $service->value }}"><i class="icn icon-elevator"></i></span><span class="prop_val"></span></li>
                            @endif
                            @if($service->reference == '11' && $service->locale == $lang)
                                <li class="no_text {{ (!empty($property['services']['11'])) ? '' : 'inactive' }}"><span class="icn_container tooltip" title="{{ $service->value }}"><i class="icn icon-swim"></i></span><span class="prop_val"></span></li>
                            @endif
                            @if($service->reference == '18' && $service->locale == $lang)
                                <li class="no_text {{ (!empty($property['services']['18'])) ? '' : 'inactive' }}"><span class="icn_container tooltip" title="{{ $service->value }}"><i class="icn icon-parking"></i></span><span class="prop_val"></span></li>
                            @endif
                            @if($service->reference == '47' && $service->locale == $lang)
                                <li class="no_text {{ (!empty($property['services']['47'])) ? '' : 'inactive' }}"><span class="icn_container tooltip" title="{{ $service->value }}"><i class="icn icon-furniture"></i></span><span class="prop_val"></span></li>
                            @endif
                        @endforeach
                            {{-- Beach
                            <li class="no_text"><span class="icn_container tooltip" title="Beach"><i class="icn icon-beach"></i></span><span class="prop_val"></span></li>
                            {{-- Garden
                            <li class="no_text"><span class="icn_container tooltip" title="Garden"><i class="icn icon-garden"></i></span><span class="prop_val"></span></li>--}}
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
                            <div class="agent_info_block">
                                <div class="agent_img">
                                    {{--@if(!empty($property['user']['picture']))--}}
                                        {{--<img src="{{$property['user']['picture']}}" alt="">--}}
                                    {{--@else--}}
                                        {{--<img src="/img/details/no_agent_photo.svg" alt="">--}}
                                    {{--@endif--}}
                                    <img src="/img/logo.svg" alt="">
                                </div>
                                <div class="agent_info">
                                    <p>{{ trans('lang.contact_agent_to_visit') }}</p>
                                    <p class="agent_name">
                                        <span class="img_bg_text">
                                            SAINT-TROPEZ
                                        </span>
                                        {{-- {{$property['user']['firstname']}} {{$property['user']['lastname']}}--}}
                                    </p>
                                    <ul>
                                        {{--@if(!empty($property['user']['phone']))--}}
                                            {{--<li><a href="tel:{{$property['user']['phone']}}">{{$property['user']['phone']}}</a></li>--}}
                                        {{--@endif--}}
                                        {{--@if(!empty($property['user']['email']))--}}
                                            {{--<li><a href="mailto:{{$property['user']['email']}}">{{$property['user']['email']}}</a></li>--}}
                                        {{--@endif--}}

                                        <li><a href="tel:+33 (0)4 94 54 20 01">+33 (0)4 94 54 20 01</a></li>

                                        <li><a href="mailto:info@heraclee.com">info@heraclee.com</a></li>

                                    </ul>
                                </div>
                            </div>

                            <!-- Agent Modal Popup -->
                            @include('includes.agent_contact_modal')
                        </div>
                        <div class="col-xs-12 col-xl-4">
                            <div class="object_info">
                                <p class="object_id">{{ trans('lang.id') }} : {{$property['reference']}}</p>
                                @if($property['price'] != 0)
                                    <div class="object_price">{{ number_format($property['price'], 0, ' ', ' ') }} {!! ($property['price_currency'] == 'EUR') ? '€ <span class="tooltip" title="' . trans("lang.agency_fee_included") . '">' . trans("lang.afi") . '</span>' : '' !!} {!! (!empty($property['price_period'])) ? '<span> / '.$property['price_period'].'</span>' : '' !!}</div>
                                @else
                                    <div class="object_price">{{ trans('lang.zero_price') }}</div>
                                @endif
                                <button type="button" class="btn dark" data-toggle="modal" data-target="#agencyContactModal">{{ trans('lang.i_am_interested') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="object_info_section reveal">
        <div class="container-fluid">
            <div class="outer_block_container">
                <div class="inner_block_container">
                    {{--<p class="publication_date">--}}
                        {{--@php--}}
                            {{--$date = new DateTime($property['created_at']);--}}
                            {{--$now = new DateTime();--}}
                        {{--@endphp--}}
                        {{--@if($date->diff($now)->format("%m") < 3 && $date->diff($now)->format("%y") == 0)--}}
                            {{--<span>{{ trans('lang.created_at') }}</b>  {{ date('d.m.Y', strtotime($property['created_at'])) }}</span>--}}
                            {{--<span>{{ trans('lang.updated_at') }}</b>  {{ date('d.m.Y', strtotime($property['updated_at'])) }}</span>--}}
                        {{--@endif--}}
                    {{--</p>--}}
                    @if(!empty($property['comments']['comment']))
                        <p class="margin_bottom_20 description">
                            {{$property['comments']['comment']}}
                        </p>
                    @endif
                    <div class="object_details_container">
                        <h4>{{ trans('lang.informations') }}</h4>
                        <ul class="object_info_list">
                            @if(!empty($property['type']))
                                <li class="tooltip" title="{{ trans('lang.type') }} : {{ $property['type'] }}"><span class="detail_name">{{ trans('lang.type') }}</span><span class="detail_value">{{ $property['type'] }}</span></li>
                            @endif
                            @if(!empty($property['rooms']))
                                <li class="tooltip" title="{{ trans('lang.number_of_pieces') }} : {{ $property['rooms'] }}"><span class="detail_name">{{ trans('lang.number_of_pieces') }}</span><span class="detail_value">{{ $property['rooms'] }}</span></li>
                            @endif
                            @if(!empty($property['bedrooms']))
                                <li class="tooltip" title="{{ trans('lang.number_of_rooms') }} : {{ $property['bedrooms'] }}"><span class="detail_name">{{ trans('lang.number_of_rooms') }}</span><span class="detail_value">{{ $property['bedrooms'] }}</span></li>
                            @endif
                            {{--@if(!empty($property['subtype']))
                                <li class="tooltip" title="{{ trans('lang.sub_type') }} : {{ $property['subtype'] }}"><span class="detail_name">{{ trans('lang.sub_type') }}</span><span class="detail_value">{{ $property['subtype'] }}</span></li>
                            @endif--}}
                            @if(!empty($property['condition']))
                                <li class="tooltip" title="{{ trans('lang.condition') }} : {{ $property['condition'] }}"><span class="detail_name">{{ trans('lang.condition') }}</span><span class="detail_value">{{ $property['condition'] }}</span></li>
                            @endif
                            @if(!empty($property['style']))
                                <li class="tooltip" title="{{ trans('lang.style') }} : {{ $property['style'] }}"><span class="detail_name">{{ trans('lang.style') }}</span><span class="detail_value">{{ $property['style'] }}</span></li>
                            @endif
                            @if(!empty($property['floor']['type']))
                                <li class="tooltip" title="{{ trans('lang.floor') }} : {{ $property['floor']['type'] }}"><span class="detail_name">{{ trans('lang.floor') }}</span><span class="detail_value">{{ $property['floor']['type'] }}</span></li>
                            @endif
                            @if(!empty($property['floor']['floors']))
                                <li class="tooltip" title="{{ trans('lang.number_of_floors') }} : {{ $property['floor']['floors'] }}"><span class="detail_name">{{ trans('lang.number_of_floors') }}</span><span class="detail_value">{{ $property['floor']['floors'] }}</span></li>
                            @endif
                            @if(!empty($property['landscape']))
                                <li class="tooltip" title="{{ trans('lang.landscape_view') }} : {{ implode(" | ", $property['landscape']) }}"><span class="detail_name">{{ trans('lang.landscape_view') }}</span><span class="detail_value">{{ implode(" | ", $property['landscape']) }}</span></li>
                            @endif
                            @if(!empty($property['heating']['device']))
                                <li class="tooltip" title="{{ trans('lang.heating_type') }} : {{ $property['heating']['device'] }}"><span class="detail_name">{{ trans('lang.heating_type') }}</span><span class="detail_value">{{ $property['heating']['device'] }}</span></li>
                            @endif
                            {{--@if(!empty($property['construction_year']))
                                <li class="tooltip" title="{{ trans('lang.construction_year') }} : {{ $property['construction_year'] }}"><span class="detail_name">{{ trans('lang.construction_year') }}</span><span class="detail_value">{{ $property['construction_year'] }}</span></li>
                            @endif
                            @if(!empty($property['renovation_year']))
                                <li class="tooltip" title="{{ trans('lang.renovation_year') }} : {{ $property['renovation_year'] }}"><span class="detail_name">{{ trans('lang.renovation_year') }}</span><span class="detail_value">{{ $property['renovation_year'] }}</span></li>
                            @endif--}}
                            @if(!empty($property['orientations']))
                                <li class="tooltip" title="{{ trans('lang.orientation') }} : {{ implode(" | ", $property['orientations']) }}"><span class="detail_name">{{ trans('lang.orientation') }}</span><span class="detail_value">{{ implode(" | ", $property['orientations']) }}</span></li>
                            @endif
                            @foreach($property['heating'] as $heating)
                                @if(!empty($heating['device']))
                                    <li class="tooltip" title="{{ trans('lang.heating_device') }} : {{ $heating['device'] }}"><span class="detail_name">{{ trans('lang.heating_device') }}</span><span class="detail_value">{{ $heating['device'] }}</span></li>
                                @endif
                                @if(!empty($heating['access']))
                                    <li class="tooltip" title="{{ trans('lang.heating_access') }} : {{ $heating['access'] }}"><span class="detail_name">{{ trans('lang.heating_access') }}</span><span class="detail_value">{{ $heating['access'] }}</span></li>
                                @endif
                                @if(!empty($heating['type']))
                                    <li class="tooltip" title="{{ trans('lang.heating_type') }} : {{ $heating['type'] }}"><span class="detail_name">{{ trans('lang.heating_type') }}</span><span class="detail_value">{{ $heating['type'] }}</span></li>
                                @endif
                            @endforeach
                            @foreach($property['areas'] as $area)
                                @if(!empty($area['flooring']))
                                    <li class="tooltip" title="{{ trans('lang.flooring') }} : {{ $area['flooring'] }}"><span class="detail_name">{{ trans('lang.flooring') }}</span><span class="detail_value">{{ $area['flooring'] }}</span></li>
                                @endif
                            @endforeach
                            @foreach($property['water'] as $water)
                                @if(!empty($water['hot_access']))
                                    <li class="tooltip" title="{{ trans('lang.hot_water_access') }} : {{ $water['hot_access'] }}"><span class="detail_name">{{ trans('lang.hot_water_access') }}</span><span class="detail_value">{{ $water['hot_access'] }}</span></li>
                                @endif
                                @if(!empty($water['hot_device']))
                                    <li class="tooltip" title="{{ trans('lang.hot_water_device') }} : {{ $water['hot_device'] }}"><span class="detail_name">{{ trans('lang.hot_water_device') }}</span><span class="detail_value">{{ $water['hot_device'] }}</span></li>
                                @endif
                                @if(!empty($water['waste']))
                                    <li class="tooltip" title="{{ trans('lang.water_waste') }} : {{ $water['waste'] }}"><span class="detail_name">{{ trans('lang.water_waste') }}</span><span class="detail_value">{{ $water['waste'] }}</span></li>
                                @endif
                            @endforeach
                            @if(!empty($property['standing']))
                                <li class="tooltip" title="{{ trans('lang.standing') }} : {{ $property['standing'] }}"><span class="detail_name">{{ trans('lang.standing') }}</span><span class="detail_value">{{ $property['standing'] }}</span></li>
                            @endif
                        </ul>
                        <h4>{{ trans('lang.surfaces') }}</h4>
                        <ul class="object_info_list">
                            @if(!empty($property['area_surface']))
                                <li class="tooltip" title="{{ trans('lang.living_space') }} : {{ $property['area_surface'] }} m2"><span class="detail_name">{{ trans('lang.living_space') }}</span><span class="detail_value">{{$property['area_surface']}} m<sup>2</sup></span></li>
                            @endif
                            @if(!empty($property['areas']))
                                @foreach($property['areas'] as $area)
                                    @if((!empty($area['type'])) && (!empty($area['area'])) && $area['type'] == 'Superficie terrain')
                                        <li class="tooltip" title="{{ $area['type'] }} : {{ $area['number'] }}"><span class="detail_name">{{ $area['type'] }}</span><span class="detail_value">{{ $area['area'] }} m<sup>2</sup></span></li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>

                        {{--@if(!empty($property['areas']))
                            <h4>{{ trans('lang.surfaces') }}</h4>
                            @if($area['area'] != null)
                                <ul class="object_info_list main_info">
                                    @foreach($property['areas'] as $area)
                                        @if((!empty($area['type'])) && (!empty($area['area'])))
                                            <li class="tooltip" title="{{ $area['type'] }} : {{ $area['area'] }} m2"><span class="detail_name">{{ $area['type'] }}</span><span class="detail_value">{{ $area['area'] }} m<sup>2</sup></span></li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                            <ul class="object_info_list">
                                @foreach($property['areas'] as $area)
                                    @if((!empty($area['type'])) && (!empty($area['number'])))
                                        <li class="tooltip" title="{{ $area['type'] }} : {{ $area['number'] }}"><span class="detail_name">{{ $area['type'] }}</span><span class="detail_value">{{ $area['number'] }}</span></li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif--}}
                        <h4>{{ trans('lang.features') }}</h4>
                        <h5>{{ trans('lang.equipments') }}</h5>
                        <ul class="object_add_info_list">
                            @if((!empty($property['services']['1'])) || (!empty($property['services']['2'])) || (!empty($property['services']['3'])) ||
                                (!empty($property['services']['4'])) || (!empty($property['services']['6'])) || (!empty($property['services']['8'])) ||
                                (!empty($property['services']['10'])) || (!empty($property['services']['17'])) || (!empty($property['services']['19'])) ||
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
                                    @if($service->reference == '1' && $service->locale == $lang )
                                        @if(!empty($property['services']['1']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '2' && $service->locale == $lang )
                                        @if(!empty($property['services']['2']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '3' && $service->locale == $lang )
                                        @if(!empty($property['services']['3']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '4' && $service->locale == $lang )
                                        @if(!empty($property['services']['4']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '6' && $service->locale == $lang )
                                        @if(!empty($property['services']['6']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '8' && $service->locale == $lang )
                                        @if(!empty($property['services']['8']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '10' && $service->locale == $lang )
                                        @if(!empty($property['services']['10']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '17' && $service->locale == $lang )
                                        @if(!empty($property['services']['17']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '19' && $service->locale == $lang )
                                        @if(!empty($property['services']['19']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '20' && $service->locale == $lang )
                                        @if(!empty($property['services']['20']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '21' && $service->locale == $lang )
                                        @if(!empty($property['services']['21']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '22' && $service->locale == $lang )
                                        @if(!empty($property['services']['22']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '23' && $service->locale == $lang )
                                        @if(!empty($property['services']['23']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '24' && $service->locale == $lang )
                                        @if(!empty($property['services']['24']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '25' && $service->locale == $lang )
                                        @if(!empty($property['services']['25']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '26' && $service->locale == $lang )
                                        @if(!empty($property['services']['26']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '27' && $service->locale == $lang )
                                        @if(!empty($property['services']['27']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '28' && $service->locale == $lang )
                                        @if(!empty($property['services']['28']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '31' && $service->locale == $lang )
                                        @if(!empty($property['services']['31']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '32' && $service->locale == $lang )
                                        @if(!empty($property['services']['32']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '33' && $service->locale == $lang )
                                        @if(!empty($property['services']['33']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '38' && $service->locale == $lang )
                                        @if(!empty($property['services']['38']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '39' && $service->locale == $lang )
                                        @if(!empty($property['services']['39']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '40' && $service->locale == $lang )
                                        @if(!empty($property['services']['40']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '41' && $service->locale == $lang )
                                        @if(!empty($property['services']['41']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '42' && $service->locale == $lang )
                                        @if(!empty($property['services']['42']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '43' && $service->locale == $lang )
                                        @if(!empty($property['services']['43']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '45' && $service->locale == $lang )
                                        @if(!empty($property['services']['45']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '46' && $service->locale == $lang )
                                        @if(!empty($property['services']['46']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '47' && $service->locale == $lang )
                                        @if(!empty($property['services']['47']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '48' && $service->locale == $lang )
                                        @if(!empty($property['services']['48']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '49' && $service->locale == $lang )
                                        @if(!empty($property['services']['49']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '50' && $service->locale == $lang )
                                        @if(!empty($property['services']['50']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '51' && $service->locale == $lang )
                                        @if(!empty($property['services']['51']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '52' && $service->locale == $lang )
                                        @if(!empty($property['services']['52']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '53' && $service->locale == $lang )
                                        @if(!empty($property['services']['53']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '54' && $service->locale == $lang )
                                        @if(!empty($property['services']['54']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '55' && $service->locale == $lang )
                                        @if(!empty($property['services']['55']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '56' && $service->locale == $lang )
                                        @if(!empty($property['services']['56']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '57' && $service->locale == $lang )
                                        @if(!empty($property['services']['57']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '58' && $service->locale == $lang )
                                        @if(!empty($property['services']['58']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '61' && $service->locale == $lang )
                                        @if(!empty($property['services']['61']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '62' && $service->locale == $lang )
                                        @if(!empty($property['services']['62']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '64' && $service->locale == $lang )
                                        @if(!empty($property['services']['64']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '65' && $service->locale == $lang )
                                        @if(!empty($property['services']['65']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '66' && $service->locale == $lang )
                                        @if(!empty($property['services']['66']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '70' && $service->locale == $lang )
                                        @if(!empty($property['services']['70']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '72' && $service->locale == $lang )
                                        @if(!empty($property['services']['72']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '73' && $service->locale == $lang )
                                        @if(!empty($property['services']['73']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '74' && $service->locale == $lang )
                                        @if(!empty($property['services']['74']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '75' && $service->locale == $lang )
                                        @if(!empty($property['services']['75']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif
                                @endforeach
                            @else
                                -
                            @endif
                        </ul>
                        <h5>{{ trans('lang.outdoor_spaces') }}</h5>
                        <ul class="object_add_info_list">
                            @if((!empty($property['services']['11'])) || (!empty($property['services']['14'])) || (!empty($property['services']['15'])) ||
                                (!empty($property['services']['16'])) || (!empty($property['services']['18'])) || (!empty($property['services']['29'])) ||
                                (!empty($property['services']['30'])) || (!empty($property['services']['35'])) || (!empty($property['services']['44'])) ||
                                (!empty($property['services']['59'])) || (!empty($property['services']['69']))
                            )
                                @foreach($services as $service)
                                    @if($service->reference == '11' && $service->locale == $lang )
                                        @if(!empty($property['services']['11']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '14' && $service->locale == $lang )
                                        @if(!empty($property['services']['14']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '15' && $service->locale == $lang )
                                        @if(!empty($property['services']['15']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '16' && $service->locale == $lang )
                                        @if(!empty($property['services']['16']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '18' && $service->locale == $lang )
                                        @if(!empty($property['services']['18']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '29' && $service->locale == $lang )
                                        @if(!empty($property['services']['29']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '30' && $service->locale == $lang )
                                        @if(!empty($property['services']['30']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '35' && $service->locale == $lang )
                                        @if(!empty($property['services']['35']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '44' && $service->locale == $lang )
                                        @if(!empty($property['services']['44']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '59' && $service->locale == $lang )
                                        @if(!empty($property['services']['59']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '69' && $service->locale == $lang )
                                        @if(!empty($property['services']['69']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif
                                @endforeach
                            @else
                                -
                            @endif
                        </ul>
                        <h5>{{ trans('lang.security') }}</h5>
                        <ul class="object_add_info_list">
                            @if((!empty($property['services']['3'])) || (!empty($property['services']['5'])) || (!empty($property['services']['7'])) ||
                                (!empty($property['services']['12'])) || (!empty($property['services']['19'])) || (!empty($property['services']['34'])) ||
                                (!empty($property['services']['36'])) || (!empty($property['services']['37'])) || (!empty($property['services']['60'])) ||
                                (!empty($property['services']['63'])) || (!empty($property['services']['67'])) || (!empty($property['services']['68']))
                            )
                                @foreach($services as $service)
                                    @if($service->reference == '3' && $service->locale == $lang )
                                        @if(!empty($property['services']['3']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '5' && $service->locale == $lang )
                                        @if(!empty($property['services']['5']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '7' && $service->locale == $lang )
                                        @if(!empty($property['services']['7']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '12' && $service->locale == $lang )
                                        @if(!empty($property['services']['12']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '19' && $service->locale == $lang )
                                        @if(!empty($property['services']['19']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '34' && $service->locale == $lang )
                                        @if(!empty($property['services']['34']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '36' && $service->locale == $lang )
                                        @if(!empty($property['services']['36']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '37' && $service->locale == $lang )
                                        @if(!empty($property['services']['37']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '60' && $service->locale == $lang )
                                        @if(!empty($property['services']['60']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '63' && $service->locale == $lang )
                                        @if(!empty($property['services']['63']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '67' && $service->locale == $lang )
                                        @if(!empty($property['services']['67']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '68' && $service->locale == $lang )
                                        @if(!empty($property['services']['68']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif
                                @endforeach
                            @else
                                -
                            @endif
                        </ul>
                        <h5>{{ trans('lang.sports_equipment') }}</h5>
                        <ul class="object_add_info_list">
                            @if((!empty($property['services']['11'])) || (!empty($property['services']['13'])) || (!empty($property['services']['27'])) ||
                                (!empty($property['services']['45'])) || (!empty($property['services']['71']))
                            )
                                @foreach($services as $service)
                                    @if($service->reference == '11' && $service->locale == $lang )
                                        @if(!empty($property['services']['11']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '13' && $service->locale == $lang )
                                        @if(!empty($property['services']['13']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '27' && $service->locale == $lang )
                                        @if(!empty($property['services']['27']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '45' && $service->locale == $lang )
                                        @if(!empty($property['services']['45']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif

                                    @if($service->reference == '71' && $service->locale == $lang )
                                        @if(!empty($property['services']['71']))
                                            <li><span class="detail_name">{{ $service->value }}</span></li>
                                        @endif
                                    @endif
                                @endforeach
                            @else
                                -
                            @endif
                        </ul>
                        @if(!empty($property['regulations']['0']['value']) || !empty($property['regulations']['1']['value']))
                            <h4>{{ trans('lang.energy_consumption_and_emission') }}</h4>
                        @endif
                        <div class="row" style="margin-bottom: -20px">
                            @if(!empty($property['regulations']['0']['value']) && intval($property['regulations']['0']['value']) > 0)
                                <div class="col-xs-12 col-md-6 col-lg-5">
                                    <div class="energy_block dpe">
                                        <div class="energy_block_title">
                                            <h5>{{ trans('lang.energy_consumption') }}</h5>
                                            <p><span>{{ trans('lang.primary_energy_source') }}</span><br>{!! trans('lang.energy_title_desc') !!}</p>
                                        </div>
                                        <div class="energy_block_value">
                                            <p>{{ trans('lang.conventional_energy_consumption') }}&nbsp;</p>
                                            <p><span>{{ $property['regulations']['0']['value'] }}</span> kWh<sub>EP</sub>/m<sup>2</sup>.{{ trans('lang.year_short') }}</p>
                                        </div>
                                        <div class="energy_block_diagram">
                                            <div class="energy_block_diagram_left">
                                                <p>{{ trans('lang.energy_efficient_housing') }}</p>
                                                <img src="/img/details/dpe_active.svg">
                                                <p>{{ trans('lang.high_energy_efficient_housing') }}</p>
                                            </div>
                                            <div class="energy_block_diagram_right">
                                                <p>{{ trans('lang.housing') }}</p>
                                                <div class="energy_block_diagram_pointer_line"></div>
                                                <div class="energy_block_diagram_pointer">
                                                    <div class="energy_block_diagram_arrow">
                                                        <span>{{ $property['regulations']['0']['value'] }}</span>
                                                    </div>
                                                    <p>kWh<sub>EP</sub>/m<sup>2</sup>.{{ trans('lang.year_short') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(!empty($property['regulations']['1']['value']) && intval($property['regulations']['1']['value']) > 0)
                                <div class="col-xs-12 col-md-6 offset-lg-2 col-lg-5">
                                    <div class="energy_block ges">
                                        <div class="energy_block_title">
                                            <h5>{{ trans('lang.emission_of_greenhouse_gases') }}</h5>
                                            <p>{!! trans('lang.energy_title_desc') !!}<br><br></p>
                                        </div>
                                        <div class="energy_block_value">
                                            <p>{{ trans('lang.emissions_estimate') }}&nbsp;</p>
                                            <p><span>{{ $property['regulations']['1']['value'] }}</span> kg éqCO2/m<sup>2</sup>.{{ trans('lang.year_short') }}</p>
                                        </div>
                                        <div class="energy_block_diagram">
                                            <div class="energy_block_diagram_left">
                                                <p>{{ trans('lang.low_greenhouse_gas_emissions') }}</p>
                                                <img src="/img/details/ges_active.svg">
                                                <p>{{ trans('lang.high_greenhouse_gas_emissions') }}</p>
                                            </div>
                                            <div class="energy_block_diagram_right">
                                                <p>{{ trans('lang.housing') }}</p>
                                                <div class="energy_block_diagram_pointer_line"></div>
                                                <div class="energy_block_diagram_pointer">
                                                    <div class="energy_block_diagram_arrow">
                                                        <span>{{ $property['regulations']['1']['value'] }}</span>
                                                    </div>
                                                    <p>kg éqCO2/m<sup>2</sup>.{{ trans('lang.year_short') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
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
                            <label for="map_banks" class="checkbox_label"><i class="icn icon-price"></i><span>{{ trans('lang.banks') }}</span></label>
                        </div>
                    </li>
                    <li class="map_bakeries">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_bakeries" value="bakery" name="map_bakeries">
                            <label for="map_bakeries" class="checkbox_label"><i class="icn icon-bakery"></i><span>{{ trans('lang.bakeries') }}</span></label>
                        </div>
                    </li>
                    <li class="map_cafes">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_cafes" value="bar" name="map_cafes">
                            <label for="map_cafes" class="checkbox_label"><i class="icn icon-cafe"></i><span>{{ trans('lang.cafes') }}</span></label>
                        </div>
                    </li>
                    <li class="map_dentists">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_dentists" value="dentist" name="map_dentists">
                            <label for="map_dentists" class="checkbox_label"><i class="icn icon-dentist"></i><span>{{ trans('lang.dentists') }}</span></label>
                        </div>
                    </li>
                    <li class="map_schools">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_schools" value="school" name="map_schools">
                            <label for="map_schools" class="checkbox_label"><i class="icn icon-school"></i><span>{{ trans('lang.schools') }}</span></label>
                        </div>
                    </li>
                    <li class="map_hospitals">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_hospitals" value="hospital" name="map_hospitals">
                            <label for="map_hospitals" class="checkbox_label"><i class="icn icon-hospital"></i><span>{{ trans('lang.hospitals') }}</span></label>
                        </div>
                    </li>
                    <li class="map_doctors">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_doctors" value="doctor" name="map_doctors">
                            <label for="map_doctors" class="checkbox_label"><i class="icn icon-doctor"></i><span>{{ trans('lang.doctors') }}</span></label>
                        </div>
                    </li>
                    <li class="map_parkings">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_parkings" value="parking" name="map_parkings">
                            <label for="map_parkings" class="checkbox_label"><i class="icn icon-parking"></i><span>{{ trans('lang.parkings') }}</span></label>
                        </div>
                    </li>
                    <li class="map_pharmacies">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_pharmacies" value="pharmacy" name="map_pharmacies">
                            <label for="map_pharmacies" class="checkbox_label"><i class="icn icon-pharmacy"></i><span>{{ trans('lang.pharmacies') }}</span></label>
                        </div>
                    </li>
                    <li class="map_police">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_police" value="police" name="map_police">
                            <label for="map_police" class="checkbox_label"><i class="icn icon-police"></i><span>{{ trans('lang.police') }}</span></label>
                        </div>
                    </li>
                    <li class="map_post_offices">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_post_offices" value="post_office" name="map_post_offices">
                            <label for="map_post_offices" class="checkbox_label"><i class="icn icon-posts"></i><span>{{ trans('lang.post_offices') }}</span></label>
                        </div>
                    </li>
                    <li class="map_restaurants">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_restaurants" value="restaurant" name="map_restaurants">
                            <label for="map_restaurants" class="checkbox_label"><i class="icn icon-restaurant"></i><span>{{ trans('lang.restaurants') }}</span></label>
                        </div>
                    </li>
                    <li class="map_gas_stations">
                        <div class="checkbox_container">
                            <input type="checkbox" id="map_gas_stations" value="gas_station" name="map_gas_stations">
                            <label for="map_gas_stations" class="checkbox_label"><i class="icn icon-petrol"></i><span>{{ trans('lang.gas_stations') }}</span></label>
                        </div>
                    </li>
                    {{--<li class="map_universities">--}}
                        {{--<div class="checkbox_container">--}}
                            {{--<input type="checkbox" id="map_universities" value="university" name="map_universities">--}}
                            {{--<label for="map_universities" class="checkbox_label"><i class="icn icon-university"></i><span>{{ trans('lang.universities') }}</span></label>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                </ul>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script>
        var page = '{{(isset($_GET['page'])) ? $_GET['page'] : ''}}';
        if(page === 'virtual') {
            $('.gallery_container').addClass('display_panorama');
            $('section.objects_nav_section .container-fluid').hide();
        }
    </script>

    @if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/virtual_tours/' . $property['property_id'] . '/property_' . $property['property_id'] . '.js'))
        <script type="text/javascript" src="/virtual_tours/{{ $property['property_id'] }}/property_{{ $property['property_id'] }}.js"></script>

        <script>
            embedpano({
                swf:"/virtual_tours/{{ $property['property_id'] }}/property_{{ $property['property_id'] }}.swf",
                xml:"/virtual_tours/{{ $property['property_id'] }}/property_{{ $property['property_id'] }}.xml",
                target:"object_panorama"
            });
        </script>
    @endif
    {{--var dpe_pointer = {{$property['regulations']['0']['value']}};--}}
    {{--var ges_pointer = {{$property['regulations']['1']['value']}};--}}
    <script>


        var dpe_pointer = @if(!empty($property['regulations']['0']['value'])) {{ $property['regulations']['0']['value'] }} @else {{ '0' }} @endif;
        var ges_pointer = @if(!empty($property['regulations']['1']['value'])) {{ $property['regulations']['1']['value'] }} @else {{ '0' }}@endif;

        var object_lat = {{$property['latitude']}};
        var object_long = {{$property['longitude']}};
    </script>

    {{--<script type="text/javascript" src="/js/libraries/jquery.fancybox.min.js"></script>--}}
    <script type="text/javascript" src="{{mix('/js/details.js')}}"></script>
@stop


