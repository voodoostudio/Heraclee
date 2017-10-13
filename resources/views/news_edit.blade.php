@extends('layouts.master')

@section('title', 'Details page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/libraries/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="/css/libraries/datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/css/news.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')

    <section class="article_edit_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="title_container">
                        <h1>Edit articles</h1>
                        <a href="{{ route('news_admin') }}"><i class="icn icon-arrow_left"></i></a>
                    </div>
                </div>
            </div>
            <div class="outer_block_container">
                <div class="inner_block_container">
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-12 margin_bottom_20">
                                        <div class="label_container">
                                            <label class="form_el_label"><span>Title *</span></label>
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#fr_title" role="tab" data-toggle="tab">FR</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#en_title" role="tab" data-toggle="tab">EN</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in show active" id="fr_title">
                                                <div class="input_container">
                                                    <input type="text" name="title" placeholder="Title">
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="en_title" >
                                                <div class="input_container">
                                                    <input type="text" name="title" placeholder="Title">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form_el_label"><span>Posting date</span></label>
                                        <div class="input_container">
                                            {{--<input type="date" name="date" id="date" placeholder="Posting date">--}}
                                            <input name="date" placeholder="Posting date" id="article_datepicker" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="dropzone dz-clickable" id="article_header_dropzone">
                                    <div class="dz-default dz-message" data-dz-message="">
                                        <span>Drop article header image here to upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 margin_bottom_20">
                                <div class="dropzone dz-clickable" id="article_body_dropzone">
                                    <div class="dz-default dz-message" data-dz-message="">
                                        <span>Drop article body image here to upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 margin_bottom_20">
                                <div class="label_container">
                                    <label class="form_el_label"><span>Text *</span></label>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#fr_text" role="tab" data-toggle="tab">FR</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#en_text" role="tab" data-toggle="tab">EN</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in show active" id="fr_text">
                                        <div class="input_container">
                                            <textarea name="text_content" id="text_content" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="en_text" >
                                        <div class="input_container">
                                            <textarea name="text_content" id="text_content" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my_checkbox">
                                    <label>
                                        <input required="" type="checkbox" name="subscribe" id="subscribe" value="true" aria-required="true" checked="checked">
                                        <span class="fake_checkbox"></span>
                                        <span class="my_checkbox_text">Publier</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button class="btn" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
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
            format: 'yyyy-mm-dd',
            icons: {
                rightIcon: '<div class="datepicker_btn"><i class="icn icon-calendar"></i></div>',
                previousMonth: '<i class="icn icon-arrow_big_left"></i>',
                nextMonth: '<i class="icn icon-arrow_big_right"></i>'
            }
        });
    </script>

@stop