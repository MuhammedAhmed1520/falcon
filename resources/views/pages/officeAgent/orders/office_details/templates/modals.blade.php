{{--company_attachment_modal--}}

<!-- Modal done -->
<div class="modal fade" id="company_attachment_modal" tabindex="-1" role="dialog"
     aria-labelledby="company_attachment_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            {{Form::open([
                'methods'=>'post',
                'route'=>['adminOfficeAgentUpdateCompanyAttachment',request()->id],
                'id'=>'adminOfficeAgentUpdateCompanyAttachmentForm',
            ])}}
            <div class="modal-header">
                <h5 class="modal-title"> {{__('office_agent.add')}}  {{__('office_agent.attachment')}}    </h5>
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
                        <label class="font-weight-bold text-black">{{__('office_agent.file')}}    </label>
                        <select class="form-control" name="file_type_id" data-name="office_file_type">
                            @foreach($office_file_types as $office_file_type)
                                <option
                                        value="{{$office_file_type->id}}">{{$office_file_type->title_ar ?? ''}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">{{__('office_agent.file')}}  </label>
                        <input class="form-control" type="file" name="file" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="company_attachment_close" data-dismiss="modal">
                    {{__('office_agent.close')}}
                </button>
                <button type="submit" class="btn btn-primary">{{__('office_agent.save')}}  </button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<!-- Modal done -->
<div class="modal fade" id="employee_attachment_modal" tabindex="-1" role="dialog"
     aria-labelledby="employee_attachment_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            {{Form::open([
                'methods'=>'post',
                'route'=>['adminOfficeAgentAddEmployeeAttachment',request()->id],
                'id'=>'adminOfficeAgentAddEmployeeAttachmentForm',
            ])}}
            <div class="modal-header">
                <h5 class="modal-title"> {{__('office_agent.add')}}  {{__('office_agent.attachment')}}    </h5>
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
                        <label class="font-weight-bold text-black"> {{__('office_agent.employee')}}  </label>
                        <select class="form-control" name="human_resource_id">
                            <option value="">-- {{__('office_agent.choose')}} --</option>
                            @foreach($office_agent->human_resources as $human_resource)
                                <option
                                        value="{{$human_resource->id}}">{{$human_resource->name}}  {{$human_resource->parent_name}}  {{$human_resource->family_name}}  </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">{{__('office_agent.file')}}    </label>
                        <select class="form-control" name="file_type_id" required data-name="human_resource_file_type">
                            <option value="">-- {{__('office_agent.choose')}} --</option>
                            @foreach($human_resource_file_types as $human_resource_file_type)
                                <option
                                        value="{{$human_resource_file_type->id}}">{{$human_resource_file_type->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">{{__('office_agent.file')}}  </label>
                        <input class="form-control" type="file" name="file" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="employee_attachment_close" data-dismiss="modal">
                    {{__('office_agent.close')}}
                </button>
                <button type="submit" class="btn btn-primary">{{__('office_agent.save')}}  </button>
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
                'route'=>['adminOfficeAgentAddInstallmentAttachment',request()->id],
                'id'=>'adminOfficeAgentAddInstallmentAttachmentForm',
            ])}}
            <div class="modal-header">
                <h5 class="modal-title"> {{__('office_agent.add')}}  {{__('office_agent.attachment')}}    </h5>
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
                        <label class="font-weight-bold text-black">{{__('office_agent.device')}}    </label>
                        <select class="form-control" name="device_id">
                            <option value="">-- {{__('office_agent.choose')}} --</option>
                            @foreach($office_agent->devices as $device)
                                <option value="{{$device->id}}">{{$device->device_type->name ?? ''}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">{{__('office_agent.file')}}    </label>
                        <select class="form-control" name="file_type_id" required data-name="device_file_type">
                            <option value="">-- {{__('office_agent.choose')}} --</option>
                            @foreach($device_file_types as $type)
                                <option value="{{$type->id}}">{{$type->title_ar ?? ''}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black"> {{__('office_agent.file')}} </label>
                        <input class="form-control" type="file" required name="file">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="installment_attachment_close" data-dismiss="modal">
                    {{__('office_agent.close')}}
                </button>
                <button type="submit" class="btn btn-primary"> {{__('office_agent.save')}} </button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<!-- Modal done -->
<div class="modal fade" id="partner_add_modal" tabindex="-1" role="dialog"
     aria-labelledby="partner_add_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            {{Form::open([
                'methods'=>'post',
                'route'=>['adminHandleCompanyAddPartenerRequest',request()->id],
                'id'=>'adminHandleCompanyAddPartenerRequestForm',
            ])}}
            <div class="modal-header">
                <h5 class="modal-title">  {{__('office_agent.add')}}  {{__('office_agent.partners')}}    </h5>
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
                        <label class="font-weight-bold text-black"> {{__('office_agent.file')}}   </label>
                        <select class="form-control" name="file_type_id" data-name="partner_attachment_type">
                            @foreach($partner_attachment_types as $office_file_type)
                                <option
                                        value="{{$office_file_type->id}}">{{$office_file_type->title_ar ?? ''}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black"> {{__('office_agent.file')}} </label>
                        <input class="form-control" type="file" name="file" required>
                    </div>
                    <div class="col-md-12 mt-2"></div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black"> {{__('office_agent.name')}} </label>
                        <input class="form-control" name="name" type="text" required>
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black"> {{__('office_agent.ssn')}} </label>
                        <input class="form-control ssn arabicnumber" type="text" name="ssn" required>
                    </div>
                    <div class="col-md-12">
                        <label class="font-weight-bold text-black"> {{__('office_agent.notes')}} </label>
                        <textarea class="form-control" name="notes"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="partner_add_close"
                        data-dismiss="modal"> {{__('office_agent.close')}}
                </button>
                <button type="submit" class="btn btn-primary"> {{__('office_agent.save')}} </button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<!-- Modal done -->
<div class="modal fade" id="branches_add_modal" tabindex="-1" role="dialog"
     aria-labelledby="branches_add_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            {{Form::open([
                'methods'=>'post',
                'route'=>['adminHandleCompanyAddBranchRequest',request()->id],
                'id'=>'adminHandleCompanyAddBranchRequestForm',
            ])}}
            <div class="modal-header">
                <h5 class="modal-title">    {{__('office_agent.add')}}  {{__('office_agent.branches')}}  </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <label
                                class="font-weight-bold text-black">     {{__('office_agent.company_branch')}}     </label>
                        <select class="form-control" name="branch_type_id" id="another_branch_type"
                                data-name="branch_type">
                            <option value="">-- {{__('office_agent.choose')}} --</option>
                            @foreach($branch_types as $another_branch_type)
                                <option value="{{$another_branch_type->id}}">{{$another_branch_type->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="branch_in" style="display: none" class="row">
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black"> {{__('office_agent.government')}} </label>
                        <select class="form-control" name="governorate_id" id="branch_gov">
                            <option value="">-- {{__('office_agent.choose')}} --</option>
                            @foreach($governorates as $governorate)
                                <option
                                        @if(($office_agent->main_address->governorate_id ?? null) == $governorate->id) selected
                                        @endif value="{{$governorate->id}}">{{$governorate->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black"> {{__('office_agent.region')}} </label>
                        <select class="form-control" name="city_id" id="branch_city">
                            <option value="">-- {{__('office_agent.choose')}} --</option>
                            @foreach($cities as $city)
                                <option @if(($office_agent->main_address->city_id ?? null) == $city->id) selected
                                        @endif value="{{$city->id}}">{{$city->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black">{{__('office_agent.area')}} </label>
                        <input type="text" class="form-control" name="area">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black">{{__('office_agent.segment')}}</label>
                        <input type="text" class="form-control" name="segment">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black">{{__('office_agent.street')}} </label>
                        <input type="text" class="form-control" name="street">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black">{{__('office_agent.building')}}</label>
                        <input type="text" class="form-control" name="building">
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black">{{__('office_agent.floor')}}</label>
                        <input type="text" class="form-control" name="floor">
                    </div>
                </div>
                <div id="branch_out" style="display: none" class="row">
                    <div class="col-md-12">
                        <label class="font-weight-bold text-black">{{__('office_agent.full_address')}}   </label>
                        <input type="text" class="form-control" name="full_address">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="branches_add_close"
                        data-dismiss="modal">{{__('office_agent.close')}}
                </button>
                <button type="submit" class="btn btn-primary">{{__('office_agent.save')}}</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<!-- Modal done -->
<div class="modal fade" id="installment_add_modal" tabindex="-1" role="dialog"
     aria-labelledby="installment_add_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            {{Form::open([
                'methods'=>'post',
                'route'=>['adminOfficeAgentAddInstallment',request()->id],
                'id'=>'adminOfficeAgentAddInstallmentForm',
            ])}}
            <div class="modal-header">
                <h5 class="modal-title">  {{__('office_agent.add')}}  {{__('office_agent.devices')}}   </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black"> {{__('office_agent.number')}}  </label>
                        <input class="form-control arabicnumber" type="text" name="number">
                    </div>
                    <input type="hidden" name="device_id">
                    @can('device_type_select',$office_agent)
                        <div class="col-md-6">
                            <label class="font-weight-bold text-black"
                                   style="display: block;">{{__('office_agent.devices')}}      </label>
                            <select class="form-control" name="device_name">
                                @foreach($devices_types as $device_type)
                                    <option value="{{$device_type->name}}">{{$device_type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endcan
                    @can('device_type_input',$office_agent)
                        <div class="col-md-6">
                            <label class="font-weight-bold text-black">   {{__('office_agent.devices')}} </label>
                            <input type="text" class="form-control" name="device_name">
                        </div>
                    @endcan
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black"> {{__('office_agent.serial')}}  </label>
                        <input class="form-control arabicnumber" type="text" name="serial">
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
                <button type="button" class="btn btn-secondary" id="installment_add_close"
                        data-dismiss="modal"> {{__('office_agent.close')}}
                </button>
                <button type="submit" class="btn btn-primary"> {{__('office_agent.save')}} </button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<!-- Modal done -->
<div aria-hidden="true" aria-labelledby="employee_add_modal" class="modal fade" id="employee_add_modal"
     role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            {{Form::open([
                'route'=>['adminAddHumanResourceEmployee',request()->id],
                'id'=>'adminAddHumanResourceEmployeeForm',
                'method'=>'post'
            ])}}
            <div class="modal-header">
                <h5 class="modal-title">  {{__('office_agent.add')}}   {{__('office_agent.employee')}}   </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mt-4">
                    <div class="col-md-6">
                        <input type="hidden" name="human_resource_id" value="">
                        <label class="font-weight-bold text-black"> {{__('office_agent.company_job')}}  </label>
                        <select class="form-control" name="job_id" id="add_job_id" data-name="human_resource_job">
                            <option value="">-- {{__('office_agent.choose')}} --</option>
                            @foreach($human_resource_jobs as $job)
                                <option value="{{$job->id}}">{{$job->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black"> {{__('office_agent.first_name')}}   </label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold text-black">  {{__('office_agent.parent_name')}} </label>
                        <input type="text" class="form-control" name="parent_name">
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold text-black"> {{__('office_agent.family_name')}} </label>
                        <input type="text" class="form-control" name="family_name">
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">   {{__('office_agent.ssn')}} </label>
                        <input type="text" class="form-control ssn arabicnumber" name="ssn">
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">   {{__('office_agent.work_duration')}} </label>
                        <input type="text" class="form-control" name="work_duration">
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">   {{__('office_agent.expert_years_number')}} </label>
                        <input type="text" class="form-control arabicnumber" name="expert_years_number">
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold text-black">   {{__('office_agent.work_date')}} </label>
                        <input type="text" class="form-control date" name="work_date">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-3">
                        <label class="font-weight-bold text-black">  {{__('office_agent.phone')}}   </label>
                        <input type="text" class="form-control phone arabicnumber" name="phone">
                    </div>
                    <div class="col-md-5">
                        <label class="font-weight-bold text-black"> {{__('office_agent.email')}}   </label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="col-md-5">
                        <label class="font-weight-bold text-black"> {{__('office_agent.residence_end_date')}}   </label>
                        <input type="text" class="form-control date" name="residence_end_date">
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold text-black"> {{__('office_agent.gender')}}  </label>
                        <select class="form-control" name="gender">
                            <option value="">-- {{__('office_agent.choose')}} --</option>
                            <option value="male"> {{__('office_agent.male')}} </option>
                            <option value="female"> {{__('office_agent.female')}} </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold text-black"> {{__('office_agent.nationality')}}  </label>
                        <select class="form-control" name="nationality">
                            <option value="">-- {{__('office_agent.choose')}} --</option>
                            <option value="kuwaiti"> {{__('office_agent.kuwaiti')}} </option>
                            <option value="notKuwaiti"> {{__('office_agent.notKuwaiti')}} </option>
                            {{--                            <option value="">-- {{__('office_agent.choose')}} --</option>--}}
                            {{--                            @foreach($nationalities as $nationality)--}}
                            {{--                                <option value="{{$nationality->id}}">{{$nationality->name}}</option>--}}
                            {{--                            @endforeach--}}
                        </select>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-4">
                        <label class="font-weight-bold text-black"> {{__('office_agent.grade')}}    </label>
                        <select class="form-control" name="degree_id" id="employee_add_degree"
                                data-name="human_resource_degree">
                            <option value="">-- {{__('office_agent.choose')}} --</option>
                            @foreach($human_resource_degrees as $job)
                                <option value="{{$job->id}}">{{$job->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="font-weight-bold text-black">   {{__('office_agent.specialization')}}  </label>
                        <select class="form-control" name="specialization_id" id="employee_add_specialization"
                                data-name="human_resource_specialization">
                            <option value="">-- {{__('office_agent.choose')}} --</option>
                            @foreach($human_resource_specializations as $job)
                                <option value="{{$job->id}}">{{$job->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4" id="add_emp_job_title" style="display: none">
                        <label class="font-weight-bold text-black">  {{__('office_agent.job_title')}}   </label>
                        <input type="text" class="form-control" name="job_title">
                    </div>
                    <div class="col-md-4" id="add_emp_specialize" style="display: none">
                        <label
                                class="font-weight-bold text-black"> {{__('office_agent.specialization_title')}}   </label>
                        <input type="text" class="form-control" name="specialization_title">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" id="employee_add_close" class="btn btn-secondary"
                        data-dismiss="modal">{{__('office_agent.close')}}
                </button>
                <button type="submit" class="btn btn-primary">{{__('office_agent.save')}}</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>


<!-- Modal done -->
<div class="modal fade" id="files_viewer_modal" tabindex="-1" role="dialog"
     aria-labelledby="files_viewer_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="bg-white" style="overflow:hidden;padding: 9px;font-size: 21px;font-weight: bold;">
                <div class=" float-left" id="file_name_viewer"></div>
                <div class="float-right" id="loop_page_viewer"></div>
            </div>
            <div class="bg-white" style="overflow:hidden;padding: 9px;font-size: 21px;font-weight: bold;">
                <button class="btn btn-info float-left" onclick="showNextFile()">التالى</button>
                <button class="btn btn-info float-right" onclick="showPrevFile()">السابق</button>
            </div>
            <iframe id="file_viewer_frame" src="" width="100%" frameborder="0" height="700px"></iframe>
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
                             <a href="{{route('getFormCertify',['id'=>$office_agent->id,'type'=>$office_agent->form_type,'certificate_id'=>$certificate->id])}}"
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
