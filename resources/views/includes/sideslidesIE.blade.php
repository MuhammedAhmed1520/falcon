<style>#adg3-navigation:not([data-is-closed]):not([data-global-appearance]) .skeleton-nav--right {
        background-color: #174e9e;
        border: 0
    }

    #adg3-navigation:not([data-is-closed]):not([data-global-appearance]) .skeleton-nav--items-wide > li:first-child {
        color: #fff
    }

    .nav a, .nav label {
        display: block;
        padding: .85rem;
        color: #fff;
        background-color: #174e9e;
        box-shadow: inset 0 -1px #3572b0;
        transition: all .25s ease-in;
        margin: 0
    }

    .nav__list, .nav__list li {
        list-style: none;
        direction: rtl;
        padding: 0
    }

    .nav a:focus, .nav a:hover, .nav label:focus, .nav label:hover {
        color: rgba(255, 255, 255, .5);
        background: #3572b0
    }

    .nav label {
        cursor: pointer
    }

    .group-list a, .group-list label {
        padding-right: 2rem;
        background: #3572b0;
        box-shadow: inset 0 -1px #3572b0
    }

    .group-list a:focus, .group-list a:hover, .group-list label:focus, .group-list label:hover {
        background: #4180bf
    }

    .sub-group-list a, .sub-group-list label {
        padding-right: 4rem;
        background: #4180bf;
    }

    .sub-group-list a:focus, .sub-group-list a:hover, .sub-group-list label:focus, .sub-group-list label:hover {
        background: #4180bf
    }

    .sub-sub-group-list a, .sub-sub-group-list label {
        padding-right: 6rem;
        background: #5b87b3;
        box-shadow: inset 0 -1px #5b87b3
    }

    .sub-sub-group-list a:focus, .sub-sub-group-list a:hover, .sub-sub-group-list label:focus, .sub-sub-group-list label:hover {
        background: #5b87b3
    }

    .group-list, .sub-group-list, .sub-sub-group-list {
        height: 100%;
        max-height: 0;
        overflow: hidden;
        transition: max-height .5s ease-in-out;
        padding: 0;
        margin: 0;
    }

    .nav__list input[type=checkbox]:checked + label + ul {
        max-height: 1000px;
        padding: 0
    }

    label > span {
        float: left;
        transition: -webkit-transform .65s ease;
        transition: transform .65s ease;
        transition: transform .65s ease, -webkit-transform .65s ease
    }

    .nav__list input[type=checkbox]:checked + label > span {
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg)
    }</style>
