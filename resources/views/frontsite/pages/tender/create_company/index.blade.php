@extends('frontsite.layouts.master')


@section('content')
    <style>

        .card-file-overlay {
            position: absolute;
            z-index: 9;
            width: 100%;
            height: 100%;
            background: #000;
            opacity: 0.5;
            cursor: pointer;
        }
    </style>

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
                </div>

                <div class="column is-10-desktop is-12-tablet">

                    {{Form::open([
                        'method'=>'post',
                        'route'=>'handleTenderRegisterCompany',
                        'enctype'=>'multipart/form-data'
                    ])}}
                    <div class="columns">
                        <div class="column">
                            <label class="size18">
                                اسم الشركة باللغة العربية
                                <star>*</star>
                            </label>
                            <input type="text" name="name" class="ui-input" placeholder="اسم الشركة باللغة العربية:*"
                                   required=""
                                   value="{{old('name')}}"
                                   autocomplete="off">
                            @if($errors->has('name'))
                                <span class="tag color-red">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="column">
                            <label class="size18">
                                اسم الشركة باللغة الانجليزية (ان وجد)
                            </label>
                            <input type="text" name="name_en" class="ui-input"
                                   placeholder="اسم الشركة باللغة الانجليزية:"
                                   value="{{old('name_en')}}"
                                   autocomplete="off">
                            @if($errors->has('name_en'))
                                <span class="tag color-red">{{$errors->first('name_en')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <label class="size18">
                                اسم صاحب الشركة
                                <star>*</star>
                            </label>
                            <input type="text" name="civil_name" class="ui-input" placeholder="اسم صاحب الشركة:*"
                                   required=""
                                   value="{{old('civil_name')}}"
                                   autocomplete="off">
                            @if($errors->has('civil_name'))
                                <span class="tag color-red">{{$errors->first('civil_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <label class="size18">
                                الرقم المدني
                                <star>*</star>
                            </label>
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
                            <label class="size18">
                                رقم الترخيص
                                <star>*</star>
                            </label>
                            <input type="text" name="licence_number" class="ui-input"
                                   placeholder=" رقم الترخيص :*"
                                   required=""
                                   value="{{old('licence_number')}}"
                                   autocomplete="off">
                            @if($errors->has('licence_number'))
                                <span class="tag color-red">{{$errors->first('licence_number')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <label class="size18">
                                البريد الالكتروني
                                <star>*</star>
                            </label>
                            <input type="email" name="email" class="ui-input" placeholder="البريد الالكتروني:*"
                                   required=""
                                   value="{{old('email')}}"
                                   autocomplete="off">
                            @if($errors->has('email'))
                                <span class="tag color-red">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <label class="size18">
                                رقم الهاتف
                                <star>*</star>
                            </label>
                            <input type="tel" name="phone" class="ui-input arabicnumber" placeholder="رقم الهاتف:*"
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
                            <b id="file_1_text" class="size18">{{__('tenders.f1')}}
                            </b>
                            <star>*</star> <br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="checkbox" name="d1_alt" value="1" id="d1_alt_check">
                                    <label for="d1_alt_check">
                                        {{app()->getLocale() == 'ar' ? ' مكتب/دار إستشاري'  : '  Office / consulting house'}}
                                    </label>
                                </div>
                            </div>
                            <input type="file" name="d1" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            @if($errors->has('d1'))
                                <br/>
                                <span class="tag color-red">({{$errors->first('d1')}})</span>
                            @endif
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <b class="size18">{{__('tenders.f2')}}
                                <star>*</star>
                            </b> <br/>
                            <input type="file" name="d2" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            @if($errors->has('d2'))
                                <br/>
                                <span class="tag color-red">({{$errors->first('d2')}})</span>
                            @endif
                        </div>
                    </div>
                    <div class="columns" >
                        <div class="column" >
                            <b class="size18">{{__('tenders.f3')}}
                                <star>*</star>
                            </b> <br/>
                            <input type="file" name="d3" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            @if($errors->has('d3'))
                                <br/>
                                <span class="tag color-red">({{$errors->first('d3')}})</span>
                            @endif
                        </div>
                    </div>
                    <div class="columns"  style="position: relative">
                        <div class="card-file-overlay" style="display: none"></div>
                        <div class="column">
                            <b class="size18">{{__('tenders.f4')}}</b> <br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="checkbox" name="d4_alt" value="1" id="d4_alt_check">
                                    <label for="d4_alt_check">
                                        {{app()->getLocale() == 'ar' ? 'الغاء عقد التأسيس وعدم استبداله بشئ'  : 'Cancellation of the founding contract and not being replaced by anything'}}
                                    </label>
                                </div>
                            </div>
                            <input type="file" name="d4" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            @if($errors->has('d4'))
                                <br/>
                                <span class="tag color-red">({{$errors->first('d4')}})</span>
                            @endif
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <b class="size18">{{__('tenders.f5')}}
                                <star>*</star>
                            </b> <br/>
                            <input type="file" name="d5" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            @if($errors->has('d5'))
                                <br/>
                                <span class="tag color-red">({{$errors->first('d5')}})</span>
                            @endif
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <b class="size18">{{__('tenders.f6')}}
                                <star>*</star>
                            </b> <br/>
                            <input type="file" name="d6" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            @if($errors->has('d6'))
                                <br/>
                                <span class="tag color-red">({{$errors->first('d6')}})</span>
                            @endif
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column">
                            <b class="size18">{{__('tenders.f7')}}
                                <star>*</star>
                            </b> <br/>
                            <input type="file" name="d7" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            @if($errors->has('d7'))
                                <br/>
                                <span class="tag color-red">({{$errors->first('d7')}})</span>
                            @endif
                        </div>
                    </div>


                    @if(getConfig('LARAVEL_CAPATCHA'))
                        <div class="columns" style="padding: 15px">
                            {{captcha_img('flat')}}
                            <div class="column is-2-desktop" style="padding: 0;height: 46px">

                                <input type="text" name="captcha" class="ui-input" placeholder="ادخل رمز التحقيق:*"
                                       required=""
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

    {{Html::style('assets/css/font-fileuploader.css')}}
    {{Html::style('assets/css/jquery.fileuploader.min.css')}}
    {{Html::script('assets/js/jquery.fileuploader.min.js')}}
    <style>
        .fileuploader-input .fileuploader-input-button, .fileuploader-popup .fileuploader-popup-content .fileuploader-popup-button.button-success {
            background: linear-gradient(135deg, #3a7bd5 0, #3a7bd5 100%);
        }

        .fileuploader-input .fileuploader-input-caption {
            color: #111;
        }

        star {
            color: red;
        }

        .size18 {
            font-size: 17px;
            font-weight: bold;
        }
    </style>


    <script src="https://www.google.com/recaptcha/api.js?hl=ar"></script>
    <script>

        $(document).ready(function () {
            $('input[type="file"]').fileuploader({
                addMore: false,
                limit: 1,
                extensions: ['jpg', 'jpeg', 'png', 'pdf'],
                inputNameBrackets: true,
                captions: {
                    button: function (options) {
                        return 'اختر ' + (options.limit == 1 ? 'ملف' : 'ملفات');
                    },
                    feedback: function (options) {
                        return 'اختر ' + (options.limit == 1 ? 'ملف' : 'ملفات') + ' للرفع';
                    }
                }
            });
        });

        function correctCaptcha(response) {
            console.log(response)
            if (response) {
                $('#s_btn').removeClass('is-disabled');
                $('#s_btn').prop('disabled', false);
            }

        };

        $('#d1_alt_check').click(function () {
            if ($(this).is(':checked')) {
                $('#file_1_text').text("{{__('tenders.f1_alt')}}")
            } else {
                $('#file_1_text').text("{{__('tenders.f1')}}")
            }
        });

        $('#d4_alt_check').click(function () {
            if ($(this).is(':checked')) {
                $('.card-file-overlay').show()
            } else {
                $('.card-file-overlay').hide()
            }
        });

        $('.card-file-overlay').click(function () {
            $('#d4_alt_check').trigger('click')
        });
    </script>
@endsection
