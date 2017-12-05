{{--@include('includes/last_update_script');--}}

@php
    use App\Gallery;
    use App\Posts;
    use Illuminate\Support\Facades\DB;

    /* Last update on site */
    $gallery_date = Gallery::orderBy('updated_at', 'desc')->value('updated_at');
    $gallery_last_date = (!empty($gallery_date)) ? date(strtotime($gallery_date . '+1 hours')) : '';
    $posts_date = Posts::orderBy('updated_at', 'desc')->value('updated_at');
    $posts_last_date = (!empty($posts_date)) ? date(strtotime($posts_date . '+1 hours')) : '';
    $properties_date =
        DB::table('apimo_properties')
            ->select('updated_at')
            ->where('reference', 'like', 'HSTP%')
            ->orderBy('updated_at', 'desc')
            ->value('updated_at');
    $properties_last_date = (!empty($properties_date)) ? date(strtotime($properties_date . '+1 hours')) : '';

    $dates = [$posts_last_date, $gallery_last_date, $properties_last_date];

    $last_update = max($dates);
@endphp

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
                        <h1>{!! trans('lang.luxury_real_estate_agency') !!}</h1>
                        <a class="header_tel" href="tel:+330494542001">+33 (0)4 94 54 20 01</a>
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
                <div class="last_updates">
                    <p><i class="fa fa-refresh" aria-hidden="true"></i>{{ trans('lang.last_website_update') }} {{ date('d.m.Y - H:i', $last_update) }}</p>
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
                        <div class="dropdown">
                            <button class="btn dropdown-toggle nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ trans('lang.other_countries') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item {{ ($cp == 'swiss') ? 'active' : '' }}" href="{{ route('swiss') }}">{{ trans('lang.swiss') }}{{ (($cp == 'swiss')) ? ' (' . $count_items . ')'  : '' }}</a>
                                <a class="dropdown-item {{ ($cp == 'usa') ? 'active' : '' }}" href="{{ route('usa') }}">{{ trans('lang.usa') }}{{ (($cp == 'usa')) ? ' (' . $count_items . ')'  : '' }}</a>
                                <a class="dropdown-item {{ ($cp == 'mauritius') ? 'active' : '' }}" href="{{ route('mauritius') }}">{{ trans('lang.mauritius') }}{{ (($cp == 'mauritius')) ? ' (1)'  : '' }}</a>
                            </div>
                        </div>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{ ($cp == 'swiss') ? 'active' : '' }}" href="{{ route('swiss') }}">{{ trans('lang.swiss') }}{{ (($cp == 'swiss')) ? ' (' . $count_items . ')'  : '' }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{ ($cp == 'usa') ? 'active' : '' }}" href="{{ route('usa') }}">{{ trans('lang.usa') }}{{ (($cp == 'usa')) ? ' (' . $count_items . ')'  : '' }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{ ($cp == 'mauritius') ? 'active' : '' }}" href="{{ route('mauritius') }}">{{ trans('lang.mauritius') }}{{ (($cp == 'mauritius')) ? ' (' . $count_items . ')'  : '' }}</a>--}}
                    {{--</li>--}}
                    <li class="nav-item">
                        <a class="nav-link {{ ($cp == 'virtual-tours') ? 'active' : '' }}" href="{{ route('virtual-tours') }}">{{ trans('lang.virtual_tours') }}</a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<select id="other_countries" name="other_countries[]" title="">--}}
                            {{--<option value="" selected disabled>Autre pays</option>--}}
                            {{--<option value="swiss"><a href="#">Suisse</a></option>--}}
                            {{--<option value="usa"><a href="#">USA</a></option>--}}
                            {{--<option value="mauritius"><a href="#">Ile Maurice</a></option>--}}
                        {{--</select>--}}
                    {{--</li>--}}

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