<div class="col-12 col-sm-6 object_block_container">
    <div class="object_block">
        <div class="img_block">
            {{--<div class="activity_label">Loué</div>--}}
           {{-- @if(!empty($property['agreement']) && $property['agreement'] == 3)
            <div class="exclusive_label">Exclusif</div>
            @endif --}}

            @if(!empty($property['agreement']) && $property['agreement']['reference'] == 3)
                <div class="exclusive_label">{{ $property['agreement']['value'] }}</div>
            @endif

            @if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/virtual_tours/' . $property['property_id'] . '/property_' . $property['property_id'] . '.js'))
                <div class="virtual_tour_label_container">
                    <div class="virtual_tour_label">
                        <i class="icn icon-360"></i>
                    </div>
                </div>
            @endif

            @php
                $link = ($property['category']['reference'] == 1) || ($property['category']['reference'] == 4) || ($property['category']['reference'] == 5) || ($property['category']['reference'] == 6) ?  route('details') . '?id=' . $property['property_id'] : route('locationsDetails') . '?id=' . $property['property_id'];
                $comment_description = (isset($property['comments']['comment']) ? $property['comments']['comment'] : '');
                $comment_title = (isset($property['comments']['title']) ? $property['comments']['title'] : '');
            @endphp

            <div class="gallery_view">
                <ul class="gallery result_preview_gallery">
                    @if(!empty($property['pictures']))
                        @if($view_type == 'grid_view')
                            @php
                                $counter = 1;
                            @endphp
                            @foreach($property['pictures'] as $picture)
                                @if($counter == 1)
                                    <li>
                                        <a href="{{ $link }}">
                                            <img src="{{ $picture['url'] }}" alt="">
                                        </a>
                                    </li>
                                @endif
                                @php
                                    $counter++;
                                @endphp
                            @endforeach
                        @else
                            @foreach($property['pictures'] as $picture)
                                <li>
                                    <a href="{{ $link }}">
                                        <img src="{{ $picture['url'] }}" alt="">
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    @else
                        <a href="{{ $link }}">
                            <li class="no_image"><img src="/img/no_photo_570.svg" alt=""></li>
                        </a>
                    @endif
                </ul>
            </div>
        </div>

        <div class="info_block_container">
            <div class="info_block">
                <div class="title_container">
                    <a href="{{ $link }}">
                        <h2>{{$property['type']}}</h2>
                    </a>
                    <ul class="social_networks_share">
                        <li><a class="twitter-share-button" onclick="window.open($(this).attr('href'), 'Twitter', config='height=216, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://twitter.com/home?status={{ $comment_title }}+{{ $link }}"><i class="icn icon-twitter"></i></a></li>
                        <li><a class="linkedin-share-button" onclick="window.open($(this).attr('href'), 'Linkedin', config='height=560, width=500, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&url={{ $link }}&title={{ $comment_title }}&summary={{ $comment_description }}"><i class="icn icon-linked_in"></i></a></li>
                        <li><a class="fb-share-button" onclick="window.open($(this).attr('href'), 'Facebook', config='height=100, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://www.facebook.com/share.php?u={{ $link }}"><i class="icn icon-facebook"></i></a></li>
                    </ul>
                </div>
                <div class="description_container">
                    <h3>{{$property['city']}} {{ (!empty($property['district'])) ? ' / ' : '' }} {{ $property['district'] }}<span></span></h3>
                    <?php $comments = str_limit((isset($property['comments']['comment'])?$property['comments']['comment']:''),400); ?>
                    <p class="object_description">{{$comments}}</p>
                    <a href="#" class="btn dark_inverse" data-toggle="modal" data-target="#agencyContactModal">{{ trans('lang.contact_the_agent') }}</a>
                    <div class="object_price">{{$property['price_currency']}} {{ number_format($property['price'], 0, ' ', ' ') }}</div>

                    <!-- Agent Modal Popup -->
                    @include('includes.agent_contact_modal')
                </div>
                <div class="parameters_container">
                    <ul class="parameters">
                        @if(!empty($property['area_surface']))
                            <li>
                                <span class="property_container">
                                    <span class="icn_container tooltip" title="{{ trans('lang.living_space') }}"><i class="icn icon-area"></i></span>
                                    <span class="prop_val">{{$property['area_surface']}} m<sup>2</sup></span>
                                </span>
                            </li>
                        @endif
                        @if(!empty($property['rooms']))
                            <li>
                                <span class="property_container">
                                    <span class="icn_container tooltip" title="{{ trans('lang.number_of_pieces') }}"><i class="icn icon-rooms"></i></span>
                                    <span class="prop_val">{{$property['rooms']}}</span>
                                </span>
                            </li>
                        @endif
                        @if(!empty($property['bedrooms']))
                            <li>
                                <span class="property_container">
                                    <span class="icn_container tooltip" title="{{ trans('lang.number_of_rooms') }}"><i class="icn icon-bedroom"></i></span>
                                    <span class="prop_val">{{$property['bedrooms']}}</span>
                                </span>
                            </li>
                        @endif
                        @if(!empty($property['view']['type']))
                            <li>
                                <span class="property_container">
                                    <span class="icn_container tooltip" title="{{ trans('lang.view') }}"><i class="icn icon-window_view"></i></span>
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