@extends('admin.posts.layouts.master')

@section('title', 'Details page')
@section('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
@stop
@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp


@section('content')
    <body id="news_admin">
    @include('includes.header')

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
                    <div class="col-12 col-sm-6 col-lg-3 margin_bottom_20">
                        <a href="{{ URL::to($lang . '/admin/gallery') }}">
                            <div class="outer_block_container">
                                <div class="inner_block_container">
                                    <h2>{{ trans('lang.gallery') }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 margin_bottom_20">
                        <a href="{{ URL::to($lang . '/admin/posts') }}">
                            <div class="outer_block_container">
                                <div class="inner_block_container">
                                    <h2>{{ trans('lang.news') }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 margin_bottom_20">
                        <a href="{{ URL::to($lang . '/admin/newsletter') }}">
                            <div class="outer_block_container">
                                <div class="inner_block_container">
                                    <h2>{{ trans('lang.newsletters') }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 margin_bottom_20">
                        <a href="{{ URL::to($lang . '/admin/subscribers') }}">
                            <div class="outer_block_container">
                                <div class="inner_block_container">
                                    <h2>{{ trans('lang.subscribers') }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div style="margin-top: 20px;">
                    <a class="btn outer_block_container" href="{{ route('force_update') }}">{{ trans('lang.force_update') }}</a>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('javascript')
@stop