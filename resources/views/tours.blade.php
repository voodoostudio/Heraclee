@extends('layouts.master')
@section('title', 'Contact page')
@section('css')
@stop

@section('content')
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
                        <div class="col-md-6 margin_bottom_20">
                            <div class="object_block">
                                <div class="img_block">
                                    <a href="{{ route('details-tour', $key) }}">
                                        <img src="{{ $item['url'] }}" alt="" style="width: 100%">
                                    </a>
                                </div>

                                {{--<div class="info_block_container">--}}
                                    {{--<div class="info_block">--}}
                                        {{--<div class="title_container">--}}
                                            {{--<a href="{{ route('details-tour', $key) }}">--}}
                                                {{--<h2>Title</h2>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                        {{--<div class="description_container">--}}
                                            {{--<h3>City<span></span></h3>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                            {{--<a href="{{ route('details-tour', $key) }}">--}}
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
