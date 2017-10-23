@extends('admin.posts.layouts.master')

@section('title', 'Details page')
@section('css')
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
        <section class="admin_nav_menu">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="title_container">
                            <h1>Admin</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 offset-md-2 col-md-4 offset-lg-3 col-lg-3 margin_bottom_20">
                        <a href="{{ URL::to('admin/gallery') }}">
                            <div class="outer_block_container">
                                <div class="inner_block_container">
                                    <h2>Gallery</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 margin_bottom_20">
                        <a href="{{ URL::to('admin/posts') }}">
                            <div class="outer_block_container">
                                <div class="inner_block_container">
                                    <h2>News</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('javascript')
@stop