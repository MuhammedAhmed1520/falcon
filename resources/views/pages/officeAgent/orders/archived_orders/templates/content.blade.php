<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="data_tables">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('office_agent.order_number')}}</th>
                    <th>{{__('office_agent.order_date')}}</th>
                    <th>{{__('office_agent.company_name')}}</th>
                    <th>{{__('office_agent.order_type')}}</th>
                    <th>{{__('office_agent.management')}}</th>
                    <th>{{__('office_agent.order_status')}}</th>
                    <!--<th width="50px"></th>-->
                </tr>
                </thead>
                <tbody>
                @foreach($officeAgents as $agent)
                    <tr style="cursor:pointer" onclick="redirectEdit('{{route('getArchivedRequestOrders',['id'=>$agent->id])}}')">
                        <td onclick="redirectEdit('{{route('getArchivedRequestOrders',['id'=>$agent->id])}}')">{{$agent->id}}</td>
                        <td onclick="redirectEdit('{{route('getArchivedRequestOrders',['id'=>$agent->id])}}')">{{$agent->order_serial}}</td>
                        <td onclick="redirectEdit('{{route('getArchivedRequestOrders',['id'=>$agent->id])}}')">{{$agent->endorse_at}}</td>
                        <td onclick="redirectEdit('{{route('getArchivedRequestOrders',['id'=>$agent->id])}}')">{{$agent->office_name_ar}}</td>
                        <td onclick="redirectEdit('{{route('getArchivedRequestOrders',['id'=>$agent->id])}}')">{{$agent->office_order_type->title_ar ?? '-'}}</td>
                        <td onclick="redirectEdit('{{route('getArchivedRequestOrders',['id'=>$agent->id])}}')">{{$agent->last_process->department->title_ar ?? '-'}}</td>
                        <td onclick="redirectEdit('{{route('getArchivedRequestOrders',['id'=>$agent->id])}}')">{{$agent->order_status->name ??  $agent->last_process->status->name ?? $agent->last_process->status_text ?? ''}}</td>
                        <!--<td>-->
                        <!--    <a href="{{route('getProcessView',['office_agent_id'=>$agent->id])}}"-->
                        <!--       aria-label="{{app()->getLocale() == 'ar' ? 'عرض المعاملات': 'Show Processes'}}"-->
                        <!--       class="btn btn-success tooltips">-->
                        <!--        <i class="la la-eye"></i>-->
                        <!--    </a>-->
                        <!--    @can('show-archive-order-detail')-->
                        <!--    <a href="{{route('getArchivedRequestOrders',['id'=>$agent->id])}}"-->
                        <!--       class="btn btn-edit">-->
                        <!--        <i class="la la-edit"></i>-->
                        <!--    </a>-->
                        <!--    @endcan-->
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
