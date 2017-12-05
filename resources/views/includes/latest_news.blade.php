@if(!$last_news->isEmpty())
    <section class="latest_news_section">
        <div class="container-fluid">
            <div class="latest_news_container">
                <div class="marquee_title">
                    <span>{{ trans('lang.latest_news') }}</span>
                </div>
                <div class="marquee_title mobile">
                    <span>News</span>
                </div>
                <div class="marquee">
                    <ul class="">
                        @foreach($last_news as $item)
                            <li>
                                <a href="{{ route('news_details', ['id' => $item['id']]) }}">@if($lang == 'fr_FR') {{ $item['created_at']->format('d.m.Y') . ' ' . $item['title_fr'] }} @elseif($lang == 'en_GB') {{ $item['created_at']->format('d.m.Y') . ' ' . $item['title_en'] }}  @endif</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endif