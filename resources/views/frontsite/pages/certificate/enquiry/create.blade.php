@extends('frontsite.layouts.master')
@section('styles')

    {{Html::style('assets/css/font-fileuploader.css')}}
    {{Html::style('assets/css/jquery.fileuploader.min.css')}}
    <style>
        .notification {
            padding: 7px;
            margin: 10px;
        }

        h4 {
            font-size: 20px;
        }

        .is-warning {
            background-color: #909090 !important;
            color: #FFF !important;
        }

        star {
            color: red;
        }
        .fileuploader-input .fileuploader-input-button, .fileuploader-popup .fileuploader-popup-content .fileuploader-popup-button.button-success {
            background: linear-gradient(135deg, #3a7bd5 0, #3a7bd5 100%);
        }
    </style>
@endsection
@section('content')
    <div id="services" class="section is-gray has-title">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        <!--<span class="section-title">الشهادات</span>-->
                        <!--<h5 class="small-headline">نظام الشهادات</h5>-->
                        <h3>تقديم طلب استخراج شهادة بعدم وجود مخالفات بيئية</h3>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12" style="font-size: 20px;">
                    @include('frontsite.includes.alerts')
                </div>
                <div class="column is-12-desktop">
                    @include('frontsite.pages.certificate.menu')
                </div>

                <div class="column is-12-desktop is-12-tablet">
                    {{Form::open([
                        'method'=>'post',
                        'route'=>'post-certificate',
                        'enctype'=>'multipart/form-data'
                    ])}}

                    <div class="columns">
                        <div class="column">
                            <input type="text" name="company_name" class="ui-input" placeholder="اسم الشركة:*"
                                   required=""
                                   value="{{old('company_name')}}"
                                   autocomplete="off">
                            @if($errors->has('company_name'))
                                <span class="tag color-red">{{$errors->first('company_name')}}</span>
                            @endif
                        </div>
                        <div class="column">
                            <input type="text" name="owner_name" class="ui-input" placeholder="اسم المالك :*"
                                   value="{{old('owner_name')}}"
                                   autocomplete="off">
                            @if($errors->has('owner_name'))
                                <span class="tag color-red">{{$errors->first('owner_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <input type="text" name="license_number" class="ui-input"
                                   placeholder=" رقم الترخيص :*"
                                   required=""
                                   value="{{old('license_number')}}"
                                   autocomplete="off">
                            @if($errors->has('license_number'))
                                <span class="tag color-red">{{$errors->first('license_number')}}</span>
                            @endif
                        </div>
                        <div class="column">
                            <input type="text" name="civil_ssn" class="ui-input arabicnumber"
                                   placeholder=" الرقم المدني :*"
                                   required=""
                                   value="{{old('civil_ssn')}}"
                                   autocomplete="off">
                            @if($errors->has('civil_ssn'))
                                <span class="tag color-red">{{$errors->first('civil_ssn')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <input type="email" name="email" class="ui-input" placeholder="البريد الالكتروني:*"
                                   required=""
                                   value="{{old('email')}}"
                                   autocomplete="off">
                            @if($errors->has('email'))
                                <span class="tag color-red">{{$errors->first('email')}}</span>
                            @endif
                            @if($errors->has('c_email_text'))
                                <span class="tag color-red">{{__('certificate.'.$errors->first('c_email_text'))}}</span>
                            @endif

                        </div>
                        <div class="column">
                            <input type="email" name="c_email" class="ui-input" placeholder="تأكيد البريد الالكتروني:*"
                                   required=""
                                   value="{{old('c_email')}}"
                                   autocomplete="off">
                            @if($errors->has('c_email'))
                                <span class="tag color-red">{{$errors->first('c_email')}}</span>
                            @endif
                            @if($errors->has('c_email_text'))
                                <span class="tag color-red">{{__('certificate.'.$errors->first('c_email_text'))}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <input type="text" name="mobile" class="ui-input" placeholder="رقم الهاتف النقال :*"
                                   required=""
                                   value="{{old('mobile')}}"
                                   autocomplete="off">
                            @if($errors->has('mobile'))
                                <span class="tag color-red">{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                        <div class="column">
                            <input type="tel" name="phone" class="ui-input arabicnumber" placeholder="رقم الهاتف :*"
                                   required=""
                                   value="{{old('phone')}}"
                                   autocomplete="off">
                            @if($errors->has('phone'))
                                <span class="tag color-red">{{$errors->first('phone')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">
                            <select name="request_party_id" class="ui-input" required="">
                                <option hidden>الجهة الطالبة</option>
                                @foreach($party as $item)
                                        <option value="{{$item->id}}">{{$item->name_ar}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('request_party_id'))
                                <span class="tag color-red">{{$errors->first('request_party_id')}}</span>
                            @endif
                        </div>
                        <div class="column">
                            <input type="text" name="request_party_name" class="ui-input arabicnumber" placeholder="اسم الجهة :*"
                                   required=""
                                   value="{{old('request_party_name')}}"
                                   autocomplete="off">
                            @if($errors->has('request_party_name'))
                                <span class="tag color-red">{{$errors->first('request_party_name')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">
                            <select name="reason_id" id="reason_id" class="ui-input" required="">
                                <option hidden>سبب التقديم</option>
                                @foreach($reason as $item)
                                    <option value="{{$item->id}}">{{$item->name_ar}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('reason_id'))
                                <span class="tag color-red">{{$errors->first('reason_id')}}</span>
                            @endif
                        </div>

                    </div>
                    <div class="columns">
                        <div class="column reason" >
                            <textarea name="reason_desc"
                                      placeholder="السبب :*"
                                      class="ui-input arabicnumber"
                                      value="{{old('reason_desc')}}"></textarea>
                            @if($errors->has('reason_desc'))
                                <span class="tag color-red">{{$errors->first('reason_desc')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="columns is-multiline">
                        <div class="column">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="offset-3 col-md-6">
                                            <div class="shadow-lg p-3 ">
                                                <h4>
                                                    <b>{{__('certificate.license_file')}}
                                                        <star>*</star>
                                                    </b>
                                                </h4>
                                                @if($errors->has('license_file'))
                                                    <span class="has-text-danger">({{$errors->first('license_file')}})</span>
                                                @endif
                                                <br>
                                                <input type="file" name="license_file">
                                                <br><br>
                                            </div>
                                        </div>
                                        <div class="offset-3 col-md-6">
                                            <div class="shadow-lg p-3 ">
                                                <h4>
                                                    <b>{{__('certificate.signature_file')}}
                                                        <star>*</star>
                                                    </b>
                                                </h4>
                                                @if($errors->has('signature_file'))
                                                    <span class="has-text-danger">({{$errors->first('signature_file')}})</span>
                                                @endif
                                                <br>
                                                <input type="file" name="signature_file">
                                                <br><br>
                                            </div>
                                        </div>
                                        <div class="offset-3 col-md-6">
                                            <div class="shadow-lg p-3 ">
                                                <h4>
                                                    <b>{{__('certificate.civil_ssn_file')}}
                                                        <star>*</star>
                                                    </b>
                                                </h4>
                                                @if($errors->has('civil_ssn_file'))
                                                    <span class="has-text-danger">({{$errors->first('civil_ssn_file')}})</span>
                                                @endif
                                                <br>
                                                <input type="file" name="civil_ssn_file">
                                                <br><br>
                                            </div>
                                        </div>
                                        <div class="offset-3 col-md-6">
                                            <div class="shadow-lg p-3 ">
                                                <h4>
                                                    <b>{{__('certificate.other_file')}}
                                                        <star>*</star>
                                                    </b>
                                                </h4>
                                                @if($errors->has('other_file'))
                                                    <span class="has-text-danger">({{$errors->first('other_file')}})</span>
                                                @endif
                                                <br>
                                                <input type="file" name="other_file">
                                                <br><br>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
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

                    <div class="columns is-multiline">
                        <div class="column has-text-centered">
                            @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                                <input type="submit" id="s_btn" class="btn is-disabled" disabled
                                       value="انشاء">
                            @else
                                <input type="submit" class="btn" value="انشاء">
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
    {{Html::script('assets/js/jquery.fileuploader.min.js')}}

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

            $('input[type="file"]').fileuploader({
                addMore: false,
                limit: 1,
                // extensions: ['jpg', 'jpeg', 'png', 'pdf'],
                inputNameBrackets: true
            });

            $('.reason').hide();
            $('#reason_id').change(function () {
                let reason_id = $(this).val();
                console.log(reason_id);
                if (reason_id == 2) {
                    $('.reason').show();
                } else {
                    $('.reason').hide();
                }

            });
        });
    </script>
@endsection