@extends('layouts.master')

@section('styles')
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    {{Html::style('assets/css/font-fileuploader.css')}}
    {{Html::style('assets/css/jquery.fileuploader.min.css')}}
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <style>
        .fileuploader-input .fileuploader-input-button, .fileuploader-popup .fileuploader-popup-content .fileuploader-popup-button.button-success {
            background: linear-gradient(135deg, #3A8FFE 0, #0747a6 100%);
        }

        .card-file-overlay {
            position: absolute;
            z-index: 9;
            width: 100%;
            height: 100%;
            background: #000;
            opacity: 0.5;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.tenders.company.edit-files.templates.header')
                @include('pages.tenders.company.edit-files.templates.content')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{Html::script('assets/js/jquery.fileuploader.min.js')}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('#_2').trigger("click");
                $('#_22').trigger("click");

            }, 60);

            $('input[type="file"]').fileuploader({
                addMore: false,
                limit: 1,
                extensions: ['jpg', 'jpeg', 'png', 'pdf'],
                inputNameBrackets: true,
                captions: {
                    button: function (options) {
                        return 'تصفح ' + (options.limit == 1 ? 'ملف' : 'ملفات');
                    },
                    feedback: function (options) {
                        return 'اختر ' + (options.limit == 1 ? 'ملف' : 'ملفات') + ' للرفع';
                    }
                }
            });

            $('.date_time').flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",

            });

            $('#d1_alt_check').click(function () {
                if ($(this).is(':checked')) {
                    $('#file_1_text').text("{{__('tenders.f1_alt')}}")
                } else {
                    $('#file_1_text').text("{{__('tenders.f1')}}")
                }
            });

            $('#d4_alt_check').click(function () {
                if ($(this).is(':checked')) {
                    $('.card-file-overlay').show()
                } else {
                    $('.card-file-overlay').hide()
                }
            });

            $('.card-file-overlay').click(function () {
                $('#d4_alt_check').trigger('click')
            });

        });


        function decideCompnayFiles(_this, id, state) {

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
                            url: "{{route('decideCompnayFiles')}}",
                            method: "post",
                            data: {
                                _token: '{{csrf_token()}}',
                                state: state,
                                id: id
                            },
                            success: function (response) {
                                if (response.status) {
                                    location.reload()
                                }
                            }
                        })
                    }
                },
                allowOutsideClick: function () {
                    !Swal.isLoading()
                }
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
