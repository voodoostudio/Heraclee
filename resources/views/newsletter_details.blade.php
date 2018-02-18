@extends('layouts.master')

@section('title', 'Details page')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{mix('css/dashboard.css')}}">
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')

    <section class="page_title_section hidden-md-up">
        <div class="container-fluid">
            <h1><span class="img_bg_text">{{ trans('lang.newsletters') }}</span></h1>
        </div>
    </section>

    <section class="article_section newsletter reveal">
        <div class="container-fluid">
            <div class="outer_block_container">
                <div class="inner_block_container">
                    <div class="title_container">
                        <a class="action_link" href="{{ URL::to('newsletters/') }}"><i class="icn icon-arrow_left"></i></a>
                        <h1>@if($lang == 'fr_FR') {{ $item->title_fr }} @elseif($lang == 'en_GB') {{ $item->title_en }}  @endif</h1>
                    </div>
                    <h2>{{ date('d.m.Y', strtotime((!empty($item->date)) ? $item->date : '')) }}</h2>
                    @foreach(json_decode($item['newsletter_html_path']) as $key => $html)
                        <iframe onload="resizeIframe('newsletter_content')" frameborder="0" marginheight="0" scrolling="no" marginwidth="0" id="newsletter_content" src="/newsletter/html/{{ $html }}" width="100%" style="border: none"></iframe>
                        {{--<iframe src="/newsletter/html/{{ $html }}" height="5800" width="100%" style="border: none"></iframe>--}}
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script>

        $(window).resize(function () {
            resizeIframe('newsletter_content');
        });

        function resizeIframe(iframeID) {
            var iframe = window.parent.document.getElementById(iframeID);
            iframe.style.height = iframe.contentWindow.document.body.offsetHeight+ 'px';
        }
    </script>
@stop






