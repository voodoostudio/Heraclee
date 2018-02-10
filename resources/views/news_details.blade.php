@extends('layouts.news_socials')

{{--{{ dd($item->toArray()) }}--}}

@section('title', 'Details page')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{mix('css/dashboard.css')}}">
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')

    @php
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $comment_description = (isset($item['description_'. $lang]) ? $item['description_' . $lang] : '');
        $comment_title = (isset($item['title_' . $lang]) ? $item['title_' . $lang] : '');
    @endphp

    <section class="page_title_section hidden-md-up">
        <div class="container-fluid">
            <h1>{{ trans('lang.news') }}</h1>
        </div>
    </section>

    <section class="article_section reveal">
        <div class="container-fluid">
            <div class="outer_block_container">
                <div class="inner_block_container">

                    <div class="title_container">
                        <a class="action_link" href="{{ URL::to('news/') }}"><i class="icn icon-arrow_left"></i></a>
                        <h1>@if($lang == 'fr_FR') {{ $item['title_fr'] }} @elseif($lang == 'en_GB') {{ $item['title_en'] }}  @endif</h1>

                        <ul class="social_networks_share">
                            <li><a class="twitter-share-button" onclick="window.open($(this).attr('href'), 'Twitter', config='height=216, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://twitter.com/home?status={{ $comment_title }}+{{ Request::fullUrl() }}"><i class="icn icon-twitter"></i></a></li>
                            {{--<li><a class="linkedin-share-button" onclick="window.open($(this).attr('href'), 'Linkedin', config='height=560, width=500, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&url={{ Request::fullUrl() }}&title={{ $comment_title }}&summary={{ $comment_description }}"><i class="icn icon-linked_in"></i></a></li>--}}
                            <li><a class="fb-share-button" onclick="window.open($(this).attr('href'), 'Facebook', config='height=100, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://www.facebook.com/share.php?u={{ Request::fullUrl() }}"><i class="icn icon-facebook"></i></a></li>
                        </ul>
                    </div>

                    <h2>{{ (!empty($item['date'])) ? date('d.m.Y', strtotime($item['date'])) : '' }}</h2>

                    <div class="img_container" style="display: none">
                        @foreach(json_decode($item['front_image']) as $key => $image)
                            <img src="{{ URL::to('/') }}/posts/front_image/{{ date('F_Y', strtotime($item['created_at'])) }}/{{ $image }}" alt="{{ $key }}">
                        @endforeach
                    </div>

                    <div class="img_container">
                        @foreach(json_decode($item['body_image']) as $key => $file)
                            @php
                                $extension = new SplFileInfo($file);
                                $jpg_preview = preg_replace('"\.pdf$"', '.jpg', $file);
                            @endphp
                            @if(strtolower($extension->getExtension()) == 'pdf')
                                <a href = "{{ URL::to('/') }}/posts/pdf/{{ date('F_Y', strtotime($item['created_at'])) }}/{{ $file }}">
                                    <img src = "{{ URL::to('/') }}/posts/pdf/{{ date('F_Y', strtotime($item['created_at'])) }}/{{ $jpg_preview }}" alt = "{{ $key }}"/>
                                </a>
                            @else
                                <img src="{{ URL::to('/') }}/posts/body_image/{{ date('F_Y', strtotime($item['created_at'])) }}/{{ $file }}" alt="{{ $key }}">
                            @endif
                        @endforeach
                    </div>
                    @if($lang == 'fr_FR')
                        <p>{!! str_replace("\n", '</p><p>', $item['description_fr']) !!}</p>
                    @elseif($lang == 'en_GB')
                        <p>{!! str_replace("\n", '</p><p>', $item['description_en']) !!} <p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
@stop


