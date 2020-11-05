<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            @if(!$violation->payed_at)
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="true">{{__('violation.offline')}}</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                       aria-controls="nav-profile" aria-selected="false">{{__('violation.online')}} </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active pt-2" id="nav-home" role="tabpanel"
                     aria-labelledby="nav-home-tab">
                    {{Form::open([
                    'method'=>'post',
                    'route'=>'handleViolationPayment'
                    ])}}
                    <div class="row">
                        <div class="col-md-12">
                            @if($violation->block || $violation->action->id != 2)
                                <div class="alert alert-danger" role="alert">
                                    {{__('violation.payment_no')}} <a
                                            href="{{route('editViolation',['id'=>$violation->id])}}"
                                            class="alert-link">{{__('violation.update')}}</a>
                                    {{$violation->block ? 'BLOCK !!': ''}}
                                    | {{$violation->action->id  != 2 ? $violation->action->title : ''}}
                                </div>
                            @endif
                        </div>
                        <input type="hidden" name="id" value="{{$violation->id}}">
                        <input type="hidden" name="payment_type_id" value="1">
                        <div class="col-md-6">
                            <b>{{__('violation.name')}}
                                <star>*</star>
                            </b>
                            <span class="input input--isao">
                                <input class="input__field input__field--isao" type="text" name="name"
                                       autocomplete="off" value="">
                                <label class="input__label input__label--isao">
                                    <span class="input__label-content input__label-content--isao">
                                        @if($errors->has('name'))
                                            <span class="text-danger">({{$errors->first('name')}})</span>
                                        @endif
                                    </span>
                                </label>
                            </span>
                        </div>
                        <!--<div class="col-md-4">-->
                        <!--    <b>{{__('violation.phone')}}-->
                        <!--        <star>*</star>-->
                        <!--    </b>-->
                        <!--    <span class="input input--isao">-->
                        <!--        <input class="input__field input__field--isao arabicnumber" type="text" name="phone"-->
                        <!--               autocomplete="off" value="">-->
                        <!--        <label class="input__label input__label--isao">-->
                        <!--            <span class="input__label-content input__label-content--isao">-->
                        <!--                @if($errors->has('phone'))-->
                        <!--                    <span class="text-danger">({{$errors->first('phone')}})</span>-->
                        <!--                @endif-->
                        <!--            </span>-->
                        <!--        </label>-->
                        <!--    </span>-->
                        <!--</div>-->
                        <!--<div class="col-md-4">-->
                        <!--    <b>{{__('violation.email')}}-->
                        <!--        <star>*</star>-->
                        <!--    </b>-->
                        <!--    <span class="input input--isao">-->
                        <!--        <input class="input__field input__field--isao" type="text" name="email"-->
                        <!--               autocomplete="off" value="">-->
                        <!--        <label class="input__label input__label--isao">-->
                        <!--            <span class="input__label-content input__label-content--isao">-->
                        <!--                @if($errors->has('email'))-->
                        <!--                    <span class="text-danger">({{$errors->first('email')}})</span>-->
                        <!--                @endif-->
                        <!--            </span>-->
                        <!--        </label>-->
                        <!--    </span>-->
                        <!--</div>-->
                        <div class="col-md-12">
                            <b>{{__('violation.check_info')}}</b>
                            <span class="input input--isao">
                                <input class="input__field input__field--isao" type="text" name="check_info"
                                       autocomplete="off" value="">
                                <label class="input__label input__label--isao">
                                    <span class="input__label-content input__label-content--isao">
                                        @if($errors->has('check_info'))
                                            <span class="text-danger">({{$errors->first('check_info')}})</span>
                                        @endif
                                    </span>
                                </label>
                            </span>
                        </div>
                        <div class="text-center col-md-12">
                            @if(!$violation->block && $violation->action->id == 2)
                                <button class="btn btn-primary {{$violation->payed_at ? 'disabled btn-danger' : ''}}"
                                        @if($violation->payed_at) disabled="" @endif>
                                    {{__('violation.pay')}}
                                </button>
                            @endif
                        </div>

                    </div>
                    {{Form::close()}}
                </div>
                <div class="tab-pane fade pt-2" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    {{Form::open([
                    'method'=>'post',
                    'route'=>'handleViolationPayment'
                    ])}}
                    <div class="row">
                        <div class="col-md-12">
                            @if($violation->block || $violation->action->id != 2)
                                <div class="alert alert-danger" role="alert">
                                    {{__('violation.payment_no')}} <a
                                            href="{{route('editViolation',['id'=>$violation->id])}}"
                                            class="alert-link">{{__('violation.update')}}</a>
                                    {{$violation->block ? 'BLOCK !!': ''}}
                                    | {{$violation->action->id  != 2 ? $violation->action->title : ''}}
                                </div>
                            @endif
                        </div>
                        <input type="hidden" name="id" value="{{$violation->id}}">
                        <input type="hidden" name="payment_type_id" value="2">
                        <div class="col-md-4">
                            <b>{{__('violation.name')}}
                                <star>*</star>
                            </b>
                            <span class="input input--isao">
                                <input class="input__field input__field--isao" type="text" name="name"
                                       autocomplete="off" value="">
                                <label class="input__label input__label--isao">
                                    <span class="input__label-content input__label-content--isao">
                                        @if($errors->has('name'))
                                            <span class="text-danger">({{$errors->first('name')}})</span>
                                        @endif
                                    </span>
                                </label>
                            </span>
                        </div>
                        <div class="col-md-4">
                            <b>{{__('violation.phone')}}
                                <star>*</star>
                            </b>
                            <span class="input input--isao">
                                <input class="input__field input__field--isao arabicnumber" type="text" name="phone"
                                       autocomplete="off" value="">
                                <label class="input__label input__label--isao">
                                    <span class="input__label-content input__label-content--isao">
                                        @if($errors->has('phone'))
                                            <span class="text-danger">({{$errors->first('phone')}})</span>
                                        @endif
                                    </span>
                                </label>
                            </span>
                        </div>
                        <div class="col-md-4">
                            <b>{{__('violation.email')}}
                                <star>*</star>
                            </b>
                            <span class="input input--isao">
                                <input class="input__field input__field--isao" type="text" name="email"
                                       autocomplete="off" value="">
                                <label class="input__label input__label--isao">
                                    <span class="input__label-content input__label-content--isao">
                                        @if($errors->has('email'))
                                            <span class="text-danger">({{$errors->first('email')}})</span>
                                        @endif
                                    </span>
                                </label>
                            </span>
                        </div>
                        <div class="col-md-4">
                            <b>{{__('tenders.tender_sms_email')}}</b>
                            <input type="checkbox" name="sms_email" data-off="{{__('tenders.off')}}"
                                   data-on="{{__('tenders.on')}}" data-toggle="toggle"
                                   data-onstyle="outline-primary" data-style="ios"
                                   data-size="sm"
                                   data-offstyle="outline-secondary">
                        </div>
                        <div class="text-center col-md-12">
                            @if(!$violation->block && $violation->action->id == 2)
                                <button class="btn btn-primary {{$violation->payed_at ? 'disabled btn-danger' : ''}}"
                                        @if($violation->payed_at) disabled="" @endif>
                                    {{__('violation.send_pay')}}
                                </button>
                            @endif
                        </div>

                    </div>
                    {{Form::close()}}
                </div>

            </div>
            @else
            <div class="alert alert-primary" role="alert">
              <h4>{{app()->getLocale() == 'ar' ? 'تم سداد المخالفة' : 'Violation Paid Success'}}</h4>
            </div>
            @endif
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-2">
                    <img src="{{asset('assets/images/logo.png')}}" class="position-relative"
                         style="width: 100%;top: 4px"
                         alt="">
                </div>
                <div class="col-10">
                    <h3>
                        <strong>
                            {{__('sidebar.epa_system')}}
                            <br>
                            <span class="text-black-50">{{__('sidebar.payment')}}</span>
                        </strong>
                    </h3>
                </div>
                <div class="col-md-12 mt-3">

                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <b>{{__('violation.id')}}</b>
                            </td>
                            <td width="65%" style="overflow: hidden">
                                <b>{{$violation->id}}</b>
                                {{--@if($violation->payment->knet_data ?? null)--}}
                                <button class="btn btn-warning btn-sm float-right"
                                        onclick="report('{{$violation->id}}')">
                                    <i class="la la-file"></i>
                                </button>
                                {{--@endif--}}
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
                                <b>{{__('violation.violation_type')}}</b>
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
</div>
