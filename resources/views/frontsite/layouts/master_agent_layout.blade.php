<!doctype html>
<html lang="en" style="background: #ccc">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>موقع الهيئة العامة للبيئة دولة الكويت</title>

@include('frontsite.includes.styles')

<!-- core css-->
    {{Html::style('assets/css/bootstrap.min.css')}}
    {{Html::style('assets/css/bootstrap-grid.min.css')}}
    {{Html::style('assets/css/bootstrap-reboot.min.css')}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!--ar-->
    {{Html::style('assets/css/bootstrap-rtl.css')}}
<!--ar-->
    <style>

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        a {
            color: #68a1f3;
        }

        .styled-checkbox {
            position: absolute;
            opacity: 0;
        }

        .styled-checkbox + label {
            position: relative;
            cursor: pointer;
            padding: 0;
        }

        .styled-checkbox + label:before {
            content: '';
            margin-left: 10px;
            display: inline-block;
            vertical-align: text-top;
            width: 20px;
            height: 20px;
            background: #cfcfcf;
            text-align: center;
            border: 1px solid #555;
        }

        .styled-checkbox:hover + label:before {
            background: #68a1f3;
        }

        .styled-checkbox:focus + label:before {
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.12);
        }

        .styled-checkbox:checked + label:before {
            background: #68a1f3;
            color: #fff;
            content: '✓';
        }

        .styled-checkbox:disabled + label {
            color: #b8b8b8;
            cursor: auto;
        }

        .styled-checkbox:disabled + label:before {
            box-shadow: none;
            background: #ddd;
        }

        .styled-checkbox:checked + label:after {
            /*content: '';*/
            position: absolute;
            left: 5px;
            top: 9px;
            background: white;
            width: 2px;
            height: 2px;
            box-shadow: 2px 0 0 white, 4px 0 0 white, 4px -2px 0 white, 4px -4px 0 white, 4px -6px 0 white, 4px -8px 0 white;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }

    </style>
    @yield('styles')
    @include('frontsite.includes.scripts')

    {{Html::script('assets/js/bootstrap.min.js')}}
    {{Html::script('assets/js/bootstrap.bundle.min.js')}}

</head>
<body style="background: #ccc">
@yield('content')


@yield('scripts')
</body>
</html>
