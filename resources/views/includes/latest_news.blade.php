<section class="latest_news_section">
    <div class="container-fluid">
        <div class="latest_news_container">
            <div class="marquee_title">
                <span>Latest news</span>
            </div>
            <div class="marquee">
                <ul class="">
                    @foreach($last_news as $item)
                        <li>
                            <a href="{{ route('news_details', ['id' => $item['id']]) }}">@if($lang == 'fr_FR') {{ $item['title_fr'] }} @elseif($lang == 'en_GB') {{ $item['title_en'] }}  @endif</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>