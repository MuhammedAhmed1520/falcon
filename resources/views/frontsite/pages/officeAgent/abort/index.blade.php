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
        <div class='form-signin text-center'>

        </div>
        <img class="mb-4" src="{{asset('assets/images/logo.png')}}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-bold">ﻻ يمكن الدخول الى هذه الصفحة اﻻ بعد دفع الرسوم الخاصة بكراسة الشروط

            @if($link ?? '')
                <br>
               <h3> <a href="{{$link}}">
                       اضغط هنا للدفع
                   </a>
               </h3>
        </h1>
        @endif
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
