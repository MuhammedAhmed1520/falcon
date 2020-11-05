<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="bg-gray mb-2 p-1">
                <div class="row">
                    <div class="col-md-4">
                        <b>{{__('violation.violation_payment_date')}}</b>
                        <input type="text" class="date-range-payment form-control">
                    </div>
                    <div class="col-md-12 mt-2">
                        <input id="paginated" name="paginated" type="checkbox" value="1">
                        <label for="paginated">{{__('dashboard.all_data')}}</label>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-12 text-center m-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary p-3 m-0" onclick="generateTenderSubscriptionPaymentReport()">
                                <i class="la la-money d-block fa-6x"></i>
                                <b>{{__('tenders.subscription_payment_report')}}</b>
                            </button>
                            <button type="button" class="btn btn-sm btn-dark p-3 m-0" onclick="generateTenderBuyersPaymentReport()">
                                <i class="la la-money d-block fa-6x"></i>
                                <b>{{__('tenders.buyer_payment_report')}}</b>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
