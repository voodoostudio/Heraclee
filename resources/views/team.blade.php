@extends('layouts.master')
@section('title', 'Team page')
@section('css')
    {{--<link rel="stylesheet" type="text/css" href="{{asset('/css/team.min.css')}}">--}}
@stop

@section('content')

    <section class="team_info_section">
        <div class="container-fluid">
            <h2>{{ trans('lang.team_page_title') }}</h2>
            <p>{{ trans('lang.team_page_description') }}</p>
        </div>
    </section>

    <section class="team_members_section reveal">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <div class="row">
                                <div class="col-12 col-sm-5 col-md-5 col-lg-6">
                                    <div class="img_container">
                                        <img src="/img/team/team_1.png" alt="Heraclee team member">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-7 col-md-7 col-lg-6">
                                    <div class="info_container">
                                        <h4>Name Surname</h4>
                                        <ul>
                                            <li><a href="tel:330000000000">+33 0000 000 000</a></li>
                                            <li><a href="mailto:email@mailserver.com">email@mailserver.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 margin_top_20">
                                    <div class="btn_container">
                                        <a href="mailto:email@mailserver.com" class="btn">{{ trans('lang.send_me_message') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-5 col-lg-6">
                                    <div class="img_container">
                                        <img src="/img/team/team_2.png" alt="Heraclee team member">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-7 col-lg-6">
                                    <div class="info_container">
                                        <h4>Name Surname</h4>
                                        <ul>
                                            <li><a href="tel:330000000000">+33 0000 000 000</a></li>
                                            <li><a href="mailto:email@mailserver.com">email@mailserver.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 margin_top_20">
                                    <div class="btn_container">
                                        <a href="mailto:email@mailserver.com" class="btn">{{ trans('lang.send_me_message') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-5 col-lg-6">
                                    <div class="img_container">
                                        <img src="/img/team/team_3_act.png" alt="Heraclee team member">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-7 col-lg-6">
                                    <div class="info_container">
                                        <h4>Name Surname</h4>
                                        <ul>
                                            <li><a href="tel:330000000000">+33 0000 000 000</a></li>
                                            <li><a href="mailto:email@mailserver.com">email@mailserver.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 margin_top_20">
                                    <div class="btn_container">
                                        <a href="mailto:email@mailserver.com" class="btn">{{ trans('lang.send_me_message') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-5 col-lg-6">
                                    <div class="img_container">
                                        <img src="/img/team/team_4.png" alt="Heraclee team member">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-7 col-lg-6">
                                    <div class="info_container">
                                        <h4>Name Surname</h4>
                                        <ul>
                                            <li><a href="tel:330000000000">+33 0000 000 000</a></li>
                                            <li><a href="mailto:email@mailserver.com">email@mailserver.com</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 margin_top_20">
                                    <div class="btn_container">
                                        <a href="mailto:email@mailserver.com" class="btn">{{ trans('lang.send_me_message') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')
@stop