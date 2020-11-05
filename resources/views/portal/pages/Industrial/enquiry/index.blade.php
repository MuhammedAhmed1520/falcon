@extends('portal.layouts.master')

@section('content')

    <div id="services" class="section is-gray has-title">
        <div class="container-fluid">
            <div class="row direction">
                <div class="col-md-12">
                    <div class="text-left">
                        {{--                        <span class="section-title">المخالفات</span>--}}
                        {{--                        <h5 class="small-headline">نظام المخالفات</h5>--}}
                        <h3>{{__('portal.industrial')}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mb-5">
            <div class="row direction is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>

                <div class="col-md-12">

                    {{Form::open([
                        'method'=>'post',
                        'route'=>'submit-portal-industrial',
                        'id'=>'form'
                    ])}}


                    <div class="row direction person">
                        <div class="col-md-5">
                            <label class="size18">{{__('portal.ssn')}}
                                <star>*</star>
                            </label>
                            <input type="text" name="ssn" class="ui-input arabicnumber"
                                   placeholder="{{__('portal.ssn')}}"
                                   value="{{old('ssn')}}"
                                   autocomplete="off">
                            @if($errors->has('ssn'))
                                <span class="tag color-red">{{$errors->first('ssn')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row direction person">
                        <div class="col-md-5">
                            <label class="size18">{{__('portal.order_number')}}
                                <star>*</star>
                            </label>
                            <input type="text" name="req_no" class="ui-input arabicnumber"
                                   placeholder=" {{__('portal.order_number')}}"
                                   value="{{old('req_no')}}"
                                   autocomplete="off">
                            @if($errors->has('req_no'))
                                <span class="tag color-red">{{$errors->first('req_no')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row direction">
                        <div class="col-md-12">
                            <div id="html"></div>
                        </div>
                    </div>
                    <div class="row direction">
                        <div class="col-md-12">
                        </div>
                    </div>


                    @if(getConfig('LARAVEL_CAPATCHA'))
                        <div class="row direction" style="padding: 15px">
                            {{captcha_img('flat')}}
                            <div class="col-md-12" style="padding: 0;height: 46px">

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
                        <div class="row direction">
                            <div class="col-md-12">
                                <div class="g-recaptcha" data-sitekey="{{getConfig('GOOGLE_RECAPTCHA_KEY')}}"
                                     data-callback="correctCaptcha"></div>
                                @if($errors->has('g-recaptcha-response'))
                                    <span class="tag color-red">{{$errors->first('g-recaptcha-response')}}</span>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="columns">
                        <div class="column">
                            @if(session()->has('result_data'))
                                <div class="notification is-warning">
                                    {{--                                    <button class="delete"></button>--}}
                                    <h3 style="font-size: 20px">
                                        <strong>{{__('portal.ssn')}} :</strong>
                                        {{session()->get('result_data')['ssn']}}
                                        <br/>
                                        <strong>{{__('portal.order_number')}} :</strong>
                                        {{session()->get('result_data')['req_no']}}
                                    </h3>
                                    <h2 class="size18"><br>
                                        {{session()->get('result_data')['result']}}
                                    </h2>
                                </div>


                            @endif
                        </div>
                    </div>

                    <div class="row  direction is-multiline">
                        <div class="col-md-12 text-left">
                            @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                                <input type="submit" id="s_btn" class="btn btn-danger is-disabled" disabled
                                       value="{{__('portal.enquiry')}}"/>
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
        // $('#form').on('submit', function (e) {
        //     e.preventDefault()
        //     let ssn = $('input[name="ssn"]').val();
        //     let req_no = $('input[name="req_no"]').val();
        //
        //     $.ajax({
        //         type: 'GET',
        //         url: 'https://industrial.epa.org.kw:7001/soa-infra/services/default/EPA_INDUSTRIAL_REQUEST_STATUS!1.0*soa_383cb823-690f-41eb-8992-d3f07e25b567/GetRequestStatusSOAP?WSDL',
        //         data: {
        //             ssn: ssn,
        //             req_no: req_no,
        //         },
        //         success: function (data) {
        //             $('#html').html(data)
        //         },
        //         error: function (error) {
        //             $('#html').html(error)
        //         }
        //     })
        // })
        function correctCaptcha(response) {
            if (response) {
                $('#s_btn').removeClass('is-disabled');
                $('#s_btn').prop('disabled', false);
            }

        };

    </script>
@endsection
