<!DOCTYPE html>
<html>
@extends('admin.posts.layouts.master')

@section('title', 'Details page')
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="/css/libraries/datepicker.min.css">--}}
@stop
@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp


@section('content')

    <body id="news_admin">
    @include('includes.header')

    <main>
        <section class="article_edit_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="title_container">
                            <h1>{{ trans('lang.editing_article') }}</h1>
                            <a class="action_link" href="{{ URL::to($lang . '/admin/posts') }}"><i class="icn icon-arrow_left"></i></a>
                        </div>
                    </div>
                </div>
                {{ Html::ul($errors->all(), array('class' => 'error_list')) }}
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
                                            <label class="form_el_label"><span>{{ trans('lang.title') }} *</span></label>
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
                                                    <input type="text" value = "{{ $posts->title_fr }}" name="title_fr" id="title_fr" placeholder="{{ trans('lang.title') }}">
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="en_title" >
                                                <div class="input_container">
                                                    <input type="text" value = "{{ $posts->title_en }}" name="title_en" id="title_en" placeholder="{{ trans('lang.title') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form_el_label"><span>{{ trans('lang.posting_date') }} *</span></label>
                                        <div class="input_container">
                                            <input name="date" placeholder="{{ trans('lang.posting_date') }}" value = "{{ $posts->date }}" id="article_datepicker" readonly="readonly"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="img_upload_container">
                                    <div class="img_preview">
                                        @foreach(json_decode($posts->front_image) as $key => $image)
                                            <div class="img_preview_thumbnail" >
                                                <img src = "{{ URL::to('/') }}/posts/front_image/{{ $posts->created_at->format('F_Y') }}/{{ $image }}" />
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="img_upload">
                                        <input name="front_image[]" type="file" accept="image/*" id="header_img" class="input_file"/>
                                        <label for="header_img"><span>{{ trans('lang.choose_header_img') }}</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 margin_bottom_20">
                                <div class="img_upload_container">
                                    <div class="img_preview">
                                        @foreach(json_decode($posts->body_image) as $key => $file)
                                            @php
                                                $extension = new SplFileInfo($file);
                                                $jpg_preview = preg_replace('"\.pdf$"', '.jpg', $file);
                                            @endphp
                                            @if(strtolower($extension->getExtension()) == 'pdf')
                                                <div class="img_preview_thumbnail" >
                                                    <img src = "{{ URL::to('/') }}/posts/pdf/{{ $posts->created_at->format('F_Y') }}/{{ $jpg_preview }}" alt = "{{ $key }}"/>
                                                </div>
                                            @else
                                                <div class="img_preview_thumbnail" >
                                                    <img src="{{ URL::to('/') }}/posts/body_image/{{ $posts->created_at->format('F_Y') }}/{{ $file }}" alt="{{ $key }}">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="img_upload">
                                        <input name="body_image[]" type="file" accept="image/*, application/pdf" id="body_img" class="input_file"/>
                                        <label for="body_img"><span>{{ trans('lang.choose_body_img') }}</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12" style="margin-bottom: 20px;">
                                <label class="form_el_label" style="background-size: 20% auto;"><span>Youtube link</span></label>
                                <div class="input_container">
                                    <input type="text" name="video_link" id="video_link" value="{{ $posts->video_link }}" placeholder="Youtube link">
                                </div>
                            </div>

                            <div class="col-12 margin_bottom_20">
                                <div class="label_container">
                                    <label class="form_el_label"><span>{{ trans('lang.article_text') }}</span></label>
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
                            <div class="col-12" style="margin-bottom: 20px;">
                                <label class="form_el_label" style="background-size: 2% auto;"><span>Link</span></label>
                                <div class="input_container">
                                    <input type="text" name="link" id="link" placeholder="Link" value="{{ $posts->link }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my_checkbox">
                                    <label>
                                        <input type="checkbox" name="status" id="status" aria-required="true" {{ ( !empty($posts->status) ) ? 'checked="checked' : '' }}>
                                        <span class="fake_checkbox"></span>
                                        <span class="my_checkbox_text">{{ trans('lang.publish') }}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button class="btn" id = "btn-add-submit" type="submit">{{ trans('lang.save') }}</button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endsection

    @section('javascript')
        {{--<script type="text/javascript" src="/js/libraries/datepicker.min.js"></script>--}}

        <script type="text/javascript">
            showSelectedFileName();

            $('#article_datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: false,
                format: 'yyyy-mm-dd',
                icons: {
                    rightIcon: '<div class="datepicker_btn"><i class="icn icon-calendar"></i></div>',
                    previousMonth: '<i class="icn icon-arrow_big_left"></i>',
                    nextMonth: '<i class="icn icon-arrow_big_right"></i>'
                }
            });

            $('#article_datepicker').on('click', function () {
                $( ".datepicker_btn" ).trigger( "click" );
            });

            $(document).mouseup(function(e)
            {
                var container = $(".gj-calendar");

                if (!container.is(e.target) && container.has(e.target).length === 0)
                {
                    container.hide();
                }
            });
        </script>
@stop


