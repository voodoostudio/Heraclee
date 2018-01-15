@extends('admin.posts.layouts.master')

@section('title', 'Posts page')
@section('css')
    {{--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">--}}
@stop
@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp


@section('content')
    <body id="news_admin" class="preloader_active">
    @include('includes.header')
    <div class="preloader_container">
        <div class="preloader">
            <div class="cssload-loader">
                <div class="cssload-inner cssload-one"></div>
                <div class="cssload-inner cssload-two"></div>
                <div class="cssload-inner cssload-three"></div>
            </div>
        </div>
    </div>

    <main>
        <section class="subscribers_list_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="title_container">
                            <h1>List of subscribers</h1>
                            <a class="action_link" href="{{ URL::to($lang . '/admin') }}"><i class="icn icon-arrow_left"></i></a>
                            <a class="action_link add_new download" href="{{ URL::to($lang . '/admin/subscribers/get-csv') }}"><i class="icn icon-download"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="outer_block_container">
                            <div class="inner_block_container">
                                <table>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th align="right">Created date</th>
                                    </tr>
                                    @foreach($subscribers as $subscriber)
                                        <tr>
                                            <td>{{ $subscriber->id }}</td>
                                            <td>{{ $subscriber->email }}</td>
                                            <td>{{ date('d.m.Y', strtotime($subscriber->created_at)) }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endsection

    @section('javascript')
    @stop