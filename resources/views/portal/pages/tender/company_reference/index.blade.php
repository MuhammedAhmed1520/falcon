@extends('portal.layouts.master')

@section('content')


    <div id="services" class="section is-gray has-title">

        <div class="container-fluid">
            <div class="row direction">
                <div class="col-md-12">
                    <div class="text-center">
                        {{--                        <span class="section-title">الممارسات</span>--}}
                        {{--                        <h5 class="small-headline">نظام الممارسات</h5>--}}
                        <h2 class="font-weight-bold">{{__('portal.tender_register_company')}} ({{request()->type}})</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mb-5">
            <div class="row direction mt-2">
                <div class="col-md-12">
                    @include('portal.pages.tender.menu')

                </div>
                <div class="col-md-12">
                    @include('portal.includes.alerts')
                </div>


                <div class="col-md-12">
                    {{Form::open([
                        'method'=>'post',
                        'route'=>['handleTenderCompanyEnquiryPortal',request()->type]
                    ])}}
                    <div class="row direction">
                        <div class="col-md-5">
                            <input type="text" name="reference_code" class="ui-input has-text-weight-bold has-text-info"
                                   placeholder="{{__('portal.code')}}"
                                   required=""
                                   value="{{old('reference_code')}}"
                                   autocomplete="off">
                            @if($errors->has('reference_code'))
                                <span class="tag color-red">{{$errors->first('reference_code')}}</span>
                            @endif
                        </div>

                        @if(getConfig('LARAVEL_CAPATCHA'))
                            <div class="row direction" style="padding: 15px">
                                <div class="col-md-12 mt-2">
                                    {{captcha_img('flat')}}
                                    <div class="column is-2-desktop" style="padding: 0;height: 46px">

                                        <input type="text" name="captcha" class="ui-input"
                                               placeholder="{{__('portal.captcha')}}"
                                               required=""
                                               autocomplete="off">
                                        @if($errors->has('captcha'))
                                            <span class="tag color-red">{{$errors->first('captcha')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                            <div class="col-md-12 mt-2">
                                <div class="g-recaptcha" data-sitekey="{{getConfig('GOOGLE_RECAPTCHA_KEY')}}"
                                     data-callback="correctCaptcha"></div>
                                @if($errors->has('g-recaptcha-response'))
                                    <span class="tag color-red">{{$errors->first('g-recaptcha-response')}}</span>
                                @endif
                            </div>
                        @endif
                        <div class="col-md-12 mt-2">
                            @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                                <input type="submit" id="s_btn" class="btn btn-danger is-disabled" disabled
                                       value="{{__('portal.enquiry')}}">
                            @else
                                <input type="submit" class="btn btn-danger" value="{{$buttonTitle}}">
                            @endif
                        </div>
                    </div>
                    {{Form::close()}}
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
