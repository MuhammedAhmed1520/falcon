@extends('portal.layouts.master')

@section('content')
    <div id="services" class="section is-gray has-title">
        <div class="container-fluid">
            <div class="row direction">
                <div class="col-md-12">
                    <div class="text-left">
                        <!--<span class="section-title">الشهادات</span>-->
                        <!--<h5 class="small-headline">نظام الشهادات</h5>-->
                        <h2 class="font-weight-bold">{{__('portal.certificates_enquiry_old_requests')}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mb-5">
            <div class="row direction">
                <div class="col-md-12">
                    @include('portal.includes.alerts')
                </div>
                <div class="col-md-12">
                    @include('portal.pages.certificate.menu')
                </div>
                <div class="col-md-12">
                    {{Form::open([
                        'method'=>'post',
                        'route'=>'certificate-portal-filter'
                    ])}}
                    <div class="row direction">
                        <div class="col-md-12">
                            <b class="size18">{{__('portal.violation_enquiry_type')}}</b>
                            <br><br>
                            <div class="radio d-inline-block pl-2">
                                <input type="radio" id="1" name="type" checked
                                       value="1">
                                <label class="size18" for="1">
                                    {{__('portal.order_number')}}
                                </label>
                            </div>
                            @if($errors->has('type'))
                                <span class="tag color-red">{{$errors->first('type')}}</span>
                            @endif


                            <div class="radio d-inline-block pl-2">
                                <input type="radio" id="2" name="type"
                                       value="2">
                                <label class="size18" for="2">
                                    {{__('portal.licence_number')}}
                                </label>
                            </div>
                            @if($errors->has('type'))
                                <span class="tag color-red">{{$errors->first('type')}}</span>
                            @endif


                            <div class="radio d-inline-block pl-2">
                                <input type="radio" id="3" name="type"
                                       value="3">
                                <label class="size18" for="3">
                                    {{__('portal.civil_id')}}
                                </label>
                            </div>
                            @if($errors->has('type'))
                                <span class="tag color-red">{{$errors->first('type')}}</span>
                            @endif
                        </div>
                    </div>


                    <div class="row direction person">
                        <div class="col-md-6">
                            <input type="text" name="text" class="ui-input arabicnumber"
                                   placeholder="{{__('portal.search')}}"
                                   value="{{old('text')}}"
                                   autocomplete="off">
                            @if($errors->has('text'))
                                <span class="tag color-red">{{$errors->first('text')}}</span>
                            @endif
                            @if($errors->has('not_found'))
                                <span class="tag color-red">{{__('certificate.'.$errors->first('not_found'))}}</span>
                            @endif
                        </div>
                    </div>

                    @if(getConfig('LARAVEL_CAPATCHA'))
                        <div class="row direction" style="padding: 15px">
                            {{captcha_img('flat')}}
                            <div class="col-md-12 mt-2" style="padding: 0;height: 46px">

                                <input type="text" name="captcha" class="ui-input" placeholder="{{__('portal.')}}"
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
                        <div class="row direction">
                            <div class="col-md-12 mt-2" >
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
                                <input type="submit" id="s_btn" class="btn btn-danger is-disabled" disabled
                                       value="{{__('portal.enquiry')}}">
                            @else
                                <input type="submit" class="btn btn-danger" value="{{__('portal.enquiry')}}">
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

        @if(old('ssn'))
        @endif
        @if(old('data') || old('type'))
        @endif
        $(document).ready(function () {

            @if($errors->has('ssn'))
            $('.not_person').hide();
            $('.person').show();
            @endif
            @if($errors->has('data'))
            $('.not_person').show();
            $('.person').hide();
            @endif
            $('input[name="category_id"]').change(function () {


                let category = $(this).val();
                if (category == 1) {
                    $('.not_person').hide();
                    $('.person').show();
                } else {
                    $('.not_person').show();
                    $('.person').hide();
                }

            });
        });
    </script>
@endsection
