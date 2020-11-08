@extends('frontsite.layouts.master')

@section('styles')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('content')
    <div id="services" class="section is-gray has-title">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        <h3>بحث طلبات الصقر</h3>
                        <h3>Search Falcon</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>

                <div class="column is-12">

                    {{Form::open([
                        'method'=>'get',
                        'route'=>'falcon-searchCivilFalcon',
                        'id'=>'form',

                    ])}}

                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <div class="has-text-centered">
                                                <h1>البيانات المطلوبة للبحث</h1>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-2-desktop"></div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_O_CIVIL_ID">
                                                        الرقم المدني

                                                    </label>
                                                    <input type="text" name="P_O_CIVIL_ID" class="ui-input"
                                                           value="{{old('P_O_CIVIL_ID')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_O_CIVIL_ID'))
                                                        <span class="tag color-red">{{$errors->first('P_O_CIVIL_ID')}}</span>
                                                    @endif
                                                </div>

                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_PIT_NO">
                                                        رقم الشريحة
                                                    </label>
                                                    <input type="text" name="P_FAL_PIT_NO" class="ui-input"
                                                           value="{{old('P_FAL_PIT_NO')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_FAL_PIT_NO'))
                                                        <span class="tag color-red">{{$errors->first('P_FAL_PIT_NO')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="columns is-multiline">
                        <div class="column has-text-centered">
                            <input type="submit" class="btn" value="ارسال">
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <div class="has-text-centered">
                                                <h1>نتائج البحث </h1>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-12-desktop">
                                                    <table>
                                                        <thead>
                                                        <tr>
                                                            <th>المفتاح</th>
                                                            <th>القيمة</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>----</td>
                                                            <td>----</td>
                                                        </tr>
                                                        <tr>
                                                            <td>----</td>
                                                            <td>----</td>
                                                        </tr>
                                                        <tr>
                                                            <td>----</td>
                                                            <td>----</td>
                                                        </tr>
                                                        <tr>
                                                            <td>----</td>
                                                            <td>----</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>


    </div>



@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?hl=ar"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script>
        $(document).ready(function () {

            $('.date').flatpickr({
                enableTime: false,
                minDate: 'today',
                dateFormat: "Y-m-d",
            });
        });
        $("#form").validate({
            rules: {
                P_O_CIVIL_ID: {
                    required: true,
                    number: true,
                },
                P_FAL_PIT_NO: {
                    required: true
                },
            },
            submitHandler: function (form) {
                // some other code
                // maybe disabling submit button
                // then:
                form.submit();
            }
        });
    </script>
@endsection
@section('styles')

@endsection
