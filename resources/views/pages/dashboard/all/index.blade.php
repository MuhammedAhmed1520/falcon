@extends('layouts.master')

@section('styles')
    {{Html::style('assets/css/epa_port.css')}}
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.dashboard.all.templates.header')
                @include('pages.dashboard.all.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
