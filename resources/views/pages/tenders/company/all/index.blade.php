@extends('layouts.master')

@section('styles')
    <!-- end of plugin styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    {{Html::style('assets/css/scroller.bootstrap.min.css')}}
    {{Html::style('assets/css/colReorder.bootstrap.min.css')}}
    {{Html::style('assets/css/dataTables.bootstrap.css')}}
    {{Html::style('assets/css/dataTables.bootstrap.css')}}
    {{Html::style('assets/css/responsive.dataTables.min.css')}}
    {{Html::style('assets/css/tables.css')}}
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.tenders.company.all.templates.header')
                @include('pages.tenders.company.all.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
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

    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('#_2').trigger("click");
                $('#_22').trigger("click");

            }, 60);
        });
    </script>
    <script>
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
                            url: "{{route('deleteCompany')}}",
                            method: "delete",
                            data: {
                                _token: '{{csrf_token()}}',
                                id: id
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $(`#tender_company_${id}`).remove()
                                    // location.reload()
                                    let oTable = $('#data_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find(`#tender_company_${id}`).eq(0))
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


        $(document).on('change', '#payment_type', function () {
            value = $(this).val();
            if (value == 1) {
                $('#cash_row').show()
            } else {
                $('#cash_row').hide()
            }
        });

        function payment(id) {
            Swal.fire({
                type: 'warning',
                title: '{{__('violation.are_sure')}}',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                html: `
                    <div class="text-left">
                        <b style="font-weight: bold;">دفع اشتراك تسجيل الشركة </b>
                        <select class="form-control" id="payment_type">
                            <option value="1">الدفع كى نت</option>
                            <option value="2">الدفع اونلاين</option>
                        </select>
                    </div>
                    <div class="row" id="cash_row" style="margin-top: 5px">
                        <div class="col-7 text-left">
                            <b style="font-weight: bold;">رقم الشيك</b>
                            <input class="form-control" type="text" name="check_info" value=""/>
                        </div>
                        <div class="col-5 text-left">
                            <b style="font-weight: bold;">التاريخ</b>
                            <input class="form-control date_time" type="text" name="date" value=""/>
                        </div>
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: '{{__('violation.yes')}}',
                cancelButtonText: '{{__('violation.no')}}',
                showLoaderOnConfirm: true,
                preConfirm: function (allow) {
                    if (allow) {
                        let payment_type_id = $('#payment_type').val();
                        let check_info = $('input[name="check_info"]').val();
                        let date = $('input[name="date"]').val();
                        $.ajax({
                            url: "{{route('payCompanySubscription')}}",
                            method: "post",
                            data: {
                                _token: '{{csrf_token()}}',
                                id: id,
                                check_info: check_info,
                                date: date,
                                payment_type_id: payment_type_id
                            },
                            success: function (response) {
                                if (response.status) {
                                    location.reload()
                                }
                            },
                            error: function (err) {
                                console.log(err);
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


            $('.date_time').flatpickr({
                defaultDate: "today",
                enableTime: true,
                dateFormat: "Y-m-d H:i",

            });
        }

        function deactivateCompany(_this, id) {
            Swal.fire({
                type: 'warning',
                title: '{{__('violation.are_sure')}}',
                html: '<input class="form-control" name="reason" placeholder="اكتب السبب هنا"/>',
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
                            url: "{{route('activateDeactivateCompany')}}",
                            method: "post",
                            data: {
                                _token: '{{csrf_token()}}',
                                id: id,
                                status: 0,
                                reason: $('input[name="reason"]').val()

                            },
                            success: function (response) {
                                if (response.status) {
                                    _this.classList.toggle('btn-danger');
                                    _this.classList.toggle('btn-success');
                                    _this.innerHTML = "<i class=\"la la-lock\"></i> {{   __('tenders.activate') }}";
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

        function activateCompany(_this, id) {
            Swal.fire({
                type: 'warning',
                title: '{{__('violation.are_sure')}}',
                html: '<input class="form-control" name="reason" placeholder="اكتب السبب هنا"/>',
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
                            url: "{{route('activateDeactivateCompany')}}",
                            method: "post",
                            data: {
                                _token: '{{csrf_token()}}',
                                id: id,
                                status: 1,
                                reason: $('input[name="reason"]').val()
                            },
                            success: function (response) {
                                if (response.status) {
                                    _this.classList.toggle('btn-danger');
                                    _this.classList.toggle('btn-success');
                                    _this.innerHTML = "<i class=\"la la-lock\"></i> {{   __('tenders.deactivate') }}";
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

        function markCompanyAsRead(_this, id) {
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
                            url: "{{route('markCompanyAsRead')}}",
                            method: "post",
                            data: {
                                _token: '{{csrf_token()}}',
                                id: id
                            },
                            success: function (response) {
                                if (response.status) {

                                    _this.disabled = true;
                                    _this.classList.add('disabled');
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
