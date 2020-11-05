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


            $(document).on('change', 'select[name="paragraph_status_id[]"]', function () {
                let id = $(this).val();

                if (id == 8) {
                    $(this).parents().eq(2).find('.p_c_fine').hide();
                    $(this).parents().eq(2).find('.p_person_fine').show();
                } else if (id == 9) {

                    $(this).parents().eq(2).find('.p_c_fine').show();
                    $(this).parents().eq(2).find('.p_person_fine').hide();

                } else if (id == 10) {

                    $(this).parents().eq(2).find('.p_c_fine').show();
                    $(this).parents().eq(2).find('.p_person_fine').show();
                } else {
                    $(this).parents().eq(2).find('.p_c_fine').show();
                    $(this).parents().eq(2).find('.p_person_fine').hide();
                }
            });
            $('select[name="main_status_id"]').on('change', function () {

                let id = $(this).val();
                if (id == 8) {
                    $('.main_c_fine').hide();
                    $('.main_person_fine').show();
                } else if (id == 9) {

                    $('.main_c_fine').show();
                    $('.main_person_fine').hide();

                } else if (id == 10) {

                    $('.main_c_fine').show();
                    $('.main_person_fine').show();
                } else {
                    $('.main_c_fine').show();
                    $('.main_person_fine').hide();
                }

            });

            $(document).on('change', '.fine_check', function () {
                if ($(this).is(':checked')) {

                    $(this).parents().eq(1).find('.fine').show()
                } else {
                    $(this).parents().eq(1).find('.fine').hide()
                }
            });
            $(document).on('change', '.jail_check', function () {
                if ($(this).is(':checked')) {

                    $(this).parents().eq(1).find('.jail').show()
                } else {
                    $(this).parents().eq(1).find('.jail').hide()
                }
            });

            $(document).on('change', '#multi_paragraph', function () {
                if ($(this).is(':checked')) {
                    $('.m_para').show();
                    $('#add_paragraph').show();
                    $('.f_para').hide();
                } else {
                    $('.m_para').hide();
                    $('#add_paragraph').hide();
                    $('.f_para').show();
                }
            });

            $('#add_paragraph').on('click', function () {
                let html = `<div class="col-md-12" id="paragraph_row">
                            <div class="row  bg-gray mb-4 m_para" >
                                <div class="col-md-12 float-left text-right">

                    </div>
                    <div class="col-md-3">
                        <b>{{__('violation.punishment_type')}}</b>
                                    <select name="paragraph_status_id[]" class="form-control">
                                        @foreach($status as $st)
                                        <option value="{{$st->id}}">{{$st->title}}</option>
                                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                <span class="input input--isao">
                    <input class="input__field input__field--isao" type="text" name="paragraph_title[]"
                    autocomplete="off"
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
                <div class="col-md-4">
                    <div class="row fine">

                        <div class="col-md-4 p_person_fine" >
                                            <span class="input input--isao">
                                                <input class="input__field input__field--isao arabicnumber" type="text"
                                                       name="paragraph_person_fine[]"
                                                       autocomplete="off"
                                                       placeholder="{{__('violation.punishment_min_fine_type')}} "/>
                                                <label class="input__label input__label--isao"
                                                       data-content="{{__('violation.person_fine')}}">
                                                <span class="input__label-content input__label-content--isao">
                                                    {{__('violation.person_fine')}}
                    </span>
                </label>
              </span>
            </div>
            <div class="col-md-4 p_c_fine"
                 style="display:  none">
                                            <span class="input input--isao">
                                                <input class="input__field input__field--isao arabicnumber" type="text"
                                                       name="paragraph_min_fine[]"
                                                       autocomplete="off"
                                                       placeholder="{{__('violation.punishment_min_fine_type')}} "/>
                                                <label class="input__label input__label--isao"
                                                       data-content="{{__('violation.punishment_min_fine')}}">
                                                <span class="input__label-content input__label-content--isao">
                                                    {{__('violation.punishment_min_fine')}}
                    </span>
                </label>
              </span>
            </div>
            <div class="col-md-4 p_c_fine" style="display:  none">
                                                <span class="input input--isao">
                                                    <input class="input__field input__field--isao arabicnumber"
                                                           type="text"
                                                           name="paragraph_max_fine[]"
                                                           autocomplete="off"
                                                           placeholder="{{__('violation.punishment_max_fine_type')}} "/>
                                                    <label class="input__label input__label--isao"
                                                           data-content="{{__('violation.punishment_max_fine')}}">
                                                    <span class="input__label-content input__label-content--isao">
                                                        {{__('violation.punishment_max_fine')}}

                    </span>
                </label>
              </span>
        </div>
    </div>
</div>
<div class="col-md-3">
    <span class="input input--isao">
        <input class="input__field input__field--isao" type="text" name="paragraph_min_jail[]"
               autocomplete="off"
               value=""
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
                           value="" autocomplete="off"
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
