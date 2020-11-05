<div class="row">
    <div class="col-md-12 mt-3">
        <nav>
            <div class="nav nav-tabs" id="nav-tab2" role="tablist">
                <a class="nav-item nav-link font-weight-bold active" id="nav-home-tab2" data-toggle="tab"
                   href="#nav-home2"
                   role="tab" aria-controls="nav-home" aria-selected="true">
                    @if(($office_agent['validation']['officeData'] ?? null))
                        <i class="icon icon-check-circle text-success"></i>
                    @else
                        <i class="icon icon-info text-danger"></i>
                    @endif
                    معلومات الشركة</a>

                <a class="nav-item nav-link font-weight-bold" id="nav-profile-tab2" data-toggle="tab"
                   href="#nav-profile2"
                   @if($office_agent->company_type_id == 9) style='display:none' @endif
                   role="tab" aria-controls="nav-profile" aria-selected="false">
                    @if(($office_agent['validation']['partnerData'] ?? null))
                        <i class="icon icon-check-circle text-success"></i>
                    @else
                        <i class="icon icon-info text-danger"></i>
                    @endif
                    بيانات الشركاء</a>
                <a class="nav-item nav-link font-weight-bold" id="nav-contact-tab2" data-toggle="tab"
                   href="#nav-contact2"
                   role="tab" aria-controls="nav-contact2" aria-selected="false">
                    @if(($office_agent['validation']['branches'] ?? null))
                        <i class="icon icon-check-circle text-success"></i>
                    @else
                        <i class="icon icon-info text-danger"></i>
                    @endif
                    فروع اخري / المختبر</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent2">
            <div class="tab-pane fade show active" id="nav-home2" role="tabpanel"
                 aria-labelledby="nav-home-tab2">
                @include('frontsite.pages.officeAgent.office_details.templates.order_detail_info')
            </div>
            <div class="tab-pane fade" id="nav-profile2" role="tabpanel"
                 aria-labelledby="nav-profile-tab2">

                @include('frontsite.pages.officeAgent.office_details.templates.partner_detail_info')
            </div>
            <div class="tab-pane fade" id="nav-contact2" role="tabpanel"
                 aria-labelledby="nav-contact-tab2">
                @include('frontsite.pages.officeAgent.office_details.templates.branches_detail_info')


            </div>
        </div>
    </div>
</div>
