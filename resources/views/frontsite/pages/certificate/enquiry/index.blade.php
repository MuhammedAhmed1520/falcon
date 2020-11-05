@extends('frontsite.layouts.master')

@section('content')
    <div id="services" class="section is-gray has-title">

        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        <!--<span class="section-title">الشهادات</span>-->
                        <!--<h5 class="small-headline">نظام الشهادات</h5>-->
                        <h3>الاستعلام عن الطلبات السابقة</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>
                <div class="column is-12-desktop">
                    @include('frontsite.pages.certificate.menu')
                </div>
                <div class="column is-12-desktop is-12-tablet">
                    <h1 style="font-size:25px">
                        اسم الشركة : <b> {{$request->company_name}}</b>
                    </h1>
                    <h2 style="color: #666;font-size:22px">
                        اسم المالك : <b> {{$request->owner_name}}</b>
                    </h2>
                    <br><br>
                    @if($request->status_id == '12')
                        {{-- Pending--}}
                        <h2 class="has-text-link" style="font-size:21px">
                            “جاري مراجعة الطلب يرجى المحاولة لاحقا”
                            <br>
                        </h2>
                    @endif
                    @if($request->status_id == '13')
                        {{-- approved--}}

                        <h2 class="has-text-link" style="font-size:21px">

                            تم الموافقة على طلبك, وذلك للحصول على شهادة لمن يهمه الأمر بعدم وجود محاضر بأي مخالفات بيئية. يرجى العلم بأنه سوف يتم استيفاء مبلغ و قدره   {{getSetting("certificate_payment_value")['data']['setting']}} دينار كويتي نظير هذه الشهادة
                            <br>
                        </h2>
                        <br>
                        <br>
                        <a href="{{$request->paymentable->link ?? null}}" class="btn btn-success">ادفع من هنا</a>
                    @endif

                    @if($request->status_id == '14')
                        {{-- Rejected For Edit--}}

                        <h2 class="has-text-link" style="font-size:21px">
                            “بعد مراجعة البيانات الخاصة بكم نعتذر عن عدم اصدار شهادة لمن يهمه الأمر بعدم وجود محاضر بأي مخالفات بيئية. للمزيد من المعلومات, يرجى مراجعة مقر الهيئة العامة للبيئة الشويخ الصناعية - الدائري الرابع - بجانب وزارة الإعلام  وذلك خلال ساعات العمل الرسمية من 8 صباحاً - 1 ظهراً”
                            <br>
                            <h3>{{$request->admin_reason ?? ''}}</h3>
                            <br>
                            <a href="{{route('update-certificate',$request->id)}}" class="btn btn-success">تعديل من هنا</a>
                        </h2>
                    @endif

                    @if($request->status_id == '15')
                        {{-- Rejected--}}
                        <h2 class="has-text-link" style="font-size:21px">
                            “بعد مراجعة البيانات الخاصة بكم نعتذر عن عدم اصدار شهادة لمن يهمه الأمر بعدم وجود محاضر بأي مخالفات بيئية. للمزيد من المعلومات, يرجى مراجعة مقر الهيئة العامة للبيئة الشويخ الصناعية - الدائري الرابع - بجانب وزارة الإعلام  وذلك خلال ساعات العمل الرسمية من 8 صباحاً - 1 ظهراً”
                            <br>
                            <h2>{{$request->admin_reason ?? ''}}</h2>
                        </h2>
                    @endif
                    @if($request->status_id == '16')
                        {{-- Paid--}}

                        <h2 class="has-text-link" style="font-size:21px">
                            “تمت عملية الدفع بنجاح يرجى مراجعة مقر الهيئة العامة للبيئة - الشويخ وذلك خلال ساعات العمل الرسمية من 8 صباحاً - 1 ظهراً وذلك من الأحد - الخميس وذلك خلال {{getSetting("certificate_recieving_time_ar")['data']['setting']}}  عمل وذلك لاستلام الشهادة.
                            ملاحظة: لا يتم احتساب الجمع والعطل الرسمية
                            ”
                            <br>
                        </h2>
                    @endif
                    @if($request->status_id == '17')
                        {{-- Paid Faild--}}
                        <h2 class="has-text-link" style="font-size:21px">
                            “فشل فى عملية الدفع”
                            <br>
                        </h2>

                        <a href="{{$request->paymentable->link ?? null}}" class="btn btn-success">ادفع من هنا</a>
                    @endif
                    {{--@if(!$request->file_status)--}}
                    {{--<h1 class="has-text-link" style="font-size:21px">--}}
                    {{--<span class="has-text-danger">“لم يتم استكمال اجراءات تسجيل هذه الشركة حتى الان”</span>--}}
                    {{--<br>--}}
                    {{--<a style="font-size: 15px;" href="{{route('frontTenderCompanyEnquiry',['type'=>'files'])}}">استكمال التسجيل</a>--}}
                    {{--<br>--}}
                    {{--</h1>--}}
                    {{--@endif--}}
                </div>
            </div>
        </div>

    </div>


@endsection
@section('scripts')

@endsection
