<div class="container-fluid">
    {{Form::open([
        'method'=>'post',
        'route'=>['handleEditCompany',$company->id]
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">
                    <div class="col-md-2">
                        <b>{{__('tenders.reference')}}
                        </b>
                        <span class="input input--isao">
                            <input type="hidden" name="reference" value="{{$company->tender_company->reference_code}}">
                            <input class="input__field input__field--isao" type="text"
                                   name="reference"
                                   autocomplete="off"
                                   disabled
                                   value="{{$company->tender_company->reference_code}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('reference'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('reference')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-3">
                        <b>{{__('tenders.company_name')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="name"
                                   autocomplete="off"
                                   value="{{$company->name}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('name'))

                                    <span class="text-danger">({{$errors->first('name')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3">
                        <b>{{__('tenders.company_name_en')}} </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="name_en"
                                   autocomplete="off"
                                   value="{{$company->tender_company->name_en}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('name_en'))

                                    <span class="text-danger">({{$errors->first('name_en')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-3">
                        <b>{{__('tenders.person_name')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="civil_name"
                                   autocomplete="off"
                                   value="{{$company->tender_company->civil_name}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('civil_name'))

                                    <span class="text-danger">({{$errors->first('civil_name')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-3">
                        <b>{{__('tenders.civil_ssn')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao arabicnumber" type="text"
                                   name="civil_ssn"
                                   autocomplete="off"
                                   value="{{$company->tender_company->civil_ssn}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('civil_ssn'))

                                    <span class="text-danger">({{$errors->first('civil_ssn')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-3">
                        <b>{{__('tenders.person_mobile')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao arabicnumber" type="text"
                                   name="phone"
                                   autocomplete="off"
                                   value="{{$company->tender_company->phone}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('phone'))

                                    <span class="text-danger">({{$errors->first('phone')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-3">
                        <b>{{__('tenders.email')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="email"
                                   autocomplete="off"
                                   value="{{$company->tender_company->email}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('email'))

                                    <span class="text-danger">({{$errors->first('email')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-3">
                        <b>{{__('tenders.licence_number')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="licence_number"
                                   autocomplete="off"
                                   value="{{$company->tender_company->licence_number}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('licence_number'))

                                    <span class="text-danger">({{$errors->first('licence_number')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-12">
                        <b>{{__('tenders.comments')}}
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="comments"
                                   autocomplete="off"
                                   value="{{$company->tender_company->comments}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('comments'))

                                    <span class="text-danger">({{$errors->first('comments')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>


                    <div class="col-md-12 text-center mt-3 mb-5">
                        <button class="btn btn-primary">
                            {{__('tenders.edit')}}
                        </button>
                    </div>

                </div>
            </fieldset>
        </div>
    </div>
    {{Form::close()}}
</div>