<!doctype html>
<html lang="en" style="background: #fff">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>موقع الهيئة العامة للبيئة دولة الكويت</title>

@include('portal.includes.styles')

    @yield('styles')
    @include('portal.includes.scripts')

    {{Html::script('assets/js/bootstrap.min.js')}}
    {{Html::script('assets/js/bootstrap.bundle.min.js')}}

</head>
<body style="background: #fff">
@yield('content')


@yield('scripts')
</body>
</html>
