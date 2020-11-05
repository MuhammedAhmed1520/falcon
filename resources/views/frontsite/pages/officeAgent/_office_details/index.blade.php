@extends('frontsite.layouts.master_agent_layout')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    {{Html::style('assets/css/sweetalert2.min.css')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-5">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-2">
                                <img src="{{asset('assets/images/logo.png')}}" width="40" alt="">
                            </div>
                            <div class="col-md-10 text-right">
                                <ul class="list-unstyled">
                                    <li class="list-inline-item">
                                        <a href="{{asset('storage/files/references/qararoff.pdf')}}"
                                           class="font-weight-bold">
                                            القرارات و اللوائح
                                            <i class="icon icon-paperclip"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        |
                                        <a href="{{route('reset_password-office-agent')}}" class="font-weight-bold">
                                            تغيير كلمة المرور
                                            <i class="icon icon-lock"></i>
                                        </a>
                                    </li>
                                    @if(!checkSendAllowed($office_agent))
                                        <li class="list-inline-item">
                                            |
                                            <a href="{{route('update-profile-info-office-agent')}}"
                                               class="font-weight-bold">
                                                تغيير بيانات شخصية
                                                <i class="icon icon-user"></i>
                                            </a>
                                        </li>
                                    @endif
                                    <li class="list-inline-item">
                                        |
                                        <a href="{{route('logoutOfficeAgent')}}" class="font-weight-bold">
                                            تسجيل الخروج
                                            <i class="icon icon-log-out"></i>
                                        </a>
                                    </li>
                                    @if($office_agent->order_status_id == (getOfficeFinalOpinion('final_approval')->id ?? null))
                                        <li class="position-absolute" style="left: 20px;top: 40px;">
                                            <a href="{{route('getAgentCertify',['type'=>$office_agent->form_type])}}"
                                               class="btn btn-success">
                                                عرض وطباعة الشهادة
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        @if(session()->has('office_agent_errors'))
                            <div class="col-md-12">
                                @include('frontsite.pages.officeAgent.office_details.templates.alerts',['office_agent_errors'=>session()->get('office_agent_errors') ?? []])
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12 mt-1">
                                @include('frontsite.pages.officeAgent.office_details.templates.view_order_data')
                            </div>
                        </div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link font-weight-bold active" id="nav-home-tab" data-toggle="tab"
                                   href="#nav-home"
                                   role="tab" aria-controls="nav-home" aria-selected="true">
                                    @if(($office_agent['validation']['officeData'] ?? null) && ($office_agent['validation']['officeAttachments'] ?? null))
                                        <i class="icon icon-check-circle text-success"></i>
                                    @else
                                        <i class="icon icon-info text-danger"></i>
                                    @endif
                                    بيانات الشركة</a>
                                <a class="nav-item nav-link font-weight-bold" id="nav-profile-tab" data-toggle="tab"
                                   href="#nav-profile"
                                   role="tab" aria-controls="nav-profile" aria-selected="false">
                                    @if(($office_agent['validation']['humanResource'] ?? null))
                                        <i class="icon icon-check-circle text-success"></i>
                                    @else
                                        <i class="icon icon-info text-danger"></i>
                                    @endif
                                    الكوادر البشرية</a>
                                <a class="nav-item nav-link font-weight-bold" id="nav-contact-tab" data-toggle="tab"
                                   href="#nav-contact"
                                   role="tab" aria-controls="nav-contact" aria-selected="false">
                                    @if(($office_agent['validation']['devices'] ?? null) && ($office_agent['validation']['missedDevices'] ?? null))
                                        <i class="icon icon-check-circle text-success"></i>
                                    @else
                                        <i class="icon icon-info text-danger"></i>
                                    @endif
                                    الاجهزة والمعدات</a>
                                @if($office_agent->endorse_at)
                                    <a class="nav-item nav-link font-weight-bold" id="nav-study-tab" data-toggle="tab"
                                       href="#nav-study"
                                       role="tab" aria-controls="nav-study" aria-selected="false"> الدراسات
                                        والتقارير</a>
                                @endif
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                 aria-labelledby="nav-home-tab">
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        @include('frontsite.pages.officeAgent.office_details.templates.order_detail')
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                 aria-labelledby="nav-profile-tab">
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        @include('frontsite.pages.officeAgent.office_details.templates.human_resources')
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                 aria-labelledby="nav-contact-tab">
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        @include('frontsite.pages.officeAgent.office_details.templates.installment_resources')
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-study" role="tabpanel"
                                 aria-labelledby="nav-study-tab">
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        @include('frontsite.pages.officeAgent.office_details.templates.reports_details')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontsite.pages.officeAgent.office_details.templates.modals')
@endsection
@section('scripts')
    {{Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}
    {{Html::script('assets/js/jquery.mask.min.js')}}
    {{Html::script('assets/js/jquery.validate.min.js')}}
    {{Html::script('assets/js/additional-methods.min.js')}}

    {{Html::script('assets/js/sweetalert2.all.min.js')}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script>
        if (!String.prototype.includes) {
            String.prototype.includes = function (search, start) {
                'use strict';
                if (typeof start !== 'number') {
                    start = 0;
                }

                if (start + search.length > this.length) {
                    return false;
                } else {
                    return this.indexOf(search, start) !== -1;
                }
            };
        }
        $(document).ready(function () {
            $('.phone').mask('00000000');
            $('.ssn').mask('000000000000');

            $(".arabic_character").keypress(function (e) {

                var arabicCharUnicodeRange = /[\u0600-\u06FF]/;
                var key = event.which;

                if (key == 8 || key == 0 || key === 32) {
                    return true;
                }
                var str = String.fromCharCode(key);
                if (arabicCharUnicodeRange.test(str)) {
                    return true;
                }
                return false;
            });
        });
        $(document).ready(function () {
            let company_attachment_table = $('#company_attachment_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                }
            });
            let company_partner_table = $('#company_partner_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                }
            });
            let branches_partner_table = $('#branches_partner_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                }
            });
            let all_employees_table = $('#all_employees_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                }
            });
            let employee_attachment_table = $('#employee_attachment_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                }
            });
            let all_installment_table = $('#all_installment_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                }
            });
            $('#installment_attachment_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                }
            });
            let reports_attachment_table = $('#reports_attachment_table').DataTable({
                paging: true,
                searching: false,
                "language": {
                    search: "بحث ",
                    searchPlaceholder: "  ابحث هنا"
                }
            });


            $('.date').flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",

            });
            $('.license_end_date').flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",

            });
            $('.contract_end_date').flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",

            });

            $('input[name="specialize_ids[]"]').on('change', function () {
                let specialize_ids = $('input[name="specialize_ids[]"]:checked').map(function () {
                    return $(this).val();
                }).get();
                showAlerts(specialize_ids);
            });

            function showAlerts(specialize_ids) {
                $('.special-alerts').hide();
                $.each(specialize_ids, function (index, item) {
                    $('#special_' + item).show();
                })
            }


            $('select[name="governorate_id"]').on('change', function () {
                let governorate_id = $(this).val();
                let get_id = $(this).attr('id');
                let set_id = null;
                if (get_id == 'company_gov') {
                    set_id = '#company_city'
                }
                if (get_id == 'branch_gov') {
                    set_id = '#branch_city'
                }
                if (!governorate_id) {
                    return;
                }
                $.ajax({
                    url: "{{route('getCity')}}" + '/' + governorate_id,
                    data: {
                        id: governorate_id,
                        _token: '{{csrf_token()}}'
                    },
                    type: 'get',
                    success: function (response) {
                        console.log(response)
                        if (response.status) {
                            $(set_id).empty();
                            $(set_id).append('<option value=""> -- choose -- </option>');
                            $.each(response.data.cities, function (index, item) {
                                $(set_id).append('<option value="' + item.id + '">' + item.translated.name + '</option>');
                            })
                            return;
                        }
                        alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                    }
                })
            });


            $('select[name="company_type_id"]').on('change', function () {

                let company_type_id = $(this).val();
                if (company_type_id == 9) {
                    $('#nav-profile-tab2').hide()
                } else {
                    $('#nav-profile-tab2').show()
                }

            });

            $('select[name="classification_degree_id"]').on('change', function () {

                let classification_degree_id = $(this).val();
                if (classification_degree_id == 16) {
                    $('select[name="lab_type_id"]').parents().eq(0).show()
                } else {
                    $('select[name="lab_type_id"]').parents().eq(0).hide()
                }


                $('.class_degree_ids').hide()
                $('#class_degree_id_' + classification_degree_id).show()
                $('#class2_degree_id_' + classification_degree_id).show()
            });

            $('select[name="job_id"]').on('change', function () {
                let job_id = $(this).val();

                let get_id = $(this).attr('id');
                let set_id = null;
                if (get_id == 'add_job_id') {
                    set_id = '#add_emp_job_title'
                }

                if (get_id == 'edit_job_id') {
                    set_id = '#edit_emp_job_title'
                }

                if (!job_id || job_id == 49) {
                    $(set_id).show()
                    console.log(set_id)
                } else {
                    $(set_id).hide()
                }
                if (job_id == 44 || job_id == 45 || job_id == 46 || job_id == 81) {

                    $('#AddHumanResourceEmployeeForm input[name="phone"]').parents().eq(0).show()
                    $('#AddHumanResourceEmployeeForm input[name="email"]').parents().eq(0).show()
                } else {

                    $('#AddHumanResourceEmployeeForm input[name="phone"]').parents().eq(0).hide()
                    $('#AddHumanResourceEmployeeForm input[name="email"]').parents().eq(0).hide()
                }

            });
            // select_job_id

            $('select[name="specialization_id"]').on('change', function () {
                let specialization_id = $(this).val();
                console.log(specialization_id)
                let get_id = $(this).attr('id');
                let set_id = null;
                if (get_id == 'employee_add_specialization') {
                    set_id = '#add_emp_specialize'
                }
                if (get_id == 'employee_edit_specialization') {
                    set_id = '#edit_emp_specialize'
                }
                if (specialization_id == 58) {
                    $(set_id).show()
                } else {
                    $(set_id).hide()
                }


            });

            $('#another_branch_type').on('change', function () {
                let type = $(this).val();
                if (type == 12) {
                    $('#branch_in').show();
                    $('#branch_out').hide();
                } else if (type == 13) {
                    $('#branch_in').hide();
                    $('#branch_out').show();
                } else {

                    $('#branch_in').hide();
                    $('#branch_out').hide();
                }
            })

            $('#officeAgentUpdateCompanyAttachmentForm').on('submit', function (e) {
                e.preventDefault();
                let form = this;
                let form_data = new FormData(form);
                form_data.append('_token', '{{csrf_token()}}')
                $.ajax({
                    url: '{{route('officeAgentUpdateCompanyAttachment')}}',
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: form_data,
                    success: function (response) {
                        if (response.status) {

                            company_attachment_table.row.add([
                                response.data.file.file_type.title_ar,
                                '<a href="' + response.data.file.file_path + '">تحميل</a>',
                                '<a class="btn btn-sm btn-danger"' +
                                'href="javascript:deleteCompanyFile(\'' + response.data.file.id + '\')">' +
                                '<i class="icon icon-trash mr-0"></i></a>'
                            ]).node().id = 'company_attachment_file_' + response.data.file.id
                            company_attachment_table.draw(false);
                            alert('تمت العملية بنجاح')
                            //
                            // $('#partner_add_close').trigger('click')
                            return;
                        }
                        alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                    },
                    xhr: function () {
                        let xhr = $.ajaxSettings.xhr();
                        xhr.upload.onprogress = function (e) {
                            // For uploads
                            if (e.lengthComputable) {
                                let percentage = (e.loaded / e.total) * 100;
                                // console.log(percentage)
                                $('#company_attachment_progress').css({width: percentage + '%'}).text(parseFloat(percentage).toFixed(2) + '%')
                                if (percentage == 100) {
                                    // Swal.fire({
                                    //     title: 'نجاح',
                                    //     text: 'تمت العملية بنجاح',
                                    //     type: 'success',
                                    //     timer: 2000
                                    // })
                                    $('#company_attachment_close').trigger('click')
                                    form.reset()
                                }
                            }
                        };
                        return xhr;
                    }
                })
            });

            $('#officeAgentAddEmployeeAttachmentForm').on('submit', function (e) {
                e.preventDefault();
                let form = this;
                let form_data = new FormData(form);
                form_data.append('_token', '{{csrf_token()}}')
                $.ajax({
                    url: '{{route('officeAgentAddEmployeeAttachment')}}',
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: form_data,
                    success: function (response) {
                        if (response.status) {
                            employee_attachment_table.row.add([
                                null,
                                response.data.attachment.human_resource_id,
                                response.data.attachment.file_type.title_ar + '<a href="' + response.data.attachment.file_path + '"> تنزيل  </a>',
                                '<a class="btn btn-danger"  href="javascript:deleteCompanyFile(\'' + response.data.attachment.id + '\')">' +
                                '<i class="icon icon-trash mr-0"></i></a>'
                            ]).node().id = 'attachment_employee_' + response.data.attachment.id;
                            employee_attachment_table.draw(false);
                            alert('تمت العملية بنجاح');
                            $('#employee_attachment_close').trigger('click')
                            form.reset();
                            $('#employee_attachment_progress').css({width: 0 + '%'}).text(parseFloat(0).toFixed(2) + '%')
                            //
                            // $('#partner_add_close').trigger('click')
                            return;
                        }
                        alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                    },
                    xhr: function () {
                        let xhr = $.ajaxSettings.xhr();
                        xhr.upload.onprogress = function (e) {
                            // For uploads
                            if (e.lengthComputable) {
                                let percentage = (e.loaded / e.total) * 100;
                                // console.log(percentage)
                                $('#employee_attachment_progress').css({width: percentage + '%'}).text(parseFloat(percentage).toFixed(2) + '%')
                            }
                        };
                        return xhr;
                    }
                })
            });

            $('#officeAgentAddInstallmentAttachmentForm').on('submit', function (e) {
                e.preventDefault();
                let form = this;
                let form_data = new FormData(form);
                form_data.append('_token', '{{csrf_token()}}')
                $.ajax({
                    url: '{{route('officeAgentAddInstallmentAttachment')}}',
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: form_data,
                    success: function (response) {
                        if (response.status) {
                            alert('تمت العملية بنجاح')
                            $('#installment_attachment_close').trigger('click')
                            form.reset();
                            $('#installment_attachment_progress').css({width: 0 + '%'}).text(parseFloat(0).toFixed(2) + '%')
                            //
                            // $('#partner_add_close').trigger('click')
                        }
                    },
                    xhr: function () {
                        let xhr = $.ajaxSettings.xhr();
                        xhr.upload.onprogress = function (e) {
                            // For uploads
                            if (e.lengthComputable) {
                                let percentage = (e.loaded / e.total) * 100;
                                // console.log(percentage)
                                $('#installment_attachment_progress').css({width: percentage + '%'}).text(parseFloat(percentage).toFixed(2) + '%')
                            }
                        };
                        return xhr;
                    }
                })
            });

            $('#handleCompanyAddBranchRequestForm').on('submit', function (e) {
                e.preventDefault();
                let form_data = new FormData(this);
                form_data.append('_token', '{{csrf_token()}}')
                $.ajax({
                    url: '{{route('handleCompanyAddBranchRequest')}}',
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: form_data,
                    success: function (response) {
                        if (response.status) {
                            branches_partner_table.row.add([
                                response.data.address.id,
                                null,
                                response.data.address.full_address,
                                '<a class="btn btn-danger" href="javascript:deleteBranchAddress(\'' + response.data.address.id + '\')">' +
                                '<i class="icon icon-trash mr-0"></i></a>'
                            ]).node().id = 'branch_address_' + response.data.address.id
                            branches_partner_table.draw(false);
                            alert('تمت العملية بنجاح')
                            $('#branches_add_close').trigger('click')
                            return;
                        }
                        alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                    }
                })
            });

            $('#officeAgentUpdateInfoForm').submit(function (e) {
                e.preventDefault()
            }).validate(
                {
                    onkeyup: false,
                    onclick: false,
                    onfocusout: false,

                    //validation rules
                    rules: {
                        office_name_ar: {
                            required: true
                        },
                        owner_name: {
                            required: true
                        },
                        owner_phone: {
                            minlength: 8
                        },
                        office_phone: {
                            minlength: 8
                        },
                        contact_officer_phone: {
                            minlength: 8
                        },
                        owner_ssn: {
                            minlength: 12
                        },
                        owner_email: {
                            required: true,
                            email: true
                        }

                    },

                    //validation messages
                    messages: {},

                    highlight: function (element, errorClass, validClass) {
                        console.log(element)
                    },

                    //submit handler
                    submitHandler: function (form) {

                        let form_data = new FormData(form);
                        {{--form_data.append('_token', '{{csrf_token()}}')--}}
                        $.ajax({
                            url: '{{route('officeAgentUpdateInfo')}}',
                            type: 'post',
                            processData: false,
                            contentType: false,
                            data: form_data,
                            success: function (response) {
                                console.log(response)
                                if (response.status) {
                                    alert('تمت العملية بنجاح')
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            }
                        })
                    }

                });


            $('#handleCompanyAddPartenerRequestForm').submit(function (e) {
                e.preventDefault()
            }).validate(
                {
                    onkeyup: false,
                    onclick: false,
                    onfocusout: false,

                    //validation rules
                    rules: {
                        ssn: {
                            minlength: 12
                        }

                    },

                    //validation messages
                    messages: {},

                    //submit handler
                    submitHandler: function (form) {

                        let form_data = new FormData(form);
                        {{--form_data.append('_token', '{{csrf_token()}}')--}}
                        $.ajax({
                            url: '{{route('handleCompanyAddPartenerRequest')}}',
                            type: 'post',
                            data: form_data,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                if (response.status) {
                                    company_partner_table.row.add([
                                        null,
                                        response.data.officePartner.name,
                                        response.data.officePartner.ssn,
                                        response.data.officePartner.notes,
                                        '<a class="btn btn-danger"href="javascript:deleteCompanyPartner(\'' + response.data.officePartner.id + '\')">' +
                                        '<i class="icon icon-trash mr-0"></i></a>'
                                    ]).node().id = 'company_partner_' + response.data.officePartner.id
                                    company_partner_table.draw(false);
                                    alert('تمت العملية بنجاح')
                                    //
                                    $('#partner_add_close').trigger('click')
                                    $('#partner_add_progress').css({width: 0 + '%'}).text(parseFloat(0).toFixed(2) + '%')
                                    form.reset()
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            },
                            xhr: function () {
                                let xhr = $.ajaxSettings.xhr();
                                xhr.upload.onprogress = function (e) {
                                    // For uploads
                                    if (e.lengthComputable) {
                                        let percentage = (e.loaded / e.total) * 100;
                                        // console.log(percentage)
                                        $('#partner_add_progress').css({width: percentage + '%'}).text(parseFloat(percentage).toFixed(2) + '%')
                                        if (percentage == 100) {
                                            // Swal.fire({
                                            //     title: 'نجاح',
                                            //     text: 'تمت العملية بنجاح',
                                            //     type: 'success',
                                            //     timer: 2000
                                            // })
                                        }
                                    }
                                };
                                return xhr;
                            }
                        })
                    }

                });


            $('#AddHumanResourceEmployeeForm').submit(function (e) {
                e.preventDefault()
            }).validate(
                {
                    onkeyup: false,
                    onclick: false,
                    onfocusout: false,

                    //validation rules
                    rules: {
                        ssn: {
                            minlength: 12
                        },
                        email: {
                            email: true
                        },
                        job_id: {
                            required: true
                        }

                    },

                    //validation messages
                    messages: {},

                    highlight: function (element, errorClass, validClass) {
                        console.log(element)
                    },

                    //submit handler
                    submitHandler: function (form) {

                        let form_data = new FormData(form);
                        form_data.append('_token', '{{csrf_token()}}')
                        $.ajax({
                            url: '{{route('AddHumanResourceEmployee')}}',
                            type: 'post',
                            processData: false,
                            contentType: false,
                            data: form_data,
                            success: function (response) {
                                console.log(response.data.humanResource)
                                if (response.status) {
                                    // if (response.is_create) {
                                    //     all_employees_table.row.add([
                                    //         null,
                                    //         response.data.humanResource.job.title_ar,
                                    //         response.data.humanResource.name,
                                    //         response.data.humanResource.parent_name,
                                    //         response.data.humanResource.family_name,
                                    //         response.data.humanResource.nationality,
                                    //         response.data.humanResource.specialization.title_ar + response.data.humanResource.specialization_title,
                                    //         response.data.humanResource.degree.title_ar + response.data.humanResource.job_title,
                                    //         '<button class="btn btn-info"id="employee_row_' + response.data.humanResource.id + '"  onclick="editEmployee(\'' + encodeURIComponent(JSON.stringify(response.data.humanResource)) + '\')"> <i class="icon icon-edit mr-0"></i> </button>' +
                                    //         '<a class="btn btn-danger" href="javascript:deleteEmployee(\'' + response.data.humanResource.id + '\')">' +
                                    //         '<i class="icon icon-trash mr-0"></i></a>'
                                    //     ]).node().id = 'all_employee_' + response.data.humanResource.id
                                    //     all_employees_table.draw(false);
                                    // } else {
                                    //     let buttonData = 'editEmployee(\'' + encodeURIComponent(JSON.stringify(response.data.humanResource)) + '\')';
                                    //     $('#employee_row_' + response.data.humanResource.id).attr("onclick", buttonData);
                                    // }
                                    if (!response.is_create) {
                                        let oTable = $('#all_employees_table').dataTable();
                                        oTable.fnDeleteRow(oTable.find('#all_employee_' + response.data.humanResource.id).eq(0))
                                    }
                                    all_employees_table.row.add([
                                        null,
                                        response.data.humanResource.job.title_ar,
                                        response.data.humanResource.name,
                                        response.data.humanResource.parent_name,
                                        response.data.humanResource.family_name,
                                        response.data.humanResource.nationality,
                                        response.data.humanResource.work_duration,
                                        response.data.humanResource.expert_years_number,
                                        response.data.humanResource.work_date,
                                        response.data.humanResource.degree ? response.data.humanResource.degree.title_ar : '' + response.data.humanResource.job_title,
                                        response.data.humanResource.specialization ? response.data.humanResource.specialization.title_ar : '' + response.data.humanResource.specialization_title,
                                        '<button class="btn btn-info" id="employee_row_' + response.data.humanResource.id + '" onclick="editEmployee(\'' + encodeURIComponent(JSON.stringify(response.data.humanResource)) + '\')"> <i class="icon icon-edit mr-0"></i> </button>' +
                                        '<a class="btn btn-danger" href="javascript:deleteEmployee(\'' + response.data.humanResource.id + '\')">' +
                                        '<i class="icon icon-trash mr-0"></i></a>'
                                    ]).node().id = 'all_employee_' + response.data.humanResource.id
                                    all_employees_table.draw(false);
                                    alert('تمت العملية بنجاح')
                                    $('#employee_add_close').trigger('click');
                                    form.reset()
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            }
                        })
                    }

                });

            $('#updateHumanResourceEmployeeForm').submit(function (e) {
                e.preventDefault()
            }).validate(
                {
                    onkeyup: false,
                    onclick: false,
                    onfocusout: false,

                    //validation rules
                    rules: {
                        ssn: {
                            minlength: 12
                        },
                        email: {
                            email: true
                        },
                        job_id: {
                            required: true
                        }

                    },

                    //validation messages
                    messages: {},

                    highlight: function (element, errorClass, validClass) {
                        console.log(element)
                    },

                    //submit handler
                    submitHandler: function (form) {

                        let form_data = new FormData(form);
                        {{--form_data.append('_token', '{{csrf_token()}}')--}}
                        $.ajax({
                            url: '{{route('updateHumanResourceEmployee')}}',
                            type: 'post',
                            processData: false,
                            contentType: false,
                            data: form_data,
                            success: function (response) {
                                console.log(response.data.humanResource)
                                if (response.status) {
                                    alert('تمت العملية بنجاح')
                                    $('#employee_add_close').trigger('click');
                                    form.reset()
                                    $('#edit_employee_btn').prop("disabled", true);
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            }
                        })
                    }

                });

            $('#officeAgentAddStudyForm').submit(function (e) {
                e.preventDefault()
            }).validate(
                {
                    onkeyup: false,
                    onclick: false,
                    onfocusout: false,

                    //validation rules
                    rules: {
                        file: {
                            required: true
                        },
                        name: {
                            required: true
                        }

                    },

                    //validation messages
                    messages: {},

                    highlight: function (element, errorClass, validClass) {
                        console.log(element)
                    },

                    //submit handler
                    submitHandler: function (form) {

                        let form_data = new FormData(form);
                        {{--form_data.append('_token', '{{csrf_token()}}')--}}
                        $.ajax({
                            url: '{{route('officeAgentAddStudy')}}',
                            type: 'post',
                            processData: false,
                            contentType: false,
                            data: form_data,
                            success: function (response) {
                                console.log(response.data)
                                if (response.status) {

                                    reports_attachment_table.row.add([
                                        null,
                                        response.data.officeStudy.name,
                                        response.data.officeStudy.notes,
                                        '<a href="' + response.data.officeStudy.file_path + '">تنزيل</a>',
                                        '<a class="btn btn-danger" href="javascript:deleteStudy(\'' + response.data.officeStudy.id + '\')">' +
                                        '<i class="icon icon-trash mr-0"></i></a>'
                                    ]).node().id = 'all_study_table_' + response.data.officeStudy.id
                                    reports_attachment_table.draw(false);
                                    alert('تمت العملية بنجاح')
                                    form.reset();
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            }
                        })
                    }

                });

            $('#officeAgentAddInstallmentForm').submit(function (e) {
                e.preventDefault()
            }).validate(
                {
                    onkeyup: false,
                    onclick: false,
                    onfocusout: false,

                    //validation rules
                    rules: {
                        number: {
                            digits: true,
                            required: true
                        },
                        serial: {
                            required: true
                        }

                    },

                    //validation messages
                    messages: {},

                    highlight: function (element, errorClass, validClass) {
                        console.log(element)
                    },

                    //submit handler
                    submitHandler: function (form) {

                        let form_data = new FormData(form);
                        form_data.append('_token', '{{csrf_token()}}')
                        $.ajax({
                            url: '{{route('officeAgentAddInstallment')}}',
                            type: 'post',
                            processData: false,
                            contentType: false,
                            data: form_data,
                            success: function (response) {
                                console.log(response.data)
                                if (response.status) {

                                    // if (response.is_create) {
                                    //
                                    //     all_installment_table.row.add([
                                    //         null,
                                    //         response.data.officeDevice.device_type.name,
                                    //         response.data.officeDevice.number,
                                    //         response.data.officeDevice.serial,
                                    //         '<a class="btn btn-info" id="device_row_' + response.data.officeDevice.id + '" onclick="editInstallment(\'' + encodeURIComponent(JSON.stringify(response.data.officeDevice)) + '\')">' +
                                    //         '<i class="icon icon-edit mr-0"></i></a>' +
                                    //         '<a class="btn btn-danger" href="javascript:deleteInstallment(\'' + response.data.officeDevice.id + '\')">' +
                                    //         '<i class="icon icon-trash mr-0"></i></a>'
                                    //     ]).node().id = 'all_installment_table_' + response.data.officeDevice.id
                                    //     all_installment_table.draw(false);
                                    //     $('select[name="device_id"]').append('<option value="' + response.data.officeDevice.id + '">' + response.data.officeDevice.device_type.name + '</option>')
                                    // } else {
                                    //
                                    //     let buttonData = 'editInstallment(\'' + encodeURIComponent(JSON.stringify(response.data.officeDevice)) + '\')';
                                    //     $('#device_row_' + response.data.officeDevice.id).attr("onclick", buttonData);
                                    // }

                                    if (!response.is_create) {
                                        let oTable = $('#all_installment_table').dataTable();
                                        oTable.fnDeleteRow(oTable.find('#all_installment_table_' + response.data.officeDevice.id).eq(0))
                                    }
                                    all_installment_table.row.add([
                                        null,
                                        response.data.officeDevice.device_type.name,
                                        response.data.officeDevice.number,
                                        response.data.officeDevice.serial,
                                        '<button class="btn btn-info"  id="device_row_' + response.data.officeDevice.id + '" onclick="editInstallment(\'' + encodeURIComponent(JSON.stringify(response.data.officeDevice)) + '\')">' +
                                        '<i class="icon icon-edit mr-0"></i></button>' +
                                        '<a class="btn btn-danger" href="javascript:deleteInstallment(\'' + response.data.officeDevice.id + '\')">' +
                                        '<i class="icon icon-trash mr-0"></i></a>'
                                    ]).node().id = 'all_installment_table_' + response.data.officeDevice.id
                                    all_installment_table.draw(false);
                                    if (response.is_create) {
                                        $('select[name="device_id"]').append('<option value="' + response.data.officeDevice.id + '">' + response.data.officeDevice.device_type.name + '</option>')
                                    }
                                    alert('تمت العملية بنجاح')
                                    form.reset()
                                    $('#installment_add_close').trigger('click');
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            }
                        })
                    }

                });

            $('#officeAgentUpdateDeviceForm').submit(function (e) {
                e.preventDefault()
            }).validate(
                {
                    onkeyup: false,
                    onclick: false,
                    onfocusout: false,

                    //validation rules
                    rules: {
                        number: {
                            digits: true,
                            required: true
                        },
                        serial: {
                            required: true
                        }

                    },

                    //validation messages
                    messages: {},

                    highlight: function (element, errorClass, validClass) {
                        console.log(element)
                    },

                    //submit handler
                    submitHandler: function (form) {

                        let form_data = new FormData(form);
                        {{--form_data.append('_token', '{{csrf_token()}}')--}}
                        $.ajax({
                            url: '{{route('officeAgentUpdateDevice')}}',
                            type: 'post',
                            processData: false,
                            contentType: false,
                            data: form_data,
                            success: function (response) {
                                if (response.status) {
                                    alert('تمت العملية بنجاح')
                                    form.reset()
                                    $('#installment_update_btn').prop("disabled", true);
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            }
                        })
                    }

                });
        });

        function deleteCompanyFile(id) {
                @if (Browser::isIE())
            let check = confirm('هل انت متأكد')
            if (check) {
                $.ajax({
                    url: '{{route('officeAgentDeleteAttachment')}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#company_attachment_file_' + id).remove()
                            var oTable = $('#company_attachment_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#company_attachment_file_' + id).eq(0))
                            return;
                        }
                        alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                    }
                })
            }

            @else

            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('officeAgentDeleteAttachment')}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#company_attachment_file_' + id).remove()
                                    var oTable = $('#company_attachment_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#company_attachment_file_' + id).eq(0))
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {

                }
            })
            @endif
        }

        function deleteCompanyPartner(id) {
                @if (Browser::isIE())
            let check = confirm('هل انت متأكد')
            if (check) {

                $.ajax({
                    url: '{{route('officeAgentDeleteCompanyPartner')}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#company_partner_' + id).remove()
                            var oTable = $('#company_partner_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#company_partner_' + id).eq(0))
                            return;
                        }
                        alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                    }
                })
            }
            @else
            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('officeAgentDeleteCompanyPartner')}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#company_partner_' + id).remove()
                                    var oTable = $('#company_partner_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#company_partner_' + id).eq(0))
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {

                }
            })
            @endif
        }

        function deleteBranchAddress(id) {
                @if (Browser::isIE())
            let check = confirm('هل انت متأكد')
            if (check) {

                $.ajax({
                    url: '{{route('officeAgentDeleteBranchAddress')}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#branch_address_' + id).remove()
                            var oTable = $('#branches_partner_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#branch_address_' + id).eq(0))
                            return;
                        }
                        alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                    }
                })
            }
            @else
            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('officeAgentDeleteBranchAddress')}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#branch_address_' + id).remove()
                                    var oTable = $('#branches_partner_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#branch_address_' + id).eq(0))
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {

                }
            })
            @endif
        }

        function deleteEmployee(id) {
                @if (Browser::isIE())
            let check = confirm('هل انت متأكد')
            if (check) {

                $.ajax({
                    url: '{{route('deleteHumanResourceEmployeeRequest')}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#all_employee_' + id).remove()
                            let oTable = $('#all_employees_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#all_employee_' + id).eq(0))
                            return;
                        }
                        alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                    }
                })
            }
            @else
            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('deleteHumanResourceEmployeeRequest')}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#all_employee_' + id).remove()
                                    let oTable = $('#all_employees_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#all_employee_' + id).eq(0))
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {

                }
            })
            @endif
        }

        function deleteInstallment(id) {
                @if (Browser::isIE())
            let check = confirm('هل انت متأكد')
            if (check) {

                $.ajax({
                    url: '{{route('deleteInstallmentRequest')}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#all_installment_table_' + id).remove()
                            let oTable = $('#all_installment_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#all_installment_table_' + id).eq(0))
                            return;
                        }
                        alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                    }
                })
            }
            @else
            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('deleteInstallmentRequest')}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#all_installment_table_' + id).remove()
                                    let oTable = $('#all_installment_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#all_installment_table_' + id).eq(0))
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {

                }
            })
            @endif
        }

        function deleteHumanResourceFile(id) {
                @if (Browser::isIE())
            let check = confirm('هل انت متأكد')
            if (check) {

                $.ajax({
                    url: '{{route('deleteHumanResourceFileRequest')}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#attachment_employee_' + id).remove()
                            var oTable = $('#employee_attachment_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#attachment_employee_' + id).eq(0))
                            return;
                        }
                        alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                    }
                })
            }
            @else
            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('deleteHumanResourceFileRequest')}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#attachment_employee_' + id).remove()
                                    var oTable = $('#employee_attachment_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#attachment_employee_' + id).eq(0))
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {

                }
            })
            @endif
        }

        function deleteInstallmentFile(id) {
                @if (Browser::isIE())
            let check = confirm('هل انت متأكد')
            if (check) {

                $.ajax({
                    url: '{{route('deleteInstallmentAttachmentRequest')}}',
                    type: 'post',
                    data: {
                        id: id,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.status) {
                            // $('#all_installment_attachment_' + id).remove()
                            let oTable = $('#installment_attachment_table').dataTable();
                            oTable.fnDeleteRow(oTable.find('#all_installment_attachment_' + id).eq(0))
                            return;
                        }
                        alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                    }
                })
            }
            @else
            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('deleteInstallmentAttachmentRequest')}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#all_installment_attachment_' + id).remove()
                                    let oTable = $('#installment_attachment_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#all_installment_attachment_' + id).eq(0))
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {

                }
            })
            @endif
        }

        function deleteStudy(id) {
            Swal.fire({
                title: 'هل انت متأكد ؟',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                showLoaderOnConfirm: true,
                preConfirm: function (check) {
                    if (check) {
                        $.ajax({
                            url: '{{route('deleteofficeAgentStudyRequest')}}',
                            type: 'post',
                            data: {
                                id: id,
                                _token: '{{csrf_token()}}'
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $('#all_study_table_' + id).remove()
                                    let oTable = $('#reports_attachment_table').dataTable();
                                    oTable.fnDeleteRow(oTable.find('#all_study_table_' + id).eq(0))
                                    return;
                                }
                                alert('ﻻ يمكن التعديل بعد عملية ارسال الطلب')
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
            }).then(function (result) {
                if (result.value) {

                }
            })
        }


        function appendIsoDegree() {
            $('#iso_degree_table').append("\n" +
                "                <div class=\"col-md-4\">\n" +
                "                    <label class=\"font-weight-bold text-black\"> {{__('office_agent.other_iso_cert')}}        </label>\n" +
                "                    <div class=\"input-group  w-100\">\n" +
                "                        <div class=\"input-group-prepend\">\n" +
                "                            <button class=\"btn btn-danger deleteIsoDegree\" type=\"button\">\n" +
                "                                <i class=\"icon icon-minus\"></i>\n" +
                "                            </button>\n" +
                "                        </div>\n" +
                "                        <input class=\"form-control\" name=\"iso_degree[]\">\n" +
                "                    </div>\n" +
                "                </div>")
        }

        $(document).on('click', '.deleteIsoDegree', function () {
            $(this).parents().eq(2).remove()
        });

        // done admin
        function resetToAddEmployee() {

            $('#AddHumanResourceEmployeeForm').trigger('reset');
            $('#AddHumanResourceEmployeeForm  input').val('');
            $('#AddHumanResourceEmployeeForm  select').prop('selectedIndex', 0);
        }

        function editEmployee(employee) {
            $('#employee_add_modal_btn').trigger('click');

            employee = JSON.parse(decodeURIComponent(employee));
            // employee = JSON.parse(employee);

            $('#edit_employee_btn').prop("disabled", false);
            let form = $('#AddHumanResourceEmployeeForm');

            form.find('input[name="human_resource_id"]').val(employee.id)
            form.find('input[name="name"]').val(employee.name)
            form.find('input[name="parent_name"]').val(employee.parent_name)
            form.find('input[name="family_name"]').val(employee.family_name)
            form.find('input[name="ssn"]').val(employee.ssn)
            form.find('input[name="email"]').val(employee.email)
            form.find('input[name="residence_end_date"]').val(employee.residence_end_date)
            form.find('input[name="phone"]').val(employee.phone)
            form.find('input[name="job_title"]').val(employee.job_title)
            form.find('input[name="specialization_title"]').val(employee.specialization_title)

            form.find('select[name="job_id"]').val(employee.job_id)
            form.find('select[name="nationality"]').val(employee.nationality)
            form.find('select[name="gender"]').val(employee.gender)

            form.find('input[name="work_duration"]').val(employee.work_duration)
            form.find('input[name="expert_years_number"]').val(employee.expert_years_number)
            form.find('input[name="work_date"]').val(employee.work_date)

            form.find('select[name="specialization_id"]').val(employee.specialization_id).trigger('change')
            form.find('select[name="degree_id"]').val(employee.degree_id).trigger('change')

            if (employee.job_id == 44 || employee.job_id == 45 || employee.job_id == 81) {

                $('#AddHumanResourceEmployeeForm input[name="phone"]').parents().eq(0).show()
                $('#AddHumanResourceEmployeeForm input[name="email"]').parents().eq(0).show()
            } else {

                $('#AddHumanResourceEmployeeForm input[name="phone"]').parents().eq(0).hide()
                $('#AddHumanResourceEmployeeForm input[name="email"]').parents().eq(0).hide()
            }
        }

        function resetToAddInsatllment() {

            $('#officeAgentAddInstallmentForm').trigger('reset');
            $('#officeAgentAddInstallmentForm  input').val('');
            $('#officeAgentAddInstallmentForm  select').prop('selectedIndex', 0);
        }


        function loadEmployessData() {
            $.ajax({
                url: '{{route('ApiGetAllHumanResource',['id'=>$office_agent->id])}}',
                type: 'GET',
                data: {},
                success: function (response) {
                    if (response.status) {
                        let officeHRs = response.data.officeHRs;
                        $('#officeAgentAddEmployeeAttachmentForm select[name="human_resource_id"]').empty();
                        $('#officeAgentAddEmployeeAttachmentForm select[name="human_resource_id"]').append('<option value="">-- {{__('office_agent.choose')}}-- </option>');

                        $.each(officeHRs, function (index, hr) {
                            $('#officeAgentAddEmployeeAttachmentForm select[name="human_resource_id"]').append('<option value="' + hr.id + '">' + hr.name + hr.parent_name + hr.family_name + '</option>');
                        })
                    }
                }
            })
        }

        function editInstallment(device) {
            $('#installment_add_modal_btn').trigger('click');

            device = JSON.parse(decodeURIComponent(device));
            // device = JSON.parse(device);
            $('#installment_update_btn').prop("disabled", false);
            let form = $('#officeAgentAddInstallmentForm');

            @can('device_type_select',getOfficeAgentAuth())
            form.find('select[name="device_name"]').val(device.device_type.name)
            @endcan
            @can('device_type_input',getOfficeAgentAuth())
            form.find('input[name="device_name"]').val(device.device_type.name)
            @endcan
            form.find('input[name="device_others"]').val(device.device_others)
            form.find('input[name="device_id"]').val(device.id)
            form.find('input[name="serial"]').val(device.serial)
            form.find('input[name="number"]').val(device.number)
            form.find('select[name="lab_type_id"]').val(device.lab_type_id)
            // console.log(device);
        }

        $('select').on('change', function () {
            triggerSelectOptionChanges();
        });

        function triggerSelectOptionChanges() {
            let all_option = [];
            let all_option_ids = [];
            $.each($('select'), function (k, select) {
                if (!select.name.includes('_table_length') && select.dataset.name != undefined) {
                    all_option[select.dataset.name] = select.value
                    all_option_ids[select.dataset.name + '_id'] = select.value
                }
            });
            all_option_ids['office_type_id'] = {{$office_agent->office_type_id}};
            // console.log(all_option_ids)
            getOfficeOption(all_option, all_option_ids)
        }

        function getOfficeOption(all_options, all_option_ids) {
            all_option_ids = Object.assign({}, all_option_ids);
            $.ajax({
                url: '{{route("getOfficeOption")}}',
                method: 'GET',
                data: {
                    options: all_option_ids
                },
                success: function (response) {
                    if (response.status) {
                        $.each(response.data.options, function (index, option) {
                            let select = $('select[data-name="' + index + '"]');
                            if (select) {
                                select.empty();
                                if (all_options[index] != undefined) {
                                    var selected_id = all_options[index];
                                    select.append('<option value="">-- {{__('office_agent.choose')}} -- </option>')
                                    $.each(option, function (k, v) {
                                        if (v.id == selected_id) {
                                            select.append('<option selected value="' + v.id + '">' + v.title_ar + '</option>')
                                        } else {
                                            select.append('<option value="' + v.id + '">' + v.title_ar + '</option>')
                                        }
                                    })
                                }
                            }
                        })
                    }
                }
            })
        }
    </script>
@endsection
