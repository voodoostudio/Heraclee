@extends('layouts.master')
@section('title', 'Contact page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/contact.min.css">

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy3z5ZYvr8P0eXpKg8QhcqZU6yYg4Nl6k&libraries=drawing,places&language=en"></script>
@stop

@section('content')

    @foreach($preview_tour as $key => $preview)
        @php
            $image = DB::table('apimo_pictures')
            ->whereIn('picture_id', $preview)
            ->get();
        @endphp
        @foreach($image as $item)
            <a href="{{ route('details-tour', $key) }}">
                <img src="{{ $item['url'] }}" alt="">
            </a>

        @endforeach


        {{--<img src="{{ $preview['url'] }}" alt="">--}}
    @endforeach




@endsection

@section('javascript')

@stop
