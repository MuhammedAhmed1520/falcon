{{--{{Form::open([--}}
{{--    'route'=>'updateHumanResourceEmployee',--}}
{{--    'id'=>'updateHumanResourceEmployeeForm',--}}
{{--    'method'=>'post'--}}
{{--])}}--}}
{{--<div class="row mt-4">--}}
{{--    <div class="col-md-3">--}}
{{--        <input type="hidden" name="human_resource_id" value="">--}}
{{--        <label class="font-weight-bold text-black">الصفة </label>--}}
{{--        <select class="form-control" name="job_id" id="edit_job_id" data-name="human_resource_job">--}}
{{--            <option value="">-- اختار --</option>--}}
{{--            @foreach($human_resource_jobs as $job)--}}
{{--                <option value="{{$job->id}}">{{$job->title_ar}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
{{--    <div class="col-md-2">--}}
{{--        <label class="font-weight-bold text-black">اسم الاول</label>--}}
{{--        <input type="text" class="form-control" name="name">--}}
{{--    </div>--}}
{{--    <div class="col-md-2">--}}
{{--        <label class="font-weight-bold text-black"> الاب</label>--}}
{{--        <input type="text" class="form-control" name="parent_name">--}}
{{--    </div>--}}
{{--    <div class="col-md-2">--}}
{{--        <label class="font-weight-bold text-black">العائلة</label>--}}
{{--        <input type="text" class="form-control" name="family_name">--}}
{{--    </div>--}}
{{--    <div class="col-md-3">--}}
{{--        <label class="font-weight-bold text-black">الرقم المدني</label>--}}
{{--        <input type="text" class="form-control ssn arabicnumber" name="ssn">--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="row mt-4">--}}
{{--    <div class="col-md-3">--}}
{{--        <label class="font-weight-bold text-black"> هاتف النقال</label>--}}
{{--        <input type="text" class="form-control phone arabicnumber" name="phone">--}}
{{--    </div>--}}
{{--    <div class="col-md-4">--}}
{{--        <label class="font-weight-bold text-black">البريد الالكتروني</label>--}}
{{--        <input type="email" class="form-control" name="email">--}}
{{--    </div>--}}
{{--    <div class="col-md-2">--}}
{{--        <label class="font-weight-bold text-black">الجنس </label>--}}
{{--        <select class="form-control" name="gender">--}}
{{--            <option value="">-- اختار --</option>--}}
{{--            <option value="male">ذكر</option>--}}
{{--            <option value="female">انثي</option>--}}
{{--        </select>--}}
{{--    </div>--}}
{{--    <div class="col-md-2">--}}
{{--        <label class="font-weight-bold text-black">الجنسية </label>--}}
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
{{--        <label class="font-weight-bold text-black">الدرجة العلمية </label>--}}
{{--        <select class="form-control" name="degree_id" id="employee_edit_degree" data-name="human_resource_degree">--}}
{{--            <option value="">-- اختار --</option>--}}
{{--            @foreach($human_resource_degrees as $job)--}}
{{--                <option value="{{$job->id}}">{{$job->title_ar}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
{{--    <div class="col-md-3">--}}
{{--        <label class="font-weight-bold text-black">التخصص العلمي </label>--}}
{{--        <select class="form-control" name="specialization_id" id="employee_edit_specialization" data-name="human_resource_specialization">--}}
{{--            <option value="">-- اختار --</option>--}}
{{--            @foreach($human_resource_specializations as $job)--}}
{{--                <option value="{{$job->id}}">{{$job->title_ar}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
{{--    <div class="col-md-3" id="edit_emp_job_title" style="display: none">--}}
{{--        <label class="font-weight-bold text-black"> المسمي الوظيفي</label>--}}
{{--        <input type="text" class="form-control" name="job_title">--}}
{{--    </div>--}}
{{--    <div class="col-md-3" id="edit_emp_specialize" style="display: none">--}}
{{--        <label class="font-weight-bold text-black">التخصص العلمي</label>--}}
{{--        <input type="text" class="form-control" name="specialization_title">--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="row mt-4">--}}
{{--    @if(checkSendAllowed($office_agent))--}}
{{--        <div class="col-md-3">--}}
{{--            <button class="btn btn-primary" id="edit_employee_btn" disabled> تعديل</button>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--</div>--}}
{{--{{Form::close()}}--}}
