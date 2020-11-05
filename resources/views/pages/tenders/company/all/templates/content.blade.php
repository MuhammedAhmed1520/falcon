<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="bg-gray mb-2 p-1">
                    <div class="row">
                        <div class="col-md-3">
                            <b>{{__('violation.status')}}</b>
                            <select class="form-control" name="state">
                                <option value="ALL" @if(request()->state == 'ALL') selected @endif>{{__('tenders.All')}}</option>
                                <option value="APPROVED" @if(request()->state == 'APPROVED') selected @endif>
                                    {{__('tenders.APPROVED')}}
                                </option>
                                <option value="UNAPPROVED" @if(request()->state == 'UNAPPROVED') selected @endif>
                                    {{__('tenders.UNAPPROVED')}}
                                </option>
                                <option value="PENDING" @if(request()->state == 'PENDING') selected @endif>
                                    {{__('tenders.PENDING')}}
                                </option>
                                <option value="PAIDFEES" @if(request()->state == 'PAIDFEES') selected @endif>
                                    {{__('tenders.PAIDFEES')}}
                                </option>
                                <option value="PAIDFEESFORTHISYEAR"
                                        @if(request()->state == 'PAIDFEESFORTHISYEAR') selected @endif>
                                    {{__('tenders.PAIDFEESFORTHISYEAR')}}
                                </option>
                                <option value="NOTPAIDFEESFORTHISYEAR"
                                        @if(request()->state == 'NOTPAIDFEESFORTHISYEAR') selected @endif>
                                    {{__('tenders.NOTPAIDFEESFORTHISYEAR')}}
                                </option>
                                <option value="NOTPAIDFEESFORTHISYEARNEW"
                                        @if(request()->state == 'NOTPAIDFEESFORTHISYEARNEW') selected @endif>
                                    {{__('tenders.NOTPAIDFEESFORTHISYEARNEW')}}
                                </option>

                            </select>
                        </div>
                        <div class="col-md-4">
                            <b>{{__('violation.query')}}</b>
                            <input type="text" name="key" class="form-control" value="{{ request()->get('key')}}">
                            <br>
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
                    <th>#</th>
                    <th>{{__('tenders.reference')}}</th>
                    <th>{{__('tenders.company')}}</th>
                    <th>{{__('tenders.civil_ssn')}}</th>
                    <th>{{__('tenders.licence_number')}}</th>
                    <th>{{__('tenders.date')}}</th>
                    <th>{{__('tenders.file_status')}}</th>
                    <th>{{__('tenders.fee_status')}}</th>
                    <th>{{__('tenders.updates')}}</th>
                    <th>{{__('tenders.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr id="tender_company_{{$company->id}}">
                        <td>{{$company->id}}</td>
                        <td>{{$company->tender_company->reference_code ?? ''}}</td>
                        <td>
                            {{$company->tender_company->name_en ?? ''}} <br/>
                            {{$company->name ?? ''}}
                        </td>
                        <td>{{$company->tender_company->civil_ssn ?? ''}}</td>
                        <td>{{$company->tender_company->licence_number ?? ''}}</td>
                        <td>{{$company->tender_company->created_at ?? ''}}</td>
                        <td>
                            @if($company->tender_company->file_status)
                                <i class="la la-file-code-o text-success"></i>
                                <b>{{__('tenders.completed_files')}}</b>
                            @else
                                <i class="la la-file-code-o text-danger"></i>
                                <b>{{__('tenders.missing_files')}}</b>
                            @endif
                        </td>
                        <td>
                            @if($company->tender_company->is_paid)
                                <i class="la la-check text-success"></i>
                                <b>{{__('tenders.paid')}}</b>
                            @else
                                <i class="la la-close text-danger"></i>
                                <b>{{__('tenders.not_paid')}}</b>
                            @endif
                        </td>
                        @php
                            $current_status = $company->tender_company->status->title ?? null;
                        @endphp
                        <td>
                            @can('read-tender-company')
                            <button class="btn btn-dark btn-sm tooltips {{$company->tender_company->read_at ? 'disabled' : ''}}"
                                    aria-label="{{__('tenders.mark_as_view')}}"
                                    {{$company->tender_company->read_at ? 'disabled' : ''}} onclick="markCompanyAsRead(this,'{{$company->id}}')">
                                <i class="la la-check"></i>
                                {{--{{__('tenders.mark_as_view')}}--}}
                            </button>
                            @endcan
                            @can('active-tender-company')
                            <div class="btn-group">
                                @if($current_status == null || $current_status == 'unApproved')
                                    <button class="btn  btn-success tooltips btn-sm"
                                            aria-label="{{__('tenders.activate')}}"
                                            onclick="activateCompany(this,'{{$company->id}}')">
                                        <i class="la la-unlock-alt"></i>
                                        {{--                                        {{   __('tenders.activate') }}--}}
                                    </button>
                                @endif
                                @if($current_status == null || $current_status == 'approved')
                                    <button class="btn btn-danger tooltips btn-sm"
                                            aria-label="{{__('tenders.deactivate')}}"
                                            onclick="deactivateCompany(this,'{{$company->id}}')">
                                        <i class="la la-unlock"></i>
                                        {{--                                        {{ __('tenders.deactivate') }}--}}
                                    </button>
                                @endif
                            </div>
                          @endcan
                        </td>
                        <td>
                            <div class="btn-group direction text-right w-100">
                            @can('pay-tender-company')
                                <button class="btn btn-primary btn-sm m-0 tooltips"
                                        @if($company->tender_company->is_paid) disabled @endif
                                        onclick="payment('{{$company->id}}')"
                                        aria-label="{{__('tenders.payment')}}">
                                    <i class="la la-money"></i>
                                </button>
                            @endcan    
                            @can('transactions-tender-company')
                                <a href="{{route('getCompanyTransactions',['id'=>$company->id])}}"
                                   class="btn btn-dark btn-sm m-0 tooltips"
                                   aria-label="{{app()->getLocale() == 'ar' ? 'سجل المدفوعات':'Cash Transactions'}}">
                                    <i class="la la-archive"></i>
                                </a>
                            @endcan
                            @can('files-tender-company')
                                <a href="{{route('editCompanyFiles',['id'=>$company->id])}}"
                                   class="btn btn-warning btn-sm m-0 tooltips" aria-label="{{__('tenders.documents')}}">
                                    <i class="la la-file"></i>
                                </a>
                            @endcan   
                            @can('edit-tender-company')
                                <a href="{{route('editCompany',['id'=>$company->id])}}"
                                   class="btn btn-info btn-sm m-0 tooltips"
                                   aria-label="{{__('tenders.edit')}}">
                                    <i class="la la-edit"></i>
                                </a>
                            @endcan    
                            @can('delete-tender-company')
                                <button class="btn btn-danger btn-sm m-0 tooltips" onclick="remove('{{$company->id}}')"
                                        aria-label="{{__('tenders.delete')}}">
                                    <i class="la la-close"></i>
                                </button>
                            @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mb-5">
            {{$companies->appends(request()->input())->render('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
