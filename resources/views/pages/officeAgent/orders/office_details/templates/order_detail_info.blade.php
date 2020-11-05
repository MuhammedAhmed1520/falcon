{{Form::open([
    'route'=>['adminOfficeAgentUpdateInfo',request()->id],
    'method'=>'post',
    'id'=>'adminOfficeAgentUpdateInfoForm'
])}}
<div class="row mt-4">
    <div class="col-md-12">
        <fieldset id="section_1">
            <legend>.1</legend>
            <div class="row mt-1">
                {{--@can('office_name_ar',$office_agent)--}}
                <div class="col-md-4">
                    <label class="font-weight-bold text-black">{{__('office_agent.company_name_ar')}}    </label>
                    <input type="text" class="form-control" name="office_name_ar"
                           value="{{$office_agent->office_name_ar ?? ''}}"
                           disabled>
                </div>
                {{--@endcan--}}
                <div class="col-md-4">
                    <label class="font-weight-bold text-black">  {{__('office_agent.company_name_en')}} </label>
                    <input type="text" class="form-control" name="office_name_en"
                           value="{{$office_agent->office_name_en ?? ''}}"
                           disabled>
                </div>
            </div>
            <div class="row mt-2">

                {{--                @can('office_section_type_id',$office_agent)--}}
                <div class="col-md-2">
                    <label class="font-weight-bold text-black">{{__('office_agent.section_type')}}  </label>
                    <select class="form-control" name="office_section_type_id" disabled
                            data-name="office_section_type">
                        <option value="">-- {{__('office_agent.choose')}} --</option>
                        @foreach($office_section_type as $type)
                            <option @if($office_agent->office_section_type_id == $type->id) selected
                                    @endif value="{{$type->id}}">{{$type->title_ar}}</option>
                        @endforeach
                    </select>
                </div>
                {{--@endcan--}}

                {{--                @can('office_section_activity_id',$office_agent)--}}
                <div class="col-md-4">
                    <label class="font-weight-bold text-black"> {{__('office_agent.section_activity')}}  </label>
                    <select class="form-control" name="office_section_activity_id" disabled
                            data-name="office_section_activity">
                        <option value="">-- {{__('office_agent.choose')}} --</option>
                        @foreach($office_section_activity as $activity)
                            <option @if($office_agent->office_section_activity_id == $activity->id) selected
                                    @endif  value="{{$activity->id}}">{{$activity->title_ar}}</option>
                        @endforeach
                    </select>
                </div>
                {{--@endcan--}}

                {{--@can('company_type_id',$office_agent)--}}
                <div class="col-md-2">
                    <label class="font-weight-bold text-black">{{__('office_agent.company_type')}}  </label>
                    <select class="form-control" name="company_type_id" data-name="company_type" disabled>
                        <option value="">-- {{__('office_agent.choose')}} --</option>
                        @foreach($company_type as $c_type)
                            <option @if($office_agent->company_type_id == $c_type->id) selected
                                    @endif  value="{{$c_type->id}}">{{$c_type->title_ar}}</option>
                        @endforeach
                    </select>
                </div>
                {{--@endcan--}}
            </div>
        </fieldset>
    </div>
    <div class="col-md-12">
        <fieldset id="section_2">
            <legend>.2</legend>
            <div class="row mt-1">
                <div class="col-md-3">
                    {{--@can('license_number',$office_agent)--}}
                    <label class="font-weight-bold text-black">{{__('office_agent.license_number')}}     </label>
                    {{--@endcan--}}
                    {{--                    @can('registration_number',$office_agent)--}}
                    {{--<label--}}
                    {{--class="font-weight-bold text-black">{{__('office_agent.registration_number')}}     </label>--}}
                    {{--@endcan--}}
                    <input type="text" class="form-control " name="license_number" disabled
                           value="{{$office_agent->license_number ?? ''}}">
                </div>
                {{--@can('registration_date',$office_agent)--}}
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">{{__('office_agent.registration_date')}}     </label>
                    @if(($office_agent->registration_date ?? null) < \Carbon\Carbon::now()&& ($office_agent->registration_date ?? null) != null)
                        <b
                                class="text-danger">منتهي</b> @endif
                    <input type="text" class="form-control license_end_date" name="registration_date" disabled
                           @if(($office_agent->registration_date ?? '') < \Carbon\Carbon::now()&& ($office_agent->registration_date ?? null) != null)
                           style="border: 2px solid red;background: #f4433654"
                           @endif
                           value="{{$office_agent->registration_date ?? ''}}">
                </div>
                {{--@endcan--}}
                <div class="col-md-3">
                    {{--                    @can('license_end_date',$office_agent)--}}
                    <label class="font-weight-bold text-black">{{__('office_agent.license_ex_date')}}     </label>

                    {{--@endcan--}}
                    {{--                    @can('registration_end_date',$office_agent)--}}
                    {{--<label class="font-weight-bold text-black">{{__('office_agent.register_ex_date')}}     </label>--}}
                    {{--@endcan--}}
                    @if(($office_agent->license_end_date ?? null) < \Carbon\Carbon::now()) <b
                            class="text-danger">منتهي</b> @endif
                    <input type="text" class="form-control license_end_date" name="license_end_date" disabled
                           @if(($office_agent->license_end_date ?? '') < \Carbon\Carbon::now()&& ($office_agent->license_end_date ?? null) != null)
                           style="border: 2px solid red;background: #f4433654"
                           @endif
                           value="{{$office_agent->license_end_date ?? ''}}">
                </div>
            </div>
        </fieldset>
    </div>
    <div class="col-md-12">
        <fieldset id="section_3">
            <legend>.3</legend>
            <div class="row mt-1">
                <div class="col-md-4">
                    <label class="font-weight-bold text-black">{{__('office_agent.first_name')}}    </label>
                    <input type="text" class="form-control" name="owner_name" disabled
                           value="{{$office_agent->owner_name ?? ''}}">
                </div>
                <div class="col-md-2">
                    <label class="font-weight-bold text-black">{{__('office_agent.parent_name')}}  </label>
                    <input type="text" class="form-control" name="owner_parent_name" disabled
                           value="{{$office_agent->owner_parent_name ?? ''}}">
                </div>
                <div class="col-md-2">
                    <label class="font-weight-bold text-black">{{__('office_agent.family_name')}}  </label>
                    <input type="text" class="form-control" name="owner_family_name" disabled
                           value="{{$office_agent->owner_family_name ?? ''}}">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">{{__('office_agent.ssn')}}    </label>
                    <input type="text" class="form-control ssn arabicnumber" name="owner_ssn" disabled
                           value="{{$office_agent->owner_ssn ?? ''}}">
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">{{__('office_agent.ssn_file')}}    </label>
                    <input type="file" class="form-control" name="national_id" disabled>
                    @if($office_agent->national_id->file_path ?? '')
                        <a href="{{$office_agent->national_id->file_path ?? ''}}" class="font-weight-bold"><i
                                    class="la la-image"></i> {{__('office_agent.download')}}</a>
                    @endif
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">{{__('office_agent.office_phone')}}  </label>
                    <input type="text" class="form-control phone arabicnumber" name="office_phone" disabled
                           value="{{$office_agent->office_phone ?? ''}}">
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">{{__('office_agent.mobile')}}    </label>
                    <input type="text" class="form-control phone arabicnumber" name="owner_phone" disabled
                           value="{{$office_agent->owner_phone ?? ''}}">
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">{{__('office_agent.email')}}    </label>
                    <input type="email" class="form-control" name="owner_email" disabled
                           value="{{$office_agent->owner_email ?? ''}}">
                </div>
            </div>
        </fieldset>
    </div>
    <div class="col-md-12">
        <fieldset id="section_4">
            <legend>.4</legend>
            <div class="row mt-1">
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">{{__('office_agent.officer_name')}}  </label>
                    <input type="text" class="form-control" name="contact_officer_name" disabled
                           value="{{$office_agent->contact_officer_name ?? ''}}">
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">{{__('office_agent.officer_phone')}}  </label>
                    <input type="text" class="form-control phone arabicnumber" name="contact_officer_phone" disabled
                           value="{{$office_agent->contact_officer_phone ?? ''}}">
                </div>
            </div>
        </fieldset>
    </div>
    <div class="col-md-12">
        <fieldset  id="section_5">
            <legend>.5</legend>
            <div class="row mt-1">
                <input type="hidden" name="address_id" value="{{$office_agent->main_address->id ?? 0}}">
                <div class="col-md-3">
                    <label class="font-weight-bold text-black"> {{__('office_agent.government')}}   </label>
                    <select class="form-control" name="governorate_id" id="company_gov" disabled>
                        <option value="">-- {{__('office_agent.choose')}} --</option>
                        @foreach($governorates as $governorate)
                            <option
                                    @if(($office_agent->main_address->governorate_id ?? null) == $governorate->id) selected
                                    @endif value="{{$governorate->id}}">{{$governorate->title_ar}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold text-black"> {{__('office_agent.city')}}   </label>
                    <select class="form-control" name="city_id" id="company_city" disabled>
                        <option value="">-- {{__('office_agent.choose')}} --</option>
                        @foreach($cities as $city)
                            <option @if(($office_agent->main_address->city_id ?? null) == $city->id) selected
                                    @endif value="{{$city->id}}">{{$city->title_ar}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">{{__('office_agent.area')}}    </label>
                    <input type="text" class="form-control" name="area" disabled
                           value="{{$office_agent->main_address->area ?? ''}}">
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">{{__('office_agent.segment')}}   </label>
                    <input type="text" class="form-control" name="segment" disabled
                           value="{{$office_agent->main_address->segment ?? ''}}">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">{{__('office_agent.street')}}    </label>
                    <input type="text" class="form-control" name="street" disabled
                           value="{{$office_agent->main_address->street ?? ''}}">
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">{{__('office_agent.building')}}   </label>
                    <input type="text" class="form-control" name="building" disabled
                           value="{{$office_agent->main_address->building ?? ''}}">
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">{{__('office_agent.floor')}}   </label>
                    <input type="text" class="form-control" name="floor" disabled
                           value="{{$office_agent->main_address->floor ?? ''}}">
                </div>
            </div>
        </fieldset>
    </div>
    <div class="col-md-12">
        <fieldset id="section_6">
            <legend>.6</legend>
            <div class="row mt-1">
                <div class="col-md-3">
                    <label
                            class="font-weight-bold text-black">
                        @if(in_array($office_agent->office_type_id,[1,4]))
                            {{__('office_agent.company_branch_other')}}
                        @else
                            {{__('office_agent.company_branch')}}
                        @endif

                    </label>
                    <select class="form-control" name="another_branch_type_id" data-name="another_branch_type" disabled>
                        <option value="">-- {{__('office_agent.choose')}} --</option>
                        @foreach($another_branch_types as $another_branch_type)
                            <option @if($office_agent->another_branch_type_id == $another_branch_type->id) selected
                                    @endif value="{{$another_branch_type->id}}">{{$another_branch_type->title_ar}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">     {{__('office_agent.contract')}}      </label>
                    <select class="form-control" name="contract_type_id" data-name="contract_type" disabled>
                        <option value="">-- {{__('office_agent.choose')}} --</option>
                        @foreach($contract_types as $contract_type)
                            <option @if($office_agent->contract_type_id == $contract_type->id) selected
                                    @endif  value="{{$contract_type->id}}">{{$contract_type->title_ar}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">{{__('office_agent.contract_ex_date')}}       </label>
                    <input type="text" class="form-control contract_end_date" name="contract_end_date" disabled
                           value="{{$office_agent->contract_end_date ?? ''}}">
                </div>
            </div>
        </fieldset>
    </div>
    <div class="col-md-12">
        <fieldset id="section_7">
            <legend>.7</legend>

            {{--@can('iso_degree_id',$office_agent)--}}
            <div class="row mt-1">
                <div class="col-md-3">
                    <label class="font-weight-bold text-black">   {{__('office_agent.iso_cert')}}
                        <button class="btn btn-info btn-sm" type="button" onclick="appendIsoDegree()" disabled>
                            <i class="la la-plus"></i>
                        </button>
                    </label>
                    <select class="form-control" name="iso_degree_id" data-name="iso_degree" disabled>
                        <option value="">-- {{__('office_agent.choose')}} --</option>
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
                                    {{--<div class="input-group-prepend">--}}
                                    {{--<button class="btn btn-danger deleteIsoDegree" type="button">--}}
                                    {{--<i class="la la-minus"></i>--}}
                                    {{--</button>--}}
                                    {{--</div>--}}
                                    <input class="form-control" name="iso_degree[]" value="{{$iso_degree->name}}"
                                           disabled>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{--@endcan--}}
        </fieldset>
    </div>
    <div class="col-md-12">
        <fieldset id="section_8">
            <legend>.8</legend>

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
{{--                            @foreach($classification_degrees as $classification_degree)--}}
{{--                                <div class="alert alert-danger class_degree_ids" role="alert"--}}
{{--                                     id="class_degree_id_{{$classification_degree->id}}"--}}
{{--                                     --}}{{--@if($office_agent->classification_degree_id != $classification_degree->id) style="display: none;"--}}
{{--                                     --}}{{--@endif--}}
{{--                                     @if((count($office_agent->human_resources ?? []) >= 5) && $office_agent->classification_degree_id == 16) style="display: none;" @endif--}}
{{--                                    @if((count($office_agent->human_resources ?? []) >= 2) && $office_agent->classification_degree_id == 17)--}}
{{--                                        style="display: none;" @endif>--}}
{{--                                    <b>{{$classification_degree->description_ar}}</b>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}

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

        </fieldset>
    </div>
</div>



@if(request()->route()->getName() == 'getRequestOrdersView')
    @can('edit-office-data')
        <div class="row mt-1">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary" disabled>
                    {{__('office_agent.edit')}}
                </button>
            </div>
        </div>
    @endcan
@endif

{{Form::close()}}

<div class="row mt-4">
    <div class="col-md-12">
        <hr>
        <h4 class="font-weight-bold text-black">
            <i class="icon icon-paperclip"></i>
            {{__('office_agent.office_attachment')}}
        </h4>

        @if(request()->route()->getName() == 'getRequestOrdersView')
            <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                    data-target="#company_attachment_modal">
                {{__('office_agent.add')}}
            </button>
        @endif
        @if(count($office_agent->attachments))
            <button type="button" class="btn btn-info mr-1 ml-1 float-right" data-toggle="modal"
                    data-target="#files_viewer_modal"
                    onclick="addFilesViewer('{{$office_agent->attachments ?? []}}')">
                تصفح المرفقات
            </button>
        @endif
    </div>
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="company_attachment_table">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('office_agent.file')}}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($office_agent->attachments as $attachment)
                <tr id="company_attachment_file_{{$attachment->id}}">
                    <td>{{$attachment->file_type->title_ar ?? ''}}</td>
                    <td>
                        <a href="{{$attachment->file_path}}">
                            {{__('office_agent.download')}}
                        </a>
                    </td>
                    <td>

                        @if(request()->route()->getName() == 'getRequestOrdersView')
                            @can('edit-office-data')
                                <button class="btn btn-danger btn-sm text-center"
                                        onclick="deleteCompanyFile('{{$attachment->id}}')">
                                    <i class="la la-remove   mr-0"></i>
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
