@extends('portal.layouts.master')

@section('styles')

@endsection
@section('content')


    <div id="services" class="section is-gray has-title">

        <div class="container-fluid">
            <div class="columns">
                @include('portal.includes.inner_breadcrumb')
            </div>
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        <h3> {{ $page->title_ar }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('portal.includes.alerts')
                </div>

                <div class="column is-12-desktop">
                    {!! $page->content !!}
                </div>
            </div>
        </div>


    </div>


@endsection
@section('scripts')

@endsection
