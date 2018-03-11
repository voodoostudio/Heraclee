
@if(!$last_news->isEmpty())
    <section class="latest_news_section">
        <div class="container-fluid">
            <div class="latest_news_container">
                <div class="marquee_title">
                    <span>News</span>
                </div>
                {{--<div class="marquee_title">--}}
                    {{--<span>{{ trans('lang.latest_news') }}</span>--}}
                {{--</div>--}}
                {{--<div class="marquee_title mobile">--}}
                    {{--<span>News</span>--}}
                {{--</div>--}}
                <div class="marquee">
                    <ul class="">
                        @foreach($last_news as $item)
                            <li>
                                <a href="{{ route('news_details', ['id' => $item['id']]) }}">@if($lang == 'fr_FR') {{ date('d.m.Y', strtotime($item['date'])) . ' - ' . $item['title_fr'] }} @elseif($lang == 'en_GB') {{ date('d.m.Y', strtotime($item['date'])) . ' - ' . $item['title_en'] }}  @endif</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <a href="http://www.croixvalmer.com/" class="darnis_link">
                <img src="/img/logo_darnis_{{$lang}}.svg" alt="Darnis website link button">
            </a>
        </div>
    </section>
@endif