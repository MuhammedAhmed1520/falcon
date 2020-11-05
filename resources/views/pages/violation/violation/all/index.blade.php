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
    {{Html::style('assets/css/jquery.fileuploader.min.css')}}
    <style>
        .fileuploader-input .fileuploader-input-button, .fileuploader-popup .fileuploader-popup-content .fileuploader-popup-button.button-success {
            background: linear-gradient(135deg, #3A8FFE 0, #037bff 100%);
        }
    </style>
    <style>
        .select2-container{
            width:100%!important;
        }
        .select2-search__field{
            text-align:right!important;
        }
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.violation.violation.all.templates.violation_action_modal')
                @include('pages.violation.violation.all.templates.header')
                @include('pages.violation.violation.all.templates.content')
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

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{Html::script('assets/js/jquery.fileuploader.min.js')}}
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('#_2').trigger("click");
                $('#_21').trigger("click");

            }, 60);
        });
    </script>

    <script>
        $('#status_select').on('change', function () {

            let status_id = $(this).val();
            if (status_id == 1) {
                $('.attachment').show();
            } else {
                $('.attachment').hide();
            }
        });
        $('#select_action').on('change', function () {
            let action_id = $(this).val();
            if (action_id == 6 || action_id == 7) {
                $('.committee').show();
            } else {
                $('.committee').hide();
            }
            if (action_id == 1) {
                $('.attachment').show();
                $('.status').show();
            } else {
                $('.attachment').hide();
                $('.status').hide();
            }
        });

        $('input[name="attachment[]"]').fileuploader({
            extensions: ['pdf', 'png', 'jpg', 'jpeg']
        });
        $('.date_time').flatpickr({
            // defaultDate: "today",
            enableTime: true,
            dateFormat: "Y-m-d H:i",

        });
    </script>
    <script>
        function advanced_search() {
            $('.advanced_item').toggleClass('d-none');
        }
        
        function removeReset(){
            $('select option:selected').removeAttr('selected');
            $('.select2').trigger('change.select2');
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
                            url: "{{route('handleDeleteViolation')}}",
                            method: "delete",
                            data: {
                                _token: '{{csrf_token()}}',
                                id: id
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $(`#violation_${id}`).remove()
                                    // location.reload()
                                    let oTable = $('#data_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find(`#violation_${id}`).eq(0))
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

        function actionModal(violation) {
            violation = eval(violation);
            $('.attachment').css("display", "none");
            $('.committee').css("display", "none");

            $('#violations_modals').modal();
            $("#select_action").val(violation.action_id);
            $('#violationId').val(violation.id);
            $('#violation_block_select').val(violation.block);
            $('#status_select').val(violation.status_id);
            $('#status_select').val(violation.status_id);
            $('#violation_area_id').val(violation.area.name);
            
            if (violation.action_id === 6 || violation.action_id === 7) {
                $('.committee').css("display", "block");
            }else{
                $('.committee').css("display", "none");
            }
            if (violation.action_id === 1 && violation.status_id === 1){
               $('.attachment').css("display", "block");
            } else{
                $('.attachment').css("display", "none");
            }
        }
    </script>
@endsection
