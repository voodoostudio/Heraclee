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
    <form id="search" action="/{{LaravelLocalization::getCurrentLocale()}}/locations/results{{ ((!empty($country[0]) && $country['0'] != 'fr') && (!empty($country[0]) && $country['0'] != 'en')) ? '/' . $country['0'] : '' }}" method="post" class="">
        {{ csrf_field() }}
        <div class="container-fluid">
            <div class="outer_block_container">
                <div class="inner_block_container minimized_extra_options">
                    <div class="reset_filters_btn">
                        <i class="fa fa-refresh" aria-hidden="true"></i>
                    </div>
                    <div class="">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <ul class="nav nav-tabs margin_bottom_10">
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link active" href="#" onclick="setSellType(3)" >{{ trans('lang.rent') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" class="nav-link" href="#" onclick="setSellType(1)" >{{ trans('lang.sale') }}</a>
                                    </li>
                                </ul>
                                <input type="hidden" id="sell_type_val" name="sell_type" value="3">
                            </div>

                            <div class="col-12 col-lg-8">
                                <div class="row">
                                    <div class="col-xl-4 col-sm-6 margin_bottom_10">
                                        <label class="form_el_label"><i class="icn icon-building"></i><span>{{ trans('lang.property_type') }}</span></label>
                                        {{--<select multiple="multiple" name="object_type[]" title="">--}}
                                        <select id="property_type_select" name="object_type[]" title="">
                                            {{--<option value="" selected disabled="disabled">{{ trans('lang.select_the_object_type') }}</option>--}}
                                            @foreach($type as $item)
                                                <option value="{{$item['reference']}}">{{$item['value']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @php
                                        foreach($city_list as $city) {
                                            $city_arr[$city['name']] = ['city_id' => $city['city_id'] , 'name' => $city['name']];
                                        }
                                        if($country[0] == 'france' || $country['0'] == 'fr' || $country['0'] == 'en' || $country['0'] == '') {
                                            /*$city_arr['Cavalaire-sur-Mer'] = ['city_id' => '11111', 'name' => 'Cavalaire-sur-Mer'];*/
                                            $city_arr['La Môle'] = ['city_id' => '13111', 'name' => 'La Môle'];
                                            $city_arr['Rayol-Canadel-sur-Mer'] = ['city_id' => '14111', 'name' => 'Rayol-Canadel-sur-Mer'];
                                        }
                                        if(!empty($city_arr)){
                                            ksort($city_arr);
                                        }
                                    @endphp
                                    <div class="col-xl-4 col-sm-6 margin_bottom_10">
                                        <label class="form_el_label"><i class="icn icon-country"></i><span>{{ trans('lang.town') }}</span></label>
                                        {{--<select multiple="multiple" name="object_place[]" title="">--}}
                                        <select id="cities_select" name="object_place[]" title="">
                                            {{--<option value="" selected disabled="disabled">{{ trans('lang.select_the_city') }}</option>--}}
                                            @if(!empty($city_arr))
                                                @foreach($city_arr as $city)
                                                    <option {{ ($city['city_id'] == '35970') ? 'selected' : '' }} value="{{$city['city_id']}}">{{$city['name']}}</option>
                                                @endforeach
                                            @else
                                                <option value="0" disabled="disabled"></option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-xl-4 col-sm-12 margin_bottom_10 minimizable">
                                        <div class="input_container search_input">
                                            <input type="text" name="search_keywords" value="" placeholder="{{ trans('lang.enter_keyword') }}">
                                            <button type="submit"><i class="icn icon-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row minimizable">
                            <div class="col-12 col-sm-6 col-lg-3 margin_bottom_10">
                                <label class="form_el_label"><i class="icn icon-price"></i><span>{{ trans('lang.price') }} min</span></label>
                                <div class="input_container">
                                    <input type="number" name="price_min" value="" placeholder="Min">
                                    <div class="input_label">&euro;</div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3 margin_bottom_10">
                                <label class="form_el_label"><i class="icn icon-price"></i><span>{{ trans('lang.price') }} max</span></label>
                                <div class="input_container">
                                    <input type="number" name="price_max" value="" placeholder="Max">
                                    <div class="input_label">&euro;</div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3 margin_bottom_10">
                                <label class="form_el_label"><i class="icn icon-area"></i><span>{{ trans('lang.surface') }} min</span></label>
                                <div class="input_container">
                                    <input type="number" name="surface_min" value="" placeholder="Min">
                                    <div class="input_label"><span>m<sup>2</sup></span></div>
                                </div>
                            </div>
                            {{--<div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">--}}
                            {{--<label class="form_el_label"><i class="icn icon-area"></i><span>{{ trans('lang.surface') }} max</span></label>--}}
                            {{--<div class="input_container">--}}
                            {{--<input type="number" name="surface_max" value="" placeholder="Max">--}}
                            {{--<div class="input_label"><span>m<sup>2</sup></span></div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-12 col-sm-6 col-lg-3 margin_bottom_10">
                                <label class="form_el_label"><i class="icn icon-bedroom"></i><span>{{ trans('lang.bedrooms') }} min</span></label>
                                <div class="input_container">
                                    <input type="number" name="bedrooms_min" value="" placeholder="Min">
                                </div>
                            </div>
                            {{--<div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">--}}
                            {{--<label class="form_el_label"><i class="icn icon-rooms"></i><span>{{ trans('lang.bedrooms') }} max</span></label>--}}
                            {{--<div class="input_container">--}}
                            {{--<input type="number" name="bedrooms_max" value="" placeholder="Max" >--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>
                        <div class="extra_search_options">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                                    <label class="form_el_label"><i class="icn icon-building"></i><span>{{ trans('lang.view') }}</span></label>
                                    <select id="view_select" name="object_view" title="">
                                        <option value="" {{ (!empty($_POST['object_view'])) ? 'selected disabled' : '' }}>{{ trans('lang.choose_view') }}</option>
                                        @foreach($view_list as $view)
                                            <option value="{{ $view['reference'] }}" {{ (!empty($_POST['object_view']) && $view['reference'] == $_POST['object_view']) ? 'selected' : '' }}>{{ $view['value'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                                    <label class="form_el_label"><i class="icn icon-building"></i><span>{{ trans('lang.standing') }}</span></label>
                                    <select id="standing_select" name="object_standing" title="">
                                        <option value="" {{ (!empty($_POST['object_standing'])) ? 'selected disabled' : '' }}>{{ trans('lang.choose_standing') }}</option>
                                        @foreach($standing_list as $standing)
                                            <option value="{{ $standing['reference'] }}" {{ (!empty($_POST['object_standing']) && $standing['reference'] == $_POST['object_standing']) ? 'selected' : '' }}>{{ $standing['value'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 margin_top_10">
                                    <label class="form_el_label"><span>{{ trans('lang.equipments') }}</span></label>
                                </div>
                                @foreach($equipments_list as $equipments)
                                    <div class="col-12 col-sm-6 col-md-4 col-xl-3 margin_bottom_10">
                                        <div class="my_checkbox">
                                            <label>
                                                <input type="checkbox" name="object_equipments[]" value="{{ $equipments['reference'] }}" {{ (isset($_POST['object_equipments']) && array_search($equipments['reference'], $_POST['object_equipments']) !== false) ? 'checked' : '' }}>
                                                <span class="fake_checkbox"></span>
                                                <span class="my_checkbox_text">{{ $equipments['value'] }}</span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="show_extra_options">
                                    <button type="button" class="more"><span class="img_bg_text">{{ trans('lang.more_options') }} <i class="icn icon-arrow_big_left"></i></span></button>
                                    <button type="button" class="less"><span class="img_bg_text">{{ trans('lang.less_options') }} <i class="icn icon-arrow_big_left"></i></span></button>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <button class="btn" id="submit_search_form">{{ trans('lang.search') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

@section('javascript_search')
    <script>
        $(document).ready(function () {
            $('a[onclick="setSellType(1)"]').click(function () {
                $('#search').attr('action', '/{{LaravelLocalization::getCurrentLocale()}}/achat/results{{ ((!empty($country[0]) && $country['0'] != 'fr') && (!empty($country[0]) && $country['0'] != 'en')) ? '/' . $country['0'] : '' }}')
            });
            $('a[onclick="setSellType(3)"]').click(function () {
                $('#search').attr('action', '/{{LaravelLocalization::getCurrentLocale()}}/locations/results{{ ((!empty($country[0]) && $country['0'] != 'fr') && (!empty($country[0]) && $country['0'] != 'en')) ? '/' . $country['0'] : '' }}')
            });
        });
    </script>
@stop
