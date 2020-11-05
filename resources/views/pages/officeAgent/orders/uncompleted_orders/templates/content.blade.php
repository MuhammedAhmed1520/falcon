<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="bg-gray mb-2 p-1">
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
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="data_tables">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('office_agent.order_number')}}</th>
                    <th>{{__('office_agent.created_at')}}</th>
                    <th width="300px">{{__('office_agent.company_name')}}</th>
                    <th>{{__('office_agent.order_type')}}</th>
                    <th width="200px">{{__('office_agent.management')}}</th>
                    <th>{{__('office_agent.order_status')}}</th>
                    <!--<th width="50"></th>-->
                </tr>
                </thead>
                <tbody>
                @foreach($officeAgents as $agent)
                        <!--style="background-color: #dc35454d!important;"-->
                    <tr style="cursor:pointer" onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')" @if((($agent->registration_date ?? '') < \Carbon\Carbon::now()) ||
                            (($agent->license_end_date ?? '') < \Carbon\Carbon::now()))
                            @endif>
                        <td onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')">{{$agent->id}}  </td>
                        <td onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')">{{$agent->order_serial}}</td>
                        <td onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')">{{$agent->created_at}}</td>
                        <td onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')">{{$agent->office_name_ar}}</td>
                        <td onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')">{{$agent->office_order_type->title_ar ?? '-'}}</td>
                        <td onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')">{{$agent->last_process->department->title_ar ?? '-'}}</td>
                        <td onclick="redirectEdit('{{route('getRequestOrdersView',['id'=>$agent->id])}}')">{{$agent->order_status->name ?? $agent->last_process->status->name ?? $agent->last_process->status_text ?? ''}}</td>
                        <!--<td>-->
                        <!--    <div class="btn-group">-->
                        <!--        @if($agent->certificate_fees ?? null)-->
                        <!--            <button class="btn btn-warning" onclick="showPayment({{$agent->certificate_fees}})">-->
                        <!--                <i class="la la-print"></i>-->
                        <!--            </button>-->
                        <!--        @endif-->
                        <!--        @can('show-required-data')-->
                        <!--            <a href="{{route('getErrorFilesView',['id'=>$agent->id])}}"-->
                        <!--               class="btn btn-danger tooltips"-->
                        <!--               aria-label="{{__('office_agent.error_files')}}">-->
                        <!--                <i class="la la-file"></i>-->
                        <!--            </a>-->
                        <!--        @endcan-->
                        <!--        @can('update-office')-->
                        <!--            <a href="{{route('getRequestOrdersView',['id'=>$agent->id])}}"-->
                        <!--               aria-label="عرض وتعديل بيانات"-->
                        <!--               class="btn btn-primary tooltips">-->
                        <!--                <i class="la la-edit"></i>-->
                        <!--            </a>-->
                        <!--        @endcan-->
                        <!--    </div>-->
                        <!--</td>-->
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div class="col-md-12 mb-5">
            {{$officeAgents->appends(\request()->except(['page']))->render("pagination::bootstrap-4")}}
        </div>
    </div>
</div>
