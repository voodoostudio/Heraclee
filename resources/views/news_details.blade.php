@extends('layouts.master')

@section('title', 'Details page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/news.min.css">
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')
    <section class="article_section">
        <div class="container-fluid">
            <div class="outer_block_container">
                <div class="inner_block_container">
                    <ul class="social_networks_share">
                        <li><a class="twitter-share-button" onclick="window.open($(this).attr('href'), 'Twitter', config='height=216, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="#"><i class="icn icon-twitter"></i></a></li>
                        <li><a class="linkedin-share-button" onclick="window.open($(this).attr('href'), 'Linkedin', config='height=560, width=500, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="#"><i class="icn icon-linked_in"></i></a></li>
                        <li><a class="fb-share-button" onclick="window.open($(this).attr('href'), 'Facebook', config='height=100, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="#"><i class="icn icon-facebook"></i></a></li>
                    </ul>
                    <h1>@if($lang == 'fr_FR') {{ $item['title_fr'] }} @elseif($lang == 'en_GB') {{ $item['title_en'] }}  @endif</h1>
                    <h2>{{ (!empty($item['date'])) ? date('d.m.Y', strtotime($item['date'])) : '' }}</h2>
                    <div class="img_container">
                        @foreach(json_decode($item['front_image']) as $key => $image)
                            <img style = "max-width: 1024px;" src="../../front_image/{{ $image }}" alt="{{ $key }}">
                        @endforeach
                        {{--@if(!empty($item['front_image']))--}}
                            {{--<img style = "max-width: 1024px;" src="../front_image/{{ $item['front_image'] }}" alt="">--}}
                        {{--@else--}}
                            {{--<img src="/img/details/no_agent_photo.svg" alt="">--}}
                        {{--@endif--}}
                    </div>
                    <div class="img_container">
                        @foreach(json_decode($item['body_image']) as $key => $image)
                            <img style = "max-width: 1024px;" src="../../body_image/{{ $image }}" alt="{{ $key }}">
                        @endforeach
                        {{--@if(!empty($item['body_image']))--}}
                            {{--<img style = "max-width: 1024px;" src="../front_image/{{ $item['body_image'] }}" alt="">--}}
                        {{--@else--}}
                            {{--<img src="/img/details/no_agent_photo.svg" alt="">--}}
                        {{--@endif--}}
                    </div>
                    @if($lang == 'fr_FR') <p>{{ $item['description_fr'] }}</p> @elseif($lang == 'en_GB') <p>{{ $item['description_en'] }}/<p>  @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
@stop


