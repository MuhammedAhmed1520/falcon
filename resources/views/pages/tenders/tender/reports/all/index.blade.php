@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .btn-primary {
            color: #fff;
            background-color: #0747a6;
            border-color: #093980;
        }
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.tenders.tender.reports.all.templates.header')
                @include('pages.tenders.tender.reports.all.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('#_2').trigger("click");
                $('#_22').trigger("click");

            }, 60);
        });
    </script>
    <script>

        let start_violation = '';
        let end_violation = '';
        let start_payment = '';
        let end_payment = '';
        let start_create = '';
        let end_create = '';
        
        $(document).ready(function () {

            $(".date-range-payment").flatpickr({
                mode: "range",
                // defaultDate: ["today", "today"],
                dateFormat: "Y-m-d",
                onChange: function (selectedDates, dateStr, instance) {
                    start_payment = selectedDates[0];
                    end_payment = selectedDates[1];
                }
            })

        });

        function generateTenderSubscriptionPaymentReport() {

            var url = '{{route('generateTenderSubscriptionPaymentReport')}}';
            let paginated = !$('input[name="paginated"]').is(':checked');

            setTimeout(function () {
                url += '?date_from=' + (start_payment ? moment(start_payment).format('Y-MM-DD') : '');
                url += '&date_to=' + (end_payment ? moment(end_payment).format('Y-MM-DD') : '');
                url += '&paginated=' + paginated;
                // window.location.href = url;

                var win = window.open(url, "Report", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1200, height=500, top=" + '150' + ", left=" + '110');
                console.log(url)
            }, 250)

        }

        function generateTenderBuyersPaymentReport() {

            var url = '{{route('generateTenderBuyersPaymentReport')}}';
            let paginated = !$('input[name="paginated"]').is(':checked');

            setTimeout(function () {
                url += '?date_from=' + (start_payment ? moment(start_payment).format('Y-MM-DD') : '');
                url += '&date_to=' + (end_payment ? moment(end_payment).format('Y-MM-DD') : '');
                url += '&paginated=' + paginated;
                // window.location.href = url;

                var win = window.open(url, "Report", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1200, height=500, top=" + '150' + ", left=" + '110');
                console.log(url)
            }, 250)

        }
    </script>
@endsection