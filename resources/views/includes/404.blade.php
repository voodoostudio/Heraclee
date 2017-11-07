@extends('layouts.master')

@section('title', '404')
@section('css')
@stop

@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')
    <section class="newsletters_section">
        <div class="container-fluid">
            <h1 class="no_results">404 page not found</h1>
        </div>
    </section>
@endsection

@section('javascript')
@stop


