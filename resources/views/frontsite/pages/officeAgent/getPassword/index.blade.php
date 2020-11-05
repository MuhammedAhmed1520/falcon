@extends('frontsite.layouts.master_agent_layout')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
    <style>
        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background: #f5f5f5 !important;
            min-height: 100vh;
        }
    </style>
@endsection
@section('content')

    {{--    <form class="form-signin text-center">--}}
    <div class="text-center w-100">
        {{Form::open([
            'method'=>'post',
            'class'=>'form-signin text-center',
            'route'=>'handleGetPasswordRequest-office-agent'
        ])}}
        <img class="mb-4" src="{{asset('assets/images/logo.png')}}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal"> طلب كلمة السر</h1>
        <label for="inputEmail" class="sr-only">اسم المستخدم</label>
        <input type="text" name="user_name" class="form-control" placeholder="اسم المستخدم" value="{{old('user_name')}}"
               required autofocus>
        <div class="text-left text-danger">{{$errors->first('user_name') ?? ''}}</div>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit"> ارسال</button>
        {{Form::close()}}
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
