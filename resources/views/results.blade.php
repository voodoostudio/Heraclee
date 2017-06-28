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
                            <li class="hidden-sm-down list_view_btn @if($view_type == 'list_view') active @endif"><i
                                        class="icn icon-list"></i>Liste
                            </li>
                            <li class="grid_view_btn  @if($view_type == 'grid_view') active @endif"><i
                                        class="icn icon-grid"></i>Grille ({{$count_items}})
                            </li>
                            <li class="map_view_btn @if($view_type == 'map_view') active @endif"><i
                                        class="icn icon-map"></i>Carte
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 offset-sm-6 col-sm-6 col-md-4 offset-md-0 col-lg-3 offset-lg-3 margin_bottom_10">
                    <select onchange="setItems()" id="sorting_type" type="submit" class="selectpicker"
                            name="sorting_type" title="">
                        <option value="10" @if($search['items'] == '10') selected @endif>10 résultats par page</option>
                        <option value="50" @if($search['items'] == '50') selected @endif>50 résultats par page</option>
                        <option value="100" @if($search['items'] == '100') selected @endif>100 résultats par page
                        </option>
                        <option value="1000" @if($search['items'] == '1000') selected @endif>Tout</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="results_container {{$view_type}} @if($view_type == 'map_view') hidden-sm-down  @endif">
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
    <script type="text/javascript">
        $(document).ready(function () {
            @if($view_type == 'list_view')
                listView_galleryInit();
            @endif
            @if($view_type == 'map_view')
                initResultsMap();
                resultsCarouselInit();
            @endif
        });
    </script>
@stop

