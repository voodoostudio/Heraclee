@extends('layouts.master')

@php
    header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
@endphp


{{--{{ dd($all_properties) }}--}}

@section('title', 'Results page')
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="{{asset('/css/results.min.css')}}">--}}

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy3z5ZYvr8P0eXpKg8QhcqZU6yYg4Nl6k&libraries=drawing,places&language=en"></script>
@stop

@section('content')

    @php

        $all_property = [];
        $prop = [];

        foreach($all_properties as $property) {
            $prop_image[$property['property_id']] = $property['pictures'];

            $key = $property['latitude']." ".$property['longitude'];
            if(!isset($all_property[$key])) $all_property[$key] = [];
            $all_property[$key][] = [
                                        'property_id'   => $property['property_id'],
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
                                        'view'          => $property['view'] = [ 'type' => $property['type']],
                                    ];
        }
        /*foreach($prop_image as $key =>$picture) {
            dump($picture);
            dump($key);
            foreach($picture as $item) {

            }
        }*/
    @endphp


    @foreach($properties as $key => $picture)
        @php
            $links[$picture['property_id']] = $picture['pictures']
        @endphp
    @endforeach


    @foreach($links as $key => $picture)
        @foreach($picture as $item)
            @php
                $url[$key][] = $item['url'];
            @endphp
        @endforeach
    @endforeach

    @include('includes.search_block')

    @if($count_items == 0)
    <section class="results_section">
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
                                <i class="icn icon-list"></i>{{ trans('lang.list') }}
                            </li>
                            <li class="grid_view_btn  @if($view_type == 'grid_view') active @endif">
                                <i class="icn icon-grid"></i>{{ trans('lang.grid') }} ({{$count_items}})
                            </li>
                            <li class="map_view_btn @if($view_type == 'map_view') active @endif">
                                <i class="icn icon-map"></i>{{ trans('lang.map') }}
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
                                                '<a href="{{ route('details') }}?id={{$v['property_id']}}">'+
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
                                            '<a href="{{ route('details') }}?id={{$v['property_id']}}">'+'{{$v["type"]}}'+'</a>' +
                                            '<div class="subtitle"> ' +
                                                '<span class="city">'+'{{$v['city']}}'+'</span> ' +
                                                '<span class="price">'+'{{ number_format($v['price'], 0, ' ', ' ') }}'+ '€</span> ' +
                                                    '<br/><ul class="creation_date">' +
                                                        @php
                                                            $date = new DateTime($property['created_at']);
                                                            $now = new DateTime();
                                                        @endphp
                                                        @if($date->diff($now)->format("%m") < 3 && $date->diff($now)->format("%y") == 0)
                                                            '<li><b>{{ trans('lang.created_at') }}</b>  {{ date('d.m.Y', strtotime($property['created_at'])) }}</li>' +
                                                            '<li><b>{{ trans('lang.updated_at') }}</b>  {{ date('d.m.Y', strtotime($property['updated_at'])) }}</li>' +
                                                        @endif
                                                '</ul>' +
                                            '</div> ' +
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
                                                    '@if(!empty($v['view']['type']))'+
                                                    '<li> <span class="property_container"> <span class="icn_container tooltip" title="{{ trans('lang.view') }}"><i class="icn icon-window_view"></i></span> <span class="prop_val">'+'{{$v['view']['type']}}'+'</span> </span> </li> ' +
                                                    '@endif'+
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
    <script type="text/javascript" src="{{asset('/js/custom_scripts/results.min.js')}}"></script>
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
        });
        $(window).on('load', function () {
                @if($view_type == 'map_view') {
                resultsMapInit();
            }
            @endif
        });
        $('.view_type li').on('click', function () {
                if ($(this).hasClass('list_view_btn')) {
                   /* var id = $('.gallery_view > ul[data-id]').attr('data-id');
                    console.log(id); */
                    $.ajax({
                        url: document.URL,
                        cache: false,
                        data: {
                            view_type: 'list_view'
                        },
                        success: function(data){

                        }
                    });
                }
        });


    </script>
@stop