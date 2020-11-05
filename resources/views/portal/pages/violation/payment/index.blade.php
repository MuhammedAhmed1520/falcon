@extends('portal.layouts.master')

@section('content')


    <div id="services" class="section">


        <div class="container-fluid mb-5">
            <div class="row direction mt-2">

                <div class="col-md-6">

                    <table class="table table-bordered" style="width: 100%">
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
                                {{--                                <b>{{$violation->subjectParagraph->subject_paragraph->subject_rule->title ?? null}}</b>--}}
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
                                <b>{{$violation->payed_at ? __('portal.paid') . $violation->payed_at : __('portal.not_paid')}}</b>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    @if($violation->payed_at)
                        <h4 class="text-success">
                            {{__('portal.already_paid')}}
                        </h4>
                    @else
                        @if(!$violation->block && $violation->action->id == 2)
                            {{Form::open([
                                'method'=>'post',
                                'route'=> ['handleEnquiryPayViolationPortal',$violation->id]
                            ])}}
                            <input type="hidden" name="id" value="{{$violation->id}}">
                            <input type="hidden" name="payment_type_id" value="2">
                            <div class="row">
                                <div class="col-md-12 mt-1">
                                    <input type="text" class="ui-input form-control" name="name" autocomplete="off"
                                           required
                                           placeholder="{{__('portal.name')}}"
                                           value="{{old('name')}}">
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-12 mt-1">
                                    <input type="text" class="ui-input  form-control arabicnumber" name="phone"
                                           autocomplete="off"
                                           required
                                           placeholder="{{__('portal.phone')}}"
                                           value="{{old('phone')}}">
                                    @if($errors->has('phone'))
                                        <span class="text-danger">{{$errors->first('phone')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-12 mt-1">
                                    <input type="email" class="ui-input form-control" name="email" autocomplete="off"
                                           required
                                           placeholder="{{__('portal.email')}}"
                                           value="{{old('email')}}">
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                            </div>


                            @if(getConfig('LARAVEL_CAPATCHA'))
                                <div class="row mt-1" style="padding: 15px">
                                    {{captcha_img('flat')}}
                                    <div class="col-md-4" style="padding: 0;height: 46px">

                                        <input type="text" name="captcha" class="ui-input"
                                               placeholder="{{__('portal.captcha')}}"
                                               required=""
                                               value="{{old('captcha')}}"
                                               autocomplete="off">
                                        @if($errors->has('captcha'))
                                            <span class="tag color-red">{{$errors->first('captcha')}}</span>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <div class="g-recaptcha" data-sitekey="{{getConfig('GOOGLE_RECAPTCHA_KEY')}}"
                                             data-callback="correctCaptcha"></div>
                                        @if($errors->has('g-recaptcha-response'))
                                            <span
                                                class="tag color-red">{{$errors->first('g-recaptcha-response')}}</span>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-12  mt-1">
                                    @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                                        <input type="submit" id="s_btn" class="btn btn-danger  is-disabled" disabled
                                               value="{{__('portal.pay')}}">
                                    @else
                                        <input type="submit" class="btn btn-danger" value="{{__('portal.pay')}}">
                                    @endif
                                </div>
                            </div>

                            {{Form::close()}}
                        @else
                            <h4 class="text-danger">
                                {{__('portal.cant_pay')}}
                            </h4>
                        @endif
                    @endif
                </div>
            </div>
        </div>


    </div>


@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?hl={{app()->getLocale()}}"></script>
    <script>

        function correctCaptcha(response) {
            console.log(response)
            if (response) {
                $('#s_btn').removeClass('is-disabled');
                $('#s_btn').prop('disabled', false);
            }

        };

    </script>
@endsection
