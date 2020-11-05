{{Form::open([
    'route'=>'officeAgentUpdateInfo',
    'method'=>'post',
    'id'=>'officeAgentUpdateInfoForm'
])}}
<div class="row mt-4">
    <div class="col-md-4">
        <label class="font-weight-bold text-black">اسم الشركة</label>
        <input type="text" class="form-control input_attributes" name="office_name_ar"
               value="{{$office_agent->office_name_ar ?? ''}}">
    </div>
    <div class="col-md-4">
        <label class="font-weight-bold text-black">Company Name</label>
        <input type="text" class="form-control input_attributes" name="office_name_en"
               value="{{$office_agent->office_name_en ?? ''}}">
    </div>
</div>

<div class="row mt-1">
    {{--    @can('office_section_type_id',getOfficeAgentAuth())--}}
    <div class="col-md-2">
        <label class="font-weight-bold text-black">نوع القطاع</label>
        <select class="form-control input_attributes" name="office_section_type_id" data-name="office_section_type">
            <option value="">-- اختار --</option>
            @foreach($office_section_type as $type)
                <option @if($office_agent->office_section_type_id == $type->id) selected
                        @endif value="{{$type->id}}">{{$type->title_ar}}</option>
            @endforeach
        </select>
    </div>
    {{--@endcan--}}
    {{--@can('office_section_activity_id',getOfficeAgentAuth())--}}
    <div class="col-md-4">
        <label class="font-weight-bold text-black">نشاط القطاع</label>
        <select class="form-control input_attributes" name="office_section_activity_id"
                data-name="office_section_activity">
            <option value="">-- اختار --</option>
            @foreach($office_section_activity as $activity)
                <option @if($office_agent->office_section_activity_id == $activity->id) selected
                        @endif  value="{{$activity->id}}">{{$activity->title_ar}}</option>
            @endforeach
        </select>
    </div>
    {{--@endcan--}}
    {{--@can('company_type_id',getOfficeAgentAuth())--}}
    <div class="col-md-2">
        <label class="font-weight-bold text-black">نوع الشركة</label>
        <select class="form-control input_attributes" name="company_type_id" data-name="company_type">
            <option value="">-- اختار --</option>
            @foreach($company_type as $c_type)
                <option @if($office_agent->company_type_id == $c_type->id) selected
                        @endif  value="{{$c_type->id}}">{{$c_type->title_ar}}</option>
            @endforeach
        </select>
    </div>
    {{--@endcan--}}
</div>

<div class="row mt-1">
    <div class="col-md-3">
        {{--        @can('license_number',getOfficeAgentAuth())--}}
        <label class="font-weight-bold text-black">{{__('office_agent.license_number')}}     </label>
        {{--@endcan--}}
        {{--        @can('registration_number',getOfficeAgentAuth())--}}
        {{--<label class="font-weight-bold text-black">{{__('office_agent.registration_number')}}     </label>--}}
        {{--@endcan--}}
        <input type="text" class="form-control  input_attributes" name="license_number"
               value="{{$office_agent->license_number ?? ''}}">
    </div>
    {{--    @can('registration_date',getOfficeAgentAuth())--}}
    <div class="col-md-3">
        <label class="font-weight-bold text-black">{{__('office_agent.registration_date')}}     </label>
        @if(($office_agent->registration_date ?? null) < \Carbon\Carbon::now() && ($office_agent->registration_date ?? null) != null)
            <b
                    class="text-danger">منتهي</b> @endif
        <input type="text" class="form-control license_end_date input_attributes" name="registration_date"
               @if(($office_agent->registration_date ?? null) < \Carbon\Carbon::now() && ($office_agent->registration_date ?? null) != null)
               style="border: 2px solid red;background: #f4433654"
               @endif
               value="{{$office_agent->registration_date ?? ''}}">
    </div>
    {{--@endcan--}}
    <div class="col-md-3">
        {{--        @can('license_end_date',getOfficeAgentAuth())--}}
        {{--<label class="font-weight-bold text-black">{{__('office_agent.license_ex_date')}}     </label>--}}
        {{--@endcan--}}
        {{--        @can('registration_end_date',getOfficeAgentAuth())--}}
        <label class="font-weight-bold text-black">{{__('office_agent.register_ex_date')}}     </label>
        {{--@endcan--}}
        @if(($office_agent->license_end_date ?? null) < \Carbon\Carbon::now() && ($office_agent->license_end_date ?? null) != null)
            <b
                    class="text-danger">منتهي</b> @endif
        <input type="text" class="form-control license_end_date input_attributes" name="license_end_date"
               @if(($office_agent->license_end_date ?? null) < \Carbon\Carbon::now() && ($office_agent->license_end_date ?? null) != null)
               style="border: 2px solid red;background: #f4433654"
               @endif
               value="{{$office_agent->license_end_date ?? ''}}">
    </div>
