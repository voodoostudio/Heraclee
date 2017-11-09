<header>
    <div class="container-fluid">
        <div class="logo">
            <a href="{{ route('index') }}">
                <img src="/img/logo.svg" alt="Heraclee logo">
            </a>
        </div>
        <div class="navigation_container">
            <div class="navigation_block">
                <div class="row">
                    <div class="col-12 col-md-10">
                        <a class="header_tel hidden-md-up" href="tel:+330494542001">+33 (0)4 94 54 20 01</a>
                        <h1 class="hidden-sm-down">{{ trans('lang.luxury_real_estate_agency') }}</h1>
                    </div>
                    <div class="col-12 col-md-2">
                        <ul class="lang_currency_container">
                            <li>
                                <ul class="language_select">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $langItem)
                                        <li>
                                            <a class="ravis-btn btn-type-2 {{ ($localeCode == App::getLocale()) ? 'active' : '' }}" rel="alternate" hreflang="{{$localeCode}}" href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}">
                                                <span>{{ $langItem['native'] }}</span>
                                           </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            {{--<li>--}}
                                {{--<select name="currency">--}}
                                    {{--<option value="chf">chf</option>--}}
                                    {{--<option value="eur">euro</option>--}}
                                {{--</select>--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                </div>
            </div>

            <?php
                $lang = LaravelLocalization::getCurrentLocale();
                $cp = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
             ?>

            <nav>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link {{ ($cp == '' || $cp == '' . $lang) ? 'active' : '' }}" href="{{ route('index') }}">{{ trans('lang.homepage') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (($cp == 'france')) ? 'active' : '' }}" href="{{ route('france') }}">{{ trans('lang.france') }}{{ (($cp == 'france')) ? ' (' . $count_items . ')'  : '' }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($cp == 'swiss') ? 'active' : '' }}" href="{{ route('swiss') }}">{{ trans('lang.swiss') }}{{ (($cp == 'swiss')) ? ' (' . $count_items . ')'  : '' }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($cp == 'usa') ? 'active' : '' }}" href="{{ route('usa') }}">{{ trans('lang.usa') }}{{ (($cp == 'usa')) ? ' (' . $count_items . ')'  : '' }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($cp == 'mauritius') ? 'active' : '' }}" href="{{ route('mauritius') }}">{{ trans('lang.mauritius') }}{{ (($cp == 'mauritius')) ? ' (' . $count_items . ')'  : '' }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($cp == 'virtual-tours') ? 'active' : '' }}" href="{{ route('virtual-tours') }}">{{ trans('lang.virtual_tours') }}</a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{ ($current_page == 'results' || $current_page == 'details' ) ? 'active' : '' }}" href="{{ route('results') }}">{{ trans('lang.buy') }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{ ($current_page == 'locations' || $current_page == 'locationsDetails') ? 'active' : '' }}" href="{{ route('locations') }}">{{ trans('lang.rent') }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">{{ trans('lang.homepage') }}Promotions</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">{{ trans('lang.homepage') }}Locaux commerciaux</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{ ($current_page == 'team') ? 'active' : '' }}" href="{{ route('team') }}">{{ trans('lang.agency') }}</a>--}}
                    {{--</li>--}}
                    <li class="nav-item">
                        <a class="nav-link {{ ($cp == 'news' || $cp == 'news_details') ? 'active' : '' }}" href="{{ route('news') }}">{{ trans('lang.news') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($cp == 'newsletters') ? 'active' : '' }}" href="{{ route('newsletters') }}">{{ trans('lang.newsletters') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($cp == 'contact') ? 'active' : '' }}" href="{{ route('contact') }}">{{ trans('lang.contact') }}</a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="menu-icon">
            <span></span>
        </div>

    </div>
</header>