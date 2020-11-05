<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-none d-print text-center mt-3 mb-4">
            <div class="text-center">
                @if(request()->amount)
                    <span class="fs15">{{__('violation.amount')}} : </span>
                    (<span id="amount_text">{{request()->amount}}</span>),
                @endif
                @if(request()->status && request()->status != "ALL")
                    <span class="fs15">{{__('violation.status')}} : </span>
                    (<span id="status_text">{{request()->status}}</span>),
                @endif
                @if(request()->type && request()->type != "ALL")
                    <span class="fs15">{{app()->getLocale() == 'ar' ? 'النوع' : 'Type'}} : </span>
                    (<span id="type_text">{{request()->type}}</span>),
                @endif
                @if(request()->payment_type && request()->payment_type != "ALL")
                    <span class="fs15">{{__('violation.paid')}} : </span>
                    (<span id="paid_text">{{request()->payment_type}}</span>),
                @endif
                <span class="fs15">{{__('dashboard.print_date')}} : </span>
                <span>({{Carbon\Carbon::now()->format('Y-m-d H:i:s')}})</span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="bg-gray  d-print-none mb-2 p-1">
                <form method="get">
                    <div class="row">
                        <div class="col-6">
                            <b>{{__('violation.amount')}}</b>
                            <input name="amount" class="form-control" value="{{request()->amount}}"/>
                        </div>
                        <div class="col-6">
                            <b>{{__('violation.status')}}</b>
                            <select name="status" class="form-control">
                                <option value="ALL"
                                        @if(\request()->status == "ALL") selected @endif >{{__('violation.ALL')}}</option>
                                <option value="CAPTURED" @if(\request()->status == "CAPTURED") selected @endif >
                                    CAPETURED
                                </option>
                                <option value="NOT CAPTURED" @if(\request()->status == "NOT CAPTURED") selected @endif>
                                    NOT CAPETURED
                                </option>
                                <option value="CANCELED" @if(\request()->status == "CANCELLED") selected @endif>
                                    CANCELLED
                                </option>
                            </select>
                        </div>
                        <div class="col-6">
                            <b>{{app()->getLocale() == 'ar' ? 'النوع' : 'Type'}}</b>
                            <select name="type" class="form-control">
                                <option value="ALL">{{__('violation.ALL')}}</option>
                                @foreach($paymentable_types as $paymentable)
                                    <option value="{{ str_replace('App\Models\\' , '' , $paymentable) }}"
                                            @if(\request()->type == str_replace('App\Models\\' , '' , $paymentable)) selected @endif>{{__('violation.'.str_replace('App\Models\\' , '' , $paymentable))}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <b>{{__('violation.paid')}}</b>
                            <select name="payment_type" class="form-control">
                                <option value="ALL"
                                        @if(\request()->payment_type == "ALL") selected @endif>{{__('violation.ALL')}}</option>
                                <option value="KNET"
                                        @if(\request()->payment_type == "KNET") selected @endif>{{__('violation.online')}}</option>
                                <option value="CASH"
                                        @if(\request()->payment_type == "CASH") selected @endif>{{__('violation.offline')}}</option>
                            </select>
                        </div>
                        <div class="col-12 mt-2">
                            <input id="no_paginated" name="no_paginated" type="checkbox" value="true"
                                   @if(request()->no_paginated == 'true') checked @endif>
                            <label for="no_paginated">{{__('dashboard.all_data')}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <!--<div class="col-6 d-none d-print">-->
                        <!--    <ul class="list-unstyled mt-4 mb-4"> -->
                    <!--        @if(request()->amount)-->
                        <!--            <li>-->
                    <!--                <span class="fs15">{{__('violation.amount')}} : </span>-->
                    <!--                <span id="amount_text">{{request()->amount}}</span>-->
                        <!--            </li>-->
                        <!--        @endif-->
                    <!--        @if(request()->status && request()->status != "ALL")-->
                        <!--        <li>-->
                    <!--            <span class="fs15">{{__('violation.status')}} : </span>-->
                    <!--            <span id="status_text">{{request()->status}}</span>-->
                        <!--        </li>-->
                        <!--        @endif-->
                    <!--        @if(request()->type && request()->type != "ALL") -->
                        <!--        <li>-->
                    <!--            <span class="fs15">{{app()->getLocale() == 'ar' ? 'النوع' : 'Type'}} : </span>-->
                    <!--            <span id="type_text">{{request()->type}}</span>-->
                        <!--        </li>-->
                        <!--        @endif-->
                        <!--    </ul>-->
                        <!--</div>-->
                        <!--<div class="col-6 d-none d-print">-->
                        <!--    <ul class="list-unstyled mt-4 mb-4"> -->
                    <!--        @if(request()->payment_type && request()->payment_type != "ALL") -->
                        <!--        <li>-->
                    <!--            <span class="fs15">{{__('violation.paid')}} : </span>-->
                    <!--            <span id="paid_text">{{request()->payment_type}}</span>-->
                        <!--        </li>-->
                        <!--        @endif-->
                        <!--        <li>-->
                    <!--            <span class="fs15">{{__('dashboard.print_date')}} : </span>-->
                    <!--            <span>{{Carbon\Carbon::now()->format('Y-m-d H:i:s')}}</span>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="btn-group d-print-none">
                            <button class="btn btn-primary btn-sm">{{__('violation.filter')}}</button>
                            <button type="button" class="btn btn-sm btn-dark m-0 d-print-none" onclick="printTrigger()">
                                {{__('violation.print')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table_print">
                    <thead class="header_print">
                    <tr>
                        <th>#</th>
                        <th>{{app()->getLocale() == 'ar' ? 'رقم الدفع  ' : 'Transaction Id'}}</th>
                        <th>{{app()->getLocale() == 'ar' ? 'المستخدم ' : 'User'}}</th>
                        <th>{{__('violation.civil_name')}}</th>
                        <th>{{app()->getLocale() == 'ar' ? 'نوع العملية' : 'Action Type'}}</th>
                        <th>{{__('violation.amount')}}</th>
                        <th>{{app()->getLocale() == 'ar' ? 'تاريخ الدفع' : 'Created At'}}</th>
                        <th>{{app()->getLocale() == 'ar' ? 'نوع الدفع' : 'Payment Type'}}</th>
                        <th>{{__('violation.status')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $k => $payment)
                        <tr style="cursor:pointer">
                            <td onclick="showPayment({{$payment}})">

                                {{$k+1}}
                            </td>
                            <td onclick="showPayment({{$payment}})">
                                {{$payment->knet_data->tran_id ?? ''}}
                            </td>
                            <td onclick="showPayment({{$payment}})">
                                {{$payment->user->name ?? ''}}
                            </td>
                            <td onclick="showPayment({{$payment}})">
                                {{getPaymentRelated($payment)}}
                            </td>
                            <td onclick="showPayment({{$payment}})">
                                {{--{{ str_replace('App\Models\\' , ' ' , $payment->paymentable_type) }}--}}
                                {{ $payment->type }}
                            </td>
                            <td onclick="showPayment({{$payment}})">
                                {{$payment->cost}}
                            </td>
                            <td width="120px" onclick="showPayment({{$payment}})">
                                {{--{{$payment->paymentable->payed_at ?? ''}}--}}
                                @if($payment->paymentable->payed_at ?? null)
                                    {{Carbon\Carbon::parse(($payment->paymentable->payed_at ?? ''))->format('Y-m-d')}}
                                    <br/>
                                    {{Carbon\Carbon::parse(($payment->paymentable->payed_at ?? ''))->format('H:i')}}
                                @endif
                                {{--{{ $payment->status == 0 ? $payment->updated_at : $payment->paymentable->payed_at }}--}}

                            </td>
                            <td onclick="showPayment({{$payment}})">
                                {{(!$payment->knet_data && $payment->status == 1 ) ? ' كى نت' : 'اونلاين'}}
                            </td>
                            <td onclick="showPayment({{$payment}})">
                                @if($payment->knet_data)
                                    {{$payment->knet_data->result ?? ''}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if(!request()->no_paginated)
            <div class="col-md-12">
                {{$payments->appends(request()->input())->render("pagination::bootstrap-4")}}
            </div>
        @endif
    </div>
</div>
