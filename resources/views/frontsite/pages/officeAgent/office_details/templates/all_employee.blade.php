<div class="row mt-4">
    <div class="col-md-12">
        {{--        <hr>--}}
        <h4 class="font-weight-bold text-black">
            <i class="icon icon-user"></i>
            الموظفين
        </h4>
        @if(checkSendAllowed($office_agent))
            <button type="button" class="btn btn-danger float-right" data-toggle="modal" id="employee_add_modal_btn" name="add_hr"
                    onclick="resetToAddEmployee()"
                    data-target="#employee_add_modal">
                اضافة موظف
            </button>
        @endif
    </div>
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="all_employees_table">
            <thead>
            <tr>
                <th>#</th>
                <th>الصفة</th>
                <th>الاسم الاول</th>
                <th>الاب</th>
                <th>العائلة</th>
                <th>الجنسية</th>
                <th>مدة العمل فى المكتب</th>
                <th>عدد سنوات الخبرة</th>
                <th>تاريخ عقد العمل</th>
                <th> الدرجة العلمية</th>
                <th>التخصص العلمي</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($office_agent->human_resources as $human_resource)
                <tr id="all_employee_{{$human_resource->id}}">
                    <td>{{$human_resource->id}}</td>
                    <td>{{$human_resource->job->title_ar ?? ''}}</td>
                    <td>{{$human_resource->name ?? ''}}</td>
                    <td>{{$human_resource->parent_name ?? ''}}</td>
                    <td>{{$human_resource->family_name ?? ''}}</td>
                    <td>{{$human_resource->nationality ?? ''}}</td>
                    <td>{{$human_resource->work_duration ?? ''}}</td>
                    <td>{{$human_resource->expert_years_number ?? ''}}</td>
                    <td>{{$human_resource->work_date ?? ''}}</td>
                    <td>{{$human_resource->degree->title_ar ?? ''}} {{$human_resource->job_title ?? ''}}</td>
                    <td>{{$human_resource->specialization->title_ar ?? ''}} {{ $human_resource->specialization_title ?? '' }}</td>
                    <td>
                        @if(checkSendAllowed($office_agent))
                            @php
                                $human_resource = $human_resource->makeHidden('attachments');
                            @endphp
                            <button class="btn btn-info" id="employee_row_{{$human_resource->id ?? null}}" name="edit_hr"
                                    onclick="editEmployee('{{$human_resource}}')">
                                <i class="icon icon-edit mr-0"></i>
                            </button>
                            <button class="btn btn-danger" onclick="deleteEmployee('{{$human_resource->id}}')" name="delete_hr">
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


<div class="row mt-4">
    <div class="col-md-12">
        <hr>
        <h4 class="font-weight-bold text-black">
            <i class="icon icon-paperclip"></i>
            مرفقات الكوادر البشرية
        </h4>
        @if(checkSendAllowed($office_agent))
            <button type="button" class="btn btn-danger float-right" data-toggle="modal" onclick="loadEmployessData()" name="add_hr_attachment"
                    data-target="#employee_attachment_modal">
                اضافة مرفقات
            </button>
        @endif
    </div>
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="employee_attachment_table">
            <thead>
            <tr>
                <th>#</th>
                <th>الموظف</th>
                <th>الملف</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($office_agent->human_resources_attachments as $human_resources_attachment)
                <tr id="attachment_employee_{{$human_resources_attachment->id}}">
                    <td>{{$human_resources_attachment->id}}</td>
                    <td>{{$human_resources_attachment->human_resource->name ?? ''}} {{$human_resources_attachment->human_resource->parent_name ?? ''}} {{$human_resources_attachment->human_resource->family_name ?? ''}}</td>
                    <td>
                        {{$human_resources_attachment->file_type->title_ar ?? ''}}
                        <a href="{{$human_resources_attachment->file_path}}">تنزيل</a>
                    </td>
                    <td>
                        @if(checkSendAllowed($office_agent))
                            <button class="btn btn-danger"
                                    onclick="deleteHumanResourceFile('{{$human_resources_attachment->id}}')" name="delete_hr_attachment">
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
