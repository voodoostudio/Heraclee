@extends('layouts.master')

@section('title', 'Details page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/news.min.css">
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')
    <section class="newsletters_section">
        <div class="container-fluid">
            <h1 style="text-align: center; margin-top: 60px; font-size: 1.25rem;text-transform: uppercase;padding-bottom: 10px; border-bottom: 1px solid #ccac83">Actuellement aucune newsletter</h1>
        </div>
    </section>
@endsection

@section('javascript')
@stop


