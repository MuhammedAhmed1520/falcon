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
    <style>
        .select2-container {
            width: 100% !important;
        }

        .select2-search__field {
            text-align: right !important;
        }
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.officeAgent.locations.add.templates.header')
                @include('pages.officeAgent.locations.add.templates.content')
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
        });
        let counter = 0;
        $(document).on('click', '.remove_btn', function () {
            $(this).parents().eq(1).remove();
            counter--;
        });

        function addRow() {
            $('#data_table').append('<tr>\n                        <td>\n                            <button class="btn btn-danger btn-sm remove_btn pr-3" type="button">\n                                <i class="la la-remove"></i>\n                            </button>\n                        </td>\n                        <td>\n                            <input type="text" class="form-control" name="cities[' + counter + '}][title_ar]"\n                                   autocomplete="off" required/>\n                        </td>\n                        <td>\n                            <input type="text" class="form-control" name="cities[' + counter + '][title_en]"\n                                   autocomplete="off" required/>\n                        </td>\n</tr>');
            counter++;
        }

        {{--function remove(id) {--}}
        {{--    Swal.fire({--}}
        {{--        type: 'warning',--}}
        {{--        title: '{{__('violation.are_sure')}}',--}}
        {{--        inputAttributes: {--}}
        {{--            autocapitalize: 'off'--}}
        {{--        },--}}
        {{--        showCancelButton: true,--}}
        {{--        confirmButtonText: '{{__('violation.yes')}}',--}}
        {{--        cancelButtonText: '{{__('violation.no')}}',--}}
        {{--        showLoaderOnConfirm: true,--}}
        {{--        preConfirm: function (allow) {--}}
        {{--            if (allow) {--}}
        {{--                $.ajax({--}}
        {{--                    url: "{{route('handleDeleteViolation')}}",--}}
        {{--                    method: "delete",--}}
        {{--                    data: {--}}
        {{--                        _token: '{{csrf_token()}}',--}}
        {{--                        id: id--}}
        {{--                    },--}}
        {{--                    success: function (response) {--}}
        {{--                        if (response.status) {--}}
        {{--                            // $(`#violation_${id}`).remove()--}}
        {{--                            // location.reload()--}}
        {{--                            let oTable = $('#data_table').dataTable();--}}
        {{--                            oTable.fnDeleteRow(oTable.find(`#violation_${id}`).eq(0))--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                })--}}
        {{--            }--}}
        {{--        },--}}
        {{--        allowOutsideClick: function () {--}}
        {{--            !Swal.isLoading()--}}
        {{--        }--}}
        {{--    }).then(function (result) {--}}
        {{--        if (result.value) {--}}
        {{--            // Swal.fire({--}}
        {{--            //     title: `${result.value.login}'s avatar`,--}}
        {{--            //     imageUrl: result.value.avatar_url--}}
        {{--            // })--}}
        {{--        }--}}
        {{--    })--}}
        {{--}--}}
    </script>
@endsection
