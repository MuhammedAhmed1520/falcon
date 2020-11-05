<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="bg-gray mb-2 p-1">
                    <form>
                        <div class="row">
                            <div class="col-md-3">
                                <b>{{__('office_agent.order_number')}}</b>
                                <input type="text" name="order_serial" class="form-control"
                                       value="{{request()->get('order_serial')}}">
                            </div>
                            <div class="col-md-3">
                                <b>{{__('office_agent.order_date')}}</b>
                                <input type="date" name="created_at" class="date form-control"
                                       value="{{request()->get('created_at')}}">
                            </div>
                            <div class="col-md-3">
                                <b>{{__('office_agent.order_status')}}</b>
                                <select class="form-control" name="order_status_id">
                                    <option value="">{{__('violation.ALL')}}</option>
                                    @foreach($final_decisions as $type)
                                        <option value="{{$type->id}}"
                                                @if(request()->get('order_status_id') == $type->id) selected @endif>{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <b>{{__('office_agent.activities')}}</b>
                                <select class="form-control" name="office_agent_activity_id">
                                    <option value="">{{__('violation.ALL')}}</option>
                                    @foreach($office_agent_activies as $office_agent_activity)
                                        <option value="{{$office_agent_activity->id}}"
                                                @if(request()->get('office_order_type_id') == $office_agent_activity->id) selected @endif>{{$office_agent_activity->title_ar}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <b>{{__('office_agent.company_name')}}</b>
                                <input type="text" class="form-control" name="office_name"
                                       value="{{request()->get('office_name')}}">
                            </div>
                            <div class="col-md-3">
                                <b>{{__('office_agent.order_user_name')}}</b>
                                <input type="text" class="form-control" name="owner_name"
                                       value="{{request()->get('owner_name')}}">
                            </div>
                            <div class="col-md-3">
                                <b>{{__('office_agent.management')}}</b>
                                <select class="form-control" name="department_id">
                                    <option value="">{{__('violation.ALL')}}</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}"
                                                @if(request()->get('department_id') == $department->id) selected @endif>{{$department->title_ar}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <b>{{__('office_agent.order_type')}}</b>
                                <select class="form-control" name="office_order_type_id">
                                    <option value="">{{__('violation.ALL')}}</option>
                                    @foreach($office_order_types as $type)
                                        <option value="{{$type->id}}"
                                                @if(request()->get('office_order_type_id') == $type->id) selected @endif>{{$type->title_ar}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mt-3">
                                <input name="order_by_last_date" type="checkbox" value="true"
                                       @if(request()->get('order_by_last_date')) checked @endif/>
                                <b>الترتيب ب اخر تاريخ تعديل</b>
                            </div>

                            <div class="col-md-12 text-left mt-2 mb-2">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-sm btn-info m-0">
                                        {{__('violation.filter')}}
                                    </button>
                                    <button type="reset" class="btn btn-sm btn-danger m-0" onclick="removeReset()">
                                        {{__('violation.reset')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_tables">
                <thead>
                <tr>
                    <th>#</th>
                <!--<th width="200px">{{__('office_agent.order_number')}}</th>-->
                    <th>{{__('office_agent.order_date')}}</th>
                    <th>تاريخ اخر تحديث</th>
                    <th width="300px">{{__('office_agent.company_name')}}</th>
                    <th>{{__('office_agent.order_type')}}</th>
                    <th width="300px">{{__('office_agent.management')}}</th>
                    <th width="200px">{{__('office_agent.order_status')}}</th>
                    <!--<th width="50"></th>-->
                </tr>
                </thead>
                <tbody>

                {{--style="background-color: #dc35454d!important;"--}}
                @foreach($officeAgents as $agent)
                    <tr style="cursor:pointer;@if(!$agent->is_read) background-color: #ccc!important @endif"
                        onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')" @if((($agent->registration_date ?? '') < \Carbon\Carbon::now()) ||
                            (($agent->license_end_date ?? '') < \Carbon\Carbon::now()))
                            @endif>
                        <td onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')">{{$agent->id}}</td>
                    <!--<td>{{$agent->order_serial}}</td>-->
                        <td onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')">
                            {{Carbon\Carbon::parse(($agent->endorse_at ?? ''))->format('Y-m-d')}} <br/>
                            {{Carbon\Carbon::parse(($agent->endorse_at ?? ''))->format('H:i')}}
                        </td>
                        <td onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')">
                            @if(($agent['last_updated_date'] ?? ''))
                                {{Carbon\Carbon::parse(($agent['last_updated_date'] ?? ''))->diffForHumans()}}
                            @endif
                        </td>
                        <td onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')"
                            width="200px">{{$agent->office_name_ar}} <b/>
                        <!--{{__('office_agent.management')}} : -->
                        <!--{{$agent->last_process->department->title_ar ?? '-'}}-->
                        </td>
                        <td onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')">{{$agent->office_order_type->title_ar ?? '-'}}</td>
                        <td>{{$agent->last_process->department->title_ar  ?? '-'}}</td>
                        <td onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')">{{$agent->order_status->name ?? $agent->last_process->status->name ?? ''}}</td>
                        <!--?? $agent->last_process->status_text-->
                    <!--<td onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')">-->
                        <!--    <div class="btn-group">-->
                    <!--        @can('update-office')-->
                    <!--            <a href="{{route('getRequestOrdersView',['id'=>$agent->id])}}"-->
                        <!--               aria-label="عرض وتعديل بيانات"-->
                        <!--               class="btn btn-warning tooltips">-->
                        <!--                <i class="la la-edit"></i>-->
                        <!--            </a>-->
                        <!--        @endcan-->
                    <!--        {{--@if(in_array('certificate',$agent->button_status))--}}-->
                    <!--            {{--<a href="{{route('getFormCertify',['id'=>$agent->id,'form_type'=>$agent->form_type])}}"--}}-->
                    <!--               {{--aria-label="اظهار الشهادة"--}}-->
                    <!--               {{--class="btn btn-success tooltips">--}}-->
                    <!--                {{--<i class="la la-file"></i>--}}-->
                    <!--            {{--</a>--}}-->
                    <!--        {{--@endif--}}-->
                    <!--        {{--@can('office-request')--}}-->
                    <!--            {{--@if(in_array('company_rename',$agent->button_status))--}}-->
                    <!--                {{--<a href="{{route('getRequestChangeNameOrdersView',['id'=>$agent->id])}}"--}}-->
                    <!--                   {{--aria-label="{{__('office_agent.change_name')}}"--}}-->
                    <!--                   {{--class="btn btn-info tooltips">--}}-->
                    <!--                    {{--<i class="la la-user"></i>--}}-->
                    <!--                {{--</a>--}}-->
                    <!--            {{--@endif--}}-->
                    <!--            {{--@if(in_array('replacement',$agent->button_status))--}}-->
                    <!--                {{--<a href="{{route('getRequestReturnOrdersView',['id'=>$agent->id])}}"--}}-->
                    <!--                   {{--aria-label="{{__('office_agent.make_copy')}}"--}}-->
                    <!--                   {{--class="btn btn-primary tooltips">--}}-->
                    <!--                    {{--<i class="la la-file"></i>--}}-->
                    <!--                {{--</a>--}}-->
                    <!--            {{--@endif--}}-->
                    <!--            {{--@if(in_array('original',$agent->button_status))--}}-->
                    <!--                {{--<a href="{{route('getRequestCopyOrdersView',['id'=>$agent->id])}}"--}}-->
                    <!--                   {{--aria-label="{{__('office_agent.missed_document')}}"--}}-->
                    <!--                   {{--class="btn btn-dark tooltips">--}}-->
                    <!--                    {{--<i class="la la-files-o"></i>--}}-->
                    <!--                {{--</a>--}}-->
                    <!--            {{--@endif--}}-->
                    <!--            {{--@if(in_array('purchase',$agent->button_status))--}}-->
                    <!--                {{--<a href="{{route('getRequestApproveCertifyView',['id'=>$agent->id])}}"--}}-->
                    <!--                   {{--aria-label="{{__('office_agent.certificate_purchase')}}"--}}-->
                    <!--                   {{--class="btn btn-dark tooltips">--}}-->
                    <!--                    {{--<i class="la la-certificate"></i>--}}-->
                    <!--                {{--</a>--}}-->
                    <!--            {{--@endif--}}-->
                    <!--            {{--@if(in_array('renewal',$agent->button_status))--}}-->
                    <!--                {{--<a href="{{route('getRequestRenewCertifyView',['id'=>$agent->id])}}"--}}-->
                    <!--                   {{--aria-label="{{__('office_agent.certificate_renewal_fees')}}"--}}-->
                    <!--                   {{--class="btn btn-danger tooltips">--}}-->
                    <!--                    {{--<i class="la la-certificate"></i>--}}-->
                    <!--                {{--</a>--}}-->
                    <!--            {{--@endif--}}-->
                    <!--            {{--@if(in_array('stop_approve',$agent->button_status))--}}-->
                    <!--                {{--<a href="{{route('getStopCertifyView',['id'=>$agent->id])}}"--}}-->
                    <!--                   {{--aria-label="{{__('office_agent.certificate_reject')}}"--}}-->
                    <!--                   {{--class="btn btn-dark tooltips">--}}-->
                    <!--                    {{--<i class="la la-certificate"></i>--}}-->
                    <!--                {{--</a>--}}-->
                    <!--            {{--@endif--}}-->
                    <!--            {{--@if(in_array('log',$agent->button_status))--}}-->
                    <!--                {{--<a href="{{route('getOfficeAgentLoggerView',['id'=>$agent->id])}}"--}}-->
                    <!--                   {{--aria-label="{{__('office_agent.logger')}}"--}}-->
                    <!--                   {{--class="btn btn-danger tooltips">--}}-->
                    <!--                    {{--<i class="la la-feed"></i>--}}-->
                    <!--                {{--</a>--}}-->
                    <!--            {{--@endif--}}-->
                    <!--            {{--@if(in_array('update_order_type',$agent->button_status))--}}-->
                    <!--                {{--<a href="{{route('updateOfficeOrderType',['id'=>$agent->id])}}"--}}-->
                    <!--                   {{--@if($agent->office_order_type_id == 100)--}}-->
                    <!--                   {{--aria-label="{{__('office_agent.update_order_type_cancel')}}"--}}-->
                    <!--                   {{--@else--}}-->
                    <!--                   {{--aria-label="{{__('office_agent.update_order_type_ok')}}"--}}-->
                    <!--                   {{--@endif--}}-->

                    <!--                   {{--class="btn btn-success tooltips">--}}-->
                    <!--                    {{--<i class="la la-umbrella"></i>--}}-->
                    <!--                {{--</a>--}}-->
                    <!--            {{--@endif--}}-->
                    <!--            {{--@if(in_array('order_payment',$agent->button_status) && $agent->certificate_fees)--}}-->
                    <!--                {{--<button class="btn btn-warning tooltips"--}}-->
                    <!--                        {{--aria-label="مشاهدة / طباعة ايصال شراء الكراسة"--}}-->
                    <!--                        {{--onclick="showPayment({{$agent->certificate_fees}})">--}}-->
                    <!--                    {{--<i class="la la-print"></i>--}}-->
                    <!--                {{--</button>--}}-->
                    <!--            {{--@endif--}}-->
                    <!--            {{--@if(in_array('update_front',$agent->button_status))--}}-->
                    <!--                {{--@if($agent->is_front == "1")--}}-->
                    <!--                    {{--<a class="btn btn-danger tooltips"--}}-->
                    <!--                       {{--aria-label="اخفاء الشركة من الشركات المعتمدة على الموقع الرئيسى"--}}-->
                    <!--                       {{--href="{{route('updateStatusFront',['id'=>$agent->id])}}">--}}-->
                    <!--                        {{--<i class="la la-eject"></i>--}}-->
                    <!--                    {{--</a>--}}-->
                    <!--                {{--@else--}}-->
                    <!--                    {{--<a class="btn btn-success tooltips"--}}-->
                    <!--                       {{--aria-label="اظهار الشركة من الشركات المعتمدة على الموقع الرئيسى"--}}-->
                    <!--                       {{--href="{{route('updateStatusFront',['id'=>$agent->id])}}">--}}-->
                    <!--                        {{--<i class="la la-eject"></i>--}}-->
                    <!--                    {{--</a>--}}-->
                    <!--                {{--@endif--}}-->
                    <!--            {{--@endif--}}-->
                    <!--        {{--@endcan--}}-->
                        <!--    </div>-->
                        <!--</td>-->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mb-5">
            {{$officeAgents->appends(\request()->except(['page']))->render("pagination::bootstrap-4")}}
        </div>
    </div>
</div>
