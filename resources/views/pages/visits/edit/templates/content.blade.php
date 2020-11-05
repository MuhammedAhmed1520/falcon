<div class="container-fluid">
{{--    {{Form::open([--}}
{{--        'method'=>'put',--}}
{{--        'route'=>['updateEnvironmentalRequests',$visit->id]--}}
{{--    ])}}--}}
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h2 class="font-weight-bold">بيانات الدفع</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px" height="50px">
                            حالة الدفع / Payment Status

                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            @if($visit->payed_at)
                                تم الدفع
                            @else
                                لم يتم الدفع
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h2 class="font-weight-bold">البيانات الشخصية</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px" height="50px">
                            الاسم / Name

                        </td>
                        <td  style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            {{$visit->name}}
                        </td>
                    </tr>
                    <tr >
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            رقم الهاتف / Phone


                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            {{$visit->phone}}
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            البريد الالكترونى  / Email

                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            {{$visit->email}}
                        </td>
                    </tr>
                    <tr >
                        <td class="bg-gray font-weight-bold text-center"
                            style=""
                            width="200px">
                            حسابات وسائل التواصل / Social Media
                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            {{$visit->social_media}}

                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            صورة من البطاقة المدنية او الجواز / Copy Of Civil Id Or Passport
                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            @if($visit->ssn_file_path)
                                <a href="{{$visit->ssn_file_path}}" target="_blank">عرض الملف</a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            صورة من كتاب الطلب للفرق والجهات/ Attach a Letter of Request for Groups, Private, or
                            Gov. Body                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            @if($visit->book_file_path)
                                <a href="{{$visit->book_file_path}}" target="_blank">عرض الملف</a>
                            @endif
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h2 class="font-weight-bold">
                    البيانات
                </h2>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            نوع الجهة / Type Of Institution
                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            {{$visit->type_of_institution_translate}}
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            اسم الجهة / Name Of Institution

                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            {{$visit->name_of_institution}}
                        </td>
                    </tr>
                    <tr >
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            الغرض من الزيارة / Purpose Of Visit
                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            {{__('dashboard.'.$visit->purpose_of_visit)}}
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            مدة التصريح  / Duration Of Visit

                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            {{__('dashboard.'.$visit->duration_of_visit)}}
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            تاريخ الزيارة  / Date Of Visit

                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            {{$visit->date_of_visit}}
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            الموسم  / Season

                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            @foreach($visit->season as $item)
                                <span>   {{__('dashboard.'.$item)}}</span><br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            الادوات المستخدمة  / Equipment Used

                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            @foreach($visit->equipment_used as $item)
                                <span>  {{__('dashboard.'.$item)}}</span><br>
                             @endforeach

                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            نوع وطراز الاداة /  Model of the Equipment

                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            {{$visit->model_of_the_equipment}}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h2 class="font-weight-bold">
                    بيانات المركبة
                </h2>
                <p>
                    يسمح فقط للمركبات المسجلة بدخول المحمية
                </p>
                <p>
                    only valid Registered vehicle are allowed to enter the Reserve
                </p>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            رقم اللوحة / Vehicle Plate No
                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            {{$visit->plate_no}}
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            نوع وطراز المركبة  / Vehicle Model
                        </td>
                        <td style="text-align: right;line-height: 44px; padding-right: 5px" class="mr-1">
                            {{$visit->vehicle_model}}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-2 mb-4 text-center">
        @can('approve-visit')
            @if(!$visit->verified_at)
            <button type="submit" class="btn btn-sm btn-info m-0 d-print-none" onclick="approveVisit(event,'{{$visit->token}}')">تأكيد الطلب</button>
            @endif
        @endcan
        <button type="button" class="btn btn-sm btn-dark m-0 d-print-none" onclick="window.print()">
            {{__('violation.print')}}
        </button>
            <a class="btn btn-sm btn-warning m-0 d-print-none" target="_blank" href="{{asset('storage/files/visits/خريطة_محمية_الجهراء.pdf')}}">
                 خريطة محمية الجهراء
            </a>
            <a class="btn btn-sm btn-warning m-0 d-print-none" target="_blank" href="{{asset('storage/files/visits/طيور_محمية_الجهراء.pdf')}}">
                 طيور محمية الجهراء
            </a>

    </div>

{{--    {{Form::close()}}--}}
</div>

