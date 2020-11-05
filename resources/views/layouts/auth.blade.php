<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('assets/images/logo.png')}}" rel="icon">
    @yield('styles')
    <title>{{$page_title ?? 'EPA::System Login'}}</title>


</head>
<body>

@yield('content')

@yield('scripts')
</body>
</html>