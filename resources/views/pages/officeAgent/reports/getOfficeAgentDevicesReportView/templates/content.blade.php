<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="row">
                    <div class="col-12 d-none d-print text-center mt-3 mb-4">
                        <div class="text-center">
                            <span class="fs15">{{__('office_agent.company_name')}} : </span>
                            (<span id="company_name"></span>),
                            <span class="fs15">{{__('dashboard.print_date')}} : </span>
                            <span>({{Carbon\Carbon::now()->format('Y-m-d H:i:s')}})</span>
                        </div>
                    </div>
                </div>
                <div class="bg-gray mb-2  d-print-none mt-4 p-2">
                    <div class="row">
                        <div class="col-6">
                            <b>{{__('office_agent.company_name')}}</b>
                            <select class="form-control" name="office_agent_id">
                                @foreach($officeAgents as $officeAgent)
                                    <option
                                        @if($officeAgent->id == request()->get('office_agent_id')) selected @endif
                                        value="{{$officeAgent->id}}">{{$officeAgent->office_name_ar}}</option>
                                @endforeach
                            </select>
                        </div> 
                        {{--                        <div class="col-md-3">--}}
                        {{--                            <b>{{__('office_agent.order_date')}}</b>--}}
                        {{--                            <input type="date" class="date-range form-control text-center" dir="ltr"--}}
                        {{--                                   value="{{request()->get('created_at')}}">--}}
                        {{--                            <input type="hidden" name="start_date">--}}
                        {{--                            <input type="hidden" name="end_date">--}}
                        {{--                        </div>--}}
                        <div class="col-md-12 text-left mt-2 mb-2">
                            <div class="btn-group d-print-none">
                                <button type="submit" class="btn btn-sm btn-info m-0">
                                    {{__('violation.filter')}}
                                </button>
                                <button type="reset" class="btn btn-sm btn-danger m-0" onclick="removeReset()">
                                    {{__('violation.reset')}}
                                </button>
                                <button type="button" class="btn btn-sm btn-dark m-0 d-print-none" onclick="printTrigger()">
                                    {{__('violation.print')}}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--<div class="col-6 d-none d-print">-->
                        <!--    <ul class="list-unstyled mt-4 mb-4"> -->
                        <!--        <li>-->
                        <!--            <span class="fs15">{{__('office_agent.company_name')}} : </span>-->
                        <!--            <span id="company_name"></span>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                        <!--<div class="col-6 d-none d-print">-->
                        <!--    <ul class="list-unstyled mt-4 mb-4"> -->
                        <!--        <li>-->
                        <!--            <span class="fs15">{{__('dashboard.print_date')}} : </span>-->
                        <!--            <span>{{Carbon\Carbon::now()->format('Y-m-d H:i:s')}}</span>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table_print">
                    <thead class="header_print">
                    <tr>
                        <th>#</th>
                        <th>{{__('office_agent.device')}}</th>
                        <th>{{__('office_agent.number')}}</th>
                        <th>{{__('office_agent.serial')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($officeAgentDevices as $agent)
                        <tr>
                            <td>{{$agent->id}}</td>
                            <td>{{$agent->device_type->name ?? ''}}</td>
                            <td>{{$agent->number}}</td>
                            <td>{{$agent->serial}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
