@extends('layouts.master')

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
        .select2-container, .select2-results__option {
            width: 100% !important;
            direction: rtl;
        }
        .sweet-modal-close {
            left: 18px !important;
            right: 0 !important;
        }
        .sweet-modal-overlay {
            z-index: 9999;
        }
        .sweet-modal-close a.sweet-modal-close-link {
            float: left;
        }
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.tenders.tender.allTenderBuyers.templates.header')
                @include('pages.tenders.tender.allTenderBuyers.templates.content')
                @include('pages.tenders.tender.allTenderBuyers.templates.edit')
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
    {{Html::script('assets/js/datatable/dataTables.responsive.min.js')}}
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
                $('#_22').trigger("click");

            }, 60);
        });
    </script>
    <script>
        function showPayment(payment) {
            payment = JSON.parse(JSON.stringify(payment))
            // payment = eval(payment);
            console.log(payment)
            $.sweetModal({
                title: '<h3 class="text-white">بيانات الدفع</h3>',
                content: `
                    <div id="DivIdToPrint">
                    <div class="row bg-white">
                        <div class="col-md-12 d-flex">
                            <img src="{{asset('assets/images/logo.png')}}" class="m-4" width="75px" height="75px" alt="">
                            <h1 class="m-4">
                                <b> الخدمات الالكترونية</b> <br>
                                <span class="fa-sm">ايصال دفع ${payment.type}</span>
                            </h1>
                        </div>
                    </div>
                    <div class="row bg-white">
                    <div class="col-md-12 mt-3">
                        <table class="table table-bordered" border="4">
                            <tr>
                                <td>
                                    <b>{{__('violation.civil_name')}}</b>
                                </td>
                                <td width="65%">
                                    <b>${payment.name}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>{{__('violation.phone')}}</b>
                                </td>
                                <td width="65%">
                                    <b>${payment.phone}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>{{__('violation.email')}}</b>
                                </td>
                                <td width="65%">
                                    <b>${payment.email}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>{{__('violation.amount')}}</b>
                                </td>
                                <td width="65%">
                                    <b>${payment.cost}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>{{__('violation.status')}}</b>
                                </td>
                                    <td width="65%">
                                        <b>${payment.knet_data ? payment.knet_data.result : ''}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>{{app()->getLocale() == 'ar' ? 'نوع الدفع' : 'Payment Type'}}</b>
                                </td>
                                <td width="65%">
                                    <b>${(!payment.knet_data && payment.status == 1) ? 'CASH' : 'KNET'}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>{{app()->getLocale() == 'ar' ? 'نوع العملية' : 'Action Type'}}</b>
                                </td>
                                <td width="65%">
                                    <b>${payment.type}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>{{__('violation.paid')}}</b>
                                </td>
                                <td width="65%">
                                    <b>${ ((payment.knet_data ? payment.knet_data.result : '') != 'CAPTURED' && payment.status == 0) ? '<i class="la la-close text-danger"></i>' : '<i class="la la-check text-success"></i>'}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>{{app()->getLocale() == 'ar' ? 'تاريخ الدفع' : 'Created At'}}</b>
                                </td>
                                <td width="65%">
                                    <b>${payment.payed_at}</b>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                    </div>
                `,
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

        $('#reference_companies').select2();

        $('#editModal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            $('input[name="buyer_id"]').val(button.data('id'))
            $('input[name="date"]').val(button.data('dates'))
            $('#no_notes').val(button.data('notes'))
        });
        $(document).ready(function () {

            let table = $('#data_table');

            table.dataTable({
                "responsive": true,
                "sort": false,
                "paging": false,
                "searching": false,
                "dom": "<'row'<'col-md-5 col-12'l><'col-md-7 col-12'f>r><'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>", // datatable layout without  horizobtal scroll
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0]
                }],
                "order": [
                    [1, 'asc']
                ],
                "lengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 5
            });

            $('.date_time').flatpickr({
                defaultDate: "today",
                enableTime: true,
                dateFormat: "Y-m-d H:i",

            });

        });

        function remove(id) {
            Swal.fire({
                type: 'warning',
                title: '{{__('violation.are_sure')}}',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: '{{__('violation.yes')}}',
                cancelButtonText: '{{__('violation.no')}}',
                showLoaderOnConfirm: true,
                preConfirm: function (allow) {
                    if (allow) {
                        $.ajax({
                            url: "{{route('handleTenderBuyersDelete')}}",
                            method: "delete",
                            data: {
                                _token: '{{csrf_token()}}',
                                id: id
                            },
                            success: function (response) {
                                if (response.status) {
                                    $(`#buyer_${id}`).remove()
                                    // location.reload()
                                }
                            }
                        })
                    }
                },
                allowOutsideClick: function() {!Swal.isLoading()}
            }).then(function (result) {
                if (result.value) {
                    // Swal.fire({
                    //     title: `${result.value.login}'s avatar`,
                    //     imageUrl: result.value.avatar_url
                    // })
                }
            })
        }
    </script>
@endsection
