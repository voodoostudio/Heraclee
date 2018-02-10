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

    <section class="results_section virtual_tours_section">
        <div class="results_container grid_view">
            <div class="container-fluid">
                <div class="row">
                    @foreach($preview_tour as $key => $preview)
                        @php
                            $image = DB::table('apimo_pictures')
                            ->whereIn('picture_id', $preview)
                            ->get();
                        @endphp

                        @foreach($image as $item)
                            <div class="col-sm-6 object_block_container reveal">
                                <div class="object_block">
                                    <div class="img_block">
                                        <a href="@if($preview['sell_type'] == '3') /{{LaravelLocalization::getCurrentLocale()}}/immobilier-location-{{ mb_strtolower(str_replace(" ", "-", $preview['subtype'])) }}-{{ mb_strtolower(str_replace(" ", "-", $preview['city'])) }}/{{$key}}?page=virtual @elseif($preview['sell_type'] == '1') /{{LaravelLocalization::getCurrentLocale()}}/immobilier-vente-{{ mb_strtolower(str_replace(" ", "-", $preview['subtype'])) }}-{{ mb_strtolower(str_replace(" ", "-", $preview['city'])) }}/{{$key}}?page=virtual @endif">
                                            <img src="{{ $item['url'] }}" alt="" style="width: 100%">
                                        </a>
                                    </div>
                                    <div class="info_block_container">
                                        <div class="info_block">
                                            <div class="title_container">
                                                <a href="@if($preview['sell_type'] == '3') /{{LaravelLocalization::getCurrentLocale()}}/immobilier-location-{{ mb_strtolower(str_replace(" ", "-", $preview['subtype'])) }}-{{ mb_strtolower(str_replace(" ", "-", $preview['city'])) }}/{{$key}}?page=virtual @elseif($preview['sell_type'] == '1') /{{LaravelLocalization::getCurrentLocale()}}/immobilier-vente-{{ mb_strtolower(str_replace(" ", "-", $preview['subtype'])) }}-{{ mb_strtolower(str_replace(" ", "-", $preview['city'])) }}/{{$key}}?page=virtual @endif">
                                                    <h2>{{ $preview['title'] }}</h2>
                                                </a>
                                            </div>
                                            <div class="description_container">
                                                <h3>{{ $preview['city'] }}<span></span></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                </div>
            </div>
        </div>

    </section>

@endsection

@section('javascript')
@stop
