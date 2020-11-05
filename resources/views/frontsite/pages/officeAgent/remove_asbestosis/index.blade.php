@extends('frontsite.layouts.master_agent_layout')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
    <style>
        fieldset {
            border: 2px solid #000;
            padding: 15px;
        }

        legend {
            background: #eee;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-5">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-2">
                                <img src="{{asset('assets/images/logo.png')}}" width="40" alt="">
                            </div>
                            <div class="col-md-10 text-right">
                                <ul class="list-unstyled">
                                    <li class="list-inline-item">
                                        |
                                        <a href="{{route('reset_password-office-agent')}}" class="font-weight-bold">
                                            تغيير كلمة المرور
                                            <i class="icon icon-lock"></i>
                                        </a>
                                    </li>
                                    {{--                                    <li class="list-inline-item">--}}
                                    {{--                                        |--}}
                                    {{--                                        <a href="{{route('update-profile-info-office-agent')}}"--}}
                                    {{--                                           class="font-weight-bold">--}}
                                    {{--                                            تغيير بيانات شخصية--}}
                                    {{--                                            <i class="icon icon-user"></i>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    <li class="list-inline-item">
                                        |
                                        <a href="{{route('logoutOfficeAgent')}}" class="font-weight-bold">
                                            تسجيل الخروج
                                            <i class="icon icon-log-out"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                <strong>{{__('violation.success')}}</strong> {{session()->get('success')}}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                <strong>{{__('violation.error')}}</strong> {{session()->get('error')}}
                            </div>
                        @endif
                        {{Form::open([
                            'method'=>'post',
                            'route'=>'handle_remove_asbestosis',
                            'enctype'=>'multipart/form-data'
                        ])}}
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <fieldset>
                                    <legend class="text-center p-2 font-weight-bold">استمارة تقديم طلب ازالة مادة
                                        الاسبستوس
                                    </legend>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="font-weight-bold">اسم الجهة</label>
                                            <input type="text" class="form-control" name="entity_name"
                                                   value="{{old('entity_name')}}">
                                            <div class="text-danger">{{$errors->first('entity_name') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-12">
                                            <br>
                                            <input type="radio" name="entity_type" id="local" value="gov" checked>
                                            <label for="local" class="font-weight-bold">جهة حكومية</label>
                                            |
                                            <input type="radio" name="entity_type" id="special" value="private">
                                            <label for="special" class="font-weight-bold">جهة خاصة</label>
                                            <div class="text-danger">{{$errors->first('entity_type') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-8">
                                            <label class="font-weight-bold">عنوان الجهة</label>
                                            <input type="text" class="form-control" name="entity_address"
                                                   value="{{old('entity_address')}}">
                                            <div class="text-danger">{{$errors->first('entity_address') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">ممثلها</label>
                                            <input type="text" class="form-control" name="entity_owner"
                                                   value="{{old('entity_owner')}}">
                                            <div class="text-danger">{{$errors->first('entity_owner') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">رقم التليفون</label>
                                            <input type="text" class="form-control" name="entity_phone"
                                                   value="{{old('entity_phone')}}">
                                            <div class="text-danger">{{$errors->first('entity_phone') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">رقم الفاكس</label>
                                            <input type="text" class="form-control" name="entity_fax"
                                                   value="{{old('entity_fax')}}">
                                            <div class="text-danger">{{$errors->first('entity_fax') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">بريد الكتروني</label>
                                            <input type="text" class="form-control" name="entity_email"
                                                   value="{{old('entity_email')}}">
                                            <div class="text-danger">{{$errors->first('entity_email') ?? ''}}</div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-12">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="font-weight-bold">اسم المكتب الاستشاري البيئي المعتمد لدي
                                                الهيئة العامة للبيئة</label>
                                            <input type="text" class="form-control" name="office_name"
                                                   value="{{$office_agent->office_name_ar ?? old('office_name')}}">
                                            <div class="text-danger">{{$errors->first('office_name') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-6">
                                            <label class="font-weight-bold">ممثله</label>
                                            <input type="text" class="form-control" name="office_owner"
                                                   value="{{($office_agent->owner_name . ' ' . $office_agent->owner_parent_name . ' ' . $office_agent->owner_family_name ) ?? old('office_owner')}}">
                                            <div class="text-danger">{{$errors->first('office_owner') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">رقم التليفون</label>
                                            <input type="text" class="form-control" name="office_phone"
                                                   value="{{$office_agent->owner_phone ?? old('office_phone')}}">
                                            <div class="text-danger">{{$errors->first('office_phone') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">رقم الفاكس</label>
                                            <input type="text" class="form-control" name="office_fax"
                                                   value="{{old('office_fax')}}">
                                            <div class="text-danger">{{$errors->first('office_fax') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">بريد الكتروني</label>
                                            <input type="text" class="form-control" name="office_email"
                                                   value="{{$office_agent->owner_email ?? old('office_email')}}">
                                            <div class="text-danger">{{$errors->first('office_email') ?? ''}}</div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-12">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="font-weight-bold">اسم المكتب الهندسي</label>
                                            <input type="text" class="form-control" name="en_office_name"
                                                   value="{{old('en_office_name')}}">
                                            <div class="text-danger">{{$errors->first('en_office_name') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-6">
                                            <label class="font-weight-bold">ممثله</label>
                                            <input type="text" class="form-control" name="en_office_owner"
                                                   value="{{old('en_office_owner')}}">
                                            <div class="text-danger">{{$errors->first('en_office_owner') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">رقم التليفون</label>
                                            <input type="text" class="form-control" name="en_office_phone"
                                                   value="{{old('en_office_phone')}}">
                                            <div class="text-danger">{{$errors->first('en_office_phone') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">رقم الفاكس</label>
                                            <input type="text" class="form-control" name="en_office_fax"
                                                   value="{{old('en_office_fax')}}">
                                            <div class="text-danger">{{$errors->first('en_office_fax') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">بريد الكتروني</label>
                                            <input type="text" class="form-control" name="en_office_email"
                                                   value="{{old('en_office_email')}}">
                                            <div class="text-danger">{{$errors->first('en_office_email') ?? ''}}</div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-12">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="font-weight-bold">هل تم اخلاء المبني ؟ </label>
                                            &nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="building_empty" id="yes" value="yes" checked>
                                            <label for="yes" class="font-weight-bold">نعم</label>
                                            &nbsp;&nbsp;
                                            <input type="radio" name="building_empty" id="no" value="no">
                                            <label for="no" class="font-weight-bold">ﻻ</label>
                                            <div class="text-danger">{{$errors->first('building_empty') ?? ''}}</div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-12">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="font-weight-bold">نوع الاسبستوس</label>
                                            <input type="text" class="form-control" name="asbestos_type"
                                                   value="{{old('asbestos_type')}}">
                                            <div class="text-danger">{{$errors->first('asbestos_type') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="font-weight-bold">مواقع تواجده </label>
                                            <br>
                                            <input type="radio" name="asbestos_location" id="inside" value="in" checked>
                                            <label for="inside" class="font-weight-bold">داخل المبني</label>
                                            |
                                            <input type="radio" name="asbestos_location" id="outside" value="no">
                                            <label for="outside" class="font-weight-bold">تمت ازالته</label>
                                            <div class="text-danger">{{$errors->first('asbestos_location') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-8">
                                            <label class="font-weight-bold">الموقع بالتفصيل </label>
                                            <input type="text" class="form-control" name="asbestos_location_detail"
                                                   value="{{old('asbestos_location_detail')}}">
                                            <div
                                                class="text-danger">{{$errors->first('asbestos_location_detail') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-8">
                                            <label class="font-weight-bold">الكميات المتوقعة</label>
                                            <input type="text" class="form-control" name="expected_quantity"
                                                   value="{{old('expected_quantity')}}">
                                            <div class="text-danger">{{$errors->first('expected_quantity') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-8">
                                            <label class="font-weight-bold">الفترة الزمنية المتوقعة لازالته </label>
                                            <input type="text" class="form-control" name="time_for_remove"
                                                   value="{{old('time_for_remove')}}">
                                            <div class="text-danger">{{$errors->first('time_for_remove') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">مرفقات</label>
                                            <input type="file" name="images[]" class="form-control" multiple>
                                            <div class="text-danger">{{$errors->first('images') ?? ''}}</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="font-weight-bold">اقرار التعهد</label>
                                            <input type="file" name="file" class="form-control">
                                            <div class="text-danger">{{$errors->first('file') ?? ''}}</div>
                                            <a href="{{storage_path('files/office-agent/endorse/asbestos.docs')}}"
                                               class="btn btn-link font-weight-bold">
                                                تحميل الاقرار
                                            </a>
                                        </div>

                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-12">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="font-weight-bold">خطة العمل مشفوعة ببرنامج زمني مفصل
                                                للازالة </label>
                                            <textarea class="form-control"
                                                      name="plan">{{old('plan')}}</textarea>
                                            <div class="text-danger">{{$errors->first('plan') ?? ''}}</div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-12 mt-5 text-center">
                                <button class="btn btn-primary">
                                    حفظ
                                </button>
                            </div>
                        </div>
                        {{Form::close()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}
    <script>
        $(document).ready(function () {

            // $('input[aria-controls="company_attachment_table"]').addClass('ui-input').attr('autofocus', true);
        });
    </script>
@endsection
