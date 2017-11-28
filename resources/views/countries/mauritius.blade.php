@extends('layouts.master')

@section('title', 'Home page')
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="/css/index.min.css">--}}
    <style>
        .iframe-m iframe {
            width: 100%;
            height: 600px;
        }
        #bacgradient div{
            background: transparent!important;
            background-image: none!important;
        }
        #logoBar {
            display: none!important;
        }
    </style>
@stop

@section('content')
    @php
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $post_counter = 1;
        $slider_image = [];
    @endphp
    <section class="page_title_section hidden-md-up">
        <div class="container-fluid">
            <h1>{!! trans('lang.mauritius') !!}</h1>
        </div>
    </section>
    @foreach($gallery_settings as $settings)
        @if($settings['page'] == 'mauritius' && $settings['show'] == 1)
            <section class="index_main_carousel_section">
                <ul class="index_main_carousel">
                    @foreach($gallery as $image)
                        @if($image['page'] == 'mauritius')
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
                                <li><a href="{{ (!empty($item->link)) ? $item->link : '' }}"><img src="{{ URL::to('/') }}/gallery/{{ $settings['page'] }}/{{ $item->created_at->format('F_Y') }}/{{ $item['image'] }}" alt=""></a></li>
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
                    $image = [];
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
                            <section class="top_offer_section" style="background-image: url('{{$picture}}')">
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

            {{--<a href="/flipbooks/mauritius/pierre_de_lune/pierre_de_lune.html" target="_blank" style="display: block; text-align: center; margin: 80px auto 0; padding: 0 15px">--}}
                {{--<img src="/flipbooks/mauritius/pierre_de_lune/assets/main_img.jpg" alt="Mauritius panorama" style="width: 100%; max-width: 500px">--}}
            {{--</a>--}}

            <div class="iframe-m">
                <p>
                    <iframe src="/flipbooks/mauritius/pierre_de_lune/pierre_de_lune.html" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
                </p>
            </div>

            {{--<a href="https://online.flippingbook.com/view/650405/" class="fbo-embed" data-fbo-lightbox="yes" data-fbo-version="1" data-fbo-width="250px" data-fbo-height="188px" style="max-width: 100%">BROCHURE PIERRE DE LUNE</a><script async defer src="https://d33i2vgywgme2s.cloudfront.net/render/2.18.1-R278/embed.js"></script>--}}

{{--    @include('includes.search_block_index')--}}

    {{--<section class="results_section">--}}
        {{--@if($count_items == 0)--}}
            {{--<div class="container-fluid">--}}
                {{--<h1 class="no_results">{{ trans('lang.currently_no_results') }}</h1>--}}
            {{--</div>--}}
        {{--@endif--}}
        {{--<div class="results_container map_view">--}}
            {{--<div class="container-fluid">--}}
                {{--<div class="results_carousel row">--}}
                    {{--@foreach($properties as $property)--}}
                        {{--@if($property['step'] == 1)--}}
                            {{--@include('includes.results_object')--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

@endsection

@section('javascript')
    <script src="{{asset('/js/custom_scripts/index.min.js')}}"></script>
    {{--<script src="/js/index.min.js"></script>--}}
    <script>
        $( document ).ready(function() {
            $('#fbToolBar').css('background-color', '#272727!important');
        });
    </script>
    {{--<script src="/js/libraries/jquery.marquee.min.js"></script>--}}
@stop
