<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">

                <table class="table table-bordered table-hover" id="data_tables">
                    <thead>
                    <tr>
                        <th>#</th>
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
