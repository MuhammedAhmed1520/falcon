<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('assets/images/logo.png')}}" rel="icon">
    @include('includes.styles')
    @yield('styles')
    <title>{{$page_title ?? 'EPA::System'}}</title>
    <style>
        .env_loader {
            position: fixed;
            left: 0;
            z-index: 999;
            width: 83%;
            height: 100%;
            background: #fff;
            /*background:radial-gradient(#000 50%, #555 5%, #000 50%);*/
            margin: auto;
            text-align: center;
        }

        .env_loader .oval {
            position: absolute;
            width: 350px;
            height: 350px;
            background: #e4e4e4;
            left: 0;
            right: 0;
            top: -75px;
            bottom: 0;
            border-radius: 50%;
            margin: 45vh auto;
            z-index: -1;
            box-shadow: 1px 1px 20px #e8ecef;
        }

        .env_loader img {
            width: 220px;
            margin: 30vh auto;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: 9999;
        }
    </style>
    <script>
        window.back_menu = "{{__('sidebar.back_to_menu')}}";
    </script>
</head>
<body class="direction">
<div class="env_loader">
    <img src="{{asset('assets/images/gifs/env.gif')}}"/>
</div>
<div id="adg3-navigation"
     data-mobile-nav>

{{--    @auth()--}}
        <nav class="skeleton-nav position-fixed">
            @include('includes.sideslides')
            @include('includes.sideloader')
        </nav>

{{--    @endauth--}}
    @yield('content')

    <div class="drop-backup"></div>
</div>
@include('includes.scripts')
@include('includes.alerts')
@yield('scripts')
<script>

    $(document).ready(function () {
        // setTimeout(()=>{
        $('.env_loader').fadeOut(500, function () {

            $('.nav-loader').attr('style', 'display:none !important');
        });
        // },500)
    });
</script>
</body>
</html>
