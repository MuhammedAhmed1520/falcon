@extends('layouts.master')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    {{Html::style('assets/css/tagify.css')}}
    {{Html::style('assets/css/jquery.fileuploader.min.css')}}
    {{Html::style('https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/13.1.1/nouislider.css')}}
    <style>/**** Custom styles for noUiSlider ****/
        .noUi-connect {
            background: #3A8FFE;
        }

        .noUi-horizontal {
            height: 8px;
        }

        .noUi-horizontal .noUi-handle {
            width: 24px;
            height: 24px;
            left: -17px;
            top: -11px;
            border-radius: 50%;
        }

        .noUi-handle:before, .noUi-handle:after {
            display: none;
        }

        .noUi-horizontal .noUi-handle, .noUi-vertical .noUi-handle {
            background: #e8ecef;
        }

        .noUi-target.noUi-horizontal .noUi-tooltip {
            background-color: #3A8FFE;
        }

        /**** Custom styles for Range ****/
        input[type=range]::-webkit-slider-thumb {
            background-color: skyblue;
        }

        input[type=range]::-moz-range-thumb {
            background-color: skyblue;
        }

        input[type=range]::-ms-thumb {
            background-color: skyblue;
        }

        /* For the globe and the text inside */
        input[type=range] + .thumb {
            background-color: blue;
        }

        input[type=range] + .thumb.active .value {
            color: #fff;
        }

        .fileuploader-input .fileuploader-input-button, .fileuploader-popup .fileuploader-popup-content .fileuploader-popup-button.button-success {
            background: linear-gradient(135deg, #3A8FFE 0, #037bff 100%);
        }
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.violation.violation.add.templates.header')
                @include('pages.violation.violation.add.templates.content')
                @include('pages.violation.violation.add.templates.old_violation_modal')
                @include('pages.violation.violation.add.templates.subject_detail_modal')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/13.1.1/nouislider.min.js"></script>
    {{Html::script('assets/js/tagify.js')}}
    {{Html::script('assets/js/jQuery.tagify.min.js')}}
    {{Html::script('assets/js/jquery.fileuploader.min.js')}}
    {{Html::script('assets/js/typeahead.bundle.js')}}

    <script>
        let costSlider;
        $(document).ready(function () {
            setTimeout(function () {
                $('#_2').trigger("click");
                $('#_21').trigger("click");

            }, 60);

            // costSlider = document.getElementById('slider-cost');
            //
            // noUiSlider.create(costSlider, {
            //     start: 0,
            //     connect: [true, false],
            //     direction: 'ltr',
            //     // step:1,
            //     range: {
            //         'min': 0,
            //         'max': 0.0001
            //     }
            // });
            //
            // costSlider.noUiSlider.on('update', function (values, handle) {
            //     let value = costSlider.noUiSlider.get();
            //     $('input[name="violation_fine_cost"]').val(value);
            //     $('#fine_cost').text(value);
            // });


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

            let engine = new Bloodhound({
                remote: {
                    url: '{{route('search_area')}}' + '?name=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('name', 'name'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });
            
            // engine2.initialize();
            let engine2 = new Bloodhound({
                remote: {
                    url: '{{route('company-name')}}' + '?name=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('name', 'name'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });
        
            engine2.initialize();

            $('input[name="violation_area"]').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                source: engine.ttAdapter(),
                name: 'violationAreaList',
                displayKey: '%QUERY%',
                display: function (item) {
                    return item.name;
                },
                templates: {
                    empty: [
                        '<div class="list-group text-right search-results-dropdown"><div class="list-group-item">No Result</div></div>'
                    ],
                    header: [
                        '<div class="list-group text-right search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        // console.log(data)
                        return `<div class="list-item">${data.name}</div>`
                    }
                }
            }); 
            
            $('input[name="company_name"]').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                source: engine2.ttAdapter(),
                name: 'violationAreaList',
                displayKey: '%QUERY%',
                display: function (item) {
                    // console.log(item)
                    return item.name;
                },
                templates: {
                    empty: [
                        '<div class="list-group text-right search-results-dropdown"><div class="list-group-item">No Result</div></div>'
                    ],
                    header: [
                        '<div class="list-group text-right search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                        // console.log(data)
                        return `<div class="list-item">${data.name}</div>`
                    }
                }
            });
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
            $('select[name="violation_block"]').removeAttr('disabled');
            let action_id = $(this).val();
            if (action_id == 3) {
                $('select[name="violation_block"]').val(1).prop('disabled', 'disabled');
            }

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

        $('#subject_modal_info').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            console.log(button.siblings('select').find("option:selected").data('info'));
            let info = button.siblings('select').find("option:selected").data('info')
            if (info == undefined) {
                return;
            }
            console.log(info);
            // return;

            $('#subject_modal_infos').empty();

            $('#subject_modal_infos').append(`
                    <div class="row">
                        <div class="col-md-12">
                            <h4>
                                {{__('violation.subject_title')}}: ${info.subject_paragraph.subject_rule.title}
                                <br/>
                                {{__('violation.subject_number')}}: ${info.subject_paragraph.subject_rule.number}
                            </h4>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                    <legend>${info.subject_paragraph.title}</legend>
                                    <b>${info.subject_paragraph.details}</b>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tbody><tr class="d-nones">
                                    <td colspan="4">
                                        <b class="text-primary">${info.punishment_paragraph.title}</b>
                                        <br>
                                        <b>${info.punishment_paragraph.details}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>{{__('violation.punishment_min_fine')}}</b><br>
                                        <small>${info.punishment_paragraph.fine.min_fine}</small>
                                    </td>
                                    <td>
                                        <b>{{__('violation.punishment_max_fine')}}</b><br>
                                        <small>${info.punishment_paragraph.fine.max_fine}</small>
                                    </td>
                                    <td>
                                        <b>{{__('violation.punishment_min_jail')}}</b><br>
                                        <small>${info.punishment_paragraph.min_jail}  </small>
                                    </td>
                                    <td>
                                        <b>{{__('violation.punishment_max_jail')}}</b><br>
                                        <small>${info.punishment_paragraph.max_jail}  </small>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>
            `);
            $('input[name="violation_fine_cost"]').val(info.punishment_paragraph.min_fine);

        });

        $('#violations_modals').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let ssn = $('input[name="civilian_ssn"]').val();
            let company_name = $('input[name="company_name"]').val();

            let sent = ssn;
            if (button.attr('data-type') == 'company') {
                sent = company_name;
            }
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
                    }else{
                        $('#modal_body').append(`<tr><td colspan="7">NO Data</td></tr>`);
                        return;
                    }
                }
            })

        });

        $('#not_personal').hide();
        @if(old('violation_category_id') != 1 && old('violation_category_id'))

        $('#not_personal').show();
        @endif
        $(document).ready(function () {
            $('body').on('click', '.deleteRowViolation', function () {
                $(this).parents().eq(1).remove()
            });

            $('body').on('change', '.subject_p_select', function () {
                // $('#subject_modal').modal('show');
                let info = $(this).children("option:selected").data('info');
                 info = JSON.parse(JSON.stringify(info));
                //   console.log(JSON.stringify(info));

                // console.log();
                if (info == undefined) {
                    return;
                }
                let fine_cost_select = $(this).parents().eq(1).find('select[name="violation_fine_cost[]"]');
                // console.log(info.punishment_paragraph);

                // info.punishment_paragraph.fine.person_fine;
                // info.punishment_paragraph.fine.min_fine;
                // info.punishment_paragraph.fine.max_fine;
                if ($('select[name="violation_category_id"]').val() == 1) {
                    // console.log(info);
                    // $('#min').text(info.punishment_paragraph.fine.person_fine);
                    // $('#max').text(info.punishment_paragraph.fine.person_fine);
                    fine_cost_select.empty();
                    fine_cost_select.append(`
                        <option value="${info.punishment_paragraph.fine.person_fine}">${info.punishment_paragraph.fine.person_fine}</option>
                    `);
                    // costSlider.noUiSlider.updateOptions({
                    //     range: {
                    //         'min': info.punishment_paragraph.fine.person_fine,
                    //         'max': info.punishment_paragraph.fine.person_fine+0.0001
                    //     }
                    // });
                } else {

                    fine_cost_select.empty();
                    fine_cost_select.append(`
                        <option value="${info.punishment_paragraph.fine.min_fine}">${info.punishment_paragraph.fine.min_fine}</option>
                        <option value="${info.punishment_paragraph.fine.max_fine}">${info.punishment_paragraph.fine.max_fine}</option>
                    `);
                    // $('#min').text(info.punishment_paragraph.fine.min_fine);
                    // $('#max').text(info.punishment_paragraph.fine.max_fine);
                    // costSlider.noUiSlider.updateOptions({
                    //     range: {
                    //         'min': info.punishment_paragraph.fine.min_fine,
                    //         'max': info.punishment_paragraph.fine.max_fine
                    //     }
                    // });
                }

                // $('input[name="violation_fine_cost"]').val(info.punishment_paragraph.min_fine);
            });


            $('.subject_p_select').select2();

            $('.other_officers').select2();


            $('.date_time').flatpickr({
                defaultDate: "today",
                enableTime: true,
                dateFormat: "Y-m-d H:i",

            });

            $('select[name="violation_category_id"]').on('change', function () {

                $('select[name="violation_fine_cost[]"]').empty();
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