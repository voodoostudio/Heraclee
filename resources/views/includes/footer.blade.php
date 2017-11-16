<footer>
    <section class="top_footer_section">
        <div class="container-fluid">
            <h3>{{ trans('lang.footer_title') }}</h3>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="http://heraclee.com/fr/achat/details?id=1222583">
                                <h2>{{ trans('lang.footer_keyword_1') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="http://heraclee.com/fr/achat/details?id=1568892">
                                <h2>{{ trans('lang.footer_keyword_2') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="http://heraclee.com/fr/achat/details?id=1660917">
                                <h2>{{ trans('lang.footer_keyword_3') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="http://heraclee.com/fr/achat/details?id=1236565">
                                <h2>{{ trans('lang.footer_keyword_4') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="http://heraclee.com/fr/achat/details?id=1534249">
                                <h2>{{ trans('lang.footer_keyword_5') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="http://heraclee.com/fr/achat/details?id=1222557">
                                <h2>{{ trans('lang.footer_keyword_6') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="http://heraclee.com/fr/locations/details?id=1602428">
                                <h2>{{ trans('lang.footer_keyword_7') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="http://heraclee.com/fr/locations/details?id=1331038">
                                <h2>{{ trans('lang.footer_keyword_8') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="http://heraclee.com/fr/locations/details?id=1282330">
                                <h2>{{ trans('lang.footer_keyword_9') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="http://heraclee.com/fr/achat/details?id=1575973">
                                <h2>{{ trans('lang.footer_keyword_10') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="http://heraclee.com/fr/achat/details?id=1250786">
                                <h2>{{ trans('lang.footer_keyword_11') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>
                            <a href="http://heraclee.com/fr/achat/details?id=1222567">
                                <h2>{{ trans('lang.footer_keyword_12') }}</h2>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="bottom_footer_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 push-md-6 col-lg-4 push-lg-8">
                    <h4>{{ trans('lang.footer_title') }}</h4>
                    <div class="contact_block">
                        <a class="footer_logo_link" href="{{ route('index') }}"><img src="/img/logo.svg"></a>
                        <ul>
                            <li><a href="tel:+330494542001">+33 (0)4 94 54 20 01</a></li>
                            <li>44, Route des Plages<br>83990 Saint-Tropez</li>
                        </ul>
                    </div>
                    <form id = "newsletter" action="{{ route('newsletter') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="input_container light">
                            <input type="text" name = "email" id = "email" placeholder="{{ trans('lang.subscribe_to_newsletter') }}">
                            <button type="submit" class = "send-btn" id = "newsletter_submit"><i class="icn icon-send_message" aria-hidden="true"></i></button>
                        </div>
                    </form>
                    <div id="response"></div>
                </div>
                <div class="col-sm-12 col-md-6 pull-md-6 col-lg-8 pull-lg-4">
                    <h1>{!! trans('lang.footer_description') !!}</h1>

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
        {{--<li class="twitter"><a href="javascript: void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>--}}
        {{--<li class="linkedin"><a href="javascript: void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>--}}
        {{--<li class="facebook"><a href="javascript: void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>--}}
    </ul>
</footer>