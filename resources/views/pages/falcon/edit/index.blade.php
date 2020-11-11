@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.civilian.edit.templates.header')
                @include('pages.civilian.edit.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(".date").flatpickr();
        // $(document).ready(function () {
        //     setTimeout(function () {
        //         $('#_3').trigger("click");
        //
        //     }, 60);
        // });
    </script>

@endsection
