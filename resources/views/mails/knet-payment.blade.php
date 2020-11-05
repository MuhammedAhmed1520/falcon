<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>.btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            text-decoration: none;
            color: #FFF !important;
        }

        .btn-block {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div style="max-width: 500px;margin: auto;border: 1px dashed #888">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"
                     style="background:linear-gradient(to right,#0747a6,#51b1e3,#0747a6);direction: rtl;text-align:right;padding: 15px 0 15px 5px;">
                    <ul style="list-style: none;">
                        <li style="display: inline-block"><img src="{{asset('assets/images/logo.png')}}"
                                                               class="img-responsive" style="width:55px" alt=""></li>
                        <li style="display: inline-block">
                            <h2 style="color:#FFF;font-weight:bold;margin-top: 0;">الخدمات الالكترونية
                                للهيئة العامة للبيئة</h2>
                            <b style="color:#ddd">بوابة الدفع الالكتروني</b>
                        </li>
                    </ul>
                </div>
                <div class="panel-body" style="padding: 5px">
                    <div class="row" style="position:relative;">
                        <div class="col-md-12" style="text-align: right">
                            <h2 style="color:#000;font-weight:bold"> مرحبا بك
                                ,
                                <span>{{$content['name']}}</span>
                            </h2>
                            @if($content['user_name'] ?? null)
                            <p style="font-size: 20px;color: #222">
                                  {{$content['user_name']}} :<strong>اسم المستخدم </strong>
                                <br>
                                  {{$content['password']}} :<strong>كلمة المرور </strong>
                            </p>
                            @endif
                            @if($content['link'] ?? null)
                            <p style="font-size: 20px;color: #222">
                                لاتمام عملية الدفع <span> {{$content['content'] ?? ''}} </span> لاستيفاء مبلغ {{ $content['cost'] ?? '' }} دينار

                                برجاء الضغط على الزر بالاسفل

                            </p>
                            <div style="text-align: center;">
                                <a href="{{$content['link']}}" class="btn btn-primary btn-block">اضغط هنا للدفع</a>
                            </div>
                            @endif
                        </div>
                        <div style="background-color: #2674c0;text-align:center;color: #FFF;padding: 12px;margin-top: 16px;">
                            All rights reserved - 2019
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
