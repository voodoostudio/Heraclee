<div class="modal fade" id="agencyContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="icn icon-cancel"></i>
                </button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="agent_info_block">
                                <div class="agent_img">
                                    {{--@if(!empty($property['user']['picture']))--}}
                                    {{--<img src="{{$property['user']['picture']}}" alt="">--}}
                                    {{--@else--}}
                                    {{--<img src="/img/details/no_agent_photo.svg" alt="">--}}
                                    {{--@endif--}}
                                    <img src="/img/logo.svg" alt="">
                                </div>
                                <div class="agent_info">
                                    <p>{{ trans('lang.contact_agent_to_visit') }}</p>
                                    <p class="agent_name">
                                        {{-- {{$property['user']['firstname']}} {{$property['user']['lastname']}}--}}
                                        <span class="img_bg_text">
                                            SAINT-TROPEZ
                                        </span>
                                    </p>
                                    <ul>
                                        {{--@if(!empty($property['user']['phone']))--}}
                                        {{--<li><a href="tel:{{$property['user']['phone']}}">{{$property['user']['phone']}}</a></li>--}}
                                        {{--@endif--}}
                                        {{--@if(!empty($property['user']['email']))--}}
                                        {{--<li><a href="mailto:{{$property['user']['email']}}">{{$property['user']['email']}}</a></li>--}}
                                        {{--@endif--}}

                                        <li><a href="tel:+33 (0)4 94 54 20 01">+33 (0)4 94 54 20 01</a></li>
                                        <li><a href="mailto:info@heraclee.com">info@heraclee.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="contactForm" action="{{ route('contact.post.agent') }}"  method="POST" novalidate>
                        {{ csrf_field() }}
                        {{--                        <input type = "hidden" name = "to" value="{{ $property['user']['email'] }}">--}}
                        <div class="row">
                            <div class="col-md-6 margin_bottom_20">
                                <label class="form_el_label"><span>{{ trans('lang.name') }} *</span></label>
                                <div class="input_container">
                                    <input type="text" name = "name" id="name" placeholder="{{ trans('lang.name') }}">
                                </div>
                            </div>
                            <div class="col-md-6 margin_bottom_20">
                                <label class="form_el_label"><span>{{ trans('lang.telephone') }} *</span></label>
                                <div class="input_container">
                                    <input type="text" name = "phone" id="phone" placeholder="{{ trans('lang.telephone')}}">
                                </div>
                            </div>
                            <div class="col-12 margin_bottom_20">
                                <label class="form_el_label"><span>{{ trans('lang.email')}} *</span></label>
                                <div class="input_container">
                                    <input type="text" id = "email" name="email" placeholder="{{ trans('lang.email')}}">
                                </div>
                                <div class="my_checkbox margin_top_10">
                                    <label>
                                        <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                        <span class="fake_checkbox"></span>
                                        <span class="my_checkbox_text">{{ trans('lang.sign_up_to_newsletter') }}</span>
                                    </label>
                                </div>
                            </div>
                            {{--<div class="col-md-6 margin_bottom_20">--}}
                            {{--<label class="form_el_label"><span>{{ trans('lang.postal_code') }}</span></label>--}}
                            {{--<div class="input_container">--}}
                            {{--<input type="text" name = "post_code" id = "post_code" placeholder="{{ trans('lang.postal_code') }}">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-12">
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
                    <div id="message-box"></div>
                </div>
            </div>
        </div>
    </div>
</div>