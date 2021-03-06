@extends('admin.posts.layouts.master')

@section('title', 'Posts page')
@section('css')
    {{--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">--}}
@stop
@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp


@section('content')
    <body id="news_admin">
    @include('includes.header')

    <main>
        <section class="news_list_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="title_container">
                            <h1>{{ trans('lang.list_of_articles') }}</h1>
                            <a class="action_link" href="{{ URL::to($lang . '/admin') }}"><i class="icn icon-arrow_left"></i></a>
                            <a class="action_link add_new" href="{{ URL::to($lang . '/admin/posts/create') }}"><i class="icn icon-cancel"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($posts as $items)
                        <div class="col-xs-12 col-xl-6">
                            <div class="outer_block_container">
                                <div class="inner_block_container">
                                    <div class="edit_elements">
                                        <a href="{{ URL::to($lang . '/admin/posts/' . $items->id . '/edit') }}" class="edit_btn"><i class="icn icon-pencil"></i></a>
                                        {{ Form::open(array('url' => 'admin/posts/' . $items->id, 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        <button type="submit" class = "remove_btn"><i class="icn icon-cancel"></i></button>
                                        {{ Form::close() }}
                                    </div>
                                    <div class="article_info_block">
                                        <div class="article_img">
                                            <a href="{{ URL::to($lang . '/admin/posts/' . $items->id) }}">
                                                @php
                                                    $image_counter = 1;
                                                @endphp
                                                @foreach(json_decode($items['front_image']) as $key => $image)
                                                    @if($image_counter == 1)
                                                        <img src="{{ URL::to('/') }}/posts/front_image/{{ $items->created_at->format('F_Y') }}/{{ $image }}" alt="{{ $key }}">
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
                                            <a href="{{ URL::to($lang . '/admin/posts/' . $items->id) }}"><h2>@if($lang == 'fr') {{ $items['title_fr'] }} @elseif($lang == 'en') {{ $items['title_en'] }}  @endif</h2></a>
                                            <h3>{{ (!empty($items->date)) ? date('d.m.Y', strtotime($items->date)) : '' }}</h3>
                                            <span class="published_label">{{ ($items['status'] == 'on') ? trans('lang.published') : ''}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
    @endsection

    @section('javascript')
        {{--<script type="text/javascript" src="/js/libraries/dropzone.min.js"></script>--}}
        {{--<script type="text/javascript" src="/js/libraries/datepicker.min.js"></script>--}}

        <script type="text/javascript">
            if ($(window).width() >= 1200) {
                tallestArticleBlock();
            }
        </script>
@stop