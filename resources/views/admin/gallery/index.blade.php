@extends('admin.posts.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title', 'Details page')
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="/css/libraries/jquery.fancybox.min.css">--}}
@stop
@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp


@section('content')
    <body id="news_admin">
    @include('includes.header')

    <main>
        <section class="admin_gallery_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="title_container">
                            <h1>{{ trans('lang.gallery_configuration') }}</h1>
                            <a class="action_link" href="{{ URL::to($lang . '/admin') }}"><i class="icn icon-arrow_left"></i></a>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#homepage" role="tab" data-toggle="tab">{{ trans('lang.homepage') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#france" role="tab" data-toggle="tab">{{ trans('lang.france') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#swiss" role="tab" data-toggle="tab">{{ trans('lang.swiss') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#usa" role="tab" data-toggle="tab">{{ trans('lang.usa') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#mauritius" role="tab" data-toggle="tab">{{ trans('lang.mauritius') }}</a>
                    </li>
                </ul>
                {{ Html::ul($errors->all(), array('class' => 'error_list')) }}

                <div class="errors" style="display:none">
                    <ul class="error_list"></ul>
                </div>

                <div class="tab-content">
                    @foreach($gallery_settings as $settings)
                        <div role="tabpanel" class="tab-pane fade {{ ($settings['page'] == 'homepage') ? 'in show active' : '' }}" id="{{ $settings['page'] }}" >
                            <div class="outer_block_container">
                                <div class="inner_block_container">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <form action="{{ URL::to($lang . '/admin/gallery/show') }}"  method="POST" id="switch_form_{{ $settings['page'] }}">
                                                {!! csrf_field() !!}
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="form_el_label"><span>{{ trans('lang.what_to_display') }}</span></label>
                                                        <input type="hidden" name="page" value="{{ $settings['page'] }}" class="form-control">
                                                        <div class="switch_field">
                                                            <input type="radio" id="gallery_{{ $settings['page'] }}" name="show" value="1" {{ ($settings['show'] == 1) ? 'checked' : '' }} />
                                                            <label for="gallery_{{ $settings['page'] }}">{{ trans('lang.gallery') }}</label>
                                                            <input type="radio" id="last_object_{{ $settings['page'] }}" name="show" value="0" {{ ($settings['show'] == 0) ? 'checked' : '' }} />
                                                            <label for="last_object_{{ $settings['page'] }}">{{ trans('lang.last_object') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <form action="{{ URL::to($lang . '/admin/gallery') }}" method="POST" id="upload_{{$settings['page']}}" class="image_upload_form" method="POST" enctype="multipart/form-data">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="page" id="page" value="{{ $settings['page'] }}" class="form-control">

                                                @if ($message = Session::get('success'))
                                                    <div class="alert alert-success alert-block">
                                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @endif

                                                <div class="row">
                                                    <div class="col-md-6 col-lg-12 margin_bottom_20">
                                                        <label class="form_el_label"><span>{{ trans('lang.title') }} *</span></label>
                                                        <div class="input_container">
                                                            <input type="text" name="title" id="title" class="" placeholder="Title">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-lg-12 margin_bottom_20">
                                                        <label class="form_el_label"><span>{{ trans('lang.status') }}</span></label>
                                                        <select name="sell_type" title="">
                                                            @foreach($sell_type as $type)
                                                                <option value="{{ $type }}">{{ $type }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 col-lg-12 margin_bottom_20 limited_select">
                                                        <label class="form_el_label"><span>{{ trans('lang.property_type') }}</span></label>
                                                        <select name="subtype" title="">
                                                            @foreach($subtype as $type)
                                                                <option value="{{ $type['value'] }}">{{ $type['value'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 col-lg-12 margin_bottom_20">
                                                        <label class="form_el_label"><span>{{ trans('lang.town') }}</span></label>
                                                        <select name="city" title="">
                                                            @foreach($cities as $city)
                                                                <option value="{{ $city['name'] }}">{{ $city['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 col-lg-12 margin_bottom_20">
                                                        <label class="form_el_label"><span>{{ trans('lang.image') }} *</span></label>
                                                        <div class="img_upload_container">
                                                            <div class="img_upload">
                                                                <input name="image" type="file" accept="image/*" id="header_img_{{ $settings['page'] }}" class="input_file"/>
                                                                <label for="header_img_{{ $settings['page'] }}"><span>{{ trans('lang.choose_header_img') }}</span></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-lg-12 margin_bottom_20">
                                                        <label class="form_el_label"><span>Link</span></label>
                                                        <div class="input_container">
                                                            <input type="text" name="link" id="link" class="" placeholder="Link">
                                                        </div>
                                                    </div>
                                                    <div class="push-sm-6 col-sm-6 push-lg-0 col-lg-12 margin_bottom_20">
                                                        <button type="submit" id="button_upload" class="btn">{{ trans('lang.upload') }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-8">
                                            <form action="{{ URL::to($lang . '/admin/gallery/destroy') }}"  id="multiple_destroy_{{ $settings['page'] }}" method="POST" class="gallery_content_form">
                                                    {{--<input type="hidden" name="_method" value="delete">--}}
                                                    {!! csrf_field() !!}
                                                    @if($gallery->count())
                                                        <div class="row" id="display_image">
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
                                                                    <div class='col-6 col-sm-4 col-md-3 col-lg-3 margin_bottom_30' id="gallery_image" data-id="{{ $image->id }}">
                                                                        <div class="thumbnail_container">
                                                                            <a data-fancybox="gallery_{{ $settings['page'] }}" class="thumbnail" href="{{ URL::to('/') }}/gallery/{{ $settings['page'] }}/{{ $image->created_at->format('F_Y') }}/{{ $image->image }}">
                                                                                <div class="img_container">
                                                                                    <img class="img-responsive" alt="" src="{{ URL::to('/') }}/gallery/{{ $settings['page'] }}/{{ $image->created_at->format('F_Y') }}/{{ $image->image }}" />
                                                                                    <div class='text-center'>
                                                                                        <small class='text-muted'>{{ $image->name }}</small>
                                                                                    </div> <!-- text-center / end -->
                                                                                </div>
                                                                            </a>
                                                                            <a class="remove_btn" id="{{ $image->id }}" href = "{{ URL::to('admin/gallery/' . $image->id) }}"><i class="icn icon-cancel"></i></a>
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
                                                                <div class="col-sm-6">
                                                                    <div class="my_checkbox margin_bottom_20">
                                                                        <label>
                                                                            <input type="checkbox" name="check_all" id="check_all" value="true">
                                                                            <span class="fake_checkbox"></span>
                                                                            <span class="my_checkbox_text">{{ trans('lang.check_all_images') }}</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <button type="submit" class="btn float-right" disabled>{{ trans('lang.delete') }}</button>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                </form>
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
        {{--<script type="text/javascript" src="/js/libraries/jquery.fancybox.min.js"></script>--}}

        <script>
            jQuery(document).ready(function () {
                @foreach($gallery_settings as $settings)
                    jQuery("#upload_{{$settings['page']}}").validate({
                    submitHandler: function (form) {
                        var formData = new FormData(form);
                        $.ajax({
                            type: form.method,
                            url: form.action,
                            dataType: 'json',
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false
                        }).done(function (formData) {
                            if($.isEmptyObject(formData.errors)) {
                                $(".error_list").html('');
                                $('#multiple_destroy_{{$settings['page']}} #display_image').append('' +
                                    '<div class="col-6 col-sm-4 col-md-3 col-lg-3 margin_bottom_30" id="gallery_image" data-id="' + formData.id + '">' +
                                    '<div class="thumbnail_container">' +
                                    '<a data-fancybox="gallery_homepage" class="thumbnail" href="' + formData.image + '">' +
                                    '<div class="img_container">' +
                                    '<img class="img-responsive" alt="" src="' + formData.image + '">' +
                                    '</div>' +
                                    '</a>' +
                                    '<a class="remove_btn" id="' + formData.id + '" href = "{{ URL::to('admin/gallery/')}}/' + formData.id + '">' +
                                    '<i class="icn icon-cancel"></i>' +
                                    '</a>' +
                                    '<div class="my_checkbox"><label><input type="checkbox" name="gallery[]" value="' + formData.id + '" /><span class="fake_checkbox"></span></label></div>' +
                                    '</div>' +
                                    '</div>'
                                );

                                if($('#multiple_destroy_{{$settings['page']}} #gallery_image').length <= 1) {
                                    $('#multiple_destroy_{{$settings['page']}} .my_checkbox').hide()
                                } else {
                                    $('#multiple_destroy_{{$settings['page']}} .my_checkbox').show()
                                }

                                $(".img_upload_container .img_upload span").replaceWith("<span>Choisissez une image d'en-tête</span>");

                                form.reset();

                                if ($('#multiple_destroy_{{$settings['page']}} #gallery_image').length === 2) {
                                    $('#multiple_destroy_{{$settings['page']}}').append('' +
                                        '<div class="row">' +
                                        '<div class="col-6">' +
                                        '<div class="my_checkbox">' +
                                        '<label>' +
                                        '<input required="" type="checkbox" name="subscribe" id="check_all" value="true">' +
                                        '<span class="fake_checkbox"></span>' +
                                        '<span class="my_checkbox_text">{{ trans('lang.check_all_images') }}</span>' +
                                        '</label>' +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="col-6">' +
                                        '<button type="submit" class="btn float-right" disabled>{{ trans('lang.delete') }}</button>' +
                                        '</div>' +
                                        '</div>'
                                    );
                                }

                                $('.remove_btn').on('click', function (e) {
                                    e.preventDefault();
                                    var url = $(this).attr('href');
                                    var id = $(this).attr('id');
                                    console.log(id);
                                    $.ajax({
                                        url: url,
                                        success: function () {
                                            $('#multiple_destroy_{{$settings['page']}} div[data-id="' + id + '"]').remove();
                                            if ($('#multiple_destroy_{{$settings['page']}} #gallery_image').length <= 1) {
                                                $('#multiple_destroy_{{$settings['page']}} .my_checkbox').hide();
                                                $('#multiple_destroy_{{$settings['page']}} button.float-right').hide();
                                            }
                                        }
                                    });
                                });

                                $('form.gallery_content_form input[name="gallery[]"]').change(function () {
                                    var totalCheckedImg = $('form.gallery_content_form').find('input[name="gallery[]"]:checked').length;
                                    if (totalCheckedImg >= 1) {
                                        $('form.gallery_content_form button.btn').attr('disabled', false);
                                    } else {
                                        $('form.gallery_content_form button.btn').attr('disabled', true);
                                    }
                                });

                                $('form.gallery_content_form input#check_all').change(function () {
                                    if (this.checked) {
                                        $('form.gallery_content_form input[name="gallery[]"]').prop('checked', true);
                                        $('form.gallery_content_form button.btn').attr('disabled', false);
                                    } else {
                                        $('form.gallery_content_form input[name="gallery[]"]').prop('checked', false);
                                        $('form.gallery_content_form button.btn').attr('disabled', true);
                                    }
                                });

                                console.log(formData.id);
                                console.log($('#multiple_destroy_{{$settings['page']}} #gallery_image').length);
                            } else {
                                error_message(formData.errors);
                            }
                        })
                    }
                });
                @endforeach

                function error_message (msg) {
                    $(".error_list").html('');
                    $(".errors").css('display','block');
                    $.each( msg, function( key, value ) {
                        $(".errors").find("ul").append('<li>' + value + '</li>');
                    });
                }
            })
        </script>

        <script>
            $(document).ready(function(){
                $('.remove_btn').on('click', function(e){
                    e.preventDefault();
                    var url = $(this).attr('href');
                    var id = $(this).attr('id');
                    console.log(id);
                    $.ajax({
                        url: url,
                        cache: false,
                        success: function() {
                            @foreach($gallery_settings as $settings)
                                $('#multiple_destroy_{{$settings['page']}} div[data-id="' + id + '"]').remove();
                            if($('#multiple_destroy_{{$settings['page']}} #gallery_image').length <= 1) {
                                $('#multiple_destroy_{{$settings['page']}} .my_checkbox').hide();
                                $('#multiple_destroy_{{$settings['page']}} button.float-right').hide();
                            }
                            @endforeach
                        }
                    });
                });
            });
        </script>

        <script>
            $(document).ready(function(){

                @foreach($gallery_settings as $settings)
                    $('#switch_form_{{$settings['page']}}').submit(function(e){
                    e.preventDefault();
                    var form = $(this);
                    var url = form.attr('action');
                    var data = form.serialize();
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: data,
                        success: function() {
                            if($('#gallery_{{$settings['page']}}').is(':checked')){
                                $('#multiple_destroy_{{$settings['page']}}').fadeIn(600);
                            } else {
                                $('#multiple_destroy_{{$settings['page']}}').fadeOut(100);
                            }
                        }
                    });
                });
                @endforeach
            });
        </script>

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
                setCookie("currentTab", currentTab, 365);

                currentSwitch = $('#' + currentTab + ' .switch_field input[checked]').attr('id');
                console.log('Tab click switch: '+currentSwitch);
                setCookie("currentSwitch", currentSwitch, 365);

                console.log('Tab click tab: '+currentTab);

                currentSwitch = currentSwitch.substr(0, currentSwitch.indexOf('_'));
                if(currentSwitch == 'gallery') {
                    $('.tab-pane#' + currentTab + ' .gallery_content_form').show();
                } else {
                    $('.tab-pane#' + currentTab + ' .gallery_content_form').hide();
                }
            });

            $('.image_upload_form button[type="submit"]').on('click', function () {
                currentTab = $(this).closest('div.tab-pane').attr('id');
                setCookie("currentTab", currentTab, 365);
            });

            $('.switch_field input[type="radio"]').on('click', function () {
                $(this).closest('form').submit();
                currentTab = $(this).closest('div.tab-pane').attr('id');
                currentSwitch = $(this).attr('id');

                console.log('Switch click tab: '+currentTab);
                console.log('Switch click switch: '+currentSwitch);

                setCookie("currentTab", currentTab, 365);
                setCookie("currentSwitch", currentSwitch, 365);
            });

            function checkCookie() {
                currentTab = getCookie("currentTab");
                $(".nav-tabs .nav-item a.nav-link[href='#" + currentTab + "']").trigger('click');

                if(currentTab != '') {
                    currentSwitch = getCookie("currentSwitch");
                    currentSwitch = currentSwitch.substr(0, currentSwitch.indexOf('_'));
                    if(currentSwitch == 'gallery') {
                        $('.tab-pane#' + currentTab + ' .gallery_content_form').show();
                    } else {
                        $('.tab-pane#' + currentTab + ' .gallery_content_form').hide();
                    }
                }
            }
        </script>
@stop