@extends('layouts.adminReport')

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
                <div class="col-md-12 text-center">
                    <img src="{{asset('assets/images/logo.png')}}"  width="120" height="120" class="mt-4 pull-right float-right"
                         alt=""> 
                    <img src="{{asset('assets/images/new_kuwait.png')}}"  width="120" height="120" class="mt-4 pull-left float-left"
                         alt=""> 
                    <h1 class="m-4">
                        <b class="report_header"> الهيئة العامة للبيئة </b> <br>
                        <span class="fs25">تقارير دفع رسوم التسجيل بالممارسات</span>
                    </h1>
                </div>

                @include('pages.tenders.tender.reports.buyer_payments.templates.content')
            </div>
        </div>
    </div>
    <button class="btn btn-secondary btn-rounded btn-icon d-print-none" onclick="window.print()" style="position: fixed;left: 30px;bottom: 30px;z-index:99999;padding: 10px;font-size: 17px;">
        <i class="la la-print"></i>
    </button>
@endsection

@section('scripts')

@endsection
