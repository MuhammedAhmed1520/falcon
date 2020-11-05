@extends('frontsite.layouts.master_agent_layout')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-5">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-2">
                                <img src="{{asset('assets/images/logo.png')}}" width="40" alt="">
                            </div>
                            <div class="col-md-10 text-right">
                                <ul class="list-unstyled">
                                    <li class="list-inline-item">
                                        |
                                        <a href="{{route('reset_password-office-agent')}}" class="font-weight-bold">
                                            تغيير كلمة المرور
                                            <i class="icon icon-lock"></i>
                                        </a>
                                    </li>
{{--                                    <li class="list-inline-item">--}}
{{--                                        |--}}
{{--                                        <a href="{{route('update-profile-info-office-agent')}}"--}}
{{--                                           class="font-weight-bold">--}}
{{--                                            تغيير بيانات شخصية--}}
{{--                                            <i class="icon icon-user"></i>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                    <li class="list-inline-item">
                                        |
                                        <a href="{{route('logoutOfficeAgent')}}" class="font-weight-bold">
                                            تسجيل الخروج
                                            <i class="icon icon-log-out"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{Form::open([
                            'method'=>'post',
                            'route'=>'handle_reset_password-office-agent'
                        ])}}
                        <div class="row mb-4">
                            <div class="col-md-7 mt-2">
                                <label class="font-weight-bold"> كلمة السر القديمة</label>
                                <input type="password" class="form-control" name="old_password"
                                       placeholder=" كلمة السر القديمة  ">
                                <div class="text-left text-danger">{{$errors->first('old_password')}}</div>
                            </div>
                            <div class="col-md-7 mt-2">
                                <label class="font-weight-bold"> كلمة السر الجديدة</label>
                                <input type="password" class="form-control" name="password"
                                       placeholder=" كلمة السر الجديدة  ">
                                <div class="text-left text-danger">{{$errors->first('password')}}</div>
                            </div>
                            <div class="col-md-7 mt-2">
                                <label class="font-weight-bold">تأكيد كلمة السر</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                       placeholder="تأكيد كلمة السر">
                            </div>
                            <div class="col-md-12 mt-5">
                                <button class="btn btn-primary">
                                    تعديل
                                </button>
                            </div>
                        </div>
                        {{Form::close()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}
    <script>
        $(document).ready(function () {

            // $('input[aria-controls="company_attachment_table"]').addClass('ui-input').attr('autofocus', true);
        });
    </script>
@endsection
