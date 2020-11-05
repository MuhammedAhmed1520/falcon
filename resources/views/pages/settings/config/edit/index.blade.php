@extends('layouts.masterIE')

@section('styles')

    {{Html::style('assets/css/bootstrap4-toggle.min.css')}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>

        .toggle.ios, .toggle-on.ios, .toggle-off.ios {
            border-radius: 20rem;
        }

        .toggle.ios .toggle-handle {
            border-radius: 20rem;
        }
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.settings.config.edit.templates.header')
                @include('pages.settings.config.edit.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{Html::script('assets/js/bootstrap4-toggle.min.js')}}
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('#_3').trigger("click");

            }, 60);
        });
        $(".date").flatpickr({
            dateFormat: "Y-m-d",
        });
    </script>
@endsection
