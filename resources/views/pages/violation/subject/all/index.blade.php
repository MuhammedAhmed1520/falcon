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
                @include('pages.violation.subject.all.templates.header')
                @include('pages.violation.subject.all.templates.content')
                @include('pages.violation.subject.all.templates.info_modal')
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
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('#_2').trigger("click");
                $('#_21').trigger("click");

            }, 60);
        });
    </script>

    <script>
        $(document).ready(function () {
            let table = $('#data_table');
            /* Fixed header extension: http://datatables.net/extensions/keytable/ */
            var oTable = table.dataTable({
                 language: {
                    search: "{{app()->getLocale() == 'ar' ? 'البحث ' : 'search'}}"
                },
                "paging": true,
                "sort":false,
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
            // tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

        });
        $('#subject_info').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let subject = button.data('subject');

            $('#subject_modal_info').empty();

            $('#subject_modal_info').append(`
                    <div class="row">
                        <div class="col-md-12">
                            <h4>
                                {{__('violation.subject_title')}}: ${subject.title}
                                <br/>
                                {{__('violation.subject_number')}}: ${subject.number}
                            </h4>
                        </div>
                    </div>
            `);

            $.each(subject.paragraphs, function (index, paragraph) {

                $('#subject_modal_info').append(`<div class="col-md-12">
                            <fieldset>
                                <legend>${paragraph.title}</legend>
                                <b>${paragraph.details}</b>

                        `);


                $.each(paragraph.punishmentRuleParagraphs, function (index, related) {
                    console.log(related)
                    $('#subject_modal_info').append(`
                                <div class="col-md-12">

                                    <label class="p-2 text-white ${paragraph.punishmentRuleParagraphs.length > 0 ? 'bg-main' : 'bg-danger'}">{{__('violation.attach_subject_rule')}}</label>
                                    <table class="table table-bordered">
                                        <tr class="d-nones">
                                            <td colspan="4">
                                                <b class="text-primary">${related.title}</b>
                                                <br>
                                                <b>${related.details}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>{{__('violation.punishment_min_fine')}}</b><br>
                                                <small>${related.fine.min_fine}</small>
                                            </td>
                                            <td>
                                                <b>{{__('violation.punishment_max_fine')}}</b><br>
                                                <small>${related.fine.max_fine}</small>
                                            </td>
                                            <td>
                                                <b>{{__('violation.punishment_min_jail')}}</b><br>
                                                <small>${related.min_jail ? related.min_jail : '-'}</small>
                                            </td>
                                            <td>
                                                <b>{{__('violation.punishment_max_jail')}}</b><br>
                                                <small>${related.max_jail ? related.max_jail  : '-'}</small>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            `)
                })


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
                            url: "{{route('handleDeleteSubjectRules')}}",
                            method: "delete",
                            data: {
                                _token: '{{csrf_token()}}',
                                id: id
                            },
                            success: function (response) {
                                if (response.status) {
                                    $(`#subject_${id}`).remove()
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
