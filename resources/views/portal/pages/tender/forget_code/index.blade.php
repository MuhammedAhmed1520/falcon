@extends('portal.layouts.master')

@section('content')


    <div id="services" class="section is-gray has-title">

        <div class="container-fluid">
            <div class="row direction">
                <div class="col-md-12">
                    <div class="text-center">
                        <h2 class="font-weight-bold">{{__('portal.reset_code')}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mb-5">
            <div class="row mt-2">
                <div class="col-md-12">
                    @include('portal.pages.tender.menu')

                </div>
                <div class="col-md-12">
                    @include('portal.includes.alerts')
                </div>

                <div class="col-md-12">
                    {{Form::open([
                        'route'=>'handleTenderResetCodeByMailPortal',
                        'method'=>'post',

                    ])}}
                    <div class="row direction">
                        <div class="col-md-5">
                            <input type="email" name="email" class="ui-input has-text-weight-bold has-text-info"
                                   placeholder="{{__('portal.email')}}" required="" value="" autocomplete="off">
                        </div>

                        @if(getConfig('LARAVEL_CAPATCHA'))
                            <div class="col-md-12 mt-2" style="padding: 15px">
                                <div class="columns is-multiline">
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
                                       value="{{__('portal.create')}}">
                            @else
                                <input type="submit" class="btn btn-danger" value="{{__('portal.create')}}">
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
