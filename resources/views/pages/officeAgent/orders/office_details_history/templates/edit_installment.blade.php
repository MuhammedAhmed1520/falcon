{{--{{Form::open([--}}
{{--    'route'=>['adminOfficeAgentUpdateDevice',request()->id],--}}
{{--    'id'=>'adminOfficeAgentUpdateDeviceForm',--}}
{{--    'method'=>'post'--}}
{{--])}}--}}
{{--<div class="row mt-4">--}}
{{--    <div class="col-md-2">--}}
{{--        <label class="font-weight-bold text-black"> {{__('office_agent.number')}}  </label>--}}
{{--        <input type="text" class="form-control arabicnumber" name="number">--}}
{{--    </div>--}}
{{--    @can('device_type_select',$office_agent)--}}
{{--        <div class="col-md-3">--}}
{{--            <input type="hidden" name="device_id">--}}
{{--            <label class="font-weight-bold text-black"--}}
{{--                   style="display: block;">  {{__('office_agent.devices')}}   </label>--}}
{{--            <!--<input type="text" class="form-control" name="device_name">-->--}}

{{--            <select class="form-control" name="device_name" data-name="device_type">--}}
{{--                <option value="">-- {{__('office_agent.choose')}} --</option>--}}
{{--                @foreach($devices_types as $device_type)--}}
{{--                    <option value="{{$device_type->name}}">{{$device_type->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--    @endcan--}}
{{--    @can('device_type_input',$office_agent)--}}
{{--        <div class="col-md-2">--}}
{{--            <label class="font-weight-bold text-black">  {{__('office_agent.devices')}}  </label>--}}
{{--            <input type="text" class="form-control" name="device_name">--}}
{{--        </div>--}}
{{--    @endcan--}}
{{--    <div class="col-md-4">--}}
{{--        <label class="font-weight-bold text-black">{{__('office_agent.serial')}}  </label>--}}
{{--        <input type="text" class="form-control arabicnumber" name="serial">--}}
{{--    </div>--}}
{{--</div>--}}

{{--@can('edit-office-device')--}}
{{--    <div class="row mt-4">--}}
{{--        <div class="col-md-12">--}}
{{--            <button type="submit" class="btn btn-primary" id="installment_update_btn"--}}
{{--                    disabled> {{__('office_agent.edit')}}  </button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endcan--}}
{{--{{Form::close()}}--}}
