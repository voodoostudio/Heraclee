@extends('layouts.master')
@section('title', 'Contact page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/contact.css">

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy3z5ZYvr8P0eXpKg8QhcqZU6yYg4Nl6k&libraries=drawing,places&language=en"></script>
@stop

@section('content')

    <section class="contact_info_section">
        <div class="container-fluid">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
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
                        <span>France</span>
                    </p>
                    <ul>
                        <li>Tel : +33 4 94 54 20 01</li>
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
                    <h2>Contactez-nous</h2>
                    <p>Pour toute demande d’information, n’hésitez pas à nous contacter via ce formulaire, nous vous répondrons dans les plus brefs délais :</p>
                    <form id = "contactForm" action="{{ route('contact.post') }}" class="contact_form" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-12 margin_bottom_20">
                                        <label class="form_el_label"><span>Nom *</span></label>
                                        <div class="input_container">
                                            <input type="text" id = "name" name = "name" placeholder="Nom">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-12 margin_bottom_20">
                                        <label class="form_el_label"><span>Phone</span></label>
                                        <div class="input_container">
                                            <input type="number" id = "phone" name = "phone" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-12 margin_bottom_10">
                                        <label class="form_el_label"><span>Couriel *</span></label>
                                        <div class="input_container">
                                            <input type="text" id = "email" name = "email" placeholder="Courriel">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="my_checkbox">
                                            <label>
                                                <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                                <span class="fake_checkbox"></span>
                                                <span class="my_checkbox_text">Abonnez-vous à la newsletter</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label class="form_el_label"><span>Message *</span></label>
                                <div class="input_container">
                                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                                </div>
                                <button class="btn" type="submit">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    <script type="text/javascript" src="/js/contact.js"></script>
@stop