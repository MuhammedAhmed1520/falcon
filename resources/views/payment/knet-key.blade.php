<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('assets/images/logo.png')}}" rel="icon">

</head>
<body onload="document.form.submit()">
    <h1>Redirecting...</h1>

    <form action="http://www.approc.com/~drawing/test/SendPerformREQuest.php" method="post" name="form">
        <input type="hidden" name="price" value="{{$price}}">
        <input type="hidden" name="token" value="{{$token}}">
        <input type="hidden" name="qty" value="{{$qty}}">
        <input type="hidden" name="callback" value="{{$url}}">
        <input type="submit" style="display: none">
    </form>
</body>
</html>