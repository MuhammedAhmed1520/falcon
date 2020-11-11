@extends('frontsite.layouts.master')

@section('content')
    <div id="services" class="section is-gray has-title">
        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>

                <div class="column is-12" style="min-height: 600px">
                    <div class="columns is-multiline">
                        <div class="column is-6 is-offset-3">
                            <div class="section-content has-text-centered">
                                <h3>حالة فقد الصقر</h3>
                            </div>
                        </div>
                        <div class="column is-12">
                            <div class="notification is-danger">
                                <p class="has-text-white">“في حال فقدان الجواز ، يتوجب على مالك الصقر التبليغ عن الفقد في المخفر و تقديم صورة
                                    عن البلاغ للهيئة. بعد فحص الصقر و بوجود الأوراق المطلوبة تقوم الهيئة باصدار جواز
                                    جديد”</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>



@endsection
@section('scripts')
    <script>

    </script>
@endsection
@section('styles')

@endsection
