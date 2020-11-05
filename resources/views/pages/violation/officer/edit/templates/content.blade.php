<div class="container">
    {{Form::open([
        'route'=>['handleEditOfficer',$officer->id],
        'method'=>'put'
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">

                    <div class="col-md-4">
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" name="name" autocomplete="off" type="text"
                                   value="{{$officer->name}}" placeholder="{{__('violation.name_type')}}"/>
                            <label class="input__label input__label--isao" data-content="{{__('violation.name')}}">
                            <span class="input__label-content input__label-content--isao">
                                <star>*</star> {{__('violation.name')}}

                                @if($errors->has('name'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('name')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-3">
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" name="phone" autocomplete="off" type="text"
                                   value="{{$officer->phone}}" placeholder="{{__('violation.phone_type')}}"/>
                            <label class="input__label input__label--isao arabicnumber" data-content="{{__('violation.phone')}}">
                            <span class="input__label-content input__label-content--isao">{{__('violation.phone')}}
                                @if($errors->has('phone'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('phone')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-4">
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" name="email" autocomplete="off" type="text"
                                   value="{{$officer->email}}" placeholder="{{__('violation.email_type')}}"/>
                            <label class="input__label input__label--isao" data-content="{{__('violation.email')}}">
                            <span class="input__label-content input__label-content--isao">{{__('violation.email')}}
                                @if($errors->has('email'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('email')}})</span>
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
                {{__('violation.update')}}
            </button>
        </div>
    </div>
    {{Form::close()}}
</div>