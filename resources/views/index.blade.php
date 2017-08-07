@extends('layouts.master')
@section('title', 'Home page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/index.css">
@stop

@section('content')
    @php
        $post_counter = 1;
    @endphp
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

    @include('includes.search_block_index')

    <section class="results_section">
        <div class="results_container map_view">
            <div class="container-fluid">
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
    <script src="/js/index.js"></script>
@stop
