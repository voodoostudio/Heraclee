@extends('layouts.master')

@section('title', 'Maisons et appartements de standing, locations très haut de gamme. Les plus belles propriétés de la Côte d\'Azur.')
@section('css')
    <script defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy3z5ZYvr8P0eXpKg8QhcqZU6yYg4Nl6k&libraries=drawing,places&language=en"></script>
@stop

@section('content')

    @php
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $post_counter = 1;
        $slider_image = [];
        $all_property = [];
        $prop = [];
        $sell_type = [1, 4, 5, 6];
        $latitude_agency_st_tropes = '43.261320';
        $longitude_agency_st_tropes = '6.629523';
        $latitude_agency_croixvalmer = '43.192034';
        $longitude_agency_croixvalmer = '6.556010';

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

    @foreach($gallery_settings as $settings)
        @if($settings['page'] == 'homepage' && $settings['show'] == 1)
            <section class="index_main_carousel_section" style="display: none">
                    <ul class="index_main_carousel">
                        @foreach($gallery_slider as $image)
                            @if($image['page'] == 'homepage')
                                @php
                                    $slider_image[] = $image;
                                @endphp
                            @endif
                        @endforeach
                        @foreach($slider_image as $item)
                            <li style="background-image: url('{{ URL::to('/') }}/gallery/{{ $settings['page'] }}/{{ $item->created_at->format('F_Y') }}/{{ $item['image'] }}')">
                                <div class="info_block">
                                    <div class="object_status"><span class="img_bg_text">{{ (!empty($item->sell_type)) ? $item->sell_type : ''  }}</span></div>
                                    <h2>{{ (!empty($item->subtype)) ? $item->subtype : ''  }}</h2>
                                    <h3>{{ (!empty($item->city)) ? $item->city : ''  }}</h3>
                                    <a class="btn" href="{{ (!empty($item->link)) ? $item->link : '' }}">{{ trans('lang.see_property') }}</a>
                                </div>
                                {{--<img src="{{ URL::to('/') }}/gallery/{{ $settings['page'] }}/{{ $item->created_at->format('F_Y') }}/{{ $item['image'] }}" alt="{{ $item->title }}">--}}
                            </li>
                        @endforeach
                    </ul>
            </section>
        @else
            @foreach($properties as $property)
                @php
                    foreach($property['pictures'] as $picture) {
                        $image[$picture['rank']] = $picture['url'];
                    }
                    ksort($image);
                @endphp
                @if($post_counter == 1)
                    @php
                        $image_counter = 1;
                    @endphp
                    @foreach($image as $picture)
                        @if($image_counter == 1)
                            <section class="top_offer_section" style="display: none; background-image: url('{{$picture}}');">
                                @endif
                                @php
                                    $image_counter++;
                                @endphp
                                @endforeach
                                <div class="info_block">
                                    <div class="object_status"><span class="img_bg_text">{{ (!empty($property['category']['value'])) ? $property['category']['value'] : ''  }}</span></div>
                                    <h1>{{$property['type']}}</h1>
                                    <h3>{{$property['city']}} {{ (!empty($property['district'])) ? ' / ' : '' }} {{ $property['district'] }}</h3>
                                    <a class="btn" href="@if(($property['category']['reference'] == 1) || ($property['category']['reference'] == 4) || ($property['category']['reference'] == 5) || ($property['category']['reference'] == 6)){{ route('details', ['subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])), 'city' => mb_strtolower(str_replace(" ", "-", $property['city'])), 'id' => $property['property_id']]) }} @elseif(($property['category']['reference'] == 2) || ($property['category']['reference'] == 3)) {{ route('locationsDetails', ['subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])), 'city' => mb_strtolower(str_replace(" ", "-", $property['city'])), 'id' => $property['property_id']]) }} @endif">{{ trans('lang.see_property') }}</a>
                                </div>
                                <div class="gradient_bottom"></div>
                            </section>
                        @endif
                        @php
                            $post_counter++;
                        @endphp
                    @endforeach
                @endif
            @endforeach


    <section class="flipbook_section" style="position: relative">
        <img class="finger_icon" src="/img/finger_scroll.svg" style="position: absolute; left: 10px; top: 10px; width:30px; z-index: 10;" alt="">
        <div class="container-fluid">
            <div class="iframe-m">
                <p>
                    <iframe src="/flipbooks/heraclee_book/heraclee_book.html" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
                </p>
            </div>
        </div>
    </section>

    @include('includes.latest_news')

    @include('includes.search_block_index')

    <section class="description_section">
        <div class="container-fluid">
            <div class="description_container">
                <h1 class="title reveal">{!! trans('lang.homepage_title') !!}</h1>
                <h1 class="reveal">{!! trans('lang.homepage_description') !!}</h1>
            </div>
        </div>
    </section>

    <section class="results_section">
        <div class="results_container map_view">
            <div class="container-fluid">
                <h1>{!! trans('lang.our_last_objects_for_sell') !!}</h1>
                <div class="results_carousel row reveal">
                    @foreach($sale_properties as $property)
                        @if($property['step'] == 1)
                            @include('includes.results_object')
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="results_section">
        <div class="results_container map_view">
            <div class="container-fluid">
                <h1>{!! trans('lang.our_last_objects_for_rent') !!}</h1>
                <div class="results_carousel row reveal">
                    @foreach($rent_properties as $property)
                        @if($property['step'] == 1)
                            @include('includes.results_object')
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="results_section">
        <div class="results_container map_view">
            <div class="homepage_map_container">
                <div id="results_map"></div>
            </div>
        </div>
    </section>

    <section class="guide_section" style="display: none">
        <div class="container-fluid">
            <div class="guide_carousel">
                <div class="guide_slide">
                    <div class="row">
                        <div class="col-xs-12 push-sm-8 col-sm-4 push-lg-9 col-lg-3">
                            <img src="/img/guide/visualisation.svg" alt="">
                        </div>
                        <div class="col-xs-12 pull-sm-4 col-sm-8 pull-lg-3 col-lg-9">
                            <h4>Simplified search</h4>
                            <p>Are you looking for property for sale or rent in your area or internationally? With a few clicks you can find all the properties near you or in the locality of your choice by simple criteria: surface area, price, number of bedrooms, area of land…</p>
                        </div>
                    </div>
                </div>
                <div class="guide_slide">
                    <div class="row">
                        <div class="col-xs-12 push-sm-8 col-sm-4 push-lg-9 col-lg-3">
                            <img src="/img/guide/visualisation.svg" alt="">
                        </div>
                        <div class="col-xs-12 pull-sm-4 col-sm-8 pull-lg-3 col-lg-9">
                            <h4>Contact a professional</h4>
                            <p>Do you want to work with a professional for the sale, rental or search for your property?</p>
                        </div>
                    </div>
                </div>
                <div class="guide_slide">
                    <div class="row">
                        <div class="col-xs-12 push-sm-8 col-sm-4 push-lg-9 col-lg-3">
                            <img src="/img/guide/visualisation.svg" alt="">
                        </div>
                        <div class="col-xs-12 pull-sm-4 col-sm-8 pull-lg-3 col-lg-9">
                            <h4>Visualisation</h4>
                            <p>Enjoy an immersive experience in your property search. With the help of the Google Maps and Street View features, you can see your property not only via photos but also locate it in its environment. For properties where the address has been provided, you have access to a wide range of useful information: appearance, access roads, means of transport, services, etc.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    <script defer src="{{mix('js/index.js')}}"></script>

    <script defer>
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
                            '<span class="price">'+'{{ number_format($v['price'], 0, ' ', ' ') }}{{ ($v['price_max'] != 0) ?  ' - ' . number_format($v['price_max'], 0, ' ', ' ') : '' }}'+' € <span class="tooltip" title="{{ trans("lang.agency_fee_included") }}">{{ trans("lang.afi") }}</span><span class="price_period"> {{$v['price_period']}}</span></span> ' +
                        @else
                            '<span class="price">'+'{{ trans('lang.zero_price')  }}'+ '</span> ' +
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
                                '@if(!empty($v['view']['landscape']))'+
                                    '<li> <span class="property_container"> <span class="icn_container tooltip" title="{{ trans('lang.view') }}"><i class="icn icon-window_view"></i></span> <span class="prop_val">'+'{{$v['view']['landscape']}}'+'</span> </span> </li> ' +
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
        $(document).ready(function() {
            setTimeout(function(){
                resultsMapInit();
            }, 500);
        });
    </script>
@stop
