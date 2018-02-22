@extends('layouts.master')

{{--
@php
    header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
@endphp--}}


@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp

@section('title', 'Results page')
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="{{asset('/css/results.min.css')}}">--}}

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy3z5ZYvr8P0eXpKg8QhcqZU6yYg4Nl6k&libraries=drawing,places&language=en"></script>
    <script src='https://www.google.com/recaptcha/api.js?hl={{$lang}}'></script>
    <style>
        .rc-anchor-light {
            background: transparent!important;
        }
    </style>
@stop

@section('content')
    @php

        $all_property = [];
        $prop = [];
        $sell_type = [1, 4, 5, 6];
        $latitude_agency_st_tropes = '43.261320';
        $longitude_agency_st_tropes = '6.629523';
        $latitude_agency_croixvalmer = '43.192034';
        $longitude_agency_croixvalmer = '6.556010';

        /* Show properties wit unique lat & lng */
        /*foreach($all_properties as $property) {
            $prop_image[$property['property_id']] = $property['pictures'];
            $key = $property['latitude']." ".$property['longitude'];
            if(!isset($all_property[$key])) $all_property[$key] = [];
            $all_property[$key][] = [
                                        'property_id'   => $property['property_id'],
                                        'category'      => (in_array($property['category']['reference'], $sell_type) == true) ? trans('lang.sale') : trans('lang.rent'),
                                        'reference'     => $property['reference'],
                                        'price'         => $property['price'],
                                        'pictures'      => $property['pictures'],
                                        'latitude'      => $property['latitude'],
                                        'longitude'     => $property['longitude'],
                                        'type'          => $property['type'],
                                        'area_surface'  => $property['area_surface'],
                                        'rooms'         => $property['rooms'],
                                        'bedrooms'      => $property['bedrooms'],
                                        'city'          => $property['city'],
                                        'view'          => $property['view'],
                                        'created_at'    => $property['created_at'],
                                        'updated_at'    => $property['updated_at'],
                                        'address'    => $property['updated_at'],
                                        'address_more'    => $property['updated_at'],
                                        'publish_address'    => $property['updated_at'],
                                    ];
        }*/

        /* Show properties where is address, if address is empty show agency (lat & lng) */
        foreach($all_properties as $property) {
            if($property['agency'] == '10338') {
                $key = ($property['publish_address'] == 1 && (!empty($property['address']) || !empty($property['address_more']))) ? $property['latitude']." ".$property['longitude'] : $latitude_agency_st_tropes." ".$longitude_agency_st_tropes;
                $all_property[$key][] = [
                                            'property_id'   => $property['property_id'],
                                            'category'      => (in_array($property['category']['reference'], $sell_type) == true) ? trans('lang.sale') : trans('lang.rent'),
                                            'reference'     => $property['reference'],
                                            'price'         => $property['price'],
                                            'price_max'     => ($property['price_max'] != 0) ? $property['price_max'] : 0,
                                            'price_period'  => (!empty($property['price_period'])) ? ' / '.$property['price_period'] : '',
                                            'pictures'      => $property['pictures'],
                                            'latitude'      => ($property['publish_address'] == 1 && (!empty($property['address']) || !empty($property['address_more']))) ? $property['latitude'] : $latitude_agency_st_tropes,
                                            'longitude'     => ($property['publish_address'] == 1 && (!empty($property['address']) || !empty($property['address_more']))) ? $property['longitude'] : $longitude_agency_st_tropes,
                                            'type'          => $property['type'],
                                            'area_surface'  => $property['area_surface'],
                                            'rooms'         => $property['rooms'],
                                            'bedrooms'      => $property['bedrooms'],
                                            'city'          => $property['city'],
                                            'view'          => $property['view'],
                                            'url'           => (in_array($property['category']['reference'], $sell_type) == true) ?
                                                               route('details', [
                                                                   'subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])),
                                                                   'city' => mb_strtolower(str_replace(" ", "-", $property['city'])),
                                                                   'id' => $property['property_id']
                                                               ]) :
                                                               route('locationsDetails', [
                                                                   'subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])),
                                                                   'city' => mb_strtolower(str_replace(" ", "-", $property['city'])),
                                                                   'id' => $property['property_id']
                                                               ]),
                                            'created_at'    => $property['created_at'],
                                            'updated_at'    => $property['updated_at'],
                                        ];

            } elseif($property['agency'] == '10715') {
                $key = ($property['publish_address'] == 1 && (!empty($property['address']) || !empty($property['address_more']))) ? $property['latitude']." ".$property['longitude'] : $latitude_agency_croixvalmer." ".$longitude_agency_croixvalmer;
                $all_property[$key][] = [
                                            'property_id'   => $property['property_id'],
                                            'category'      => (in_array($property['category']['reference'], $sell_type) == true) ? trans('lang.sale') : trans('lang.rent'),
                                            'reference'     => $property['reference'],
                                            'price'         => $property['price'],
                                            'price_max'     => ($property['price_max'] != 0) ? $property['price_max'] : 0,
                                            'price_period'  => (!empty($property['price_period'])) ? ' / '.$property['price_period'] : '',
                                            'pictures'      => $property['pictures'],
                                            'latitude'      => ($property['publish_address'] == 1 && (!empty($property['address']) || !empty($property['address_more']))) ? $property['latitude'] : $latitude_agency_croixvalmer,
                                            'longitude'     => ($property['publish_address'] == 1 && (!empty($property['address']) || !empty($property['address_more']))) ? $property['longitude'] : $longitude_agency_croixvalmer,
                                            'type'          => $property['type'],
                                            'area_surface'  => $property['area_surface'],
                                            'rooms'         => $property['rooms'],
                                            'bedrooms'      => $property['bedrooms'],
                                            'city'          => $property['city'],
                                            'view'          => $property['view'],
                                            'url'           => (in_array($property['category']['reference'], $sell_type) == true) ?
                                                               route('details', [
                                                                   'subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])),
                                                                   'city' => mb_strtolower(str_replace(" ", "-", $property['city'])),
                                                                   'id' => $property['property_id']
                                                               ]) :
                                                               route('locationsDetails', [
                                                                   'subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])),
                                                                   'city' => mb_strtolower(str_replace(" ", "-", $property['city'])),
                                                                   'id' => $property['property_id']
                                                               ]),
                                            'created_at'    => $property['created_at'],
                                            'updated_at'    => $property['updated_at'],
                                        ];
            }
        }
    @endphp

    @include('includes.search_block')

    @if($count_items == 0)
    <section class="results_section reveal">
        <div class="container-fluid">
            <div class="container-fluid">
                <h1 class="no_results">{{ trans('lang.currently_no_results') }}</h1>
            </div>
        </div>
    </section>
    @else
    <section class="results_section">
        <div class="container-fluid">
            <h1>{{ trans('lang.your_real_estate_search') }}</h1>
            <div class="row">
                <div class="col-xs-12 col-md-8 col-lg-6 margin_bottom_10">
                    <div class="view_type_container">
                        <ul class="view_type">
                            <li class="hidden-sm-down list_view_btn @if($view_type == 'list_view') active @endif">
                                <i class="icn icon-list"></i>{{ trans('lang.list') }} <span>({{$count_items}})</span>
                            </li>
                            <li class="grid_view_btn  @if($view_type == 'grid_view') active @endif">
                                <i class="icn icon-grid"></i>{{ trans('lang.grid') }} <span>({{$count_items}})</span>
                            </li>
                            <li class="map_view_btn @if($view_type == 'map_view') active @endif">
                                <i class="icn icon-map"></i>{{ trans('lang.map') }} <span>({{$count_items}})</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 offset-sm-6 col-sm-6 col-md-4 offset-md-0 col-lg-3 offset-lg-3 margin_bottom_10">
                    {{--<div class="refresh_results">--}}
                        {{--<i class="fa fa-refresh" aria-hidden="true"></i>--}}
                    {{--</div>--}}
                    <select onchange="setItems()" id="sorting_type" type="submit" class="selectpicker"
                            name="sorting_type" title="">
                        <option value="10" @if($search['items'] == '10') selected @endif>10 {{ trans('lang.results_per_page') }}</option>
                        <option value="50" @if($search['items'] == '50') selected @endif>50 {{ trans('lang.results_per_page') }}</option>
                        <option value="100" @if($search['items'] == '100') selected @endif>100 {{ trans('lang.results_per_page') }}</option>
                        <option value="1000" @if($search['items'] == '1000') selected @endif>{{ trans('lang.all') }}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="results_container {{ $view_type }} @if($view_type == 'list_view') hidden-sm-down  @endif">
            <div id="results_map"></div>
            <div class="container-fluid">
                <div class="results_carousel row">
                    @foreach($properties as $property)
                        @if($property['step'] == 1)
                            @include('includes.results_object')
                        @endif
                    @endforeach
                </div>
            </div>

            @include('includes.pagination')
        </div>
    </section>
    @endif
