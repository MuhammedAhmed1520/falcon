@extends('frontsite.layouts.master')

@section('content')
    <div id="services" class="section is-gray has-title">
        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>

                <div class="column is-12" style="min-height: 600px">
                    {{Form::open([
                        'route'=>'handleCivilLossRequest',
                        'method'=>'post',
                        'files'=>true
                    ])}}
                    <div class="columns is-multiline">
                        <div class="column is-6 is-offset-3">
                            <div class="section-content has-text-centered">
                                <h3>حالة فقد جواز السفر</h3>
                            </div>
                        </div>
                        <div class="column is-12">
                            <h4>{{$data['data']['statusMsg'] ?? ''}}</h4>
                            <div class="notification is-danger">
                                <p class="has-text-white">“في حال فقدان الجواز ، يتوجب على مالك الصقر التبليغ عن الفقد
                                    في المخفر و تقديم صورة
                                    عن البلاغ للهيئة. بعد فحص الصقر و بوجود الأوراق المطلوبة تقوم الهيئة باصدار جواز
                                    جديد”</p>
                            </div>
                        </div>
                        <div class="column is-12">
                            <input type="hidden" name="P_REQUEST_TYP" value="{{request()->P_REQUEST_TYP}}">
                            <input type="hidden" name="P_FAL_PIT_NO" value="{{request()->P_FAL_PIT_NO}}">
                            <input type="hidden" name="P_O_CIVIL_ID" value="{{request()->P_O_CIVIL_ID}}">
                        </div>
                        <div class="column is-4-desktop">
                            <label>صورة البلاغ</label> <br>
                            <input type="file" name="file" class="ui-input valid" accept="image/*">
                        </div>
                        <div class="column is-12">
                            <button class="btn btn-primary">ارسال</button>
                        </div>
                    </div>
                    {{Form::close()}}
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
