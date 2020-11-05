
<style>
    a, a:hover {
        color: #7f0808
    }

    .card-navigation {
        font-weight: bold;
        background: #7f0808;
        border: 1px solid #000;
        margin: 2px;
        font-size: 18px;
    }
</style>
<div class="row mt-5">
    <div class="col-md-12 text-center mb-5">
        <a href="{{route('frontTenderResetCodePortal')}}" class="font-weight-bold" style="font-size: 17px">
            نسيت الرمز المرجعي ؟
        </a>
    </div>
    <div class="col-12">
        <nav>
            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                   role="tab" aria-controls="nav-profile" aria-selected="false">
                    <h3>الممارسات</h3>
                </a>
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                   role="tab" aria-controls="nav-home" aria-selected="true">
                    <h3>تسجيل الشركات</h3>
                </a>
            </div>
        </nav>
        <div class="tab-content mt-2" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="container mt-5">
                    <div class="row direction">
                        <div class="col-md-6">
                            <div class="card p-1">
                                <a class="text-white" href="{{route('frontTenderRegisterCompanyPortal')}}">
                                    <div class="card-body text-center card-navigation">
                                        تسجيل شركة جديدة
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-1">
                                <a class="text-white"
                                   href="{{route('frontTenderCompanyEnquiryPortal',['type'=>'files'])}}">
                                    <div class="card-body text-center card-navigation">
                                        الاستعلام عن ملفات الشركة
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-1">
                                <a class="text-white"
                                   href="{{route('frontTenderCompanyEnquiryPortal',['type'=>'subscriptionPay'])}}">
                                    <div class="card-body text-center card-navigation">
                                        دفع اشتراك الشركة
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-1">
                                <a class="text-white"
                                   href="{{route('frontTenderCompanyEnquiryPortal',['type'=>'status'])}}">
                                    <div class="card-body text-center card-navigation">
                                        الاستعلام عن حالة الشركة
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="container mt-5">
                    <div class="row direction">
                        <div class="col-md-6">
                            <div class="card p-1">
                                <a class="text-white" href="{{route('frontTenderAllTendersPortal')}}">
                                    <div class="card-body text-center card-navigation">
                                        عرض كافة الممارسات
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-1">
                                <a class="text-white" href="{{route('frontTenderAvailableTendersPortal')}}">
                                    <div class="card-body text-center card-navigation">
                                        الممارسات المطروحة
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-1">
                                <a class="text-white" href="{{route('frontTenderRejectTendersPortal')}}">
                                    <div class="card-body text-center card-navigation">
                                        فض العطائات
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-1">
                                <a class="text-white" href="{{route('frontTenderApprovedTendersPortal')}}">
                                    <div class="card-body text-center card-navigation">
                                        الترسيات
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
