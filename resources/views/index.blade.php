@extends('layouts.master')
@section('title', 'Home page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/index.css">
@stop

@section('content')
    <section class="top_offer_section" style="background-image: url('/img/homepage_img.jpg')">
        <div class="info_block">
            <h1>Maison de standing</h1>
            <h3>Saint-tropez</h3>
            <a href="#" class="btn">Voir le bien</a>
        </div>
        <div class="gradient_bottom"></div>
    </section>

    @include('includes.search_block_index')


    <section class="results_section">
        <div class="results_container map_view">
            <div class="container-fluid">
                <div class="results_carousel row">
                    @foreach($properties as $property)
                        @if($property['step'] == 1)
                            @include('includes.results_object')
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
    <script src="/js/index.js"></script>
@stop
