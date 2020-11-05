@extends('layouts.master')

@section('styles')
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.violation.subject.add.templates.header')
                @include('pages.violation.subject.add.templates.content')
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
        })
    </script>
@endsection