@extends('layouts.master')
@section('title', 'Results page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/results.css">

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy3z5ZYvr8P0eXpKg8QhcqZU6yYg4Nl6k&libraries=drawing,places&language=en"></script>
@stop

@section('content')

    @include('includes.search_block')

    <section class="results_section">
        <div class="container-fluid">
            <h1>Votre recherche immobiliére</h1>
            <div class="row">
                <div class="col-xs-12 col-md-8 col-lg-6 margin_bottom_10">
                    <div class="view_type_container">
                        <ul class="view_type">
                            <li class="hidden-sm-down list_view_btn"><i class="icn icon-list"></i>Liste</li>
                            <li class="grid_view_btn active"><i class="icn icon-grid"></i>Grille (311)</li>
                            <li class="map_view_btn"><i class="icn icon-map"></i>Carte</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 offset-sm-6 col-sm-6 col-md-4 offset-md-0 col-lg-3 offset-lg-3 margin_bottom_10">
                    <select class="selectpicker" name="sorting_type">
                        <option value="1">10 résultats par page</option>
                        <option value="2">50 résultats par page</option>
                        <option value="3">100 résultats par page</option>
                        <option value="0">Tout</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="results_container grid_view">
            <div id="results_map"></div>
            <div class="container-fluid">
                <div class="results_carousel row">
                    @foreach($properties as $property)
                        @include('includes.results_object')
                    @endforeach
                </div>
            </div>

            @include('includes.pagination')
        </div>
    </section>
@endsection

@section('javascript')
    <script type="text/javascript" src="/js/libraries/markerclusterer.js"></script>
    <script type="text/javascript" src="/js/results.js"></script>
@stop

