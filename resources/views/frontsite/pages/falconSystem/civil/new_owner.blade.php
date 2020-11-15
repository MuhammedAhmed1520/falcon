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
                        <h3> نقل ملكية الصقر</h3>
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
                        'method'=>'post',
                        'route'=>'handleGetNewOwner',
                        'id'=>'form',
                        'files' => true

                    ])}}

                    <input type="hidden" name="P_REQUEST_TYP" value="{{request()->P_REQUEST_TYP}}">
                    <input type="hidden" name="P_FAL_PIT_NO" value="{{request()->P_FAL_PIT_NO}}">
                    <input type="hidden" name="P_O_CIVIL_ID" value="{{request()->P_O_CIVIL_ID}}">

                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <div class="has-text-centered">
                                                <h1>البيانات الشخصية للمالك الجديد</h1>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_CIVIL_ID">
                                                        الرقم المدني للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_CIVIL_ID" class="ui-input"
                                                           value="{{old('P_NW_CIVIL_ID')}}"
                                                           autocomplete="off">
                                                    <span
                                                        class="tag color-red"
                                                        id="P_NW_CIVIL_ID">{{$errors->first('P_NW_CIVIL_ID') ?? ''}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_A_NAME"> الاسم العربي للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_A_NAME" class="ui-input"
                                                           value="{{old('P_NW_A_NAME')}}"
                                                           autocomplete="off">
                                                    <span
                                                        class="tag color-red"
                                                        id="P_NW_A_NAME">{{$errors->first('P_NW_A_NAME') ?? ''}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_ADDRESS"> العنوان للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_ADDRESS" class="ui-input"
                                                           value="{{old('P_NW_ADDRESS')}}"
                                                           autocomplete="off">
                                                    <span
                                                        class="tag color-red"
                                                        id="P_NW_ADDRESS">{{$errors->first('P_NW_ADDRESS') ?? ''}}</span>
                                                </div>
                                            </div>
                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_PASSPORT_NO">رقم الجواز للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_PASSPORT_NO" class="ui-input"
                                                           value="{{old('P_NW_PASSPORT_NO')}}"
                                                           autocomplete="off">
                                                    <span
                                                        class="tag color-red"
                                                        id="P_NW_PASSPORT_NO">{{$errors->first('P_NW_PASSPORT_NO') ?? ''}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_CIVIL_EXPIRY"> تاريخ انتهاء البطاقة المدنية للمالك
                                                        الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_CIVIL_EXPIRY" class="ui-input date"

                                                           value="{{old('P_NW_CIVIL_EXPIRY')}}"
                                                           autocomplete="off">
                                                    <span id="P_NW_CIVIL_EXPIRY"
                                                          class="tag color-red">{{$errors->first('P_NW_CIVIL_EXPIRY') ?? ''}}</span>
                                                </div>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_MOBILE"> المحمول للمالك الجديد/الهاتف

                                                    </label>
                                                    <input type="text" name="P_NW_MOBILE" class="ui-input"
                                                           value="{{old('P_NW_MOBILE')}}"
                                                           autocomplete="off">
                                                    <span id="P_NW_MOBILE"
                                                          class="tag color-red">{{$errors->first('P_NW_MOBILE') ?? ''}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_O_MAIL">البريد الالكتروني للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_O_MAIL" class="ui-input"
                                                           value="{{old('P_NW_O_MAIL')}}"
                                                           autocomplete="off">
                                                    <span id="P_NW_O_MAIL"
                                                          class="tag color-red">{{$errors->first('P_NW_O_MAIL') ?? ''}}</span>
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

                P_NW_CIVIL_ID: {
                    required: (element) => {
                        return true
                    },
                    number: true,
                },
                P_NW_A_NAME: {
                    required: (element) => {
                        return true
                    }
                },
                P_NW_ADDRESS: {
                    required: (element) => {
                        return true
                    }
                },
                P_NW_PASSPORT_NO: {
                    required: (element) => {
                        return true
                    },
                    number: true
                },
                P_NW_CIVIL_EXPIRY: {
                    required: (element) => {
                        return true
                    },
                    date: true
                },
                P_NW_MOBILE: {
                    required: (element) => {
                        return true
                    }
                },
                P_NW_O_MAIL: {
                    required: (element) => {
                        return true
                    }
                },

                P_CUR_PASS_FAL: {
                    required: (element) => {
                        return true
                    }
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
