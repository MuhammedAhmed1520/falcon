@extends('layouts.master')

@section('styles')
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.tenders.company.add.templates.header')
                @include('pages.tenders.company.add.templates.content')
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('#_2').trigger("click");
                $('#_22').trigger("click");

            }, 60);
        });
    </script>

@endsection