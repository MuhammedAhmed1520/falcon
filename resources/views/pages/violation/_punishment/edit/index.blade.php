@extends('layouts.master')

@section('styles')
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.violation.punishment.edit.templates.header')
                @include('pages.violation.punishment.edit.templates.content')
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
                let html = `<div class="col-md-12" id="paragraph_row">
                            <input type="hidden" name="paragraph_id[]" value="0">
                            <div class="row  bg-gray mb-4">
                                <div class="col-md-4">
                                <span class="input input--isao">
                                    <input class="input__field input__field--isao" type="text" name="paragraph_title[]"
                                           placeholder="{{__('violation.punishment_p_title_type')}}"/>
                                    <label class="input__label input__label--isao"
                                           data-content="{{__('violation.punishment_p_title')}}">
                                    <span class="input__label-content input__label-content--isao">
                                        <star>*</star>
                                        {{__('violation.punishment_p_title')}}
                    </span>
                </label>
              </span>
                </div>
                <div class="col-12"></div>
                <div class="col-md-2">
                <span class="input input--isao">
                    <input class="input__field input__field--isao" type="text"
                           name="paragraph_min_fine[]"
                                           placeholder="{{__('violation.punishment_min_fine_type')}} "/>
                                    <label class="input__label input__label--isao"
                                           data-content="{{__('violation.punishment_min_fine')}}">
                                    <span class="input__label-content input__label-content--isao">
                                        {{__('violation.punishment_min_fine')}}
                    </span>
                </label>
              </span>
                </div>
                <div class="col-md-2">
                    <span class="input input--isao">
                        <input class="input__field input__field--isao" type="text"
                               name="paragraph_max_fine[]"
                                               placeholder="{{__('violation.punishment_max_fine_type')}} "/>
                                        <label class="input__label input__label--isao"
                                               data-content="{{__('violation.punishment_max_fine')}}">
                                        <span class="input__label-content input__label-content--isao">
                                            {{__('violation.punishment_max_fine')}}

                    </span>
                </label>
              </span>
            </div>
            <div class="col-md-3">
<span class="input input--isao">
    <input class="input__field input__field--isao" type="text" name="paragraph_min_jail[]"
                               placeholder="{{__('violation.punishment_min_jail_type')}} "/>
                        <label class="input__label input__label--isao"
                               data-content="{{__('violation.punishment_min_jail')}}">
                        <span class="input__label-content input__label-content--isao">
                            {{__('violation.punishment_min_jail')}}
                    </span>
                </label>
              </span>
                            </div>
                            <div class="col-md-3">
                <span class="input input--isao">
                    <input class="input__field input__field--isao" type="text" name="paragraph_max_jail[]"
                               placeholder="{{__('violation.punishment_max_jail_type')}} "/>
                        <label class="input__label input__label--isao"
                               data-content="{{__('violation.punishment_max_jail')}}">
                        <span class="input__label-content input__label-content--isao">
                            {{__('violation.punishment_max_jail')}}
                    </span>
                </label>
              </span>
                            </div>

                            <div class="col-md-12">
                                <span class="input input--isao">
                                    <textarea class="input__field input__field--isao" name="paragraph_details[]"
                                              placeholder="{{__('violation.punishment_details_type')}}"
                                                  rows="3"></textarea>
                                        <label class="input__label input__label--isao"
                                               data-content="{{__('violation.punishment_details')}}">
                                        <span class="input__label-content input__label-content--isao">{{__('violation.punishment_details')}}</span>
                                    </label>
                                  </span>
                                </div>
                            </div>
                        </div>`;
                $("#paragraph_section").append(html);
            });
        })

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
                            url: "{{route('handleDeletePunishmentRuleParagraphs')}}",
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
