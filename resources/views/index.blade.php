@extends('layouts.master')

@section('title', 'Home page')
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="{{asset('/css/custom_styles/index.min.css')}}">--}}
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy3z5ZYvr8P0eXpKg8QhcqZU6yYg4Nl6k&libraries=drawing,places&language=en"></script>
@stop

@section('content')

    <section class="page_title_section hidden-md-up">
        <div class="container-fluid">
            <h1>{!! trans('lang.homepage_title') !!}</h1>
        </div>
    </section>

    @php
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $post_counter = 1;
        $slider_image = [];
        $all_property = [];
        $prop = [];
        $sell_type = [1, 4, 5, 6];

        foreach($all_properties as $property) {
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
                                    ];
        }
    @endphp

    @foreach($gallery_settings as $settings)
        @if($settings['page'] == 'homepage' && $settings['show'] == 1)

            <section class="index_main_carousel_section">
                    <ul class="index_main_carousel">
                        @foreach($gallery as $image)
                            @if($image['page'] == 'homepage')
                                @php
                                    $slider_image[] = $image;
                                @endphp
                            @endif
                        @endforeach
                        @php
                            shuffle($slider_image);
                            $image_counter = 1;
                        @endphp
                        @foreach($slider_image as $item)
                            @if($image_counter == 1)
                                <li><a href="{{ (!empty($item->link)) ? $item->link : '' }}"><img src="{{ URL::to('/') }}/gallery/{{ $settings['page'] }}/{{ $item->created_at->format('F_Y') }}/{{ $item['image'] }}" alt="{{ $item->title }}"></a></li>
                            @endif
                            @php
                                $image_counter++;
                            @endphp
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
                            <section class="top_offer_section" style="background-image: url('{{$picture}}'); display: none">
                                @endif
                                @php
                                    $image_counter++;
                                @endphp
                                @endforeach
                                <div class="info_block">
                                    <h1>{{$property['type']}}</h1>
                                    <h3>{{$property['city']}} {{ (!empty($property['district'])) ? ' / ' : '' }} {{ $property['district'] }}</h3>
                                    <a href="@if(($property['category']['reference'] == 1) || ($property['category']['reference'] == 4) || ($property['category']['reference'] == 5) || ($property['category']['reference'] == 6)){{ route('details') }}?id={{$property['property_id']}} @elseif(($property['category']['reference'] == 2) || ($property['category']['reference'] == 3)) {{ route('locationsDetails') }}?id={{$property['property_id']}} @endif" class="btn">{{ trans('lang.see_property') }}</a>
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

            <section class="flipbook_section">
                {{--<a href="#" class="hidden-sm-up" data-toggle="modal" data-target="#homepage_flipbook">--}}
                    {{--<img src="/flipbooks/mauritius/pierre_de_lune/pierre_de_lune_brochure.jpg" alt="" class="">--}}
                {{--</a>--}}

                {{--<a href="/flipbooks/heraclee_book/heraclee_book.html" class="hidden-md-up" target="_blank">--}}
                    {{--<img src="/img/flipbooks/heraclee_book.jpg" alt="" class="">--}}
                {{--</a>--}}
                {{--<div class="iframe-m hidden-sm-down">--}}
                    {{--<p>--}}
                        {{--<iframe src="/flipbooks/heraclee_book/heraclee_book.html" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>--}}
                    {{--</p>--}}
                {{--</div>--}}
                <div class="iframe-m">
                    <p>
                        <iframe src="/flipbooks/heraclee_book/heraclee_book.html" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
                    </p>
                </div>
            </section>

            <div class="modal fade" id="homepage_flipbook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="vertical-alignment-helper">
                    <div class="modal-dialog vertical-align-center" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <section class="flipbook_section">
                                    <div class="iframe-m">
                                        <p>
                                            <iframe src="/flipbooks/heraclee_book/heraclee_book.html" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
                                        </p>
                                    </div>
                                </section>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="icn icon-cancel"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

    @include('includes.latest_news')

    @include('includes.search_block_index')

    <section class="description_section">
        <div class="container-fluid">
            <h1>{!! trans('lang.homepage_description') !!}</h1>
        </div>
    </section>

    <section class="results_section">
        <div class="results_container map_view">
            <div class="container-fluid">
                <h1>{{ trans('lang.our_last_objects') }}</h1>
                <div class="results_carousel row">
                    @foreach($properties as $property)
                        @if($property['step'] == 1)
                            @include('includes.results_object')
                        @endif
                    @endforeach
                </div>
            </div>
            {{--<div class="homepage_map_container">--}}
                {{--<div id="results_map"></div>--}}
            {{--</div>--}}
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
    <script src="{{asset('/js/custom_scripts/index.min.js')}}"></script>
    <script src="/js/libraries/jquery.marquee.min.js"></script>
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
                        '<span class="object_offer_type">'+'{{$v['category']}}'+'</span>' +
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
        $(document).ready(function() {
            resultsMapInit();
        });
    </script>
@stop
