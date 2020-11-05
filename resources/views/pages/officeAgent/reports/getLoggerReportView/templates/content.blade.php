<div class="container-fluid">
    <div class="row">
        @if(request()->start_date && request()->end_date)
            <div class="col-md-12 mt-4 text-center d-none d-print">
                <ul class="list-unstyled">
                    <li>
                        <span class="fs15">الفترة   : </span>
                        <span>من  {{request()->start_date}} الى {{request()->end_date}} </span>
                    </li>               
                </ul>
            </div>
        @endif 
        <div class="col-12 d-none d-print text-center mt-3 mb-4">
            <div class="text-center">
                <span class="fs15">{{__('office_agent.company_name')}} : </span>
                (<span id="company_name"></span>),
                <span class="fs15">{{__('dashboard.print_date')}} : </span>
                <span>({{Carbon\Carbon::now()->format('Y-m-d H:i:s')}})</span>
            </div>
        </div>
        <div class="col-md-12">
            <form action="">
                <div class="bg-gray mb-2 d-print-none mt-4 p-2">
                    <div class="row">
                        <div class="col-6">
                            <b>{{__('office_agent.company_name')}}</b>
                            <select class="form-control" name="office_agent_id">
                                @foreach($officeAgents as $officeAgent)
                                    <option value="{{$officeAgent->id}}"
                                        @if($officeAgent->id == request()->get('office_agent_id')) selected @endif
                                    >{{$officeAgent->office_name_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <b>{{__('office_agent.order_date')}}</b>
                            <input type="date" class="date-range form-control text-left" dir="ltr"
                                   value="{{request()->get('created_at')}}">
                            <input type="hidden" name="start_date" value="{{request()->get('start_date')}}">
                            <input type="hidden" name="end_date" value="{{request()->get('end_date')}}">
                        </div> 
                        <div class="col-md-12 text-left mt-2 mb-2">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-sm btn-info d-print-none m-0">
                                    {{__('violation.filter')}}
                                </button>
                                <button type="reset" class="btn btn-sm btn-danger d-print-none m-0" onclick="removeReset()">
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
                        <!--<th>{{__('office_agent.status')}}</th>-->
                        <th>{{__('office_agent.date')}}</th>
                        <th>مرسل من</th>
                        <th>مرسل الى</th>
                        <th>{{__('office_agent.notes')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($processes as $process)
                        <tr>
                            <!--<td>{{$process->status->name ?? $process->status_text ?? ''}}</td>-->
                            <td>
                                {{Carbon\Carbon::parse(($process->created_at ?? ''))->format('Y-m-d')}}
                                <br/>
                                {{Carbon\Carbon::parse(($process->created_at ?? ''))->format('H:i')}}
                            </td>
                            <td>{{$process->from ?? ''}}</td>
                            <td>{{$process->to ?? ''}}</td>
                            <td width="250px">{{$process->comment}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
