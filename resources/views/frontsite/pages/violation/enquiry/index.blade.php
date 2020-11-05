@extends('frontsite.layouts.master')

@section('content')
    <div id="services" class="section is-gray has-title">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    @include('frontsite.includes.inner_violation_breadcrumb')
                </div>
                </div>
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
{{--                        <span class="section-title">المخالفات</span>--}}
{{--                        <h5 class="small-headline">نظام المخالفات</h5>--}}
                        <h3>الاستعلام عن مخالفات الشركات والافراد والمصانع</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>

                <div class="column is-3-desktop  is-3-tablet"></div>
                <div class="column is-9-desktop  is-9-tablet">

                    {{Form::open([
                        'method'=>'post',
                        'route'=>'handleViolationEnquiry'
                    ])}}
                    <div class="columns">
                        <div class="column ">
                            <b class="size19">نوع الاستعلام</b>
                            <br><br>
                            @foreach($categories as $category)
                                <div class="radio d-inline-block pl-2">
                                    <input type="radio" id="{{$category->type}}" name="category_id"
                                           value="{{$category->id}}"
                                           @if($loop->first) checked @endif >
                                    <label  class="size18" for="{{$category->type}}">
                                        {{$category->title}}
                                    </label>
                                </div>
                            @endforeach
                            @if($errors->has('category_id'))
                                <span class="tag color-red">{{$errors->first('category_id')}}</span>
                            @endif
                        </div>
                    </div>


                    <div class="columns person">
                        <div class="column is-5-desktop  is-5-tablet">
                            <input type="text" name="ssn" class="ui-input arabicnumber"
                                   placeholder="الرقم المدني للمخالف:"
                                   value="{{old('ssn')}}"
                                   autocomplete="off">
                            @if($errors->has('ssn'))
                                <span class="tag color-red">{{$errors->first('ssn')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-5-desktop is-5-tablet not_person" style="display: none">
                            <b>طريقة الاستعلام عن المخالف</b>
                            <select class="ui-input" name="type">
                                <option value="ssn">بالاستعلام عن طريق الرقم المدني</option>
                                <option value="license">بالاستعلام عن طريق رقم الترخيص</option>
                                <option value="name">بالاستعلام عن طريق باسم الشركة</option>
                            </select>
                            @if($errors->has('type'))
                                <span class="text-danger">{{$errors->first('type')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column not_person" style="display: none">
                            <b>البيان </b>
                            <br><br>
                            <input type="text" name="data" class="ui-input" placeholder="البيان:*"
                                   value="{{old('data')}}"
                                   autocomplete="off">
                            @if($errors->has('data'))
                                <span class="text-danger">{{$errors->first('data')}}</span>
                            @endif
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


                </div>
                <div class="column is-12">
                    
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
                </div>
                    {{Form::close()}}
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
