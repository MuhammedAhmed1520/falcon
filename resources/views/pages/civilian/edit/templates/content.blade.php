<div class="container-fluid">
    {{Form::open([
    'route'=>['handleEditCivilian',$user->id],
        'method'=>'put'
    ])}}
    <div class="row">
        <div class="col-md-12 p-2">
            <fieldset>
                <div class="row mt-4 mb-3">

                    <div class="col-md-3 mb-2">
                        <label class="font-weight-bold">
                            الاسم
                        </label>
                        <input type="text" class="form-control" name="P_O_A_NAME" value="{{$user->P_O_A_NAME}}">
                        @if($errors->has('P_O_A_NAME'))
                            <span class="text-danger">({{$errors->first('P_O_A_NAME')}})</span>
                        @endif
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="font-weight-bold">
                            البريد الالكتروني
                        </label>
                        <input type="text" class="form-control" name="email" value="{{$user->email}}">
                        @if($errors->has('email'))
                            <span class="text-danger">({{$errors->first('email')}})</span>
                        @endif
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="font-weight-bold">
                            رقم الموبايل
                        </label>
                        <input type="text" class="form-control" name="P_O_MOBILE" value="{{$user->P_O_MOBILE}}">
                        @if($errors->has('P_O_MOBILE'))
                            <span class="text-danger">({{$errors->first('P_O_MOBILE')}})</span>
                        @endif
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="font-weight-bold">
                            الرقم المدني
                        </label>
                        <input type="text" class="form-control" name="P_O_CIVIL_ID" value="{{$user->P_O_CIVIL_ID}}">
                        @if($errors->has('P_O_CIVIL_ID'))
                            <span class="text-danger">({{$errors->first('P_O_CIVIL_ID')}})</span>
                        @endif
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="font-weight-bold">
                            العنوان
                        </label>
                        <input type="text" class="form-control" name="P_O_ADDRESS" value="{{$user->P_O_ADDRESS}}">
                        @if($errors->has('P_O_ADDRESS'))
                            <span class="text-danger">({{$errors->first('P_O_ADDRESS')}})</span>
                        @endif
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="font-weight-bold">
                            رقم الجواز
                        </label>
                        <input type="text" class="form-control" name="P_O_PASSPORT_NO"
                               value="{{$user->P_O_PASSPORT_NO}}">
                        @if($errors->has('P_O_PASSPORT_NO'))
                            <span class="text-danger">({{$errors->first('P_O_PASSPORT_NO')}})</span>
                        @endif
                    </div>
                    <div class="col-md-3 mb-2">
                        <label class="font-weight-bold">
                            تاريخ انتهاء البطاقة المدنية
                        </label>
                        <input type="text" class="form-control date" name="P_CIVIL_EXPIRY_DT"
                               value="{{$user->P_CIVIL_EXPIRY_DT}}">
                        @if($errors->has('P_CIVIL_EXPIRY_DT'))
                            <span class="text-danger">({{$errors->first('P_CIVIL_EXPIRY_DT')}})</span>
                        @endif
                    </div>


                </div>
            </fieldset>
        </div>

        <div class="col-md-12 text-center mt-2 mb-5">
            <button class="btn btn-primary">
                {{__('violation.update')}}
            </button>
        </div>

    </div>
    {{Form::close()}}
</div>
