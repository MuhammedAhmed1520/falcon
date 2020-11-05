@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    {{Html::style('assets/css/bootstrap4-toggle.min.css')}}
    <style>
        .toggle.ios, .toggle-on.ios, .toggle-off.ios {
            border-radius: 20rem;
            width: 75px !important;
        }

        .toggle.ios .toggle-handle {
            border-radius: 20rem;
        }
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.violation.payment.create.templates.header')
                @include('pages.violation.payment.create.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    {{Html::script('assets/js/bootstrap4-toggle.min.js')}}
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('#_2').trigger("click");
                $('#_21').trigger("click");

            }, 60);
        });
    </script>
    <script>
        function report(id) {

            var url = '{{route('generateViolationReceipt')}}';

            setTimeout(function () {
                url += '?violation_id='+id;
                var win = window.open(url, "Report", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=550, height=900, top=" + '50' + ", left=" + '110');
                console.log(url)
            }, 250)

        }
    </script>
@endsection