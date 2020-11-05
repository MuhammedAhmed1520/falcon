<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend class="text-center p-2 font-weight-bold">استمارة تقديم طلب ازالة مادة
                    الاسبستوس
                </legend>
                <div class="row">
                    <div class="col-md-8">
                        <label class="font-weight-bold">اسم الجهة</label>
                        <input type="text" class="form-control" name="entity_name" disabled
                               value="{{$order->entity_name}}">
                        <div class="text-danger">{{$errors->first('entity_name') ?? ''}}</div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-12">
                        <br>
                        <input type="radio" name="entity_type" id="local" value="gov" disabled
                               @if($order->entity_type == 'gov') checked @endif>
                        <label for="local" class="font-weight-bold">جهة حكومية</label>
                        |
                        <input type="radio" name="entity_type" id="special" value="private" disabled
                               @if($order->entity_type == 'private') checked @endif>
                        <label for="special" class="font-weight-bold">جهة خاصة</label>
                        <div class="text-danger">{{$errors->first('entity_type') ?? ''}}</div>
                    </div>
                    <div class="col-md-8">
                        <label class="font-weight-bold">عنوان الجهة</label>
                        <input type="text" class="form-control" name="entity_address" disabled
                               value="{{$order->entity_address}}">
                        <div class="text-danger">{{$errors->first('entity_address') ?? ''}}</div>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">ممثلها</label>
                        <input type="text" class="form-control" name="entity_owner" disabled
                               value="{{$order->entity_owner}}">
                        <div class="text-danger">{{$errors->first('entity_owner') ?? ''}}</div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">رقم التليفون</label>
                        <input type="text" class="form-control" name="entity_phone" disabled
                               value="{{$order->entity_phone}}">
                        <div class="text-danger">{{$errors->first('entity_phone') ?? ''}}</div>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">رقم الفاكس</label>
                        <input type="text" class="form-control" name="entity_fax" disabled
                               value="{{$order->entity_fax}}">
                        <div class="text-danger">{{$errors->first('entity_fax') ?? ''}}</div>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">بريد الكتروني</label>
                        <input type="text" class="form-control" name="entity_email" disabled
                               value="{{$order->entity_email}}">
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
                        <input type="text" class="form-control" name="office_name" disabled
                               value="{{$order->office_name}}">
                        <div class="text-danger">{{$errors->first('office_name') ?? ''}}</div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-6">
                        <label class="font-weight-bold">ممثله</label>
                        <input type="text" class="form-control" name="office_owner" disabled
                               value="{{$order->office_owner}}">
                        <div class="text-danger">{{$errors->first('office_owner') ?? ''}}</div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">رقم التليفون</label>
                        <input type="text" class="form-control" name="office_phone"
                               value="{{$order->office_phone}}">
                        <div class="text-danger">{{$errors->first('office_phone') ?? ''}}</div>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">رقم الفاكس</label>
                        <input type="text" class="form-control" name="office_fax" disabled
                               value="{{$order->office_fax}}">
                        <div class="text-danger">{{$errors->first('office_fax') ?? ''}}</div>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">بريد الكتروني</label>
                        <input type="text" class="form-control" name="office_email" disabled
                               value="{{$order->office_email}}">
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
                        <input type="text" class="form-control" name="en_office_name" disabled
                               value="{{$order->en_office_name}}">
                        <div class="text-danger">{{$errors->first('en_office_name') ?? ''}}</div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-6">
                        <label class="font-weight-bold">ممثله</label>
                        <input type="text" class="form-control" name="en_office_owner" disabled
                               value="{{$order->en_office_owner}}">
                        <div class="text-danger">{{$errors->first('en_office_owner') ?? ''}}</div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">رقم التليفون</label>
                        <input type="text" class="form-control" name="en_office_phone" disabled
                               value="{{$order->en_office_phone}}">
                        <div class="text-danger">{{$errors->first('en_office_phone') ?? ''}}</div>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">رقم الفاكس</label>
                        <input type="text" class="form-control" name="en_office_fax" disabled
                               value="{{$order->en_office_fax}}">
                        <div class="text-danger">{{$errors->first('en_office_fax') ?? ''}}</div>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">بريد الكتروني</label>
                        <input type="text" class="form-control" name="en_office_email" disabled
                               value="{{$order->en_office_email}}">
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
                        <input type="radio" name="building_empty" id="yes" value="yes" disabled
                               @if($order->building_empty == 'yes') checked @endif>
                        <label for="yes" class="font-weight-bold">نعم</label>
                        &nbsp;&nbsp;
                        <input type="radio" name="building_empty" id="no" value="no" disabled
                               @if($order->building_empty == 'no') checked @endif>
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
                        <input type="text" class="form-control" name="asbestos_type" disabled
                               value="{{$order->asbestos_type}}">
                        <div class="text-danger">{{$errors->first('asbestos_type') ?? ''}}</div>
                    </div>
                    <div class="col-md-12">
                        <label class="font-weight-bold">مواقع تواجده </label>
                        <br>
                        <input type="radio" name="asbestos_location" id="inside" disabled value="in"
                               @if($order->asbestos_location == 'in') checked @endif>
                        <label for="inside" class="font-weight-bold">داخل المبني</label>
                        |
                        <input type="radio" name="asbestos_location" id="outside" disabled value="no"
                               @if($order->asbestos_location == 'no') checked @endif>
                        <label for="outside" class="font-weight-bold">تمت ازالته</label>
                        <div class="text-danger">{{$errors->first('asbestos_location') ?? ''}}</div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-8">
                        <label class="font-weight-bold">الموقع بالتفصيل </label>
                        <input type="text" class="form-control" name="asbestos_location_detail" disabled
                               value="{{$order->asbestos_location_detail}}">
                        <div
                                class="text-danger">{{$errors->first('asbestos_location_detail') ?? ''}}</div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-8">
                        <label class="font-weight-bold">الكميات المتوقعة</label>
                        <input type="text" class="form-control" name="expected_quantity" disabled
                               value="{{$order->expected_quantity}}">
                        <div class="text-danger">{{$errors->first('expected_quantity') ?? ''}}</div>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-8">
                        <label class="font-weight-bold">الفترة الزمنية المتوقعة لازالته </label>
                        <input type="text" class="form-control" name="time_for_remove" disabled
                               value="{{$order->time_for_remove}}">
                        <div class="text-danger">{{$errors->first('time_for_remove') ?? ''}}</div>
                    </div>
                    <div class="col-md-12"></div>
                    {{--<div class="col-md-4">--}}
                        {{--<label class="font-weight-bold">مرفقات</label>--}}
                        {{--<input type="file" name="images[]" class="form-control" disabled multiple>--}}
                        {{--<div class="text-danger">{{$errors->first('images') ?? ''}}</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--<label class="font-weight-bold">اقرار التعهد</label>--}}
                        {{--<input type="file" name="file" class="form-control" disabled>--}}
                        {{--<div class="text-danger">{{$errors->first('file') ?? ''}}</div>--}}
                    {{--</div>--}}
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->attachments as $attachment)
                                <tr>
                                    <td>
                                        <a href="{{$attachment->file_path}}">
                                            عرض الملف
                                        </a>
                                    </td>
                                    <td>{{$attachment->file_type->title_ar ?? ''}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
                        <textarea class="form-control" disabled
                                  name="plan">{{$order->plan}}</textarea>
                        <div class="text-danger">{{$errors->first('plan') ?? ''}}</div>
                    </div>
                </div>
            </fieldset>
        </div>

    </div>
</div>