@stop

@section('javascript')
    {{--<script type="text/javascript" src="/js/libraries/markerclusterer.js"></script>--}}
    <script>
        var locations = [
            @foreach($all_property as $key => $unique)
                @php
                    $property_counter = 1;
                @endphp
                @foreach($unique as $k => $value)
                {
                    lat: {{ $value['latitude'] }},
                    lng: {{ $value['longitude'] }},
                    @if($property_counter == 1)
                        counter: {{ count($unique) }},
                        info: '<div class="infowindow_container">' +
                            @foreach($unique as $k => $v)
                                @php
                                    $counter = 1;
                                @endphp
                                '<div class="infowindow_block">'+
                                    '<div class="object_img">'+
                                        @foreach($v['pictures'] as $picture)
                                            @if($counter == 1)
                                                '<a href="{{ $v['url'] }}">'+
                                                    '<img src="'+'{{ $picture['url'] }}'+'" alt="">'+
                                                '</a>' +
                                            @endif
                                            @php
                                                $counter++;
                                            @endphp
                                        @endforeach
                                    '</div>'+
                                    '<div class="object_info_container">' +
                                        '<div class="object_info">' +
                                            '<a href="{{ $v['url'] }}">'+'{{$v["type"]}}'+'</a>' +
                                            '<span class="object_offer_type">'+'{{$v['category']}}'+'</span>' +
                                            '<div class="subtitle"> ' +
                                                '<span class="city">'+'{{$v['city']}}'+'</span> ' +
                                            @if($v['price'] != 0)
                                                '<span class="price">'+'{{ number_format($v['price'], 0, ' ', ' ') }} € <span class="tooltip" title="{{ trans("lang.agency_fee_included") }}">{{ trans("lang.afi") }}</span><span class="price_period"> {{$v['price_period']}}</span></span> ' +
                                            @else
                                                '<span class="price">'+'{{ trans('lang.zero_price') }}'+ '</span> ' +
                                            @endif
                                            '</div> ' +
                                            '<ul class="creation_date">' +
                                                @php
                                                    $date = new DateTime($v['created_at']);
                                                    $now = new DateTime();
                                                @endphp
                                                @if($date->diff($now)->format("%m") < 3 && $date->diff($now)->format("%y") == 0)
                                                    '<li><b>{{ trans('lang.created_at') }}</b>  {{ date('d.m.Y', strtotime($v['created_at'])) }}</li>' +
                                                    '<li><b>{{ trans('lang.updated_at') }}</b>  {{ date('d.m.Y', strtotime($v['updated_at'])) }}</li>' +
                                                @endif
                                            '</ul>' +
                                            '<div class="properties_block"> ' +
                                                '<ul class="properties"> ' +
                                                    '@if(!empty($v['area_surface']))'+
                                                    '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">'+'{{$v['area_surface']}}'+' m</span><sup>2</sup> </li> ' +
                                                    '@endif'+
                                                    '@if(!empty($v['rooms']))'+
                                                    '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">'+'{{$v['rooms']}}'+'</span> </li> ' +
                                                    '@endif'+
                                                    '@if(!empty($v['bedrooms']))'+
                                                    '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">'+'{{$v['bedrooms']}}'+'</span> </li> ' +
                                                    '@endif'+
                                                    {{--'@if(!empty($v['view']['landscape']))'+--}}
                                                    {{--'<li> <span class="property_container"> <span class="icn_container tooltip" title="{{ trans('lang.view') }}"><i class="icn icon-window_view"></i></span> <span class="prop_val">'+'{{$v['view']['landscape']}}'+'</span> </span> </li> ' +--}}
                                                    {{--'@endif'+--}}
                                                '</ul> ' +
                                            '</div> ' +
                                        '</div> ' +
                                    '</div>' +
                                '</div>'+
                            @endforeach
                        '</div>'
                    @endif
                    @php
                        $property_counter++;
                    @endphp
                },
                @endforeach
            @endforeach
        ];
    </script>
    <script type="text/javascript" src="{{mix('js/results.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            @if($view_type == 'list_view')
                listView_galleryInit();
                @endif
                @if($view_type == 'map_view') {
                $('.results_section .multiselect-native-select').hide();
                if ($('.result_preview_gallery').hasClass('slick-initialized')) {
                    $('.result_preview_gallery').slick('unslick');
                }
                resultsCarouselInit();
            }
            @endif

            var pagination_buttons = $('nav ul.pagination li.page_number');
            if(pagination_buttons.length === 1) {
                $('nav ul.pagination li a.page-link').css({"pointer-events": "none", "touch-action": "none", "cursor": "default"});
            }
        });
        $(window).on('load', function () {
                @if($view_type == 'map_view') {
                resultsMapInit();
            }
            @endif
        });

        @if($view_type != 'list_view')
            $('.view_type li').on('click', function () {
                if (!$(this).hasClass('active')) {
                    if ($(this).hasClass('list_view_btn')) {
                        var csrf_token = $('input[name="_token"]').val();
                        var id = [];
                        $('ul[data-id]').each(function () {
                            id.push($(this).attr('data-id'));
                        });

                        $('ul[data-id] li').remove();

                        $.ajax({
                            type: 'POST',
                            url: '{{URL::to('/view-list')}}',
                            dataType: 'json',
                            data: {
                                _token: csrf_token,
                                id: id
                            },
                            success: function (data) {
                                $.each(data, function (key, value) {
                                    $('ul[data-id]').each(function () {
                                        if ($(this).attr('data-id') === key) {
                                            $.each(value.url, function (v, url) {
                                                $('ul.gallery.result_preview_gallery[data-id="' + key + '"]').append(
                                                    '<li>' +
                                                        '<a href="' + value.link + '">' +
                                                            '<img src="' + url + '" alt="">' +
                                                        '</a>' +
                                                    '</li>'
                                                );
                                            });
                                        }
                                    });
                                });
                                listView_galleryInit();
                            }
                        });
                    }
                }
            });
        @endif

        @if($view_type == 'list_view')
            $('.view_type li').on('click', function () {
                if ($(this).hasClass('list_view_btn')) {
                    if($('.list_view_btn').hasClass('active') !== true) {
                        listView_galleryInit();
                    }
                }
            });
        @endif

        $('section.results_section .gallery_view').addClass('image_mask');
        setTimeout(function(){
            $('section.results_section .gallery_view').addClass('active');
        }, 1000);
//        sr.reveal('.results_container.grid_view .reveal_block, .results_container.list_view .reveal_block',{
//            reset: true,
//            duration: 500,
//            viewFactor: 0.5,
//            scale: 1,
//            opacity: 0,
//            useDelay: 'once',
//            easing: 'linear',
//            distance: '35px',
//            beforeReveal: function (domEl) {
//                if($(domEl).hasClass('results_carousel')) {
//                    $('section.results_section .gallery_view').addClass('image_mask');
//                    setTimeout(function(){
//                        $('section.results_section .gallery_view').addClass('active');
//                    }, 50);
//                }
//            },
//            beforeReset: function (domEl) {
//                if($(domEl).hasClass('results_carousel')) {
//                    $('section.results_section .gallery_view').removeClass('active');
//                }
//            },
//        });
    </script>
@stop