<div class="container-fluid">
    {{Form::open([
        'route'=>'handleAddUser',
        'method'=>'post'
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
                            <input class="input__field input__field--isao" name="name" autocomplete="off" type="text"
                                   value="{{old('name')}}" placeholder="{{__('violation.name_type')}}"/>
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
                            <star>*</star>
                            {{__('violation.phone')}}
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" name="mobile" autocomplete="off" type="text"
                                   value="{{old('mobile')}}" placeholder="{{__('violation.phone')}}"/>
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
                            {{__('settings.username')}}
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" name="username" autocomplete="off"
                                   type="text"
                                   value="{{old('username')}}" placeholder="{{__('settings.username')}}"/>
                            <label class="input__label input__label--isao" data-content="{{__('settings.username')}}">
                            <span class="input__label-content input__label-content--isao">

                                @if($errors->has('username'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('username')}})</span>
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
                                   value="{{old('password')}}" placeholder="{{__('settings.password')}}"/>
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
                            {{__('settings.permission')}}
                        </b>
                        <select name="role_id" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->title}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('role_id'))
                            <span class="text-danger">({{$errors->first('role_id')}})</span>
                        @endif
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