@extends('admin.posts.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                    {{--<div role="tabpanel" class="tab-pane fade in show active" id="homepage">--}}
                        {{--<div class="outer_block_container">--}}
                            {{--<div class="inner_block_container">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-lg-4">--}}
                                        {{--<form action="{{ URL::to('admin/gallery/') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">--}}
                                            {{--{!! csrf_field() !!}--}}
                                            {{--<input type="hidden" name="page" value="homepage" class="form-control">--}}

                                            {{--@if ($message = Session::get('success'))--}}
                                                {{--<div class="alert alert-success alert-block">--}}
                                                    {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
                                                    {{--<strong>{{ $message }}</strong>--}}
                                                {{--</div>--}}
                                            {{--@endif--}}

                                            {{--<div class="row">--}}
                                                {{--<div class="col-md-6 col-lg-12 margin_bottom_20">--}}
                                                    {{--<label class="form_el_label"><span>Title *</span></label>--}}
                                                    {{--<div class="input_container">--}}
                                                        {{--<input type="text" name="title" class="" placeholder="Title">--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}

                                                {{--<div class="col-md-6 col-lg-12 margin_bottom_20">--}}
                                                    {{--<label class="form_el_label"><span>Image *</span></label>--}}
                                                    {{--<div class="img_upload_container">--}}
                                                        {{--<div class="img_upload">--}}
                                                            {{--<input name="image" type="file" accept="image/*" id="header_img" class="input_file"/>--}}
                                                            {{--<label for="header_img"><span>{{ trans('lang.choose_header_img') }}</span></label>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="push-sm-6 col-sm-6 push-lg-0 col-lg-12 margin_bottom_20">--}}
                                                    {{--<button type="submit" class="btn">Upload</button>--}}
                                                {{--</div>--}}
                                                {{--<div class="col-12 pull-sm-6 col-sm-6 pull-lg-0 col-lg-12">--}}
                                                    {{--<label class="form_el_label"><span>What to display on main page ?</span></label>--}}
                                                    {{--<div class="switch_field">--}}
                                                        {{--<input type="hidden" name="main_img_radio" value="gallery" class="form-control">--}}
                                                        {{--<input type="radio" id="gallery" name="switch_2" value="gallery" checked/>--}}
                                                        {{--<label for="gallery">Gallery</label>--}}
                                                        {{--<input type="radio" id="last_object" name="switch_2" value="last_object" />--}}
                                                        {{--<label for="last_object">Last object</label>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</form>--}}
                                        {{--<form action="{{ URL::to('admin/gallery/') }}"  method="POST" >--}}
                                            {{--{!! csrf_field() !!}--}}
                                            {{--<div class="col-12 pull-sm-6 col-sm-6 pull-lg-0 col-lg-12">--}}
                                                {{--<label class="form_el_label"><span>What to display on main page ?</span></label>--}}
                                                {{--<input type="hidden" name="page" value="homepage" class="form-control">--}}
                                                {{--<div class="switch_field">--}}
                                                    {{--<input type="radio" id="gallery_homepage" name="show" value="1" checked/>--}}
                                                    {{--<label for="gallery_homepage">Gallery</label>--}}
                                                    {{--<input type="radio" id="last_object_homepage" name="show" value="0" />--}}
                                                    {{--<label for="last_object_homepage">Last object</label>--}}
                                                {{--</div>--}}
                                                {{--<button type="submit" class="btn">+</button>--}}
                                            {{--</div>--}}
                                        {{--</form>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-lg-8">--}}
                                        {{--<div class="row">--}}
                                            {{--@if($gallery->count())--}}
                                                {{--@foreach($gallery as $image)--}}
                                                    {{--<div class='col-6 col-sm-4 col-md-3 col-lg-3 margin_bottom_20'>--}}

                                                            {{--<a data-fancybox="gallery" class="thumbnail" href="{{ URL::to('/') }}/gallery/home_page/{{ date('F_Y') }}/{{ $image->image }}">--}}
                                                                {{--<div class="img_container">--}}
                                                                    {{--<img class="img-responsive" alt="" src="{{ URL::to('/') }}/gallery/home_page/{{ date('F_Y') }}/{{ $image->image }}" />--}}
                                                                    {{--<div class='text-center'>--}}
                                                                        {{--<small class='text-muted'>{{ $image->name }}</small>--}}
                                                                    {{--</div> <!-- text-center / end -->--}}
                                                                {{--</div>--}}
                                                            {{--</a>--}}

                                                        {{--<form action="{{ URL::to('admin/gallery/' . $image->id) }}" method="POST">--}}
                                                            {{--<input type="hidden" name="_method" value="delete">--}}
                                                            {{--{!! csrf_field() !!}--}}
                                                            {{--<button type="submit" class="remove_btn"><i class="icn icon-cancel"></i></button>--}}
                                                        {{--</form>--}}
                                                    {{--</div> <!-- col-6 / end -->--}}
                                                {{--@endforeach--}}
                                            {{--@endif--}}
                                        {{--</div> <!-- row / end -->--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    @foreach($gallery_settings as $settings)
                        <div role="tabpanel" class="tab-pane fade {{ ($settings['page'] == 'homepage') ? 'in show active' : '' }}" id="{{ $settings['page'] }}" >
                            <div class="outer_block_container">
                                <div class="inner_block_container">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <form action="{{ URL::to('admin/gallery/') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="page" value="{{ $settings['page'] }}" class="form-control">

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
                                                                <input name="image" type="file" accept="image/*" id="header_img_{{ $settings['page'] }}" class="input_file"/>
                                                                <label for="header_img_{{ $settings['page'] }}"><span>{{ trans('lang.choose_header_img') }}</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="push-sm-6 col-sm-6 push-lg-0 col-lg-12 margin_bottom_20">
                                                        <button type="submit" class="btn">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <form action="{{ URL::to('admin/gallery/show') }}"  method="POST" id="switch_form">
                                                {!! csrf_field() !!}
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="form_el_label"><span>What to display on main page ?</span></label>
                                                        <input type="hidden" name="page" value="{{ $settings['page'] }}" class="form-control">
                                                        <div class="switch_field">
                                                            <input type="radio" id="gallery_{{ $settings['page'] }}" name="show" value="1" {{ ($settings['show'] == 1) ? 'checked' : '' }} />
                                                            <label for="gallery_{{ $settings['page'] }}">Gallery</label>
                                                            <input type="radio" id="last_object_{{ $settings['page'] }}" name="show" value="0" {{ ($settings['show'] == 0) ? 'checked' : '' }} />
                                                            <label for="last_object_{{ $settings['page'] }}">Last object</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <form action="{{ URL::to('admin/gallery/destroy') }}"  method="POST" >
                                                    {{--<input type="hidden" name="_method" value="delete">--}}
                                                    {!! csrf_field() !!}
                                                    @if($gallery->count())
                                                        @foreach($gallery as $image)
                                                            @if( $settings['page'] == $image->page)
                                                                <div class='col-6 col-sm-4 col-md-3 col-lg-3 margin_bottom_20'>
                                                                    <a data-fancybox="gallery_{{ $settings['page'] }}" class="thumbnail" href="{{ URL::to('/') }}/gallery/{{ $settings['page'] }}/{{ date('F_Y') }}/{{ $image->image }}">
                                                                        <div class="img_container">
                                                                            <img class="img-responsive" alt="" src="{{ URL::to('/') }}/gallery/{{ $settings['page'] }}/{{ date('F_Y') }}/{{ $image->image }}" />
                                                                            <div class='text-center'>
                                                                                <small class='text-muted'>{{ $image->name }}</small>
                                                                            </div> <!-- text-center / end -->
                                                                        </div>
                                                                    </a>
                                                                    <a class="remove_btn" href = "{{ URL::to('admin/gallery/' . $image->id) }}"><i class="icn icon-cancel"></i></a>
                                                                    {{--<form action="{{ URL::to('admin/gallery/' . $image->id) }}" method="POST">--}}
                                                                        {{--<input type="hidden" name="_method" value="delete">--}}
                                                                        {{--{!! csrf_field() !!}--}}
                                                                        {{--<button type="submit" class="remove_btn"><i class="icn icon-cancel"></i></button>--}}
                                                                    {{--</form>--}}
                                                                    <input type="checkbox" name="gallery[]" value="{{$image->id}}" />
                                                                </div> <!-- col-6 / end -->
                                                            @endif
                                                        @endforeach
                                                            <button type="submit" class="remove_btn">Delete</button>
                                                    @endif
                                                </form>
                                            </div> <!-- row / end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{--<div role="tabpanel" class="tab-pane fade" id="swiss" >--}}
                        {{--<form action="{{ URL::to('admin/gallery/') }}"  method="POST" >--}}
                            {{--{!! csrf_field() !!}--}}
                            {{--<div class="col-12 pull-sm-6 col-sm-6 pull-lg-0 col-lg-12">--}}
                                {{--<label class="form_el_label"><span>What to display on main page ?</span></label>--}}
                                {{--<input type="hidden" name="page" value="swiss" class="form-control">--}}
                                {{--<div class="switch_field">--}}
                                    {{--<input type="radio" id="gallery_swiss" name="show" value="1" checked/>--}}
                                    {{--<label for="gallery_swiss">Gallery</label>--}}
                                    {{--<input type="radio" id="last_object_swiss" name="show" value="0" />--}}
                                    {{--<label for="last_object_swiss">Last object</label>--}}
                                {{--</div>--}}
                                {{--<button type="submit" class="btn">+</button>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                    {{--<div role="tabpanel" class="tab-pane fade" id="usa" >--}}
                        {{--<form action="{{ URL::to('admin/gallery/') }}"  method="POST" >--}}
                            {{--{!! csrf_field() !!}--}}
                            {{--<div class="col-12 pull-sm-6 col-sm-6 pull-lg-0 col-lg-12">--}}
                                {{--<label class="form_el_label"><span>What to display on main page ?</span></label>--}}
                                {{--<input type="hidden" name="page" value="usa" class="form-control">--}}
                                {{--<div class="switch_field">--}}
                                    {{--<input type="radio" id="gallery_usa" name="show" value="1" checked/>--}}
                                    {{--<label for="gallery_usa">Gallery</label>--}}
                                    {{--<input type="radio" id="last_object_usa" name="show" value="0" />--}}
                                    {{--<label for="last_object_usa">Last object</label>--}}
                                {{--</div>--}}
                                {{--<button type="submit" class="btn">+</button>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                    {{--<div role="tabpanel" class="tab-pane fade" id="mauritius" >--}}
                        {{--<form action="{{ URL::to('admin/gallery/') }}"  method="POST" >--}}
                            {{--{!! csrf_field() !!}--}}
                            {{--<div class="col-12 pull-sm-6 col-sm-6 pull-lg-0 col-lg-12">--}}
                                {{--<label class="form_el_label"><span>What to display on main page ?</span></label>--}}
                                {{--<input type="hidden" name="page" value="mauritius" class="form-control">--}}
                                {{--<div class="switch_field">--}}
                                    {{--<input type="radio" id="gallery_mauritius" name="show" value="1" checked/>--}}
                                    {{--<label for="gallery">Gallery</label>--}}
                                    {{--<input type="radio" id="last_object_mauritius" name="show" value="0" />--}}
                                    {{--<label for="last_object_mauritius">Last object</label>--}}
                                {{--</div>--}}
                                {{--<button type="submit" class="btn">+</button>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                </div>
            </div>
        </section>
    </main>
    @endsection

    @section('javascript')
        <script type="text/javascript" src="/js/libraries/jquery.fancybox.min.js"></script>
        <script type="text/javascript">
            checkCookie();
            $(document).ready(function(){
                $(".fancybox").fancybox({
                    openEffect: "none",
                    closeEffect: "none"
                });
            });

            showSelectedFileName();

            $('.form-image-upload button[type="submit"]').on('click', function () {
                var currentTab = $(this).closest('div.tab-pane').attr('id');
                setCookie("currentAdminTab", currentTab, 365);
            });

            $('.switch_field input[type="radio"]').on('click', function () {
                $(this).closest('form').submit();
                var currentTab = $(this).closest('div.tab-pane').attr('id');
                setCookie("currentAdminTab", currentTab, 365);
            });



            function checkCookie() {
                var currentAdminTab = getCookie("currentAdminTab");
                $(".nav-tabs .nav-item a.nav-link[href='#" + currentAdminTab + "']").trigger('click');
            }
        </script>
    @stop