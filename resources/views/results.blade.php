@extends('layouts.master')

{{--{{ dd($all_properties) }}--}}

@section('title', 'Results page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/results.css">

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy3z5ZYvr8P0eXpKg8QhcqZU6yYg4Nl6k&libraries=drawing,places&language=en"></script>
@stop

@section('content')


    @php

        $all_property = [];

        foreach($all_properties as $property) {
            $key = $property['latitude']." ".$property['longitude'];
            if(!isset($all_property[$key])) $all_property[$key] = [];
            $all_property[$key][] = [
                                        'property_id'   => $property['property_id'],
                                        'reference'     => $property['reference'],
                                        'price'         => $property['price'],
                                        'pictures'      => $property['pictures'],
                                        'latitude'      =>  $property['latitude'],
                                        'longitude'     => $property['longitude'],
                                        'type'          => $property['type'],
                                        'area_surface'  => $property['area_surface'],
                                        'rooms'         => $property['rooms'],
                                        'bedrooms'      => $property['bedrooms'],
                                        'city'          => $property['city'],
                                    ];

        }

        $unique_property = [];
        foreach($all_property as $property) {
            if(count($property) > 1 ) $unique_property[] = $property;
        }

        //dump($unique_property);

    @endphp


    @include('includes.search_block')

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

        <div class="results_container {{$view_type}} @if($view_type == 'map_view') hidden-sm-down  @endif">
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
@stop

@section('javascript')
    <script type="text/javascript" src="/js/libraries/markerclusterer.js"></script>
    <script>

        @php
            $lat_count = 0;
            $lng_count = 0;
        @endphp

    var locations = [
        @foreach($unique_property as $unique)

            @foreach($unique as $k => $value)
            {
                @php
                    $counter = 1;
                @endphp
                lat: {{ $value['latitude'] }},
                lng: {{ $value['longitude'] }},
                info: '<div class="infowindow_container">'+
                        '<div class="infowindow_block">'+
                                '<div class="object_img">'+
                                    @foreach($value['pictures'] as $picture)
                                        @if($counter == 1)
                                            '<img src="'+'{{ $picture['url'] }}'+'" alt="">'+
                                        @endif
                                        @php
                                            $counter++;
                                        @endphp
                                    @endforeach
                                '</div>'+
                                '<div class="object_info_container">' +
                                    '<div class="object_info">' +
                                        '<a href="{{ route('details') }}?id={{$value['property_id']}}">'+'{{$value["type"]}}'+'</a>' +
                                        '<div class="subtitle"> ' +
                                            '<span class="city">'+'{{$value['city']}}'+'</span> ' +
                                            '<span class="price">'+'{{ number_format($value['price'], 0, ' ', ' ') }}'+ '€</span> ' +
                                        '</div> ' +
                                    '<div class="properties_block"> ' +
                                        '<ul class="properties"> ' +
                                            '@if(!empty($value['area_surface']))'+
                                            '<li> <span class="icn_container"><i class="icn icon-area"></i></span> <span class="prop_title">'+'{{$value['area_surface']}}'+' m</span><sup>2</sup> </li> ' +
                                            '@endif'+
                                            '@if(!empty($value['rooms']))'+
                                            '<li> <span class="icn_container"><i class="icn icon-rooms"></i></span> <span class="prop_title">'+'{{$value['rooms']}}'+'</span> </li> ' +
                                            '@endif'+
                                            '@if(!empty($value['bedrooms']))'+
                                            '<li> <span class="icn_container"><i class="icn icon-bedroom"></i></span> <span class="prop_title">'+'{{$value['bedrooms']}}'+'</span> </li> ' +
                                            '@endif'+
                                            {{--'@if(!empty($value['view']['type']))'+--}}
                                            {{--'<li> <span class="property_container"> <span class="icn_container" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span> <span class="prop_val">'+'{{$value['view']['type']}}'+'</span> </span> </li> ' +--}}
                                            {{--'@endif'+--}}
                                        '</ul> ' +
                                    '</div> ' +
                                '</div> ' +
                            '</div>'+
                        '</div>'
                },
            @endforeach

        @endforeach

];

    </script>
    <script type="text/javascript" src="/js/results.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            @if($view_type == 'list_view')
                listView_galleryInit();
            @endif
            @if($view_type == 'map_view')
                initResultsMap();
                resultsCarouselInit();
            @endif
        });
    </script>
@stop