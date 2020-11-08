<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>موقع الهيئة العامة للبيئة دولة الكويت</title>

    @include('frontsite.includes.styles')
    @yield('styles')
    @include('frontsite.includes.scripts')
    <style>
        table.dataTable thead .sorting, table.dataTable thead .sorting_asc, table.dataTable thead .sorting_desc, table.dataTable thead .sorting_asc_disabled, table.dataTable thead .sorting_desc_disabled {
            word-break: normal;
        }

        .error {
            color: #f00;
        }

        .dataTables_wrapper {
            overflow-x: scroll
        }

        .table td, .table th {

            word-break: normal;
        }

        .section.is-gray {
            /*background: radial-gradient(white 5%, #c9c9c9 75%);*/
        }

        .env_loader {
            position: fixed;
            left: 0;
            z-index: 999;
            width: 100%;
            height: 100%;
            opacity: 0.95;
            display: none;
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
            /*background:#000;*/
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: 9999;
        }
    </style>

</head>
<body>
<div class="env_loader">
    <img src="{{asset('assets/images/gifs/env.gif')}}"/>
</div>
@if(!request()->get('window'))
    @include('frontsite.includes.inner_header')
@endif
@if(env('SITE_FRAMES'))
    @include('frontsite.includes.header')
@endif

@yield('content')

@if(env('SITE_FRAMES'))
    @include('frontsite.includes.footer')
@endif
@if(!request()->get('window'))
    @include('frontsite.includes.inner_footer')
@endif
@yield('scripts')
</body>
</html>
