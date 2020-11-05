@extends('layouts.masterIE')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    {{Html::style('assets/css/sweetalert2.min.css')}}
    {{Html::style('assets/css/jquery.sweet-modal.min.css')}}
    <style>
        .nav-tabs {
            border: 1px solid #dee2e6;
        }

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #ffffff;
            background-color: #3b75ccbf;
        }

        .nav-tabs.red .nav-item.show .nav-link, .nav-tabs.red .nav-link.active {
            color: #ffffff;
            background-color: #518be08c;
        }

        .btn-info {
            color: #fff;
            background-color: #4575bc;
            border-color: #4575bc;
        }

        .nav-tabs .nav-link {
            margin-top: 5px;
        }

        .sweet-modal-overlay {
            z-index: 99999;
        }

        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid">
                    @include('pages.officeAgent.orders.office_details.templates.header')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <legend>{{app()->getLocale() == 'ar' ? 'عمليات' : 'Processes'}}</legend>
                                        <div class="row mt-1">
                                            <div class="col-md-12">
                                                <div class="btn-groups">
                                                    @can('show-required-data')
                                                        <a href="{{route('getErrorFilesView',['id'=>$office_agent->id])}}"
                                                           class="btn btn-info mt-1 tooltipss"
                                                           aria-label="{{__('office_agent.error_files')}}">
                                                            {{__('office_agent.error_files')}}
                                                        </a>
                                                    @endcan

                                                    {{--@if(in_array('certificate',$office_agent->button_status))--}}
                                                    {{--<a href="{{route('getFormCertify',['id'=>$office_agent->id,'form_type'=>$office_agent->form_type])}}"--}}
                                                    {{--aria-label="اظهار الشهادة"--}}
                                                    {{--class="btn btn-info mt-1 tooltipss">--}}
                                                    {{--اظهار الشهادة--}}
                                                    {{--</a>--}}
                                                    {{--@endif--}}
                                                    @can('office-request')
                                                        {{--@if(in_array('company_rename',$office_agent->button_status))--}}
                                                        {{--<a href="{{route('getRequestChangeNameOrdersView',['id'=>$office_agent->id])}}"--}}
                                                        {{--aria-label="{{__('office_agent.change_name')}}"--}}
                                                        {{--class="btn btn-info mt-1 tooltipss">--}}
                                                        {{--{{__('office_agent.change_name')}}--}}
                                                        {{--</a>--}}
                                                        {{--@endif--}}
                                                        {{--@if(in_array('replacement',$office_agent->button_status))--}}
                                                        {{--<a href="{{route('getRequestReturnOrdersView',['id'=>$office_agent->id])}}"--}}
                                                        {{--aria-label="{{__('office_agent.make_copy')}}"--}}
                                                        {{--class="btn btn-info mt-1 tooltipss">--}}
                                                        {{--{{__('office_agent.make_copy')}}--}}
                                                        {{--</a>--}}
                                                        {{--@endif--}}
                                                        {{--@if(in_array('original',$office_agent->button_status))--}}
                                                        {{--<a href="{{route('getRequestCopyOrdersView',['id'=>$office_agent->id])}}"--}}
                                                        {{--aria-label="{{__('office_agent.missed_document')}}"--}}
                                                        {{--class="btn btn-info mt-1 tooltipss">--}}
                                                        {{--{{__('office_agent.missed_document')}}--}}
                                                        {{--</a>--}}
                                                        {{--@endif--}}
                                                        @if(in_array('purchase',$office_agent->button_status))
                                                            <a href="{{route('getRequestApproveCertifyView',['id'=>$office_agent->id])}}"
                                                               aria-label="{{__('office_agent.certificate_purchase')}}"
                                                               class="btn btn-info mt-1 tooltipss">
                                                                {{__('office_agent.certificate_purchase')}}
                                                            </a>
                                                        @endif
                                                        @if(in_array('renewal',$office_agent->button_status))
                                                            <a href="{{route('getRequestRenewCertifyView',['id'=>$office_agent->id])}}"
                                                               aria-label="{{__('office_agent.certificate_renewal_fees')}}"
                                                               class="btn btn-info mt-1 tooltipss">
                                                                {{__('office_agent.certificate_renewal_fees')}}
                                                            </a>
                                                        @endif
                                                        @if(in_array('stop_approve',$office_agent->button_status))
                                                            <a href="{{route('getStopCertifyView',['id'=>$office_agent->id])}}"
                                                               aria-label="{{__('office_agent.certificate_reject')}}"
                                                               class="btn btn-info mt-1 tooltipss">
                                                                {{__('office_agent.certificate_reject')}}
                                                            </a>
                                                        @endif
                                                        {{--  @if(in_array('log',$office_agent->button_status)) --}}
                                                        {{--      <a href="{{route('getOfficeAgentLoggerView',['id'=>$office_agent->id])}}" --}}
                                                        {{--         aria-label="{{__('office_agent.logger')}}" --}}
                                                        {{--         class="btn btn-info mt-1 tooltipss"> --}}
                                                        {{--          {{__('office_agent.logger')}} --}}
                                                        {{--      </a> --}}
                                                        {{--  @endif --}}
                                                        @if(in_array('update_order_type',$office_agent->button_status))
                                                            <a href="{{route('updateOfficeOrderType',['id'=>$office_agent->id])}}"
                                                               @if($office_agent->office_order_type_id == 100)
                                                               aria-label="{{__('office_agent.update_order_type_cancel')}}"
                                                               @else
                                                               aria-label="{{__('office_agent.update_order_type_ok')}}"
                                                               @endif
                                                               class="btn btn-info mt-1 tooltipss">
                                                                @if($office_agent->office_order_type_id == 100)
                                                                    {{__('office_agent.update_order_type_cancel')}}
                                                                @else
                                                                    {{__('office_agent.update_order_type_ok')}}
                                                                @endif
                                                            </a>
                                                        @endif
                                                        {{--@if(in_array('order_payment',$office_agent->button_status) && $office_agent->certificate_fees)--}}
                                                        {{--<button class="btn btn-warning tooltipss"--}}
                                                        {{--aria-label="مشاهدة / طباعة ايصال شراء الكراسة"--}}
                                                        {{--onclick="showPayment({{$office_agent->certificate_fees}})">--}}
                                                        {{--طباعة--}}
                                                        {{--</button>--}}
                                                        {{--@endif--}}
                                                        {{--@if(in_array('update_front',$office_agent->button_status))--}}
                                                        {{--@if($office_agent->is_front == "1")--}}
                                                        {{--<a class="btn btn-info mt-1 tooltipss"--}}
                                                        {{--aria-label="اخفاء الشركة من الشركات المعتمدة على الموقع الرئيسى"--}}
                                                        {{--href="{{route('updateStatusFront',['id'=>$office_agent->id])}}">--}}
                                                        {{--اخفاء من الشركات المعتمدة على الموقع الرئيسى--}}
                                                        {{--</a>--}}
                                                        {{--@else--}}
                                                        {{--<a class="btn btn-info mt-1 tooltipss"--}}
                                                        {{--aria-label="اظهار الشركة من الشركات المعتمدة على الموقع الرئيسى"--}}
                                                        {{--href="{{route('updateStatusFront',['id'=>$office_agent->id])}}">--}}
                                                        {{--اظهار من الشركات المعتمدة على الموقع الرئيسى--}}
                                                        {{--</a>--}}
                                                        {{--@endif--}}
                                                        {{--@endif--}}
                                                    @endcan

                                                    @can('office-update-read')
                                                        <a class="btn btn-info mt-1 tooltipss"
                                                           aria-label="تحديد كمقروء"
                                                           href="{{route('updateOfficeRead',['id'=>$office_agent->id])}}">
                                                            @if(!$office_agent->is_read)
                                                                تحديد كمقروء
                                                            @else
                                                                تحديد كغير مقروء
                                                            @endif
                                                        </a>
                                                    @endcan
                                                    @if(in_array('certificate',$office_agent->button_status))
                                                        @if(!($office_agent->certificates ?? []))
                                                            <a href="{{route('getFormCertify',['id'=>$office_agent->id,'form_type'=>$office_agent->form_type])}}"
                                                               aria-label="اظهار الشهادة"
                                                               class="btn btn-info mt-1 tooltipss">
                                                                اظهار الشهادة
                                                            </a>
                                                        @else
                                                            <button type="button" class="btn btn-info mt-1 tooltipss"
                                                                    data-toggle="modal"
                                                                    data-target="#certificates_modal">
                                                                الشهادات المتاحة
                                                            </button>
                                                        @endif
                                                    @endif
                                                    @can('office-request')
                                                        @if(in_array('replacement',$office_agent->button_status))
                                                            <a href="{{route('getRequestReturnOrdersView',['id'=>$office_agent->id])}}"
                                                               aria-label="{{__('office_agent.make_copy')}}"
                                                               class="btn btn-info mt-1 tooltipss">
                                                                {{__('office_agent.make_copy')}}
                                                            </a>
                                                        @endif
                                                        @if(in_array('original',$office_agent->button_status))
                                                            <a href="{{route('getRequestCopyOrdersView',['id'=>$office_agent->id])}}"
                                                               aria-label="{{__('office_agent.missed_document')}}"
                                                               class="btn btn-info mt-1 tooltipss">
                                                                {{__('office_agent.missed_document')}}
                                                            </a>
                                                        @endif
                                                    @endcan
                                                </div>
                                            </div>
                                    </fieldset>
                                </div>
                                @can('update-confirmAt')
                                    @if(in_array('updateConfirmAt',$office_agent->button_status))
                                        <div class="col-md-12">
                                            <fieldset>
                                                <legend>{{app()->getLocale() == 'ar' ? 'تعديل تاريخ الاعتماد' : 'Confirm Date'}}</legend>
                                                <div class="row mt-1">
                                                    <div class="col-md-3">
                                                        <label class="font-weight-bold text-black">{{app()->getLocale() == 'ar' ? 'التاريخ' : 'Date'}}</label>
                                                        <input type="text" class="form-control confirm_date"
                                                               id="confirmdate"
                                                               name="date">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button class="btn btn-info mt-1 tooltipss"
                                                                onclick="updateOfficeConfirmedAt('{{route('updateOfficeConfirmedAt',['id'=>$office_agent->id])}}')">
                                                            تعديل تاريخ الاعتماد
                                                        </button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    @endif
                                @endcan

                                {{--<div class="col-md-4">--}}
                                {{--<div class="col-md-12">--}}
                                {{--<fieldset>--}}
                                {{--<legend>{{app()->getLocale() == 'ar' ? 'عمليات الشهادة' : 'Certify Processes'}}</legend>--}}
                                {{--<div class="row mt-1">--}}
                                {{--<div class="col-md-12">--}}
                                {{--@if(in_array('certificate',$office_agent->button_status))--}}
                                {{--<a href="{{route('getFormCertify',['id'=>$office_agent->id,'form_type'=>$office_agent->form_type])}}"--}}
                                {{--aria-label="اظهار الشهادة"--}}
                                {{--class="btn btn-info mt-1 tooltipss">--}}
                                {{--اظهار الشهادة--}}
                                {{--</a>--}}
                                {{--@endif--}}
                                {{--@can('office-request')--}}
                                {{--@if(in_array('replacement',$office_agent->button_status))--}}
                                {{--<a href="{{route('getRequestReturnOrdersView',['id'=>$office_agent->id])}}"--}}
                                {{--aria-label="{{__('office_agent.make_copy')}}"--}}
                                {{--class="btn btn-info mt-1 tooltipss">--}}
                                {{--{{__('office_agent.make_copy')}}--}}
                                {{--</a>--}}
                                {{--@endif--}}
                                {{--@if(in_array('original',$office_agent->button_status))--}}
                                {{--<a href="{{route('getRequestCopyOrdersView',['id'=>$office_agent->id])}}"--}}
                                {{--aria-label="{{__('office_agent.missed_document')}}"--}}
                                {{--class="btn btn-info mt-1 tooltipss">--}}
                                {{--{{__('office_agent.missed_document')}}--}}
                                {{--</a>--}}
                                {{--@endif--}}
                                {{--@endcan--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</fieldset>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card mt-4 mb-5">
                                <div class="card-body">

                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link font-weight-bold active" id="nav-home-tab"
                                               data-toggle="tab"
                                               href="#nav-home"
                                               role="tab" aria-controls="nav-home" aria-selected="true">
                                                {{__('office_agent.company_details')}}</a>
                                            @can('show-office-human-resource')
                                                <a class="nav-item nav-link font-weight-bold" id="nav-profile-tab"
                                                   data-toggle="tab"
                                                   href="#nav-profile"
                                                   role="tab" aria-controls="nav-profile" aria-selected="false">
                                                    {{__('office_agent.human_resource')}}</a>
                                            @endcan
                                            @can('show-office-device')
                                                <a class="nav-item nav-link font-weight-bold" id="nav-contact-tab"
                                                   data-toggle="tab"
                                                   href="#nav-contact"
                                                   role="tab" aria-controls="nav-contact"
                                                   aria-selected="false">{{__('office_agent.devices')}}
                                                </a>
                                            @endcan
                                            <a class="nav-item nav-link font-weight-bold" id="nav-study-tab"
                                               data-toggle="tab"
                                               href="#nav-study"
                                               role="tab" aria-controls="nav-study" aria-selected="false">
                                                {{__('office_agent.reports')}}</a>
                                            {{--<a class="nav-item nav-link font-weight-bold" id="nav-archive-tab"--}}
                                            {{--data-toggle="tab"--}}
                                            {{--href="#nav-archive"--}}
                                            {{--role="tab" aria-controls="nav-study" aria-selected="false">--}}
                                            {{--{{__('office_agent.archive')}}</a>--}}
                                            <a class="nav-item nav-link font-weight-bold" id="nav-payment-tab"
                                               data-toggle="tab"
                                               href="#nav-payment"
                                               role="tab" aria-controls="nav-payment" aria-selected="false">
                                                {{__('office_agent.payments')}}
                                            </a>
                                            @can('send-process')
                                                <a class="nav-item nav-link font-weight-bold"
                                                   id="nav-inner-tab"
                                                   data-toggle="tab"
                                                   href="#nav-inner"
                                                   role="tab"
                                                   aria-controls="nav-inner"
                                                   aria-selected="false">
                                                    {{__('office_agent.inner_attachment')}}
                                                </a>
                                            @endcan
                                            @can('external-attachment')
                                                <a class="nav-item nav-link font-weight-bold"
                                                   id="nav-inner-tab"
                                                   data-toggle="tab"
                                                   href="#nav-outter"
                                                   role="tab"
                                                   aria-controls="nav-inner"
                                                   aria-selected="false">
                                                    {{__('office_agent.outter_attachment')}}
                                                </a>
                                            @endcan
                                            <a class="nav-item nav-link font-weight-bold"
                                               id="nav-logger-infos"
                                               data-toggle="tab"
                                               href="#nav-logger-info"
                                               role="tab"
                                               aria-controls="nav-logger-info"
                                               aria-selected="false">
                                                {{__('office_agent.logger')}}
                                            </a>
                                            <a class="nav-item nav-link font-weight-bold"
                                               id="nav-nav-data-dates"
                                               data-toggle="tab"
                                               href="#nav-data-dates"
                                               role="tab"
                                               aria-controls="nav-data-dates"
                                               aria-selected="false">
                                                {{app()->getLocale() == 'ar' ? 'تعديل بيانات' : 'Edit Info'}}
                                            </a>
                                            <a class="nav-item nav-link font-weight-bold"
                                               id="nav-main_info-tab"
                                               data-toggle="tab"
                                               href="#nav-main_info"
                                               role="tab"
                                               aria-controls="nav-main_info"
                                               aria-selected="false">
                                                {{app()->getLocale() == 'ar' ? 'تحويل الطلب' : 'transfer order'}}
                                            </a>
                                            <a class="nav-item nav-link font-weight-bold"
                                               id="nav-history-tab"
                                               data-toggle="tab"
                                               href="#nav-history"
                                               role="tab"
                                               aria-controls="nav-history"
                                               aria-selected="false">
                                                {{app()->getLocale() == 'ar' ? 'طلب ارشفة' : 'History'}}
                                            </a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                             aria-labelledby="nav-home-tab">
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    @include('pages.officeAgent.orders.office_details.templates.order_detail')
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                             aria-labelledby="nav-profile-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @can('show-office-human-resource')
                                                        @include('pages.officeAgent.orders.office_details.templates.human_resources')
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                             aria-labelledby="nav-contact-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @can('show-office-device')
                                                        @include('pages.officeAgent.orders.office_details.templates.installment_resources')
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                             aria-labelledby="nav-contact-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @include('pages.officeAgent.orders.office_details.templates.installment_resources')
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-payment" role="tabpanel"
                                             aria-labelledby="nav-payment-tab">
                                            @can('show-office-payment')
                                                <div class="row mt-4">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-hover"
                                                                   id="data_tables" style="width:100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>{{app()->getLocale() == 'ar' ? 'رقم الايصال  ' : 'reciept code'}}</th>
                                                                    <th>{{__('violation.civil_name')}}</th>
                                                                    <th>{{__('violation.amount')}}</th>
                                                                    <th>{{app()->getLocale() == 'ar' ? 'وقت الدفع' : 'Created At'}}</th>
                                                                    <th>{{app()->getLocale() == 'ar' ? 'المرفق' : 'File'}}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($office_agent->payments as $k => $payment)
                                                                    <?php $payment->paymentable->first() ?? '';?>
                                                                    <tr style="cursor: pointer">
                                                                        <td class="d-none">{{$payment->paymentable->first()->name ?? ''}}</td>
                                                                        <td onclick="showPayment({{$payment}})">
                                                                            {{$payment->receipt_code ?? ''}}
                                                                        </td>
                                                                        <td onclick="showPayment({{$payment}})">
                                                                            {{$payment->paymentable->first()->name ?? ''}}
                                                                        </td>
                                                                        <td onclick="showPayment({{$payment}})">
                                                                            {{$payment->cost}}
                                                                        </td>
                                                                        <td onclick="showPayment({{$payment}})">
                                                                            @if($payment->payed_at)
                                                                                {{Carbon\Carbon::parse(($payment->payed_at ?? ''))->format('Y-m-d')}}
                                                                                <br/>
                                                                                {{Carbon\Carbon::parse(($payment->payed_at ?? ''))->format('H:i')}}
                                                                            @endif
                                                                        </td>
                                                                        <td onclick="showPayment({{$payment}})">
                                                                            @if($payment->file_path)
                                                                                <a href="{{$payment->file_path}}">
                                                                                    {{__('office_agent.download')}}
                                                                                </a>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endcan
                                        </div>
                                        <div class="tab-pane fade" id="nav-study" role="tabpanel"
                                             aria-labelledby="nav-study-tab">
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    @include('pages.officeAgent.orders.office_details.templates.reports_details')
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-archive" role="tabpanel"
                                             aria-labelledby="nav-archive-tab">
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    @include('pages.officeAgent.orders.office_details.templates.archives_details')
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-inner" role="tabpanel"
                                             aria-labelledby="nav-inner-tab">
                                            {{--                                            <div class="row mt-4">--}}
                                            {{--                                                <div class="col-md-12">--}}
                                            {{--                                                    <label class="font-weight-bold">{{__('office_agent.notes')}}</label>--}}
                                            {{--                                                    <input type="text" class="form-control">--}}
                                            {{--                                                </div>--}}
                                            {{--                                                <div class="col-md-4">--}}
                                            {{--                                                    <label class="font-weight-bold">{{__('office_agent.file')}}</label>--}}
                                            {{--                                                    <input type="file" class="form-control">--}}
                                            {{--                                                </div>--}}
                                            {{--                                                <div class="col-md-12 mt-2">--}}
                                            {{--                                                    <button class="btn btn-primary">{{__('office_agent.add')}}</button>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}

                                            @can('show-in-attachments')
                                                <div class="row mt-3">

                                                    <div class="col-md-12">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th width="50"></th>
                                                                <th>{{__('office_agent.file')}}</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($office_agent->processes as $process)
                                                                @foreach($process->file_path as $file)
                                                                    <tr>
                                                                        <td></td>
                                                                        <td>
                                                                            <a href="{{$file->name}}">
                                                                                {{__('office_agent.download')}}
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            @endcan
                                        </div>
                                        <div class="tab-pane fade" id="nav-outter" role="tabpanel"
                                             aria-labelledby="nav-outter-tab">
                                            <div class="row">
                                                <div class="col-md-12 mt-3">
                                                    {{Form::open([
                                                        'method'=>'post',
                                                        'id'=>'adminHandleOutterAttachmentForm',
                                                        'route'=>['adminHandleOutterAttachment',request()->id],
                                                        'enctype'=>'multipart/form-data'
                                                    ])}}

                                                    <div class="row">
                                                        <div class="col-md-12 mb-2">
                                                            <div class="progress">
                                                                <div class="progress-bar"
                                                                     id="outter_attachment_progress" role="progressbar"
                                                                     style="width: 0%;" aria-valuenow="25"
                                                                     aria-valuemin="0" aria-valuemax="100">0%
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                    class="font-weight-bold">{{__('office_agent.title')}}</label>
                                                            <input type="text" class="form-control" name="title"
                                                                   required>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                    class="font-weight-bold">{{__('office_agent.book_number')}}</label>
                                                            <input type="text" class="form-control" name="book_number"
                                                                   required>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                    class="font-weight-bold">{{__('office_agent.file')}}</label>
                                                            <input type="file" class="form-control" name="file"
                                                                   required>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <button class="btn btn-primary">
                                                                {{__('office_agent.add')}}
                                                            </button>
                                                        </div>
                                                    </div>

                                                    {{Form::close()}}
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="col-md-12 mt-4">
                                                        @if(count($office_agent->external_attachments))
                                                            <button type="button"
                                                                    class="btn btn-info mr-1 ml-1 float-right"
                                                                    data-toggle="modal"
                                                                    data-target="#files_viewer_modal"
                                                                    onclick="addFilesViewer('{{$office_agent->external_attachments ?? []}}')">
                                                                تصفح المرفقات
                                                            </button>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12">
                                                        <table class="table table-ressponsive"
                                                               id="external_attachment_table">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>{{__('office_agent.title')}}</th>
                                                                <th>{{__('office_agent.book_number')}}</th>
                                                                <th>{{__('office_agent.file')}}</th>
                                                                <th></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($office_agent->external_attachments as $attachment)
                                                                <tr id="external_attachment_file_{{$attachment->id}}">
                                                                    <td>{{$attachment->id  ?? ''}}</td>
                                                                    <td>{{$attachment->title ?? ''}}</td>
                                                                    <td>{{$attachment->book_number ?? ''}}</td>
                                                                    <td>
                                                                        <a href="{{$attachment->file_path}}">
                                                                            {{__('office_agent.download')}}
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        @can('edit-office-studies')
                                                                        <button
                                                                                class="btn btn-danger btn-sm text-center"
                                                                                onclick="deleteExternalAttachmentFile('{{$attachment->id}}')">
                                                                            <i class="la la-remove   mr-0"></i>
                                                                        </button>
                                                                        @endcan
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-logger-info" role="tabpanel"
                                             aria-labelledby="nav-logger-tab">
                                            <div class="row mt-4">
                                                @can('track-process')
                                                    <div class="col-md-12">
                                                        <fieldset>
                                                            <legend>{{__('office_agent.logger')}}</legend>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered text-center">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                {{--                                                                                <th>{{__('office_agent.status')}}</th>--}}
                                                                                <th>{{__('office_agent.date')}}</th>
                                                                                <th>مرسل من</th>
                                                                                <th>مرسل الى</th>
                                                                                <th width="500px">{{__('office_agent.notes')}}</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach($office_agent->process_paginate as $k=>$process)

                                                                                <tr>

                                                                                    <td>{{$k+1}}</td>
                                                                                    {{--<td>{{$process->status->name ?? null ?? $process->status_text ?? ''}}</td>--}}
                                                                                    <td>
                                                                                        {{Carbon\Carbon::parse(($process->created_at ?? ''))->format('Y-m-d')}}
                                                                                        <br/>
                                                                                        {{Carbon\Carbon::parse(($process->created_at ?? ''))->format('H:i')}}
                                                                                    </td>
                                                                                    <td>
                                                                                        {{$process['from'] ?? ''}}
                                                                                    </td>
                                                                                    <td>
                                                                                        {{$process['to'] ?? ''}}
                                                                                    </td>
                                                                                    <td>{{$process->comment}}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div clas="col-md-12">
                                                                    {{$office_agent->process_paginate->render() ?? ''}}
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                @endcan
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-data-dates" role="tabpanel"
                                             aria-labelledby="nav-data-dates-tab">
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <fieldset>
                                                        <legend>{{app()->getLocale() == 'ar' ? 'تعديل بيانات' : 'Edit Info'}}</legend>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table class="table table-bordered">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>تاريخ اخر ارسال الشركة</td>
                                                                        <td>
                                                                            @if($office_agent['entities']['last_updated_date'] ?? '')
                                                                                {{Carbon\Carbon::parse(($office_agent['entities']['last_updated_date'] ?? ''))->diffForHumans()}}
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    @foreach($office_agent['entities']['order_entities'] ?? []  as $ent)
                                                                        <tr>
                                                                            <td>
                                                                                {{__('office_agent.'.($ent['key'] ?? '').'_edit')}}
                                                                            </td>
                                                                            <td>
                                                                                @if($ent['date'] ?? '')
                                                                                    {{Carbon\Carbon::parse(($ent['date'] ?? ''))->diffForHumans()}}
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    <!--<tr>-->
                                                                    <!--    <td>تاريخ اخر تحديث لعناوين الفروع الاخري</td>-->
                                                                    <!--    <td>-->
                                                                    <!--        @if($office_agent['entities']['entities']['addresses'] ?? '')-->
                                                                    <!--            {{Carbon\Carbon::parse(($office_agent['entities']['entities']['addresses'] ?? ''))->diffForHumans()}}-->
                                                                    <!--        @endif -->
                                                                    <!--    </td> -->
                                                                    <!--</tr> -->
                                                                    <!--<tr>-->
                                                                    <!--    <td>تاريخ اخر تحديث للمرفقات</td>-->
                                                                    <!--    <td>-->
                                                                    <!--        @if($office_agent['entities']['entities']['attachments'] ?? '')-->
                                                                    <!--            {{Carbon\Carbon::parse(($office_agent['entities']['entities']['attachments'] ?? ''))->diffForHumans()}}-->
                                                                    <!--        @endif -->
                                                                    <!--    </td> -->
                                                                    <!--</tr> -->
                                                                    <!--<tr>-->
                                                                    <!--    <td>تاريخ اخر تحديث لبيانات الشركاء</td>-->
                                                                    <!--    <td>-->
                                                                    <!--        @if($office_agent['entities']['entities']['office_partners'] ?? '')-->
                                                                    <!--            {{Carbon\Carbon::parse(($office_agent['entities']['entities']['office_partners'] ?? ''))->diffForHumans()}}-->
                                                                    <!--        @endif-->
                                                                    <!--    </td> -->
                                                                    <!--</tr> -->
                                                                    <!--<tr>-->
                                                                    <!--    <td>تاريخ اخر تحديث لمرفقات الموارد البشرية</td>-->
                                                                    <!--    <td>-->
                                                                    <!--        @if($office_agent['entities']['entities']['office_partners'] ?? '')-->
                                                                    <!--            {{Carbon\Carbon::parse(($office_agent['entities']['entities']['human_resources_attachments'] ?? ''))->diffForHumans()}}-->
                                                                    <!--        @endif-->
                                                                    <!--    </td> -->
                                                                    <!--</tr> -->
                                                                    <!--<tr>-->
                                                                    <!--    <td>تاريخ اخر تحديث للموارد البشرية</td>-->
                                                                    <!--    <td>-->

                                                                    <!--        @if($office_agent['entities']['entities']['office_partners'] ?? '')-->
                                                                    <!--            {{Carbon\Carbon::parse(($office_agent['entities']['entities']['human_resources'] ?? ''))->diffForHumans()}}-->
                                                                    <!--        @endif-->

                                                                    <!--    </td> -->
                                                                    <!--</tr> -->
                                                                    <!--<tr>-->
                                                                    <!--    <td>تاريخ اخر لمرفقات الاجهزة والمعدات</td>-->
                                                                    <!--    <td>-->

                                                                    <!--        @if($office_agent['entities']['entities']['devices_attachments'] ?? '')-->
                                                                    <!--            {{Carbon\Carbon::parse(($office_agent['entities']['entities']['devices_attachments'] ?? ''))->diffForHumans()}}-->
                                                                    <!--        @endif-->

                                                                    <!--    </td> -->
                                                                    <!--</tr> -->
                                                                    <!--<tr>-->
                                                                    <!--    <td>تاريخ اخر تحديث لمرفقات الشركاء</td>-->
                                                                    <!--    <td>-->

                                                                    <!--        @if($office_agent['entities']['entities']['office_partners_attachments'] ?? '')-->
                                                                    <!--            {{Carbon\Carbon::parse(($office_agent['entities']['entities']['office_partners_attachments'] ?? ''))->diffForHumans()}}-->
                                                                    <!--        @endif-->

                                                                    <!--    </td> -->
                                                                    <!--</tr> -->
                                                                    <!--<tr>-->
                                                                    <!--    <td>تاريخ اخر تحديث للاجهزة والمعدات</td>-->
                                                                    <!--    <td>-->

                                                                    <!--        @if($office_agent['entities']['entities']['devices'] ?? '')-->
                                                                    <!--            {{Carbon\Carbon::parse(($office_agent['entities']['entities']['devices'] ?? ''))->diffForHumans()}}-->
                                                                    <!--        @endif-->

                                                                    <!--    </td> -->
                                                                    <!--</tr> -->
                                                                    <!--<tr>-->
                                                                    <!--    <td>تاريخ اخر تحديث للدراسات</td>-->
                                                                    <!--    <td>-->

                                                                    <!--        @if($office_agent['entities']['entities']['studies'] ?? '')-->
                                                                    <!--            {{Carbon\Carbon::parse(($office_agent['entities']['entities']['studies'] ?? ''))->diffForHumans()}}-->
                                                                    <!--        @endif-->

                                                                    <!--    </td> -->
                                                                    <!--</tr> -->
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-main_info" role="tabpanel"
                                             aria-labelledby="nav-outter-tab">
                                            <div class="row">
                                                <div class="col-md-12 mt-2">
                                                    {{Form::open([
                                                        'method'=>'post',
                                                        'enctype'=>'multipart/form-data',
                                                        'route'=>['adminOfficeConfirmUpdateOrder',request()->id]
                                                    ])}}
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                    class="font-weight-bold">{{__('office_agent.order_number')}}</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{$office_agent->order_serial ?? ''}}"
                                                                   disabled>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label
                                                                    class="font-weight-bold">{{__('office_agent.order_status')}}</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{$office_agent->order_status->name ?? $office_agent->last_process->status->name ?? $office_agent->last_process->status_text ?? ''}}"
                                                                   disabled>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label
                                                                    class="font-weight-bold">{{__('office_agent.order_date')}}</label>
                                                            <input type="text" class="form-control date"
                                                                   value="{{$office_agent->endorse_at ?? ''}}"
                                                                   disabled>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label
                                                                    class="font-weight-bold">{{__('office_agent.order_type')}}</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{$office_agent->office_order_type->title_ar ?? ''}}"
                                                                   disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-2">
                                                        <div class="col-md-3">
                                                            <label
                                                                    class="font-weight-bold">{{__('office_agent.dist_type')}}</label>
                                                            <select class="form-control" name="dist_type"
                                                                    @if(request()->route()->getName() != 'getRequestOrdersView') disabled @endif>
                                                                <option value="inner_dist">
                                                                    -- {{__('office_agent.inner_dist')}}--
                                                                </option>
                                                                <option value="outer_dist">
                                                                    -- {{__('office_agent.outer_dist')}}--
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                    class="font-weight-bold">{{__('office_agent.distribute')}}</label>
                                                            <select class="form-control" name="department_id"
                                                                    @if(request()->route()->getName() != 'getRequestOrdersView') disabled
                                                                    @endif>
                                                                <option value="">-- {{__('office_agent.choose')}}--
                                                                </option>
                                                                @foreach($departments as $department)
                                                                    @include('pages.officeAgent.orders.office_details.templates.recursive_option_tree',['department'=>$department,'last_process'=>$office_agent->last_process ?? null])
                                                                @endforeach
                                                            </select>
                                                            <div
                                                                    class="text-danger">{{$errors->first('department_id') ?? ''}}</div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                    class="font-weight-bold">{{__('office_agent.manager_emp')}}</label>
                                                            <select name="to_user_id" class="form-control"
                                                                    @if(request()->route()->getName() != 'getRequestOrdersView') disabled
                                                                    @endif>
                                                                <option value="">-- {{__('office_agent.choose')}}--
                                                                </option>
                                                                {{--                                                            @if($office_agent->last_process->to_user ?? null)--}}
                                                                {{--                                                                <option selected--}}
                                                                {{--                                                                        value="{{$office_agent->last_process->to_user->id ?? 0}}">{{$office_agent->last_process->to_user->name ?? ''}}</option>--}}
                                                                {{--                                                            @endif--}}

                                                            </select>
                                                            <div
                                                                    class="text-danger">{{$errors->first('to_user_id') ?? ''}}</div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                    class="font-weight-bold">{{__('office_agent.file')}}</label>
                                                            <br>
                                                            <input type="file" name="files[]" multiple=""
                                                                   @if(request()->route()->getName() != 'getRequestOrdersView') disabled
                                                                   @endif
                                                                   class="form-control"
                                                                   accept="image/*,.pdf">
                                                            <div
                                                                    class="text-danger">{{$errors->first('files') ?? ''}}</div>
                                                        </div>
                                                        <div class="col-md-12 text-center">
                                                            <div class="row">
                                                                <div class="col-md-4"></div>
                                                                <div class="col-md-4 mt-3 bg-gray card p-2 pr-3 pl-3">
                                                                    @can('final_state',$office_agent)
                                                                        <label
                                                                                class="font-weight-bold">{{__('office_agent.final_state')}}</label>
                                                                    @endcan
                                                                    @can('final_state_smoke',$office_agent)
                                                                        <label
                                                                                class="font-weight-bold">{{__('office_agent.final_state_smoke')}}</label>
                                                                    @endcan
                                                                    <select class="form-control" name="status_id"
                                                                            @if(request()->route()->getName() != 'getRequestOrdersView') disabled
                                                                            @endif>
                                                                        <option value="">
                                                                            -- {{__('office_agent.choose')}}--
                                                                        </option>
                                                                        @foreach($final_decisions as $decision)
                                                                            <option
                                                                                    @if(($office_agent->last_process->status_id ?? null) == $decision->id) selected
                                                                                    @endif
                                                                                    value="{{$decision->id}}">{{$decision->name ?? null}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div
                                                                            class="text-danger">{{$errors->first('status_id') ?? ''}}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12"></div>
                                                    </div>

                                                    <div class="row mt-2">
                                                        <div class="col-md-12">
                                                            <label
                                                                    class="font-weight-bold">{{__('office_agent.replay')}}</label>
                                                            <textarea rows="4" class="form-control"
                                                                      @if(request()->route()->getName() != 'getRequestOrdersView') disabled
                                                                      @endif
                                                                      name="comment"></textarea>
                                                            <div
                                                                    class="text-danger">{{$errors->first('comment') ?? ''}}</div>
                                                        </div>
                                                        @can('send-process')
                                                            @if(request()->route()->getName() == 'getRequestOrdersView')
                                                                <div class="col-md-12 mt-2">
                                                                    <button
                                                                            class="btn btn-primary">{{__('office_agent.send')}}</button>
                                                                </div>
                                                            @endif
                                                        @endcan
                                                    </div>
                                                    {{Form::close()}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-history" role="tabpanel"
                                             aria-labelledby="nav-history-tab">
                                            <div class="row">
                                                <div class="col-md-4 mt-2">
                                                    <div class="list-group">
                                                        @if($office_agent->endorse_at)
                                                            <a href="#"
                                                               class="list-group-item list-group-item-action list-group-item-secondary">
                                                                <b>طلب بتاريخ</b> <br>
                                                                {{$office_agent->endorse_at ?? ''}}
                                                                <i class="la la-check text-success float-right"></i>
                                                            </a>
                                                        @endif
                                                        @foreach($histories as $history)
                                                            <a href="{{route('getRequestHistoryOrdersView',['id'=>$history->id])}}"
                                                               class="list-group-item list-group-item-action list-group-item-light">
                                                                <b>طلب تعديل بتاريخ</b> <br>
                                                                {{$history->created_at}}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="col-md-8 mt-2 text-center">
                                                    <img src="{{asset('assets/images/logo.png')}}" style="width: 120px"
                                                         alt="">
                                                    <h3 class="font-weight-bold">يظهر كافة المعلومات السابقة للمعلومات
                                                        الحالية التي تعدلت سواء
                                                        بيانات او ملفات</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.officeAgent.orders.office_details.templates.modals')
@endsection
@section('scripts')
    {{--    {{Html::script('assets/js/datatable/jquery.dataTables.js')}}--}}
    {{Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}
    {{Html::script('assets/js/datatable/dataTables.buttons.min.js')}}
    {{Html::script('assets/js/datatable/buttons.colVis.min.js')}}
    {{Html::script('assets/js/datatable/buttons.html5.min.js')}}
    {{Html::script('assets/js/datatable/buttons.bootstrap.min.js')}}
    {{Html::script('assets/js/datatable/buttons.print.min.js')}}
    {{Html::script('assets/js/jquery.mask.min.js')}}
    {{Html::script('assets/js/jquery.validate.min.js')}}
    {{Html::script('assets/js/additional-methods.min.js')}}
    {{Html::script('assets/js/jquery.sweet-modal.min.js')}}

    {{--    {{Html::script('assets/js/sweetalert2.all.min.js')}}--}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script>
        function hideSections() {
            let sec1 = $('#section_1')
            let sec2 = $('#section_2')
            let sec3 = $('#section_3')
            let sec4 = $('#section_4')
            let sec5 = $('#section_5')
            let sec6 = $('#section_6')
            let sec7 = $('#section_7')
            let sec8 = $('#section_8')
            let arr = [sec1, sec2, sec3, sec4, sec5, sec6, sec7, sec8];
            $.each(arr, function (k, v) {
                console.log(v)
                console.log(v.height())
                if (v.height() < 70) {
                    v.hide();
                }
            })
        }
    </script>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('#_2').trigger("click");
                $('#_25').trigger("click");

            }, 60);
        });
    </script>
    <script>
        if (!String.prototype.includes) {
            String.prototype.includes = function (search, start) {
                'use strict';
                if (typeof start !== 'number') {
                    start = 0;
                }

                if (start + search.length > this.length) {
                    return false;
                } else {
                    return this.indexOf(search, start) !== -1;
                }
            };
        }
        $(document).ready(function () {
            $('.phone').mask('00000000');
            $('.ssn').mask('000000000000');
        });
        $(document).ready(function () {
            let company_attachment_table = $('#company_attachment_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                },
                dom: 'rBfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'طباعة',
                        title: '',
                        className: 'btn btn-primary',
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', 'rtl');
                            $(win.document.body)
                                .css('font-size', '12px')
                                .prepend(`
                                <div class="row" style="padding:15px">
                                    <div class="col-md-12 text-center">
                                        <img src="{{asset('assets/images/logo.png')}}" width="120" height="120" class="mt-4 pull-right float-right"  style="float:right;margin-top:15px" alt="">
                                        <img src="{{asset('assets/images/new_kuwait.png')}}" width="120" height="120" class="mt-4 pull-left float-left" style="float:left;margin-top:15px" alt="">
                                        <h1 style="margin:15px">
                                            <b class="report_header">الهيئة العامة للبيئة -  تقارير قسم الاعتماد البيئي   </b> <br>
                                            <span class="fs25"> مرفقات الشركة ({{$office_agent['office_name_ar'] ?? ''}})</span>
                                        </h1>
                                    </div>
                                </div>
                            `);
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('direction', 'rtl');
                        }
                    }
                ]
            });
            let company_partner_table = $('#company_partner_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                },
                dom: 'rBfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'طباعة',
                        title: '',
                        className: 'btn btn-primary',
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', 'rtl');
                            $(win.document.body)
                                .css('font-size', '12px')
                                .prepend(`
                                <div class="row" style="padding:15px">
                                    <div class="col-md-12 text-center">
                                        <img src="{{asset('assets/images/logo.png')}}" width="120" height="120" class="mt-4 pull-right float-right"  style="float:right;margin-top:15px" alt="">
                                        <img src="{{asset('assets/images/new_kuwait.png')}}" width="120" height="120" class="mt-4 pull-left float-left" style="float:left;margin-top:15px" alt="">
                                        <h1 style="margin:15px">
                                            <b class="report_header">الهيئة العامة للبيئة -  تقارير قسم الاعتماد البيئي   </b> <br>
                                            <span class="fs25">     بيانات الشركاء ({{$office_agent['office_name_ar'] ?? ''}})</span>
                                        </h1>
                                    </div>
                                </div>
                            `);
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('direction', 'rtl');
                        }
                    }
                ]
            });
            let branches_partner_table = $('#branches_partner_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                },
                dom: 'rBfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'طباعة',
                        title: '',
                        className: 'btn btn-primary',
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', 'rtl');
                            $(win.document.body)
                                .css('font-size', '12px')
                                .prepend(`
                                <div class="row" style="padding:15px">
                                    <div class="col-md-12 text-center">
                                        <img src="{{asset('assets/images/logo.png')}}" width="120" height="120" class="mt-4 pull-right float-right"  style="float:right;margin-top:15px" alt="">
                                        <img src="{{asset('assets/images/new_kuwait.png')}}" width="120" height="120" class="mt-4 pull-left float-left" style="float:left;margin-top:15px" alt="">
                                        <h1 style="margin:15px">
                                            <b class="report_header">الهيئة العامة للبيئة -  تقارير قسم الاعتماد البيئي   </b> <br>
                                            <span class="fs25">   فروع اخري للشركة ({{$office_agent['office_name_ar'] ?? ''}})</span>
                                        </h1>
                                    </div>
                                </div>
                            `);
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('direction', 'rtl');
                        }
                    }
                ]
            });
            let all_employees_table = $('#all_employees_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                },
                dom: 'rBfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'طباعة',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 7, 10, 11]
                        },
                        title: '',
                        className: 'btn btn-primary',
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', 'rtl');
                            $(win.document.body)
                                .css('font-size', '12px')
                                .prepend(`
                                <div class="row" style="padding:15px">
                                    <div class="col-md-12 text-center">
                                        <img src="{{asset('assets/images/logo.png')}}" width="120" height="120" class="mt-4 pull-right float-right"  style="float:right;margin-top:15px" alt="">
                                        <img src="{{asset('assets/images/new_kuwait.png')}}" width="120" height="120" class="mt-4 pull-left float-left" style="float:left;margin-top:15px" alt="">
                                        <h1 style="margin:15px">
                                            <b class="report_header">الهيئة العامة للبيئة -  تقارير قسم الاعتماد البيئي   </b> <br>
                                            <span class="fs25"> كوادر بشرية الشركة ({{$office_agent->office_name_ar ?? ''}})</span>
                                        </h1>
                                    </div>
                                </div>
                            `);

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('direction', 'rtl');
                        }
                    }
                ]
            });
            let employee_attachment_table = $('#employee_attachment_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                },
                dom: 'rBfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'طباعة',
                        title: '',
                        className: 'btn btn-primary',
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', 'rtl');
                            $(win.document.body)
                                .css('font-size', '12px')
                                .prepend(`
                                <div class="row" style="padding:15px">
                                    <div class="col-md-12 text-center">
                                        <img src="{{asset('assets/images/logo.png')}}" width="120" height="120" class="mt-4 pull-right float-right"  style="float:right;margin-top:15px" alt="">
                                        <img src="{{asset('assets/images/new_kuwait.png')}}" width="120" height="120" class="mt-4 pull-left float-left" style="float:left;margin-top:15px" alt="">
                                        <h1 style="margin:15px">
                                            <b class="report_header">الهيئة العامة للبيئة -  تقارير قسم الاعتماد البيئي   </b> <br>
                                            <span class="fs25"> مرفقات كوادر بشرية الشركة  ({{$office_agent['office_name_ar'] ?? ''}})</span>
                                        </h1>
                                    </div>
                                </div>
                            `);
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('direction', 'rtl');
                        }
                    }
                ]
            });
            let external_attachment_table = $('#external_attachment_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                },
                dom: 'rBfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'طباعة',
                        title: '',
                        className: 'btn btn-primary',
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', 'rtl');
                            $(win.document.body)
                                .css('font-size', '12px')
                                .prepend(`
                                <div class="row" style="padding:15px">
                                    <div class="col-md-12 text-center">
                                        <img src="{{asset('assets/images/logo.png')}}" width="120" height="120" class="mt-4 pull-right float-right"  style="float:right;margin-top:15px" alt="">
                                        <img src="{{asset('assets/images/new_kuwait.png')}}" width="120" height="120" class="mt-4 pull-left float-left" style="float:left;margin-top:15px" alt="">
                                        <h1 style="margin:15px">
                                            <b class="report_header">الهيئة العامة للبيئة -  تقارير قسم الاعتماد البيئي   </b> <br>
                                            <span class="fs25">   مرفقات خارجية   ({{$office_agent['office_name_ar'] ?? ''}})</span>
                                        </h1>
                                    </div>
                                </div>
                            `);
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('direction', 'rtl');
                        }
                    }
                ]
            });
            let all_installment_table = $('#all_installment_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                },
                dom: 'rBfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'طباعة',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        },
                        title: '',
                        className: 'btn btn-primary',
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', 'rtl');
                            $(win.document.body)
                                .css('font-size', '12px')
                                .prepend(`
                                <div class="row" style="padding:15px">
                                    <div class="col-md-12 text-center">
                                        <img src="{{asset('assets/images/logo.png')}}" width="120" height="120" class="mt-4 pull-right float-right"  style="float:right;margin-top:15px" alt="">
                                        <img src="{{asset('assets/images/new_kuwait.png')}}" width="120" height="120" class="mt-4 pull-left float-left" style="float:left;margin-top:15px" alt="">
                                        <h1 style="margin:15px">
                                            <b class="report_header"> الهيئة العامة للبيئة - تقارير  قسم الاعتماد البيئي   </b> <br>
                                            <span class="fs25">اجهزة الشركة ({{$office_agent->office_name_ar ?? ''}})</span>
                                        </h1>
                                    </div>
                                </div>
                            `);

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('direction', 'rtl');
                        }
                    }
                ]
            });
            $('#installment_attachment_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                },
                dom: 'rBfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'طباعة',
                        title: '',
                        className: 'btn btn-primary',
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', 'rtl');
                            $(win.document.body)
                                .css('font-size', '12px')
                                .prepend(`
                                <div class="row" style="padding:15px">
                                    <div class="col-md-12 text-center">
                                        <img src="{{asset('assets/images/logo.png')}}" width="120" height="120" class="mt-4 pull-right float-right"  style="float:right;margin-top:15px" alt="">
                                        <img src="{{asset('assets/images/new_kuwait.png')}}" width="120" height="120" class="mt-4 pull-left float-left" style="float:left;margin-top:15px" alt="">
                                        <h1 style="margin:15px">
                                            <b class="report_header">الهيئة العامة للبيئة -  تقارير قسم الاعتماد البيئي   </b> <br>
                                            <span class="fs25">   مرفقات الاجهزة والمعدات   ({{$office_agent['office_name_ar'] ?? ''}})</span>
                                        </h1>
                                    </div>
                                </div>
                            `);
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('direction', 'rtl');
                        }
                    }
                ]
            });
            let reports_attachment_table = $('#reports_attachment_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                },
                dom: 'rBfrtip',
                buttons: [
                    {
                        extend: 'print',
                        text: 'طباعة',
                        title: '',
                        className: 'btn btn-primary',
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', 'rtl');
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('direction', 'rtl');
                        }
                    }
                ]
            });

            $('.date').flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });

            $('.license_end_date').flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });
            $('.confirm_date').flatpickr({
                enableTime: true,
                default: 'today',
                dateFormat: "Y-m-d H:i",
            });
            $('.contract_end_date').flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });

            $('select[name="department_id"]').on('change', function () {
                let office_department_id = $(this).val();
                $.ajax({
                    url: "{{route('findDepartmentOffice')}}" + '/' + office_department_id,
                    data: {
                        _token: '{{csrf_token()}}'
                    },
                    type: 'get',
                    success: function (response) {
                        console.log(response)
                        if (response.status) {
                            $('select[name="to_user_id"]').empty();
                            $('select[name="to_user_id"]').append('<option value=""> -- اختار -- </option>');
                            $.each(response.data.department.users, function (index, item) {
                                $('select[name="to_user_id"]').append('<option value="' + item.id + '"> ' + item.name +
                                    item.is_authorized_manager +
                                    '</option>');
                            })
                        }
                    }
                })
            });

            $('select[name="governorate_id"]').change(function () {
                let governorate_id = $(this).val();
                let get_id = $(this).attr('id');
                let set_id = null;
                if (get_id == 'company_gov') {
                    set_id = '#company_city'
                }
                if (get_id == 'branch_gov') {
                    set_id = '#branch_city'
                }
                if (!governorate_id) {
                    return;
                }
                $.ajax({
                    url: "{{route('getCity')}}" + '/' + governorate_id,
                    data: {
                        id: governorate_id,
                        _token: '{{csrf_token()}}'
                    },
                    type: 'get',
                    success: function (response) {
                        console.log(response)
                        if (response.status) {
                            $(set_id).empty();
                            $(set_id).append('<option value=""> -- اختار -- </option>');
                            $.each(response.data.cities, function (index, item) {
                                $(set_id).append('<option value="' + item.id + '">' + item.translated.name + '</option>');
                            })
                        }
                    }
                })
            });

            $('select[name="company_type_id"]').on('change', function () {

                let company_type_id = $(this).val();
                if (company_type_id == 9) {
                    $('#nav-profile-tab2').hide()
                } else {
                    $('#nav-profile-tab2').show()
                }

            });

            $('select[name="job_id"]').on('change', function () {
                let job_id = $(this).val();

                let get_id = $(this).attr('id');
                let set_id = null;

                if (get_id == 'add_job_id') {
                    set_id = '#add_emp_job_title'
                }

                if (get_id == 'edit_job_id') {
                    set_id = '#edit_emp_job_title'
                }

                if (!job_id || job_id == 49) {
                    $(set_id).show()
                    console.log(set_id)
                } else {
                    $(set_id).hide()
                }
                if (job_id == 44 || job_id == 45 || job_id == 46 || job_id == 81) {

                    $('#adminAddHumanResourceEmployeeForm input[name="phone"]').parents().eq(0).show()
                    $('#adminAddHumanResourceEmployeeForm input[name="email"]').parents().eq(0).show()
                } else {

                    $('#adminAddHumanResourceEmployeeForm input[name="phone"]').parents().eq(0).hide()
                    $('#adminAddHumanResourceEmployeeForm input[name="email"]').parents().eq(0).hide()
                }

            });

            $('select[name="classification_degree_id"]').on('change', function () {

                let classification_degree_id = $(this).val();
                if (classification_degree_id == 16) {
                    $('select[name="lab_type_id"]').parents().eq(0).show()
                } else {
                    $('select[name="lab_type_id"]').parents().eq(0).hide()
                }
            });


            $('select[name="degree_id"]').on('change', function () {
                let degree_id = $(this).val();
                console.log(degree_id)
                let get_id = $(this).attr('id');
                let set_id = null;
                if (get_id == 'employee_add_degree') {
                    set_id = '#add_emp_job_title'
                }
                if (get_id == 'employee_edit_degree') {
                    set_id = '#edit_emp_job_title'
                }
                if (!degree_id) {
                    $(set_id).hide()
                } else {
                    $(set_id).show()
                }
            });
            $('select[name="specialization_id"]').on('change', function () {
                let specialization_id = $(this).val();
                console.log(specialization_id)
                let get_id = $(this).attr('id');
                let set_id = null;
                if (get_id == 'employee_add_specialization') {
                    set_id = '#add_emp_specialize'
                }
                if (get_id == 'employee_edit_specialization') {
                    set_id = '#edit_emp_specialize'
                }
                if (specialization_id == 58) {
                    $(set_id).show()
                } else {
                    $(set_id).hide()
                }
            });
            $('#another_branch_type').on('change', function () {
                let type = $(this).val();
                if (type == 12) {
                    $('#branch_in').show();
                    $('#branch_out').hide();
                } else if (type == 13) {
                    $('#branch_in').hide();
                    $('#branch_out').show();
                } else {
                    $('#branch_in').hide();
                    $('#branch_out').hide();
                }
            })
            // done admin
            $('#adminOfficeAgentUpdateCompanyAttachmentForm').on('submit', function (e) {
                e.preventDefault();
                let form = this;
                let form_data = new FormData(form);
                form_data.append('_token', '{{csrf_token()}}')
                $.ajax({
                    url: '{{route('adminOfficeAgentUpdateCompanyAttachment',['id'=>request()->id])}}',
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: form_data,
                    success: function (response) {
                        if (response.status) {
                            company_attachment_table.row.add([
                                response.data.file.file_type.title_ar,
                                '<a href="' + response.data.file.file_path + '">تحميل</a>',
                                '<a class="btn btn-danger"' +
                                'href="javascript:deleteCompanyFile(\'' + response.data.file.id + '\')">' +
                                '<i class="la la-remove mr-0"></i></a>'
                            ]).node().id = 'company_attachment_file_' + response.data.file.id
                            company_attachment_table.draw(false);
                            alert('تمت العملية بنجاح')
                            //
                            // $('#partner_add_close').trigger('click')
                        }
                    },
                    xhr: function () {
                        let xhr = $.ajaxSettings.xhr();
                        xhr.upload.onprogress = function (e) {
                            // For uploads
                            if (e.lengthComputable) {
                                let percentage = (e.loaded / e.total) * 100;
                                // console.log(percentage)
                                $('#company_attachment_progress').css({width: percentage + '%'}).text(parseFloat(percentage).toFixed(2) + '%')
                                if (percentage == 100) {
                                    $('#company_attachment_close').trigger('click')
                                    form.reset()
                                }
                            }
                        };
                        return xhr;
                    }
                })
            });
            // done admin
            $('#adminOfficeAgentAddEmployeeAttachmentForm').on('submit', function (e) {
                e.preventDefault();
                let form = this;
                let form_data = new FormData(form);
                form_data.append('_token', '{{csrf_token()}}')
                $.ajax({
                    url: '{{route('adminOfficeAgentAddEmployeeAttachment',['id'=>request()->id])}}',
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: form_data,
                    success: function (response) {
                        if (response.status) {
                            employee_attachment_table.row.add([
                                null,
                                response.data.attachment.human_resource_id,
                                response.data.attachment.file_type.title_ar + '<a href="' + response.data.attachment.file_path + '"> تنزيل  </a>',
                                '<a class="btn btn-danger"  href="javascript:deleteCompanyFile(\'' + response.data.attachment.id + '\')">' +
                                '<i class="la la-remove mr-0"></i></a>'
                            ]).node().id = 'attachment_employee_' + response.data.attachment.id;
                            employee_attachment_table.draw(false);
                            alert('تمت العملية بنجاح');
                            $('#employee_attachment_close').trigger('click')
                            form.reset();
                            $('#employee_attachment_progress').css({width: 0 + '%'}).text(parseFloat(0).toFixed(2) + '%')
                            //
                            // $('#partner_add_close').trigger('click')
                        }
                    },
                    xhr: function () {
                        let xhr = $.ajaxSettings.xhr();
                        xhr.upload.onprogress = function (e) {
                            // For uploads
                            if (e.lengthComputable) {
                                let percentage = (e.loaded / e.total) * 100;
                                // console.log(percentage)
                                $('#employee_attachment_progress').css({width: percentage + '%'}).text(parseFloat(percentage).toFixed(2) + '%')
                            }
                        };
                        return xhr;
                    }
                })
            });

            // done admin
            $('#adminHandleOutterAttachmentForm').on('submit', function (e) {
                e.preventDefault();
                let form = this;
                let form_data = new FormData(form);
                form_data.append('_token', '{{csrf_token()}}')
                $.ajax({
                    url: '{{route('adminHandleOutterAttachment',['id'=>request()->id])}}',
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: form_data,
                    success: function (response) {
                        if (response.status) {
                            console.log(response.data);
                            let officeEx = response.data.officeEx;

                            external_attachment_table.row.add([
                                officeEx.id,
                                officeEx.title,
                                officeEx.book_number,
                                '<a href="' + officeEx.file_path + '"> تحميل  </a>',
                                '<a class="btn btn-sm btn-danger"  href="javascript:deleteExternalAttachmentFile(\'' + officeEx.id + '\')">' +
                                '<i class="la la-remove mr-0"></i></a>'
                            ]).node().id = 'external_attachment_file_' + officeEx.id;
                            external_attachment_table.draw(false);
                            // officeEx.book_number
                            // officeEx.created_at
                            // officeEx.file_path
                            // officeEx.id
                            // officeEx.office_agent_id
                            // officeEx.title
                            // officeEx.updated_at
                            form.reset();
                            $('#outter_attachment_progress').css({width: 0 + '%'}).text(parseFloat(0).toFixed(2) + '%')
                        }
                    },
                    xhr: function () {
                        let xhr = $.ajaxSettings.xhr();
                        xhr.upload.onprogress = function (e) {
                            // For uploads
                            if (e.lengthComputable) {
                                let percentage = (e.loaded / e.total) * 100;
                                // console.log(percentage)
                                $('#outter_attachment_progress').css({width: percentage + '%'}).text(parseFloat(percentage).toFixed(2) + '%')
                            }
                        };
                        return xhr;
                    }
                })
            });
            // done admin
            $('#adminOfficeAgentAddInstallmentAttachmentForm').on('submit', function (e) {
                e.preventDefault();
                let form = this;
                let form_data = new FormData(form);
                form_data.append('_token', '{{csrf_token()}}')
                $.ajax({
                    url: '{{route('adminOfficeAgentAddInstallmentAttachment',['id'=>request()->id])}}',
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: form_data,
                    success: function (response) {
                        if (response.status) {
                            alert('تمت العملية بنجاح')
                            $('#installment_attachment_close').trigger('click')
                            form.reset();
                            $('#installment_attachment_progress').css({width: 0 + '%'}).text(parseFloat(0).toFixed(2) + '%')
                            //
                            // $('#partner_add_close').trigger('click')
                        }
                    },
                    xhr: function () {
                        let xhr = $.ajaxSettings.xhr();
                        xhr.upload.onprogress = function (e) {
                            // For uploads
                            if (e.lengthComputable) {
                                let percentage = (e.loaded / e.total) * 100;
                                // console.log(percentage)
                                $('#installment_attachment_progress').css({width: percentage + '%'}).text(parseFloat(percentage).toFixed(2) + '%')
                            }
                        };
                        return xhr;
                    }
                })
            });
            // done admin
            $('#adminHandleCompanyAddBranchRequestForm').on('submit', function (e) {
                e.preventDefault();
                let form_data = new FormData(this);
                form_data.append('_token', '{{csrf_token()}}')
                $.ajax({
                    url: '{{route('adminHandleCompanyAddBranchRequest',['id'=>request()->id])}}',
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: form_data,
                    success: function (response) {
                        if (response.status) {
                            branches_partner_table.row.add([
                                response.data.address.id,
                                null,
                                response.data.address.full_address,
                                '<a class="btn btn-danger" href="javascript:deleteBranchAddress(\'' + response.data.address.id + '\')">' +
                                '<i class="la la-remove mr-0"></i></a>'
                            ]).node().id = 'branch_address_' + response.data.address.id
                            branches_partner_table.draw(false);
                            alert('تمت العملية بنجاح')
                            $('#branches_add_close').trigger('click')
                        }
                    }
                })
            });
            //*do admin*//
            $('#adminOfficeAgentUpdateInfoForm').submit(function (e) {
                e.preventDefault()
            }).validate(
                {
                    onkeyup: false,
                    onclick: false,
                    onfocusout: false,
                    //validation rules
                    rules: {
                        office_name_ar: {
                            required: true
                        },
                        owner_name: {
                            required: true
                        },
                        owner_phone: {
                            minlength: 8
                        },
                        office_phone: {
                            minlength: 8
                        },
                        contact_officer_phone: {
                            minlength: 8
                        },
                        owner_ssn: {
                            minlength: 12
                        },
                        owner_email: {
                            required: true,
                            email: true
                        }
                    },
                    //validation messages
                    messages: {},
                    highlight: function (element, errorClass, validClass) {
                        console.log(element)
                    },
                    //submit handler
                    submitHandler: function (form) {
                        let form_data = new FormData(form);
                        $.ajax({
                            url: '{{route('adminOfficeAgentUpdateInfo',['id'=>request()->id])}}',
                            type: 'post',
                            processData: false,
                            contentType: false,
                            data: form_data,
                            success: function (response) {
                                if (response.status) {
                                    alert('تمت العملية بنجاح')
                                }
                            }
                        })
                    }
                });

            // done admin
            $('#adminHandleCompanyAddPartenerRequestForm').submit(function (e) {
                e.preventDefault()
            }).validate(
                {
                    onkeyup: false,
                    onclick: false,
                    onfocusout: false,
                    //validation rules
                    rules: {
                        ssn: {
                            minlength: 12
                        }
                    },
                    //validation messages
                    messages: {},
                    //submit handler
                    submitHandler: function (form) {
                        let form_data = new FormData(form);
                        {{--form_data.append('_token', '{{csrf_token()}}')--}}
                        $.ajax({
                            url: '{{route('adminHandleCompanyAddPartenerRequest',['id'=>request()->id])}}',
                            type: 'post',
                            data: form_data,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                if (response.status) {
                                    company_partner_table.row.add([
                                        null,
                                        response.data.officePartner.name,
                                        response.data.officePartner.ssn,
                                        response.data.officePartner.notes,
                                        '<a class="btn btn-danger"href="javascript:deleteCompanyPartner(\'' + response.data.officePartner.id + '\')">' +
                                        '<i class="la la-remove mr-0"></i></a>'
                                    ]).node().id = 'company_partner_' + response.data.officePartner.id
                                    company_partner_table.draw(false);
                                    alert('تمت العملية بنجاح')
                                    //
                                    $('#partner_add_close').trigger('click')
                                    $('#partner_add_progress').css({width: 0 + '%'}).text(parseFloat(0).toFixed(2) + '%')
                                    form.reset()
                                }
                            },
                            xhr: function () {
                                let xhr = $.ajaxSettings.xhr();
                                xhr.upload.onprogress = function (e) {
                                    // For uploads
                                    if (e.lengthComputable) {
                                        let percentage = (e.loaded / e.total) * 100;
                                        // console.log(percentage)
                                        $('#partner_add_progress').css({width: percentage + '%'}).text(parseFloat(percentage).toFixed(2) + '%')
                                        if (percentage == 100) {
                                            // Swal.fire({
                                            //     title: 'نجاح',
                                            //     text: 'تمت العملية بنجاح',
                                            //     type: 'success',
                                            //     timer: 2000
                                            // })
                                        }
                                    }
                                };
                                return xhr;
                            }
                        })
                    }
                });

            // done
            $('#adminAddHumanResourceEmployeeForm').submit(function (e) {
                e.preventDefault()
            }).validate(
                {
                    onkeyup: false,
                    onclick: false,
                    onfocusout: false,
                    //validation rules
                    rules: {
                        ssn: {
                            minlength: 12
                        },
                        email: {
                            email: true
                        },
                        job_id: {
                            required: true
                        }
                    },
                    //validation messages
                    messages: {},
                    highlight: function (element, errorClass, validClass) {
                        console.log(element)
                    },
                    //submit handler
                    submitHandler: function (form) {
                        let form_data = new FormData(form);
                        form_data.append('_token', '{{csrf_token()}}')
                        $.ajax({
                            url: '{{route('adminAddHumanResourceEmployee',['id'=>request()->id])}}',
                            type: 'post',
                            processData: false,
                            contentType: false,
                            data: form_data,
                            success: function (response) {
                                console.log(response.data.humanResource)
                                if (response.status) {
                                    if (!response.is_create) {
                                        let oTable = $('#all_employees_table').dataTable();
                                        oTable.fnDeleteRow(oTable.find('#all_employee_' + response.data.humanResource.id).eq(0))
                                    }
                                    all_employees_table.row.add([
                                        null,
                                        response.data.humanResource.job.title_ar,
                                        response.data.humanResource.name,
                                        response.data.humanResource.parent_name,
                                        response.data.humanResource.family_name,
                                        response.data.humanResource.nationality,
                                        response.data.humanResource.work_duration,
                                        response.data.humanResource.expert_years_number,
                                        response.data.humanResource.work_date,
                                        response.data.humanResource.degree ? response.data.humanResource.degree.title_ar : '' + response.data.humanResource.job_title,
                                        response.data.humanResource.specialization ? response.data.humanResource.specialization.title_ar : '' + response.data.humanResource.specialization_title,
                                        '<button class="btn btn-info" id="employee_row_' + response.data.humanResource.id + '" onclick="editEmployee(\'' + encodeURIComponent(JSON.stringify(response.data.humanResource)) + '\')"> <i class="la la-edit mr-0"></i> </button>' +
                                        '<a class="btn btn-danger" href="javascript:deleteEmployee(\'' + response.data.humanResource.id + '\')">' +
                                        '<i class="la la-remove mr-0"></i></a>'
                                    ]).node().id = 'all_employee_' + response.data.humanResource.id
                                    all_employees_table.draw(false);
                                    alert('تمت العملية بنجاح')
                                    $('#employee_add_close').trigger('click');
                                    form.reset()
                                }
                            }
                        })
                    }
                });

            // done admin
            $('#adminUpdateHumanResourceEmployeeForm').submit(function (e) {
                e.preventDefault()
            }).validate(
                {
                    onkeyup: false,
                    onclick: false,
                    onfocusout: false,
                    //validation rules
                    rules: {
                        ssn: {
                            minlength: 12
                        },
                        email: {
                            email: true
                        },
                        job_id: {
                            required: true
                        }
                    },
                    //validation messages
                    messages: {},
                    highlight: function (element, errorClass, validClass) {
                        console.log(element)
                    },
                    //submit handler
                    submitHandler: function (form) {
                        let form_data = new FormData(form);

                        $.ajax({
                            url: '{{route('adminUpdateHumanResourceEmployee',['id'=>request()->id])}}',
                            type: 'post',
                            processData: false,
                            contentType: false,
                            data: form_data,
                            success: function (response) {
                                if (response.status) {
                                    alert('تمت العملية بنجاح')
                                    $('#employee_add_close').trigger('click');
                                    form.reset()
                                    $('#edit_employee_btn').prop("disabled", true);
                                }
                            }
                        })
                    }
                });

            $('#adminOfficeAgentAddStudyForm').submit(function (e) {
                e.preventDefault()
            }).validate(
                {
                    onkeyup: false,
                    onclick: false,
                    onfocusout: false,
                    //validation rules
                    rules: {
                        file: {
                            required: true
                        },
                        name: {
                            required: true
                        }
                    },
                    //validation messages
                    messages: {},
                    highlight: function (element, errorClass, validClass) {
                        console.log(element)
                    },
                    //submit handler
                    submitHandler: function (form) {
                        let form_data = new FormData(form);
                        {{--form_data.append('_token', '{{csrf_token()}}')--}}
                        $.ajax({
                            url: '{{route('adminOfficeAgentAddStudy',['id'=>request()->id])}}',
                            type: 'post',
                            processData: false,
                            contentType: false,
                            data: form_data,
                            success: function (response) {
                                console.log(response.data)
                                if (response.status) {
                                    reports_attachment_table.row.add([
                                        null,
                                        response.data.officeStudy.name,
                                        response.data.officeStudy.notes,
                                        '<a href="' + response.data.officeStudy.file_path + '">تنزيل</a>',
                                        '<a class="btn btn-danger" href="javascript:deleteStudy(\'' + response.data.officeStudy.id + '\')">' +
                                        '<i class="la la-remove mr-0"></i></a>'
                                    ]).node().id = 'all_study_table_' + response.data.officeStudy.id
                                    reports_attachment_table.draw(false);
                                    alert('تمت العملية بنجاح')
                                    form.reset();
                                }
                            }
                        })
                    }
                });

            // done admin
            $('#adminOfficeAgentAddInstallmentForm').submit(function (e) {
                e.preventDefault()
            }).validate(
                {
                    onkeyup: false,
                    onclick: false,
                    onfocusout: false,
                    //validation rules
                    rules: {
                        number: {
                            digits: true,
                            required: true
                        },
                        serial: {
                            required: true
                        }
                    },
                    //validation messages
                    messages: {},
                    highlight: function (element, errorClass, validClass) {
                        console.log(element)
                    },
                    //submit handler
                    submitHandler: function (form) {
                        let form_data = new FormData(form);
                        form_data.append('_token', '{{csrf_token()}}')
                        $.ajax({
                            url: '{{route('adminOfficeAgentAddInstallment',['id'=>request()->id])}}',
                            type: 'post',
                            processData: false,
                            contentType: false,
                            data: form_data,
                            success: function (response) {
                                console.log(response.data)
                                if (response.status) {
                                    if (!response.is_create) {
                                        let oTable = $('#all_installment_table').dataTable();
                                        oTable.fnDeleteRow(oTable.find('#all_installment_table_' + response.data.officeDevice.id).eq(0))
                                    }
                                    all_installment_table.row.add([
                                        null,
                                        response.data.officeDevice.device_type.name,
                                        response.data.officeDevice.number,
                                        response.data.officeDevice.serial,
                                        '<button class="btn btn-info"  id="device_row_' + response.data.officeDevice.id + '" onclick="editInstallment(\'' + encodeURIComponent(JSON.stringify(response.data.officeDevice)) + '\')">' +
                                        '<i class="la la-edit mr-0"></i></button>' +
                                        '<a class="btn btn-danger" href="javascript:deleteInstallment(\'' + response.data.officeDevice.id + '\')">' +
                                        '<i class="la la-remove mr-0"></i></a>'
                                    ]).node().id = 'all_installment_table_' + response.data.officeDevice.id
                                    all_installment_table.draw(false);
                                    if (response.is_create) {
                                        $('select[name="device_id"]').append('<option value="' + response.data.officeDevice.id + '">' + response.data.officeDevice.device_type.name + '</option>')
                                    }// } else {
                                    //     let buttonData = 'editInstallment(\'' + encodeURIComponent(JSON.stringify(response.data.officeDevice)) + '\')';
                                    //     $('#device_row_' + response.data.officeDevice.id).attr("onclick", buttonData);
                                    // }

                                    alert('تمت العملية بنجاح')
                                    form.reset()
                                    $('#installment_add_close').trigger('click');
                                }
                            }
                        })
                    }
                });

            // done admin
            $('#adminOfficeAgentUpdateDeviceForm').submit(function (e) {
                e.preventDefault()
            }).validate(
                {
                    onkeyup: false,
                    onclick: false,
                    onfocusout: false,
                    //validation rules
                    rules: {
                        number: {
                            digits: true,
                            required: true
                        },
                        serial: {
                            required: true
                        }
                    },
                    //validation messages
                    messages: {},
                    highlight: function (element, errorClass, validClass) {
                        console.log(element)
                    },
                    //submit handler
                    submitHandler: function (form) {
                        let form_data = new FormData(form);
                        {{--form_data.append('_token', '{{csrf_token()}}')--}}
                        $.ajax({
                            url: '{{route('adminOfficeAgentUpdateDevice',['id'=>request()->id])}}',
                            type: 'post',
                            processData: false,
                            contentType: false,
                            data: form_data,
                            success: function (response) {
                                if (response.status) {
                                    alert('تمت العملية بنجاح')
                                    form.reset()
                                    $('#installment_update_btn').prop("disabled", true);
                                }
                            }
                        })
                    }
                });
        });

        // done admin
        function deleteExternalAttachmentFile(id) {
                    @if (Browser::isIE())
            let check = confirm('هل انت متأكد ');
            if (check) {
                $.ajax({
                    url: '{{route('adminOfficeAgentDeleteExternalAttachment',['id'=>request()->id])}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#company_attachment_file_' + id).remove()
                            var oTable = $('#external_attachment_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#external_attachment_file_' + id).eq(0))
                        }
                    }
                })
            }
            @else
            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('adminOfficeAgentDeleteExternalAttachment',['id'=>request()->id])}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#company_attachment_file_' + id).remove()
                                    var oTable = $('#external_attachment_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#external_attachment_file_' + id).eq(0))
                                }
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {
                }
            })
            @endif
        }

        function deleteCompanyFile(id) {
                    @if (Browser::isIE())
            let check = confirm('هل انت متأكد ');
            if (check) {
                $.ajax({
                    url: '{{route('adminOfficeAgentDeleteAttachment',['id'=>request()->id])}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#company_attachment_file_' + id).remove()
                            var oTable = $('#company_attachment_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#company_attachment_file_' + id).eq(0))
                        }
                    }
                })
            }
            @else
            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('adminOfficeAgentDeleteAttachment',['id'=>request()->id])}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#company_attachment_file_' + id).remove()
                                    var oTable = $('#company_attachment_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#company_attachment_file_' + id).eq(0))
                                }
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {
                }
            })
            @endif
        }

        // done admin
        function deleteCompanyPartner(id) {
                    @if (Browser::isIE())
            let check = confirm('هل انت متأكد ')
            if (check) {
                $.ajax({
                    url: '{{route('adminOfficeAgentDeleteCompanyPartner',['id'=>request()->id])}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#company_partner_' + id).remove()
                            var oTable = $('#company_partner_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#company_partner_' + id).eq(0))
                        }
                    }
                })
            }
            @else
            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('adminOfficeAgentDeleteCompanyPartner',['id'=>request()->id])}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#company_partner_' + id).remove()
                                    var oTable = $('#company_partner_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#company_partner_' + id).eq(0))
                                }
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {
                }
            })
            @endif
        }

        // done admin
        function deleteBranchAddress(id) {
                    @if (Browser::isIE())
            let check = confirm('هل انت متأكد');
            if (check) {
                $.ajax({
                    url: '{{route('adminOfficeAgentDeleteBranchAddress',['id'=>request()->id])}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#branch_address_' + id).remove()
                            var oTable = $('#branches_partner_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#branch_address_' + id).eq(0))
                        }
                    }
                })
            }
            @else
            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('adminOfficeAgentDeleteBranchAddress',['id'=>request()->id])}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#branch_address_' + id).remove()
                                    var oTable = $('#branches_partner_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#branch_address_' + id).eq(0))
                                }
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {
                }
            })
            @endif
        }

        // done admin
        function deleteEmployee(id) {
                    @if (Browser::isIE())
            let check = confirm('هل انت متأكد')
            if (check) {
                $.ajax({
                    url: '{{route('adminDeleteHumanResourceEmployeeRequest',['id'=>request()->id])}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#all_employee_' + id).remove()
                            let oTable = $('#all_employees_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#all_employee_' + id).eq(0))
                        }
                    }
                })
            }
            @else
            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('adminDeleteHumanResourceEmployeeRequest',['id'=>request()->id])}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#all_employee_' + id).remove()
                                    let oTable = $('#all_employees_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#all_employee_' + id).eq(0))
                                }
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {
                }
            })
            @endif
        }

        // done admin
        function deleteInstallment(id) {
                    @if (Browser::isIE())
            let check = confirm('هل انت متأكد')
            if (check) {
                $.ajax({
                    url: '{{route('adminDeleteInstallmentRequest',['id'=>request()->id])}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#all_installment_table_' + id).remove()
                            let oTable = $('#all_installment_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#all_installment_table_' + id).eq(0))
                        }
                    }
                })
            }
            @else
            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('adminDeleteInstallmentRequest',['id'=>request()->id])}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#all_installment_table_' + id).remove()
                                    let oTable = $('#all_installment_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#all_installment_table_' + id).eq(0))
                                }
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {
                }
            })
            @endif
        }

        // done admin
        function deleteHumanResourceFile(id) {
                    @if (Browser::isIE())
            let check = confirm('هل انت متأكد')
            if (check) {
                $.ajax({
                    url: '{{route('adminDeleteHumanResourceFileRequest',['id'=>request()->id])}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#attachment_employee_' + id).remove()
                            var oTable = $('#employee_attachment_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#attachment_employee' + id).eq(0))
                        }
                    }
                })
            }
            @else
            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('adminDeleteHumanResourceFileRequest',['id'=>request()->id])}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#attachment_employee_' + id).remove()
                                    var oTable = $('#employee_attachment_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#attachment_employee' + id).eq(0))
                                }
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {
                }
            })
            @endif
        }

        // done admin
        function deleteInstallmentFile(id) {
                    @if (Browser::isIE())
            let check = confirm('هل انت متأكد')
            if (check) {
                $.ajax({
                    url: '{{route('adminDeleteInstallmentAttachmentRequest',['id'=>request()->id])}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#all_installment_attachment_' + id).remove()
                            let oTable = $('#installment_attachment_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#all_installment_attachment' + id).eq(0))
                        }
                    }
                })
            }
            @else
            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('adminDeleteInstallmentAttachmentRequest',['id'=>request()->id])}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#all_installment_attachment_' + id).remove()
                                    let oTable = $('#installment_attachment_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#all_installment_attachment' + id).eq(0))
                                }
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {
                }
            })
            @endif
        }

        // done admin
        function deleteStudy(id) {
                    @if (Browser::isIE())
            let check = confirm('هل انت متأكد')
            if (check) {
                $.ajax({
                    url: '{{route('adminDeleteofficeAgentStudyRequest',['id'=>request()->id])}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#all_study_table_' + id).remove()
                            let oTable = $('#reports_attachment_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#all_study_table_' + id).eq(0))
                            return;
                        }
                    }
                })
            }
            @else

            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('adminDeleteofficeAgentStudyRequest',['id'=>request()->id])}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#all_study_table_' + id).remove()
                                    let oTable = $('#reports_attachment_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#all_study_table_' + id).eq(0))
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {

                }
            })
            @endif
        }

        function appendIsoDegree() {
            $('#iso_degree_table').append("\n" +
                "                <div class=\"col-md-4\">\n" +
                "                    <label class=\"font-weight-bold text-black\"> {{__('office_agent.other_iso_cert')}}        </label>\n" +
                "                    <div class=\"input-group  w-100\">\n" +
                "                        <div class=\"input-group-prepend\">\n" +
                "                            <button class=\"btn btn-danger deleteIsoDegree\" type=\"button\">\n" +
                "                                <i class=\"la la-minus\"></i>\n" +
                "                            </button>\n" +
                "                        </div>\n" +
                "                        <input class=\"form-control\" name=\"iso_degree[]\">\n" +
                "                    </div>\n" +
                "                </div>")
        }

        $(document).on('click', '.deleteIsoDegree', function () {
            $(this).parents().eq(2).remove()
        });

        // done admin
        function resetToAddEmployee() {

            $('#adminAddHumanResourceEmployeeForm').trigger('reset');
            $('#adminAddHumanResourceEmployeeForm  input').val('');
            $('#adminAddHumanResourceEmployeeForm  select').prop('selectedIndex', 0);
        }

        let pageViewer = 0;
        let filesViewer = [];

        function addFilesViewer(files) {
            pageViewer = 0;
            filesViewer = JSON.parse(files);
            var fx = filesViewer[pageViewer];
            initFileViewer(fx.file_path);
            $('#file_name_viewer').text(fx.file_type ? fx.file_type.title_ar : fx.name)
            $('#loop_page_viewer').text(`${pageViewer + 1}/${filesViewer.length}`)
            console.log(fx)
        }

        function initFileViewer(file) {
            $('#file_viewer_frame').attr('src', file);
        }


        function showNextFile() {
            if (pageViewer < filesViewer.length - 1) {
                pageViewer = pageViewer + 1;
                var fx = filesViewer[pageViewer];
                initFileViewer(fx.file_path);
                $('#file_name_viewer').text(fx.file_type ? fx.file_type.title_ar : fx.name)
                $('#loop_page_viewer').text(`${pageViewer + 1}/${filesViewer.length}`)
                console.log(fx)
            }
        }

        function showPrevFile() {
            if (pageViewer >= 1) {
                pageViewer = pageViewer - 1;
                var fx = filesViewer[pageViewer];
                initFileViewer(fx.file_path);
                $('#file_name_viewer').text(fx.file_type ? fx.file_type.title_ar : fx.name)
                $('#loop_page_viewer').text(`${pageViewer + 1}/${filesViewer.length}`)
                console.log(fx)
            }
        }

        function editEmployee(employee) {
            $('#employee_add_modal_btn').trigger('click');

            employee = JSON.parse(decodeURIComponent(employee));
            // employee = JSON.parse(employee);
            $('#edit_employee_btn').prop("disabled", false);
            let form = $('#adminAddHumanResourceEmployeeForm');
            form.find('input[name="human_resource_id"]').val(employee.id)
            form.find('input[name="name"]').val(employee.name)
            form.find('input[name="parent_name"]').val(employee.parent_name)
            form.find('input[name="family_name"]').val(employee.family_name)
            form.find('input[name="ssn"]').val(employee.ssn)
            form.find('input[name="email"]').val(employee.email)
            form.find('input[name="residence_end_date"]').val(employee.residence_end_date)
            form.find('input[name="phone"]').val(employee.phone)
            form.find('input[name="job_title"]').val(employee.job_title)
            form.find('input[name="specialization_title"]').val(employee.specialization_title)
            form.find('select[name="job_id"]').val(employee.job_id)
            form.find('select[name="nationality"]').val(employee.nationality)
            form.find('select[name="gender"]').val(employee.gender)

            form.find('input[name="work_duration"]').val(employee.work_duration)
            form.find('input[name="expert_years_number"]').val(employee.expert_years_number)
            form.find('input[name="work_date"]').val(employee.work_date)

            form.find('select[name="specialization_id"]').val(employee.specialization_id)
            form.find('select[name="degree_id"]').val(employee.degree_id)

            if (employee.job_id == 44 || employee.job_id == 45 || employee.job_id == 81) {

                $('#adminAddHumanResourceEmployeeForm input[name="phone"]').parents().eq(0).show()
                $('#adminAddHumanResourceEmployeeForm input[name="email"]').parents().eq(0).show()
            } else {

                $('#adminAddHumanResourceEmployeeForm input[name="phone"]').parents().eq(0).hide()
                $('#adminAddHumanResourceEmployeeForm input[name="email"]').parents().eq(0).hide()
            }
        }

        function loadEmployessData() {
            $.ajax({
                url: '{{route('ApiGetAllHumanResource',['id'=>$office_agent->id])}}',
                type: 'GET',
                data: {},
                success: function (response) {
                    if (response.status) {
                        let officeHRs = response.data.officeHRs;
                        $('#adminOfficeAgentAddEmployeeAttachmentForm select[name="human_resource_id"]').empty();
                        $('#adminOfficeAgentAddEmployeeAttachmentForm select[name="human_resource_id"]').append('<option value="">-- {{__('office_agent.choose')}}-- </option>');
                        $.each(officeHRs, function (index, hr) {

                            $('#adminOfficeAgentAddEmployeeAttachmentForm select[name="human_resource_id"]').append('<option value="' + hr.id + '">' + hr.name + hr.parent_name + hr.family_name + '</option>');
                        })
                    }
                }
            })
        }


        function resetToAddInsatllment() {

            $('#adminOfficeAgentAddInstallmentForm').trigger('reset');
            $('#adminOfficeAgentAddInstallmentForm  input').val('');
            $('#adminOfficeAgentAddInstallmentForm  select').prop('selectedIndex', 0);
        }

        // done admin
        function editInstallment(device) {
            $('#installment_add_modal_btn').trigger('click');

            device = JSON.parse(decodeURIComponent(device));
            // device = JSON.parse(device);

            $('#installment_update_btn').prop("disabled", false);
            let form = $('#adminOfficeAgentAddInstallmentForm');
            // form.find('input[name="device_name"]').val(device.device_type.name)
            @can('device_type_select',$office_agent)
            form.find('select[name="device_name"]').val(device.device_type.name)
            @endcan
            @can('device_type_input',$office_agent)
            form.find('input[name="device_name"]').val(device.device_type.name)
            @endcan
            form.find('input[name="device_others"]').val(device.device_others)
            form.find('input[name="device_id"]').val(device.id)
            form.find('input[name="serial"]').val(device.serial)
            form.find('input[name="number"]').val(device.number)
        }

        $(document).ready(function () {
            let table = $('#data_table');
            /* Fixed header extension: http://datatables.net/extensions/keytable/ */
            var oTable = table.dataTable({
                "responsive": true,
                "searching": false,
                "paging": false,
                // "dom": "<'row'<'col-md-5 col-12'l><'col-md-7 col-12'f>r><'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
                dom: 'rBfrtip',
                "order": [
                    [0, 'asc']
                ],
                "lengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                "pageLength": 5, // set the initial value,
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0]
                }],
                buttons: [
                    {
                        extend: 'print',
                        text: 'طباعة',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 7]
                        },
                        title: '',
                        className: 'btn btn-primary',
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', 'rtl');
                            $(win.document.body)
                                .css('font-size', '12px')
                                .prepend(`
                                <div class="row" style="padding:15px">
                                    <div class="col-md-12 text-center">
                                        <img src="{{asset('assets/images/logo.png')}}" width="120" height="120" class="mt-4 pull-right float-right"  style="float:right;margin-top:15px" alt="">
                                        <img src="{{asset('assets/images/new_kuwait.png')}}" width="120" height="120" class="mt-4 pull-left float-left" style="float:left;margin-top:15px" alt="">
                                        <h1 style="margin:15px">
                                            <b class="report_header"> الهيئة العامة للبيئة - تقارير  قسم الاعتماد البيئي   </b> <br>
                                            <span class="fs25">مدفوعات الشركة ({{$office_agent->office_name_ar ?? ''}})</span>
                                        </h1>
                                    </div>
                                </div>
                            `);

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('direction', 'rtl');
                        }
                    }
                ]
            });
        })


        $('select').on('change', function () {
            triggerSelectOptionChanges();
        });

        $('select[name="dist_type"]').on('change', function () {
            if ($(this).val() == 'outer_dist') {
                $('select[name="department_id"]').val('')
                $('select[name="to_user_id"]').val('')
                $('select[name="department_id"]').parents().eq(0).hide()
                $('select[name="to_user_id"]').parents().eq(0).hide()
            } else {

                $('select[name="department_id"]').parents().eq(0).show()
                $('select[name="to_user_id"]').parents().eq(0).show()
            }
        });

        $('select').on('change', function () {
            triggerSelectOptionChanges();
        });

        function prepareOfficeOption(office_agent) {
            return Object.assign({}, {
                another_branch_type_id: office_agent.another_branch_type_id,
                branch_type_id: office_agent.branch_type_id,
                classification_degree_id: office_agent.classification_degree_id,
                company_type_id: office_agent.company_type_id,
                contract_type_id: office_agent.contract_type_id,
                device_file_type_id: office_agent.device_file_type_id,
                human_resource_degree_id: office_agent.human_resource_degree_id,
                human_resource_file_type_id: office_agent.human_resource_file_type_id,
                human_resource_job_id: office_agent.human_resource_job_id,
                human_resource_specialization_id: office_agent.human_resource_specialization_id,
                office_file_type_id: office_agent.office_file_type_id,
                office_section_activity_id: office_agent.office_section_activity_id,
                office_section_type_id: office_agent.office_section_type_id,
                office_type_id: office_agent.office_type_id,
                partner_attachment_type_id: office_agent.partner_attachment_type_id,
                endorse_at: office_agent.endorse_at,
                order_status_id: office_agent.order_status_id,
                user_id: '{{getAuthUser()->id ?? null}}'
            });
        }

        function triggerSelectOptionChanges() {
            let site_inputs = $('select');
            let current_inputs_val = [];
            let to_send_inputs_val = [];

            $.each(site_inputs, function (k, select) {
                if (!select.name.includes('_table_length') && select.dataset.name != undefined) {
                    current_inputs_val[select.dataset.name] = select.value
                    to_send_inputs_val[select.dataset.name + '_id'] = select.value
                }
            });

            to_send_inputs_val['office_type_id'] = '{{$office_agent->office_type_id}}';
            to_send_inputs_val = Object.assign({}, to_send_inputs_val);

            current_inputs_val = Object.assign({}, current_inputs_val);

            // console.log(to_send_inputs_val)
            getOfficeOption(to_send_inputs_val, current_inputs_val)
        }

        let office_data = prepareOfficeOption({!! $office_agent !!});

        getOfficeOption(office_data, office_data);

        let current_specializations = {{collect($current_specializations)}}


        function getOfficeOption(to_send_inputs_val, current_inputs_val) {
            let loader = $('#loader_fixed');
            loader.show()
            $.ajax({
                url: '{{route("getOfficeAttributes")}}',
                method: 'POST',
                data: {
                    options: to_send_inputs_val
                },
                error: function (error) {
                    loader.hide()
                },
                success: function (response) {
                    loader.hide()
                    if (response.status) {
                        let all_data_from_server = response.data;

                        // loop for all tabs
                        $.each(all_data_from_server, function (key, element) {

                            // if (key == 'company_info') {
                            // loop for all inputs in one tab
                            $.each(element, function (index, attributes) {

                                if (index == 'attributes') {
                                    let tab = $('.' + key + '_tab');
                                    if (attributes.visable) {
                                        tab.show()
                                    } else {
                                        tab.hide()
                                    }
                                }
                            });

                            $.each(element.inputs, function (index, input) {

                                if (input.type == 'input') {
                                    let dom_input = $('input[name="' + input.alias_name + '"]');

                                    // dom_input.prop('disabled', input.disable);
                                    dom_input.prop('disabled', true);

                                    if (input.visible) {
                                        dom_input.parent().css({'display': 'block'})
                                    } else {
                                        dom_input.parent().css({'display': 'none'})
                                    }

                                    dom_input.parent().find('label').text(input.input_name);
                                }

                                if (input.type == 'select') {
                                    let dom_select = $('select[data-name="' + input.alias_name + '"]');

                                    dom_select.prop('disabled', true);

                                    if (input.visible) {
                                        dom_select.parent().css({'display': 'block'})
                                    } else {
                                        dom_select.parent().css({'display': 'none'})
                                    }

                                    dom_select.parent().find('label').text(input.input_name);


                                    if (dom_select) {
                                        if (current_inputs_val[input.alias_name] != undefined) {
                                            dom_select.empty();
                                            let selected_id = current_inputs_val[input.alias_name];

                                            dom_select.append('<option value="">-- {{__('office_agent.choose')}} -- </option>')
                                            $.each(input.data, function (k, v) {
                                                let name = v.title_ar === undefined ? v.name : v.title_ar;
                                                if (v.id == selected_id) {
                                                    dom_select.append('<option selected value="' + v.id + '">' + name + '</option>')
                                                } else {
                                                    dom_select.append('<option value="' + v.id + '">' + name + '</option>')
                                                }
                                            })
                                        }
                                    }
                                }

                                if (input.type == 'checkbox') {
                                    if (input.alias_name == 'specialize_ids') {
                                        let dom_input1 = $('#specialize_checks');
                                        let dom_input2 = $('#specialize_checks_alert');

                                        dom_input1.empty();
                                        dom_input2.empty();

                                        dom_input1.parent().find('label').text(input.input_name);
                                        dom_input2.parent().find('label').text(input.input_name);

                                        if (input.visible) {
                                            dom_input1.parent().css({'display': 'block'})
                                            dom_input2.parent().css({'display': 'block'})
                                        } else {
                                            dom_input1.parent().css({'display': 'none'})
                                            dom_input2.parent().css({'display': 'none'})
                                        }

                                        $.each(input.data, function (k, v) {
                                            let checked = '';
                                            let display = 'none';
                                            if (current_specializations.includes(v.id)) {
                                                checked = 'checked=""';
                                                display = 'block';
                                            }
                                            dom_input1.append('<li>' +
                                                '<input class="styled-checkbox special-checkbox" disabled id="styled-checkbox-' + v.id + '"' +
                                                'name="specialize_ids[]"' +
                                                checked +
                                                'type="checkbox" value="' + v.id + '">\n' +
                                                '<label for="styled-checkbox-' + v.id + '">' +
                                                v.title_ar +
                                                '</label>' +
                                                '</li>'
                                            );
                                            // dom_input2.append('<div class="alert alert-warning alert-dismissible fade show special-alerts "\n' +
                                            //     '                 style="display: ' + display + '" role="alert"' +
                                            //     '                 id="special_' + v.id + '">\n' +
                                            //     '                <strong> ' + v.title_ar + ' ! </strong>' + v.description_ar + '\n' +
                                            //     '                <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                                            //     '                    <span aria-hidden="true">&times;</span>\n' +
                                            //     '                </button>\n' +
                                            //     '            </div>');
                                        })
                                    }
                                }

                                if (input.type == 'button') {
                                    let dom_button = $('button[name="' + input.alias_name + '"]');

                                    // dom_button.prop('disabled', input.disable);
                                    dom_button.prop('disabled', true);

                                    if (input.visible) {
                                        dom_button.css({'display': 'block'})
                                    } else {
                                        dom_button.css({'display': 'none'})
                                    }

                                    // dom_button.html(input.input_name);
                                }
                            })

                            // }
                        })
                        hideSections();
                    }
                }
            })
        }

        function updateOfficeConfirmedAt(url) {
            let loader = $('#loader_fixed');
            loader.show()
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    date: $('#confirmdate').val()
                },
                error: function (error) {
                    loader.hide()
                },
                success: function (response) {
                    loader.hide()
                    if (response.status) {
                        location.reload()
                    }
                }
            })
        }

        {{--function triggerSelectOptionChanges() {--}}
        {{--    let all_option = [];--}}
        {{--    let all_option_ids = [];--}}
        {{--    $.each($('select'), function (k, select) {--}}
        {{--        if (!select.name.includes('_table_length') && select.dataset.name != undefined) {--}}
        {{--            all_option[select.dataset.name] = select.value--}}
        {{--            all_option_ids[select.dataset.name + '_id'] = select.value--}}
        {{--        }--}}
        {{--    });--}}
        {{--    all_option_ids['office_type_id'] = {{$office_agent->office_type_id}};--}}
        {{--    getOfficeOption(all_option, all_option_ids)--}}
        {{--}--}}

        {{--function getOfficeOption(all_options, all_option_ids) {--}}
        {{--    all_option_ids = Object.assign({}, all_option_ids);--}}
        {{--    $('.env_loader').show()--}}
        {{--    $.ajax({--}}
        {{--        url: '{{route("getOfficeOption")}}',--}}
        {{--        method: 'GET',--}}
        {{--        data: {--}}
        {{--            options: all_option_ids--}}
        {{--        },--}}
        {{--        success: function (response) {--}}
        {{--            $('.env_loader').hide()--}}
        {{--            // console.log(all_options)--}}
        {{--            if (response.status) {--}}
        {{--                $.each(response.data.options, function (index, option) {--}}
        {{--                    let selects = $('select[data-name="' + index + '"]');--}}

        {{--                    selects.each(function (i, select) {--}}
        {{--                        if (select) {--}}
        {{--                            select.options.length = 0;--}}
        {{--                            if (all_options[index] != undefined) {--}}

        {{--                                var selected_id = all_options[index];--}}
        {{--                                var no_option = document.createElement("option");--}}
        {{--                                no_option.text = "-- {{__('office_agent.choose')}} --";--}}
        {{--                                no_option.value = "";--}}
        {{--                                select.appendChild(no_option);--}}

        {{--                                // if (index == 'another_branch_type'){--}}
        {{--                                //     console.log(select)--}}
        {{--                                //     console.log(option)--}}
        {{--                                //     console.log(all_options)--}}
        {{--                                // }--}}
        {{--                                $.each(option, function (k, v) {--}}

        {{--                                    var _option = document.createElement("option");--}}
        {{--                                    _option.text = v.title_ar;--}}
        {{--                                    _option.value = v.id;--}}
        {{--                                    if (v.id == selected_id) {--}}
        {{--                                        _option.setAttribute("selected", true);--}}
        {{--                                    }--}}
        {{--                                    select.appendChild(_option)--}}
        {{--                                })--}}

        {{--                            }--}}
        {{--                        }--}}
        {{--                    })--}}

        {{--                })--}}
        {{--            }--}}
        {{--        }--}}
        {{--        ,--}}
        {{--        error: function (error) {--}}
        {{--            console.log(error)--}}
        {{--            $('.env_loader').hide()--}}
        {{--        }--}}
        {{--    })--}}
        {{--}--}}


    </script>
    <script>

        function showPayment(payment) {
            payment = JSON.parse(JSON.stringify(payment))
            // payment = eval(payment);
            // console.log(payment)

            let html_content = "" +
                "<div id=\"DivIdToPrint\">\n" +
                "<div class=\"row bg-white\">\n" +
                "<div class=\"col-md-12 d-flex\">\n" +
                "<img src=\"{{asset('assets/images/logo.png')}}\" class=\"m-4\" width=\"75px\" height=\"75px\">" +
                "<h1 class=\"m-4\">\n <b> الخدمات الالكترونية</b> <br>\n <span class=\"fa-sm\">ايصال دفع " + payment.type.name + "</span>\n" +
                "</h1>\n</div>\n</div>\n<div class=\"row bg-white\">\n<div class=\"col-md-12 mt-3\">\n<table class=\"table table-bordered\" border=\"4\">\n" +
                "<tr>\n";
            if (payment.paymentable[0]) {
                html_content +=
                    "<td>\n<b>{{__('violation.civil_name')}}</b>\n</td>\n<td width=\"65%\">\n<b>" + payment.paymentable[0].name + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b>{{__('violation.phone')}}</b>\n</td>\n<td width=\"65%\">\n<b>" + payment.paymentable[0].phone + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b>{{__('violation.email')}}</b>\n</td>\n<td width=\"65%\">\n<b>" + payment.paymentable[0].email + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b>{{__('violation.amount')}}</b>\n</td>\n<td width=\"65%\">\n<b>" + payment.paymentable[0].cost + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b class='text-uppercase'>result</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.paymentable[0].knet_data ? payment.paymentable[0].knet_data.result : 'غير مدفوع') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b class='text-uppercase'>payment_id</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.paymentable[0].knet_data ? payment.paymentable[0].knet_data.payment_id : '') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b class='text-uppercase'>track_id</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.paymentable[0].knet_data ? payment.paymentable[0].knet_data.track_id : '') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b class='text-uppercase'>auth_code</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.paymentable[0].knet_data ? payment.paymentable[0].knet_data.auth_code : '') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b class='text-uppercase'>post_date</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.paymentable[0].knet_data ? payment.paymentable[0].knet_data.post_date : '') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b class='text-uppercase'>ref</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.paymentable[0].knet_data ? payment.paymentable[0].knet_data.ref : '') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b class='text-uppercase'>{{app()->getLocale() == 'ar' ? 'نوع الدفع' : 'Payment Type'}}</b>\n</td>\n<td width=\"65%\">\n<b>" + ((payment.paymentable[0].knet_data) ? 'Online' : 'KNET') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b>{{app()->getLocale() == 'ar' ? 'نوع العملية' : 'Action Type'}}</b>\n</td>\n<td width=\"65%\">\n<b>" + payment.type.name + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b>{{app()->getLocale() == 'ar' ? 'تاريخ الدفع' : 'Created At'}}</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.payed_at ? payment.payed_at : '') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b>{{app()->getLocale() == 'ar' ? ' رقم الايصال  ' : 'Receipt Code'}}</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.receipt_code ? payment.receipt_code : '') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b>{{app()->getLocale() == 'ar' ? ' ملاحظات    ' : 'Notes'}}</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.notes ? payment.notes : '') + "</b>\n</td>\n </tr>\n" +
                    "<tr>\n" +
                    "</table>\n</div>\n</div>\n</div>";
            }

            $.sweetModal({
                title: '',
                content: html_content,
                theme: $.sweetModal.THEME_DARK,
                buttons: {
                    someOtherAction: {
                        label: 'طباعة',
                        classes: 'btn btn-danger',
                        action: function () {
                            // return $.sweetModal('You clicked Action 2!');
                            let divToPrint = document.getElementById('DivIdToPrint');
                            let newWin = window.open('', 'Print-Window');
                            newWin.document.open();
                            newWin.document.write('<html>{{Html::style('assets/css/bootstrap.min.css')}}{{Html::style('assets/css/bootstrap-rtl.css')}}<body dir="rtl" onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
                            newWin.document.close();
                            setTimeout(function () {
                                newWin.close();
                            }, 10);
                        }
                    },
                }
            });
        }
    </script>
@endsection
