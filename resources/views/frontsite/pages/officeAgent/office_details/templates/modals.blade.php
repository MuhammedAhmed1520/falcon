{{--company_attachment_modal--}}

<!-- Modal -->
<div class="modal fade" id="alerts_company_required" tabindex="-1" role="dialog"
     aria-labelledby="alerts_company_required" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-header">
          <h4 class="bg-danger text-white modal-title">لا يمكن إرسال الطلب</h4>
        </div>
        <div class="modal-content">
            @if(session()->has('office_agent_errors'))
                @include('frontsite.pages.officeAgent.office_details.templates.alerts_modal',['office_agent_errors'=>session()->get('office_agent_errors') ?? []])
            @endif
        </div>
        <div class="modal-footer">
          <h4 class="bg-danger text-white modal-title">يرجى إستكمال كافة البيانات الناقصة الموضحة أعلاه ومن ثم إعادة الإرسال</h4>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="company_attachment_modal" tabindex="-1" role="dialog"
     aria-labelledby="company_attachment_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            {{Form::open([
                'methods'=>'post',
                'route'=>'officeAgentUpdateCompanyAttachment',
                'id'=>'officeAgentUpdateCompanyAttachmentForm',
            ])}}
            <div class="modal-header">
                <h5 class="modal-title"> اضافة مرافقات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="progress">
                            <div class="progress-bar" id="company_attachment_progress" role="progressbar"
                                 style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">اسم الملف</label>
                        <select class="form-control" name="file_type_id" data-name="office_file_type">
                            @foreach($office_file_types as $office_file_type)
                                <option
                                    value="{{$office_file_type->id}}">{{$office_file_type->title_ar ?? ''}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">الملف</label>
                        <input class="form-control" type="file" accept="application/msword, application/pdf, image/*" name="file" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="company_attachment_close" data-dismiss="modal">
                    اغلاق
                </button>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="employee_attachment_modal" tabindex="-1" role="dialog"
     aria-labelledby="employee_attachment_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            {{Form::open([
                'methods'=>'post',
                'route'=>'officeAgentAddEmployeeAttachment',
                'id'=>'officeAgentAddEmployeeAttachmentForm',
            ])}}
            <div class="modal-header">
                <h5 class="modal-title"> اضافة مرافقات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="progress">
                            <div class="progress-bar" id="employee_attachment_progress" role="progressbar"
                                 style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black"> الموظف</label>
                        <select class="form-control" name="human_resource_id" data-name="hr">
                            <option value="">-- اختار --</option>
                            @foreach($office_agent->human_resources as $human_resource)
                                <option
                                    value="{{$human_resource->id}}">{{$human_resource->name}}  {{$human_resource->parent_name}}  {{$human_resource->family_name}}  </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">اسم الملف</label>
                        <select class="form-control" name="file_type_id" required data-name="human_resource_file_type">
                            <option value="">-- اختار --</option>
                            @foreach($human_resource_file_types as $human_resource_file_type)
                                <option
                                    value="{{$human_resource_file_type->id}}">{{$human_resource_file_type->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">الملف</label>
                        <input class="form-control" type="file" name="file"
                               accept="application/msword, application/pdf, image/*"
                               required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="employee_attachment_close" data-dismiss="modal">
                    اغلاق
                </button>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="installment_attachment_modal" tabindex="-1" role="dialog"
     aria-labelledby="installment_attachment_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            {{Form::open([
                'method'=>'post',
                'route'=>'officeAgentAddInstallmentAttachment',
                'id'=>'officeAgentAddInstallmentAttachmentForm',
            ])}}
            <div class="modal-header">
                <h5 class="modal-title"> اضافة مرافقات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="progress">
                            <div class="progress-bar" id="installment_attachment_progress" role="progressbar"
                                 style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">اسم الجهاز</label>
                        <select class="form-control" name="device_id">
                            <option value="">-- اختار --</option>
                            @foreach($office_agent->devices as $device)
                                <option value="{{$device->id}}">{{$device->device_type->name ?? ''}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">اسم الملف</label>
                        <select class="form-control" name="file_type_id" required data-name="device_file_type">
                            <option value="">-- اختار --</option>
                            @foreach($device_file_types as $type)
                                <option value="{{$type->id}}">{{$type->title_ar ?? ''}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">الملف</label>
                        <input class="form-control" type="file" accept="application/msword, application/pdf, image/*" required name="file">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="installment_attachment_close" data-dismiss="modal">
                    اغلاق
                </button>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="partner_add_modal" tabindex="-1" role="dialog"
     aria-labelledby="partner_add_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            {{Form::open([
                'methods'=>'post',
                'route'=>'handleCompanyAddPartenerRequest',
                'id'=>'handleCompanyAddPartenerRequestForm',
            ])}}
            <div class="modal-header">
                <h5 class="modal-title"> اضافة شركاء</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="progress">
                            <div class="progress-bar" id="partner_add_progress" role="progressbar"
                                 style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">اسم الملف</label>
                        <select class="form-control" name="file_type_id" data-name="partner_attachment_type">
                            @foreach($partner_attachment_types as $office_file_type)
                                <option
                                    value="{{$office_file_type->id}}">{{$office_file_type->title_ar ?? ''}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">الملف</label>
                        <input class="form-control" type="file" accept="application/msword, application/pdf, image/*" name="file" required>
                    </div>
                    <div class="col-md-12 mt-2"></div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">الاسم</label>
                        <input class="form-control" name="name" type="text" required>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">الرقم المدني</label>
                        <input class="form-control ssn arabicnumber" type="text" name="ssn" required>
                    </div>
                    <div class="col-md-12">
                        <label class="font-weight-bold text-black">ملاحظات</label>
                        <textarea class="form-control" name="notes"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="partner_add_close" data-dismiss="modal">اغلاق
                </button>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="branches_add_modal" tabindex="-1" role="dialog"
     aria-labelledby="branches_add_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            {{Form::open([
                'methods'=>'post',
                'route'=>'handleCompanyAddBranchRequest',
                'id'=>'handleCompanyAddBranchRequestForm',
            ])}}
            <div class="modal-header">
                <h5 class="modal-title"> اضافة فرع</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black"> فروع اخري للشركة / المختبر </label>
                        <select class="form-control" name="branch_type_id" id="another_branch_type"
                                data-name="branch_type">
                            <option value="">-- اختار --</option>
                            @foreach($branch_types as $another_branch_type)
                                <option value="{{$another_branch_type->id}}">{{$another_branch_type->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="branch_in" style="display: none" class="row">
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black"> المحافظة </label>
                        <select class="form-control" name="governorate_id" id="branch_gov">
                            <option value="">-- اختار --</option>
                            @foreach($governorates as $governorate)
                                <option
                                    @if(($office_agent->main_address->governorate_id ?? null) == $governorate->id) selected
                                    @endif value="{{$governorate->id}}">{{$governorate->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black"> المنطقة </label>
                        <select class="form-control" name="city_id" id="branch_city">
                            <option value="">-- اختار --</option>
                            @foreach($cities as $city)
                                <option @if(($office_agent->main_address->city_id ?? null) == $city->id) selected
                                        @endif value="{{$city->id}}">{{$city->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black">القطعة </label>
                        <input type="text" class="form-control" name="area">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black">القسيمة</label>
                        <input type="text" class="form-control" name="segment">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black">الشارع </label>
                        <input type="text" class="form-control" name="street">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black">البناية</label>
                        <input type="text" class="form-control" name="building">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black">الدور</label>
                        <input type="text" class="form-control" name="floor">
                    </div>
                </div>
                <div id="branch_out" style="display: none" class="row">
                    <div class="col-md-12">
                        <label class="font-weight-bold text-black">العنوان بالكامل </label>
                        <input type="text" class="form-control" name="full_address">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="branches_add_close" data-dismiss="modal">اغلاق
                </button>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="installment_add_modal" tabindex="-1" role="dialog"
     aria-labelledby="installment_add_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            {{Form::open([
                'methods'=>'post',
                'route'=>'officeAgentAddInstallment',
                'id'=>'officeAgentAddInstallmentForm',
            ])}}
            <div class="modal-header">
                <h5 class="modal-title"> اضافة معدات</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="device_id">
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">العدد </label>
                        <input class="form-control arabicnumber" type="text" name="number" autocomplete="off">
                    </div>
                    {{--@can('device_type_select',getOfficeAgentAuth())--}}
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black" style="display: block;">الجهاز او المعدات</label>
                        <select class="form-control" name="device_name" data-name="device_name_select">
                            @foreach($devices_types as $device_type)
                                <option value="{{$device_type->name}}">{{$device_type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{--@endcan--}}
                    {{--@can('device_type_input',getOfficeAgentAuth())--}}
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black" style="display: block;">الجهاز او المعدات</label>
                        <input type="text" class="form-control" name="device_name" data-name="device_name"
                               autocomplete="off">
                    </div>
                    {{--@endcan--}}
                    {{--<div class="col-md-6">--}}
                    <div class="col-md-12">
                        <label class="font-weight-bold text-black">الرقم التسلسلي </label><br>
                        <span class="serial_hint" style="display: none;">يجب عليك ادخال عدد <span
                                class="serial_number_helper">0</span> سيريال</span>
                        <textarea class="form-controls" type="text" name="serial" id="serial_tags"></textarea>
                        <span>عليك الضغط على زر Enter او Tab لاضافة المزيد من السيريال</span>
                        <div id="serial_validation"></div>
                    </div>
                    <div class="col-md-6"
                         @if($office_agent->classification_degree_id !=  16) style="display: none" @endif>
                        <label class="font-weight-bold text-black"> {{__('office_agent.lab_type')}}  </label>
                        <select class="form-control" type="text" name="lab_type_id">
                            <option value="">-- {{__('office_agent.choose')}} --</option>
                            @foreach($lab_types as $lab_type)
                                <option value="{{$lab_type->id}}">{{$lab_type->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="installment_add_close" data-dismiss="modal">اغلاق
                </button>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="employee_add_modal" tabindex="-1" role="dialog"
     aria-labelledby="employee_add_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            {{Form::open([
                'route'=>'AddHumanResourceEmployee',
                'id'=>'AddHumanResourceEmployeeForm',
                'method'=>'post'
            ])}}
            <div class="modal-header">
                <h5 class="modal-title"> اضافة موظف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mt-4">
                    <div class="col-md-6">
                        <input type="hidden" name="human_resource_id" value="">
                        <label class="font-weight-bold text-black">الصفة </label>
                        <select class="form-control" name="job_id" id="add_job_id" data-name="job">
                            <option value="">-- اختار --</option>
                            @foreach($human_resource_jobs as $job)
                                <option value="{{$job->id}}">{{$job->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">اسم الاول</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold text-black"> الاب</label>
                        <input type="text" class="form-control" name="parent_name">
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold text-black">العائلة</label>
                        <input type="text" class="form-control" name="family_name">
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">الرقم المدني</label>
                        <input type="text" class="form-control ssn arabicnumber" name="ssn">
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">   {{__('office_agent.work_duration')}} </label>
                        <input type="text" class="form-control" name="work_duration">
                    </div>
                    <div class="col-md-6">
                        <label
                            class="font-weight-bold text-black">   {{__('office_agent.expert_years_number')}} </label>
                        <input type="text" class="form-control arabicnumber" name="expert_years_number">
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">   {{__('office_agent.work_date')}} </label>
                        <input type="text" class="form-control date" name="work_date">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-3">
                        <label class="font-weight-bold text-black"> هاتف النقال</label>
                        <input type="text" class="form-control phone arabicnumber" name="phone">
                    </div>
                    <div class="col-md-5">
                        <label class="font-weight-bold text-black">البريد الالكتروني</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="col-md-5">
                        <label class="font-weight-bold text-black"> {{__('office_agent.residence_end_date')}}   </label>
                        <input type="text" class="form-control date" name="residence_end_date">
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold text-black">الجنس </label>
                        <select class="form-control" name="gender">
                            <option value="">-- اختار --</option>
                            <option value="male">ذكر</option>
                            <option value="female">انثي</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold text-black">الجنسية </label>
                        <select class="form-control" name="nationality" data-name="nationality">
                            <option value="">-- {{__('office_agent.choose')}} --</option>
                            <option value="kuwaiti"> {{__('office_agent.kuwaiti')}} </option>
                            <option value="notKuwaiti"> {{__('office_agent.notKuwaiti')}} </option>
                            {{--                            @foreach($nationalities as $nationality)--}}
                            {{--                                <option value="{{$nationality->id}}">{{$nationality->name}}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black">الدرجة العلمية </label>
                        <select class="form-control" name="degree_id" id="employee_add_degree"
                                data-name="human_resource_degree">
                            <option value="">-- اختار --</option>
                            @foreach($human_resource_degrees as $job)
                                <option value="{{$job->id}}">{{$job->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="font-weight-bold text-black">التخصص العلمي </label>
                        <select class="form-control" name="specialization_id" id="employee_add_specialization"
                                data-name="human_resource_specialization">
                            <option value="">-- اختار --</option>
                            @foreach($human_resource_specializations as $job)
                                <option value="{{$job->id}}">{{$job->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4" id="add_emp_job_title" style="display: none">
                        <label class="font-weight-bold text-black"> المسمي الوظيفي</label>
                        <input type="text" class="form-control" name="job_title">
                    </div>
                    <div class="col-md-4" id="add_emp_specialize" style="display: none">
                        <label class="font-weight-bold text-black">التخصص العلمي</label>
                        <input type="text" class="form-control" name="specialization_title">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="employee_add_close" class="btn btn-secondary" data-dismiss="modal">اغلاق
                </button>
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="certificates_modal" tabindex="-1" role="dialog"
     aria-labelledby="certificates_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> الشهادات المتاحة  </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach($office_agent->certificates ?? [] as $certificate)
                        <div class="col-md-6 mt-2">
                             <a href="{{route('getAgentCertify',['type'=>$office_agent->form_type,'certificate_id'=>$certificate->id])}}"
                                   class="btn btn-info">
                                    شهادة {{$certificate->certificate->title_ar ?? ''}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
