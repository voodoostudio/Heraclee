@extends('layouts.master')

@section('title', 'Details page')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/custom_styles/dashboard.min.css')}}">
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')

    <section class="page_title_section hidden-md-up">
        <div class="container-fluid">
            <h1>{{ trans('lang.news') }}</h1>
        </div>
    </section>

    <section class="article_section">
        <div class="container-fluid">
            <div class="outer_block_container">
                <div class="inner_block_container">

                    <div class="title_container">
                        <a class="action_link" href="{{ URL::to('newsletters/') }}"><i class="icn icon-arrow_left"></i></a>
                        <h1>Heraclee</h1>
                    </div>

                    <h2>12.2017</h2>

                    <iframe id="newsetter_content" src="/newsletters/heraclee_newsletter" height="1000" width="100%" style="border: none"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script>
        //        $(window).load(function () {
        console.log('test');
        var filteredContents = $('#newsetter_content').contents().find('table.templateContainer').height();
        //        });
    </script>
@stop


