@extends('layouts.master')

@section('title', 'Details page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/news.min.css">
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')
    <section class="news_list_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-xl-6">
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <div class="article_info_block">
                                <div class="article_img">
                                    <a href="{{ route('news_details') }}">
                                        <img src="/img/details/no_agent_photo.svg" alt="">
                                    </a>
                                </div>
                                <div class="article_info">
                                    <a href="{{ route('news_details') }}"><h2>News title</h2></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum nisi sed sem aliquam fringilla eget non metus. Nulla consectetur a ipsum id faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-xl-6">
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <div class="article_info_block">
                                <div class="article_img">
                                    <a href="{{ route('news_details') }}">
                                        <img src="/img/details/no_agent_photo.svg" alt="">
                                    </a>
                                </div>
                                <div class="article_info">
                                    <a href="{{ route('news_details') }}"><h2>News title</h2></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum nisi sed sem aliquam fringilla eget non metus. Nulla consectetur a ipsum id faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-xl-6">
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <div class="article_info_block">
                                <div class="article_img">
                                    <a href="{{ route('news_details') }}">
                                        <img src="/img/details/no_agent_photo.svg" alt="">
                                    </a>
                                </div>
                                <div class="article_info">
                                    <a href="{{ route('news_details') }}"><h2>News title</h2></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum nisi sed sem aliquam fringilla eget non metus. Nulla consectetur a ipsum id faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-xl-6">
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <div class="article_info_block">
                                <div class="article_img">
                                    <a href="{{ route('news_details') }}">
                                        <img src="/img/details/no_agent_photo.svg" alt="">
                                    </a>
                                </div>
                                <div class="article_info">
                                    <a href="{{ route('news_details') }}"><h2>News title</h2></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum nisi sed sem aliquam fringilla eget non metus. Nulla consectetur a ipsum id faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
@stop


