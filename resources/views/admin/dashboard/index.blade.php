@extends('admin.posts.layouts.master')

@section('title', 'Details page')
@section('css')
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

    </main>
@endsection

@section('javascript')
@stop