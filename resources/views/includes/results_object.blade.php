<div class="col-12 col-sm-6 object_block_container">
    <div class="object_block">
        <div class="img_block">
            {{--<div class="activity_label">Loué</div>--}}
            @if(!empty($property['agreement']) && $property['agreement'] == 3)
            <div class="exclusive_label">Exclusif</div>
            @endif
            <div class="gallery_view">
                <ul class="gallery result_preview_gallery">
                    @if(!empty($property['pictures']))
                    @foreach($property['pictures'] as $picture)
                            <li><img src="{{$picture['url']}}" alt=""></li>
                    @endforeach
                    @else
                        <li class="no_image"><img src="/img/no_photo_570.svg" alt=""></li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="info_block_container">
            <div class="info_block">
                <div class="title_container">
                    <a href="@if(($property['category']['reference'] == 1) || ($property['category']['reference'] == 4) || ($property['category']['reference'] == 5) || ($property['category']['reference'] == 6)){{ route('details') }}?id={{$property['property_id']}} @elseif(($property['category']['reference'] == 2) || ($property['category']['reference'] == 3)) {{ route('locationsDetails') }}?id={{$property['property_id']}} @endif">
                        <h2>{{$property['type']}}</h2>
                    </a>
                    <ul class="social_networks">

                        <li><a class="twitter-share-button" onclick="window.open($(this).attr('href'), 'Twitter', config='height=216, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://twitter.com/home?status={{ Illuminate\Support\Str::limit($property['comments']['comment'], 100) }}+{{ Request::fullUrl() }}"><i class="icn icon-twitter"></i></a></li>
                        <li><a class="linkedin-share-button" onclick="window.open($(this).attr('href'), 'Linkedin', config='height=560, width=500, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&url=@if(($property['category']['reference'] == 1) || ($property['category']['reference'] == 4) || ($property['category']['reference'] == 5) || ($property['category']['reference'] == 6)){{ route('details') }}?id={{$property['property_id']}} @elseif(($property['category']['reference'] == 2) || ($property['category']['reference'] == 3)) {{ route('locationsDetails') }}?id={{$property['property_id']}}@endif&title={{$property['comments']['comment']}}&summary={{$property['comments']['comment']}}"><i class="icn icon-linked_in"></i></a></li>
                        <li><a class="fb-share-button" onclick="window.open($(this).attr('href'), 'Facebook', config='height=100, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://www.facebook.com/share.php?u=@if(($property['category']['reference'] == 1) || ($property['category']['reference'] == 4) || ($property['category']['reference'] == 5) || ($property['category']['reference'] == 6)){{ route('details') }}?id={{$property['property_id']}} @elseif(($property['category']['reference'] == 2) || ($property['category']['reference'] == 3)) {{ route('locationsDetails') }}?id={{$property['property_id']}} @endif"><i class="icn icon-facebook"></i></a></li>
                    </ul>
                </div>
                <div class="description_container">
                    <h3>{{$property['city']}} {{ (!empty($property['district'])) ? ' / ' : '' }} {{ $property['district'] }}<span></span></h3>
                    <?php $comments = str_limit((isset($property['comments']['comment'])?$property['comments']['comment']:''),400); ?>
                    <p class="object_description">{{$comments}}</p>
                    <a href="#" class="btn dark_inverse" data-toggle="modal" data-target="#myModal">Contactez l'agent</a>
                    <div class="object_price">{{$property['price_currency']}} {{ number_format($property['price'], 0, ' ', ' ') }}</div>

                    <!-- Agent Modal Popup -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        @if(!empty($property['user']['picture']))
                                                            <img src="{{$property['user']['picture']}}" alt="">
                                                        @else
                                                            <img src="/img/details/no_agent_photo.svg" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="agent_info">
                                                        <p>Contact agent to visit</p>
                                                        <p class="agent_name">
                                                            {{$property['user']['firstname']}} {{$property['user']['lastname']}}
                                                        </p>
                                                        <ul>
                                                            @if(!empty($property['user']['phone']))
                                                                <li><a href="tel:{{$property['user']['phone']}}">{{$property['user']['phone']}}</a></li>
                                                            @endif
                                                            @if(!empty($property['user']['email']))
                                                                <li><a href="mailto:{{$property['user']['email']}}">{{$property['user']['email']}}</a></li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form id = "contactForm" action="{{ route('contact.post.agent') }}"  method="POST">
                                            {{ csrf_field() }}
                                            <input type = "hidden" name = "to" value="{{ $property['user']['email'] }}">
                                            <div class="row">
                                                <div class="col-md-6 margin_bottom_20">
                                                    <label class="form_el_label"><span>Nom *</span></label>
                                                    <div class="input_container">
                                                        <input type="text" name = "name" id = "name" placeholder="Nom">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 margin_bottom_20">
                                                    <label class="form_el_label"><span>Phone</span></label>
                                                    <div class="input_container">
                                                        <input type="text" name = "phone" id="phone" placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 margin_bottom_20">
                                                    <label class="form_el_label"><span>Couriel *</span></label>
                                                    <div class="input_container">
                                                        <input type="text" id = "email" name = "email" placeholder="Courriel">
                                                    </div>
                                                    <div class="my_checkbox margin_top_10">
                                                        <label>
                                                            <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                                            <span class="fake_checkbox"></span>
                                                            <span class="my_checkbox_text">Abonnez-vous à la newsletter</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 margin_bottom_20">
                                                    <label class="form_el_label"><span>Code postal</span></label>
                                                    <div class="input_container">
                                                        <input type="text" name = "post_code" id = "post_code" placeholder="Code postal">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
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
                        </div>
                    </div>
                </div>
                <div class="properties_container">
                    <ul class="properties">
                        @if(!empty($property['area_surface']))
                            <li>
                                <span class="property_container">
                                    <span class="icn_container tooltip" title="Surface habitable"><i class="icn icon-area"></i></span>
                                    <span class="prop_val">{{$property['area_surface']}} m<sup>2</sup></span>
                                </span>
                            </li>
                        @endif
                        @if(!empty($property['rooms']))
                            <li>
                                <span class="property_container">
                                    <span class="icn_container tooltip" title="Nombre de pièces"><i class="icn icon-rooms"></i></span>
                                    <span class="prop_val">{{$property['rooms']}}</span>
                                </span>
                            </li>
                        @endif
                        @if(!empty($property['bedrooms']))
                            <li>
                                <span class="property_container">
                                    <span class="icn_container tooltip" title="Nombre de chambres"><i class="icn icon-bedroom"></i></span>
                                    <span class="prop_val">{{$property['bedrooms']}}</span>
                                </span>
                            </li>
                        @endif
                        @if(!empty($property['view']['type']))
                            <li>
                                <span class="property_container">
                                    <span class="icn_container tooltip" title="Vue"><i class="icn icon-window_view"></i></span>
                                    <span class="prop_val">{{$property['view']['type']}}</span>
                                </span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>