</div>

<div class="row mt-1">
    <div class="col-md-4">
        <label class="font-weight-bold text-black">الاسم الاول</label>
        <input type="text" class="form-control arabic_character input_attributes" name="owner_name"
               value="{{$office_agent->owner_name ?? ''}}">
    </div>
    <div class="col-md-2">
        <label class="font-weight-bold text-black">الاب</label>
        <input type="text" class="form-control arabic_character input_attributes" name="owner_parent_name"
               value="{{$office_agent->owner_parent_name ?? ''}}">
    </div>
    <div class="col-md-2">
        <label class="font-weight-bold text-black">العائلة</label>
        <input type="text" class="form-control arabic_character input_attributes" name="owner_family_name"
               value="{{$office_agent->owner_family_name ?? ''}}">
    </div>
</div>

<div class="row mt-1">
    <div class="col-md-3">
        <label class="font-weight-bold text-black">الرقم المدني</label>
        <input type="text" class="form-control ssn arabicnumber input_attributes" name="owner_ssn"
               value="{{$office_agent->owner_ssn ?? ''}}">
    </div>
    <div class="col-md-3">
        <label class="font-weight-bold text-black">{{__('office_agent.ssn_file')}}    </label>
        <input type="file" class="form-control input_attributes" name="national_id"
               accept="application/msword, application/pdf, image/*">
        @if($office_agent->national_id->file_path ?? '')
            <a href="{{$office_agent->national_id->file_path ?? ''}}" class="font-weight-bold"><i
                        class="icon icon-image"></i> {{__('office_agent.download')}}</a>
        @endif
    </div>
</div>

<div class="row mt-1">
    <div class="col-md-3">
        <label class="font-weight-bold text-black">هاتف المكتب </label>
        <input type="text" class="form-control phone arabicnumber input_attributes" name="office_phone"
               value="{{$office_agent->office_phone ?? ''}}">
    </div>
    <div class="col-md-3">
        <label class="font-weight-bold text-black">هاتف النقال</label>
        <input type="text" class="form-control phone arabicnumber input_attributes" name="owner_phone"
               value="{{$office_agent->owner_phone ?? ''}}">
    </div>
    <div class="col-md-3">
        <label class="font-weight-bold text-black">البريد الالكتروني</label>
        <input type="email" class="form-control input_attributes" name="owner_email"
               value="{{$office_agent->owner_email ?? ''}}">
    </div>
</div>

<div class="row mt-1">
    {{--    @can('contact_officer_name',getOfficeAgentAuth())--}}
    <div class="col-md-3">
        <label class="font-weight-bold text-black"> اسم ضابط الاتصال </label>
        <input type="text" class="form-control input_attributes" name="contact_officer_name"
               value="{{$office_agent->contact_officer_name ?? ''}}">
    </div>
    {{--@endcan--}}
    {{--    @can('contact_officer_name',getOfficeAgentAuth())--}}
    <div class="col-md-3">
        <label class="font-weight-bold text-black">هاتف ضابط الاتصال </label>
        <input type="text" class="form-control phone arabicnumber input_attributes" name="contact_officer_phone"
               value="{{$office_agent->contact_officer_phone ?? ''}}">
    </div>
    {{--@endcan--}}
</div>

