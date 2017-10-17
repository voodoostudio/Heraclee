<!DOCTYPE html>
<html>
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
                            <h1>Edit articles</h1>
                            <a href="{{ URL::to('admin/') }}"><i class="icn icon-arrow_left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="outer_block_container">
                    <div class="inner_block_container">
                        {{ Form::model($posts, array('route' => array('posts.update', $posts->id), 'method' => 'PUT', 'files' => true)) }}
                        {{--<form method="POST" action = "{{ route('posts.update', ['id' => $posts->id]) }}" enctype="multipart/form-data" style = "background: #272727; border: none;"> --}}{{--action = "{{ route('posts.store') }}"--}}
                            {{--{{ csrf_field() }}--}}
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
                                                        <input type="text" value = "{{ $posts->title_fr }}" name="title_fr" id="title_fr" placeholder="Title">
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="en_title" >
                                                    <div class="input_container">
                                                        <input type="text" value = "{{ $posts->title_en }}" name="title_en" id="title_en" placeholder="Title">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form_el_label"><span>Posting date</span></label>
                                            <div class="input_container">
                                                <input name="date" placeholder="Posting date" value = "{{ $posts->date }}" id="article_datepicker" />
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="img_upload_container">
                                        <div class="img_preview">
                                            @foreach(json_decode($posts->front_image) as $key => $image)
                                                <div class="img_preview_thumbnail" >
                                                    <img src = "../../../front_image/{{ $image }}" />
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="img_upload">
                                            <input name="front_image[]" type="file" id="header_img"  class="input_file"/>
                                            <label for="header_img"><span>Choose a header image</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 margin_bottom_20">
                                    <div class="img_upload_container">
                                        <div class="img_preview">
                                            @foreach(json_decode($posts->body_image) as $key => $image)
                                                <div class="img_preview_thumbnail" >
                                                    <img src = "../../../body_image/{{ $image }}" />
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="img_upload">
                                            <input name="body_image[]" type="file" id="body_img" class="input_file"/>
                                            <label for="body_img"><span>Choose a body image</span></label>
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
                                                <textarea name="description_fr" id="text_content" cols="30" rows="10">{{ $posts->description_fr }}</textarea>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="en_text" >
                                            <div class="input_container">
                                                <textarea name="description_en" id="text_content" cols="30" rows="10">{{ $posts->description_en }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="my_checkbox">
                                        <label>
                                            <input type="checkbox" name="status" id="status" aria-required="true" {{ ( !empty($posts->status) ) ? 'checked="checked' : '' }}>
                                            <span class="fake_checkbox"></span>
                                            <span class="my_checkbox_text">Publier</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn" id = "btn-add-submit" type="submit">Save</button>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>
    {{--{{ Form::model($posts, array('route' => array('posts.update', $posts->id), 'method' => 'PUT', 'files' => true)) }}--}}

    {{--<div class="form-group">--}}
        {{--{{ Form::label('title_fr', 'Title (fr)') }}--}}
        {{--{{ Form::text('title_fr', null, array('class' => 'form-control')) }}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{{ Form::label('title_en', 'Title (en)') }}--}}
        {{--{{ Form::text('title_en', null, array('class' => 'form-control')) }}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{{ Form::label('date', 'date') }}--}}
        {{--{{ Form::date('date', null, array('class' => 'form-control')) }}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{{ Form::label('front_image', 'Image') }}--}}
        {{--<div>--}}
            {{--<img style = "max-width: 300px;" src = "../../../front_image/{{ $posts->front_image }}" />--}}
        {{--</div>--}}
        {{--{{ Form::file('front_image', null, array('class' => 'form-control')) }}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{{ Form::label('body_image', 'Body Image') }}--}}
        {{--<div>--}}
            {{--<img style = "max-width: 300px;" src = "../../../body_image/{{ $posts->front_image }}" />--}}
        {{--</div>--}}
        {{--{{ Form::file('body_image', null, array('class' => 'form-control')) }}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{{ Form::label('description_fr', 'Description (fr)') }}--}}
        {{--{{ Form::textarea('description_fr', null, array('class' => 'form-control')) }}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{{ Form::label('description_en', 'Description (en)') }}--}}
        {{--{{ Form::textarea('description_en', null, array('class' => 'form-control')) }}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{{ Form::label('status', 'Active') }}--}}
        {{--{{ Form::checkbox('status', Input::old('status'), array('class' => 'form-control')) }}--}}
    {{--</div>--}}

    {{--{{ Form::submit('Update!', array('class' => 'btn btn-primary')) }}--}}

    {{--{{ Form::close() }}--}}

    </main>
    @endsection

    @section('javascript')
        <script type="text/javascript" src="/js/libraries/dropzone.min.js"></script>
        <script type="text/javascript" src="/js/libraries/datepicker.min.js"></script>

        <script type="text/javascript">
            showSelectedFileName();

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


