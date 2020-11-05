<div class="row">
    <div class="col-md-12 mt-1">
        @include('pages.officeAgent.orders.office_details.templates.view_order_data')
    </div>
    <div class="col-md-12 mt-3">
        <nav>
            <div class="nav nav-tabs red" id="nav-tab2" role="tablist">
                @can('show-office-data')
                    <a class="nav-item nav-link font-weight-bold active" id="nav-home-tab2" data-toggle="tab"
                       href="#nav-home2"
                       role="tab" aria-controls="nav-home"
                       aria-selected="true">{{__('office_agent.company_info')}}  </a>
                @endcan
                @can('show-office-partner')
                        <a class="nav-item nav-link font-weight-bold" id="nav-profile-tab2" data-toggle="tab"
                           href="#nav-profile2"
                           @if($office_agent->company_type_id == 9) style='display:none' @endif
                           role="tab" aria-controls="nav-profile"
                           aria-selected="false"> {{__('office_agent.company_partners')}}    </a>
                @endcan
                @can('show-office-branch')
                    <a class="nav-item nav-link font-weight-bold" id="nav-contact-tab2" data-toggle="tab"
                       href="#nav-contact2"
                       role="tab" aria-controls="nav-contact2"
                       aria-selected="false">{{__('office_agent.company_others')}}  </a>
                @endcan
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent2">
            <div class="tab-pane fade show active" id="nav-home2" role="tabpanel"
                 aria-labelledby="nav-home-tab2">
                @can('show-office-data')
                    @include('pages.officeAgent.orders.office_details.templates.order_detail_info')
                @endcan
            </div>
            <div class="tab-pane fade" id="nav-profile2" role="tabpanel"
                 aria-labelledby="nav-profile-tab2">
                @can('show-office-partner')
                    @include('pages.officeAgent.orders.office_details.templates.partner_detail_info')
                @endcan
            </div>
            <div class="tab-pane fade" id="nav-contact2" role="tabpanel"
                 aria-labelledby="nav-contact-tab2">
                @can('show-office-branch')
                    @include('pages.officeAgent.orders.office_details.templates.branches_detail_info')
                @endcan

            </div>
        </div>
    </div>
</div>
