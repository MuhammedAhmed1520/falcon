@extends('layouts.master')

@section('styles')

@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.violation.settings.edit_module.templates.header')
                @include('pages.violation.settings.edit_module.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection