@extends('portal.layouts.master')

@section('content')
    <div id="services" class="section mt-5">
        <div class="row mt-5">
            <div class="col-md-12 text-center mt-5">
                <a class="btn btn-danger" href="{{route('main-activity-office-agent')}}?window=1" target="_blank">
                    {{__('portal.go_to_site')}}
                </a>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?hl={{app()->getLocale()}}"></script>
@endsection
