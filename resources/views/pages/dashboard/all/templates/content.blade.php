<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <fieldset class="border-0 shadow-none">
                {{--<legend>{{__('dashboard.violation_statistics')}}</legend>--}}
                {{--<p>{{__('dashboard.violation_description')}}</p>--}}
                <div class="row mt-3">

                    @can('violation-statistics')
                    {{-- Violation --}}
                    <div class="col-md-3">
                        <div class="statistic-card  shadow-lg overflow-hidden">
                            <div class="card-float card-info">
                                <i class="icon la la-user-secret"></i>
                            </div>
                            <div class="content text-left">
                                <h4 class="text-uppercase">{{__('settings.officer_count')}}</h4>
                                <p id="officers_count">{{$total_statistics['officer_count'] ?? 0}}</p>
                            </div>
                            <a class="float-right" href="{{route('allOfficers')}}">
                                {{__('sidebar.show_all')}}
                            </a>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="statistic-card  shadow-lg overflow-hidden">
                            <div class="card-float card-danger">
                                <i class="icon la la-warning"></i>
                            </div>
                            <div class="content text-left">
                                <h4 class="text-uppercase">{{__('settings.violation_count')}}</h4>
                                <p id="violations_count">{{$total_statistics['violation_count'] ?? 0}}</p>
                            </div>
                            <a class="float-right" href="{{route('allViolations')}}">
                                {{__('sidebar.show_all')}}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistic-card  shadow-lg overflow-hidden">
                            <div class="card-float card-purple">
                                <i class="icon la la-archive"></i>
                            </div>
                            <div class="content text-left">
                                <h4 class="text-uppercase">{{__('settings.subject_count')}}</h4>
                                <p id="subjects_count">{{$total_statistics['subject_count'] ?? 0}}</p>
                            </div>
                            <a class="float-right" href="{{route('allSubjectRules')}}">
                                {{__('sidebar.show_all')}}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistic-card  shadow-lg overflow-hidden">
                            <div class="card-float card-warning">
                                <i class="icon la la-question"></i>
                            </div>
                            <div class="content text-left">
                                <h4 class="text-uppercase">{{__('settings.punishment_count')}}</h4>
                                <p id="punishments_count">{{$total_statistics['punishment_count'] ?? 0}}</p>
                            </div>
                            <a class="float-right" href="{{route('allPunishmentRules')}}">
                                {{__('sidebar.show_all')}}
                            </a>
                        </div>
                    </div>
                    @endcan
                    @can('tender-statistics')
                    {{--Tender--}}
                    <div class="col-md-3">
                        <div class="statistic-card  shadow-lg overflow-hidden">
                            <div class="card-float card-success">
                                <i class="icon la la-file"></i>
                            </div>
                            <div class="content text-left">
                                <h4 class="text-uppercase">{{__('settings.tender_count')}}</h4>
                                <p id="tender_count">{{$tender_statistics['tender_count']?? 0}}</p>
                            </div>
                            <a class="float-right" href="{{route('allTenders')}}">
                                {{__('sidebar.show_all')}}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistic-card  shadow-lg overflow-hidden">
                            <div class="card-float card-gray">
                                <i class="icon la la-briefcase"></i>
                            </div>
                            <div class="content text-left">
                                <h4 class="text-uppercase">{{__('settings.approved_tender_company_count')}}</h4>
                                <p id="approved_tender_company">{{$tender_statistics['approved_tender_company_count']?? 0}}</p>
                            </div>
                            <a class="float-right" href="{{route('allCompanies')}}">
                                {{__('sidebar.show_all')}}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistic-card  shadow-lg overflow-hidden">
                            <div class="card-float card-info">
                                <i class="icon la la-briefcase"></i>
                            </div>
                            <div class="content text-left">
                                <h4 class="text-uppercase">{{__('settings.paid_tender_company_count')}}</h4>
                                <p id="paid_tender_company">{{$tender_statistics['paid_tender_company_count']?? 0}}</p>
                            </div>
                            <a class="float-right" href="{{route('allCompanies')}}">
                                {{__('sidebar.show_all')}}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistic-card  shadow-lg overflow-hidden">
                            <div class="card-float card-danger">
                                <i class="icon la la-briefcase"></i>
                            </div>
                            <div class="content text-left">
                                <h4 class="text-uppercase">{{__('settings.miss_file_tender_company_count')}}</h4>
                                <p id="miss_file_tender">{{$tender_statistics['miss_file_tender_company_count']?? 0}}</p>
                            </div>
                            <a class="float-right" href="{{route('allCompanies')}}">
                                {{__('sidebar.show_all')}}
                            </a>
                        </div>
                    </div>
                    @endcan
                    
                    @can('office-agent-statistics') 
                    {{--Office Agent--}}
                    <div class="col-md-3">
                        <div class="statistic-card  shadow-lg overflow-hidden">
                            <div class="card-float card-info">
                                <i class="icon la la-file"></i>
                            </div>
                            <div class="content text-left">
                                <h4 class="text-uppercase">{{__('dashboard.all_orders')}}</h4>
                                <p id="tender_count">{{$office_agent_statistics['all_orders']?? 0}}</p>
                            </div>
                            <a class="float-right" href="{{route('getSearchOrdersView')}}">
                                {{__('sidebar.show_all')}}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistic-card  shadow-lg overflow-hidden">
                            <div class="card-float card-warning">
                                <i class="icon la la-briefcase"></i>
                            </div>
                            <div class="content text-left">
                                <h4 class="text-uppercase">{{__('dashboard.completed_orders')}}</h4>
                                <p id="approved_tender_company">{{$office_agent_statistics['completed_orders']?? 0}}</p>
                            </div>
                            <a class="float-right" href="{{route('getSearchOrdersView')}}">
                                {{__('sidebar.show_all')}}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistic-card  shadow-lg overflow-hidden">
                            <div class="card-float card-gray">
                                <i class="icon la la-briefcase"></i>
                            </div>
                            <div class="content text-left">
                                <h4 class="text-uppercase">{{__('dashboard.not_completed_orders')}}</h4>
                                <p id="paid_tender_company">{{$office_agent_statistics['not_completed_orders']?? 0}}</p>
                            </div>
                            <a class="float-right" href="{{route('getUncompletedOrdersView')}}">
                                {{__('sidebar.show_all')}}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistic-card  shadow-lg overflow-hidden">
                            <div class="card-float card-purple">
                                <i class="icon la la-briefcase"></i>
                            </div>
                            <div class="content text-left">
                                <h4 class="text-uppercase">{{__('dashboard.late_orders')}}</h4>
                                <p id="miss_file_tender">{{$office_agent_statistics['late_orders']?? 0}}</p>
                            </div>
                            <a class="float-right" href="{{route('getLateOrdersView')}}">
                                {{__('sidebar.show_all')}}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistic-card  shadow-lg overflow-hidden">
                            <div class="card-float card-danger">
                                <i class="icon la la-briefcase"></i>
                            </div>
                            <div class="content text-left">
                                <h4 class="text-uppercase">{{__('dashboard.archived_orders')}}</h4>
                                <p id="miss_file_tender">{{$office_agent_statistics['archived_orders']?? 0}}</p>
                            </div>
                            <a class="float-right" href="{{route('getArchivedOrdersView')}}">
                                {{__('sidebar.show_all')}}
                            </a>
                        </div>
                    </div>
                    @endcan 
                    
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="row">
                            @can('violation-statistics')
                            {{--Violation--}}
                            <div class="col-md-3 text-center">
                                <h3 class="font-weight-bold">{{__('dashboard.violation_number')}}</h3>
                                <canvas id="myChart-1" width="400" height="400"></canvas>
                            </div>
                            <div class="col-md-3 text-center">
                                <h3 class="font-weight-bold">{{__('dashboard.violation_cost')}}</h3>
                                <canvas id="myChart-2" width="400" height="400"></canvas>
                            </div>
                            <div class="col-md-3 text-center">
                                <h3 class="font-weight-bold">{{__('dashboard.violation_paid')}}</h3>
                                <canvas id="myChart-3" width="400" height="400"></canvas>
                            </div>
                            <div class="col-md-3 text-center">
                                <h3 class="font-weight-bold">{{__('dashboard.best_officers')}}</h3>
                                <canvas id="myChart-4" width="400" height="400"></canvas>
                            </div>

                            {{--<div class="col-md-3 text-center">--}}
                                {{--<h3 class="font-weight-bold">{{__('dashboard.best_users')}}</h3>--}}
                                {{--<canvas id="myChart-10" width="400" height="400"></canvas>--}}

                                {{--<a class="float-right" href="{{route('getLoggersView')}}">--}}
                                    {{--{{__('sidebar.show_all')}}--}}
                                {{--</a>--}}
                            {{--</div>--}}

                            <div class="col-md-6 text-center">
                                <h3 class="font-weight-bold">{{__('dashboard.violation_monthly')}}</h3>
                                <canvas id="myChart-5" width="400" sheight="400"
                                        style="height:400px!important"></canvas>
                            </div>
                            <div class="col-md-6 text-center">
                                <h3 class="font-weight-bold">{{__('dashboard.violation_yearly')}}</h3>
                                <canvas id="myChart-6" width="400" sheight="400"
                                        style="height:400px!important"></canvas>
                            </div>
                            @endcan
                        </div>
                        <div class="row">
                            @can('violation-statistics')
                            {{--Violation--}}
                            <div class="col-md-4 text-center">
                                <h3 class="font-weight-bold">{{__('dashboard.top_five_subjects')}}</h3>
                                <canvas id="myChart-7" width="400" sheight="400"></canvas>
                            </div>
                            {{--Violation--}}
                            <div class="col-md-8">
                                <canvas id="myChartGroupBar" width="400" sheight="400" style="max-height: 400px!important;"></canvas>
                            </div>
                            @endcan

                            @can('tender-statistics')
                            {{--Tender--}}
                            <div class="col-md-6 text-center">
                                <h3 class="font-weight-bold">{{__('dashboard.tender_monthly')}}</h3>
                                <canvas id="myChart-8" width="400" sheight="400"
                                        style="height:400px!important"></canvas>
                            </div>

                            <div class="col-md-6 text-center">
                                <h3 class="font-weight-bold">{{__('dashboard.tender_companies')}}</h3>
                                <canvas id="myChart-0" width="400" sheight="400"
                                        style="height:400px!important"></canvas>
                            </div>
                            
                            <div class="col-md-12 text-center">
                                <h3 class="font-weight-bold">{{__('dashboard.best_users')}}</h3>
                                <canvas id="myChart-10" width="800" sheight="400"></canvas>

                                <a class="float-right" href="{{route('getLoggersView')}}">
                                    {{__('sidebar.show_all')}}
                                </a>
                            </div>

                            @endcan
                            @can('office-agent-statistics')
                            <div class="col-md-12 text-center mb-3">
                                <h3 class="font-weight-bold">{{__('dashboard.order_status')}}</h3>
                                <canvas id="myChart-11" width="400" height="400"></canvas>
                            </div>
                            <div class="col-md-12 text-center mb-3">
                                <h3 class="font-weight-bold">{{__('dashboard.order_type')}}</h3>
                                <canvas id="myChart-12" width="400" height="400"></canvas>
                            </div>
                            <div class="col-md-12 text-center mb-3" >
                                <h3 class="font-weight-bold">{{__('dashboard.activities')}}</h3>
                                <canvas id="myChart-13" width="400" height="400"></canvas>
                            </div>
                            @endcan
                            @can('logger-settings')
                            <div class="col-md-12 shadow-lg mt-5">
                                <h3 class="m-2">
                                    <b>{{__('settings.logger')}}</b>
                                </h3>
                                <div style="max-height: 370px;overflow-y: scroll">
                                    @include('includes.log_content')
                                </div>
                            </div>
                            @endcan
                        </div>
                    </div>
                    
                </div>

            </fieldset>
        </div>
        {{--<div class="col-md-4 d-none">--}}
            {{--<div class="row">--}}

                {{--<div class="col-md-3">--}}
                    {{--<div class="text-center">--}}
                        {{--<img src="{{asset('assets/images/gifs/icon_goal4.gif')}}" class="img-fluid" alt="...">--}}
                        {{--<h4>{{__('dashboard.title1')}}</h4>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--<div class="text-center">--}}
                        {{--<img src="{{asset('assets/images/gifs/icon_goal1.gif')}}" class="img-fluid" alt="...">--}}
                        {{--<h4>{{__('dashboard.title2')}}</h4>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-3">--}}
                    {{--<div class="text-center">--}}
                        {{--<img src="{{asset('assets/images/gifs/icon_goal2.gif')}}" class="img-fluid" alt="...">--}}
                        {{--<h4>{{__('dashboard.title3')}}</h4>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--<div class="text-center">--}}
                        {{--<img src="{{asset('assets/images/gifs/icon_goal3.gif')}}" class="img-fluid" alt="...">--}}
                        {{--<h4>{{__('dashboard.title4')}}</h4>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--<div class="text-center">--}}
                        {{--<img src="{{asset('assets/images/gifs/icon_goal5.gif')}}" class="img-fluid" alt="...">--}}
                        {{--<h4>{{__('dashboard.title5')}}</h4>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</div>