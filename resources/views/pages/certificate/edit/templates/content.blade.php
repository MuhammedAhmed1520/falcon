<div class="container-fluid">
    {{Form::open([
        'method'=>'put',
        'route'=>['updateCertificate',$certificate->id]
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">
                    <div class="col-md-5">
                        <table class="table table-bordered table-hover">
                            <tbody>
                            <tr>
                                <th width="150"><b>{{__('certificate.id')}}</b></th>
                                <td><span>{{$certificate->id}}</span></td>
                            </tr>
                            <tr>
                                <th>{{__('certificate.status')}}</th>
                                <td>
                                    <select name="status_id" class="form-control">
                                        @foreach($status as $st)
                                            <option value="{{$st->id}}"
                                                    @if($st->id == $certificate->status->id ?? null) selected @endif>{{$st->title}}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="admin_reason" class="form-control mt-2"
                                           @if($certificate->status->id == 15) style="display: block"
                                           @else  style="display: none"
                                           @endif
                                           value="{{$certificate->admin_reason}}"
                                           placeholder="{{__('certificate.reason')}}">
                                </td>
                            </tr>
                            <tr>
                                <th>{{__('certificate.company_name')}}</th>
                                <td>{{$certificate->company_name}}</td>
                            </tr>
                            <tr>
                                <th>{{__('certificate.civil_ssn')}}</th>
                                <td>{{$certificate->civil_ssn}}</td>
                            </tr>
                            <tr>
                                <th>{{__('certificate.application_reason')}}</th>
                                @if(app()->getLocale() == 'ar')
                                    <td>{{$certificate->reason->name_ar ?? null}}</td>
                                @else
                                    <td>{{$certificate->reason->name_en ?? null}}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>{{__('certificate.request_party')}}</th>
                                @if(app()->getLocale() == 'ar')
                                    <td>{{$certificate->party->name_ar ?? null}}</td>
                                @else
                                    <td>{{$certificate->party->name_en ?? null}}</td>
                                @endif
                            </tr>
                            <tr>
                                <th>{{__('certificate.mobile')}}</th>
                                <td>{{$certificate->mobile}}</td>
                            </tr>
                            <tr>
                                <th>{{__('certificate.created_at')}}</th>
                                <td>{{$certificate->created_at}}</td>
                            </tr>
                            <tr>
                                <th>{{__('certificate.number')}}</th>
                                <td>
                                    <input type="text" name="certificate_no" class="form-control"
                                           value="{{$certificate->certificate_no}}"
                                           placeholder="{{__('certificate.number')}}">
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-5">
                        <table class="table table-bordered table-hover">
                            <tbody>
                            <tr>
                                <th width="150">{{__('certificate.owner_name')}}</th>
                                <td>{{$certificate->owner_name}}</td>
                            </tr>
                            <tr>
                                <th>{{__('certificate.email')}}</th>
                                <td>{{$certificate->email}}</td>
                            </tr>
                            <tr>
                                <th>{{__('certificate.reason_desc')}}</th>
                                <td>{{$certificate->reason_desc}}</td>
                            </tr>
                            <tr>
                                <th>{{__('certificate.request_party_name')}}</th>
                                <td>{{$certificate->request_party_name}}</td>
                            </tr>
                            <tr>
                                <th>{{__('certificate.phone')}}</th>
                                <td>{{$certificate->phone}}</td>
                            </tr>
                            <tr>
                                <th>{{__('certificate.license_number')}}</th>
                                <td>{{$certificate->license_number}}</td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered table-hover">
                            <tbody>
                            @foreach($certificate->file_detail as $file)
                                <tr>
                                    <th width="250">{{__('certificate.'.$file->name)}}</th>
                                    <td>
                                        @if($file->file)
                                            <a href="{{$file->file ?? null}}"
                                               download="">
                                                <i class="la la-download"></i>
                                                {{__('tenders.download')}}
                                            </a>
                                            |
                                            <a href="{{$file->file ?? null}}" target="_blank">
                                                <i class="la la-eye"></i>
                                                {{__('tenders.view')}}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <input type="checkbox" id="extend_expire_date" name="extend_expire_date" value="1">
                        <label for="extend_expire_date">{{__('certificate.extend_expire_date')}}</label>
                        <div class="text-center">
                            <button class="btn btn-primary">
                                {{__('tenders.edit')}}
                            </button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    {{Form::close()}}
</div>

