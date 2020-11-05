@extends('layouts.master')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    {{Html::style('assets/css/tagify.css')}}
    {{Html::style('assets/css/jquery.fileuploader.min.css')}}
    <style>
        .fileuploader-input .fileuploader-input-button, .fileuploader-popup .fileuploader-popup-content .fileuploader-popup-button.button-success {
            background: linear-gradient(135deg, #3A8FFE 0, #037bff 100%);
        }
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.violation.violation.edit.templates.old_violation_modal')
                @include('pages.violation.violation.edit.templates.header')
                @include('pages.violation.violation.edit.templates.content')
                @include('pages.violation.violation.edit.templates.subject_detail_modal')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    {{Html::script('assets/js/tagify.js')}}
    {{Html::script('assets/js/jQuery.tagify.min.js')}}
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
    </script>
    <script>


        $('select[name="violation_category_id"]').on('change', function () {

            $.ajax({
                type: 'get',
                url: '{{route('paragraphPivot')}}',
                data: {
                    'type': $(this).val()
                },
                success: function (response) {
                    console.log(response)
                    if (response.status) {

                    }
                    $('.subject_p_select').empty();
                    $('.subject_p_select').append(`<option selected disabled>{{__('violation.subject_number')}}</option>`);
                    $.each(response.data.paragraphs, function (index, pivot) {

                        $('.subject_p_select')
                            .append(`<option value="${pivot.id}" data-info='${JSON.stringify(pivot)}'>
                                {{__('violation.subject_number')}}
                                . ${pivot.subject_paragraph.subject_rule ? pivot.subject_paragraph.subject_rule.number : ''} ${pivot.subject_paragraph.title}
                                  ${pivot.subject_paragraph.deleted_at ? '<span class="text-danger">(محذوف)</span>' : ''}
                                | {{__('violation.punishment_number')}}
                                . ${pivot.punishment_paragraph.punishment_rule ? pivot.punishment_paragraph.punishment_rule.number : ''} ${pivot.punishment_paragraph.title}
                                  ${pivot.punishment_paragraph.deleted_at ? '<span class="text-danger">(محذوف)</span>' : ''}
                                </option>`);
                    });
                }
            })
        });
        $('#violations_modals').on('show.bs.modal', function (event) {

            let button = $(event.relatedTarget);
            let ssn = $('input[name="civilian_ssn"]').val();
            let company_name = $('input[name="company_name"]').val();
            let sent = ssn;
            if (button.attr('data-type') == 'company') {
                sent = company_name;
                console.log('company');
            }
            console.log(sent);
            $.ajax({
                url: '{{route('findBySSN')}}',
                type: 'GET',
                data: {
                    ssn: sent
                }, success: function (response) {
                    if (response.status) {
                        console.log(response.data);

                        let violations = response.data.violations;

                        $('#modal_body').empty();

                        if (violations.length == 0) {
                            $('#modal_body').append(`<tr><td colspan="7">NO Data</td></tr>`);
                            return;
                        }
                        $.each(violations, function (index, element) {
                            console.log(element)
                            $('#modal_body').append(`
                                <tr>
                                    <td>${element.serial}</td>
                                    <td>${element.details ? element.details : ''}</td>
                                    <td>${element.action.title}</td>
                                    <td>${element.fine_cost}</td>
                                    <td>${element.civilian ? element.civilian.name : ''}</td>
                                    <td>${element.civilian ? element.civilian.mobile : ''}</td>
                                </tr>
                            `);

                        })
                    } else {
                        $('#modal_body').append(`<tr><td colspan="7">NO Data</td></tr>`);
                        return;
                    }
                }
            })

        });
        @if($violation->category_id == 1)
        $('#not_personal').hide();
        @endif
        @if(old('violation_category_id') != 1 && old('violation_category_id'))
        $('#not_personal').show();
        @endif
        $(document).ready(function () {

            $('body').on('click', '.deleteRowViolation', function () {
                $(this).parents().eq(1).remove()
            });

            $('body').on('change', '.subject_p_select', function () {
                let info = $(this).children("option:selected").data('info');
                if (info == undefined) {
                    return;
                }
                let fine_cost_select = $(this).parents().eq(1).find('select[name="violation_fine_cost[]"]');

                if ($('select[name="violation_category_id"]').val() == 1) {
                    fine_cost_select.empty();
                    fine_cost_select.append(`
                        <option value="${info.punishment_paragraph.fine.person_fine}">${info.punishment_paragraph.fine.person_fine}</option>
                    `);
                } else {

                    fine_cost_select.empty();
                    fine_cost_select.append(`
                        <option value="${info.punishment_paragraph.fine.min_fine}">${info.punishment_paragraph.fine.min_fine}</option>
                        <option value="${info.punishment_paragraph.fine.max_fine}">${info.punishment_paragraph.fine.max_fine}</option>
                    `);

                }

            });


            $('select[name="violation_category_id"]').on('change', function () {

                $('select[name="violation_fine_cost[]"]').empty();
                if ($(this).val() != 1) {

                    $('#not_personal').show();
                } else {

                    $('#not_personal').hide();
                }
            });


            $('.subject_p_select').select2();

            $('.other_officers').select2();


            $('.date_time').flatpickr({
                // defaultDate: "today",
                enableTime: true,
                dateFormat: "Y-m-d H:i",

            });

            $('select[name="violation_category_id"]').on('change', function () {
                if ($(this).val() != 1) {

                    $('#not_personal').show();
                } else {

                    $('#not_personal').hide();
                }
            });


        });


        let input = document.getElementById('tags');
        let tagify = new Tagify(input, {
            whitelist: {!! $lock_items !!},
            //  blacklist : [".NET", "PHP"] // <-- passed as an attribute in this demo
        });

        function addViolationRow() {
            let template = violationRow();
            let template_container = $('#newViolationContainer');
            template_container.append(template);

            $('.subject_p_select').select2();
        }

        let options_html = $('.subject_p_select').eq(0).html();

        if (!options_html) {
            options_html = '';
            @foreach($subject_punishment as $su_pm_p)
                options_html += `<option data-info="{{$su_pm_p}}"
            \@if($su_pm_p->subject_paragraph->trashed()) disabled \@endif
                \@if($su_pm_p->punishment_paragraph->trashed()) disabled \@endif
                value="{{$su_pm_p->id}}">{{__('violation.subject_number')}}
                . {{$su_pm_p->subject_paragraph->subject_rule->number ?? '-'}} {{$su_pm_p->subject_paragraph->title ?? '-'}}
                \@if($su_pm_p->subject_paragraph->trashed()) <span
        class="text-danger">(محذوف)</span> \@endif
                | {{__('violation.punishment_number')}}
                . {{$su_pm_p->punishment_paragraph->punishment_rule->number ?? '-'}} {{$su_pm_p->punishment_paragraph->title ?? '-'}}
                \@if($su_pm_p->punishment_paragraph->trashed()) <span
        class="text-danger">(محذوف)</span> \@endif
                </option>`
            @endforeach
        }

        function violationRow() {
            return `<div class="row">
                  <div class="col-md-6"><b>{{__('violation.subject_number')}}<star>*</star></b>
                        <button type="button" data-toggle="modal" data-target="#subject_modal_info" class="btn btn-sm btn-primary position-absolute right-15  tooltips"
                            aria-label="{{app()->getLocale() == 'ar' ? 'عرض تفاصيل ' : 'Show  Details'}}" style="z-index: 99;top: 23px;{{app()->getLocale() == 'en' ? 'right: 18px;'  : 'left: 18px;'}}">
                            <i class="la la-info"></i>
                        </button>
                        <select class="form-control subject_p_select" name="punishment_subject_paragraphs_id[]">
                               ${options_html}
                        </select>

                </div>
                <div class="col-md-2">
                    <b>{{__('violation.amount')}}</b>
                        <select name="violation_fine_cost[]" class="form-control">

                        </select>
                </div>

                    @can('admin-violation-cost')
                <div class="col-md-2">
                    <b>{{__('violation.amount')}} (admin)</b>
                                                                            <span class="input input--isao">
                                                                                    <input class="input__field input__field--isao arabicnumber" type="text"
                                                                                           name="amount_admin[]"
                                                                                           autocomplete="off"
                                                                                           />
                                                                                    <label class="input__label input__label--isao">
                                                                                    <span class="input__label-content input__label-content--isao">

                </span>
            </label>
          </span>
    </div>
@endcan
                <div class="col-md-2">
                    <button class="btn btn-danger btn-sm deleteRowViolation" type="button">
                        <i class="la la-close"></i>
                    </button>
                </div>
                </div>`;

        }
    </script>
@endsection
