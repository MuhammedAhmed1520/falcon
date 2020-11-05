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

                @include('pages.violation.enquiry.enquiry_view.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection