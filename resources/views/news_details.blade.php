@extends('layouts.news_socials')

{{--{{ dd($item->toArray()) }}--}}

@section('title', 'Details page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/news.min.css">
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')

    @php
        $lang = LaravelLocalization::getCurrentLocaleRegional();
        $comment_description = (isset($item['description_'. $lang]) ? $item['description_' . $lang] : '');
        $comment_title = (isset($item['title_' . $lang]) ? $item['title_' . $lang] : '');
    @endphp

    <section class="article_section">
        <div class="container-fluid">
            <div class="outer_block_container">
                <div class="inner_block_container">

                    <div class="title_container">
                        <a class="action_link" href="{{ URL::to('news/') }}"><i class="icn icon-arrow_left"></i></a>
                        <h1>@if($lang == 'fr_FR') {{ $item['title_fr'] }} @elseif($lang == 'en_GB') {{ $item['title_en'] }}  @endif</h1>

                        <ul class="social_networks_share">
                            <li><a class="twitter-share-button" onclick="window.open($(this).attr('href'), 'Twitter', config='height=216, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://twitter.com/home?status={{ $comment_title }}+{{ Request::fullUrl() }}"><i class="icn icon-twitter"></i></a></li>
                            <li><a class="linkedin-share-button" onclick="window.open($(this).attr('href'), 'Linkedin', config='height=560, width=500, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&url={{ Request::fullUrl() }}&title={{ $comment_title }}&summary={{ $comment_description }}"><i class="icn icon-linked_in"></i></a></li>
                            <li><a class="fb-share-button" onclick="window.open($(this).attr('href'), 'Facebook', config='height=100, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://www.facebook.com/share.php?u={{ Request::fullUrl() }}"><i class="icn icon-facebook"></i></a></li>
                        </ul>
                    </div>

                    <h2>{{ (!empty($item['date'])) ? date('d.m.Y', strtotime($item['date'])) : '' }}</h2>
                    <div class="img_container">
                        @foreach(json_decode($item['front_image']) as $key => $image)
                            <img src="{{ URL::to('/') }}/posts/front_image/{{ date('F_Y') }}/{{ $image }}" alt="{{ $key }}">
                        @endforeach
                    </div>

                    <div class="img_container">
                        @foreach(json_decode($item['body_image']) as $key => $file)
                            @php
                                $extension = new SplFileInfo($file);
                            @endphp
                            @if(strtolower($extension->getExtension()) == 'pdf')
                                <a href = "{{ URL::to('/') }}/posts/pdf/{{ date('F_Y') }}/{{ $file }}">PDF
                                    <img src = "" alt = ""/>
                                </a>
                            @else
                                <img src="{{ URL::to('/') }}/posts/body_image/{{ date('F_Y') }}/{{ $file }}" alt="{{ $key }}">
                            @endif
                        @endforeach

                            {{--<object data="http://heraclee.com/wp-content/uploads/2017/03/Article-news.pdf" type="application/pdf" width="100%" height="600">--}}
                                {{--alt : <a href="http://heraclee.com/wp-content/uploads/2017/03/Article-news.pdf">test.pdf</a>--}}
                            {{--</object>--}}

                            {{--<a href="http://heraclee.com/wp-content/uploads/2017/03/News.pdf">--}}
                                {{--<img class="alignnone wp-image-1229363 size-full" src="http://heraclee.com/wp-content/uploads/2017/03/var.jpg" alt="var" width="728" height="971" srcset="http://heraclee.com/wp-content/uploads/2017/03/var.jpg 728w, http://heraclee.com/wp-content/uploads/2017/03/var-225x300.jpg 225w, http://heraclee.com/wp-content/uploads/2017/03/var-500x667.jpg 500w, http://heraclee.com/wp-content/uploads/2017/03/var-600x800.jpg 600w" sizes="(max-width: 728px) 100vw, 728px"></a>--}}

                            {{--<iframe src="http://docs.google.com/gview?url=http://heraclee.com/wp-content/uploads/2017/03/Article-news.pdf&embedded=true"--}}
                                    {{--style="width:100%; height:500px;" frameborder="0"></iframe>--}}
                    </div>
                    @if($lang == 'fr_FR') <p>{{ $item['description_fr'] }}</p> @elseif($lang == 'en_GB') <p>{{ $item['description_en'] }}/<p>  @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
@stop


