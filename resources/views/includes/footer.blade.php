@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp

<footer>
    <section style="display: none" class="top_footer_section">
        <div class="container-fluid">
            <h3>{{ trans('lang.footer_title') }}</h3>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="javascript:void(0)">
                                <h2>{{ trans('lang.footer_keyword_1') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="javascript:void(0)">
                                <h2>{{ trans('lang.footer_keyword_2') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="javascript:void(0)">
                                <h2>{{ trans('lang.footer_keyword_3') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="javascript:void(0)">
                                <h2>{{ trans('lang.footer_keyword_4') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="javascript:void(0)">
                                <h2>{{ trans('lang.footer_keyword_5') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="javascript:void(0)">
                                <h2>{{ trans('lang.footer_keyword_6') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="javascript:void(0)">
                                <h2>{{ trans('lang.footer_keyword_7') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="javascript:void(0)">
                                <h2>{{ trans('lang.footer_keyword_8') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="javascript:void(0)">
                                <h2>{{ trans('lang.footer_keyword_9') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="javascript:void(0)">
                                <h2>{{ trans('lang.footer_keyword_10') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="javascript:void(0)">
                                <h2>{{ trans('lang.footer_keyword_11') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="javascript:void(0)">
                                <h2>{{ trans('lang.footer_keyword_12') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="bottom_footer_section">
        <div class="container-fluid reveal">
            <div class="row ">
                <div class="col-sm-12 col-md-6 push-md-6 col-lg-4 push-lg-8">
                    <h4>{!! trans('lang.footer_title') !!}</h4>
                    <div class="contact_block">
                        <a class="footer_logo_link" href="{{ route('index') }}"><img src="/img/logo.svg"></a>
                        <ul>
                            <li><a href="tel:+330494542001">+33 (0)4 94 54 20 01</a></li>
                            <li>44, Route des Plages<br>83990 Saint-Tropez</li>
                        </ul>
                    </div>
                    <form id = "newsletter" action="{{ route('footer_newsletter') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="input_container light">
                            <input type="text" name = "email" id = "email" placeholder="{{ trans('lang.subscribe_to_newsletter') }}">
                            <button type="submit" class = "send-btn" id = "newsletter_submit"><i class="icn icon-send_message" aria-hidden="true"></i></button>
                        </div>
                    </form>
                    <div id="response"></div>
                </div>
                <div class="col-sm-12 col-md-6 pull-md-6 col-lg-8 pull-lg-4">
                    <h2>{!! trans('lang.footer_description') !!}</h2>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="copyright">© {{ date("Y") }} - {{ trans('lang.copyright_text') }}</p>
                </div>
            </div>
        </div>
    </section>
    <ul class="social_networks">
        <li class="scroll_to_top"><a href="#"><i class="icn icon-up_page"></i></a></li>
    </ul>
</footer>