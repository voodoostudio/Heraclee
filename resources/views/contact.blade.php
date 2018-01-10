@extends('layouts.master')
@section('title', 'Contact page')
<?php
$lang = LaravelLocalization::getCurrentLocale();
?>
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="{{asset('/css/contact.min.css')}}">--}}

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy3z5ZYvr8P0eXpKg8QhcqZU6yYg4Nl6k&libraries=drawing,places&language={{$lang}}"></script>
    <script src='https://www.google.com/recaptcha/api.js?hl={{$lang}}'></script>
    <style>
        .rc-anchor-light {
            background: transparent!important;
        }
    </style>
@stop

@section('content')
    <section class="page_title_section hidden-md-up">
        <div class="container-fluid">
            <h1>{{ trans('lang.contact') }}</h1>
        </div>
    </section>
    {{--<section class="contact_info_section">--}}
        {{--<div class="container-fluid">--}}
            {{--<p>{{ trans('lang.contact_page_description') }}</p>--}}
        {{--</div>--}}
    {{--</section>--}}
    <section class="contact_map_section">
        <div id="contact_map"></div>
        <div class="address_block">
            <div class="outer_block_container">
                <div class="inner_block_container">
                    <h3>Saint-Tropez</h3>
                    <p>
                        44, Route des Plages<br>
                        83990 Saint-Tropez<br>
                        <span>{{ trans('lang.france') }}</span>
                    </p>
                    <ul>
                        <li>{{ trans('lang.phone') }} : <a href="tel:+330494542001">+33 (0)4 94 54 20 01</a></li>
                        <li><a href="mailto:info@heraclee.com">info@heraclee.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="contact_form_section">
        <div class="container-fluid">
            <div class="outer_block_container">
                <div class="inner_block_container">
                    <h2>{{ trans('lang.contact_us') }}</h2>
                    <p>{{ trans('lang.contact_form_description') }}</p>
                    <div id="message-box"></div>
                    <form id = "contactForm" action="{{ route('contact.post') }}" class="contact_form" method="POST" novalidate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-12 margin_bottom_20">
                                        <label class="form_el_label"><span>{{ trans('lang.name') }} *</span></label>
                                        <div class="input_container">
                                            <input type="text" id="name" name="name" placeholder="{{ trans('lang.name') }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-12 margin_bottom_20">
                                        <label class="form_el_label"><span>{{ trans('lang.telephone') }} *</span></label>
                                        <div class="input_container">
                                            <input type="text" id="phone" name="phone" pattern="[+]+[0-9]" placeholder="{{ trans('lang.telephone') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 margin_bottom_10">
                                        <label class="form_el_label"><span>{{ trans('lang.email') }} *</span></label>
                                        <div class="input_container">
                                            <input type="text" id="email" name="email" placeholder="{{ trans('lang.email') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="my_checkbox">
                                            <label>
                                                <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                                <span class="fake_checkbox"></span>
                                                <span class="my_checkbox_text">{{ trans('lang.sign_up_to_newsletter') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label class="form_el_label"><span>{{ trans('lang.message') }} *</span></label>
                                <div class="input_container">
                                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}" data-theme="dark" ></div>
                                    </div>
                                </div>
                                <button class="btn" type="submit">{{ trans('lang.send') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    <script type="text/javascript" src="{{asset('/js/custom_scripts/contact.min.js')}}"></script>
@stop