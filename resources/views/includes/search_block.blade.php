<section class="search_section">
    <form action="@if($search['sell_type'] == '3') ../locations/results @elseif($search['sell_type'] == '1') ../achat/results @endif" method="post">
        {{ csrf_field() }}
        <div class="container-fluid">
            <div class="outer_block_container">
                <div class="inner_block_container">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <ul class="nav nav-tabs margin_bottom_10">
                                <li class="nav-item">
                                    <a data-toggle="tab" class="nav-link @if(isset($search['sell_type']) && $search['sell_type'] == '1') active @endif" href="#" onclick="setSellType(1)" >Location</a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" class="nav-link @if(isset($search['sell_type']) && $search['sell_type'] == '3') active @endif" href="#" onclick="setSellType(3)" >Vente</a>
                                </li>
                            </ul>
                            <input type="hidden" id="sell_type_val" name="sell_type" value="{{$search['sell_type']}}">
                        </div>

                        <div class="col-12 col-lg-8">
                            <div class="row">
                                <div class="col-xl-4 col-sm-6 margin_bottom_10">
                                    <label class="form_el_label"><i
                                                class="icn icon-building"></i><span>Type de bien</span></label>
                                    <select multiple="multiple" name="object_type[]" title="">
                                        @foreach($type as $item)
                                            <option value="{{$item['reference']}}" @if(isset($search['object_type']) && array_search($item['reference'],$search['object_type']) !== false) selected @endif>{{$item['value']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-4 col-sm-6 margin_bottom_10">
                                    <label class="form_el_label"><i
                                                class="icn icon-country"></i><span>Commune</span></label>
                                    <select multiple="multiple" name="object_place[]" title="">
                                        @foreach($city_list as $city)
                                            <option value="{{$city['city_id']}}" @if(isset($search['object_place']) && array_search($city['city_id'],$search['object_place']) !== false) selected @endif>{{$city['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-4 col-sm-12 margin_bottom_10">
                                    <div class="input_container search_input">
                                        <input type="text" name="search_keywords" value="@if(isset($search['search_keywords'])){{$search['search_keywords']}}@endif" placeholder="Entrer un mot-clé">
                                        <button type="submit"><i class="icn icon-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-price"></i><span>Prix min</span></label>
                            <div class="input_container">
                                <input type="text" name="price_min" value="{{$search['price_min']}}" placeholder="Min">
                                <div class="input_label">&euro;</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-price"></i><span>Prix max</span></label>
                            <div class="input_container">
                                <input type="text" name="price_max" value="{{$search['price_max']}}" placeholder="Max">
                                <div class="input_label">&euro;</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-area"></i><span>Surface min</span></label>
                            <div class="input_container">
                                <input type="text" name="surface_min" value="{{$search['surface_min']}}" placeholder="Min">
                                <div class="input_label"><span>m<sup>2</sup></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-area"></i><span>Surface max</span></label>
                            <div class="input_container">
                                <input type="text" name="surface_max" value="{{$search['surface_max']}}" placeholder="Max">
                                <div class="input_label"><span>m<sup>2</sup></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-rooms"></i><span>Chambres min</span></label>
                            <div class="input_container">
                                <input type="text" name="bedrooms_min" value="{{$search['bedrooms_min']}}" placeholder="Min">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-rooms"></i><span>Chambres max</span></label>
                            <div class="input_container">
                                <input type="text" name="bedrooms_max" value="{{$search['bedrooms_max']}}" placeholder="Max">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>