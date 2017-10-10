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
                                    <a href="{{ route('news_details') }}"><h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum nisi sed sem aliquam fringilla eget non.</h2></a>
                                    <h3>05.06.2017</h3>
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
                                    <a href="{{ route('news_details') }}"><h2>Nunc interdum nisi sed sem aliquam fringilla eget non.</h2></a>
                                    <h3>05.06.2017</h3>
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
                                    <a href="{{ route('news_details') }}"><h2>Lorem ipsum dolor sit amet. Nunc interdum nisi sed sem aliquam fringilla eget non.</h2></a>
                                    <h3>05.06.2017</h3>
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
                                    <a href="{{ route('news_details') }}"><h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </h2></a>
                                    <h3>05.06.2017</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <i class="icn icon-arrow_dropdown_left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item ">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item ">
                                <a href="#" class="page-link">3</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <i class="icn icon-arrow_dropdown_right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
@stop


