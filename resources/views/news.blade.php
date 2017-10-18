@extends('layouts.master')

@section('title', 'Details page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/news.min.css">
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')
    <section class="news_list_section">
        <div class="container-fluid">
            <div class="news_carousel">
                @foreach (array_chunk($news->toArray(), 6) as $content)
                    <div class = "news_slide">
                        <div class="row">
                            @foreach($content as $item)
                                <div class="col-xs-12 col-xl-6">
                                    <div class="outer_block_container">
                                        <div class="inner_block_container">
                                            <div class="article_info_block">
                                                <div class="article_img">
                                                    <a href="{{ route('news_details', ['id' => $item['id']]) }}">
                                                        @php
                                                            $image_counter = 1;
                                                        @endphp
                                                        @foreach(json_decode($item['front_image']) as $key => $image)
                                                            @if($image_counter == 1)
                                                                <img src="{{ URL::to('/') }}/posts/front_image/{{ date('F_Y') }}/{{ $image }}" alt="{{ $key }}">
                                                            @endif
                                                            @php
                                                                $image_counter++;
                                                            @endphp
                                                        @endforeach

                                                        @if(empty(json_decode($item['front_image'])))
                                                            <img src="/img/details/no_agent_photo.svg" alt="">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="article_info">
                                                    <a href="{{ route('news_details', ['id' => $item['id']]) }}"><h2>@if($lang == 'fr_FR') {{ $item['title_fr'] }} @elseif($lang == 'en_GB') {{ $item['title_en'] }}  @endif</h2></a>
                                                    <h3>{{ (!empty($item['date'])) ? date('d.m.Y', strtotime($item['date'])) : '' }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
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

        tallestArticleBlock();
    </script>
@stop


