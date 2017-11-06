@extends('layouts.master')

@section('title', 'Details page')
@section('css')
@stop

@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')
    <section class="newsletters_section">
        <div class="container-fluid">
            <h1 class="no_results">{{ trans('lang.currently_no_results') }}</h1>
        </div>
    </section>
@endsection

@section('javascript')
@stop


