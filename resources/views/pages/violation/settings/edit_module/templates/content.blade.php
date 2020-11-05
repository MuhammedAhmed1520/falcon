<div class="container">
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.settings')}}</legend>
                <div class="row">
                    <div class="col-md-4">
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text">
                            <label class="input__label input__label--isao" data-content="{{__('violation.name_ar')}}">
                            <span class="input__label-content input__label-content--isao">{{__('violation.name_ar')}}</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-4">
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text">
                            <label class="input__label input__label--isao" data-content="{{__('violation.name_en')}}">
                            <span class="input__label-content input__label-content--isao">{{__('violation.name_en')}}</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-6">
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text">
                            <label class="input__label input__label--isao"
                                   data-content="{{__('violation.details_ar')}}">
                            <span class="input__label-content input__label-content--isao">{{__('violation.details_ar')}}</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-6">
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text">
                            <label class="input__label input__label--isao"
                                   data-content="{{__('violation.details_en')}}">
                            <span class="input__label-content input__label-content--isao">{{__('violation.details_en')}}</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-2">
                        <b>{{__('violation.visible')}}</b>
                        <select class="form-control">
                            <option value="">YES</option>
                            <option value="">NO</option>
                        </select>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-3">
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text">
                            <label class="input__label input__label--isao" data-content="{{__('violation.order')}}">
                            <span class="input__label-content input__label-content--isao">{{__('violation.order')}}</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary">
                            {{__('violation.save')}}
                        </button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>