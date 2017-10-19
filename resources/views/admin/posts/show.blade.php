<!DOCTYPE html>
<html>
@extends('admin.posts.layouts.master')

@section('title', 'Details page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/libraries/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="/css/libraries/datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/css/news.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp


@section('content')

    <body id="news_admin" class="preloader_active">
    @include('includes.header')
    <div class="preloader_container">
        <div class="preloader">
            <div class="cssload-loader">
                <div class="cssload-inner cssload-one"></div>
                <div class="cssload-inner cssload-two"></div>
                <div class="cssload-inner cssload-three"></div>
            </div>
        </div>
    </div>
    <main>
        <section class="article_section">
            <div class="container-fluid">
                <div class="outer_block_container">
                    <div class="inner_block_container">
                        <div class="title_container">
                            <h1>@if($lang == 'fr_FR') {{ $posts->title_fr }} @elseif($lang == 'en_GB') {{ $posts->title_en }}  @endif</h1>
                            <a class="action_link" href="{{ URL::to('admin/') }}"><i class="icn icon-arrow_left"></i></a>
                        </div>

                        <h2>{{ (!empty($posts->date)) ? date('d.m.Y', strtotime($posts->date)) : '' }}</h2>
                        <div class="img_container">
                            @foreach(json_decode($posts->front_image) as $key => $image)
                                <img src="{{ URL::to('/') }}/posts/front_image/{{ date('F_Y') }}/{{ $image }}" alt="{{ $key }}">
                            @endforeach
                            {{--@if(!empty($item['front_image']))--}}
                            {{--<img style = "max-width: 1024px;" src="../front_image/{{ $item['front_image'] }}" alt="">--}}
                            {{--@else--}}
                            {{--<img src="/img/details/no_agent_photo.svg" alt="">--}}
                            {{--@endif--}}
                        </div>

                        <div class="img_container">
                            @foreach(json_decode($posts->body_image) as $key => $file)
                                @php
                                    $extension = new SplFileInfo($file);
                                    $jpg_preview = preg_replace('"\.pdf$"', '.jpg', $file);
                                @endphp
                                @if(strtolower($extension->getExtension()) == 'pdf')
                                    <a href = "{{ URL::to('/') }}/posts/pdf/{{ date('F_Y') }}/{{ $file }}">
                                        <img src = "{{ URL::to('/') }}/posts/pdf/{{ date('F_Y') }}/{{ $jpg_preview }}" alt = "{{ $key }}"/>
                                    </a>
                                @else
                                    <img src="{{ URL::to('/') }}/posts/body_image/{{ date('F_Y') }}/{{ $file }}" alt="{{ $key }}">
                                @endif
                            @endforeach
                        </div>
                        @if($lang == 'fr_FR') <p>{{ $posts->description_fr }}</p> @elseif($lang == 'en_GB') <p>{{ $posts->description_en }}/<p>  @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('javascript')
@stop