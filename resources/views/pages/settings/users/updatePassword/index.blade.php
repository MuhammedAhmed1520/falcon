@extends('layouts.master')

@section('styles')

@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.settings.users.updatePassword.templates.header')
                @include('pages.settings.users.updatePassword.templates.content')
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
