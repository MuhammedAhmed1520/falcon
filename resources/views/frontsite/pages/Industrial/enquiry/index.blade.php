@extends('frontsite.layouts.master')

@section('content')
    <div id="services" class="section is-gray has-title">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    @include('frontsite.includes.inner_Industrial_breadcrumb')
                </div>
            </div>
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        {{--                        <span class="section-title">المخالفات</span>--}}
                        {{--                        <h5 class="small-headline">نظام المخالفات</h5>--}}
                        <h3>الاستعلام عن الاجراءات الصناعية</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>

                <div class="column is-3"></div>
                <div class="column is-6">

                    {{Form::open([
                        'method'=>'post',
                        'route'=>'submit-industrial',
                        'id'=>'form'
                    ])}}


                    <div class="columns person">
                        <div class="column is-12-desktop ">
                            <label class="size18">الرقم المدني
                                <star>*</star>
                            </label>
                            <input type="text" name="ssn" class="ui-input arabicnumber"
                                   placeholder="الرقم المدني  :"
                                   value="{{old('ssn')}}"
                                   autocomplete="off">
                            @if($errors->has('ssn'))
                                <span class="tag color-red">{{$errors->first('ssn')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="columns person">
                        <div class="column is-12-desktop ">
                            <label class="size18">رقم الطلب
                                <star>*</star>
                            </label>
                            <input type="text" name="req_no" class="ui-input arabicnumber"
                                   placeholder=" رقم الطلب    :"
                                   value="{{old('req_no')}}"
                                   autocomplete="off">
                            @if($errors->has('req_no'))
                                <span class="tag color-red">{{$errors->first('req_no')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <div id="html"></div>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                        </div>
                    </div>


                    @if(getConfig('LARAVEL_CAPATCHA'))
                        <div class="columns" style="padding: 15px">
                            {{captcha_img('flat')}}
                            <div class="column is-2-desktop" style="padding: 0;height: 46px">

                                <input type="text" name="captcha" class="ui-input" placeholder="ادخل رمز التحقيق:*"
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

                    <div class="columns">
                        <div class="column">
                            @if(session()->has('result_data'))
                                <div class="notification is-warning">
{{--                                    <button class="delete"></button>--}}
                                    <h3 style="font-size: 20px">
                                        <strong>الرقم المدني:</strong>
                                        {{session()->get('result_data')['ssn']}}
                                        <br/>
                                        <strong>رقم الطلب  :</strong>
                                        {{session()->get('result_data')['req_no']}}
                                    </h3>
                                    <h2 class="size18"><br>
                                        {{session()->get('result_data')['result']}}
                                    </h2>
                                </div>


                            @endif
                        </div>
                    </div>

                    <div class="columns is-multiline">
                        <div class="column has-text-centered">
                                                        @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                                                            <input type="submit" id="s_btn" class="btn is-disabled" disabled
                                                                   value="استعلام"/>
                                                        @else
                            <input type="submit" class="btn" value="استعلام">
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
