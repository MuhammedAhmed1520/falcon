@extends('frontsite.layouts.master')

@section('content')


    <div id="services" class="section is-gray has-title">

        <div class="container">
            <div class="columns">
                @include('frontsite.includes.inner_breadcrumb')
            </div>
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
{{--                        <span class="section-title">الممارسات</span>--}}
{{--                        <h5 class="small-headline">نظام الممارسات</h5>--}}
                        <h3>تسجيل الشركات والاستعلام عن الممارسات</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.pages.tender.menu')

                </div>
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>
                <div class="column is-1-desktop">
{{--                    @include('frontsite.pages.tender.menu')--}}
                </div>

                <div class="column is-10-desktop is-12-tablet">
                    {{Form::open([
                        'method'=>'post',
                        'route'=>['handleTenderCompanyEnquiry',request()->type]
                    ])}}
                    <div class="columns is-multiline">
                        <div class="column is-6-desktop">
                            <input type="text" name="reference_code" class="ui-input has-text-weight-bold has-text-info"
                                   placeholder="الرقم المرجعي:*"
                                   required=""
                                   value="{{old('reference_code')}}"
                                   autocomplete="off">
                            @if($errors->has('reference_code'))
                                <span class="tag color-red">{{$errors->first('reference_code')}}</span>
                            @endif
                        </div>

                        @if(getConfig('LARAVEL_CAPATCHA'))
                            <div class="column is-12-desktop" style="padding: 15px">
                                <div class="columns is-multiline">
                                    {{captcha_img('flat')}}
                                    <div class="column is-2-desktop" style="padding: 0;height: 46px">

                                        <input type="text" name="captcha" class="ui-input"
                                               placeholder="ادخل رمز التحقيق:*"
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
                            <div class="column is-12-desktop">
                                <div class="g-recaptcha" data-sitekey="{{getConfig('GOOGLE_RECAPTCHA_KEY')}}"
                                     data-callback="correctCaptcha"></div>
                                @if($errors->has('g-recaptcha-response'))
                                    <span class="tag color-red">{{$errors->first('g-recaptcha-response')}}</span>
                                @endif
                            </div>
                        @endif
                        <div class="column has-text-centered">
                            @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                                <input type="submit" id="s_btn" class="btn is-disabled" disabled
                                       value="استعلام">
                            @else
                                <input type="submit" class="btn" value="{{$buttonTitle}}">
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
