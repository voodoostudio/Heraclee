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
                    @foreach($gallery_settings as $settings)
                        <div role="tabpanel" class="tab-pane fade {{ ($settings['page'] == 'homepage') ? 'in show active' : '' }}" id="{{ $settings['page'] }}" >
                            <div class="outer_block_container">
                                <div class="inner_block_container">
                                    <div class="row">
                                        <div class="col-lg-4">
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
                                            <form action="{{ URL::to('admin/gallery/') }}" class="image_upload_form" method="POST" enctype="multipart/form-data">
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
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <form action="{{ URL::to('admin/gallery/destroy') }}"  method="POST" class="gallery_content_form">
                                                    {{--<input type="hidden" name="_method" value="delete">--}}
                                                    {!! csrf_field() !!}
                                                    @if($gallery->count())
                                                        <div class="row">
                                                            @php
                                                                $counter = [];
                                                                foreach($gallery as $image) {
                                                                    if( $settings['page'] == $image->page) {
                                                                        $counter[] = $image->image;
                                                                    }
                                                                }
                                                            @endphp
                                                            @foreach($gallery as $key => $image)
                                                                @if( $settings['page'] == $image->page)
                                                                    <div class='col-6 col-sm-4 col-md-3 col-lg-3 margin_bottom_20'>
                                                                        <div class="thumbnail_container">
                                                                            <a data-fancybox="gallery_{{ $settings['page'] }}" class="thumbnail" href="{{ URL::to('/') }}/gallery/{{ $settings['page'] }}/{{ date('F_Y') }}/{{ $image->image }}">
                                                                                <div class="img_container">
                                                                                    <img class="img-responsive" alt="" src="{{ URL::to('/') }}/gallery/{{ $settings['page'] }}/{{ date('F_Y') }}/{{ $image->image }}" />
                                                                                    <div class='text-center'>
                                                                                        <small class='text-muted'>{{ $image->name }}</small>
                                                                                    </div> <!-- text-center / end -->
                                                                                </div>
                                                                            </a>
                                                                            <a class="remove_btn" href = "{{ URL::to('admin/gallery/' . $image->id) }}"><i class="icn icon-cancel"></i></a>
                                                                            @if(count($counter) >= 2)
                                                                                <div class="my_checkbox">
                                                                                    <label>
                                                                                        <input type="checkbox" name="gallery[]" value="{{$image->id}}" />
                                                                                        <span class="fake_checkbox"></span>
                                                                                    </label>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        @if(count($counter) >= 2)
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="my_checkbox">
                                                                    <label>
                                                                        <input required="" type="checkbox" name="subscribe" id="check_all" value="true">
                                                                        <span class="fake_checkbox"></span>
                                                                        <span class="my_checkbox_text">Check all</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <button type="submit" class="btn float-right" disabled>Delete</button>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    @endif
                                                </form>
                                            </div> <!-- row / end -->
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

            $('form.gallery_content_form input[name="gallery[]"]').change(function() {
                var totalCheckedImg = $('form.gallery_content_form').find('input[name="gallery[]"]:checked').length;
                if(totalCheckedImg >=1) {
                    $('form.gallery_content_form button.btn').attr('disabled', false);
                } else {
                    $('form.gallery_content_form button.btn').attr('disabled', true);
                }
            });

            $('form.gallery_content_form input#check_all').change(function() {
                if(this.checked) {
                    $('form.gallery_content_form input[name="gallery[]"]').prop('checked', true);
                    $('form.gallery_content_form button.btn').attr('disabled', false);
                } else {
                    $('form.gallery_content_form input[name="gallery[]"]').prop('checked', false);
                    $('form.gallery_content_form button.btn').attr('disabled', true);
                }
            });

            var currentTab = '';
            var currentSwitch = '';
            $('.nav-tabs .nav-item a.nav-link').on('click', function () {
                currentTab = $(this).attr('href').replace('#', '');
                setCookie("currentAdminTab", currentTab, 365);

                currentSwitch = $('#' + currentTab + ' .switch_field input[checked]').attr('id');
                setCookie("currentSwitch", currentSwitch, 365);
                currentSwitch = currentSwitch.substr(0, currentSwitch.indexOf('_'));

                if(currentSwitch == 'gallery') {
                    $('.tab-pane#' + currentTab + ' .gallery_content_form').show();
                } else {
                    $('.tab-pane#' + currentTab + ' .gallery_content_form').hide();
                }
            });

            $('.image_upload_form button[type="submit"]').on('click', function () {
                currentTab = $(this).closest('div.tab-pane').attr('id');
                setCookie("currentAdminTab", currentTab, 365);
            });

            $('.switch_field input[type="radio"]').on('click', function () {
                $(this).closest('form').submit();
                currentTab = $(this).closest('div.tab-pane').attr('id');
                currentSwitch = $(this).attr('id');
                setCookie("currentAdminTab", currentTab, 365);
                setCookie("currentSwitch", currentSwitch, 365);
            });

            function checkCookie() {
                var currentAdminTab = getCookie("currentAdminTab");
                $(".nav-tabs .nav-item a.nav-link[href='#" + currentAdminTab + "']").trigger('click');
                if(currentAdminTab != '') {
                    currentSwitch = getCookie("currentSwitch");
                    currentSwitch = currentSwitch.substr(0, currentSwitch.indexOf('_'));
                    if(currentSwitch == 'gallery') {
                        $('.tab-pane#' + currentAdminTab + ' .gallery_content_form').show();
                    } else {
                        $('.tab-pane#' + currentAdminTab + ' .gallery_content_form').hide();
                    }
                }
            }
        </script>
    @stop