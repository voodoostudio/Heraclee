@extends('layouts.master')
@section('title', 'Results page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/results.css">

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy3z5ZYvr8P0eXpKg8QhcqZU6yYg4Nl6k&libraries=drawing,places&language=en"></script>
@stop

@section('content')

    <section class="search_section">
        <div class="container-fluid">
            <div class="outer_block_container">
                <div class="inner_block_container">
                    <div class="row">
                        <div class="col-12 col-lg-4">
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
                                    <label class="form_el_label"><i class="icn icon-building"></i><span>Type de bien</span></label>
                                    <select multiple="multiple" name="object_type">
                                        <option value="House">House</option>
                                        <option value="Apartment">Apartment</option>
                                        <option value="Building plot">Building plot</option>
                                        <option value="Building">Building</option>
                                        <option value="Parking space">Parking space</option>
                                    </select>
                                </div>
                                <div class="col-xl-4 col-sm-6 margin_bottom_10">
                                    <label class="form_el_label"><i class="icn icon-country"></i><span>Commune</span></label>
                                    <select multiple="multiple" name="object_place">
                                        <option value="Geneva">Geneva</option>
                                        <option value="Bern">Bern</option>
                                        <option value="Zurich">Zurich</option>
                                        <option value="Paris">Paris</option>
                                    </select>
                                </div>
                                <div class="col-xl-4 col-sm-12 margin_bottom_10">
                                    <div class="input_container search_input">
                                        <input type="text" placeholder="Entrer un mot-clé">
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
                                <input type="text" placeholder="Min">
                                <div class="input_label">&euro;</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-price"></i><span>Prix max</span></label>
                            <div class="input_container">
                                <input type="text" placeholder="Max">
                                <div class="input_label">&euro;</div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-area"></i><span>Surface min</span></label>
                            <div class="input_container">
                                <input type="text" placeholder="Min">
                                <div class="input_label"><span>m<sup>2</sup></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-area"></i><span>Surface max</span></label>
                            <div class="input_container">
                                <input type="text" placeholder="Max">
                                <div class="input_label"><span>m<sup>2</sup></span></div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-rooms"></i><span>Chambres min</span></label>
                            <div class="input_container">
                                <input type="text" placeholder="Min">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4 col-xl-2 margin_bottom_10">
                            <label class="form_el_label"><i class="icn icon-rooms"></i><span>Chambres max</span></label>
                            <div class="input_container">
                                <input type="text" placeholder="Max">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                        <div class="col-12 col-sm-6 object_block_container">
                            <div class="object_block">
                                <div class="img_block">
                                    {{--<div class="activity_label">Loué</div>--}}
                                    {{--<div class="exclusive_label">Exclusif</div>--}}
                                    <div class="gallery_view">
                                        <ul class="gallery result_preview_gallery">
                                            @foreach($property['pictures'] as $picture)
                                                @if(!empty($picture['url']))
                                                <li><img src="{{$picture['url']}}" alt=""></li>
                                                @else
                                                    <li><img src="img/objects/object_3.png" alt=""></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="info_block_container">
                                    <div class="info_block">
                                        <div class="title_container">
                                            <a href="{{ route('details') }}"><h2>{{$property['type']}}</h2></a>
                                            <ul class="social_networks">
                                                <li><a href="#"><i class="icn icon-twitter"></i></a></li>
                                                <li><a href="#"><i class="icn icon-linked_in"></i></a></li>
                                                <li><a href="#"><i class="icn icon-facebook"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="description_container">
                                            <h3>{{$property['city']}} <span></span></h3>
                                            <p class="object_description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                            <a href="#" class="btn dark_inverse">Contactez l'agent</a>
                                            <div class="object_price">{{$property['price']['currency']}} {{$property['price']['value']}}</div>
                                        </div>
                                        <div class="properties_container">
                                            <ul class="properties">
                                                <li>
                                                    <span class="property_container">
                                                        <span class="icn_container tooltip" title="Surface habitable"><i class="icn icon-area"></i></span>
                                                        <span class="prop_val">300 m<sup>2</sup></span>
                                                    </span>
                                                </li>
                                                @if(!empty($property['rooms']))
                                                <li>
                                                    <span class="property_container">
                                                        <span class="icn_container tooltip" title="Nombre de chambres"><i class="icn icon-rooms"></i></span>
                                                        <span class="prop_val">{{$property['rooms']}}</span>
                                                    </span>
                                                </li>
                                                @endif
                                                @if(!empty($property['bedrooms']))
                                                <li>
                                                    <span class="property_container">
                                                        <span class="icn_container tooltip" title="Nombre de chambres"><i class="icn icon-bedroom"></i></span>
                                                        <span class="prop_val">{{$property['bedrooms']}}</span>
                                                    </span>
                                                </li>
                                                @endif
                                                @if(!empty($property['view']['type']))
                                                <li>
                                                    <span class="property_container">
                                                        <span class="icn_container tooltip" title="Dégagée Jardin Mer"><i class="icn icon-window_view"></i></span>
                                                        <span class="prop_val">{{$property['view']['type']}}</span>
                                                    </span>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="container-fluid">
                <nav>
                <ul class="pagination">
                    <li class="page-item">
                        <a href="#" class="page-link" aria-label="Previous">
                            {{--<span aria-hidden="true">«</span>--}}
                            <i class="icn icon-arrow_dropdown_left"></i>
                        </a>
                    </li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">6</a></li>
                    <li class="page-item">
                        <a href="#" class="page-link" aria-label="Next">
                            <i class="icn icon-arrow_dropdown_right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script type="text/javascript" src="/js/libraries/markerclusterer.js"></script>
    <script type="text/javascript" src="/js/results.js"></script>
@stop

