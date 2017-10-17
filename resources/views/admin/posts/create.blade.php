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
            {{ Html::ul($errors->all()) }}
            <section class="article_edit_section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="title_container">
                                <h1>Create articles</h1>
                                <a href="{{ URL::to('admin/') }}"><i class="icn icon-arrow_left"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <form method="POST" action = "{{ route('posts.store') }}" enctype="multipart/form-data" style = "background: #272727; border: none;"> {{--action = "{{ route('posts.store') }}"--}}
                                {{ csrf_field() }}
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
                                                            <input type="text" name="title_fr" id="title_fr" placeholder="Title">
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="en_title" >
                                                        <div class="input_container">
                                                            <input type="text" name="title_en" id="title_fr" placeholder="Title">
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

                                    {{--<div class="col-md-6">--}}
                                        {{--<div class="dropzone" id="article_header_dropzone" >--}}
                                            {{--<div class="dz-default dz-message" data-dz-message="">--}}
                                                {{--<span>Drop article header image here to upload</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}


                                    {{--<div class="col-12 margin_bottom_20">--}}
                                        {{--<div class="dropzone dz-clickable" id="article_body_dropzone">--}}
                                            {{--<div class="dz-default dz-message" data-dz-message="">--}}
                                                {{--<span>Drop article body image here to upload</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    <div class="col-md-6">
                                        <div class="fallback dropzone" id="article_header_dropzone">
                                            <input name="front_image[]" type="file" multiple />
                                        </div>
                                    </div>

                                    <div class="col-12 margin_bottom_20">
                                        <div class="fallback dropzone">
                                            <input name="body_image[]" type="file" multiple />
                                        </div>
                                    </div>

                                    {{--<div id="dropzone-previews" style="min-height: 200px; border: 2px dotted #D2D6DE; padding: 20px"><span>Drop article header image here to upload</span></div>--}}

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
                                                    <textarea name="description_fr" id="text_content" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="en_text" >
                                                <div class="input_container">
                                                    <textarea name="description_en" id="text_content" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="my_checkbox">
                                            <label>
                                                <input type="checkbox" name="status" id="status" aria-required="true" checked="checked">
                                                <span class="fake_checkbox"></span>
                                                <span class="my_checkbox_text">Publier</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn" id = "btn-add-submit" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
@endsection

@section('javascript')
    <script type="text/javascript" src="/js/libraries/dropzone.min.js"></script>
    <script type="text/javascript" src="/js/libraries/datepicker.min.js"></script>

    <script type="text/javascript">

            {{--Dropzone.autoDiscover = false;--}}
            {{--$("#article_header_dropzone").dropzone({--}}
                {{--url: '{{ route('posts.upload') }}',--}}
                {{--paramName: 'front_image',--}}
                {{--uploadMultiple: true,--}}
                {{--acceptedFiles: 'image/*',--}}
                {{--maxFiles: 10,--}}
                {{--parallelUploads: 10,--}}
                {{--addRemoveLinks: true,--}}
                {{--maxFileSize: 50,--}}
                {{--autoProcessQueue: false,--}}
                {{--init: function() {--}}
                    {{--var submitButton = document.querySelector("#btn-add-submit");--}}
                    {{--myDropzone = this;--}}
                    {{--submitButton.addEventListener("click", function() {--}}
                        {{--myDropzone.processQueue();--}}
                    {{--});--}}
                {{--}--}}
            {{--});--}}


        {{--Dropzone.options.uploadImage = {--}}
            {{--url: '{{ route('posts.upload') }}',--}}
            {{--paramName: 'front_image',--}}
            {{--uploadMultiple: true,--}}
            {{--acceptedFiles: 'image/*',--}}
            {{--maxFiles: 10,--}}
            {{--parallelUploads: 10,--}}
            {{--previewsContainer: '#dropzone-previews',--}}
            {{--clickable: "#dropzone-previews",--}}
            {{--addRemoveLinks: true,--}}
            {{--maxFileSize: 50,--}}
            {{--autoProcessQueue: false,--}}

            {{--init: function() {--}}
                {{--var submitButton = document.querySelector("#btn-add-submit");--}}
                {{--myDropzone = this;--}}
                {{--submitButton.addEventListener("click", function() {--}}
                    {{--myDropzone.processQueue();--}}
                {{--});--}}
            {{--}--}}
         {{--};--}}


        {{--$("div#article_header_dropzone").dropzone({--}}
             {{--url: '{{ route('posts.store') }}',--}}
             {{--paramName: 'front_image',--}}
             {{--uploadMultiple: true,--}}
             {{--acceptedFiles: 'image/*',--}}
             {{--maxFiles: 10,--}}
             {{--parallelUploads: 10,--}}
             {{--previewsContainer: '#dropzone-previews',--}}
             {{--clickable: "#dropzone-previews",--}}
             {{--addRemoveLinks: true,--}}
             {{--autoProcessQueue: false,--}}
             {{--maxFileSize: 50,--}}
             {{--init: function() {--}}
                 {{--var submitButton = document.querySelector("#btn-add-submit");--}}
                 {{--myDropzone = this;--}}
                 {{--submitButton.addEventListener("click", function() {--}}
                     {{--myDropzone.processQueue();--}}
                 {{--});--}}
             {{--}--}}
         {{--});--}}




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