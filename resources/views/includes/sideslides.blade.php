<div id="menu_navigation" class="d-flex  position-fixed h-100 nav-main">
    <div class="skeleton-nav--left">
        <div class="skeleton-nav--left-top">
            <ul class="skeleton-nav--items">
                <li class="nav-item-hover">
                    <a href="{{route('getDashboardView')}}">
                        <i class="la la-home icon-lg text-white" title="{{__('sidebar.dashboard')}}"></i>
                    </a>
                </li>
                <li class="nav-item-hover">
                    <a href="" class="menulink" data-toggle="#search_container">
                        <i class="la la-search icon-lg text-white" title="{{__('sidebar.search')}}"></i>
                    </a>
                </li>
                <!--<li class="nav-item-hover">-->
                <!--<a href="" class="menulink" data-toggle="#notification_container">-->
            <!--    {{--<label class="red-alarm"></label>--}}-->
                <!--    <i class="la la-bell-o icon-md text-white"></i>-->
                <!--</a>-->
                <!--</li>-->
                @can('logger-settings')
                    <li class="nav-item-hover">
                        <a href="" class="menulink" data-toggle="#logger_container">
                            <label class="red-alarm"></label>
                            <i class="la la-list-ol icon-lg text-white" title="{{__('sidebar.logger')}}"></i>
                        </a>
                    </li>
                @endcan
                <li class="skeleton--icon"></li>
                <li class="skeleton--icon-sub"></li>
                <li class="skeleton--icon-sub"></li>
                <li class="skeleton--icon-sub"></li>
                <li class="skeleton--icon-sub"></li>
                <li class="skeleton--icon-sub"></li>
                <li class="skeleton--icon-sub"></li>
            </ul>
        </div>
        <div class="skeleton-nav--left-bottom">
            <div class="skeleton-nav--left-bottom-wrapper">

                {{--<div class="skeleton-nav--item-help nav-item-hover">--}}
                {{--<a href="{{route('changePassword')}}"  class="">--}}
                {{--<i class="la la-user icon-lg text-white" title="{{__('sidebar.profile')}}"></i>--}}
                {{--</a>--}}
                {{--</div>--}}

                <div class="skeleton-nav--item-profile nav-item-hover">
                    <a href="{{app()->getLocale() == 'ar' ? route('setEn') : route('setAr')}}" class="">
                        <i class="la la-language icon-lg text-white" title="{{__('sidebar.language')}}"></i>
                    </a>
                </div>
                <!--<div class="skeleton-nav--item-profile nav-item-hover">-->
                <!--<a href="" class="">-->
                <!--    <i class="la la-info-circle icon-md text-white"></i>-->
                <!--</a>-->
                <!--</div>-->
                <div class="skeleton-nav--item-profile nav-item-hover">
                    <a href="{{route('handleLogout')}}" class="">
                        <i class="la la-sign-out icon-lg text-white" title="{{__('sidebar.logout')}}"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="skeleton-nav--right">
        <div id="desktop_toggle" class="menu-toggle d-none d-md-block">
            <i class="la la-bars"></i>
        </div>
        <ul class="skeleton-nav--items-wide">
            <li class="skeleton--icon-logo-container">
                <div class="skeleton--icon-container bg-transparent">
                    <a href="{{route('getDashboardView')}}">
                        <img src="{{asset('assets/images/logo.png')}}" class="position-relative"
                             style="width: 35px;top: 4px"
                             alt="">
                    </a>
                </div>
                <div class="skeleton--icon-description bg-transparent p-1">
                    <strong>{{__('sidebar.welcome')}}</strong>
                    <br>
                    <span>({{auth()->user()->name ?? '-'}})</span>
                </div>
                <div class="skeleton--icon-logo"></div>
            </li>
            <li class="m-0">
                <div class="slider">

                    <ul class="my-menu">
                        <li><a id="_1" href="{{route('getDashboardView')}}">
                                <i class="la la-dashboard fa-2x"></i>
                                <span>{{__('sidebar.dashboard')}}</span>
                            </a>

                        <li><a id="_2" href="#">
                                <i class="la la-globe fa-2x"></i>
                                <span>{{__('sidebar.e_services')}}</span>
                            </a>
                            <ul>
                                <li id="_230">
                                    <a href="{{route('getDashboardView')}}">{{__('sidebar.dashboard')}}</a>
                                <li>

                                    @can('section-violation')
                                        <a id="_21" href="#">{{__('sidebar.violation_module')}}</a>
                                    @endcan
                                    <ul>
                                        <li id="_210">
                                            <a href="{{route('getDashboardView')}}">{{__('sidebar.dashboard')}}</a>
                                        @if(auth()->user()->can('create-violation') || auth()->user()->can('all-violation'))
                                            <li id="_211" data-vertical="true"><a
                                                        href="#">{{__('sidebar.violations')}}</a>
                                                <ul>
                                                    @can('create-violation',auth()->user())
                                                        <li>
                                                            <a href="{{route('addViolation')}}">{{__('sidebar.add_violation')}}</a>
                                                    @endcan
                                                    @can('all-violation',auth()->user())
                                                        <li>
                                                            <a href="{{route('allViolations')}}">{{__('sidebar.all_violation')}}</a>
                                                    @endcan
                                                </ul>
                                        @endif
                                        @if(auth()->user()->can('create-subject') || auth()->user()->can('all-subject'))
                                            <li id="_212" data-vertical="true"><a
                                                        href="#">{{__('sidebar.subject_rule')}}</a>
                                                <ul>
                                                    @can('create-subject',auth()->user())
                                                        <li>
                                                            <a href="{{route('createSubjectRules')}}">{{__('sidebar.add_subject_rule')}}</a>
                                                    @endcan
                                                    @can('all-subject',auth()->user())
                                                        <li>
                                                            <a href="{{route('allSubjectRules')}}">{{__('sidebar.all_subject_rule')}}</a>
                                                    @endcan
                                                </ul>
                                        @endif
                                        @if(auth()->user()->can('create-punishment') || auth()->user()->can('all-punishment'))
                                            <li id="_213" data-vertical="true"><a
                                                        href="#">{{__('sidebar.punishment_rule')}}</a>
                                                <ul>
                                                    @can('create-punishment',auth()->user())
                                                        <li>
                                                            <a href="{{route('createPunishmentRules')}}">{{__('sidebar.add_punishment_rule')}}</a>
                                                    @endcan
                                                    @can('all-punishment',auth()->user())
                                                        <li>
                                                            <a href="{{route('allPunishmentRules')}}">{{__('sidebar.all_punishment_rule')}}</a>
                                                    @endcan
                                                </ul>
                                        @endif
                                        @can('relate-subject-punishment',auth()->user())
                                            <li id="_214">
                                                <a href="{{route('attachSubjectPunishmentRules')}}">{{__('sidebar.subject_punishment')}}</a>
                                        @endcan
                                        @can('all-civilian',auth()->user())
                                            <li><a href="{{route('allCivilians')}}">{{__('sidebar.civilian')}}</a>
                                        @endcan
                                        @if(auth()->user()->can('create-officer') || auth()->user()->can('all-officer'))
                                            <li data-vertical="true"><a href="#">{{__('sidebar.officers')}}</a>
                                                <ul>
                                                    @can('create-officer')
                                                        <li>
                                                            <a href="{{route('addOfficers')}}">{{__('sidebar.add_officers')}}</a>
                                                    @endcan
                                                    @can('all-officer')
                                                        <li>
                                                            <a href="{{route('allOfficers')}}">{{__('sidebar.all_officers')}}</a>
                                                    @endcan
                                                </ul>
                                        @endif
                                        {{--<li><a class="disabled" disabled="" href="#">{{__('sidebar.payment_register')}}</a>--}}

                                        @can('ppform-violation')
                                            <li data-vertical="true"><a href="#">{{__('sidebar.pp_form')}}</a>
                                                <ul>
                                                    <li><a href="{{route('editPPFrom')}}">{{__('sidebar.pp_form')}}</a>
                                                    <li>
                                                        <a href="{{route('createExternalPPFromView')}}">{{__('sidebar.pp_external_form')}}</a>
                                                    <li>
                                                        <a href="{{route('allExternalPPFromView')}}">{{__('sidebar.pp_external_form_show_all')}}</a>
                                                </ul>
                                        @endcan
                                        @can('report-violation')
                                            <li>
                                                <a href="{{route('generateViolationReport')}}">{{__('sidebar.violation_report')}}</a>
                                        @endcan
                                        {{--<li><a href="{{route('violationEnquiry')}}"> ____________________________________ </a>--}}
                                        {{--<li><a href="{{route('editModuleSetting')}}">{{__('sidebar.settings')}}</a>--}}
                                    </ul>

                                <li>
                                    @can('section-tender')
                                        <a id="_22" href="#">{{__('sidebar.tenders_module')}}</a>
                                    @endcan
                                    <ul>
                                        <li id="_220">
                                            <a href="{{route('getDashboardView')}}">{{__('sidebar.dashboard')}}</a>
                                        @if(auth()->user()->can('create-tender') || auth()->user()->can('all-tender'))
                                            <li id="_221" data-vertical="true"><a href="#">{{__('sidebar.tenders')}}</a>
                                                <ul>
                                                    @can('create-tender')
                                                        <li>
                                                            <a href="{{route('addTender')}}">{{__('sidebar.add_tender')}}</a>
                                                    @endcan
                                                    @can('all-tender')
                                                        <li>
                                                            <a href="{{route('allTenders')}}">{{__('sidebar.all_tenders')}}</a>
                                                    @endcan
                                                </ul>
                                        @endif
                                        @if(auth()->user()->can('create-tender-company') || auth()->user()->can('all-tender-company'))
                                            <li id="_222" data-vertical="true"><a
                                                        href="#">{{__('sidebar.companies')}}</a>
                                                <ul>
                                                    @can('create-tender-company')
                                                        <li>
                                                            <a href="{{route('addCompany')}}">{{__('sidebar.add_company')}}</a>
                                                    @endcan
                                                    @can('all-tender-company')
                                                        <li>
                                                            <a href="{{route('allCompanies')}}">{{__('sidebar.all_companies')}}</a>
                                                    @endcan
                                                </ul>
                                        @endif
                                        @if(auth()->user()->can('create-page') || auth()->user()->can('all-page'))
                                            <li id="_223" data-vertical="true"><a href="#">{{__('sidebar.pages')}}</a>
                                                <ul>
                                                    @can('create-page')
                                                        <li>
                                                            <a href="{{route('addPage')}}">{{__('sidebar.add_page')}}</a>
                                                    @endcan
                                                    @can('all-page')
                                                        <li>
                                                            <a href="{{route('allPages')}}">{{__('sidebar.all_pages')}}</a>
                                                    @endcan
                                                </ul>
                                        @endif
                                        @can('tender-reports')
                                            <li>
                                                <a href="{{route('generateTenderReport')}}">{{__('sidebar.tender_report')}}</a>
                                        @endcan
                                    </ul>
                                @can('all-certificate')
                                    @can('section-certificates')
                                        <li>
                                            <a id="_23"
                                               href="{{route('allCertificate')}}">{{__('sidebar.certificateModule')}}</a>
                                    @endcan
                                @endcan

                                @can('all-environmental')
                                    <li>
                                        <a id="_27"
                                           href="{{route('allEnvironmentalRequests')}}">{{__('sidebar.environmentalRequests')}}</a>
                                @endcan
                                @can('all-visits')
                                    <li>
                                        <a id="_28"
                                           href="{{route('allVisits')}}">{{__('sidebar.allVisits')}}</a>
                                @endcan

                                <li>
                                    @can('section-agent')
                                        <a id="_25" href="#">
                                            {{__('sidebar.office_agent_module')}}
                                        </a>
                                    @endcan
                                    <ul>
                                        <li id="_250">
                                            <a href="{{route('getDashboardView')}}">{{__('sidebar.dashboard')}}</a>
                                        <li id="_251" data-vertical="true"><a href="#">{{__('office_agent.orders')}}</a>
                                            <ul>
                                                @can('office-agent-inbox')
                                                    <li>
                                                        <a href="{{route('getInboxOrdersView')}}?order_by_last_date=true">{{__('office_agent.inbox_orders')}}</a>
                                                @endcan
                                                @can('search-office')
                                                    <li>
                                                        <a href="{{route('getSearchOrdersView')}}?order_by_last_date=true">{{__('office_agent.search_orders')}}</a>
                                                @endcan
                                                @can('uncompleted-office')
                                                    <li>
                                                        <a href="{{route('getUncompletedOrdersView')}}">{{__('office_agent.uncompleted_orders')}}</a>
                                                @endcan
                                                @can('late-office')
                                                    <li>
                                                        <a href="{{route('getLateOrdersView')}}">{{__('office_agent.late_orders')}}</a>
                                                @endcan
                                                <li>
                                                    <a href="{{route('getArchivedOrdersView')}}">{{__('office_agent.archived_orders')}}</a>
                                                @can('show-asbestos')
                                                    <li>
                                                        <a href="{{route('getOfficeAsbestosView')}}">{{__('office_agent.show_asbestos')}}</a>
                                                @endcan
                                            </ul>
                                        @can('office-certificate')
                                            <li id="_254" data-vertical="true"><a
                                                        href="#">{{__('office_agent.office_forms')}}</a>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('getFormOfficeView',['id'=>6])}}">{{__('office_agent.form_1')}}</a>
                                                    <li>
                                                        <a href="{{route('getFormOfficeView',['id'=>7])}}">{{__('office_agent.form_2')}}</a>
                                                    <li>
                                                        <a href="{{route('getFormOfficeView',['id'=>8])}}">{{__('office_agent.form_3')}}</a>
                                                    <li>
                                                        <a href="{{route('getFormOfficeView',['id'=>9])}}">{{__('office_agent.form_4')}}</a>
                                                </ul>
                                        @endcan
                                        @can('office-reports')
                                            <li id="_255" data-vertical="true"><a
                                                        href="#">{{__('office_agent.side_reports')}}</a>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('getLoggerReportView')}}">{{__('office_agent.getLoggerReportView')}}</a>
                                                    <li>
                                                        <a href="{{route('getEditCompanyReportView')}}">{{__('office_agent.getEditCompanyReportView')}}</a>
                                                    <li>
                                                        <a href="{{route('getOfficeEmployeeReportView')}}">{{__('office_agent.getOfficeEmployeeReportView')}}</a>
                                                    <li>
                                                        <a href="{{route('getOfficeAgentsReportView')}}">{{__('office_agent.getOfficeAgentsReportView')}}</a>
                                                    <li>
                                                        <a href="{{route('getOfficeAgentDevicesReportView')}}">{{__('office_agent.getOfficeAgentDevicesReportView')}}</a>
                                                    <li>
                                                        <a href="{{route('getOfficePaymentsReportView')}}">{{__('office_agent.getOfficePaymentsReportView')}}</a>
                                                    <li>
                                                        <a href="{{route('getOfficeApprovedReportView')}}">تقرير الشركات
                                                            المعتمدة</a>
                                                </ul>
                                        @endcan
                                        @can('city')
                                            <li id="_256" data-vertical="true"><a
                                                        href="#">{{__('office_agent.locations')}}</a>
                                                <ul>
                                                    <li>
                                                        <a href="{{route('createAllLocations')}}">{{__('office_agent.create_location')}}</a>
                                                    <li>
                                                        <a href="{{route('getAllLocations')}}">{{__('office_agent.all_locations')}}</a>

                                                </ul>
                                        @endcan
                                        @can('office-users')
                                            <li id="_252" data-vertical="true"><a
                                                        href="{{route('getOfficesView')}}">{{__('sidebar.office_agent_tab')}}</a>
                                        @endcan
                                        @can('user-department-update')
                                            <li id="_253" data-vertical="true"><a
                                                        href="{{route('getAttachUsersView')}}">{{__('office_agent.users')}}</a>
                                        @endcan
                                        @can('auth-user')
                                            <li id="_257" data-vertical="true"><a
                                                        href="{{route('getManagerUserView')}}">{{__('office_agent.getManagerUserView')}}</a>
                                        @endcan
                                        @can('agent-activity')
                                            <li id="_258" data-vertical="true"><a
                                                        href="{{route('getAllActivitiesView')}}">{{__('office_agent.getAllActivitiesView')}}</a>
                                        @endcan
                                        <li id="_259" data-vertical="true"><a
                                                    href="{{route('getIsoCertView')}}">{{__('office_agent.iso_cert')}}</a>
                                    </ul>

                                @can('payments')
                                    <li>
                                        <a id="_24"
                                           href="{{route('getPaymentsView')}}">{{__('sidebar.all_payments')}}</a>
                                @endcan
                            </ul>
                        @can('main-settings')
                            <li><a id="_3" href="#">
                                    <i class="la la-cogs fa-2x"></i>
                                    <span>{{__('sidebar.general_settings')}}</span>
                                </a>
                                <ul>
                                    <li id="_31" data-vertical="true"><a href="#">{{__('sidebar.roles')}}</a>
                                        <ul>
                                            @can('create-role')
                                                <li>
                                                    <a href="{{route('addRoles')}}">{{__('sidebar.add_role')}}</a>
                                            @endcan
                                            <li>
                                                <a href="{{route('allRoles')}}">{{__('sidebar.all_roles')}}</a>
                                        </ul>
                                    <li id="_32" data-vertical="true"><a href="#">{{__('sidebar.users')}}</a>
                                        <ul>
                                            @can('create-user')
                                                <li>
                                                    <a href="{{route('addUsers')}}">{{__('sidebar.add_user')}}</a>
                                            @endcan
                                            <li>
                                                <a href="{{route('allUsers')}}">{{__('sidebar.all_users')}}</a>
                                        </ul>
                                    <li id="_33" data-vertical="true"><a
                                                href="{{route('getConfigView')}}">{{__('sidebar.config')}}</a>
                                </ul>
                        @endcan
                    </ul><!-- .my-menu -->

                </div>
            </li>
        </ul>
    </div>
</div>
