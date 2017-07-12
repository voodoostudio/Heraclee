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
                        <li><a href="#"><i class="icn icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icn icon-linked_in"></i></a></li>
                        <li><a href="#"><i class="icn icon-facebook"></i></a></li>
                    </ul>
                </div>
                <div class="description_container">
                    <h3>{{$property['city']}} {{ (!empty($property['district'])) ? ' / ' : '' }} {{ $property['district'] }}<span></span></h3>
                    <?php $comments = str_limit((isset($property['comments']['comment'])?$property['comments']['comment']:''),400); ?>
                    <p class="object_description">{{$comments}}</p>
                    <a href="#" class="btn dark_inverse">Contactez l'agent</a>
                    <div class="object_price">{{$property['price_currency']}} {{ number_format($property['price'], 0, ' ', ' ') }}</div>
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