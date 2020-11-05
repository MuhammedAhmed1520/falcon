@extends('layouts.master')

@section('styles')
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.violation.subject.edit.templates.header')
                @include('pages.violation.subject.edit.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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
            $('#add_paragraph').on('click', function () {
                let html = `
                    <input type="hidden" name="paragraph_id[]" value="0">
                    <div class="row p-2">
                        <div class="col-md-12" id="paragraph_row">
                            <div class="row  bg-gray mb-4">
                                <div class="col-md-4">
                                    <span class="input input--isao">
                                        <input class="input__field input__field--isao" type="text" autocomplete="off"
                                               name="paragraph_title[]"
                                               placeholder="{{__('violation.subject_p_title_type')}}"/>
                                        <label class="input__label input__label--isao"
                                               data-content="{{__('violation.subject_p_title')}}">
                                        <span class="input__label-content input__label-content--isao">
                                            <star>*</star>
                                            {{__('violation.subject_p_title')}}
                    </span>
                </label>
              </span>
            </div>
            <div class="col-md-12">
            <span class="input input--isao">
                <textarea class="input__field input__field--isao" name="paragraph_details[]"
                          placeholder="{{__('violation.subject_details_type')}}"
                                              rows="3"></textarea>
                                    <label class="input__label input__label--isao"
                                           data-content="{{__('violation.subject_details')}}">
                                    <span class="input__label-content input__label-content--isao">{{__('violation.subject_details')}}</span>
                                </label>
                              </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" id="paragraph_section"></div>
                    </div>
                `;
                $("#paragraph_section").append(html);
            });
        });

        $(document).on('change', '#multi_paragraph', function () {
            if ($(this).is(':checked')) {
                $('.para_row').show();
                $('#add_paragraph').show();
                $('#main_p').hide();
            } else {
                $('.para_row').hide();
                $('#add_paragraph').hide();
                $('#main_p').show();
            }
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
                            url: "{{route('handleDeleteSubjectRuleParagraphs')}}",
                            method: "delete",
                            data: {
                                _token: '{{csrf_token()}}',
                                id: id
                            },
                            success: function (response) {
                                if (response.status) {
                                    // $(`#violation_${id}`).remove()
                                    location.reload()
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
