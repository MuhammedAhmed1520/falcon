{{--{{Form::open([--}}
{{--    'route'=>'officeAgentUpdateDevice',--}}
{{--    'id'=>'officeAgentUpdateDeviceForm',--}}
{{--    'method'=>'post'--}}
{{--])}}--}}
{{--<div class="row mt-4">--}}
{{--    <div class="col-md-2">--}}
{{--        <label class="font-weight-bold text-black"> العدد</label>--}}
{{--        <input type="text" class="form-control arabicnumber" name="number">--}}
{{--    </div>--}}
{{--    @can('device_type_select',getOfficeAgentAuth())--}}
{{--        <div class="col-md-2">--}}
{{--            <input type="hidden" name="device_id">--}}
{{--            <label class="font-weight-bold text-black" style="display: block;">المعدات والاجهزة </label>--}}
{{--            <!--<input type="text" class="form-control" name="device_name">-->--}}

{{--            <select class="form-control" name="device_name">--}}
{{--                <option value="">-- اختار --</option>--}}
{{--                @foreach($devices_types as $device_type)--}}
{{--                    <option value="{{$device_type->name}}">{{$device_type->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--    @endcan--}}
{{--    @can('device_type_input',getOfficeAgentAuth())--}}
{{--        <div class="col-md-2">--}}
{{--            <label class="font-weight-bold text-black">المعدات والاجهزة </label>--}}
{{--            <input type="text" class="form-control" name="device_name">--}}
{{--        </div>--}}
{{--    @endcan--}}
{{--    <div class="col-md-4">--}}
{{--        <label class="font-weight-bold text-black">الرقم التسلسلي</label>--}}
{{--        <input type="text" class="form-control arabicnumber" name="serial">--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="row mt-4">--}}
{{--    @if(checkSendAllowed($office_agent))--}}
{{--        <div class="col-md-12">--}}
{{--            <button type="submit" class="btn btn-primary" id="installment_update_btn" disabled> تعديل</button>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--</div>--}}

{{--{{Form::close()}}--}}
