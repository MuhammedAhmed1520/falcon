@extends('frontsite.layouts.master')

@section('content')
    <div id="services" class="section is-gray has-title">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        <!--<span class="section-title">الشهادات</span>-->
                        <!--<h5 class="small-headline">نظام الشهادات</h5>-->
                        <h3>الاستعلام عن الطلبات السابقة</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>
                <div class="column is-12-desktop  is-12-tablet">
                    @include('frontsite.pages.certificate.menu')
                </div>
                <div class="column is-12-desktop  is-12-tablet">
                    {{Form::open([
                        'method'=>'post',
                        'route'=>'certificate-filter'
                    ])}}
                    <div class="columns">
                        <div class="column is-3-desktop"></div>
                        <div class="column is-9-desktop  is-9-tablet">
                            <b class="size18">نوع الاستعلام</b>
                            <br><br>
                            <!--<div class="radio d-inline-block pl-2">
                                <input type="radio" id="1" name="type" checked
                                       value="1">
                                <label class="size18" for="1">
                                    رقم الطلب
                                </label>
                            </div>-->
                            @if($errors->has('type'))
                                <span class="tag color-red">{{$errors->first('type')}}</span>
                            @endif


                            <div class="radio d-inline-block pl-2">
                                <input type="radio" id="2" name="type"
                                       value="2">
                                <label class="size18" for="2">
                                    رقم الترخيص
                                </label>
                            </div>
                            @if($errors->has('type'))
                                <span class="tag color-red">{{$errors->first('type')}}</span>
                            @endif


                            <div class="radio d-inline-block pl-2">
                                <input type="radio" id="3" name="type"
                                       value="3">
                                <label class="size18" for="3">
                                    الرقم المدنى للمالك
                                </label>
                            </div>
                            @if($errors->has('type'))
                                <span class="tag color-red">{{$errors->first('type')}}</span>
                            @endif
                        </div>
                    </div>


                    <div class="columns person">
                        <div class="column is-3-desktop is-3-tablet"></div>
                        <div class="column is-4-desktop is-4-tablet">
                            <input type="text" name="text" class="ui-input arabicnumber"
                                   placeholder="ابحث هنا:"
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
                        <div class="columns" style="padding: 15px">
                         <div class="column is-3-desktop"></div>

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

                            <div class="column is-3-desktop is-3-tablet"></div>
                            <div class="column is-6-desktop is-6-tablet">
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
                                       value="استعلام">
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
