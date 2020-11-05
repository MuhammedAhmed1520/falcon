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
        @media print {
            .skeleton-nav--center{
                width:100%; 
                margin-right:0;
                z-index:999999999;
            }
        }
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.violation.violation.show.templates.header')
                @include('pages.violation.violation.show.templates.content')
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
@endsection