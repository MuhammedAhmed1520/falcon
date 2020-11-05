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
    {{Html::style('assets/css/jquery.sweet-modal.min.css')}}
    {{Html::style('assets/css/tables.css')}}
    <style>
        .select2-container {
            width: 100% !important;
        }

        .select2-search__field {
            text-align: right !important;
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
                @include('pages.officeAgent.asbestos.all.templates.header')
                @include('pages.officeAgent.asbestos.all.templates.content')
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
                $('#_25').trigger("click");

            }, 60);
        });
    </script>
    <script>
        function removeReset() {
            $('select option:selected').removeAttr('selected');
            $('.select2').trigger('change.select2');
        }

        function removeAsbest(id) {
            //
            let allow = confirm('{{__('violation.are_sure')}}');

            if (allow) {
                $.ajax({
                    url: "{{route('deleteOfficeAsbestosOrder')}}",
                    method: "delete",
                    data: {
                        _token: '{{csrf_token()}}',
                        id: id
                    },
                    success: function (response) {
                        if (response.status) {
                            // $(`#violation_${id}`).remove()
                            location.reload()
                            // let oTable = $('#data_table').dataTable();
                            // oTable.fnDeleteRow(oTable.find(`#violation_${id}`).eq(0))
                        }
                    }
                })
            }
        }

        $('.select2').select2();

        $(document).ready(function () {
            $(".date-range").flatpickr({
                mode: "range",
                dateFormat: "Y-m-d",
                onChange: function (selectedDates, dateStr, instance) {
                    let start_date = selectedDates[0];
                    let end_date = selectedDates[1];
                    start_date = start_date ? moment(start_date).format('Y-MM-DD') : '';
                    end_date = end_date ? moment(end_date).format('Y-MM-DD') : '';

                    $('input[name="violation_date_from"]').val(start_date)
                    $('input[name="violation_date_to"]').val(end_date)
                }

            });

            $(".date").flatpickr({
                dateFormat: "Y-m-d",
            });


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

    </script>
@endsection
