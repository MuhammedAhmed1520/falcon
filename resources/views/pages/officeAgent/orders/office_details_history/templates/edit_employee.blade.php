{{--{{Form::open([--}}
{{--    'route'=>['adminUpdateHumanResourceEmployee',request()->id],--}}
{{--    'id'=>'adminUpdateHumanResourceEmployeeForm',--}}
{{--    'method'=>'post'--}}
{{--])}}--}}
{{--<div class="row mt-4">--}}
{{--    <div class="col-md-3">--}}
{{--        <input type="hidden" name="human_resource_id" value="">--}}
{{--        <label class="font-weight-bold text-black">{{__('office_agent.company_job')}}</label>--}}
{{--        <select class="form-control" name="job_id" id="edit_job_id" data-name="human_resource_job">--}}
{{--            <option value="">-- {{__('office_agent.choose')}} --</option>--}}
{{--            @foreach($human_resource_jobs as $job)--}}
{{--                <option value="{{$job->id}}">{{$job->title_ar}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}

{{--    <div class="col-md-2">--}}
{{--        <label class="font-weight-bold text-black"> {{__('office_agent.first_name')}}  </label>--}}
{{--        <input type="text" class="form-control" name="name">--}}
{{--    </div>--}}

{{--    <div class="col-md-2">--}}
{{--        <label class="font-weight-bold text-black"> {{__('office_agent.parent_name')}}</label>--}}
{{--        <input type="text" class="form-control" name="parent_name">--}}
{{--    </div>--}}
{{--    <div class="col-md-2">--}}
{{--        <label class="font-weight-bold text-black">{{__('office_agent.family_name')}}</label>--}}
{{--        <input type="text" class="form-control" name="family_name">--}}
{{--    </div>--}}
{{--    <div class="col-md-3">--}}
{{--        <label class="font-weight-bold text-black">{{__('office_agent.ssn')}}  </label>--}}
{{--        <input type="text" class="form-control ssn arabicnumber" name="ssn">--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="row mt-4">--}}
{{--    <div class="col-md-3">--}}
{{--        <label class="font-weight-bold text-black"> {{__('office_agent.phone')}}  </label>--}}
{{--        <input type="text" class="form-control phone arabicnumber" name="phone">--}}
{{--    </div>--}}
{{--    <div class="col-md-4">--}}
{{--        <label class="font-weight-bold text-black">{{__('office_agent.email')}}  </label>--}}
{{--        <input type="email" class="form-control" name="email">--}}
{{--    </div>--}}
{{--    <div class="col-md-2">--}}
{{--        <label class="font-weight-bold text-black">{{__('office_agent.gender')}} </label>--}}
{{--        <select class="form-control" name="gender">--}}
{{--            <option value="">-- {{__('office_agent.choose')}} --</option>--}}
{{--            <option value="male">{{__('office_agent.male')}}</option>--}}
{{--            <option value="female">{{__('office_agent.female')}}</option>--}}
{{--        </select>--}}
{{--    </div>--}}
{{--    <div class="col-md-2">--}}
{{--        <label class="font-weight-bold text-black">{{__('office_agent.nationality')}} </label>--}}
{{--        <select class="form-control" name="nationality">--}}
{{--            <option value="">-- {{__('office_agent.choose')}} --</option>--}}
{{--            <option value="kuwaiti"> {{__('office_agent.kuwaiti')}} </option>--}}
{{--            <option value="notKuwaiti"> {{__('office_agent.notKuwaiti')}} </option>--}}
{{--            @foreach($nationalities as $nationality)--}}
{{--                <option value="{{$nationality->id}}">{{$nationality->name}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="row mt-4">--}}
{{--    <div class="col-md-3">--}}
{{--        <label class="font-weight-bold text-black">{{__('office_agent.grade')}}   </label>--}}
{{--        <select class="form-control" name="degree_id" id="employee_edit_degree" data-name="human_resource_degree">--}}
{{--            <option value="">--  {{__('office_agent.choose')}}  --</option>--}}
{{--            @foreach($human_resource_degrees as $job)--}}
{{--                <option value="{{$job->id}}">{{$job->title_ar}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
{{--    <div class="col-md-3">--}}
{{--        <label class="font-weight-bold text-black">  {{__('office_agent.specialization')}} </label>--}}
{{--        <select class="form-control" name="specialization_id" id="employee_edit_specialization"  data-name="human_resource_specialization">--}}
{{--            <option value="">--  {{__('office_agent.choose')}}  --</option>--}}
{{--            @foreach($human_resource_specializations as $job)--}}
{{--                <option value="{{$job->id}}">{{$job->title_ar}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
{{--    <div class="col-md-3" id="edit_emp_job_title" style="display: none">--}}
{{--        <label class="font-weight-bold text-black">    {{__('office_agent.job_title')}} </label>--}}
{{--        <input type="text" class="form-control" name="job_title">--}}
{{--    </div>--}}
{{--    <div class="col-md-3" id="edit_emp_specialize" style="display: none">--}}
{{--        <label class="font-weight-bold text-black"> {{__('office_agent.specialization_title')}}   </label>--}}
{{--        <input type="text" class="form-control" name="specialization_title">--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="row mt-4">--}}
{{--    <div class="col-md-3">--}}
{{--        <button class="btn btn-primary" id="edit_employee_btn" disabled>  {{__('office_agent.edit')}} </button>--}}
{{--    </div>--}}
{{--</div>--}}
{{--{{Form::close()}}--}}
