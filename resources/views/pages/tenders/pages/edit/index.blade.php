@extends('layouts.master')

@section('styles')
    {{Html::style('assets/css/trumbowyg.min.css')}}
    <style>
        @if(app()->getLocale() == 'ar')
        .trumbowyg-modal-box label input {
            left: 0;
            right: auto;
        }
        @endif
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.tenders.pages.edit.templates.header')
                @include('pages.tenders.pages.edit.templates.content')
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    {{Html::script('assets/js/trumbowyg.min.js')}}
    <!-- Initialize Quill editor -->
    <script>
        $('#editor').trumbowyg({
            resetCss: true,
            autogrow: true,
            lang: 'en'
        });

    </script>
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('#_2').trigger("click");
                $('#_22').trigger("click");

            }, 60);
        });
    </script>

@endsection