<div class="row mt-1">
    <input type="hidden" name="address_id" value="{{$office_agent->main_address->id ?? 0}}">
    <div class="col-md-3">
        <label class="font-weight-bold text-black"> المحافظة </label>
        <select class="form-control input_attributes" name="governorate_id" id="company_gov">
            <option value="">-- اختار --</option>
            @foreach($governorates as $governorate)
                <option @if(($office_agent->main_address->governorate_id ?? null) == $governorate->id) selected
                        @endif value="{{$governorate->id}}">{{$governorate->title_ar}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label class="font-weight-bold text-black"> المنطقة </label>
        <select class="form-control input_attributes" name="city_id" id="company_city">
            <option value="">-- اختار --</option>
            @foreach($cities as $city)
                <option @if(($office_agent->main_address->city_id ?? null) == $city->id) selected
                        @endif value="{{$city->id}}">{{$city->title_ar}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label class="font-weight-bold text-black">القطعة </label>
        <input type="text" class="form-control input_attributes" name="area"
               value="{{$office_agent->main_address->area ?? ''}}">
    </div>
    <div class="col-md-3">
        <label class="font-weight-bold text-black">القسيمة</label>
        <input type="text" class="form-control input_attributes" name="segment"
               value="{{$office_agent->main_address->segment ?? ''}}">
    </div>
</div>

<div class="row mt-1">
    <div class="col-md-3">
        <label class="font-weight-bold text-black">الشارع </label>
        <input type="text" class="form-control input_attributes" name="street"
               value="{{$office_agent->main_address->street ?? ''}}">
    </div>
    <div class="col-md-3">
        <label class="font-weight-bold text-black">البناية</label>
        <input type="text" class="form-control input_attributes" name="building"
               value="{{$office_agent->main_address->building ?? ''}}">
    </div>
    <div class="col-md-3">
        <label class="font-weight-bold text-black">الدور</label>
        <input type="text" class="form-control input_attributes" name="floor"
               value="{{$office_agent->main_address->floor ?? ''}}">
    </div>
</div>

<div class="row mt-1">
    <div class="col-md-3">
        <label class="font-weight-bold text-black">
            @if(in_array($office_agent->office_type_id,[1,4]))
                {{__('office_agent.company_branch_other')}}
            @else
                {{__('office_agent.company_branch')}}
            @endif
        </label>
        <select class="form-control input_attributes" name="another_branch_type_id" data-name="another_branch_type">
            <option value="">-- اختار --</option>
            @foreach($another_branch_types as $another_branch_type)
                <option @if($office_agent->another_branch_type_id == $another_branch_type->id) selected
                        @endif value="{{$another_branch_type->id}}">{{$another_branch_type->title_ar}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label class="font-weight-bold text-black"> عقد تعاون أو وكالة </label>
        <select class="form-control input_attributes" name="contract_type_id" data-name="contract_type">
            <option value="">-- اختار --</option>
            @foreach($contract_types as $contract_type)
                <option @if($office_agent->contract_type_id == $contract_type->id) selected
                        @endif  value="{{$contract_type->id}}">{{$contract_type->title_ar}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label class="font-weight-bold input_attributes text-black">تاريخ انتهاء العقد</label>
        <input type="text" class="form-control contract_end_date" name="contract_end_date"
               value="{{$office_agent->contract_end_date ?? ''}}">
    </div>
</div>

{{--@can('iso_degree_id',getOfficeAgentAuth())--}}
<div class="row mt-3">

    <div class="col-md-3">
        <label class="font-weight-bold text-black"> شهادة الايزو
        </label>
        <button class="btn btn-info btn-sm" name="iso_degree_button" type="button" onclick="appendIsoDegree()">
            <i class="icon icon-plus"></i>
        </button>
        <select class="form-control input_attributes" name="iso_degree_id" data-name="iso_degree">
            <option value="">-- اختار --</option>
            @foreach($iso_dbs as $iso_db)
                <option @if($office_agent->iso_degree_id == $iso_db->id) selected
                        @endif  value="{{$iso_db->id}}">{{$iso_db->title_ar}}</option>
            @endforeach

        </select>
    </div>

    <div class="col-md-9 mt-2">
        <div class="row" id="iso_degree_table">
            @foreach($office_agent->iso_degree as $iso_degree)
                <div class="col-md-4">
                    <label
                            class="font-weight-bold text-black"> {{__('office_agent.other_iso_cert')}}        </label>
                    <div class="input-group  w-100">
                        <div class="input-group-prepend">
                            <button class="btn btn-danger deleteIsoDegree" type="button">
                                <i class="icon icon-minus"></i>
                            </button>
                        </div>
                        <select class="form-control input_attributes" name="iso_degree[]">
                            @foreach($isos as $iso)
                                <option value='{{$iso->id}}'
                                        @if($iso_degree->name == $iso->name) selected @endif>{{$iso->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
{{--@endcan--}}

<div class="row mt-3">
    <div class="col-md-4">

        {{--        @can('classification_degree_id',getOfficeAgentAuth())--}}
        <label class="font-weight-bold text-black">درجة التصنيف</label>
        <select class="form-control input_attributes" name="classification_degree_id"
                data-name="classification_degree">
            <option value="">-- اختار --</option>
            @foreach($classification_degrees as $classification_degree)
                <option @if($office_agent->classification_degree_id == $classification_degree->id) selected
                        @endif  value="{{$classification_degree->id}}">{{$classification_degree->title_ar}}</option>
            @endforeach
        </select>
        {{--@endcan--}}
    </div>
    <div class="col-md-12">

    </div>
    <div class="col-md-4">
        <label class="font-weight-bold text-black mt-2"> التخصص</label>

        <ul class="unstyled centered" id="specialize_checks">
            {{--            @foreach($specializes as $specialize)--}}
            {{--                <li>--}}
            {{--                    <input class="styled-checkbox special-checkbox" id="styled-checkbox-{{$specialize->id}}"--}}
            {{--                           name="specialize_ids[]"--}}
            {{--                           @if(in_array($specialize->id,$current_specializations)) checked="" @endif--}}
            {{--                           type="checkbox" value="{{$specialize->id}}">--}}
            {{--                    <label for="styled-checkbox-{{$specialize->id}}">{{$specialize->title_ar}}</label>--}}
            {{--                </li>--}}
            {{--            @endforeach--}}
        </ul>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-3"></div>
            </div>
            <div class="col-md-12">
                {{--@foreach($classification_degrees as $classification_degree)--}}
                    {{--<div class="alert alert-danger class_degree_ids" role="alert"--}}
                         {{--id="class_degree_id_{{$classification_degree->id}}"--}}
                         {{--@if($office_agent->classification_degree_id != $classification_degree->id) style="display: none;" @endif--}}
                         {{--@if(!$office_agent->classification_degree_id)--}}
                         {{--style="display: none;"--}}
                         {{--@endif--}}
                         {{--@if((count($office_agent->human_resources ?? []) >= 5) && $office_agent->classification_degree_id == 16)--}}
                         {{--style="display: none;"--}}
                         {{--@endif--}}
                         {{--@if((count($office_agent->human_resources ?? []) >= 2) && $office_agent->classification_degree_id == 17)--}}
                         {{--style="display: none;"--}}
                            {{--@endif>--}}
                        {{--<b>{{$classification_degree->description_ar}}</b>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
                @if($office_agent->classification_degree_id == 16  )
                    @if(count($office_agent->human_resources ?? []) < 5 && $office_agent->contract_type_id != 15)
                        <div class="alert alert-danger class_degree_ids" role="alert">
                            <b>{{$classification_degrees->where('id',16)->first()->description_ar}}</b>
                        </div>
                    @endif
                    @if(count($office_agent->human_resources ?? []) < 2 && $office_agent->contract_type_id == 15)
                        <div class="alert alert-danger class_degree_ids" role="alert">
                            <b>{{$classification_degrees->where('id',17)->first()->description_ar}}</b>
                        </div>
                    @endif
                @elseif($office_agent->classification_degree_id == 17)
                    @if(count($office_agent->human_resources ?? []) < 2)
                        <div class="alert alert-danger class_degree_ids" role="alert">
                            <b>{{$classification_degrees->where('id',17)->first()->description_ar}}</b>
                        </div>
                    @endif
                @endif
            </div>
            <div class="col-md-12" id="specialize_checks_alert"></div>
        </div>

    </div>
</div>

<div class="row mt-1">
    @if(checkSendAllowed($office_agent))
        <div class="col-md-3">
            <button class="btn btn-primary" name="edit_company">
                تعديل
            </button>
        </div>
    @endif
</div>

{{Form::close()}}

<div class="row mt-4" name="endorse">
    @if(checkSendAllowed($office_agent))
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-12">
            <a href="{{$office_agent->office_type->file}}"
               class="btn btn-link font-weight-bold">
                تحميل الاقرار
            </a>
        </div>
    @endif
    @if(checkSendAllowed($office_agent))
        {{Form::open([
            'method'=>'post',
            'route'=>'sendFinalOfficeData',
            'id' => 'endorseForm'
        ])}}
        <div class="col-md-12">
            <div class="col-md-12 mt-4">
                <input class="styled-checkbox" id="agree-checkbox-1" type="checkbox"
                       name="agreement"
                       required value="1">
                <label for="agree-checkbox-1">اقر بان كافه البيانات صحيحه </label>
            </div>
            <button class="btn btn-success" name="endorse">
                ارسال
            </button>
        </div>
        {{Form::close()}}
    @endif
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <hr>
        <h4 class="font-weight-bold text-black">
            <i class="icon icon-paperclip"></i>
            مرفقات بيانات الشركة
        </h4>
        @if(checkSendAllowed($office_agent))
            <button type="button" class="btn btn-danger float-right" data-toggle="modal" name="add_company_attachment"
                    data-target="#company_attachment_modal">
                اضافة مرفقات
            </button>
        @endif
    </div>
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="company_attachment_table">
            <thead>
            <tr>
                <th>#</th>
                <th>الملف</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($office_agent->attachments as $attachment)
                <tr id="company_attachment_file_{{$attachment->id}}">
                    <td>{{$attachment->file_type->title_ar ?? ''}}</td>
                    <td>
                        <a href="{{$attachment->file_path}}">
                            تنزيل
                        </a>
                    </td>
                    <td>
                        @if(checkSendAllowed($office_agent))
                            <button class="btn btn-danger btn-sm text-center" name="delete_company_attachment"
                                    onclick="deleteCompanyFile('{{$attachment->id}}')">
                                <i class="icon icon-trash mr-0"></i>
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
