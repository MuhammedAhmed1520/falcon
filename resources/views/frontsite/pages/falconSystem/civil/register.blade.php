@extends('frontsite.layouts.master')

@section('styles')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
    <div id="services" class="section is-gray has-title">
        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>

                <div class="column is-12">

                    {{Form::open([
                        'method'=>'post',
                        'route'=>'falcon-handle-civil-register',
                        'id'=>'form'
                    ])}}

                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <div class="has-text-centered">
                                                <h3 class="has-text-weight-bold"> حساب جديد كمالك للصقر</h3>
                                                <img src="{{asset('assets/images/falcon.png')}}" width="80"
                                                     alt="">
                                            </div>

                                        </div>
                                        <div class="columns centered">
                                            <div class="column is-12 is-4-desktop">
                                                <label for="P_O_CIVIL_ID">
                                                    الرقم المدني
                                                    <star>*</star>
                                                </label>
                                                <input type="text" name="P_O_CIVIL_ID" class="ui-input"
                                                       value="{{old('P_O_CIVIL_ID')}}"
                                                       autocomplete="off">
                                                @if($errors->has('P_O_CIVIL_ID'))
                                                    <span
                                                        class="tag color-red">{{$errors->first('P_O_CIVIL_ID')}}</span>
                                                @endif
                                            </div>
                                            <div class="column is-12 is-4-desktop">
                                                <label for="P_O_A_NAME"> الاسم بالعربي
                                                    <star>*</star>
                                                </label>
                                                <input type="text" name="P_O_A_NAME" class="ui-input"
                                                       value="{{old('P_O_A_NAME')}}"
                                                       autocomplete="off">
                                                @if($errors->has('P_O_A_NAME'))
                                                    <span class="tag color-red">{{$errors->first('P_O_A_NAME')}}</span>
                                                @endif
                                            </div>
                                            <div class="column is-12 is-4-desktop">
                                                <label for="P_O_ADDRESS"> العنوان
                                                    <star>*</star>
                                                </label>
                                                <input type="text" name="P_O_ADDRESS" class="ui-input"
                                                       value="{{old('P_O_ADDRESS')}}"
                                                       autocomplete="off">
                                                @if($errors->has('P_O_ADDRESS'))
                                                    <span class="tag color-red">{{$errors->first('P_O_ADDRESS')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="columns centered">
                                            <div class="column is-12 is-4-desktop">
                                                <label for="P_O_MOBILE"> المحمول / الهاتف

                                                    <star>*</star>
                                                </label>
                                                <input type="text" name="P_O_MOBILE" class="ui-input"
                                                       value="{{old('P_O_MOBILE')}}"
                                                       autocomplete="off">
                                                @if($errors->has('P_O_MOBILE'))
                                                    <span class="tag color-red">{{$errors->first('P_O_MOBILE')}}</span>
                                                @endif
                                            </div>
                                            <div class="column is-12 is-4-desktop">
                                                <label for="P_O_PASSPORT_NO">رقم الجواز لصاحب الطلب
                                                    <star>*</star>
                                                </label>
                                                <input type="text" name="P_O_PASSPORT_NO" class="ui-input"
                                                       value="{{old('P_O_PASSPORT_NO')}}"
                                                       autocomplete="off">
                                                @if($errors->has('P_O_PASSPORT_NO'))
                                                    <span
                                                        class="tag color-red">{{$errors->first('P_O_PASSPORT_NO')}}</span>
                                                @endif
                                            </div>
                                            <div class="column is-12 is-4-desktop">
                                                <label for="P_CIVIL_EXPIRY_DT"> تاريخ انتهاء البطاقة المدنية
                                                    <star>*</star>
                                                </label>
                                                <input type="text" name="P_CIVIL_EXPIRY_DT" class="ui-input date"

                                                       value="{{old('P_CIVIL_EXPIRY_DT')}}"
                                                       autocomplete="off">
                                                @if($errors->has('P_CIVIL_EXPIRY_DT'))
                                                    <span
                                                        class="tag color-red">{{$errors->first('P_CIVIL_EXPIRY_DT')}}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="columns centered">
                                            <div class="column is-12 is-4-desktop">
                                                <label for="email">البريد الالكتروني
                                                    <star>*</star>
                                                </label>
                                                <input type="text" name="email" class="ui-input"
                                                       value="{{old('email')}}"
                                                       autocomplete="off">
                                                @if($errors->has('email'))
                                                    <span class="tag color-red">{{$errors->first('email')}}</span>
                                                @endif
                                            </div>
                                            <div class="column is-12 is-4-desktop">
                                                <label for="password">كلمة المرور
                                                    <star>*</star>
                                                </label>
                                                <input type="password" name="password" class="ui-input"
                                                       value="{{old('password')}}"
                                                       autocomplete="off">
                                                @if($errors->has('password'))
                                                    <span class="tag color-red">{{$errors->first('password')}}</span>
                                                @endif
                                            </div>
                                            <div class="column is-12 is-4-desktop">
                                                <label for="password_confirmation">تأكيد كلمة المرور
                                                    <star>*</star>
                                                </label>
                                                <input type="password" name="password_confirmation"
                                                       class="ui-input"
                                                       value="{{old('password_confirmation')}}"
                                                       autocomplete="off">
                                                @if($errors->has('password_confirmation'))
                                                    <span
                                                        class="tag color-red">{{$errors->first('password_confirmation')}}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="columns is-multiline">
                                            <div class="column has-text-centered">
                                                <input type="submit" class="btn" value="تسجيل"> <br><br>
                                                <a class="has-text-weight-bold" href="{{route('falcon-civilLogin')}}">لدي
                                                    حساب بالفعل</a>
                                                | <a class="has-text-weight-bold"
                                                     href="{{route('falcon-index')}}">اعادة الاختيار </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script>
        $(document).ready(function () {

            $('.date').flatpickr({
                enableTime: false,
                minDate: 'today',
                dateFormat: "Y-m-d",
            });
        });
        $("#form").validate({
            rules: {
                P_O_CIVIL_ID: {
                    required: true,
                    number: true,
                },
                P_O_A_NAME: {
                    required: true,
                },
                P_O_ADDRESS: {
                    required: true,
                },
                P_O_MOBILE: {
                    required: true,
                    number: true,
                },
                P_O_PASSPORT_NO: {
                    required: true,
                    number: true,
                },
                P_CIVIL_EXPIRY_DT: {
                    required: true,
                    date: true,
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                },
                password_confirmation: {
                    required: true,
                },
            },
            submitHandler: function (form) {
                // some other code
                // maybe disabling submit button
                // then:
                form.submit();
            }
        });
    </script>
@endsection
@section('styles')

@endsection
