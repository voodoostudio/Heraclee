@extends('layouts.master')

@section('title', 'Home page')
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="/css/index.min.css">--}}
@stop

@section('content')
    @php
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $post_counter = 1;
        $slider_image = [];
    @endphp
    <section class="page_title_section hidden-md-up">
        <div class="container-fluid">
            <h1>{!! trans('lang.france') !!}</h1>
        </div>
    </section>
    @foreach($gallery_settings as $settings)
        @if($settings['page'] == 'france' && $settings['show'] == 1)
            <section class="index_main_carousel_section reveal">
                <ul class="index_main_carousel">
                    @foreach($gallery as $image)
                        @if($image['page'] == 'france')
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
                                    <a href="@if(($property['category']['reference'] == 1) || ($property['category']['reference'] == 4) || ($property['category']['reference'] == 5) || ($property['category']['reference'] == 6)){{ route('details', ['subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])), 'city' => mb_strtolower(str_replace(" ", "-", $property['city'])), 'id' => $property['property_id']]) }} @elseif(($property['category']['reference'] == 2) || ($property['category']['reference'] == 3)) {{ route('locationsDetails', ['subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])), 'city' => mb_strtolower(str_replace(" ", "-", $property['city'])), 'id' => $property['property_id']]) }} @endif" class="btn">{{ trans('lang.see_property') }}</a>
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

    @include('includes.search_block_index')

    <section class="results_section">
        @if($count_items == 0)
            <div class="container-fluid">
                <h1 class="no_results">{{ trans('lang.currently_no_results') }}</h1>
            </div>
        @endif
        <div class="results_container map_view">
            <div class="container-fluid">
                <h1>{!! trans('lang.our_last_objects') !!}</h1>
                <div class="results_carousel reveal row">
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
    <script src="{{mix('js/index.js')}}"></script>
@stop
