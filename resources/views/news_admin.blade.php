@extends('layouts.master')

@section('title', 'Details page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/news.min.css">
    <link rel="stylesheet" type="text/css" href="/css/libraries/dropzone.min.css">
    <link href="http://code.gijgo.com/1.5.1/css/gijgo.css" rel="stylesheet" type="text/css" />
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')
    <section class="news_admin_nav_section">
        <div class="container-fluid">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#list_of_articles" role="tab" data-toggle="tab">List of articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#categories" role="tab" data-toggle="tab">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#edit_article" role="tab" data-toggle="tab">New article</a>
                </li>
            </ul>
        </div>
    </section>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in show active" id="list_of_articles">
            <section class="news_list_section">
                <div class="container-fluid">
                    <div class="row">
                <div class="col-xs-12 col-xl-6">
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <button class="edit_btn"><i class="icn icon-pencil"></i></button>
                            <button class="remove_btn"><i class="icn icon-cancel"></i></button>
                            <div class="article_info_block">
                                <div class="article_img">
                                    <a href="{{ route('news_details') }}">
                                        <img src="/img/details/no_agent_photo.svg" alt="">
                                    </a>
                                </div>
                                <div class="article_info">
                                    <a href="{{ route('news_details') }}"><h2>News title</h2></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum nisi sed sem aliquam fringilla eget non metus. Nulla consectetur a ipsum id faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-xl-6">
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <button class="edit_btn"><i class="icn icon-pencil"></i></button>
                            <button class="remove_btn"><i class="icn icon-cancel"></i></button>
                            <div class="article_info_block">
                                <div class="article_img">
                                    <a href="{{ route('news_details') }}">
                                        <img src="/img/details/no_agent_photo.svg" alt="">
                                    </a>
                                </div>
                                <div class="article_info">
                                    <a href="{{ route('news_details') }}"><h2>News title</h2></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum nisi sed sem aliquam fringilla eget non metus. Nulla consectetur a ipsum id faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-xl-6">
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <button class="edit_btn"><i class="icn icon-pencil"></i></button>
                            <button class="remove_btn"><i class="icn icon-cancel"></i></button>
                            <div class="article_info_block">
                                <div class="article_img">
                                    <a href="{{ route('news_details') }}">
                                        <img src="/img/details/no_agent_photo.svg" alt="">
                                    </a>
                                </div>
                                <div class="article_info">
                                    <a href="{{ route('news_details') }}"><h2>News title</h2></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum nisi sed sem aliquam fringilla eget non metus. Nulla consectetur a ipsum id faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-xl-6">
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <button class="edit_btn"><i class="icn icon-pencil"></i></button>
                            <button class="remove_btn"><i class="icn icon-cancel"></i></button>
                            <div class="article_info_block">
                                <div class="article_img">
                                    <a href="{{ route('news_details') }}">
                                        <img src="/img/details/no_agent_photo.svg" alt="">
                                    </a>
                                </div>
                                <div class="article_info">
                                    <a href="{{ route('news_details') }}"><h2>News title</h2></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum nisi sed sem aliquam fringilla eget non metus. Nulla consectetur a ipsum id faucibus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </section>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="categories">
            <section class="news_categories_section">
                <div class="container-fluid">
                    <div class="outer_block_container">
                <div class="inner_block_container">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <h1>Existing categories</h1>
                            <ul>
                                <li><span>Category name 1</span><button class="remove_btn"><i class="icn icon-cancel"></i></button></li>
                                <li><span>Category name 2</span><button class="remove_btn"><i class="icn icon-cancel"></i></button></li>
                                <li><span>Category name 3</span><button class="remove_btn"><i class="icn icon-cancel"></i></button></li>
                                <li><span>Category name 4</span><button class="remove_btn"><i class="icn icon-cancel"></i></button></li>
                                <li><span>Category name 5</span><button class="remove_btn"><i class="icn icon-cancel"></i></button></li>
                                <li><span>Category name 6</span><button class="remove_btn"><i class="icn icon-cancel"></i></button></li>
                            </ul>
                        </div>
                        <div class="col-md-6 margin_bottom_20">
                            <h1>Add new category</h1>
                            <form action="">
                                <label class="form_el_label">
                                    <span>Category name *</span>
                                </label>
                                <div class="input_container">
                                    <input type="text" name="name" id="name" placeholder="Name" required>
                                </div>
                                <button class="btn" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </section>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="edit_article">
            <section class="news_list_section">
                <div class="container-fluid">
                    <div class="outer_block_container">
                        <div class="inner_block_container">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-12 margin_bottom_20">
                                                <label class="form_el_label"><span>Title *</span></label>
                                                <div class="input_container">
                                                    <input type="text" name="title" id="title" placeholder="Title">
                                                </div>
                                            </div>
                                            <div class="col-12 margin_bottom_20">
                                                <label class="form_el_label"><span>Category</span></label>
                                                <select name="news_category" title="">
                                                    <option value="0">Category name 1</option>
                                                    <option value="1">Category name 2</option>
                                                    <option value="2">Category name 3</option>
                                                    <option value="3">Category name 4</option>
                                                    <option value="4">Category name 5</option>
                                                    <option value="5">Category name 6</option>
                                                    <option value="6">Category name 7</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="dropzone dz-clickable" id="article_img_dropzone">
                                            <div class="dz-default dz-message" data-dz-message="">
                                                <span>Drop article image here to upload</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 margin_bottom_20">
                                        <label class="form_el_label"><span>Posting date</span></label>
                                        <div class="input_container">
                                            <input type="date" name="date" id="date" placeholder="Posting date">
                                            {{--<input id="datepicker" width="100%" />--}}
                                        </div>
                                        {{--<div class="form-group">--}}
                                            {{--<div class='input-group date' id='datetimepicker1'>--}}
                                                {{--<input type='text' class="form-control" />--}}
                                                {{--<span class="input-group-addon">--}}
                                                    {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                                                {{--</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="col-md-6 margin_bottom_20">
                                        <label class="form_el_label"><span>URL to origin source</span></label>
                                        <div class="input_container">
                                            <input type="text" name="url" id="url" placeholder="URL">
                                        </div>
                                    </div>
                                    <div class="col-md-12 margin_bottom_20">
                                        <label class="form_el_label"><span>Text *</span></label>
                                        <div class="input_container">
                                            <textarea name="text_content" id="text_content" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="/js/libraries/dropzone.min.js"></script>
    {{--<script type="text/javascript" src="/js/libraries/moment.min.js"></script>--}}
    {{--<script type="text/javascript" src="/js/libraries/bootstrap-datetimepicker.min.js"></script>--}}
    <script>
        Dropzone.autoDiscover = false;
        $("div#article_img_dropzone").dropzone({ url: "/file/post" });




//        $('#datepicker').datepicker({
//            uiLibrary: 'bootstrap4',
//            iconsLibrary: 'fontawesome'
//        });
    </script>
    {{--<script type="text/javascript">--}}
        {{--$(function () {--}}
            {{--$('#datetimepicker1').datetimepicker();--}}
        {{--});--}}
    {{--</script>--}}
@stop


