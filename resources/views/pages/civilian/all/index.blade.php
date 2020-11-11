@extends('layouts.master')

@section('styles')
    <!-- end of plugin styles -->
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
                @include('pages.civilian.all.templates.header')
                @include('pages.civilian.all.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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

{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            setTimeout(function () {--}}
{{--                $('#_3').trigger("click");--}}

{{--            }, 60);--}}
{{--        });--}}
{{--    </script>--}}
    <script>
        $(document).ready(function () {

            let table = $('#data_table');
            /* Fixed header extension: http://datatables.net/extensions/keytable/ */
            var oTable = table.dataTable({
                "paging": false,
                "searching": false,
                "sort": false,
                "dom": "<'row'<'col-md-5 col-12'l><'col-md-7 col-12'f>r><'table-responsive't><'row'<'col-md-5 col-12'i><'col-md-7 col-12'p>>",
                "order": [
                    [0, 'asc']
                ],
                "lengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                "pageLength": 5 // set the initial value,
            });
            let oTableColReorder = new $.fn.dataTable.ColReorder(oTable);
            let tableWrapper = $('#data_table_wrapper');

        })

        function removeUser(id) {
            let allow = confirm("{{__('violation.are_sure')}}");
            if (allow) {
                $.ajax({
{{--                    url: "{{route('handleDeleteUser')}}",--}}
                    method: "delete",
                    data: {
                        _token: '{{csrf_token()}}',
                        id: id
                    },
                    success: function (response) {
                        if (response.status) {
                            $('#user_'+id).remove()
                            // location.reload()
                        }
                    }
                })
            }
            {{--Swal.fire({--}}
            {{--    type: 'warning',--}}
            {{--    title: '{{__('violation.are_sure')}}',--}}
            {{--    inputAttributes: {--}}
            {{--        autocapitalize: 'off'--}}
            {{--    },--}}
            {{--    showCancelButton: true,--}}
            {{--    confirmButtonText: '{{__('violation.yes')}}',--}}
            {{--    cancelButtonText: '{{__('violation.no')}}',--}}
            {{--    showLoaderOnConfirm: true,--}}
            {{--    preConfirm: function (allow) {--}}
            {{--        if (allow) {--}}
            {{--            $.ajax({--}}
            {{--                url: "{{route('handleDeleteUser')}}",--}}
            {{--                method: "delete",--}}
            {{--                data: {--}}
            {{--                    _token: '{{csrf_token()}}',--}}
            {{--                    id: id--}}
            {{--                },--}}
            {{--                success: function (response) {--}}
            {{--                    if (response.status) {--}}
            {{--                        $(`#user_${id}`).remove()--}}
            {{--                        // location.reload()--}}
            {{--                    }--}}
            {{--                }--}}
            {{--            })--}}
            {{--        }--}}
            {{--    },--}}
            {{--    allowOutsideClick: function() {!Swal.isLoading()}--}}
            {{--}).then(function (result) {--}}
            {{--    if (result.value) {--}}
            {{--        // Swal.fire({--}}
            {{--        //     title: `${result.value.login}'s avatar`,--}}
            {{--        //     imageUrl: result.value.avatar_url--}}
            {{--        // })--}}
            {{--    }--}}
            {{--})--}}
        }
    </script>
@endsection
