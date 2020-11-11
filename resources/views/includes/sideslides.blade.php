<div id="menu_navigation" class="d-flex  position-fixed h-100 nav-main">
    <div class="skeleton-nav--left">
        <div class="skeleton-nav--left-top">
            <ul class="skeleton-nav--items">
                <!--<li class="nav-item-hover">-->
                <!--<a href="" class="menulink" data-toggle="#notification_container">-->
            <!--    {{--<label class="red-alarm"></label>--}}-->
                <!--    <i class="la la-bell-o icon-md text-white"></i>-->
                <!--</a>-->
                <!--</li>-->
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
                        <li>
                            <a id="_1" href="{{route('getDashboardView')}}">
                                <i class="la la-dashboard fa-2x"></i>
                                <span>{{__('sidebar.dashboard')}}</span>
                            </a>
                        </li>
                        @can('all-civilians')
                            <li>
                                <a id="_2" href="{{route('getCivilians')}}">
                                    <i class="la la-user-secret fa-2x"></i>
                                    <span>{{__('sidebar.all_civilian')}}</span>
                                </a>
                            </li>
                        @endcan
{{--                            <li id="_32" data-vertical="true"><a href="#">جميع مستخدمين المستشفيات</a>--}}
{{--                                <ul>--}}
{{--                                    @can('create-user-hospital')--}}
{{--                                        <li>--}}
{{--                                            <a href="{{route('addUsersHospital')}}">اضافة مستخدم</a>--}}
{{--                                        </li>--}}
{{--                                    @endcan--}}
{{--                                        @can('all-user-hospital')--}}

{{--                                        <li>--}}
{{--                                        <a href="{{route('allUsersHospital')}}">عرض جميع مستخدمين المستشفيات</a>--}}

{{--                                        </li>--}}
{{--                                        @endcan--}}

{{--                                </ul>--}}
{{--                            </li>--}}

                        @can('show-all-falcon')
                            <li>
                                <a id="_4" href="{{route('getAllFalconsCivilians')}}">
                                    <i class="la la-outdent fa-2x"></i>
                                    <span>{{__('sidebar.all_orders')}}</span>
                                </a>
                            </li>
                        @endcan
                        @can('payments')
                            <li>
                                <a id="_4" href="{{route('getPaymentsView')}}">
                                    <i class="la la-money fa-2x"></i>
                                    <span>{{__('sidebar.all_payments')}}</span>
                                </a>
                            </li>
                        @endcan

                        <li>
                            <a id="_3" href="#">
                                <i class="la la-cogs fa-2x"></i>
                                <span>{{__('sidebar.general_settings')}}</span>
                            </a>
                            <ul>
                                <li id="_31" data-vertical="true"><a href="#">{{__('sidebar.roles')}}</a>
                                    <ul>
                                        @can('create-role')
                                            <li>
                                                <a href="{{route('addRoles')}}">{{__('sidebar.add_role')}}</a>
                                            </li>
                                        @endcan
                                        <li>
                                            <a href="{{route('allRoles')}}">{{__('sidebar.all_roles')}}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="_32" data-vertical="true"><a href="#">{{__('sidebar.users')}}</a>
                                    <ul>
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
                    </ul><!-- .my-menu -->

                </div>
            </li>
        </ul>
    </div>
</div>
