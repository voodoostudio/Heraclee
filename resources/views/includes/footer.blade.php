<footer>
    <section class="top_footer_section">
        <div class="container-fluid">
            <h3>{{ trans('lang.footer_title') }}</h3>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>Immobilier de luxe saint-tropez</li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>Location saint-tropez</li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>Vente immobilier saint-tropez</li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>Luxury real estate  saint-tropez</li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>Villas prestige saint-tropez</li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>Immobilier saint-tropez</li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>Immobilier golfe de saint-tropez</li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>Villas à vendre saint-tropez</li>
                    </ul>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <ul>
                        <li>Villas à louer saint-tropez</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="bottom_footer_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-8">
                    <p>{{ trans('lang.footer_description') }}</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <h4>{{ trans('lang.footer_title') }}</h4>
                    <div class="contact_block">
                        <a class="footer_logo_link" href="{{ route('index') }}"><img src="/img/logo.svg"></a>
                        <ul>
                            <li><a href="tel:+330494542001">+33 (0)4 94 54 20 01</a></li>
                            <li>44, Route des Plages<br>83990 Saint-Tropez</li>
                        </ul>
                    </div>
                    {{--<form id = "newsletter" action="{{ route('newsletter') }}" method="POST">--}}
                    <form id = "newsletter">
                        <div class="input_container light">
                            <input type="text" name = "email" id = "email" placeholder="{{ trans('lang.subscribe_to_newsletter') }}">
                            <button type="submit" class = "send-btn" id = "newsletter_submit"><i class="icn icon-send_message" aria-hidden="true"></i></button>
                        </div>
                        <div class = "message-send"></div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="copyright">© <?php echo date("Y"); ?> - {{ trans('lang.copyright_text') }}</p>
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