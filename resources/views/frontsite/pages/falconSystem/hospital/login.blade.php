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
                        'route'=>'falcon-handle-hospital-login',
                        'id'=>'form'
                    ])}}

                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <div class="has-text-centered">
                                                <h3 class="has-text-weight-bold">تسجيل الدخول المستشفي </h3>
                                                <img src="{{asset('assets/images/falcon.png')}}" width="80"
                                                     alt="">
                                            </div>

                                        </div>
                                        <div class="columns centered">
                                            <div class="column is-3-desktop"></div>
                                            <div class="column is-12 is-6-desktop">
                                                <label for="email">البريد الالكتروني</label>
                                                <input type="text" name="email" class="ui-input"
                                                       value="{{old('email')}}"
                                                       autocomplete="off">
                                                @if($errors->has('email'))
                                                    <span class="tag color-red">{{$errors->first('email')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="columns centered">
                                            <div class="column is-3-desktop"></div>
                                            <div class="column is-12 is-6-desktop">
                                                <label for="password">كلمة المرور </label>
                                                <input type="password" name="password" class="ui-input"
                                                       value="{{old('password')}}"
                                                       autocomplete="off">
                                                @if($errors->has('password'))
                                                    <span class="tag color-red">{{$errors->first('password')}}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="columns is-multiline">
                                            <div class="column has-text-centered">
                                                <input type="submit" class="btn" value="دخول"> <br><br>
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
                email: {
                    required: true,
                    email: true
                },
                password: {
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
