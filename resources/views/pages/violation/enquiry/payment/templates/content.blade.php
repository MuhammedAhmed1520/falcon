<div class="container-fluid" style="min-height: 100vh">
    <div class="row">
        
            <div class="col-md-12 m-5">
                <h2 class="font-weight-bold ">
                    دفع المخالفات البيئية
                </h2>
            </div>
    <div class="col-md-6 mt-3">

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
                                <b>{{__('violation.violation_type')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->subjectParagraph->subject_paragraph->subject_rule->title ?? null}}</b>
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
                                    <b>{{$violation->civilian->name ?? ''}}</b>
                                @else
                                    <b>{{$violation->company->civilian->name ?? ''}}</b>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.civil_ssn')}}</b>
                            </td>
                            <td width="65%">
                                @if($violation->category_id == 1)
                                    <b>{{$violation->civilian->ssn ?? ''}}</b>
                                @else
                                    <b>{{$violation->company->civilian->ssn ?? ''}}</b>
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
    <div class="col-md-6"> 
        @if(!$violation->block && $violation->action->id == 2)
        {{Form::open([
            'method'=>'post',
            'route'=>['handleEnquiryPayViolation',$violation->id]
        ])}}
        <div class="row mt-5">
            <input type="hidden" name="id" value="{{$violation->id}}">
            <input type="hidden" name="payment_type_id" value="2">
            <div class="col-md-8">
                <b>{{__('violation.name')}}
                    <star>*</star>
                </b>
                <span class="input input--isao">
                                    <input class="input__field input__field--isao" type="text" name="name"
                                           autocomplete="off" value="{{old('name')}}">
                                    <label class="input__label input__label--isao">
                                        <span class="input__label-content input__label-content--isao">
                                            @if($errors->has('name'))
                                                <span class="text-danger">({{$errors->first('name')}})</span>
                                            @endif
                                        </span>
                                    </label>
                                </span>
            </div>
            <div class="col-md-8">
                <b>{{__('violation.phone')}}
                    <star>*</star>
                </b>
                <span class="input input--isao">
                                    <input class="input__field input__field--isao arabicnumber" type="text" name="phone" value="{{old('phone')}}"
                                           autocomplete="off">
                                    <label class="input__label input__label--isao">
                                        <span class="input__label-content input__label-content--isao">
                                            @if($errors->has('phone'))
                                                <span class="text-danger">({{$errors->first('phone')}})</span>
                                            @endif
                                        </span>
                                    </label>
                                </span>
            </div>
            <div class="col-md-8">
                <b>{{__('violation.email')}}
                    <star>*</star>
                </b>
                <span class="input input--isao">
                                    <input class="input__field input__field--isao" type="text" name="email"
                                           autocomplete="off" value="{{old('email')}}">
                                    <label class="input__label input__label--isao">
                                        <span class="input__label-content input__label-content--isao">
                                            @if($errors->has('email'))
                                                <span class="text-danger">({{$errors->first('email')}})</span>
                                            @endif
                                        </span>
                                    </label>
                                </span>
            </div>
    
            <div class="col-md-8">
    
                @if($errors->has('check_info'))
                    <b class="text-danger">({{$errors->first('check_info')}})</b>
                @endif
                @if(session()->has('error'))
                    <b class="text-danger">({{session()->get('error')}})</b>
                @endif
                @if(session()->has('success'))
                    <b class="text-success">({{session()->get('success')}})</b>
                @endif
            </div>
     
        
        @if(env('GOOGLE_RECAPTCHA_KEY'))
            <div class="col-md-12 mt-4"> 
                <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}" data-callback="correctCaptcha"></div>
            @if($errors->has('g-recaptcha-response'))
                <span class="text-danger">{{$errors->first('g-recaptcha-response')}}</span>
            @endif
            </div>
        @endif
            <div class="col-md-12  text-center mt-5">
                <button type="submit" id="s_btn" class="btn btn-primary disabled" disabled="">
                    ادفع
                </button>
            </div>
        </div>
        {{Form::close()}}
        @else
        <h3 class="text-danger">
            ﻻ يمكنك دفع هذه المخالفة عبر الانترنت بالوقت الحالى , يرجي مراجعة مقر الهيئة لمزيد من المعلومات
            <!--ﻻ يمكنك سداد المخالفة اذا كانت المخالفة مغلقة او ان الاجراء النهائي غير حالة قبول الصلح -->
        </h4>
        @endif
    </div>
    </div>
</div>