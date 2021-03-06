@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp

<div class="col-12 col-sm-6 object_block_container">
    <div class="object_block">
        <div class="img_block">
            {{--<div class="activity_label">Loué</div>--}}
            {{-- @if(!empty($property['agreement']) && $property['agreement'] == 3)
             <div class="exclusive_label">Exclusif</div>
             @endif --}}

            @if(!empty($property['agreement']) && $property['agreement']['reference'] == 3)
                <div class="new_label">
                    <span class="exclusive">{{ $property['agreement']['value'] }}</span>
                </div>
                {{--<div class="exclusive_label_container">--}}
                {{--<div class="exclusive_label">{{ $property['agreement']['value'] }}</div>--}}
                {{--</div>--}}
            @endif


            @php
                $image = [];
                foreach($property['pictures'] as $picture) {
                    $image[$picture['rank']] = $picture['url'];
                }
                ksort($image);
            @endphp


            @if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/virtual_tours/' . $property['property_id'] . '/property_' . $property['property_id'] . '.js'))
                <div class="virtual_tour_label_container">
                    <div class="virtual_tour_label">
                        <i class="icn icon-360"></i>
                    </div>
                </div>
            @endif

            @php
                $date_created = new DateTime($property['created_at']);
                $date_updated = new DateTime($property['updated_at']);
                $now = new DateTime();
                $past = new DateTime('1970-01-01');
            @endphp

            {{--<ul class="creation_date">--}}
            {{--<li><b>{{ trans('lang.created_at') }}</b>  {{ date('d.m.Y', strtotime($property['created_at'])) }}</li>--}}
            {{--<li><b>{{ trans('lang.updated_at') }}</b>  {{ date('d.m.Y', strtotime($property['updated_at'])) }}</li>--}}
            {{--</ul>--}}

            @if($property['agreement']['reference'] != 3)
                @if($date_created->diff($now)->format("%m") < 3 && $date_created->diff($now)->format("%y") == 0 ||
                    $date_updated->diff(($date_created->diff($now)->format("%m") < 3 && $date_created->diff($now)->format("%y") == 0) ? $date_created : $past)->format("%m") < 3 &&
                    $date_updated->diff(($date_created->diff($now)->format("%m") < 3 && $date_created->diff($now)->format("%y") == 0) ? $date_created : $past)->format("%y") == 0
                    )
                    <div class="new_label">
                        @if($date_created->diff($now)->format("%m") < 3 && $date_created->diff($now)->format("%y") == 0)
                            <span>{{ trans('lang.new') }}</span>
                        @endif

                        @if($date_updated->diff(($date_created->diff($now)->format("%m") < 3 && $date_created->diff($now)->format("%y") == 0) ? $date_created : $past)->format("%m") < 3 &&
                            $date_updated->diff(($date_created->diff($now)->format("%m") < 3 && $date_created->diff($now)->format("%y") == 0) ? $date_created : $past)->format("%y") == 0
                            )
                            {{--<span class="updated">{{ trans('lang.updated') }}</span>--}}
                        @endif
                    </div>
                @endif
            @endif
            @php
                $link = ($property['category']['reference'] == 1) || ($property['category']['reference'] == 4) ||
                        ($property['category']['reference'] == 5) || ($property['category']['reference'] == 6) ?
                        route('details', [
                            'subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])),
                            'city' => mb_strtolower(str_replace(" ", "-", $property['city'])),
                            'id' => $property['property_id']
                        ]) . ((!empty($slider)) ? $slider : '') :
                        route('locationsDetails', [
                            'subtype' => mb_strtolower(str_replace(" ", "-", $property['subtype'])),
                            'city' => mb_strtolower(str_replace(" ", "-",$property['city'])),
                            'id' => $property['property_id']
                        ]) . ((!empty($slider)) ? $slider : '');

                $comment_description = (isset($property['comments']['comment']) ? $property['comments']['comment'] : '');
                $comment_title = (isset($property['comments']['title']) ? $property['comments']['title'] : '');
            @endphp

            <div class="gallery_view">
                <ul class="gallery result_preview_gallery" data-id = "{{ $property['property_id'] }}">
                    @if(!empty($property['pictures']))
                        @if($view_type == 'grid_view')
                            @php
                                $counter = 1;
                            @endphp
                            @foreach($image as $picture)
                                @if($counter == 1)
                                    <li>
                                        <a href="{{ $link }}">
                                            @if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false)
                                                <img src="{{ $picture }}" alt="">
                                            @endif
                                        </a>
                                    </li>
                                @endif
                                @php
                                    $counter++;
                                @endphp
                            @endforeach
                        @else
                            @foreach($image as $picture)
                                <li>
                                    <a href="{{ $link }}">
                                        @if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false)
                                            <img src="{{ $picture }}" alt="">
                                        @endif
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
                        {{--<li><a class="linkedin-share-button" onclick="window.open($(this).attr('href'), 'Linkedin', config='height=560, width=500, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&url={{ $link }}&title={{ $comment_title }}&summary={{ $comment_description }}"><i class="icn icon-linked_in"></i></a></li>--}}
                        <li><a class="fb-share-button" onclick="window.open($(this).attr('href'), 'Facebook', config='height=100, width=400, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no'); return false;" href="http://www.facebook.com/share.php?u={{ $link }}"><i class="icn icon-facebook"></i></a></li>
                    </ul>
                </div>
                <div class="description_container">
                    <h3>{{$property['city']}} {{ (!empty($property['district'])) ? ' / ' : '' }} {{ $property['district'] }}<span></span></h3>
                    <?php $comments = str_limit((isset($property['comments']['comment'])?$property['comments']['comment']:''),400); ?>
                    <p class="object_description">{{$comments}}</p>
                    <a href="#" class="btn dark_inverse" data-toggle="modal" data-target="#agencyContactModal">{{ trans('lang.contact_the_agent') }}</a>
                    @if($property['price'] != 0)
                        <div class="object_price">{{ number_format($property['price'], 0, ' ', ' ') }} {{ (($property['price_max']) != 0) ? ' - ' . number_format($property['price_max'], 0, ' ', ' ') : '' }} {!! ($property['price_currency'] == 'EUR') ? '€ <span class="tooltip" title="' . trans("lang.agency_fee_included") . '">' . trans("lang.afi") . '</span>' : '' !!} {!! (!empty($property['price_period'])) ? '<span> / '.$property['price_period'].'</span>' : '' !!}</div>
                    @else
                        <div class="object_price">{{ trans('lang.zero_price') }}</div>
                    @endif
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
                        {{--@if(!empty($property['view']['landscape']))--}}
                            {{--<li>--}}
                                {{--<span class="property_container">--}}
                                    {{--<span class="icn_container tooltip" title="{{ trans('lang.view') }}"><i class="icn icon-window_view"></i></span>--}}
                                    {{--<span class="prop_val">{{$property['view']['landscape']}}</span>--}}
                                {{--</span>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>