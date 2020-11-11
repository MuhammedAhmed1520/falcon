@extends('layouts.masterIE')

@section('styles')

@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.settings.roles.edit.templates.header')
                @include('pages.settings.roles.edit.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('#_3').trigger("click");

            }, 60);
        });
    </script>

@endsection