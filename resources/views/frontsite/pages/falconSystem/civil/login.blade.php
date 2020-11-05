@extends('frontsite.layouts.master')

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
                        'route'=>'falcon-handle-civil-login',
                        'id'=>'form'
                    ])}}

                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <div class="has-text-centered">
                                                <h3 class="has-text-weight-bold">تسجيل الدخول كمالك للصقر</h3>
                                                <img src="{{asset('assets/images/falcon.png')}}" width="80"
                                                     alt="">
                                            </div>

                                        </div>
                                        <div class="columns centered">
                                            <div class="column is-3-desktop"></div>
                                            <div class="column is-12 is-6-desktop">
                                                <label for="P_O_MAIL">البريد الالكتروني</label>
                                                <input type="text" name="P_O_MAIL" class="ui-input"
                                                       value="{{old('P_O_MAIL')}}"
                                                       autocomplete="off">
                                                @if($errors->has('P_O_MAIL'))
                                                    <span class="tag color-red">{{$errors->first('P_O_MAIL')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="columns centered">
                                            <div class="column is-3-desktop"></div>
                                            <div class="column is-12 is-6-desktop">
                                                <label for="P_O_PASSWORD">كلمة المرور </label>
                                                <input type="password" name="P_O_PASSWORD" class="ui-input"
                                                       value="{{old('P_O_PASSWORD')}}"
                                                       autocomplete="off">
                                                @if($errors->has('P_O_PASSWORD'))
                                                    <span class="tag color-red">{{$errors->first('P_O_PASSWORD')}}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="columns is-multiline">
                                            <div class="column has-text-centered">
                                                <input type="submit" class="btn" value="دخول"> <br><br>
                                                <a class="has-text-weight-bold"
                                                   href="{{route('falcon-civilRegister')}}">حساب جديد</a>
                                                |
                                                <a class="has-text-weight-bold"
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
    <script>
        $(document).ready(function () {

        });
        $("#form").validate({
            rules: {
                P_O_MAIL: {
                    required: true,
                    email: true
                },
                P_O_PASSWORD: {
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
