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
                        'route'=>['handleResetPassword',request()->token],
                        'id'=>'form'
                    ])}}

                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <div class="has-text-centered">
                                                <h3 class="has-text-weight-bold">تغيير كلمة المرور</h3>
                                                <img src="{{asset('assets/images/falcon.png')}}" width="80"
                                                     alt="">
                                            </div>

                                        </div>
                                        <div class="columns centered">
                                            <div class="column is-3-desktop"></div>
                                            <div class="column is-12 is-6-desktop">
                                                <label for="password">كلمة المرور الجديد </label>
                                                <input type="password" name="password" class="ui-input"
                                                       value="{{old('password')}}"
                                                       autocomplete="off">
                                                @if($errors->has('password'))
                                                    <span class="tag color-red">{{$errors->first('password')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="columns centered">
                                            <div class="column is-3-desktop"></div>
                                            <div class="column is-12 is-6-desktop">
                                                <label for="password_confirmation">كلمة المرور الجديد </label>
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
                                                <input type="submit" class="btn" value="ارسال">
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
            <script>
                $(document).ready(function () {

                });
                $("#form").validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        }
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
