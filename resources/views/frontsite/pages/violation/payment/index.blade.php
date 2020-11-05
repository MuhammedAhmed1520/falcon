@extends('frontsite.layouts.master')

@section('content')


    <div id="services" class="section is-gray has-title">

        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        <span class="section-title">المخالفات</span>
                        <h5 class="small-headline">نظام المخالفات</h5>
                        <h3>الاستعلام عن مخالفات الشركات والافراد والمصانع</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>
                <div class="column is-2-desktop">
                    @include('frontsite.pages.violation.menu')
                </div>

                <div class="column is-4-desktop">

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
                                <b>{{$violation->payed_at ? 'تم السداد '. $violation->payed_at : 'لم يتم سداد المخالفة'}}</b>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="column is-6-desktop">
                    @if($violation->payed_at)
                        <h3>
                            تم دفع المخالفة بالفعل
                        </h3>
                    @else
                        @if(!$violation->block && $violation->action->id == 2)
                            {{Form::open([
                                'method'=>'post',
                                'route'=> ['handleEnquiryPayViolation',$violation->id]
                            ])}}
                            <input type="hidden" name="id" value="{{$violation->id}}">
                            <input type="hidden" name="payment_type_id" value="2">
                            <div class="columns is-multiline">
                                <div class="column is-12-desktop">
                                    <input type="text" class="ui-input" name="name" autocomplete="off" required
                                           placeholder="اكتب الاسم هنا:*"
                                           value="{{old('name')}}">
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div class="column is-12-desktop">
                                    <input type="text" class="ui-input arabicnumber" name="phone" autocomplete="off"
                                           required
                                           placeholder="اكتب رقم الهاتف هنا:*"
                                           value="{{old('phone')}}">
                                    @if($errors->has('phone'))
                                        <span class="text-danger">{{$errors->first('phone')}}</span>
                                    @endif
                                </div>
                                <div class="column is-12-desktop">
                                    <input type="email" class="ui-input" name="email" autocomplete="off" required
                                           placeholder="اكتب البريد الالكتروني هنا:*"
                                           value="{{old('email')}}">
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                            </div>


                            @if(getConfig('LARAVEL_CAPATCHA'))
                                <div class="columns" style="padding: 15px">
                                    {{captcha_img('flat')}}
                                    <div class="column is-4-desktop" style="padding: 0;height: 46px">

                                        <input type="text" name="captcha" class="ui-input"
                                               placeholder="ادخل رمز التحقيق:*"
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
                                <div class="columns">
                                    <div class="column">
                                        <div class="g-recaptcha" data-sitekey="{{getConfig('GOOGLE_RECAPTCHA_KEY')}}"
                                             data-callback="correctCaptcha"></div>
                                        @if($errors->has('g-recaptcha-response'))
                                            <span class="tag color-red">{{$errors->first('g-recaptcha-response')}}</span>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <div class="columns is-multiline">
                                <div class="column has-text-centered">
                                    @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                                        <input type="submit" id="s_btn" class="btn is-disabled" disabled
                                               value="دفع">
                                    @else
                                        <input type="submit" class="btn" value="دفع">
                                    @endif
                                </div>
                            </div>

                            {{Form::close()}}
                        @else
                            <h3 class="text-danger">
                                ﻻ يمكنك دفع هذه المخالفة عبر الانترنت بالوقت الحالى , يرجي مراجعة مقر الهيئة لمزيد من
                                المعلومات
                            </h3>
                        @endif
                    @endif
                </div>
            </div>
        </div>


    </div>


@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?hl=ar"></script>
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