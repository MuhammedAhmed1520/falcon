@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.violation.reports.all.templates.header')
                @include('pages.violation.reports.all.templates.content')
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
                $('#_21').trigger("click");

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


        $("#clear-range-payment").click(function () {
            $(".date-range-payment").val('');
            start_payment = '';
            end_payment = '';

        })
        $("#clear-range-violation").click(function () {
            $(".date-range-violation").val('');
            start_violation = '';
            end_violation = '';
        })
        $("#clear-range-create").click(function () {
            $(".date-range-create").val('');
            start_create = '';
            end_create = '';
        })

        $('#form').on('reset', function () {

            start_violation = '';
            end_violation = '';
            start_payment = '';
            end_payment = '';
            start_create = '';
            end_create = '';
        })
        $(document).ready(function () {

            $(".date-range-payment").flatpickr({
                mode: "range",
                // defaultDate: ["today", "today"],
                dateFormat: "Y-m-d",
                onChange: function (selectedDates, dateStr, instance) {
                    start_payment = selectedDates[0];
                    end_payment = selectedDates[1];
                },
                clearBtn: true
            })

            $(".date-range-violation").flatpickr({
                mode: "range",
                // defaultDate: ["today", "today"],
                dateFormat: "Y-m-d",
                onChange: function (selectedDates, dateStr, instance) {
                    start_violation = selectedDates[0];
                    end_violation = selectedDates[1];
                },
                clearBtn: true
            });

            $(".date-range-create").flatpickr({
                mode: "range",
                // defaultDate: ["today", "today"],
                dateFormat: "Y-m-d",
                onChange: function (selectedDates, dateStr, instance) {
                    start_create = selectedDates[0];
                    end_create = selectedDates[1];
                },
                clearBtn: true

            });

        });

        function report() {

            var url = '{{route('generateViolationReportParams')}}';

            setTimeout(function () {
                let text_start_v = (start_violation ? moment(start_violation).format('Y-MM-DD') : null);
                let text_end_v = (end_violation ? moment(end_violation).format('Y-MM-DD') : null);
                let text_start_c = (start_create ? moment(start_create).format('Y-MM-DD') : null);
                let text_end_c = (end_create ? moment(end_create).format('Y-MM-DD') : null);
                let text_start_p = (start_payment ? moment(start_payment).format('Y-MM-DD') : null);
                let text_end_p = (end_payment ? moment(end_payment).format('Y-MM-DD') : null);
                let text_category_id = $('select[name="category_id"]').val() == 'ALL' ? null : $('select[name="category_id"] option:selected').text();
                let text_status_id = $('select[name="status_id"]').val() == 'ALL' ? null : $('select[name="status_id"] option:selected').text();
                let text_area_id = $('select[name="area_id"]').val() == 'ALL' ? null : $('select[name="area_id"] option:selected').text();
                let text_action_id = $('select[name="action_id"]').val() == 'ALL' ? null : $('select[name="action_id"] option:selected').text();
                let text_payed = $('select[name="payed"]').val() == 'ALL' ? null : $('select[name="payed"] option:selected').text();
                let text_officer_id = $('select[name="officer_id"]').val() == 'ALL' ? null : $('select[name="officer_id"] option:selected').text();
                let text_punishment_subject_paragraphs_id = $('select[name="punishment_subject_paragraphs_id"]').val() == 'ALL' ? null : $('select[name="punishment_subject_paragraphs_id"] option:selected').text();
                let text_query = $('input[name="query"]').val();

                let data_model = {
                    violation_date: {
                        start: text_start_v,
                        end: text_end_v,
                    },
                    created_date: {
                        start: text_start_c,
                        end: text_end_c,
                    },
                    payment_date: {
                        start: text_start_p,
                        end: text_end_p,
                    },
                    text_category: text_category_id,
                    text_status: text_status_id,
                    text_action: text_action_id,
                    text_area:text_area_id,
                    text_payed: text_payed,
                    text_officer: text_officer_id,
                    text_subject: text_punishment_subject_paragraphs_id,
                    text_query: text_query,

                };
                     

                let header_text = null;
                let header_value = null;

                if (data_model.text_action) {
                    if (header_text == null && header_value == null) {
                        header_text = 'الاجراء النهائي';
                        header_value = data_model.text_action;
                    }
                }
                if (data_model.text_status) {

                    if (header_text == null && header_value == null) {
                        header_text = 'الحالة';
                        header_value = data_model.text_status;
                    }
                }
                if (data_model.text_category) {

                    if (header_text == null && header_value == null) {
                        header_text = 'نوع المخالفة';
                        header_value = data_model.text_category;
                    }
                }
                if (data_model.text_officer) {

                    if (header_text == null && header_value == null) {
                        header_text = 'الضابط';
                        header_value = data_model.text_officer;
                    }
                }
                if (data_model.text_payed) {

                    if (header_text == null && header_value == null) {
                        header_text = 'الدفع';
                        header_value = data_model.text_payed;
                    }
                }
                if (data_model.text_subject) {

                    if (header_text == null && header_value == null) {
                        header_text = 'مادة المخالفة';
                        header_value = data_model.text_subject;
                    }
                }
                if (data_model.text_query) {

                    if (header_text == null && header_value == null) {
                        header_text = 'كلمة البحث';
                        header_value = data_model.text_query;
                    }
                }


                url += '?violation_date_from=' + (start_violation ? moment(start_violation).format('Y-MM-DD') : '');
                url += '&violation_date_to=' + (end_violation ? moment(end_violation).format('Y-MM-DD') : '');
                url += '&created_date_from=' + (start_create ? moment(start_create).format('Y-MM-DD') : '');
                url += '&created_date_to=' + (end_create ? moment(end_create).format('Y-MM-DD') : '');
                url += '&payed_date_from=' + (start_payment ? moment(start_payment).format('Y-MM-DD') : '');
                url += '&payed_date_to=' + (end_payment ? moment(end_payment).format('Y-MM-DD') : '');

                url += '&category_id=' + $('select[name="category_id"]').val();
                url += '&status_id=' + $('select[name="status_id"]').val();
                url += '&area_id=' + $('select[name="area_id"]').val();
                url += '&action_id=' + $('select[name="action_id"]').val();
                // url += '&payment_type_id=' + $('select[name="category_id"]').val();
                url += '&payed=' + $('select[name="payed"]').val();
                url += '&officer_id=' + $('select[name="officer_id"]').val();
                url += '&statistics_only=' + $('input[name="statistics_only"]').is(':checked');
                url += '&table_only=' + $('input[name="table_only"]').is(':checked');
                url += '&paginated=' + !$('input[name="paginated"]').is(':checked');
                url += '&punishment_subject_paragraphs_id=' + $('select[name="punishment_subject_paragraphs_id"]').val();
                url += '&query=' + $('input[name="query"]').val();
                
                                     
                url += '&text_category=' + (data_model.text_category ? data_model.text_category  : '');
                url += '&text_status='+ (data_model.text_status ? data_model.text_status  : '');
                url += '&text_action='+ (data_model.text_action ? data_model.text_action  : ''); 
                url += '&text_payed='+ (data_model.text_payed ? data_model.text_payed  : ''  );
                url += '&text_officer='+ (data_model.text_officer ? data_model.text_officer  : '' ); 
                url += '&text_subject='+ (data_model.text_subject ? data_model.text_subject  : '');
                url += '&text_query=' + (data_model.text_query ? data_model.text_query  : '');
                url += '&text_area=' + (data_model.text_area ? data_model.text_area  : '');
                
                if (header_text && header_value) {

                    // url += '&header_text=' + header_text;
                    // url += '&header_value=' + header_value;
                }

                // window.location.href = url;

                var win = window.open(url, "Report", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1200, height=500, top=" + '150' + ", left=" + '110');
                console.log(url)
            }, 250)

        }
    </script>
@endsection
