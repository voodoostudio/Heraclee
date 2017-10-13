@extends('layouts.master')

@section('title', 'Details page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/news.min.css">
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')
    <section class="login_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-8 offset-md-2 col-xl-6 offset-xl-3">
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <form action="">
                                <div class="row">
                                    <div class="col-12 margin_bottom_20">
                                        <label class="form_el_label"><span>Login *</span></label>
                                        <div class="input_container">
                                            <input type="text" name="login" placeholder="Login" required>
                                        </div>
                                    </div>
                                    <div class="col-12 margin_bottom_20">
                                        <label class="form_el_label"><span>Password *</span></label>
                                        <div class="input_container">
                                            <input type="password" name="password" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 margin_bottom_20">
                                        <div class="my_checkbox">
                                            <label>
                                                <input required="" type="checkbox" name="subscribe" id="subscribe" value="true" aria-required="true">
                                                <span class="fake_checkbox"></span>
                                                <span class="my_checkbox_text">Remember me</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 margin_bottom_10">
                                        <button class="btn pull-right" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <a href="{{ route('password_recover') }}" class="forgot_password"><i class="icn icon-rooms"></i><span>Forgot my password</span></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script type="text/javascript">
        $('.news_carousel').slick({
            arrows: false,
            dots: false
        });
        var slidesAmount = $('.news_list_section .news_carousel div.news_slide:not(.slick-cloned)').length;
        for (var i = 1; i <= slidesAmount; i++) {
            $("ul.pagination li ul.pages").append( '<li class="page-item"><a href="#" class="page-link">'+i+'</a></li>' );
        }

        $('ul.pagination li ul.pages li.page-item:nth-child(1)').addClass('active');

        $('.news_carousel').on('beforeChange', function(event, slick, currentSlide, nextSlide){
            console.log(nextSlide);
            var currSlide = nextSlide +1;
            $('ul.pagination li ul.pages li.page-item').removeClass('active');
            $('ul.pagination li ul.pages li.page-item:nth-child('+currSlide+')').addClass('active');
        });

        $('.news_list_section ul.pagination li.page-item a.page-link').on('click', function () {
            var destinationSlide = $(this).html();
            if($(this).attr('aria-label') == 'Next') {
                $('.news_carousel').slick('slickNext');
            }
            else if ($(this).attr('aria-label') == 'Previous') {
                $('.news_carousel').slick('slickPrev');
            }
            else {
                $('.news_carousel').slick('slickGoTo', destinationSlide - 1);
            }
        });
    </script>
@stop


