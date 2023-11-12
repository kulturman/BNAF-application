<!DOCTYPE html>
<!--
   * CoreUI - Free Bootstrap Admin Template
   * @version v4.1.1
   * @link https://coreui.io
   * Copyright (c) 2022 creativeLabs Łukasz Holeczek
   * Licensed under MIT (https://coreui.io/license)
   -->
<!-- Breadcrumb-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Put a title here dude')</title>
    @section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {!! Html::style('css/HoldOn.min.css') !!}
    {!! Html::style('plugins/dark-tooltip/darktooltip.css') !!}
    @show
</head>
<body>
@include('layouts.sidebar')
<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    @include('layouts.header')
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
@section('scripts')
<script>
    var ajaxFormHandlerSuccessCallback = null;
    drawDataTableCallback = function () {
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{!! Html::script('js/sweetalert2.all.min.js') !!}
{!! Html::script('js/HoldOn.min.js') !!}
{!! Html::script('js/deleteHandler.js') !!}
{!! Html::script('js/ajaxFormHandler.js') !!}
{!! Html::script('plugins/dark-tooltip/jquery.darktooltip.js') !!}
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $('.data-tooltip').darkTooltip({
        animation: 'flipIn',
        gravity: 'north',
        theme: 'light'
    });
</script>
@show
</body>
</html>