<div class="d-flex  position-fixed h-100 nav-main">
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
                <header role="banner">
                    <nav class="nav" role="navigation">
                        <ul class="nav__list">
                            <li>
                                <input id="group-1" type="checkbox" hidden/>
                                <label for="group-1"><span
                                        class="la la-arrow-left"></span>{{__('sidebar.violation_module')}}</label>
                                <ul class="group-list">
                                    {{--                                    <li><a href="#">1st level item</a></li>--}}
                                    @if(auth()->user()->can('create-violation') || auth()->user()->can('all-violation'))
                                        <li>
                                            <input id="sub-group-1" type="checkbox" hidden/>
                                            <label for="sub-group-1"><span class="la la-arrow-left"></span>
                                                {{__('sidebar.violations')}}
                                            </label>
                                            <ul class="sub-group-list">
                                                @can('create-violation',auth()->user())
                                                    <li>
                                                        <a href="{{route('addViolation')}}">{{__('sidebar.add_violation')}}</a>
                                                    </li>
                                                @endcan
                                                @can('all-violation',auth()->user())
                                                    <li>
                                                        <a href="{{route('allViolations')}}">{{__('sidebar.all_violation')}}</a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </li>
                                    @endif

                                    @if(auth()->user()->can('create-subject') || auth()->user()->can('all-subject'))
                                        <li>
                                            <input id="sub-group-12" type="checkbox" hidden/>
                                            <label for="sub-group-12"><span class="la la-arrow-left"></span>
                                                {{__('sidebar.subject_rule')}}
                                            </label>
                                            <ul class="sub-group-list">
                                                @can('create-subject',auth()->user())
                                                    <li>
                                                        <a href="{{route('createSubjectRules')}}">{{__('sidebar.add_subject_rule')}}</a>
                                                @endcan
                                                @can('all-subject',auth()->user())
                                                    <li>
                                                        <a href="{{route('allSubjectRules')}}">{{__('sidebar.all_subject_rule')}}</a>
                                                @endcan
                                            </ul>
                                        </li>
                                    @endif
                                    @if(auth()->user()->can('create-punishment') || auth()->user()->can('all-punishment'))
                                        <li>
                                            <input id="sub-group-13" type="checkbox" hidden/>
                                            <label for="sub-group-13"><span class="la la-arrow-left"></span>
                                                {{__('sidebar.punishment_rule')}}
                                            </label>
                                            <ul class="sub-group-list">
                                                @can('create-punishment',auth()->user())
                                                    <li>
                                                        <a href="{{route('createPunishmentRules')}}">{{__('sidebar.add_punishment_rule')}}</a>
                                                    </li>
                                                @endcan
                                                @can('all-punishment',auth()->user())
                                                    <li>
                                                        <a href="{{route('allPunishmentRules')}}">{{__('sidebar.all_punishment_rule')}}</a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </li>
                                    @endif
                                    @can('relate-subject-punishment',auth()->user())
                                        <li>
                                            <a href="{{route('attachSubjectPunishmentRules')}}">{{__('sidebar.subject_punishment')}}</a>
                                        </li>
                                    @endcan
                                    @can('all-civilian',auth()->user())
                                        <li>
                                            <a href="{{route('allCivilians')}}">{{__('sidebar.civilian')}}</a>
                                        </li>
                                    @endcan

                                    @if(auth()->user()->can('create-officer') || auth()->user()->can('all-officer'))
                                        <input id="sub-group-13" type="checkbox" hidden/>
                                        <label for="sub-group-13"><span class="la la-arrow-left"></span>
                                            {{__('sidebar.officers')}}
                                        </label>
                                        <ul class="sub-group-list">
                                            @can('create-officer')
                                                <li>
                                                    <a href="{{route('addOfficers')}}">{{__('sidebar.add_officers')}}</a>
                                            @endcan
                                            @can('all-officer')
                                                <li>
                                                    <a href="{{route('allOfficers')}}">{{__('sidebar.all_officers')}}</a>
                                            @endcan
                                        </ul>
                                        </li>
                                    @endif
                                    @can('ppform-violation')
                                        <li>
                                            <input id="sub-group-14" type="checkbox" hidden/>
                                            <label for="sub-group-14"><span class="la la-arrow-left"></span>
                                                {{__('sidebar.pp_form')}}
                                            </label>
                                            <ul class="sub-group-list">
                                                <li><a href="{{route('editPPFrom')}}">{{__('sidebar.pp_form')}}</a>
                                                <li>
                                                    <a href="{{route('createExternalPPFromView')}}">{{__('sidebar.pp_external_form')}}</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('allExternalPPFromView')}}">{{__('sidebar.pp_external_form_show_all')}}</a>
                                                </li>
                                            </ul>
                                        </li>
                                    @endcan
                                    @can('report-violation')
                                        <li>
                                            <a href="{{route('generateViolationReport')}}">{{__('sidebar.violation_report')}}</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                            <li>
                                <input id="group-2" type="checkbox" hidden/>
                                <label for="group-2"><span
                                        class="la la-arrow-left"></span> {{__('sidebar.tenders_module')}}</label>
                                <ul class="group-list">
                                    @if(auth()->user()->can('create-tender') || auth()->user()->can('all-tender'))
                                        <li>
                                            <input id="sub-group-2" type="checkbox" hidden/>
                                            <label for="sub-group-2"><span
                                                    class="la la-arrow-left"></span>{{__('sidebar.tenders')}}</label>
                                            <ul class="sub-group-list">
                                                @can('create-tender')
                                                    <li>
                                                        <a href="{{route('addTender')}}">{{__('sidebar.add_tender')}}</a>
                                                    </li>
                                                @endcan
                                                @can('all-tender')
                                                    <li>
                                                        <a href="{{route('allTenders')}}">{{__('sidebar.all_tenders')}}</a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </li>
                                    @endif

                                    @if(auth()->user()->can('create-tender-company') || auth()->user()->can('all-tender-company'))
                                        <li>
                                            <input id="sub-group-22" type="checkbox" hidden/>
                                            <label for="sub-group-22"><span
                                                    class="la la-arrow-left"></span>{{__('sidebar.companies')}}</label>
                                            <ul class="sub-group-list">
                                                @can('create-tender')
                                                    <li>
                                                        <a href="{{route('addCompany')}}">{{__('sidebar.add_company')}}</a>
                                                    </li>
                                                @endcan
                                                @can('all-tender')
                                                    <li>
                                                        <a href="{{route('allCompanies')}}">{{__('sidebar.all_companies')}}</a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </li>
                                    @endif


                                    @if(auth()->user()->can('create-page') || auth()->user()->can('all-page'))
                                        <li>
                                            <input id="sub-group-23" type="checkbox" hidden/>
                                            <label for="sub-group-23"><span
                                                    class="la la-arrow-left"></span>{{__('sidebar.pages')}}</label>
                                            <ul class="sub-group-list">
                                                @can('create-page')
                                                    <li>
                                                        <a href="{{route('addPage')}}">{{__('sidebar.add_page')}}</a>
                                                    </li>
                                                @endcan
                                                @can('all-page')
                                                    <li>
                                                        <a href="{{route('allPages')}}">{{__('sidebar.all_pages')}}</a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </li>
                                    @endif
                                    @can('tender-reports')
                                        <li>
                                            <a href="{{route('generateTenderReport')}}">{{__('sidebar.tender_report')}}</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>

                            @can('all-certificate')
                                <li>
                                    <a href="{{route('allCertificate')}}">{{__('sidebar.certificateModule')}}</a>
                                </li>
                            @endcan

                            <li>
                                <input id="group-3" type="checkbox" hidden/>
                                <label for="group-3"><span
                                        class="la la-arrow-left"></span> {{__('sidebar.office_agent_module')}}</label>
                                <ul class="group-list">
                                    <li>
                                        <input id="sub-group-3" type="checkbox" hidden/>
                                        <label for="sub-group-3"><span class="la la-arrow-left"></span>
                                            {{__('office_agent.orders')}}
                                        </label>
                                        <ul class="sub-group-list">
                                            <li>
                                                <a href="{{route('getSearchOrdersView')}}">{{__('office_agent.search_orders')}}</a>
                                            </li>
                                            <li>
                                                <a href="{{route('getUncompletedOrdersView')}}">{{__('office_agent.uncompleted_orders')}}</a>
                                            </li>
                                            <li>
                                                <a href="{{route('getLateOrdersView')}}">{{__('office_agent.late_orders')}}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <input id="sub-group-31" type="checkbox" hidden/>
                                        <label for="sub-group-31"><span class="la la-arrow-left"></span>
                                            {{__('office_agent.office_forms')}}
                                        </label>
                                        <ul class="sub-group-list">
                                            <li>
                                                <a href="{{route('getFormOfficeView',['id'=>6])}}">{{__('office_agent.form_1')}}</a>
                                            </li>
                                            <li>
                                                <a href="{{route('getFormOfficeView',['id'=>7])}}">{{__('office_agent.form_2')}}</a>
                                            </li>
                                            <li>
                                                <a href="{{route('getFormOfficeView',['id'=>8])}}">{{__('office_agent.form_3')}}</a>
                                            </li>
                                            <li>
                                                <a href="{{route('getFormOfficeView',['id'=>9])}}">{{__('office_agent.form_4')}}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('getOfficesView')}}">{{__('office_agent.offices')}}</a></li>
                                    <li><a href="{{route('getAttachUsersView')}}">{{__('office_agent.users')}}</a></li>
                                </ul>
                            </li>
                            @can('payments')
                                <li>
                                    <a href="{{route('getPaymentsView')}}">{{__('sidebar.all_payments')}}</a>
                                </li>
                            @endcan
                            <li>
                                <input id="group-4" type="checkbox" hidden/>
                                <label for="group-4"><span
                                        class="la la-arrow-left"></span>{{__('sidebar.general_settings')}}</label>
                                <ul class="group-list">
                                    <li>
                                        <a href="{{route('getConfigView')}}">{{__('sidebar.config')}}</a>
                                    </li>
                                    <li>
                                        <input id="sub-group-4" type="checkbox" hidden/>
                                        <label for="sub-group-4"><span class="la la-arrow-left"></span>
                                            {{__('sidebar.roles')}}
                                        </label>
                                        <ul class="sub-group-list">
                                            @can('create-role')
                                                <li>
                                                    <a href="{{route('addRoles')}}">{{__('sidebar.add_role')}}</a>
                                                </li>
                                            @endcan
                                            <li><a href="{{route('allRoles')}}">{{__('sidebar.all_roles')}}</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <input id="sub-group-42" type="checkbox" hidden/>
                                        <label for="sub-group-42"><span class="la la-arrow-left"></span>
                                            {{__('sidebar.users')}}
                                        </label>
                                        <ul class="sub-group-list">
                                            @can('create-user')
                                                <li>
                                                    <a href="{{route('addUsers')}}">{{__('sidebar.add_user')}}</a>
                                                </li>
                                            @endcan
                                            <li>
                                                <a href="{{route('allUsers')}}">{{__('sidebar.all_users')}}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </header>
            </li>
        </ul>
    </div>
</div>
