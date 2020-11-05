<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-none d-print text-center mt-3 mb-4">
            <div class="text-center"> 
                <span class="fs15">{{__('dashboard.print_date')}} : </span>
                <span>({{Carbon\Carbon::now()->format('Y-m-d H:i:s')}})</span>
            </div>
        </div>
    </div>
    <div class="bg-gray mb-2  d-print-none mt-4 p-2">
        <div class="row"> 
            <div class="col-12">
                <button type="button" class="btn btn-sm btn-dark m-0" onclick="window.print()">
                    {{__('violation.print')}}
                </button>
            </div>
            <div class="col-6 d-none d-print">
                <ul class="list-unstyled mt-4 mb-4"> 
                    <li>
                        <span class="fs15">{{__('dashboard.print_date')}} : </span>
                        <span>{{Carbon\Carbon::now()->format('Y-m-d H:i:s')}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
{{--        <div class="col-md-12">--}}
{{--            <form action="">--}}
{{--                <div class="bg-gray mb-2 p-1">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-3">--}}
{{--                            <b>{{__('office_agent.company_name')}}</b>--}}
{{--                            <select class="form-control" name="office_agent_id">--}}
{{--                                @foreach($officeAgents as $officeAgent)--}}
{{--                                    <option value="{{$officeAgent->id}}">{{$officeAgent->office_name_ar}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3">--}}
{{--                            <b>{{__('office_agent.order_date')}}</b>--}}
{{--                            <input type="date" class="date-range form-control text-center" dir="ltr"--}}
{{--                                   value="{{request()->get('created_at')}}">--}}
{{--                            <input type="hidden" name="start_date">--}}
{{--                            <input type="hidden" name="end_date">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-12 text-left mt-2 mb-2">--}}
{{--                            <div class="btn-group">--}}
{{--                                <button type="submit" class="btn btn-sm btn-info m-0">--}}
{{--                                    {{__('violation.filter')}}--}}
{{--                                </button>--}}
{{--                                <button type="reset" class="btn btn-sm btn-danger m-0" onclick="removeReset()">--}}
{{--                                    {{__('violation.reset')}}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table_print">
                    <thead class="header_print">
                    <tr>
                        <th>#</th>
                        <th>{{__('office_agent.order_number')}}</th>
                        <th>{{__('office_agent.order_status')}}</th>
                        <th>{{__('office_agent.company_name')}}</th>
                        <th>{{__('office_agent.order_date')}}</th>
                        <th>{{__('office_agent.order_type')}}</th>
                        <th>{{__('office_agent.management')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($officeAgents as $agent)
                        <tr>
                            <td>{{$agent->id}}</td>
                            <td>{{$agent->order_serial}}</td>
                            <td>{{$agent->order_status->name ??  $agent->last_process->status->name ?? $agent->last_process->status_text ?? '-'}}</td>
                            <td>{{$agent->office_name_ar}}</td>
                            <td>{{$agent->created_at}}</td>
                            <td>{{$agent->office_order_type->title_ar ?? '-'}}</td>
                            <td>{{$agent->last_process->department->title_ar ?? '-'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
