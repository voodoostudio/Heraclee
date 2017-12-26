@extends('layouts.master')

@section('title', 'Newsletter page')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/custom_styles/dashboard.min.css')}}">
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')
    <section class="page_title_section hidden-md-up">
        <div class="container-fluid">
            <h1>{{ trans('lang.newsletters') }}</h1>
        </div>
    </section>

    <section class="newsletters_section">
        <div class="container-fluid">
            <h1 class="no_results">{{ trans('lang.currently_no_results') }}</h1>
        </div>
    </section>

    <section class="news_list_section">
        <div class="container-fluid">
            <div class="news_carousel">
                <div class = "news_slide">
                    <div class="row">
                        <div class="col-xs-12 col-xl-6">
                            <div class="outer_block_container">
                                <div class="inner_block_container">
                                    <div class="article_info_block">
                                        <div class="article_img">
                                            <a href="/newsletter_details">
                                                <img src="/img/newsletters/1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="article_info">
                                            <a href="/newsletter_details"><h2>Heraclee</h2></a>
                                            <h3>12.2017</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="javascript:void(0);" class="page-link" aria-label="Previous">
                                    <i class="icn icon-arrow_dropdown_left"></i>
                                </a>
                            </li>
                            <li>
                                <ul class="pages"></ul>
                            </li>
                            <li class="page-item">
                                <a href="javascript:void(0);" class="page-link" aria-label="Next">
                                    <i class="icn icon-arrow_dropdown_right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
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
            $("ul.pagination li ul.pages").append( '<li class="page-item"><a href="javascript:void(0);" class="page-link">'+i+'</a></li>' );
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

        if ($(window).width() >= 1200) {
            tallestArticleBlock();
        }

    </script>
@stop
