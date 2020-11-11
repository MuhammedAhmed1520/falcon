<div class="container-fluid">
    @can('edit-falcon')
        {{Form::open([
            'route'=>['handleEditFalconsCivilians',$falcon->id],
            'method'=>'post',
            'id'=>'form'
        ])}}
    @endcan
    <div class="row">
        <div class="col-md-12 p-2">
            <fieldset>
                <legend>البيانات الشخصية</legend>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="w-100">
                                <div class="w-100-content">
                                    <div class="content">

                                        <div class="row ">
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_REQUEST_TYP">
                                                    رقم الطلب

                                                </label>
                                                <select name="P_REQUEST_TYP" class="form-control"
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
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_O_CIVIL_ID">
                                                    الرقم المدني

                                                </label>
                                                <input type="text" name="P_O_CIVIL_ID" class="form-control"
                                                       value="{{$falcon->P_O_CIVIL_ID ?? ''}}"
                                                       autocomplete="off">
                                                <span id="P_O_CIVIL_ID"
                                                      class="tag color-red">{{$errors->first('P_O_CIVIL_ID')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_O_A_NAME"> الاسم بالعربي

                                                </label>
                                                <input type="text" name="P_O_A_NAME" class="form-control"
                                                       value="{{$falcon->P_O_A_NAME ?? ''}}"
                                                       autocomplete="off">
                                                <span id="P_O_A_NAME"
                                                      class="tag color-red">{{$errors->first('P_O_A_NAME')}}</span>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_O_ADDRESS"> العنوان

                                                </label>
                                                <input type="text" name="P_O_ADDRESS" class="form-control"
                                                       value="{{$falcon->P_O_ADDRESS ?? ''}}"
                                                       autocomplete="off">
                                                <span id="P_O_ADDRESS"
                                                      class="tag color-red">{{$errors->first('P_O_ADDRESS')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_O_PASSPORT_NO">رقم الجواز
                                                    لصاحب الطلب

                                                </label>
                                                <input type="text" name="P_O_PASSPORT_NO" class="form-control"
                                                       value="{{$falcon->P_O_PASSPORT_NO ?? ''}}"
                                                       autocomplete="off">
                                                <span id="P_O_PASSPORT_NO"
                                                      class="tag color-red">{{$errors->first('P_O_PASSPORT_NO')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_CIVIL_EXPIRY_DT"> تاريخ
                                                    انتهاء البطاقة المدنية

                                                </label>
                                                <input type="text" name="P_CIVIL_EXPIRY_DT" class="form-control date"
                                                       value="{{$falcon->P_CIVIL_EXPIRY_DT}}"
                                                       autocomplete="off">
                                                <span id="P_CIVIL_EXPIRY_DT"
                                                      class="tag color-red">{{$errors->first('P_CIVIL_EXPIRY_DT')}}</span>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_O_MOBILE"> المحمول / الهاتف


                                                </label>
                                                <input type="text" name="P_O_MOBILE" class="form-control"
                                                       value="{{$falcon->P_O_MOBILE ?? ''}}"
                                                       autocomplete="off">
                                                <span id="P_O_MOBILE"
                                                      class="tag color-red">{{$errors->first('P_O_MOBILE')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_O_MAIL">البريد الالكتروني

                                                </label>
                                                <input type="text" name="P_O_MAIL" class="form-control"
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
            </fieldset>

            <fieldset id="new_owner" @if($falcon->P_REQUEST_TYP != 4) style="display: none" @endif>
                <legend>البيانات الشخصية للمالك الجديد</legend>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="w-100">
                                <div class="w-100-content">
                                    <div class="content">
                                        <div class="text-center">
                                        </div>

                                        <div class="row ">
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_NW_CIVIL_ID">
                                                    الرقم المدني للمالك الجديد

                                                </label>
                                                <input type="text" name="P_NW_CIVIL_ID" class="form-control"
                                                       value="{{$falcon->P_NW_CIVIL_ID}}"
                                                       autocomplete="off">
                                                <span id="P_NW_CIVIL_ID"
                                                      class="tag color-red">{{$errors->first('P_NW_CIVIL_ID')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_NW_A_NAME"> الاسم العربي
                                                    للمالك الجديد

                                                </label>
                                                <input type="text" name="P_NW_A_NAME" class="form-control"
                                                       value="{{$falcon->P_NW_A_NAME}}"
                                                       autocomplete="off">
                                                <span id="P_NW_A_NAME"
                                                      class="tag color-red">{{$errors->first('P_NW_A_NAME')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_NW_ADDRESS"> العنوان للمالك
                                                    الجديد

                                                </label>
                                                <input type="text" name="P_NW_ADDRESS" class="form-control"
                                                       value="{{$falcon->P_NW_ADDRESS}}"
                                                       autocomplete="off">
                                                <span id="P_NW_ADDRESS"
                                                      class="tag color-red">{{$errors->first('P_NW_ADDRESS')}}</span>

                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_NW_PASSPORT_NO">رقم الجواز
                                                    للمالك الجديد

                                                </label>
                                                <input type="text" name="P_NW_PASSPORT_NO" class="form-control"
                                                       value="{{$falcon->P_NW_PASSPORT_NO}}"
                                                       autocomplete="off">
                                                <span id="P_NW_PASSPORT_NO"
                                                      class="tag color-red">{{$errors->first('P_NW_PASSPORT_NO')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_NW_CIVIL_EXPIRY"> تاريخ
                                                    انتهاء البطاقة المدنية للمالك
                                                    الجديد

                                                </label>
                                                <input type="text" name="P_NW_CIVIL_EXPIRY" class="form-control date"

                                                       value="{{$falcon->P_NW_CIVIL_EXPIRY}}"
                                                       autocomplete="off">
                                                <span id="P_NW_CIVIL_EXPIRY"
                                                      class="tag color-red">{{$errors->first('P_NW_CIVIL_EXPIRY')}}</span>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_NW_MOBILE"> المحمول للمالك
                                                    الجديد/الهاتف

                                                </label>
                                                <input type="text" name="P_NW_MOBILE" class="form-control"
                                                       value="{{$falcon->P_NW_MOBILE}}"
                                                       autocomplete="off">
                                                <span id="P_NW_MOBILE"
                                                      class="tag color-red">{{$errors->first('P_NW_MOBILE')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_NW_O_MAIL">البريد الالكتروني
                                                    للمالك الجديد

                                                </label>
                                                <input type="text" name="P_NW_O_MAIL" class="form-control"
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
            </fieldset>

            <fieldset>
                <legend>بيانات الصقر</legend>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="w-100">
                                <div class="w-100-content">
                                    <div class="content">
                                        <div class="row ">
                                            <div class="col-md-4" id="current_falcon"
                                                 @if($falcon->P_REQUEST_TYP != 4) style="display: none" @endif>
                                                <label class="font-weight-bold mt-3" for="P_CUR_PASS_FAL">
                                                    رقم جواز الصقر الحالي
                                                </label>
                                                <input type="text" name="P_CUR_PASS_FAL" class="form-control"
                                                       value="{{$falcon->P_CUR_PASS_FAL}}"
                                                       autocomplete="off">
                                                <span id="P_CUR_PASS_FAL"
                                                      class="tag color-red">{{$errors->first('P_CUR_PASS_FAL')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_NW_A_NAME">
                                                    الجنس
                                                </label>
                                                <select name="P_FAL_SEX" class="form-control"
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
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_FAL_SPECIES">فئة
                                                    الصقر</label>
                                                <input type="text" name="P_FAL_SPECIES" class="form-control"
                                                       value="{{$falcon->P_FAL_SPECIES}}"
                                                       autocomplete="off">
                                                <span id="P_FAL_SPECIES"
                                                      class="tag color-red">{{$errors->first('P_FAL_SPECIES')}}</span>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_FAL_TYPE">
                                                    نوع الصقر
                                                </label>
                                                <select name="P_FAL_TYPE" class="form-control">
                                                    @foreach($helper_utilities['P_FAL_TYPE'] ?? [] as $item)
                                                        <option @if($falcon->P_FAL_TYPE == $item['id']) selected
                                                                @endif value="{{$item['id']}}">{{$item['label']}}</option>
                                                    @endforeach
                                                </select>
                                                <span id="P_FAL_TYPE"
                                                      class="tag color-red">{{$errors->first('P_FAL_TYPE')}}</span>
                                            </div>
                                            <div class="col-md-4" id="falcon_other_type"
                                                 @if($falcon->P_FAL_TYPE != 9) style="display: none" @endif>
                                                <label class="font-weight-bold mt-3" for="P_FAL_OTHER_TYPE"> اخري

                                                </label>
                                                <input type="text" name="P_FAL_OTHER_TYPE" class="form-control"

                                                       value="{{$falcon->P_FAL_OTHER_TYPE}}"
                                                       autocomplete="off">
                                                <span id="P_FAL_OTHER_TYPE"
                                                      class="tag color-red">{{$errors->first('P_FAL_OTHER_TYPE')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_FAL_ORIGIN_COUNTRY">
                                                    بلد المنشأ
                                                </label>
                                                <select name="P_FAL_ORIGIN_COUNTRY" class="form-control">
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

                                        <div class="row ">
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_FAL_CITES_NO">
                                                    رقم ملحق سايتس
                                                </label>
                                                <select name="P_FAL_CITES_NO" class="form-control">
                                                    @foreach($helper_utilities['P_FAL_CITES_NO'] ?? [] as $item)
                                                        <option @if($falcon->P_FAL_CITES_NO == $item['id']) selected
                                                                @endif
                                                                value="{{$item['id']}}">{{$item['label']}}</option>
                                                    @endforeach
                                                </select>
                                                <span id="P_FAL_CITES_NO"
                                                      class="tag color-red">{{$errors->first('P_FAL_CITES_NO')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="font-weight-bold mt-3" for="P_FAL_INJ_HOSPITAL">
                                                    المستشفي
                                                </label>
                                                <select name="P_FAL_INJ_HOSPITAL" class="form-control"
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
            </fieldset>


            <fieldset>
                <legend>الملفات</legend>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="w-100">
                                <div class="w-100-content">
                                    <div class="content">

                                        <div id="row_files">
                                            @foreach($falcon->file_details ?? [] as $k=>$file)
                                                <div class="row mb-3" id="row_{{$file->id}}">
                                                    <div class="col-md-4">
                                                        <b for="file_type_id" class="text-bold">
                                                            نوع الملف <br>
                                                        </b>
                                                        {{$file->file_type->label ?? ''}}
                                                    </div>

                                                    <div class="col-md-4">
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
            </fieldset>
        </div>
        @can('edit-falcon')
            <div class="col-md-12 text-center mt-2 mb-5">
                <button class="btn btn-primary">
                    {{__('violation.update')}}
                </button>
            </div>
        @endcan
    </div>
    @can('edit-falcon')
        {{Form::close()}}
    @endcan
</div>
