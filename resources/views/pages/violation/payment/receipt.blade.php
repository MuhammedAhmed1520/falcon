@extends('layouts.adminReport')

@section('styles')
    <style>
        .skeleton-nav--center {

            display: block;
            width: auto;
            margin-right: 0;
            min-height: 100vh;
            background-color: #ccc;
            padding: 0;
        }
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container bg-white h-100 p-2" style="border: 2px dashed #555">
            <div class="row">
                <div class="col-md-12 d-flex">
                    <img src="{{asset('assets/images/logo.png')}}" class="m-4" width="75px" height="75px"
                         class="bg-main"
                         alt="">
                    <h1 class="m-4">
                        <b> الخدمات الالكترونية</b> <br>
                        <span class="fa-sm">ايصال دفع المخالفات البيئية</span>
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="offset-md-2 col-md-8 mt-3">
                    <h3>بيانات الدفع</h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <b>{{__('violation.name')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->payment->name ?? ''}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.email')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->payment->email ?? ''}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.phone')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->payment->phone ?? ''}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.check_info')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->check_info}}</b>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            @if($violation->payment->knet_data ?? null)
                <div class="row">
                    <div class="offset-md-2 col-md-8 mt-3">
                        <h3>بيانات الدفع KNET</h3>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <b>RESULT</b>
                                </td>
                                <td width="65%">
                                    <b>{{$violation->payment->knet_data->result ?? ''}}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>DATE</b>
                                </td>
                                <td width="65%">
                                    <b>{{$violation->payment->knet_data->created_at->format('Y-m-d') ?? ''}}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>TIME</b>
                                </td>
                                <td width="65%">
                                    <b>{{$violation->payment->knet_data->created_at->format('H:s:i') ?? ''}}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>AMOUNT</b>
                                </td>
                                <td width="65%">
                                    <b>{{$violation->payment->knet_data->amount ?? ''}}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>TRANSACTION ID</b>
                                </td>
                                <td width="65%">
                                    <b>{{$violation->payment->knet_data->tran_id ?? ''}}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>REFERENCE ID</b>
                                </td>
                                <td width="65%">
                                    <b>{{$violation->payment->knet_data->ref ?? ''}}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>PAYMENT ID</b>
                                </td>
                                <td width="65%">
                                    <b>{{$violation->payment->knet_data->payment_id ?? ''}}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>TRACK ID</b>
                                </td>
                                <td width="65%">
                                    <b>{{$violation->payment->knet_data->track_id ?? ''}}</b>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="offset-md-2 col-md-8 mt-3">
                    <h3>بيانات المخالفة</h3>
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <b>{{__('violation.id')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->id}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.serial')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->serial}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.subject_number')}}</b>
                            </td>
                            <td width="65%">
                                @foreach($violation->subjects as $sub)
                                    <b>{{$sub->subject_paragraph->subject_rule->title?? null}}</b>
                                    @if(!$loop->last)
                                        ||
                                    @endif
                                @endforeach
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.location_name')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->location_name}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.created_at')}}</b>
                            </td>
                            <td width="65%" class="text-left" dir="ltr">
                                <b>{{$violation->created_at}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.civil_name')}}</b>
                            </td>
                            <td width="65%">
                                @if($violation->category_id == 1)
                                    <b>{{$violation->civilian->name ?? '-'}}</b>
                                @else
                                    <b>{{$violation->company->civilian->name ?? '-'}}</b>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.civil_ssn')}}</b>
                            </td>
                            <td width="65%">
                                @if($violation->category_id == 1)
                                    <b>{{$violation->civilian->ssn ?? '-'}}</b>
                                @else
                                    <b>{{$violation->company->civilian->ssn ?? '-'}}</b>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.violation_action')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->action->title}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.notes')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->notes}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.amount')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->fine_cost}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.status')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->payed_at ? $violation->payed_at : 'لم يتم سداد المخالفة'}}</b>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')




@endsection