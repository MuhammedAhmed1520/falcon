<div class="container-fluids w-100">
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
                <div class="bg-gray mb-2 d-print-none mt-4 p-2">
                    <div class="row ">
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
                        <div class="col-md-12 text-left mt-2 mb-2">
                            <div class="btn-group d-print-none">
                                <button type="submit" class="btn btn-sm btn-info m-0">
                                    {{__('violation.filter')}}
                                </button>
                                <button type="button" class="btn btn-sm btn-dark m-0 d-print-none" onclick="printTrigger()">
                                    <i class="la la-print d-block"></i>
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
                        <th>{{__('office_agent.status')}}</th>
                        <th>{{__('office_agent.date')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($office_agent_updated)
                        <tr>
                            <td> اخر تحديث ارسال الشركة</td>
                            <td>
                                @if($office_agent_updated['last_updated_date'] ?? '')
                                    {{Carbon\Carbon::parse(($office_agent_updated['last_updated_date'] ?? ''))->diffForHumans()}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>تاريخ اخر تحديث لعناوين الفروع الاخري</td>
                            <td>
                                @if($office_agent_updated['entities']['addresses'] ?? '')
                                    {{Carbon\Carbon::parse(($office_agent_updated['entities']['addresses'] ?? ''))->diffForHumans()}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>تاريخ اخر تحديث للمرفقات</td>
                            <td>
                                @if($office_agent_updated['entities']['attachments'] ?? '')
                                    {{Carbon\Carbon::parse(($office_agent_updated['entities']['attachments'] ?? ''))->diffForHumans()}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>تاريخ اخر تحديث لبيانات الشركاء</td>
                            <td>
                                @if($office_agent_updated['entities']['office_partners'] ?? '')
                                    {{Carbon\Carbon::parse(($office_agent_updated['entities']['office_partners'] ?? ''))->diffForHumans()}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>تاريخ اخر تحديث لمرفقات الموارد البشرية</td>
                            <td>
                                @if($office_agent_updated['entities']['human_resources_attachments'] ?? '')
                                    {{Carbon\Carbon::parse(($office_agent_updated['entities']['human_resources_attachments'] ?? ''))->diffForHumans()}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>تاريخ اخر تحديث للموارد البشرية</td>
                            <td>
                                @if($office_agent_updated['entities']['human_resources'] ?? '')
                                    {{Carbon\Carbon::parse(($office_agent_updated['entities']['human_resources'] ?? ''))->diffForHumans()}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>تاريخ اخر لمرفقات الاجهزة والمعدات</td>
                            <td>
                                @if($office_agent_updated['entities']['devices_attachments'] ?? '')
                                    {{Carbon\Carbon::parse(($office_agent_updated['entities']['devices_attachments'] ?? ''))->diffForHumans()}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>تاريخ اخر تحديث لمرفقات الشركاء</td>
                            <td>
                                @if($office_agent_updated['entities']['office_partners_attachments'] ?? '')
                                    {{Carbon\Carbon::parse(($office_agent_updated['entities']['office_partners_attachments'] ?? ''))->diffForHumans()}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>تاريخ اخر تحديث للاجهزة والمعدات</td>
                            <td>
                                @if($office_agent_updated['entities']['devices'] ?? '')
                                    {{Carbon\Carbon::parse(($office_agent_updated['entities']['devices'] ?? ''))->diffForHumans()}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>تاريخ اخر تحديث للدراسات</td>
                            <td>
                                @if($office_agent_updated['entities']['studies'] ?? '')
                                    {{Carbon\Carbon::parse(($office_agent_updated['entities']['studies'] ?? ''))->diffForHumans()}}
                                @endif
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
