@extends('layouts.master')

@section('title', 'Details page')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/news.min.css">
@stop
@php
    $lang = LaravelLocalization::getCurrentLocaleRegional();
@endphp
@section('content')
    <section class="article_section">
        <div class="container-fluid">
            <div class="outer_block_container">
                <div class="inner_block_container">
                    <h1>Article title</h1>
                    <h2>05.06.2017</h2>
                    <div class="img_container">
                        <img src="/img/details/no_agent_photo.svg" alt="">
                    </div>
                    <div class="img_container">
                        <img src="/img/details/no_agent_photo.svg" alt="">
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum nisi sed sem aliquam fringilla eget non metus. Nulla consectetur a ipsum id faucibus. Quisque sit amet ligula enim. Sed dapibus neque lacus, a ullamcorper nunc posuere vitae. Suspendisse quis mollis nunc, id tempor velit. Nam dapibus dictum congue. Donec ex nulla, malesuada sit amet mattis consequat, ultrices et ex. Sed sed facilisis mauris. Proin at vestibulum arcu. Fusce dapibus vehicula cursus. <br><br>
                        Quisque a lobortis eros. Nunc scelerisque tellus velit, quis accumsan magna fringilla a. Nulla sed libero eleifend, sagittis justo in, vulputate elit. Pellentesque ac pellentesque risus. Mauris vulputate lectus at tristique rutrum. Cras maximus feugiat gravida. Cras nisi nunc, pellentesque sit amet egestas et, molestie nec dolor. Aenean dapibus non dolor id lacinia. Nam vitae nunc ut nibh fermentum tempus vel quis enim. Duis sed dignissim metus, vel suscipit enim. Quisque nec odio efficitur augue mattis cursus ac ac ipsum. Sed luctus aliquet consequat. Curabitur varius sem mauris, et venenatis augue hendrerit vestibulum. Suspendisse potenti. Nulla et sagittis diam.<br><br>
                        Curabitur finibus metus eget elit facilisis congue. Nunc tempus porttitor felis, non posuere ligula dignissim eu. Fusce rutrum massa et ex lacinia cursus. Donec libero justo, cursus et tristique nec, maximus pulvinar orci. Cras venenatis pulvinar lectus, quis venenatis tortor. Nulla in bibendum leo. Aliquam mattis ante nec faucibus consequat. Vestibulum id magna imperdiet, consequat felis quis, facilisis enim.<br><br>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
@stop


