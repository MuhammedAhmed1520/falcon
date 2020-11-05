@extends('portal.layouts.master')


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

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        {{--                        <span class="section-title">الممارسات</span>--}}
                        {{--                        <h5 class="small-headline">نظام الممارسات</h5>--}}
                        <h2 class="font-weight-bold">{{__('portal.tender_register_company')}}</h2>
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
                        'route'=>'handleTenderRegisterCompanyPortal',
                        'enctype'=>'multipart/form-data'
                    ])}}
                    <div class="row direction">
                        <div class="col-md-6">
                            <label class="size18">
                                {{__('portal.company_name_ar')}}
                                <star>*</star>
                            </label>
                            <input type="text" name="name" class="ui-input"
                                   placeholder="{{__('portal.company_name_ar')}}"
                                   required=""
                                   value="{{old('name')}}"
                                   autocomplete="off">
                            @if($errors->has('name'))
                                <span class="tag color-red">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label class="size18">
                                {{__('portal.company_name_en')}}
                            </label>
                            <input type="text" name="name_en" class="ui-input"
                                   placeholder="{{__('portal.company_name_en')}}"
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
                                {{__('portal.company_owner_name')}}
                                <star>*</star>
                            </label>
                            <input type="text" name="civil_name" class="ui-input"
                                   placeholder="{{__('portal.company_owner_name')}}"
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
                                {{__('portal.civil_id')}}
                                <star>*</star>
                            </label>
                            <input type="text" name="civil_ssn" class="ui-input arabicnumber"
                                   placeholder="{{__('portal.civil_id')}}"
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
                                {{__('portal.licence_number')}}
                                <star>*</star>
                            </label>
                            <input type="text" name="licence_number" class="ui-input"
                                   placeholder="{{__('portal.licence_number')}}"
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
                                {{__('portal.email')}}
                                <star>*</star>
                            </label>
                            <input type="email" name="email" class="ui-input" placeholder="{{__('portal.email')}}"
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
                                {{__('portal.mobile')}}
                                <star>*</star>
                            </label>
                            <input type="tel" name="phone" class="ui-input arabicnumber"
                                   placeholder="{{__('portal.mobile')}}"
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
                            <b id="file_1_text"  class="size18">{{__('tenders.f1')}}
                            </b>
                            <star>*</star>
                            <br/>
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
                    <div class="columns">
                        <div class="column">
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

                                <input type="text" name="captcha" class="ui-input"
                                       placeholder="{{__('portal.captcha')}}"
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

    {{Html::style('assets/css/font-fileuploader.css')}}
    {{Html::style('assets/css/jquery.fileuploader.min.css')}}
    {{Html::script('assets/js/jquery.fileuploader.min.js')}}


    <script src="https://www.google.com/recaptcha/api.js?hl={{app()->getLocale()}}"></script>
    <script>

        $(document).ready(function () {
            $('input[type="file"]').fileuploader({
                addMore: false,
                limit: 1,
                extensions: ['jpg', 'jpeg', 'png', 'pdf'],
                inputNameBrackets: true,
                captions: {
                    button: function (options) {
                        return " {{__('portal.choose')}}" + (options.limit == 1 ? " {{__('portal.file')}}" : " {{__('portal.files')}}");
                    },
                    feedback: function (options) {
                        return " {{__('portal.choose')}}" + (options.limit == 1 ? " {{__('portal.file')}}" : " {{__('portal.files')}}") + " {{__('portal.to_upload')}}";
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
