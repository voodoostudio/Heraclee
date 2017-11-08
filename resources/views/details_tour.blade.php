@extends('layouts.master')

{{--{{ dd($property) }}--}}

@section('title', 'Details page')
@section('css')
    {{--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy3z5ZYvr8P0eXpKg8QhcqZU6yYg4Nl6k&libraries=drawing,places&language=en"></script>--}}
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')
    @if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/virtual_tours/' . $tour['property_id'] . '/property_' . $tour['property_id'] . '.js'))
        <div style="height: 80vh" id="object_panorama"></div>
    @endif
@endsection

@section('javascript')
    @if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/virtual_tours/' . $tour['property_id'] . '/property_' . $tour['property_id'] . '.js'))
        <script type="text/javascript" src="/virtual_tours/{{ $tour['property_id'] }}/property_{{ $tour['property_id'] }}.js"></script>

        <script>
            embedpano({
                swf:"/virtual_tours/{{ $tour['property_id'] }}/property_{{ $tour['property_id'] }}.swf",
                xml:"/virtual_tours/{{ $tour['property_id'] }}/property_{{ $tour['property_id'] }}.xml",
                target:"object_panorama"
            });
        </script>
    @endif

    {{--<script type="text/javascript" src="/js/libraries/jquery.fancybox.min.js"></script>--}}
    {{--<script type="text/javascript" src="/js/details.min.js"></script>--}}
@stop
