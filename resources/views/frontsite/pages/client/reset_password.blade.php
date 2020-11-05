@extends('frontsite.layouts.master')

@section('content')
    <div id="services" class="section is-gray has-title">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    @include('frontsite.includes.client_reset_password_breadcrumb')
                </div>
            </div>
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        <h3>اعادة تعين كلمة المرور</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>

                <div class="column is-12">

                    {{Form::open([
                        'method'=>'post',
                        'route'=>'clientResetPasswordPost',
                        'id'=>'form',
                        'files' => true

                    ])}}

                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <div>
                                                <label for="">كلمة المرور الجديد</label>
                                                <input type="password" name="password" class="ui-input"
                                                       autocomplete="off">

                                                @if($errors->has('password'))
                                                    <span class="tag color-red">{{$errors->first('password')}}</span>
                                                @endif
                                            </div>
                                            <div>

                                                <label for="">تأكيد كلمة المرور</label>
                                                <input type="password" name="password_confirmation" class="ui-input"
                                                       autocomplete="off">
                                                @if($errors->has('password_confirmation'))
                                                    <span class="tag color-red">{{$errors->first('password_confirmation')}}</span>
                                                @endif
                                            </div>

                                            <input type="hidden" name="token" class="ui-input"
                                                   autocomplete="off" value="{{$token}}">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns is-multiline">
                        <div class="column has-text-centered">
                                <input type="submit" class="btn" value="ارسال">
                        </div>
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>


    </div>

    @include('frontsite.pages.visitReserve.enquiry.modal')


@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?hl=ar"></script>
    <script>
    </script>
@endsection
@section('styles')

    <style>
        .customClass{
            font-size: 20px;
            font-weight: bold;
        }
        .modal-content{
            width: 100%;
        }
    </style>
@endsection
