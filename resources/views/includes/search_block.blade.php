<section class="search_section">
    <form action="/results" method="post">
        {{ csrf_field() }}
        <div class="container-fluid">
            <div class="outer_block_container">
                <div class="inner_block_container">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            {{--<input type="text" name="property_type">--}}
                            <ul class="nav nav-tabs margin_bottom_10">
                                <li class="nav-item">
                                    <a data-toggle="tab" class="nav-link active" href="#">Location</a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" class="nav-link" href="#">Vente</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="row">
                                <div class="col-xl-4 col-sm-6 margin_bottom_10">
                                    <label class="form_el_label"><i
                                                class="icn icon-building"></i><span>Type de bien</span></label>
                                    <select multiple="multiple" name="object_type" title="">
                                        @foreach($type as $item)
                                            <option value="{{$item['reference']}}">{{$item['value']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-4 col-sm-6 margin_bottom_10">
                                    <label class="form_el_label"><i
                                                class="icn icon-country"></i><span>Commune</span></label>
                                    <select multiple="multiple" name="object_place" title="">
                                        @foreach($city_list as $city)
                                            <option value="{{$city['city_id']}}">{{$city['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-4 col-sm-12 margin_bottom_10">
                                    <div class="input_container search_input">
                                        <input type="text" name="search_keywords" placeholder="Entrer un mot-clé">
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
                                <input type="text" name="price_min" placeholder="Min">
                                <div class="input_label">&euro;</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-price"></i><span>Prix max</span></label>
                            <div class="input_container">
                                <input type="text" name="price_max" placeholder="Max">
                                <div class="input_label">&euro;</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-area"></i><span>Surface min</span></label>
                            <div class="input_container">
                                <input type="text" name="surface_min" placeholder="Min">
                                <div class="input_label"><span>m<sup>2</sup></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-area"></i><span>Surface max</span></label>
                            <div class="input_container">
                                <input type="text" name="surface_max" placeholder="Max">
                                <div class="input_label"><span>m<sup>2</sup></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-rooms"></i><span>Chambres min</span></label>
                            <div class="input_container">
                                <input type="text" name="bedrooms_min" placeholder="Min">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-rooms"></i><span>Chambres max</span></label>
                            <div class="input_container">
                                <input type="text" name="bedrooms_max" placeholder="Max">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
