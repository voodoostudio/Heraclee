@extends('layouts.master')
@section('title', 'Contact page')
@section('css')
@stop

@section('content')
    <section class="page_title_section hidden-md-up">
        <div class="container-fluid">
            <h1>{{ trans('lang.virtual_tours') }}</h1>
        </div>
    </section>

    <section class="virtual_tours_section">
        <div class="container-fluid">
            <div class="row">
                @foreach($preview_tour as $key => $preview)
                    @php
                        $image = DB::table('apimo_pictures')
                        ->whereIn('picture_id', $preview)
                        ->get();
                    @endphp

                    {{--  ************************************  --}}
                    {{--  *           ДЛЯ ВАНИ               *  --}}
                    {{--  *   PROPERTY_ID - это у нас $key   *  --}}
                    {{--  ************************************  --}}

                    {{--{{ dump($key) }}--}}
                    @foreach($image as $item)
                        <div class="col-sm-6">
                            <div class="object_block">
                                <div class="img_block">
                                    <a href="@if($preview['sell_type'] == '3') /{{LaravelLocalization::getCurrentLocale()}}/locations/details?id={{$key}} @elseif($preview['sell_type'] == '1') /{{LaravelLocalization::getCurrentLocale()}}/achat/details?id={{$key}} @endif">
                                        <img src="{{ $item['url'] }}" alt="" style="width: 100%">
                                    </a>
                                </div>

                                <div class="info_block_container">
                                    <div class="info_block">
                                        <div class="title_container">
                                            <a href="@if($preview['sell_type'] == '3') /{{LaravelLocalization::getCurrentLocale()}}/locations/details?id={{$key}} @elseif($preview['sell_type'] == '1') /{{LaravelLocalization::getCurrentLocale()}}/achat/details?id={{$key}} @endif">
                                                <h2>{{ $preview['title'] }}</h2>
                                            </a>
                                        </div>
                                        <div class="description_container">
                                            <h3>{{ $preview['city'] }}<span></span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--<a href="@if($preview['sell_type'] == '3') /{{LaravelLocalization::getCurrentLocale()}}/locations/details?id={{$key}} @elseif($preview['sell_type'] == '1') /{{LaravelLocalization::getCurrentLocale()}}/achat/details?id={{$key}} @endif">--}}
                                {{--<img src="{{ $item['url'] }}" alt="" style="width: 100%">--}}
                            {{--</a>--}}
                        </div>
                    @endforeach
                @endforeach

            </div>
        </div>
    </section>

@endsection

@section('javascript')
@stop
