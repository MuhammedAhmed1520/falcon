@extends('frontsite.layouts.master')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
@endsection
@section('content')
    <div id="services" class="section is-gray has-title">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    @include('frontsite.includes.inner_activity_breadcrumb')
                </div>
                <div class="column is-4-desktop">
                    <a class="font_bold" href="{{route('loginOfficeAgent')}}">تسجيل الدخول</a>
                    |
                    <a class="font_bold" href="{{route('register-office-agent')}}">تسجيل طلب جديد </a>
                </div>
            </div>
            <div class="columns">
                <div class="column is-10 is-offset-1">
                    <div class="section-content has-text-centered">
                        {{--                        <span class="section-title">المخالفات</span>--}}
                        {{--                        <h5 class="small-headline">نظام المخالفات</h5>--}}
                        <h3>قائمة المكاتب الاستشارية و المختبرات و الخدمات البيئية المعتمدة</h3>
                        <p class="has-text-right font_bold size18 lead">تقوم إدارة تأهيل و متابعة الأنشطة البيئية
                            باعتماد المكاتب الإستشارية المختصة والجهات متعددة
                            الأنشطة للعمل في مجال الإستشارات البيئية أو إعداد دراسات تقييم المردود البيئي أو تقييم الوضع
                            البيئي الراهن أو التدقيق البيئي، هذا بالاضافة الى اعتماد المختبرات و الخدمات البيئية.
                            <br>
                            ويتم إصدار قائمة شهرية محدثة بهذا الخصوص.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>

                <div class="column is-4-desktop has-text-centered">
                    <a href="{{route('mainActivityOne')}}"
                       class="font_bold">
                        <div style="position:relative">
                            <div class="book-month">{{Carbon\Carbon::now()->localeMonth}}</div>
                            <div class="book-year">{{Carbon\Carbon::now()->format('Y')}}</div>
                            <div class="book-title"> المكاتب الاستشارية</div>
                            <img class="img-fluid" src="{{asset('assets/images/ConsulOff.png  ')}}" alt="">
                        </div>
                        <h3 class="book-title2">المكاتب المعتمدة</h3>
                        <ul class="ultext">
                            <li>الاستشارات البيئية</li>
                            <li>تقييم المردود البيئي</li>
                            <li>تقييم الوضع البيئي الراهن</li>
                            <li>التدقيق البيئي</li>
                        </ul>
                    </a>
                </div>
                <div class="column is-4-desktop has-text-centered">
                    <a href="{{route('mainActivityTwoThree')}}"
                       class="font_bold">
                        <div style="position:relative">
                            <div class="book-month">{{Carbon\Carbon::now()->localeMonth}}</div>
                            <div class="book-year">{{Carbon\Carbon::now()->format('Y')}}</div>
                            <div class="book-title">المختبرات المعتمدة</div>
                            <img class="img-fluid" src="{{asset('assets/images/ConsulOff.png  ')}}" alt="">
                        </div>
                        <h3 class="book-title2">المختبرات المعتمدة</h3>
                        <ul class="ultext">
                            <li>مختبرات المواد الكيميائية</li>
                            <li>المختبرات البيئية</li>
                        </ul>
                    </a>
                </div>
                <div class="column is-4-desktop has-text-centered">
                    <a href="{{route('mainActivityFour')}}"
                       class="font_bold">
                        <div style="position:relative">
                            <div class="book-month">{{Carbon\Carbon::now()->localeMonth}}</div>
                            <div class="book-year">{{Carbon\Carbon::now()->format('Y')}}</div>
                            <div class="book-title">الخدمات البيئية</div>
                            <img class="img-fluid" src="{{asset('assets/images/ConsulOff.png  ')}}" alt="">
                        </div>
                        <h3 class="book-title2">الخدمات البيئية </h3>
                        <ul class="ultext">
                            <li>تصميم و تنفيذ أماكن التدخين</li>
                        </ul>
                    </a>
                </div>

            </div>
        </div>


    </div>


@endsection
@section('scripts')

    {{Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}
    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            $('#myTable').DataTable({--}}
    {{--                paging: false,--}}
    {{--                "language": {--}}
    {{--                    "search": "بحث  الشركات المعتمدة    ",--}}
    {{--                    searchPlaceholder: "  ابحث هنا"--}}

    {{--                }--}}
    {{--            });--}}
    {{--            $('input[aria-controls="myTable"]').addClass('ui-input').attr('autofocus', true);--}}
    {{--        });--}}
    {{--    </script>--}}
    <style>
        .img-fluid {
            width: 90%;
        }

        .ultext {
            list-style-type: square;
            color: #000;
            font-size: 18px;
        }

        .book-title {
            font-size: 33px;
            font-weight: bold;
            padding-top: 8px;
            width: 157px;
            line-height: 1.2;
            color: #000;
            position: absolute;
            right: 28%;
            top: 60px;
            word-break: break-word;
            text-align: right;
            overflow: hidden;
        }

        .book-title2 {
            font-size: 28px;
            font-weight: bold;
            padding-top: 8px;
            line-height: 1.2;
            color: #000;
        }

        .book-year {
            font-size: 58px;
            font-weight: bold;
            color: #51b1e3;
            position: absolute;
            right: 30%;
            bottom: 170px;
        }

        .book-month {
            font-size: 28px;
            font-weight: bold;
            color: #000;
            position: absolute;
            right: 32%;
            bottom: 110px;
        }

        .font_bold {
            font-weight: bold;
        }

        .tabs.is-toggle li.is-active a {
            color: #fff;
            background: #0547a6;

        }

        .tabs.is-toggle li.is-active a b {
            color: #fff !important;

        }

        .card.is-active {
            border: 2px solid #A66405;
            color: #fff;
            text-decoration: underline;

        }

        .red_blue {
            /*color: #fff;*/
            /*background: linear-gradient(to right, rgb(81, 177, 227), rgb(137, 198, 232))*/
            color: #fff;
            background: #0547a6;
            transition: all 0.5s ease-in-out;
        }

        .red_blue:hover {
            background: #053d8d;
        }

        .red_blue .card-content,
        .red_yellow .card-content {
            text-align: center;
        }

        .column a:hover {
            text-decoration: none;
        }

        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
            color: #333;
            font-size: 22px;
            font-weight: bold;
        }
        @media only screen and (max-width: 600px) {

            .book-title {
                font-size: 20px;
                font-weight: bold;
                padding-top: 8px;
                width: 95px;
                line-height: 1.2;
                color: #000;
                position: absolute;
                right: 28%;
                top: 60px;
                word-break: break-word;
                text-align: right;
                overflow: hidden;
            }
            .book-year {
                font-size: 40px;
                font-weight: bold;
                color: #51b1e3;
                position: absolute;
                right: 30%;
                bottom: 42%;
            }
            .book-month {
                font-size: 20px;
                font-weight: bold;
                color: #000;
                position: absolute;
                right: 32%;
                bottom: 30%;
            }
        }
    </style>
@endsection
