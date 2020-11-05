@extends('layouts.master')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.tenders.tender.winners.templates.header')
                @include('pages.tenders.tender.winners.templates.content')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {

            $('.multi-select').select2({

                // maximumSelectionLength: 2
            });

            setTimeout(function () {
                $('#_2').trigger("click");
                $('#_22').trigger("click");

            }, 60);

            $('.date_time').flatpickr({
                defaultDate: "today",
                enableTime: true,
                dateFormat: "Y-m-d H:i",

            });
        });
    </script>

@endsection