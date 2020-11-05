@extends('layouts.master')

@section('styles')
    <style>
        .main_c_fine, .p_c_fine {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.violation.punishment.add.templates.header')
                @include('pages.violation.punishment.add.templates.content')
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

            $(document).on('change', 'select[name="paragraph_status_id"]', function () {
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

            $('.delete_btn').first().hide();

            $('#add_paragraph').on('click', function () {
                $("#paragraph_row").html();
                $("#paragraph_section").append($("#paragraph_row").html());

                $('.delete_btn').show();
                $('.delete_btn').first().hide();
            });

            $(document).on('click', '.delete_btn', function () {
                $(this).parents().eq(1).remove()
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

        })
    </script>
@endsection