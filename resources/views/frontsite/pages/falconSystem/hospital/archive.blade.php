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
                        <h3>عرض بيانات صقر</h3>
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
                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <div class="has-text-centered">
                                                <h1>بيانات المستشفي </h1>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_RING_NO">
                                                        رقم الشريحة
                                                    </label>
                                                    <input type="text" name="P_FAL_PIT_NO" class="ui-input" disabled
                                                           value="{{$falcon->P_FAL_PIT_NO}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_FAL_PIT_NO'))
                                                        <span
                                                            class="tag color-red">{{$errors->first('P_FAL_PIT_NO')}}</span>
                                                    @endif
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_RING_NO">
                                                        رقم الحلقة
                                                    </label>
                                                    <input type="text" name="P_FAL_RING_NO" class="ui-input" disabled
                                                           value="{{$falcon->P_FAL_RING_NO}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_FAL_RING_NO'))
                                                        <span
                                                            class="tag color-red">{{$errors->first('P_FAL_RING_NO')}}</span>
                                                    @endif
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_INJ_DATE">
                                                        تاريخ الحقن
                                                    </label>
                                                    <input type="text" name="P_FAL_INJ_DATE" class="ui-input date" disabled
                                                           value="{{$falcon->P_FAL_INJ_DATE}}"
                                                           autocomplete="off">
                                                    @if($errors->has('P_FAL_INJ_DATE'))
                                                        <span
                                                            class="tag color-red">{{$errors->first('P_FAL_INJ_DATE')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="file">
                                                        شهادة تعريف الصقر
                                                    </label>
                                                    @if($falcon->certificate_file_path)
                                                        <a href="{{$falcon->certificate_file_path}}" target="_blank">
                                                            الملف</a>
                                                    @else
                                                        <br>
                                                        <b>غير موجود</b>
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
                                                <h1>البيانات الشخصية</h1>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_REQUEST_TYP">
                                                        رقم الطلب

                                                    </label>
                                                    <select name="P_REQUEST_TYP" class="ui-input" disabled
                                                            value="{{old('P_REQUEST_TYP')}}">
                                                        @foreach($helper_utilities['P_REQUEST_TYP'] ?? [] as $item)
                                                            <option
                                                                @if($falcon->P_REQUEST_TYP == $item->id) selected
                                                                @endif value="{{$item['id']}}">{{$item['label']}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="P_REQUEST_TYP"
                                                          class="tag color-red">{{$errors->first('P_REQUEST_TYP') ?? ''}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_O_CIVIL_ID">
                                                        الرقم المدني

                                                    </label>
                                                    <input type="text" name="P_O_CIVIL_ID" class="ui-input" disabled
                                                           value="{{$falcon->P_O_CIVIL_ID ?? ''}}"
                                                           autocomplete="off">
                                                    <span id="P_O_CIVIL_ID"
                                                          class="tag color-red">{{$errors->first('P_O_CIVIL_ID')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_O_A_NAME"> الاسم بالعربي

                                                    </label>
                                                    <input type="text" name="P_O_A_NAME" class="ui-input" disabled
                                                           value="{{$falcon->P_O_A_NAME ?? ''}}"
                                                           autocomplete="off">
                                                    <span id="P_O_A_NAME"
                                                          class="tag color-red">{{$errors->first('P_O_A_NAME')}}</span>
                                                </div>
                                            </div>
                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_O_ADDRESS"> العنوان

                                                    </label>
                                                    <input type="text" name="P_O_ADDRESS" class="ui-input" disabled
                                                           value="{{$falcon->P_O_ADDRESS ?? ''}}"
                                                           autocomplete="off">
                                                    <span id="P_O_ADDRESS"
                                                          class="tag color-red">{{$errors->first('P_O_ADDRESS')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_O_PASSPORT_NO">رقم الجواز لصاحب الطلب

                                                    </label>
                                                    <input type="text" name="P_O_PASSPORT_NO" class="ui-input" disabled
                                                           value="{{$falcon->P_O_PASSPORT_NO ?? ''}}"
                                                           autocomplete="off">
                                                    <span id="P_O_PASSPORT_NO"
                                                          class="tag color-red">{{$errors->first('P_O_PASSPORT_NO')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_CIVIL_EXPIRY_DT"> تاريخ انتهاء البطاقة المدنية

                                                    </label>
                                                    <input type="text" name="P_CIVIL_EXPIRY_DT" class="ui-input date"
                                                           disabled
                                                           value="{{$falcon->P_CIVIL_EXPIRY_DT}}"
                                                           autocomplete="off">
                                                    <span id="P_CIVIL_EXPIRY_DT"
                                                          class="tag color-red">{{$errors->first('P_CIVIL_EXPIRY_DT')}}</span>
                                                </div>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_O_MOBILE"> المحمول / الهاتف


                                                    </label>
                                                    <input type="text" name="P_O_MOBILE" class="ui-input" disabled
                                                           value="{{$falcon->P_O_MOBILE ?? ''}}"
                                                           autocomplete="off">
                                                    <span id="P_O_MOBILE"
                                                          class="tag color-red">{{$errors->first('P_O_MOBILE')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_O_MAIL">البريد الالكتروني

                                                    </label>
                                                    <input type="text" name="P_O_MAIL" class="ui-input" disabled
                                                           value="{{$falcon->P_O_MAIL ?? ''}}"
                                                           autocomplete="off">
                                                    <span id="P_O_MAIL"
                                                          class="tag color-red">{{$errors->first('P_O_MAIL')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="columns" id="new_owner" @if($falcon->P_REQUEST_TYP != 4) style="display: none" @endif>
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
                                                    <input type="text" name="P_NW_CIVIL_ID" class="ui-input" disabled
                                                           value="{{$falcon->P_NW_CIVIL_ID}}"
                                                           autocomplete="off"> )
                                                    <span id="P_NW_CIVIL_ID"
                                                          class="tag color-red">{{$errors->first('P_NW_CIVIL_ID')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_A_NAME"> الاسم العربي للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_A_NAME" class="ui-input" disabled
                                                           value="{{$falcon->P_NW_A_NAME}}"
                                                           autocomplete="off">
                                                    <span id="P_NW_A_NAME"
                                                          class="tag color-red">{{$errors->first('P_NW_A_NAME')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_ADDRESS"> العنوان للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_ADDRESS" class="ui-input" disabled
                                                           value="{{$falcon->P_NW_ADDRESS}}"
                                                           autocomplete="off">
                                                    <span id="P_NW_ADDRESS"
                                                          class="tag color-red">{{$errors->first('P_NW_ADDRESS')}}</span>
                                                    endif
                                                </div>
                                            </div>
                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_PASSPORT_NO">رقم الجواز للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_PASSPORT_NO" class="ui-input" disabled
                                                           value="{{$falcon->P_NW_PASSPORT_NO}}"
                                                           autocomplete="off">
                                                    <span id="P_NW_PASSPORT_NO"
                                                          class="tag color-red">{{$errors->first('P_NW_PASSPORT_NO')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_CIVIL_EXPIRY"> تاريخ انتهاء البطاقة المدنية للمالك
                                                        الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_CIVIL_EXPIRY" class="ui-input date"
                                                           disabled

                                                           value="{{$falcon->P_NW_CIVIL_EXPIRY}}"
                                                           autocomplete="off">
                                                    <span id="P_NW_CIVIL_EXPIRY"
                                                          class="tag color-red">{{$errors->first('P_NW_CIVIL_EXPIRY')}}</span>
                                                </div>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_MOBILE"> المحمول للمالك الجديد/الهاتف

                                                    </label>
                                                    <input type="text" name="P_NW_MOBILE" class="ui-input" disabled
                                                           value="{{$falcon->P_NW_MOBILE}}"
                                                           autocomplete="off">
                                                    <span id="P_NW_MOBILE"
                                                          class="tag color-red">{{$errors->first('P_NW_MOBILE')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_O_MAIL">البريد الالكتروني للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_O_MAIL" class="ui-input" disabled
                                                           value="{{$falcon->P_NW_O_MAIL}}"
                                                           autocomplete="off">
                                                    <span id="P_NW_O_MAIL"
                                                          class="tag color-red">{{$errors->first('P_NW_O_MAIL')}}</span>
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
                                                    <input type="text" name="P_CUR_PASS_FAL" class="ui-input" disabled
                                                           value="{{$falcon->P_CUR_PASS_FAL}}"
                                                           autocomplete="off">
                                                    <span id="P_CUR_PASS_FAL"
                                                          class="tag color-red">{{$errors->first('P_CUR_PASS_FAL')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_A_NAME">
                                                        الجنس
                                                    </label>
                                                    <select name="P_FAL_SEX" class="ui-input" disabled
                                                            value="{{old('P_FAL_SEX')}}">
                                                        @foreach(getStaticData()['lookup2'] ?? [] as $item)
                                                            <option @if($falcon->P_FAL_SEX == $item['code']) selected
                                                                    @endif
                                                                    value="{{$item['code']}}">{{$item['label']}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="P_FAL_SEX"
                                                          class="tag color-red">{{$errors->first('P_FAL_SEX')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_SPECIES">فئة الصقر</label>
                                                    <input type="text" name="P_FAL_SPECIES" class="ui-input" disabled
                                                           value="{{$falcon->P_FAL_SPECIES}}"
                                                           autocomplete="off">
                                                    <span id="P_FAL_SPECIES"
                                                          class="tag color-red">{{$errors->first('P_FAL_SPECIES')}}</span>
                                                </div>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_TYPE">
                                                        نوع الصقر
                                                    </label>
                                                    <select name="P_FAL_TYPE" class="ui-input" disabled>
                                                        @foreach($helper_utilities['P_FAL_TYPE'] ?? [] as $item)
                                                            <option @if($falcon->P_FAL_TYPE == $item['id']) selected
                                                                    @endif value="{{$item['id']}}">{{$item['label']}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="P_FAL_TYPE"
                                                          class="tag color-red">{{$errors->first('P_FAL_TYPE')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_OTHER_TYPE"> اخري

                                                    </label>
                                                    <input type="text" name="P_FAL_OTHER_TYPE" class="ui-input" disabled
                                                           value="{{$falcon->P_FAL_OTHER_TYPE}}"
                                                           autocomplete="off">
                                                    <span id="P_FAL_OTHER_TYPE"
                                                          class="tag color-red">{{$errors->first('P_FAL_OTHER_TYPE')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_ORIGIN_COUNTRY">
                                                        بلد المنشأ
                                                    </label>
                                                    <select name="P_FAL_ORIGIN_COUNTRY" class="ui-input" disabled>
                                                        @foreach($helper_utilities['P_FAL_ORIGIN_COUNTRY'] ?? [] as $item)
                                                            <option
                                                                @if($falcon->P_FAL_ORIGIN_COUNTRY == $item['id']) selected
                                                                @endif value="{{$item['id']}}">{{$item['label']}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="P_FAL_ORIGIN_COUNTRY"
                                                          class="tag color-red">{{$errors->first('P_FAL_ORIGIN_COUNTRY')}}</span>
                                                </div>
                                            </div>

                                            <div class="columns centered">
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_CITES_NO">
                                                        رقم ملحق سايتس
                                                    </label>
                                                    <select name="P_FAL_CITES_NO" class="ui-input" disabled>
                                                        @foreach($helper_utilities['P_FAL_CITES_NO'] ?? [] as $item)
                                                            <option @if($falcon->P_FAL_CITES_NO == $item['id']) selected
                                                                    @endif
                                                                    value="{{$item['id']}}">{{$item['label']}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="P_FAL_CITES_NO"
                                                          class="tag color-red">{{$errors->first('P_FAL_CITES_NO')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_INJ_HOSPITAL">
                                                        المستشفي
                                                    </label>
                                                    <select name="P_FAL_INJ_HOSPITAL" class="ui-input" disabled
                                                            value="{{old('P_FAL_INJ_HOSPITAL')}}">
                                                        @foreach($helper_utilities['P_FAL_INJ_HOSPITAL'] ?? [] as $item)
                                                            <option
                                                                @if($falcon->P_FAL_INJ_HOSPITAL == $item['id']) selected
                                                                @endif
                                                                value="{{$item['id']}}">{{$item['label']}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="P_FAL_INJ_HOSPITAL"
                                                          class="tag color-red">{{$errors->first('P_FAL_INJ_HOSPITAL')}}</span>
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
                                                <h1> الملفات </h1>
                                            </div>

                                            {{--                                            <button class="btn btn-secondary mb-5" type="button" onclick="addRow()">--}}
                                            {{--                                                <i class="icon icon-plus"></i>--}}
                                            {{--                                            </button>--}}

                                            <div id="row_files">
                                                @foreach($falcon->file_details ?? [] as $k=>$file)
                                                    <div class="columns centered" id="row_{{$file->id}}">
                                                        <div class="column is-12 is-4-desktop">
                                                            <b for="file_type_id" class="text-bold">
                                                                نوع الملف <br>
                                                            </b>
                                                            {{$file->file_type->label ?? ''}}
                                                        </div>

                                                        <div class="column is-12 is-4-desktop">
                                                            <b>
                                                                الملف <br>
                                                            </b>
                                                            @if($file['file'] ?? null)
                                                                <a href="{{$file['file']}}" target="_blank">عرض
                                                                    الملف</a>
                                                            @endif
                                                        </div>
                                                        {{--                                                        <div class="column is-12 is-4-desktop">--}}
                                                        {{--                                                            <button class="btn btn-primary has-background-danger" type="button"--}}
                                                        {{--                                                                    onclick="deleteRow('{{$file->id}}')">--}}
                                                        {{--                                                                حذف--}}
                                                        {{--                                                            </button>--}}
                                                        {{--                                                        </div>--}}
                                                    </div>
                                                @endforeach


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


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
    </script>
@endsection
@section('styles')

@endsection
