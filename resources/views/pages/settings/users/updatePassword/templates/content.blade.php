<div class="container-fluid">
    {{Form::open([
        'route'=>['handleUpdateUserPassword',$user->id],
        'method'=>'put'
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">
    

                    <div class="col-md-3">
                        <b>
                            <star>*</star>
                            {{__('settings.old_password')}}
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" name="old_password" autocomplete="off"
                                   type="password"
                                   value="" placeholder="{{__('settings.old_password')}}"/>
                            <label class="input__label input__label--isao" data-content="{{__('settings.old_password')}}">
                            <span class="input__label-content input__label-content--isao">

                                @if($errors->has('old_password'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('old_password')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div> 
                    

                    <div class="col-md-3">
                        <b>
                            <star>*</star>
                            {{__('settings.password')}}
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" name="password" autocomplete="off"
                                   type="password"
                                   value="" placeholder="{{__('settings.password')}}"/>
                            <label class="input__label input__label--isao" data-content="{{__('settings.password')}}">
                            <span class="input__label-content input__label-content--isao">

                                @if($errors->has('password'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('password')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3">
                        <b>
                            <star>*</star>
                            {{__('settings.password_confirmation')}}
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" name="password_confirmation" autocomplete="off"
                                   type="password"
                                   value="" placeholder="{{__('settings.password_confirmation')}}"/>
                            <label class="input__label input__label--isao" data-content="{{__('settings.password_confirmation')}}">
                            <span class="input__label-content input__label-content--isao">

                                @if($errors->has('password_confirmation'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('password_confirmation')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                </div>
            </fieldset>
        </div>

        <div class="col-md-12 text-center mt-2 mb-5">
            <button class="btn btn-primary">
                {{__('violation.save')}}
            </button>
        </div>
    </div>
    {{Form::close()}}
</div>