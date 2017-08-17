@extends('layouts.master')
@section('title', 'Contact page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/contact.min.css">

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy3z5ZYvr8P0eXpKg8QhcqZU6yYg4Nl6k&libraries=drawing,places&language=en"></script>
@stop

@section('content')

    <section class="contact_info_section">
        <div class="container-fluid">
            <p>{{ trans('lang.contact_page_description') }}</p>
        </div>
    </section>
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
                        <li><a href="mailto:agence@heraclee.com">agence@heraclee.com</a></li>
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
                    <form id = "contactForm" action="{{ route('contact.post') }}" class="contact_form" method="POST" novalidate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-12 margin_bottom_20">
                                        <label class="form_el_label"><span>{{ trans('lang.name') }} *</span></label>
                                        <div class="input_container">
                                            <input type="text" id = "name" name = "name" placeholder="{{ trans('lang.name') }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-12 margin_bottom_20">
                                        <label class="form_el_label"><span>{{ trans('lang.telephone') }}</span></label>
                                        <div class="input_container">
                                            <input type="number" id = "phone" name = "phone" placeholder="{{ trans('lang.telephone') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 margin_bottom_10">
                                        <label class="form_el_label"><span>{{ trans('lang.email') }} *</span></label>
                                        <div class="input_container">
                                            <input type="text" id = "email" name = "email" placeholder="{{ trans('lang.email') }}">
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
                                <button class="btn" type="submit">{{ trans('lang.send') }}</button>
                            </div>
                        </div>
                    </form>
                    <div id="message-box"></div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    <script type="text/javascript" src="/js/contact.min.js"></script>
@stop