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
            {{--<div class="nav-wrapper">--}}
                {{--<div class="container">--}}
                    {{--<a href="{{ url('/') }}" class="flow-text">Laravel</a>--}}
                    {{--<ul class="right hide-on-med-and-down">--}}
                        {{--@if (Auth::guest())--}}
                            {{--<li><a href="{{ url('/login') }}">Login</a></li>--}}
                            {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                        {{--@else--}}
                            {{--<li>--}}
                                {{--<a class="dropdown-button" data-activates="authdropdown" href="#">--}}
                                    {{--{{ Auth::user()->name }}--}}
                                    {{--<i class="material-icons right">arrow_drop_down</i>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}


            <section class="news_list_section">
                <div class="container-fluid">
                    {{--<div style = "text-align: center; position: relative; top: -20px;" >--}}
                        {{--<a class = "btn" href="{{ url('admin/logout') }}">Logout</a>--}}
                    {{--</div>--}}
                    <div class="row">
                        <div class="col-12">
                            <div class="title_container">
                                <h1>List of articles</h1>
                                <a href="{{ URL::to('admin/posts/create') }}"><i class="icn icon-cancel"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($posts as $items)
                            <div class="col-xs-12 col-xl-6">
                                <div class="outer_block_container">
                                    <div class="inner_block_container">
                                        <div class="edit_elements">
                                            <a href="{{ URL::to('admin/posts/' . $items->id . '/edit') }}" class="edit_btn"><i class="icn icon-pencil"></i></a>
                                            {{ Form::open(array('url' => 'admin/posts/' . $items->id, 'class' => 'pull-right')) }}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                <button type = "submit" class = "remove_btn"><i class="icn icon-cancel"></i></button>
                                            {{ Form::close() }}
                                        </div>
                                        <div class="article_info_block">
                                            <div class="article_img">
                                                <a href="{{ URL::to('admin/posts/' . $items->id) }}">
                                                    @php
                                                        $image_counter = 1;
                                                    @endphp
                                                    @foreach(json_decode($items['front_image']) as $key => $image)
                                                        @if($image_counter == 1)
                                                            <img src="../../front_image/{{ $image }}" alt="{{ $key }}">
                                                        @endif
                                                        @php
                                                            $image_counter++;
                                                        @endphp
                                                    @endforeach

                                                    @if(empty(json_decode($items['front_image'])))
                                                        <img src="/img/details/no_agent_photo.svg" alt="">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="article_info">
                                                <a href="{{ URL::to('admin/posts/' . $items->id) }}"><h2>@if($lang == 'fr_FR') {{ $items['title_fr'] }} @elseif($lang == 'en_GB') {{ $items['title_en'] }}  @endif</h2></a>
                                                <h3>{{ (!empty($items->date)) ? date('d.m.Y', strtotime($items->date)) : '' }}</h3>
                                                <span class="published_label">{{ ($items['status'] == 'on') ? 'Published' : ''}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{--<div class="row">--}}
                        {{--<div class="col-12">--}}
                            {{--<nav>--}}
                                {{--<ul class="pagination">--}}
                                    {{--<li class="page-item">--}}
                                        {{--<a href="#" class="page-link" aria-label="Previous">--}}
                                            {{--<i class="icn icon-arrow_dropdown_left"></i>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="page-item">--}}
                                        {{--<a href="#" class="page-link">1</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="page-item">--}}
                                        {{--<a href="#" class="page-link" aria-label="Next">--}}
                                            {{--<i class="icn icon-arrow_dropdown_right"></i>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</nav>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </section>
        </main>
@endsection

@section('javascript')
    <script type="text/javascript" src="/js/libraries/dropzone.min.js"></script>
    <script type="text/javascript" src="/js/libraries/datepicker.min.js"></script>

    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        $("div#article_header_dropzone").dropzone({ url: "/file/post" });
        $("div#article_body_dropzone").dropzone({ url: "/file/post" });

        $('#article_datepicker').datepicker({
            showOtherMonths: true,
            icons: {
                rightIcon: '<div class="datepicker_btn"><i class="icn icon-calendar"></i></div>',
                previousMonth: '<i class="icn icon-arrow_big_left"></i>',
                nextMonth: '<i class="icn icon-arrow_big_right"></i>'
            }
        });

        tallestArticleBlock();
    </script>
@stop