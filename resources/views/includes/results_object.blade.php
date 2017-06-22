<div class="col-12 col-sm-6 object_block_container">
    <div class="object_block">
        <div class="img_block">
            {{--<div class="activity_label">Loué</div>--}}
            {{--<div class="exclusive_label">Exclusif</div>--}}
            <div class="gallery_view">
                <ul class="gallery result_preview_gallery">
                    @foreach($property['pictures'] as $picture)
                        @if(!empty($picture['url']))
                            <li><img src="{{$picture['url']}}" alt=""></li>
                        @else
                            <li><img src="img/objects/object_3.png" alt=""></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="info_block_container">
            <div class="info_block">
                <div class="title_container">
                    <a href="{{ route('details') }}?id={{$property['property_id']}}">
                        <h2>{{$property['type']}}</h2>
                    </a>
                    <ul class="social_networks">
                        <li><a href="#"><i class="icn icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icn icon-linked_in"></i></a></li>
                        <li><a href="#"><i class="icn icon-facebook"></i></a></li>
                    </ul>
                </div>
                <div class="description_container">
                    <h3>{{$property['city']}} <span></span></h3>
                    <?php $comments = str_limit($property['comments']['comment'],75); ?>
                    <p class="object_description">{{$comments}}</p>
                    <a href="#" class="btn dark_inverse">Contactez l'agent</a>
                    <div class="object_price">{{$property['price']['currency']}} {{$property['price']['value']}}</div>
                </div>
                <div class="properties_container">
                    <ul class="properties">
                        <li>
                            <span class="property_container">
                                <span class="icn_container tooltip" title="Surface habitable"><i class="icn icon-area"></i></span>
                                <span class="prop_val">300 m<sup>2</sup></span>
                            </span>
                        </li>
                        @if(!empty($property['rooms']))
                            <li>
                                <span class="property_container">
                                    <span class="icn_container tooltip" title="Nombre de chambres"><i class="icn icon-rooms"></i></span>
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
                                    <span class="icn_container tooltip" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span>
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