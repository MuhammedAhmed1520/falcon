<div class="row">
    <div class="col-md-12">
        {{--        <hr>--}}
        <h4 class="font-weight-bold text-black">
            <i class="icon icon-user"></i>
            {{__('office_agent.employees')}}
        </h4>

        @if(request()->route()->getName() == 'getRequestOrdersView')
            @can('edit-office-human-resource')
                <button type="button" class="btn btn-danger float-right" id="employee_add_modal_btn" data-toggle="modal"
                        onclick="resetToAddEmployee()"
                        data-target="#employee_add_modal">
                    {{__('office_agent.add')}}
                </button>
            @endcan
        @endif
    </div>
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="all_employees_table">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('office_agent.company_job')}}</th>
                <th>{{__('office_agent.first_name')}}</th>
                <th>{{__('office_agent.parent_name')}}</th>
                <th>{{__('office_agent.family_name')}}</th>
                <th>{{__('office_agent.nationality')}}</th>
                <th>{{__('office_agent.work_duration')}}</th>
                <th>{{__('office_agent.expert_years_number')}}</th>
                <th>{{__('office_agent.work_date')}}</th>
                <th>{{__('office_agent.grade')}}</th>
                <th>{{__('office_agent.specialization')}}</th>
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
                        @if(request()->route()->getName() == 'getRequestOrdersView')
                            @can('edit-office-human-resource')
                                <button class="btn btn-info" id="employee_row_{{$human_resource->id ?? null}}"
                                        onclick="editEmployee('{{$human_resource}}')">
                                    <i class="la la-edit mr-0"></i>
                                </button>
                            @endcan
                            @can('edit-office-human-resource')
                                <button class="btn btn-danger" onclick="deleteEmployee('{{$human_resource->id}}')">
                                    <i class="la la-remove mr-0"></i>
                                </button>
                            @endcan
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
            {{__('office_agent.hr_attachment')}}
        </h4>

        @if(request()->route()->getName() == 'getRequestOrdersView')
            @can('edit-office-human-resource')
                <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                        data-target="#employee_attachment_modal" onclick="loadEmployessData()">
                    {{__('office_agent.add')}}
                </button>
            @endcan
        @endif

        @if(count($office_agent->human_resources_attachments))
            <button type="button" class="btn btn-info mr-1 ml-1 float-right" data-toggle="modal"
                    data-target="#files_viewer_modal"
                    onclick="addFilesViewer('{{$office_agent->human_resources_attachments ?? []}}')">
                تصفح المرفقات
            </button>
        @endif
    </div>
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="employee_attachment_table">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('office_agent.employee')}}</th>
                <th>{{__('office_agent.file')}}</th>
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
                        <a href="{{$human_resources_attachment->file_path}}">{{__('office_agent.download')}}</a>
                    </td>
                    <td>
                        @if(request()->route()->getName() == 'getRequestOrdersView')
                            @can('edit-office-human-resource')
                                <button class="btn btn-danger"
                                        onclick="deleteHumanResourceFile('{{$human_resources_attachment->id}}')">
                                    <i class="la la-remove mr-0"></i>
                                </button>
                            @endcan
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
