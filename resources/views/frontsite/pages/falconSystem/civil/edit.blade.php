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
                        <h3>تعديل صقر</h3>
                        <h3>Edit Falcon Details</h3>
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
                        'route'=>['handle-edit-falcon',$falcon->id],
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
                                                    <input type="text" name="P_O_CIVIL_ID" class="ui-input"
                                                           value="{{$falcon->P_O_CIVIL_ID ?? ''}}"
                                                           autocomplete="off">
                                                    <span id="P_O_CIVIL_ID"
                                                          class="tag color-red">{{$errors->first('P_O_CIVIL_ID')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_O_A_NAME"> الاسم بالعربي

                                                    </label>
                                                    <input type="text" name="P_O_A_NAME" class="ui-input"
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
                                                    <input type="text" name="P_O_ADDRESS" class="ui-input"
                                                           value="{{$falcon->P_O_ADDRESS ?? ''}}"
                                                           autocomplete="off">
                                                    <span id="P_O_ADDRESS"
                                                          class="tag color-red">{{$errors->first('P_O_ADDRESS')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_O_PASSPORT_NO">رقم الجواز لصاحب الطلب

                                                    </label>
                                                    <input type="text" name="P_O_PASSPORT_NO" class="ui-input"
                                                           value="{{$falcon->P_O_PASSPORT_NO ?? ''}}"
                                                           autocomplete="off">
                                                    <span id="P_O_PASSPORT_NO"
                                                          class="tag color-red">{{$errors->first('P_O_PASSPORT_NO')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_CIVIL_EXPIRY_DT"> تاريخ انتهاء البطاقة المدنية

                                                    </label>
                                                    <input type="text" name="P_CIVIL_EXPIRY_DT" class="ui-input date"
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
                                                    <input type="text" name="P_O_MOBILE" class="ui-input"
                                                           value="{{$falcon->P_O_MOBILE ?? ''}}"
                                                           autocomplete="off">
                                                    <span id="P_O_MOBILE"
                                                          class="tag color-red">{{$errors->first('P_O_MOBILE')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_O_MAIL">البريد الالكتروني

                                                    </label>
                                                    <input type="text" name="P_O_MAIL" class="ui-input"
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
                                                    <input type="text" name="P_NW_CIVIL_ID" class="ui-input"
                                                           value="{{$falcon->P_NW_CIVIL_ID}}"
                                                           autocomplete="off"> )
                                                    <span id="P_NW_CIVIL_ID"
                                                          class="tag color-red">{{$errors->first('P_NW_CIVIL_ID')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_A_NAME"> الاسم العربي للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_A_NAME" class="ui-input"
                                                           value="{{$falcon->P_NW_A_NAME}}"
                                                           autocomplete="off">
                                                    <span id="P_NW_A_NAME"
                                                          class="tag color-red">{{$errors->first('P_NW_A_NAME')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_ADDRESS"> العنوان للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_ADDRESS" class="ui-input"
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
                                                    <input type="text" name="P_NW_PASSPORT_NO" class="ui-input"
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
                                                    <input type="text" name="P_NW_MOBILE" class="ui-input"
                                                           value="{{$falcon->P_NW_MOBILE}}"
                                                           autocomplete="off">
                                                    <span id="P_NW_MOBILE"
                                                          class="tag color-red">{{$errors->first('P_NW_MOBILE')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_O_MAIL">البريد الالكتروني للمالك الجديد

                                                    </label>
                                                    <input type="text" name="P_NW_O_MAIL" class="ui-input"
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
                                                    <input type="text" name="P_CUR_PASS_FAL" class="ui-input"
                                                           value="{{$falcon->P_CUR_PASS_FAL}}"
                                                           autocomplete="off">
                                                    <span id="P_CUR_PASS_FAL"
                                                          class="tag color-red">{{$errors->first('P_CUR_PASS_FAL')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_NW_A_NAME">
                                                        الجنس
                                                    </label>
                                                    <select name="P_FAL_SEX" class="ui-input"
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
                                                    <input type="text" name="P_FAL_SPECIES" class="ui-input"
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
                                                    <select name="P_FAL_TYPE" class="ui-input">
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
                                                    <input type="text" name="P_FAL_OTHER_TYPE" class="ui-input"

                                                           value="{{$falcon->P_FAL_OTHER_TYPE}}"
                                                           autocomplete="off">
                                                    <span id="P_FAL_OTHER_TYPE"
                                                          class="tag color-red">{{$errors->first('P_FAL_OTHER_TYPE')}}</span>
                                                </div>
                                                <div class="column is-12 is-4-desktop">
                                                    <label for="P_FAL_ORIGIN_COUNTRY">
                                                        بلد المنشأ
                                                    </label>
                                                    <select name="P_FAL_ORIGIN_COUNTRY" class="ui-input">
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
                                                    <select name="P_FAL_CITES_NO" class="ui-input">
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
                                                    <select name="P_FAL_INJ_HOSPITAL" class="ui-input"
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

                                            <button class="btn btn-secondary mb-5" type="button" onclick="addRow()">
                                                <i class="icon icon-plus"></i>
                                            </button>

                                            <div id="row_files">
                                                @foreach($falcon->file_details ?? [] as $k=>$file)
                                                    <div class="columns centered">
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
                                                    </div>
                                                @endforeach


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
        let counter = -1
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
                // form.submit();
                let form_data = new FormData(form);
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.status) {
                            Swal.fire({
                                'icon': 'success',
                                'text': 'تمت العملية بنجاح',
                                'title': 'نجاح',
                            })
                            location.href = '{{route('falcon-civilIndex')}}'

                        } else {
                            $('.tag').text('')
                            let errors = response.data.validation_errors;
                            $.each(errors, (k, v) => {
                                let selector = k.replace(/\./g, '').replace(/\./g, '').replace(/\./g, '');

                                $(`#${selector}`).text(v[0])
                            })

                        }
                    }
                });
            }
        });

        function addRow() {
            counter++;
            $('#row_files').append(`
                                                <div class="columns centered">
                                                    <div class="column is-12 is-4-desktop">
                                                        <label for="file_type_id">
                                                            نوع الملف
                                                        </label>
                                                        <select name="files[${counter}][file_type_id]" class="ui-input">
                                                            @foreach($helper_utilities['documents_type'] ?? [] as $item)
                <option
                    value="{{$item['id']}}">{{$item['label']}}</option>
                                                            @endforeach
                </select>
                <span id="files${counter}file_type_id"
                    class="tag color-red">{{$errors->first('P_FAL_TYPE')}}</span>
                </div>

                <div class="column is-12 is-4-desktop">
                    <label for="P_FAL_PIT_NO">
                        الملف
                    </label>
                    <input type="file" name="files[${counter}][file]" class="ui-input">
                <span id="files${counter}file"
                    class="tag color-red">{{$errors->first('files')}}</span>
                </div>
            </div>`)
        }


        $(`select[name="P_REQUEST_TYP"]`).on('change', () => {
            let value = $("select[name=\"P_REQUEST_TYP\"] option:selected").val();
            console.log(value)
            if (value == 4) {

                $('#new_owner').show();
            } else {

                $('#new_owner').hide()
            }
        })
    </script>
@endsection
@section('styles')

@endsection
