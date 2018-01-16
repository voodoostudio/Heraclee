<section class="search_section">
    @php
        $country = [];
        preg_match("/[^\/]+$/", $_SERVER["REQUEST_URI"], $matches);
        $check = isset($matches[0]) ? $matches[0] : false;

        if( stristr($check, '?') == true) {
            $country[] = stristr($check, '?', true);
        } else {
            $country[] = $check;
        }
    @endphp
    <form action="@if($search['sell_type'] == '3') /{{LaravelLocalization::getCurrentLocale()}}/locations/results{{ (!empty($country[0]) && $country['0'] != 'results') ? '/' . $country['0'] : '' }} @elseif($search['sell_type'] == '1') /{{LaravelLocalization::getCurrentLocale()}}/achat/results{{ (!empty($country[0]) && $country['0'] != 'results') ? '/' . $country['0'] : '' }} @endif" method="post">
        {{ csrf_field() }}
        <div class="container-fluid">
            <div class="outer_block_container">
                <div class="inner_block_container">
                    <div class="reset_filters_btn">
                        <i class="fa fa-refresh" aria-hidden="true"></i>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <ul class="nav nav-tabs margin_bottom_10">
                                <li class="nav-item">
                                    <a data-toggle="tab" class="nav-link @if(isset($search['sell_type']) && $search['sell_type'] == '3') active @endif" href="#" onclick="setSellType(3)" >{{ trans('lang.rent') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" class="nav-link @if(isset($search['sell_type']) && $search['sell_type'] == '1') active @endif" href="#" onclick="setSellType(1)" >{{ trans('lang.sale') }}</a>
                                </li>
                            </ul>
                            <input type="hidden" id="sell_type_val" name="sell_type" value="{{$search['sell_type']}}">
                        </div>

                        <div class="col-12 col-lg-8">
                            <div class="row">
                                <div class="col-xl-4 col-sm-6 margin_bottom_10">
                                    <label class="form_el_label"><i class="icn icon-building"></i><span>{{ trans('lang.property_type') }}</span></label>
                                    {{--<select id="prop_type_select" multiple="multiple" name="object_type[]" title="">--}}
                                    <select id="property_type_select" name="object_type[]" title="">
{{--                                        <option value="" selected disabled="disabled">{{ trans('lang.select_the_object_type') }}</option>--}}
                                        @if(empty($_POST['search_keywords']))
                                            @foreach($type as $item)
                                                <option value="{{$item['reference']}}" @if(isset($search['object_type']) && array_search($item['reference'],$search['object_type']) !== false) selected @endif>{{$item['value']}}</option>
                                            @endforeach
                                        @else
                                            @foreach($type as $item)
                                                <option value="{{$item['reference']}}" {{ ($item['reference'] == '2') ? 'selected' : '' }} >{{$item['value']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                @php
                                    foreach($city_list as $city) {
                                        $city_arr[$city['name']] = ['city_id' => $city['city_id'] , 'name' => $city['name']];
                                    }
                                    if($country[0] == 'france' || $country['0'] == 'results') {
                                       /* $city_arr['Cavalaire-sur-Mer'] = ['city_id' => '11111', 'name' => 'Cavalaire-sur-Mer'];*/
                                        $city_arr['La Môle'] = ['city_id' => '13111', 'name' => 'La Môle'];
                                        $city_arr['Rayol-Canadel-sur-Mer'] = ['city_id' => '14111', 'name' => 'Rayol-Canadel-sur-Mer'];
                                    }
                                    if(isset($city_arr)){
                                        ksort($city_arr);
                                    }
                                @endphp
                                <div class="col-xl-4 col-sm-6 margin_bottom_10">
                                    <label class="form_el_label"><i class="icn icon-country"></i><span>{{ trans('lang.town') }}</span></label>
                                    {{--<select multiple="multiple" name="object_place[]" title="">--}}
                                    <select id="cities_select" name="object_place[]" title="">
{{--                                        <option value="" selected disabled="disabled">{{ trans('lang.select_the_city') }}</option>--}}
                                        @if(empty($_POST['search_keywords']))
                                            @if(!empty($city_arr))
                                                @foreach($city_arr as $city)
                                                    <option value="{{$city['city_id']}}" @if(isset($search['object_place']) && array_search($city['city_id'],$search['object_place']) !== false) selected @endif>{{$city['name']}}</option>
                                                @endforeach
                                            @else
                                                <option value="0" disabled="disabled"></option>
                                            @endif
                                        @else
                                            @foreach($city_arr as $city)
                                                <option value="{{$city['city_id']}}" {{ ($city['city_id'] == '35970') ? 'selected' : '' }} >{{$city['name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-xl-4 col-sm-12 margin_bottom_10 minimizable">
                                    <div class="input_container search_input">
                                        <input type="text" name="search_keywords" value="@if(isset($search['search_keywords'])){{$search['search_keywords']}}@endif" placeholder="{{ trans('lang.enter_keyword') }}">
                                        <button type="submit"><i class="icn icon-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row minimizable">
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-price"></i><span>{{ trans('lang.price') }} min</span></label>
                            <div class="input_container">
                                <input type="number" name="price_min" value="{{$search['price_min']}}" placeholder="Min">
                                <div class="input_label">&euro;</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-price"></i><span>{{ trans('lang.price') }} max</span></label>
                            <div class="input_container">
                                <input type="number" name="price_max" value="{{$search['price_max']}}" placeholder="Max">
                                <div class="input_label">&euro;</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-area"></i><span>{{ trans('lang.surface') }} min</span></label>
                            <div class="input_container">
                                <input type="number" name="surface_min" value="{{$search['surface_min']}}" placeholder="Min">
                                <div class="input_label"><span>m<sup>2</sup></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-area"></i><span>{{ trans('lang.surface') }} max</span></label>
                            <div class="input_container">
                                <input type="number" name="surface_max" value="{{$search['surface_max']}}" placeholder="Max">
                                <div class="input_label"><span>m<sup>2</sup></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-bedroom"></i><span>{{ trans('lang.bedrooms') }} min</span></label>
                            <div class="input_container">
                                <input type="number" name="bedrooms_min" value="{{$search['bedrooms_min']}}" placeholder="Min">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-bedroom"></i><span>{{ trans('lang.bedrooms') }} max</span></label>
                            <div class="input_container">
                                <input type="number" name="bedrooms_max" value="{{ $search['bedrooms_max'] }}" placeholder="Max">
                            </div>
                        </div>
                    </div>


                    <div class="row margin_top_30">
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-building"></i><span>{{ trans('lang.view') }}</span></label>
                            <select id="property_type_select" name="object_type[]" title="">
                                <option value="1">Sea</option>
                                <option value="2">Forrest</option>
                                <option value="3">Land</option>
                                <option value="4">Country</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-building"></i><span>{{ trans('lang.standing') }}</span></label>
                            <select id="property_type_select" name="object_type[]" title="">
                                <option value="1">Luxe</option>
                                <option value="2">Normal</option>
                                <option value="3">Saray</option>
                                <option value="4">Jopa</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 margin_top_10">
                            <label class="form_el_label"><span>{{ trans('lang.equipments') }}</span></label>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                            <div class="my_checkbox">
                                <label>
                                    <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                    <span class="fake_checkbox"></span>
                                    <span class="my_checkbox_text">Lorem ipsum dolor sit amet</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                            <div class="my_checkbox">
                                <label>
                                    <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                    <span class="fake_checkbox"></span>
                                    <span class="my_checkbox_text">Lorem ipsum dolor sit amet</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                            <div class="my_checkbox">
                                <label>
                                    <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                    <span class="fake_checkbox"></span>
                                    <span class="my_checkbox_text">Lorem ipsum dolor sit amet</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                            <div class="my_checkbox">
                                <label>
                                    <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                    <span class="fake_checkbox"></span>
                                    <span class="my_checkbox_text">Lorem ipsum dolor sit amet</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 margin_top_10">
                            <label class="form_el_label"><span>{{ trans('lang.outdoor_spaces') }}</span></label>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                            <div class="my_checkbox">
                                <label>
                                    <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                    <span class="fake_checkbox"></span>
                                    <span class="my_checkbox_text">Lorem ipsum dolor sit amet</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                            <div class="my_checkbox">
                                <label>
                                    <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                    <span class="fake_checkbox"></span>
                                    <span class="my_checkbox_text">Lorem ipsum dolor sit amet</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                            <div class="my_checkbox">
                                <label>
                                    <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                    <span class="fake_checkbox"></span>
                                    <span class="my_checkbox_text">Lorem ipsum dolor sit amet</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                            <div class="my_checkbox">
                                <label>
                                    <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                    <span class="fake_checkbox"></span>
                                    <span class="my_checkbox_text">Lorem ipsum dolor sit amet</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 margin_top_10">
                            <label class="form_el_label"><span>{{ trans('lang.security') }}</span></label>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                            <div class="my_checkbox">
                                <label>
                                    <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                    <span class="fake_checkbox"></span>
                                    <span class="my_checkbox_text">Lorem ipsum dolor sit amet</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                            <div class="my_checkbox">
                                <label>
                                    <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                    <span class="fake_checkbox"></span>
                                    <span class="my_checkbox_text">Lorem ipsum dolor sit amet</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                            <div class="my_checkbox">
                                <label>
                                    <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                    <span class="fake_checkbox"></span>
                                    <span class="my_checkbox_text">Lorem ipsum dolor sit amet</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                            <div class="my_checkbox">
                                <label>
                                    <input required="" type="checkbox" name="subscribe" id = "subscribe" value="true">
                                    <span class="fake_checkbox"></span>
                                    <span class="my_checkbox_text">Lorem ipsum dolor sit amet</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 hidden-sm-up">
                            <div class="show_options">
                                <button type="button" class="more">{{ trans('lang.more_options') }} <i class="icn icon-arrow_big_left"></i></button>
                                <button type="button" class="less">{{ trans('lang.less_options') }} <i class="icn icon-arrow_big_left"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn" id="submit_search_form">{{ trans('lang.search') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
