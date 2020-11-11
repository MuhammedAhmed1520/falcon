<div class="container-fluid">
    <div class="row divHeader">
        <div class="col-md-12 text-center">
            <img src="{{asset('assets/images/logo.png')}}"  width="120" height="120" class="mt-4 pull-right float-right"
                 alt="">
            <img src="{{asset('assets/images/new_kuwait.png')}}"  width="120" height="120" class="mt-4 pull-left float-left"
                 alt="">
            <h1 class="m-4">
                <b class="report_header"> الهيئة العامة للبيئة - تقارير  {{__('sidebar.payment')}}  </b> <br>
                <span class="fs25">{{__('sidebar.payment_register')}}</span>
            </h1>
        </div>
        <div class="col-12 d-none d-print text-center mt-3 mb-4  ">
            <div class="text-center">
                @if(request()->start_date && request()->end_date)
                    <span class="fs15">الفترة   : </span>
                    <span>من {{request()->start_date}} الى {{request()->end_date}} </span>
                    <br>
                @endif
                    <span class="fs15">اجمالى المبالغ : </span>
                    (<span>{{$payments->sum('cost') ?? 0}}</span>),
                    <span class="fs15"> عدد الصفوف   : </span>
                    (<span>{{count($payments ?? []) ?? 0}}</span>),
                @if(request()->amount)
                    <span class="fs15">{{__('violation.amount')}} : </span>
                    (<span id="amount_text">{{request()->amount}}</span>),
                @endif
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
                        <div class="col-md-6">
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
                        <div class="col-md-4">
                            <b>{{__('violation.date_range')}}</b>
                            <input type="text" class="date-range form-control text-center" dir="ltr">
                            <input type="hidden" name="start_date" value="{{request()->get('start_date')}}">
                            <input type="hidden" name="end_date" value="{{request()->get('end_date')}}">
                        </div>
{{--                        <div class="col-md-4">--}}
{{--                            <b>{{__('violation.paid')}}</b>--}}
{{--                            <select name="payment_type" class="form-control">--}}
{{--                                <option value="ALL"--}}
{{--                                        @if(\request()->payment_type == "ALL") selected @endif>{{__('violation.ALL')}}</option>--}}
{{--                                <option value="KNET"--}}
{{--                                        @if(\request()->payment_type == "KNET") selected @endif>{{__('violation.online')}}</option>--}}
{{--                                <option value="CASH"--}}
{{--                                        @if(\request()->payment_type == "CASH") selected @endif>{{__('violation.offline')}}</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
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
            <div class="table-responsives">
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
                                {{--{{$payment->paymentable->paid_at ?? ''}}--}}
                                @if($payment->paymentable->paid_at ?? null)
                                    {{Carbon\Carbon::parse(($payment->paymentable->paid_at ?? ''))->format('Y-m-d')}}
                                    <br/>
                                    {{Carbon\Carbon::parse(($payment->paymentable->paid_at ?? ''))->format('H:i')}}
                                @endif
                                {{--{{ $payment->status == 0 ? $payment->updated_at : $payment->paymentable->paid_at }}--}}

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
                    <tfoot class="d-print-none">
                        <tr>
                            <td colspan="3">اجمالى المبالغ </td>
                            <td colspan="6">{{$payments->sum('cost') ?? 0}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">عدد الصفوف</td>
                            <td colspan="6">{{count($payments ?? []) ?? 0}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

