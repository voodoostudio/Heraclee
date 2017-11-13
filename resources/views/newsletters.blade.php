@extends('layouts.master')

@section('title', 'Newsletter page')
@section('css')
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')
    <section class="page_title_section hidden-md-up">
        <div class="container-fluid">
            <h1>{{ trans('lang.newsletters') }}</h1>
        </div>
    </section>

    <section class="newsletters_section">
        <div class="container-fluid">
            <h1 class="no_results">{{ trans('lang.currently_no_results') }}</h1>
        </div>
    </section>
@endsection

@section('javascript')
@stop


