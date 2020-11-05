<div class="container-fluid">

    {{Form::open([
        'method'=>'post',
        'route'=>'postTender',
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">
                    <div class="col-md-2">
                        <b>{{__('tenders.tender_no')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="number"
                                   autocomplete="off"
                                   value="{{old('number')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('number'))
                                    
                                    <span class="text-danger">({{$errors->first('number')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3">
                        <b>{{__('tenders.title')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="title_ar"
                                   autocomplete="off"
                                   value="{{old('title_ar')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('title_ar'))
                                    
                                    <span class="text-danger">({{$errors->first('title_ar')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3">
                        <b>{{__('tenders.title_en')}} </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="title_en"
                                   autocomplete="off"
                                   value="{{old('title_en')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('title_en'))
                                    
                                    <span class="text-danger">({{$errors->first('title_en')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>


                    <div class="col-md-2">
                        <b>{{__('tenders.type')}}
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="type"
                                   autocomplete="off"
                                   value="{{old('type')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('type'))
                                    
                                    <span class="text-danger">({{$errors->first('type')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-2">
                        <b>{{__('tenders.order')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao arabicnumber" type="text"
                                   name="order"
                                   autocomplete="off"
                                   value="{{$order_id}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('order'))
                                    
                                    <span class="text-danger">({{$errors->first('order')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>


                    <div class="col-md-3">
                        <b>{{__('tenders.opening_date')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao date_time" type="text"
                                   name="open_date"
                                   autocomplete="off"
                                   value="{{old('open_date')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('open_date'))
                                    
                                    <span class="text-danger">({{$errors->first('open_date')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3">
                        <b>{{__('tenders.closing_date')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao date_time" type="text"
                                   name="last_app_date"
                                   autocomplete="off"
                                   value="{{old('last_app_date')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('last_app_date'))
                                    
                                    <span class="text-danger">({{$errors->first('last_app_date')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3">
                        <b>{{__('tenders.meeting_date')}}
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao date_time2" type="text"
                                   name="meeting_date"
                                   autocomplete="off"
                                   value="{{old('meeting_date')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('meeting_date'))
                                    
                                    <span class="text-danger">({{$errors->first('meeting_date')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-12"></div>

                    <div class="col-md-2">
                        <b>{{__('tenders.allow_alternative')}}</b>
                        <select name="allow_alternative" class="form-control">
                            <option value="1">{{__('tenders.yes')}}</option>
                            <option value="0">{{__('tenders.no')}}</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <b>{{__('tenders.allow_division')}}</b>
                        <select name="allow_division" class="form-control">
                            <option value="1">{{__('tenders.yes')}}</option>
                            <option value="0">{{__('tenders.no')}}</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <b>{{__('tenders.ctc_only')}}</b>
                        <select name="ctc_only" class="form-control">
                            <option value="0">{{__('tenders.no')}}</option>
                            <option value="1">{{__('tenders.yes')}}</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <b>{{__('tenders.ctc_link')}}  </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="ctc_link"
                                   autocomplete="off"
                                   value="{{old('ctc_link')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('ctc_link'))
                                    
                                    <span class="text-danger">({{$errors->first('ctc_link')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>


                    <div class="col-md-2">
                        <b>{{__('tenders.insurance')}}
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao arabicnumber" type="text"
                                   name="insurance"
                                   autocomplete="off"
                                   value="{{old('insurance')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('insurance'))
                                    
                                    <span class="text-danger">({{$errors->first('insurance')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-2">
                        <b>{{__('tenders.price')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao arabicnumber" type="text"
                                   name="price"
                                   autocomplete="off"
                                   value="{{old('price')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('price'))
                                    <span class="text-danger">({{$errors->first('price')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-8">
                        <b>{{__('tenders.comments')}}
                        </b>
                        <span class="input input--isao">
                            <textarea class="input__field input__field--isao" rows="1"
                                      name="comments">{{old('comments')}}</textarea>
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
                            {{__('tenders.save')}}
                        </button>
                    </div>

                </div>
            </fieldset>
        </div>
    </div>
    {{Form::close()}}
</div>