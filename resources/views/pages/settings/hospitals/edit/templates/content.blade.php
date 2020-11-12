<div class="container-fluid">
    {{Form::open([
        'route'=>['handleEditUserHospital',$user->id],
        'method'=>'put'
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">

                    <div class="col-md-4">
                        <b>
                            {{__('violation.name')}}
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" name="name" disabled autocomplete="off" type="text"
                                   value="{{$user->name}}" placeholder="{{__('violation.name_type')}}"/>
                            <label class="input__label input__label--isao" data-content="{{__('violation.name')}}">
                            <span class="input__label-content input__label-content--isao">

                                @if($errors->has('name'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('name')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-2">
                        <b>
                            {{--<star>*</star>--}}
                            {{__('violation.phone')}}
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" name="mobile" autocomplete="off" type="text"
                                   value="{{$user->mobile}}" placeholder="{{__('violation.phone')}}"/>
                            <label class="input__label input__label--isao" data-content="{{__('violation.phone')}}">
                            <span class="input__label-content input__label-content--isao">

                                @if($errors->has('mobile'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('mobile')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-3">
                        <b>
                            <star>*</star>
                            البريد الالكترونى
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" name="email"  autocomplete="off"
                                   type="text"
                                   value="{{$user->email}}" placeholder="البريد الالكترونى"/>
                            <label class="input__label input__label--isao" data-content="البريد الالكترونى">
                            <span class="input__label-content input__label-content--isao">

                                @if($errors->has('email'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('email')}})</span>
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
                            <input class="input__field input__field--isao" name="password"  autocomplete="off"
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
                            المستشفى
                        </b>
                        <select name="hospital_id" class="form-control">
                            @foreach($options as $option)
                                <option value="{{$option->id}}"
                                        @if($option->id == ($user->hospital->id ?? 0)) selected @endif>{{$option->label}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('hospital_id'))
                            <span class="text-danger">({{$errors->first('hospital_id')}})</span>
                        @endif
                    </div>
                </div>
            </fieldset>
        </div>
        @can('edit-user-hospital')
        <div class="col-md-12 text-center mt-2 mb-5">
            <button class="btn btn-primary">
                {{__('violation.save')}}
            </button>
        </div>
        @endcan
    </div>
    {{Form::close()}}
</div>
