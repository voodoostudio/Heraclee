<section class="search_section">
    @php
        preg_match("/[^\/]+$/", $_SERVER["REQUEST_URI"], $country);
    @endphp
    <form action="@if($search['sell_type'] == '3') /{{LaravelLocalization::getCurrentLocale()}}/locations/results{{ ((!empty($country[0]) && $country['0'] != 'fr') && (!empty($country[0]) && $country['0'] != 'en')) ? '/' . $country['0'] : '' }} @elseif($search['sell_type'] == '1') /{{LaravelLocalization::getCurrentLocale()}}/achat/results{{ ((!empty($country[0]) && $country['0'] != 'fr') && (!empty($country[0]) && $country['0'] != 'en')) ? '/' . $country['0'] : '' }} @endif" method="post">
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
                                    <label class="form_el_label"><i
                                                class="icn icon-building"></i><span>{{ trans('lang.property_type') }}</span></label>
                                    <select multiple="multiple" name="object_type[]" title="">
                                        @foreach($type as $item)
                                            <option value="{{$item['reference']}}">{{$item['value']}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-4 col-sm-6 margin_bottom_10">
                                    <label class="form_el_label"><i
                                                class="icn icon-country"></i><span>{{ trans('lang.town') }}</span></label>
                                    <select multiple="multiple" name="object_place[]" title="">
                                        @foreach($city_list as $city)
                                            <option value="{{$city['city_id']}}">{{$city['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-4 col-sm-12 margin_bottom_10">
                                    <div class="input_container search_input">
                                        <input type="text" name="search_keywords" value="" placeholder="{{ trans('lang.enter_keyword') }}">
                                        <button type="submit"><i class="icn icon-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-price"></i><span>{{ trans('lang.price') }} min</span></label>
                            <div class="input_container">
                                <input type="text" name="price_min" value="" placeholder="Min">
                                <div class="input_label">&euro;</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-price"></i><span>{{ trans('lang.price') }} max</span></label>
                            <div class="input_container">
                                <input type="text" name="price_max" value="" placeholder="Max">
                                <div class="input_label">&euro;</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-area"></i><span>{{ trans('lang.surface') }} min</span></label>
                            <div class="input_container">
                                <input type="text" name="surface_min" value="" placeholder="Min">
                                <div class="input_label"><span>m<sup>2</sup></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-area"></i><span>{{ trans('lang.surface') }} max</span></label>
                            <div class="input_container">
                                <input type="text" name="surface_max" value="" placeholder="Max">
                                <div class="input_label"><span>m<sup>2</sup></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-rooms"></i><span>{{ trans('lang.bedrooms') }} min</span></label>
                            <div class="input_container">
                                <input type="text" name="bedrooms_min" value="" placeholder="Min">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-rooms"></i><span>{{ trans('lang.bedrooms') }} max</span></label>
                            <div class="input_container">
                                <input type="text" name="bedrooms_max" value="" placeholder="Max">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 margin_top_20">
                            <button class="btn" id="submit_search_form" style="float: right">{{ trans('lang.search') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
