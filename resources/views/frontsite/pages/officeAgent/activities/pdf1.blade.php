@extends('frontsite.layouts.master_agent_layout')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
    <style>
        .table tbody tr:last-child td, .table tbody tr:last-child th {
            border-bottom-width: 0;
            white-space: nowrap;
            overflow: scroll;
        }
        .w-sm-100{
            width: 35%!important;
        }
        @media only screen and (max-width: 600px) {

            .w-sm-100{
                width: 100%!important;
            }
        }
    </style>
@endsection
@section('content')
    <div id="services" style="background: #eee">
        <div class="container pr-4 bg-white">
            <div class="row pt-5 pb-5">
                <div class="col-4 text-center">
                    <img class="img-fluid w-sm-100" src="{{asset('assets/images/Kuwait_logo.png')}}" alt="">
                </div>
                <div class="col-4 text-center">
                    <img class="img-fluid w-sm-100" src="{{asset('assets/images/new_kuwait.png')}}" alt="">
                </div>
                <div class="col-4 text-center">
                    <img class="img-fluid w-sm-100" src="{{asset('assets/images/logo.png')}}" alt="">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mt-5">
                    <p class="font_bold size25 text-center">
                        قائمة المكاتب الاستشارية المختصة والجهات متعددة الأنشطة العاملة في مجال الاستشارات البيئية أو
                        تقييم المردود البيئي
                        والاجتماعي أو تقييم الوضع البيئي الراهن أو التدقيق البيئي
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mt-5">
                    <p class="font_bold size18 pb-1" style="text-decoration:underline">
                        ملاحظات هامة:
                    </p>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 mt-1">
                    <ul class="font_bold size18" style="list-style-type:square ">
                        <li class="mt-2">
                            المكاتب ذات الدرجة (أ) : تقوم هذه المكاتب باعداد دراسات لمشاريع الفئة (أ) التى تتطلب اعداد
                            دراسة شاملة لتقييم المردود البيئي والاجتماعى ودراسات لمشاريع الفئة (ب) التى تتطلب اعداد
                            تقرير التقييم البيئي والاجتماعى لها وذلك وفقا للقرار رقم 2015/2 بشأن نظام تقييم المردود
                            البيئي والاجتماعى الصادر فى جريدة الكويت اليوم ملحق عدد (1265)
                        </li>
                        <li class="mt-4">
                            المكاتب ذات الدرجة (ب) : تقوم هذه المكاتب بإعداد دراسات لمشاريع الفئة (ب) التى تتطلب
                            اعداد تقرير التقييم البئيى والاجتماعى لمها ودراسات لمشاريع الفئة (ج) التى تتطلب تعبئة
                            استمارة التقييم البيئي وذلك وفقا للقرار رقم 2015/2 بشأن نظام تقييم المردود البيئي والاجتماعى
                            الصادر فى جريدة الكويت اليوم ملحق عدد (1265)
                        </li>
                        <li class="mt-4">
                            ﻻ تقبل ايه دراسة للاستشارات البيئية او تقييم المردود البيئي للمكاتب التى تعمل ضمن الوكالة اﻻ
                            عن طريق الشركات التى تم الاتفاق والتعاقد معها
                        </li>
                        <li class="mt-4">
                            ان تلك القائمة قابلة للتغيير بصفة مستمرة حيث يمكن اضافة مكتب / شركة او شطب اى مكتب / شركة
                            سبق تسجيله او تغيير تصنيف المكتب / الشركة فى حالة مخالفته للقواعد والاشتراطات المعمول بها
                            وفق القرار رقم 709 لسنة 2010
                        </li>
                        <li class="mt-4">
                            يتم اصدار قائمة المكاتب والشركات الاستشارية البيئية المعتمدة لدي الهيئة العامة للبيئة شهريا
                        </li>
                    </ul>
                </div>
            </div>

            <div class="alert alert-warning mt-5" style="background: #ff9777;border: 1px solid #000">
                <p class="lead font_bold text-center">
                    قائمة المكاتب الاستشارية المختصة والجهات متعددة الانشطة العاملة فى مجال الاستشارات البيئية او تقييم
                    المردود البيئي والاجتماعى او تقييم الوضع البيئي الراهن او التدقيق البيئي
                </p>
            </div>


            <div class="row mt-5">
                <div class="col-md-6">
                    <div style="overflow-x:scroll">
                        <table class="table table-bordered table-responsives font_bold">
                            <thead>
                            <tr>
                                <th class="text-center size18" colspan="2">التصنيف أ</th>
                            </tr>
                            <tr>
                                <th>المكتب الاستشاري المعتمد</th>
                                <th>مجال التخصص</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($officeAgents['16'] ?? [] as $office_category_a)
                                <tr>
                                    <td>
                                        <b>{{$office_category_a->office_name_ar}}</b>
                                        <br>
                                        رقم هاتف المكتب:
                                        {{$office_category_a->office_phone}}
                                        <br>
                                        رقم صاحب الرخصة:
                                        {{$office_category_a->owner_phone}}
                                        <br>
                                        البريد الالكتروني:
                                        {{$office_category_a->owner_email}}
                                        @if(count($office_category_a->addresses))
                                            <ul style="list-style-type: square">
                                                <li>
                                                    @foreach($office_category_b->addresses as $address)
                                                        {{$address->full_address}} <br>
                                                        قطعة :{{$address->segment}}
                                                        منطقة :{{$address->area}}
                                                        شارع :{{$address->street}}
                                                        مبني :{{$address->building}}
                                                        طابق :{{$address->floor}}
                                                        مدينة :{{$address->city['translated']['name'] ?? ''}}
                                                        محافظة :{{$address->governorate['translated']['name'] ?? ''}}
                                                    @endforeach
                                                </li>
                                            </ul>
                                        @endif
                                    </td>
                                    <td>
                                        <ul style="list-style-type: square">
                                            @foreach($office_category_a->specializations ?? [] as $specialization)
                                                <li>{{$specialization->title_ar}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="overflow-x:scroll">
                        <table class="table table-bordered table-responsives font_bold">
                            <thead>
                            <tr>
                                <th class="text-center size18" colspan="2">التصنيف ب</th>
                            </tr>
                            <tr>
                                <th>المكتب الاستشاري المعتمد</th>
                                <th>مجال التخصص</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($officeAgents['17'] ?? [] as $office_category_b)
                                <tr>
                                    <td>
                                        <b>{{$office_category_b->office_name_ar}}</b>
                                        <br>
                                        رقم هاتف المكتب:
                                        {{$office_category_b->office_phone}}
                                        <br>
                                        رقم صاحب الرخصة:
                                        {{$office_category_b->owner_phone}}
                                        <br>
                                        البريد الالكتروني:
                                        {{$office_category_b->owner_email}}
                                        @if(count($office_category_b->addresses))
                                            <ul style="list-style-type: square">
                                                <li>
                                                    @foreach($office_category_b->addresses as $address)
                                                        {{$address->full_address}} <br>
                                                        قطعة :{{$address->segment}}
                                                        منطقة :{{$address->area}}
                                                        شارع :{{$address->street}}
                                                        مبني :{{$address->building}}
                                                        طابق :{{$address->floor}}
                                                        مدينة :{{$address->city['translated']['name'] ?? ''}}
                                                        محافظة :{{$address->governorate['translated']['name'] ?? ''}}
                                                    @endforeach
                                                </li>
                                            </ul>
                                        @endif
                                    </td>
                                    <td>
                                        <ul style="list-style-type: square">
                                            @foreach($office_category_b->specializations ?? [] as $specialization)
                                                <li>{{$specialization->title_ar}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


    </div>


@endsection
@section('scripts')

    {{Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}
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
            bottom: 125px;
        }

        .font_bold {
            font-weight: bold;
            color: #000;
        }

        .tabs.is-toggle li.is-active a {
            color: #fff;
            background: #0547a6;

        }

        .tabs.is-toggle li.is-active a b {
            color: #fff !important;

        }

        .size25 {
            font-size: 25px;
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
    </style>
@endsection
