@extends('admin.posts.layouts.master')

@section('title', 'Details page')
@section('css')

    <link rel="stylesheet" type="text/css" href="/css/libraries/jquery.fancybox.min.css">
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">--}}
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
        <section class="admin_gallery_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="title_container">
                            <h1>Gallery configuration</h1>
                            <a class="action_link" href="{{ URL::to('admin') }}"><i class="icn icon-arrow_left"></i></a>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#homepage" role="tab" data-toggle="tab">Homepage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#france" role="tab" data-toggle="tab">France</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#swiss" role="tab" data-toggle="tab">Swiss</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#usa" role="tab" data-toggle="tab">USA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#mauritius" role="tab" data-toggle="tab">Ile Maurice</a>
                    </li>
                </ul>
                {{ Html::ul($errors->all(), array('class' => 'error_list')) }}
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in show active" id="homepage">
                        <div class="outer_block_container">
                            <div class="inner_block_container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <form action="{{ URL::to('admin/gallery/') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                                            {!! csrf_field() !!}

                                            @if ($message = Session::get('success'))
                                                <div class="alert alert-success alert-block">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @endif

                                            <div class="row">
                                                <div class="col-md-6 col-lg-12 margin_bottom_20">
                                                    <label class="form_el_label"><span>Title *</span></label>
                                                    <div class="input_container">
                                                        <input type="text" name="title" class="" placeholder="Title">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-lg-12 margin_bottom_20">
                                                    <label class="form_el_label"><span>Image *</span></label>
                                                    <div class="img_upload_container">
                                                        <div class="img_upload">
                                                            <input name="image" type="file" accept="image/*" id="header_img" class="input_file"/>
                                                            <label for="header_img"><span>{{ trans('lang.choose_header_img') }}</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="page" value = "homepage" class="form-control">
                                                <div class="push-sm-6 col-sm-6 push-lg-0 col-lg-12 margin_bottom_20">
                                                    <button type="submit" class="btn">Upload</button>
                                                </div>
                                                <div class="col-12 pull-sm-6 col-sm-6 pull-lg-0 col-lg-12">
                                                    <label class="form_el_label"><span>What to display on main page ?</span></label>
                                                    <div class="switch-field">
                                                        <input type="radio" id="gallery" name="switch_2" value="gallery" checked/>
                                                        <label for="gallery">Gallery</label>
                                                        <input type="radio" id="last_object" name="switch_2" value="last_object" />
                                                        <label for="last_object">Last object</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            @if($gallery->count())
                                                @foreach($gallery as $image)
                                                    <div class='col-6 col-sm-4 col-md-3 col-lg-3 margin_bottom_20'>

                                                            <a data-fancybox="gallery" class="thumbnail" href="{{ URL::to('/') }}/gallery/home_page/{{ date('F_Y') }}/{{ $image->image }}">
                                                                <div class="img_container">
                                                                    <img class="img-responsive" alt="" src="{{ URL::to('/') }}/gallery/home_page/{{ date('F_Y') }}/{{ $image->image }}" />
                                                                    <div class='text-center'>
                                                                        <small class='text-muted'>{{ $image->name }}</small>
                                                                    </div> <!-- text-center / end -->
                                                                </div>
                                                            </a>

                                                        <form action="{{ URL::to('admin/gallery/' . $image->id) }}" method="POST">
                                                            <input type="hidden" name="_method" value="delete">
                                                            {!! csrf_field() !!}
                                                            <button type="submit" class="remove_btn"><i class="icn icon-cancel"></i></button>
                                                        </form>
                                                    </div> <!-- col-6 / end -->
                                                @endforeach
                                            @endif
                                        </div> <!-- row / end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="france" >
                        france
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="swiss" >
                        swiss
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="usa" >
                        usa
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="mauritius" >
                        mauritius
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endsection

    @section('javascript')
        <script type="text/javascript" src="/js/libraries/jquery.fancybox.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".fancybox").fancybox({
                    openEffect: "none",
                    closeEffect: "none"
                });
            });
        </script>
    @stop


{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
    {{--<title>Image Gallery Example</title>--}}
    {{--<!-- Latest compiled and minified CSS -->--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<!-- References: https://github.com/fancyapps/fancyBox -->--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>--}}

    {{----}}
{{--</head>--}}
{{--<body>--}}

{{--<div class="container">--}}

    {{--<form action="{{ URL::to('admin/gallery/') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">--}}

        {{--{!! csrf_field() !!}--}}

        {{--@if (count($errors) > 0)--}}
            {{--<div class="alert alert-danger">--}}
                {{--<strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
                {{--<ul>--}}
                    {{--@foreach ($errors->all() as $error)--}}
                        {{--<li>{{ $error }}</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--@endif--}}

        {{--@if ($message = Session::get('success'))--}}
            {{--<div class="alert alert-success alert-block">--}}
                {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
                {{--<strong>{{ $message }}</strong>--}}
            {{--</div>--}}
        {{--@endif--}}

        {{--<div class="row">--}}
            {{--<div class="col-md-4">--}}
                {{--<strong>Title:</strong>--}}
                {{--<input type="text" name="title" class="form-control" placeholder="Title">--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
                {{--<strong>Image:</strong>--}}
                {{--<input type="file" name="image" class="form-control">--}}
            {{--</div>--}}
            {{--<input type="hidden" name="page" value = "homepage" class="form-control">--}}
            {{--<div class="col-md-1">--}}
                {{--<strong>Show</strong>--}}
                {{--<input type="checkbox" name="show" class="form-control">--}}
            {{--</div>--}}
            {{--<div class="col-md-3">--}}
                {{--<br/>--}}
                {{--<button type="submit" class="btn btn-success">Upload</button>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</form>--}}

    {{--<div class="row">--}}
        {{--<div class='list-group gallery'>--}}
            {{--@if($gallery->count())--}}
                {{--@foreach($gallery as $image)--}}
                    {{--<div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>--}}

                        {{--<a class="thumbnail fancybox" rel="ligthbox" href="{{ URL::to('/') }}/gallery/home_page/{{ date('F_Y') }}/{{ $image->image }}">--}}
                            {{--<img class="img-responsive" alt="" src="{{ URL::to('/') }}/gallery/home_page/{{ date('F_Y') }}/{{ $image->image }}" />--}}
                            {{--<div class='text-center'>--}}
                                {{--<small class='text-muted'>{{ $image->name }}</small>--}}
                            {{--</div> <!-- text-center / end -->--}}
                        {{--</a>--}}
                        {{--<form action="{{ URL::to('admin/gallery/' . $image->id) }}" method="POST">--}}
                            {{--<input type="hidden" name="_method" value="delete">--}}
                            {{--{!! csrf_field() !!}--}}
                            {{--<button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>--}}
                        {{--</form>--}}
                    {{--</div> <!-- col-6 / end -->--}}
                {{--@endforeach--}}
            {{--@endif--}}

        {{--</div> <!-- list-group / end -->--}}
    {{--</div> <!-- row / end -->--}}
{{--</div> <!-- container / end -->--}}

{{--</body>--}}

{{--<script type="text/javascript">--}}
    {{--$(document).ready(function(){--}}
        {{--$(".fancybox").fancybox({--}}
            {{--openEffect: "none",--}}
            {{--closeEffect: "none"--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}
{{--</html>--}}