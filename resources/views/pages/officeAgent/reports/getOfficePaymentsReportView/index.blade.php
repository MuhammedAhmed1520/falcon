@extends('layouts.masterIE')

@section('styles')
    <!-- end of plugin styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    {{Html::style('assets/css/scroller.bootstrap.min.css')}}
    {{Html::style('assets/css/colReorder.bootstrap.min.css')}}
    {{Html::style('assets/css/dataTables.bootstrap.css')}}
    {{Html::style('assets/css/dataTables.bootstrap.css')}}
    {{Html::style('assets/css/responsive.dataTables.min.css')}}
    {{Html::style('assets/css/tables.css')}}
    {{Html::style('assets/css/jquery.sweet-modal.min.css')}}
    <style>
        .select2-container {
            width: 100% !important;
        }

        .select2-search__field {
            text-align: right !important;
        }

        .sweet-modal-overlay {
            z-index: 99999;
        }

    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.officeAgent.reports.getOfficePaymentsReportView.templates.header')
                @include('pages.officeAgent.reports.getOfficePaymentsReportView.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    {{Html::script('assets/js/datatable/jquery.dataTables.js')}}
    {{Html::script('assets/js/datatable/dataTables.tableTools.js')}}
    {{Html::script('assets/js/datatable/dataTables.colReorder.js')}}
    {{Html::script('assets/js/datatable/dataTables.bootstrap.js')}}
    {{Html::script('assets/js/datatable/dataTables.buttons.min.js')}}
    {{Html::script('assets/js/datatable/jquery.dataTables.min.js')}}
    {{Html::script('assets/js/datatable/dataTables.rowReorder.min.js')}}
    {{Html::script('assets/js/datatable/buttons.colVis.min.js')}}
    {{Html::script('assets/js/datatable/buttons.html5.min.js')}}
    {{Html::script('assets/js/datatable/buttons.bootstrap.min.js')}}
    {{Html::script('assets/js/datatable/buttons.print.min.js')}}
    {{Html::script('assets/js/datatable/dataTables.scroller.min.js')}}
    {{Html::script('assets/js/jquery.sweet-modal.min.js')}}

    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('#_2').trigger("click");
                $('#_25').trigger("click");

            }, 60);
        });
    </script>
    <script>
        function printTrigger() {
            let comp = $('select[name="office_type_id"] option:selected').text();
            $('#company_name').text(comp)
            window.print();
        }

        function removeReset() {
            $('select option:selected').removeAttr('selected');
            $('.select2').trigger('change.select2');
        }

        function showPayment(payment) {
            payment = JSON.parse(JSON.stringify(payment))
            // payment = eval(payment);
            // console.log(payment)

            let html_content = "" +
                "<div id=\"DivIdToPrint\">\n" +
                "<div class=\"row bg-white\">\n" +
                "<div class=\"col-md-12 d-flex\">\n" +
                "<img src=\"{{asset('assets/images/logo.png')}}\" class=\"m-4\" width=\"75px\" height=\"75px\">" +
                "<h1 class=\"m-4\">\n <b> الخدمات الالكترونية</b> <br>\n <span class=\"fa-sm\">ايصال دفع " + payment.type.name + "</span>\n" +
                "</h1>\n</div>\n</div>\n<div class=\"row bg-white\">\n<div class=\"col-md-12 mt-3\">\n<table class=\"table table-bordered\" border=\"4\">\n" +
                "<tr>\n";
            if (payment.paymentable[0]) {
                html_content +=
                    "<td>\n<b>{{__('violation.civil_name')}}</b>\n</td>\n<td width=\"65%\">\n<b>" + payment.paymentable[0].name + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b>{{__('violation.phone')}}</b>\n</td>\n<td width=\"65%\">\n<b>" + payment.paymentable[0].phone + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b>{{__('violation.email')}}</b>\n</td>\n<td width=\"65%\">\n<b>" + payment.paymentable[0].email + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b>{{__('violation.amount')}}</b>\n</td>\n<td width=\"65%\">\n<b>" + payment.paymentable[0].cost + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b class='text-uppercase'>result</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.paymentable[0].knet_data ? payment.paymentable[0].knet_data.result : 'غير مدفوع') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b class='text-uppercase'>payment_id</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.paymentable[0].knet_data ? payment.paymentable[0].knet_data.payment_id : '') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b class='text-uppercase'>track_id</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.paymentable[0].knet_data ? payment.paymentable[0].knet_data.track_id : '') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b class='text-uppercase'>auth_code</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.paymentable[0].knet_data ? payment.paymentable[0].knet_data.auth_code : '') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b class='text-uppercase'>post_date</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.paymentable[0].knet_data ? payment.paymentable[0].knet_data.post_date : '') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b class='text-uppercase'>ref</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.paymentable[0].knet_data ? payment.paymentable[0].knet_data.ref : '') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b class='text-uppercase'>{{app()->getLocale() == 'ar' ? 'نوع الدفع' : 'Payment Type'}}</b>\n</td>\n<td width=\"65%\">\n<b>" + ((payment.paymentable[0].knet_data) ? 'Online' : 'Knet') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b>{{app()->getLocale() == 'ar' ? 'نوع العملية' : 'Action Type'}}</b>\n</td>\n<td width=\"65%\">\n<b>" + payment.type.name + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b>{{app()->getLocale() == 'ar' ? 'تاريخ الدفع' : 'Created At'}}</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.payed_at ? payment.payed_at : '') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b>{{app()->getLocale() == 'ar' ? ' رقم الايصال  ' : 'Receipt Code'}}</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.receipt_code ? payment.receipt_code : '') + "</b>\n</td>\n </tr>\n" +
                    "<td>\n<b>{{app()->getLocale() == 'ar' ? ' ملاحظات    ' : 'Notes'}}</b>\n</td>\n<td width=\"65%\">\n<b>" + (payment.notes ? payment.notes : '') + "</b>\n</td>\n </tr>\n" +
                    "<tr>\n" +
                    "</table>\n</div>\n</div>\n</div>";
            }

            $.sweetModal({
                title: '',
                content: html_content,
                theme: $.sweetModal.THEME_DARK,
                buttons: {
                    someOtherAction: {
                        label: '<i class="la la-print"></i>',
                        classes: 'btn btn-danger',
                        action: function () {
                            // return $.sweetModal('You clicked Action 2!');
                            let divToPrint = document.getElementById('DivIdToPrint');
                            let newWin = window.open('', 'Print-Window');
                            newWin.document.open();
                            newWin.document.write('<html>{{Html::style('assets/css/bootstrap.min.css')}}{{Html::style('assets/css/bootstrap-rtl.css')}}<body dir="rtl" onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
                            newWin.document.close();
                            setTimeout(function () {
                                newWin.close();
                            }, 10);
                        }
                    },
                }
            });
        }

        $('.select2').select2();


        $(document).ready(function () {
            let table = $('#data_table');
            /* Fixed header extension: http://datatables.net/extensions/keytable/ */
            var oTable = table.dataTable({
                "responsive": true,
                "searching": false,
                "paging": false,
                // "dom": "<'row'<'col-md-5 col-12'l><'col-md-7 col-12'f>r><'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
                dom: 'rBfrtip',
                "order": [
                    [0, 'asc']
                ],
                "lengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                "pageLength": 5, // set the initial value,
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0]
                }],
                buttons: [
                    {
                        extend: 'print',
                        text: '<i class="la la-print"></i>',
                        className: 'btn btn-primary',
                        customize: function (win) {
                            $(win.document.body)
                                .css('direction', 'rtl');
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('direction', 'rtl');
                        }
                    }
                ]
            });
        })
        $(document).ready(function () {
            $(".date-range").flatpickr({
                mode: "range",
                dateFormat: "Y-m-d",
                defaultDate: ['{{request()->get('start_date')}}', '{{request()->get('end_date')}}'],
                onChange: function (selectedDates, dateStr, instance) {
                    let start_date = selectedDates[0];
                    let end_date = selectedDates[1];
                    start_date = start_date ? moment(start_date).format('Y-MM-DD') : '';
                    end_date = end_date ? moment(end_date).format('Y-MM-DD') : '';

                    $('input[name="start_date"]').val(start_date)
                    $('input[name="end_date"]').val(end_date)
                }

            });

            $(".date").flatpickr({
                dateFormat: "Y-m-d",
            });
        });
    </script>
@endsection
