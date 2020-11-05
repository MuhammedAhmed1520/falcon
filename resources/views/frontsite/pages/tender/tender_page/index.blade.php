@extends('frontsite.layouts.master')

@section('styles')

@endsection
@section('content')


    <div id="services" class="section is-gray has-title">

        <div class="container">
            <div class="columns">
                @include('frontsite.includes.inner_breadcrumb')
            </div>
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        <h3> {{ $page->title_ar }}</h3>
                        <h5 class="small-headline">نظام الممارسات</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
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
