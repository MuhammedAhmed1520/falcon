@extends('layouts.frontFrams')

@section('styles')
    <style>
        .skeleton-nav--center {

            display: block;
            width: auto;
            margin-right: 0;
            min-height: 100vh;
            background-color: #ccc;
            padding: 0;
        }
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container bg-white h-100">
            <div class="row">
                {{--<div class="col-md-12 d-flex">--}}
                {{--<img src="{{asset('assets/images/logo.png')}}" class="m-4" width="150" height="50px" class="bg-main"--}}
                {{--alt="">--}}
                {{--<h1 class="m-4">--}}
                {{--<b> استعلام الخدمات الالكترونية</b> <br>--}}
                {{--<span class="fa-sm">المخالفات البيئية</span>--}}
                {{--</h1>--}}
                {{--</div>--}}

                @include('pages.violation.enquiry.payment.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>

         function correctCaptcha(response) {
             console.log(response)
            if(response){
                $('#s_btn').removeClass('disabled');
                $('#s_btn').prop('disabled',false);
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