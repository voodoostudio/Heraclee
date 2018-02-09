@extends('admin.newsletter.layouts.master')

@section('title', 'Details page')
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="/css/libraries/datepicker.min.css">--}}
    {{--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">--}}
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
                                <h1>Create Newsletter</h1>
                                <a class="action_link" href="{{ URL::to($lang . '/admin/newsletter') }}"><i class="icn icon-arrow_left"></i></a>
                            </div>
                        </div>
                    </div>
                    {{ Html::ul($errors->all(), array('class' => 'error_list')) }}
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <form method="POST" id="newsletterEditForm" action = "{{ route('newsletter.store') }}" enctype="multipart/form-data" style = "background: #272727; border: none;">
                                {{ csrf_field() }}
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
                                                            <input type="text" name="title_fr" id="title_fr" placeholder="{{ trans('lang.title') }}">
                                                        </div>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="en_title" >
                                                        <div class="input_container">
                                                            <input type="text" name="title_en" id="title_fr" placeholder="{{ trans('lang.title') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form_el_label"><span>{{ trans('lang.posting_date') }} *</span></label>
                                                <div class="input_container">
                                                    <input name="date" placeholder="{{ trans('lang.posting_date') }}" id="newsletter_datepicker" readonly="readonly"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="img_upload_container">
                                            <div class="img_upload">
                                                <input name="front_image_path[]" type="file" accept="image/*" id="header_img" class="input_file"/>
                                                <label for="header_img"><span>{{ trans('lang.choose_header_img') }}</span></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 margin_bottom_20">
                                        <div class="img_upload_container">
                                            <div class="img_upload">
                                                <input name="newsletter_html_path[]" type="file" accept=".html" id="html_file" class="input_file"/>
                                                <label for="html_file"><span>Add only html file</span></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button class="btn" id = "btn-add-submit" type="submit">{{ trans('lang.save') }}</button>
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
        {{--<script type="text/javascript" src="/js/libraries/datepicker.min.js"></script>--}}

        <script type="text/javascript">
            showSelectedFileName();

            $('#newsletter_datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: false,
                format: 'yyyy-mm-dd',
                icons: {
                    rightIcon: '<div class="datepicker_btn"><i class="icn icon-calendar"></i></div>',
                    previousMonth: '<i class="icn icon-arrow_big_left"></i>',
                    nextMonth: '<i class="icn icon-arrow_big_right"></i>'
                }
            });

            $('#newsletter_datepicker').on('click', function () {
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