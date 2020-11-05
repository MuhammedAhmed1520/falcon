<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-none d-print text-center mt-3 mb-4">
            <div class="text-center">
                <span class="fs15">{{app()->getLocale() == 'ar' ? 'الانشطة' : 'Activity'}} : </span>
                (<span id="company_name"></span>),
                <span class="fs15">{{__('dashboard.print_date')}} : </span>
                <span>({{Carbon\Carbon::now()->format('Y-m-d H:i:s')}})</span>
            </div>
        </div>
        <div class="col-md-12">
            <form action="">
                <div class="bg-gray d-print-none mb-2 mt-4 p-2">
                    <div class="row ">
                        <div class="col-6">
                            <b>{{__('office_agent.activities')}}</b>
                            <select class="form-control" name="office_type_id">
                                @foreach($activities as $activity)
                                    <option value="{{$activity->id}}"
                                            @if($activity->id == request()->get('office_type_id')) selected @endif>{{$activity->title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--                        <div class="col-md-3">--}}
                        {{--                            <b>{{__('office_agent.order_date')}}</b>--}}
                        {{--                            <input type="date" class="date-range form-control text-center" dir="ltr"--}}
                        {{--                                   value="{{request()->get('created_at')}}">--}}
                        {{--                            <input type="hidden" name="start_date">--}}
                        {{--                            <input type="hidden" name="end_date">--}}
                        {{--                        </div>--}}
                        <div class="col-md-12 text-left mt-2 mb-2">
                            <div class="btn-group d-print-none">
                                <button type="submit" class="btn btn-sm btn-info m-0">
                                    {{__('violation.filter')}}
                                </button>
                                <button type="reset" class="btn btn-sm btn-danger m-0" onclick="removeReset()">
                                    {{__('violation.reset')}}
                                </button>
                                <button type="button" class="btn btn-sm btn-dark m-0 d-print-none"
                                        onclick="printTrigger()">
                                    {{__('violation.print')}}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--<div class="col-6 d-none d-print">-->
                        <!--    <ul class="list-unstyled mt-4 mb-4"> -->
                        <!--        <li>-->
                    <!--            <span class="fs15">{{__('office_agent.activities')}} : </span>-->
                        <!--            <span id="company_name"></span>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                        <!--<div class="col-6 d-none d-print">-->
                        <!--    <ul class="list-unstyled mt-4 mb-4"> -->
                        <!--        <li>-->
                    <!--            <span class="fs15">{{__('dashboard.print_date')}} : </span>-->
                    <!--            <span>{{Carbon\Carbon::now()->format('Y-m-d H:i:s')}}</span>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table_print">
                    <thead class="header_print">
                    <tr>
                        <th>{{app()->getLocale() == 'ar' ? 'اسم الشركة' : 'Office Name'}}</th>
                    <!--<th>{{app()->getLocale() == 'ar' ? 'اسم منفذ الطلب' : 'Paid User Name'}}</th>-->
                        <th>{{app()->getLocale() == 'ar' ? 'نوع العملية' : 'Action Type'}}</th>
                        <th>{{__('violation.amount')}}</th>
                        <th>{{app()->getLocale() == 'ar' ? 'وقت الدفع' : 'Created At'}}</th>
                    <!--<th>{{app()->getLocale() == 'ar' ? 'الملف' : 'File'}}</th>-->
                        <th>{{app()->getLocale() == 'ar' ? 'نوع الدفع' : 'Payment Type'}}</th>
                        {{--<th>{{__('violation.paid')}}</th>--}}
                        <th>{{app()->getLocale() == 'ar' ? 'الحالة' : 'Status'}}</th>
                    <!--<th>{{__('violation.email')}}</th>-->
                    <!--<th>{{__('violation.civil_phone')}}</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $k => $payment)
                        <tr style="cursor: pointer">
                            <td onclick="showPayment({{$payment}})">
                                {{$payment->office_agent->office_name_ar ?? ''}}
                            </td>
                            <!--<td>-->
                        <!--    {{$payment->paymentable->first()->name ?? ''}}-->
                            <!--</td>-->
                            <td onclick="showPayment({{$payment}})">
                                {{--                                                                    {{ str_replace('App\Models\\' , ' ' , $payment->paymentable_type) }}--}}
                                {{ $payment->type->name }}
                            </td>
                            <td onclick="showPayment({{$payment}})">
                                {{$payment->cost}}
                            </td>
                            <td onclick="showPayment({{$payment}})">
                                {{$payment->payed_at}}
                            </td>
                            <!--<td>-->
                        <!--    @if($payment->file_path)-->
                        <!--        <a href="{{$payment->file_path}}">-->
                        <!--            {{__('office_agent.download')}}-->
                            <!--        </a>-->
                            <!--    @endif-->
                            <!--</td>-->
                            <td onclick="showPayment({{$payment}})">
                                {{(!($payment->paymentable->first()->knet_data ?? null) && ($payment->paymentable->first()->status ?? null) == 1 ) ? 'KNET' : 'Online'}}
                            </td>
                            {{--<td class="text-center" onclick="showPayment({{$payment}})">--}}
                            {{--{!! $payment->payed_at == null ?  '<i class="la la-close text-danger"></i>' : '<i class="la la-check text-success"></i>' !!}--}}
                            {{--</td>--}}
                            <td onclick="showPayment({{$payment}})">
                                @if($payment->paymentable->first()->knet_data ?? '')
                                    {{--RESULT : --}}
                                    {{$payment->paymentable->first()->knet_data->result ?? ''}}
                                    {{--<br>--}}
                                    {{--PAYMENT ID : {{$payment->paymentable->first()->knet_data->payment_id ?? ''}} <br>--}}
                                    {{--POSTDATE : {{$payment->paymentable->first()->knet_data->post_date ?? ''}} <br>--}}
                                    {{--TRACK ID : {{$payment->paymentable->first()->knet_data->track_id ?? ''}} <br>--}}
                                    {{--AUTH : {{$payment->paymentable->first()->knet_data->auth ?? ''}} <br>--}}
                                    {{--<br>--}}
                                    {{--<span--}}
                                    {{--class="text-info"> {{$payment->paymentable->first()->knet_data->tran_id ?? ''}} </span>--}}
                                @endif
                            </td>
                            <!--<td>-->
                        <!--    {{$payment->paymentable->first()->email ?? ''}}-->
                            <!--</td>-->
                            <!--<td>-->
                        <!--    {{$payment->paymentable->first()->phone ?? ''}}-->
                            <!--</td>-->
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
