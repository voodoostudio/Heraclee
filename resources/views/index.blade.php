@extends('layouts.master')

@section('title', 'Home page')
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="{{asset('/css/custom_styles/index.min.css')}}">--}}
@stop

@section('content')

    <section class="homepage_title_section">
        <div class="container-fluid">
            <h1 class="hidden-md-up">Agence immobiliére de prestige - Saint-Tropez</h1>
        </div>
    </section>

    @php
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $post_counter = 1;
        $slider_image = [];
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
                                <li><img src="{{ URL::to('/') }}/gallery/{{ $settings['page'] }}/{{ $item->created_at->format('F_Y') }}/{{ $item['image'] }}" alt="{{ $item->title }}"></li>
                        @endif
                        @php
                            $image_counter++;
                        @endphp
                    @endforeach
                </ul>
            </section>
        @else
            @foreach($properties as $property)
                @if($post_counter == 1)
                    @php
                        $image_counter = 1;
                    @endphp
                    @foreach($property['pictures'] as $picture)
                        @if($image_counter == 1)
                            <section class="top_offer_section" style="background-image: url('{{$picture['url']}}')">
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

    @include('includes.latest_news')

    @include('includes.search_block_index')

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
        </div>
    </section>

@endsection

@section('javascript')
    <script src="{{asset('/js/custom_scripts/index.min.js')}}"></script>
    {{--<script src="/js/libraries/jquery.marquee.min.js"></script>--}}
    <script>
        orderSelectOptions();
    </script>
@stop
