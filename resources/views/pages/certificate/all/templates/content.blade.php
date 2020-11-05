<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="bg-gray mb-2 p-1">
                    <div class="row">
                        <div class="col-md-3">
                            <b>{{__('violation.date_range')}}</b>
                            <input type="text" class="date-range form-control">
                            <input type="hidden" name="start_date">
                            <input type="hidden" name="end_date">
                        </div>
                        <div class="col-md-3">
                            <b>{{__('violation.query')}}</b>
                            <input type="text" name="key" class="form-control" value="{{ request()->get('key')}}">
                        </div>
                        <div class="col-md-12"></div>
                        <div class="col-md-3  advanced_item">
                            <b>{{__('certificate.request_party')}}</b>
                            <select class="form-control" name="request_party_id">
                                <option value="">{{__('violation.ALL')}}</option>
                                @foreach($parties as $action)
                                    <option value="{{$action->id}}"
                                            @if(request()->get('request_party_id') == $action->id) selected @endif>{{app()->getLocale() == 'ar' ? $action->name_ar : $action->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <b>{{__('certificate.application_reason')}}</b>
                            <select class="form-control" name="reason_id">
                                <option value="">{{__('violation.ALL')}}</option>
                                @foreach($reasons as $action)
                                    <option value="{{$action->id}}"
                                            @if(request()->get('reason_id') == $action->id) selected @endif>{{app()->getLocale() == 'ar' ? $action->name_ar : $action->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <b>{{__('certificate.expired_at')}}</b>
                            <select class="form-control" name="expired_certification">
                                <option value=""@if(request()->get('expired_certification') === "") selected @endif >{{__('violation.ALL')}}</option>
                                <option value="1" @if(request()->get('expired_certification') === "1") selected @endif>{{__('violation.yes')}}</option>
                                <option value="0" @if(request()->get('expired_certification') === "0") selected @endif>{{__('violation.no')}}</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <b>{{__('certificate.status')}}</b>
                            <select class="form-control" name="status_id">
                                <option value="">{{__('violation.ALL')}}</option>
                                @foreach($status as $st)
                                    <option value="{{$st->id}}"
                                            @if(request()->get('status_id') == $st->id) selected @endif>{{__('certificate.'.$st->title)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 text-left mt-2 mb-2">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-sm btn-info m-0">
                                    {{__('violation.filter')}}
                                </button>
                                <button type="reset" class="btn btn-sm btn-danger m-0">
                                    {{__('violation.reset')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    {{--<th>#</th>--}}
                    <th>{{__('certificate.id')}}</th>
                    <th>{{__('certificate.company_name')}}</th>
                    <th>{{__('certificate.created_at')}}</th>
                    <th>{{app()->getLocale() == 'ar' ? 'حالة الدفع' : 'Paid'}}</th>
                    <th>{{app()->getLocale() == 'ar' ? 'المستخدم' : 'User Approved'}}</th>
                    <th>{{__('certificate.owner_name')}}</th>
                    <th>{{__('certificate.license_number')}}</th>
                    <th>{{__('certificate.civil_ssn')}}</th>
                    <th>{{__('certificate.email')}}</th>
                    <th>{{__('certificate.mobile')}}</th>
                    <th>{{__('certificate.phone')}}</th>
                    <th>{{__('certificate.status')}}</th>
                    <th>{{__('certificate.has_violation')}}</th>
                    <th>{{__('certificate.expired_at')}}</th>
                    <th>{{__('certificate.payed_at')}}</th>
                    <th>{{__('certificate.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($certificates as $certificate)
                    <tr id="tender_{{$certificate->id}}">
                        <td>{{$certificate->id }}</td>
                        <td>{{$certificate->company_name }}</td>
                        <td>{{$certificate->created_at }}</td>
                        <td class="text-center">{!! $certificate->payed_at ? '<i class="la la-check text-success"></i>' : '<i class="la la-close text-danger"></i>' !!}</td>
                        <td>{{$certificate->user->username ?? $certificate->display_name ?? '-' }}</td>
                        <td>{{$certificate->owner_name }}</td>
                        <td>{{$certificate->license_number }}</td>
                        <td>{{$certificate->civil_ssn }}</td>
                        <td>{{$certificate->email }}</td>
                        <td>{{$certificate->mobile }}</td>
                        <td>{{$certificate->phone}}</td>
                        <td>{{__('certificate.'.$certificate->status->title)}}</td>
                        <td>
                            {{--{{__('certificate.'.$certificate->has_violation)}}--}}
                            <button type="button" data-toggle="modal"  data-type="ssn"
                                    class="btn btn-sm btn-primary"
                                    onclick="getViolation({{$certificate}})"
                                    style="z-index: 99;top: 26px;">
                                <i class="la la-info"></i>
                            </button>

                            {{--@if($certificate->has_violation == '1')--}}
                                {{--|--}}
                                {{--<button type="button" data-toggle="modal"  data-type="ssn"--}}
                                        {{--class="btn btn-sm btn-primary"--}}
                                        {{--onclick="getViolation({{$certificate}})"--}}
                                        {{--style="z-index: 99;top: 26px;">--}}
                                    {{--<i class="la la-info"></i>--}}
                                {{--</button>--}}
                                {{--<a href="#">--}}
                                    {{--<i class="la la-info"></i>--}}
                                {{--</a>--}}
                            {{--@else--}}
                                {{--{{__('certificate.no_violation')}}--}}
                            {{--@endif--}}
                        </td>

                        <td>{{$certificate->expired_at}}</td>
                        <td>{{$certificate->payed_at}}</td>
                        <td>
                            <div class="btn-group direction">
                                @can('print-certificate')
                                <a href="{{route('getCertificate',['id'=>$certificate->id])}}"
                                   class="btn btn-primary btn-sm @if(!$certificate->payed_at) disabled  @endif m-0 tooltips"
                                   @if(!$certificate->payed_at) disabled="" @endif
                                   aria-label="{{__('certificate.get_certify')}}">
                                    <i class="la la-file"></i>
                                </a>
                                @endcan
                                @can('pay-certificate')
                                <a href="{{route('getPaymentCertificate',['id'=>$certificate->id])}}"
                                   @if(!$certificate->payed_at) disabled="" @endif
                                   class="btn btn-success btn-sm m-0  @if(!$certificate->payed_at) disabled  @endif tooltips"
                                   aria-label="{{__('tenders.payment')}}">
                                    <i class="la la-money"></i>
                                </a>
                                @endcan
                                @can('edit-certificate')
                                <a href="{{route('editCertificate',['id'=>$certificate->id])}}"
                                   class="btn btn-info btn-sm m-0 tooltips"
                                   aria-label="{{__('tenders.edit')}}">
                                    <i class="la la-edit"></i>
                                </a>
                                @endcan
                                @can('decide-certificate')
                                <div class="dropdown">
                                    <button class="btn btn-warning btn-sm  dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @if(in_array($certificate->status_id,["14","15","12","16","17"]))
                                            <a class="dropdown-item" style="cursor: pointer"
                                               onclick="decide_app('{{$certificate->id}}','1')">{{__('certificate.approve')}}</a>
                                        @endif
                                        @if(in_array($certificate->status_id,["13","15","12","16","17"]))
                                            <a class="dropdown-item" style="cursor: pointer"
                                               onclick="decide_app('{{$certificate->id}}','2')">{{__('certificate.reject_for_edit')}}</a>
                                        @endif
                                        @if(in_array($certificate->status_id,["14","13","12","16","17"]))
                                                <a class="dropdown-item" style="cursor: pointer"
                                                   onclick="decide_app('{{$certificate->id}}','3')">{{__('certificate.reject')}}</a>
                                        @endif
                                    </div>
                                </div>
                                @endcan
                                    @can('delete-certificate')
                                        <a  style="cursor: pointer" onclick="deleteCert('{{$certificate->id}}')"
                                           class="btn btn-info btn-sm m-0 tooltips"
                                           aria-label="{{__('tenders.delete')}}">
                                            <i class="la la-trash"></i>
                                        </a>
                                    @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @include('pages.certificate.all.templates.violation_modal')
        </div>
        <div class="col-md-12 mb-5">
            {{$certificates->appends(request()->input())->render('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
