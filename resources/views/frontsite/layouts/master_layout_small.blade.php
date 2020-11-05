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

</head>
<body>
@include('frontsite.includes.headercommon')

@yield('content')

@include('frontsite.includes.footer')


@yield('scripts')
</body>
</html>