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
                        <h3>اضافة صقر</h3>
                        <h3>Add New Falcon</h3>
                        <p>
                            قم باضافة بياناتك الشخصية وبيانات الصقر
                        </p>
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
                        'route'=>'handle-create-falcon',
                        'id'=>'form',
                        'files' => true

                    ])}}

                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <div class="has-text-centered">
                                                <h1>البيانات الشخصية</h1>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_REQUEST_TYP">
                                                        رقم الطلب

                                                    </label>
                                                    <select name="P_REQUEST_TYP" class="ui-input"
                                                            value="{{old('P_REQUEST_TYP')}}">
                                                        @foreach(getStaticData()['lookup1'] ?? [] as $item)
                                                            <option value="{{$item['code']}}">{{$item['label']}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('P_REQUEST_TYP'))
                                                        <span class="tag color-red">{{$errors->first('P_REQUEST_TYP')}}</span>
                                                    @endif
                                                </div>
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
                                                    <label for="P_O_A_NAME"> الاسم بالعربي

                                                    </label>
                                                    <input type="text" name="P_O_A_NAME" class="ui-input"
                                                           value="{{old('P_O_A_NAME')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_O_A_NAME'))
                                                        <span class="tag color-red">{{$errors->first('P_O_A_NAME')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_O_ADDRESS"> العنوان

                                                    </label>
                                                    <input type="text" name="P_O_ADDRESS" class="ui-input"
                                                           value="{{old('P_O_ADDRESS')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_O_ADDRESS'))
                                                        <span class="tag color-red">{{$errors->first('P_O_ADDRESS')}}</span>
                                                    @endif
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_O_PASSPORT_NO">رقم الجواز لصاحب الطلب

                                                    </label>
                                                    <input type="text" name="P_O_PASSPORT_NO" class="ui-input"
                                                           value="{{old('P_O_PASSPORT_NO')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_O_PASSPORT_NO'))
                                                        <span class="tag color-red">{{$errors->first('P_O_PASSPORT_NO')}}</span>
                                                    @endif
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_CIVIL_EXPIRY_DT"> تاريخ انتهاء البطاقة المدنية

                                                    </label>
                                                    <input type="text" name="P_CIVIL_EXPIRY_DT" class="ui-input date"

                                                           value="{{old('P_CIVIL_EXPIRY_DT')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_CIVIL_EXPIRY_DT'))
                                                        <span class="tag color-red">{{$errors->first('P_CIVIL_EXPIRY_DT')}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_O_MOBILE"> المحمول / الهاتف


                                                    </label>
                                                    <input type="text" name="P_O_MOBILE" class="ui-input"
                                                           value="{{old('P_O_MOBILE')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_O_MOBILE'))
                                                        <span class="tag color-red">{{$errors->first('P_O_MOBILE')}}</span>
                                                    @endif
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_O_MAIL">البريد الالكتروني

                                                    </label>
                                                    <input type="text" name="P_O_MAIL" class="ui-input"
                                                           value="{{old('P_O_MAIL')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_O_MAIL'))
                                                        <span class="tag color-red">{{$errors->first('P_O_MAIL')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                                    @if($errors->has('P_NW_CIVIL_ID'))
                                                        <span class="tag color-red">{{$errors->first('P_NW_CIVIL_ID')}}</span>
                                                    @endif
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_A_NAME"> الاسم العربي للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_A_NAME" class="ui-input"
                                                           value="{{old('P_NW_A_NAME')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_NW_A_NAME'))
                                                        <span class="tag color-red">{{$errors->first('P_NW_A_NAME')}}</span>
                                                    @endif
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_ADDRESS"> العنوان للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_ADDRESS" class="ui-input"
                                                           value="{{old('P_NW_ADDRESS')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_NW_ADDRESS'))
                                                        <span class="tag color-red">{{$errors->first('P_NW_ADDRESS')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_PASSPORT_NO">رقم الجواز للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_PASSPORT_NO" class="ui-input"
                                                           value="{{old('P_NW_PASSPORT_NO')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_NW_PASSPORT_NO'))
                                                        <span class="tag color-red">{{$errors->first('P_NW_PASSPORT_NO')}}</span>
                                                    @endif
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_CIVIL_EXPIRY"> تاريخ انتهاء البطاقة المدنية للمالك
                                                        الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_CIVIL_EXPIRY" class="ui-input date"

                                                           value="{{old('P_NW_CIVIL_EXPIRY')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_NW_CIVIL_EXPIRY'))
                                                        <span class="tag color-red">{{$errors->first('P_NW_CIVIL_EXPIRY')}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_MOBILE"> المحمول للمالك الجديد/الهاتف

                                                    </label>
                                                    <input type="text" name="P_NW_MOBILE" class="ui-input"
                                                           value="{{old('P_NW_MOBILE')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_NW_MOBILE'))
                                                        <span class="tag color-red">{{$errors->first('P_NW_MOBILE')}}</span>
                                                    @endif
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_O_MAIL">البريد الالكتروني للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_O_MAIL" class="ui-input"
                                                           value="{{old('P_NW_O_MAIL')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_NW_O_MAIL'))
                                                        <span class="tag color-red">{{$errors->first('P_NW_O_MAIL')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <div class="has-text-centered">
                                                <h1>بيانات الصقر </h1>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_CUR_PASS_FAL">
                                                        رقم جواز الصقر الحالي
                                                    </label>
                                                    <input type="text" name="P_CUR_PASS_FAL" class="ui-input"
                                                           value="{{old('P_CUR_PASS_FAL')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_CUR_PASS_FAL'))
                                                        <span class="tag color-red">{{$errors->first('P_CUR_PASS_FAL')}}</span>
                                                    @endif
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_A_NAME">
                                                        الجنس
                                                    </label>
                                                    <select name="P_FAL_SEX" class="ui-input"
                                                            value="{{old('P_FAL_SEX')}}">
                                                        @foreach(getStaticData()['lookup2'] ?? [] as $item)
                                                            <option value="{{$item['code']}}">{{$item['label']}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('P_FAL_SEX'))
                                                        <span class="tag color-red">{{$errors->first('P_FAL_SEX')}}</span>
                                                    @endif
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_SPECIES">فئة الصقر</label>
                                                    <input type="text" name="P_FAL_SPECIES" class="ui-input"
                                                           value="{{old('P_FAL_SPECIES')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_FAL_SPECIES'))
                                                        <span class="tag color-red">{{$errors->first('P_FAL_SPECIES')}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_TYPE">
                                                        نوع الصقر
                                                    </label>
                                                    <select name="P_FAL_TYPE" class="ui-input">
                                                        @foreach(getStaticData()['lookup3'] ?? [] as $item)
                                                            <option value="{{$item['code']}}">{{$item['label']}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('P_FAL_TYPE'))
                                                        <span class="tag color-red">{{$errors->first('P_FAL_TYPE')}}</span>
                                                    @endif
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_OTHER_TYPE"> اخري

                                                    </label>
                                                    <input type="text" name="P_FAL_OTHER_TYPE" class="ui-input"

                                                           value="{{old('P_FAL_OTHER_TYPE')}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_FAL_OTHER_TYPE'))
                                                        <span class="tag color-red">{{$errors->first('P_FAL_OTHER_TYPE')}}</span>
                                                    @endif
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_ORIGIN_COUNTRY">
                                                        بلد المنشأ
                                                    </label>
                                                    <select name="P_FAL_ORIGIN_COUNTRY" class="ui-input">
                                                        @foreach(getStaticData()['lookup4'] ?? [] as $item)
                                                            <option value="{{$item['code']}}">{{$item['label']}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('P_FAL_ORIGIN_COUNTRY'))
                                                        <span class="tag color-red">{{$errors->first('P_FAL_ORIGIN_COUNTRY')}}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_CITES_NO">
                                                        رقم ملحق سايتس
                                                    </label>
                                                    <select name="P_FAL_CITES_NO" class="ui-input">
                                                        @foreach(getStaticData()['lookup5'] ?? [] as $item)
                                                            <option value="{{$item['code']}}">{{$item['label']}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('P_FAL_CITES_NO'))
                                                        <span class="tag color-red">{{$errors->first('P_FAL_CITES_NO')}}</span>
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
                P_REQUEST_TYP: {
                    required: true,
                },
                P_O_CIVIL_ID: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    },
                    number: true,
                },
                P_O_A_NAME: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    },
                },
                P_O_ADDRESS: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    },
                },
                P_O_MOBILE: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    },
                    number: true,
                },
                P_O_PASSPORT_NO: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    },
                    number: true,
                },
                P_CIVIL_EXPIRY_DT: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    },
                    date: true,
                },
                P_O_MAIL: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    },
                    email: true
                },

                P_NW_CIVIL_ID: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 4;
                    },
                    number: true,
                },
                P_NW_A_NAME: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 4;
                    }
                },
                P_NW_ADDRESS: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 4;
                    }
                },
                P_NW_PASSPORT_NO: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 4;
                    },
                    number: true
                },
                P_NW_CIVIL_EXPIRY: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 4;
                    },
                    date: true
                },
                P_NW_MOBILE: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 4;
                    }
                },
                P_NW_O_MAIL: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 4;
                    }
                },

                P_CUR_PASS_FAL: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    }
                },
                P_FAL_SEX: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    }
                },
                P_FAL_SPECIES: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    }
                },
                P_FAL_TYPE: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    }
                },
                P_FAL_OTHER_TYPE: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    }
                },
                P_FAL_ORIGIN_COUNTRY: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    }
                },
                P_FAL_CITES_NO: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    }
                },
                P_FAL_PIT_NO: {
                    required: true
                },
                // P_FAL_RING_NO: {
                //     required: (element) => {
                //         return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                //     }
                // },
                // P_FAL_INJ_DATE: {
                //     required: (element) => {
                //         return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                //     }
                // },
                // P_FAL_INJ_HOSPITAL: {
                //     required: (element) => {
                //         return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                //     },
                //     number: true,
                // },
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
