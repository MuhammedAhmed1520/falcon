<div class="container-fluid">
    {{Form::open([
        'method'=>'post',
        'route'=>'handleCreatePunishmentRules'
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">
                    <div class="col-md-3">
                        <span class="input input--isao">
                            <input class="input__field input__field--isao arabicnumber" name="punishment_number"
                                   value="{{old('punishment_number')}}" type="text" autocomplete="off"
                                   placeholder="{{__('violation.punishment_number_type')}}"/>
                            <label class="input__label input__label--isao"
                                   data-content="{{__('violation.punishment_number')}}">
                            <span class="input__label-content input__label-content--isao">
                                <star>*</star>
                                {{__('violation.punishment_number')}}

                                @if($errors->has('punishment_number'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('punishment_number')}})</span>
                                @endif</span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-4">
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" name="punishment_title" autocomplete="off"
                                   value="{{old('punishment_title')}}" type="text"
                                   placeholder="{{__('violation.punishment_title_type')}}"/>
                            <label class="input__label input__label--isao"
                                   data-content="{{__('violation.punishment_title')}}">
                            <span class="input__label-content input__label-content--isao">
                                {{__('violation.punishment_title')}}

                                @if($errors->has('subject_title'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('subject_title')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-12">


                        <div class="row  mb-4 f_para">
                            <div class="col-md-12 text-right">
                                <br>
                            </div>

                            <div class="col-md-4 ">
                                <div class="col-md-1 position-absolute"
                                     style="top: -20px;{{app()->getLocale() =='ar'?'right':'left'}}: 0;display: inline-flex;">
                                    <input type="checkbox" class="fine_check" value="1" id="show_1" checked>
                                    <label for="show_1">{{app()->getLocale() == 'ar' ? 'اظهار' :  'Show'}}</label>
                                </div>
                                <div class="row fine">
                                    <div class="col-md-6">

                                            <span class="input input--isao">
                                            <input class="input__field input__field--isao arabicnumber" type="text"
                                                   name="main_min_fine"
                                                   value="{{old('main_min_fine')}}" autocomplete="off"
                                                   placeholder="{{__('violation.punishment_min_fine_type')}} "/>
                                            <label class="input__label input__label--isao"
                                                   data-content="{{__('violation.punishment_min_fine')}}">
                                            <span class="input__label-content input__label-content--isao">
                                                {{__('violation.punishment_min_fine')}}
                                                @if($errors->has('paragraph_min_fine'))
                                                    <br>
                                                    <span class="text-danger">({{$errors->first('paragraph_min_fine')}})</span>
                                                @endif
                                            </span>
                                        </label>
                                      </span>
                                    </div>
                                    <div class="col-md-6">
                                                <span class="input input--isao">
                                                    <input class="input__field input__field--isao arabicnumber"
                                                           type="text"
                                                           name="main_max_fine"
                                                           value="{{old('main_max_fine')}}"
                                                           autocomplete="off"
                                                           placeholder="{{__('violation.punishment_max_fine_type')}} "/>
                                                    <label class="input__label input__label--isao"
                                                           data-content="{{__('violation.punishment_max_fine')}}">
                                                    <span class="input__label-content input__label-content--isao">
                                                        {{__('violation.punishment_max_fine')}}

                                                        @if($errors->has('paragraph_max_fine'))
                                                            <br>
                                                            <span class="text-danger">({{$errors->first('paragraph_max_fine')}})</span>
                                                        @endif
                                                    </span>
                                                </label>
                                              </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-1 position-absolute"
                                     style="top: -20px;{{app()->getLocale() =='ar'?'right':'left'}}: 0;display: inline-flex;">
                                    <input type="checkbox" class="jail_check" value="1" id="show_2">
                                    <label for="show_2">{{app()->getLocale() == 'ar' ? 'اظهار' :  'Show'}}</label>
                                </div>
                                <div class="row jail" style="display: none">

                                    <div class="col-md-6">
                                            <span class="input input--isao">
                                                <input class="input__field input__field--isao" type="text"
                                                       name="main_min_jail"
                                                       value="{{old('main_min_jail')}}" autocomplete="off"
                                                       placeholder="{{__('violation.punishment_min_jail_type')}} "/>
                                                <label class="input__label input__label--isao"
                                                       data-content="{{__('violation.punishment_min_jail')}}">
                                                <span class="input__label-content input__label-content--isao">
                                                    {{__('violation.punishment_min_jail')}}
                                                    @if($errors->has('paragraph_min_jail'))
                                                        <br>
                                                        <span class="text-danger">({{$errors->first('paragraph_min_jail')}})</span>
                                                    @endif
                                                </span>
                                            </label>
                                          </span>
                                    </div>

                                    <div class="col-md-6 jail">
                                                <span class="input input--isao">
                                                    <input class="input__field input__field--isao" type="text"
                                                           name="main_max_jail"
                                                           value="{{old('main_max_jail')}}"
                                                           autocomplete="off"
                                                           placeholder="{{__('violation.punishment_max_jail_type')}} "/>
                                                    <label class="input__label input__label--isao"
                                                           data-content="{{__('violation.punishment_max_jail')}}">
                                                    <span class="input__label-content input__label-content--isao">
                                                        {{__('violation.punishment_max_jail')}}
                                                        @if($errors->has('paragraph_max_jail'))
                                                            <br>
                                                            <span class="text-danger">({{$errors->first('paragraph_max_jail')}})</span>
                                                        @endif
                                                    </span>
                                                </label>
                                              </span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                    <span class="input input--isao">
                                        <textarea class="input__field input__field--isao" name="main_details"
                                                  placeholder="{{__('violation.punishment_details_type')}}"
                                                  rows="3">{{old('main_details')}}</textarea>
                                        <label class="input__label input__label--isao"
                                               data-content="{{__('violation.punishment_details')}}">
                                        <span class="input__label-content input__label-content--isao">{{__('violation.punishment_details')}}</span>
                                    </label>
                                  </span>
                            </div>
                        </div>
                    </div>

                </div>
            </fieldset>
        </div>
        <div class="col-md-12">

            <fieldset>
                <legend>{{__('violation.secondary_info')}}</legend>
                <div class="row">
                    <div class="col-md-12">
                        <input type="checkbox" value="1" name="multi_paragraph" id="multi_paragraph">
                        <label for="multi_paragraph">{{app()->getLocale() == 'ar' ? 'اكثر من فقرة' : 'Multi Paragraph'}}</label>
                    </div>
                </div>

                @php
                    $range = range(0 , 0);
                    if($errors->has('paragraph_count')){
                        $max = $errors->first('paragraph_count') - 1;
                        $range = range(0 , $max);
                    }
                @endphp
                @foreach($range as $para)
                    <div class="row p-2">

                        <div class="col-md-12" id="paragraph_row">
                            <div class="row  bg-gray mb-4 m_para" style="display:none;">
                                <div class="col-md-12 float-left text-right">
                                    <button type="button" class="btn btn-danger mt-2 delete_btn">
                                        <i class="la la-close"></i>
                                    </button>
                                </div>
                                <div class="col-md-4">
                                <span class="input input--isao">
                                    <input class="input__field input__field--isao" type="text" name="paragraph_title[]"
                                           value="{{old('paragraph_title.'.$para)}}" autocomplete="off"
                                           placeholder="{{__('violation.punishment_p_title_type')}}"/>
                                    <label class="input__label input__label--isao"
                                           data-content="{{__('violation.punishment_p_title')}}">
                                    <span class="input__label-content input__label-content--isao">
                                        <star>*</star>
                                        {{__('violation.punishment_p_title')}}
                                        @if($errors->has('paragraph_title.'.$para))
                                            <br>
                                            <span class="text-danger">({{$errors->first('paragraph_title.'.$para)}})</span>
                                        @endif
                                    </span>
                                </label>
                              </span>
                                </div>
                                <div class="col-12">
                                    <br>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="col-md-1 position-absolute"
                                         style="top: -20px;{{app()->getLocale() =='ar'?'right':'left'}}: 0;display: inline-flex;">
                                        <input type="checkbox" class="fine_check" value="1" checked>
                                        <label for="">{{app()->getLocale() == 'ar' ? 'اظهار' :  'Show'}}</label>
                                    </div>
                                    <div class="row fine">
                                        <div class="col-md-6">

                                            <span class="input input--isao">
                                            <input class="input__field input__field--isao arabicnumber" type="text"
                                                   name="paragraph_min_fine[]"
                                                   value="{{old('paragraph_min_fine.'.$para)}}" autocomplete="off"
                                                   placeholder="{{__('violation.punishment_min_fine_type')}} "/>
                                            <label class="input__label input__label--isao"
                                                   data-content="{{__('violation.punishment_min_fine')}}">
                                            <span class="input__label-content input__label-content--isao">
                                                {{__('violation.punishment_min_fine')}}
                                                @if($errors->has('paragraph_min_fine.'.$para))
                                                    <br>
                                                    <span class="text-danger">({{$errors->first('paragraph_min_fine.'.$para)}})</span>
                                                @endif
                                            </span>
                                        </label>
                                      </span>
                                        </div>
                                        <div class="col-md-6">
                                                <span class="input input--isao">
                                                    <input class="input__field input__field--isao arabicnumber"
                                                           type="text"
                                                           name="paragraph_max_fine[]"
                                                           value="{{old('paragraph_max_fine.'.$para)}}"
                                                           autocomplete="off"
                                                           placeholder="{{__('violation.punishment_max_fine_type')}} "/>
                                                    <label class="input__label input__label--isao"
                                                           data-content="{{__('violation.punishment_max_fine')}}">
                                                    <span class="input__label-content input__label-content--isao">
                                                        {{__('violation.punishment_max_fine')}}

                                                        @if($errors->has('paragraph_max_fine.'.$para))
                                                            <br>
                                                            <span class="text-danger">({{$errors->first('paragraph_max_fine.'.$para)}})</span>
                                                        @endif
                                                    </span>
                                                </label>
                                              </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="col-md-1 position-absolute"
                                         style="top: -20px;{{app()->getLocale() =='ar'?'right':'left'}}: 0;display: inline-flex;">
                                        <input type="checkbox" class="jail_check" value="1">
                                        <label for="">{{app()->getLocale() == 'ar' ? 'اظهار' :  'Show'}}</label>
                                    </div>
                                    <div class="row jail" style="display: none">

                                        <div class="col-md-6">
                                            <span class="input input--isao">
                                                <input class="input__field input__field--isao" type="text"
                                                       name="paragraph_min_jail[]"
                                                       value="{{old('paragraph_min_jail.'.$para)}}" autocomplete="off"
                                                       placeholder="{{__('violation.punishment_min_jail_type')}} "/>
                                                <label class="input__label input__label--isao"
                                                       data-content="{{__('violation.punishment_min_jail')}}">
                                                <span class="input__label-content input__label-content--isao">
                                                    {{__('violation.punishment_min_jail')}}
                                                    @if($errors->has('paragraph_min_jail.'.$para))
                                                        <br>
                                                        <span class="text-danger">({{$errors->first('paragraph_min_jail.'.$para)}})</span>
                                                    @endif
                                                </span>
                                            </label>
                                          </span>
                                        </div>

                                        <div class="col-md-6 jail">
                                                <span class="input input--isao">
                                                    <input class="input__field input__field--isao" type="text"
                                                           name="paragraph_max_jail[]"
                                                           value="{{old('paragraph_max_jail.'.$para)}}"
                                                           autocomplete="off"
                                                           placeholder="{{__('violation.punishment_max_jail_type')}} "/>
                                                    <label class="input__label input__label--isao"
                                                           data-content="{{__('violation.punishment_max_jail')}}">
                                                    <span class="input__label-content input__label-content--isao">
                                                        {{__('violation.punishment_max_jail')}}
                                                        @if($errors->has('paragraph_max_jail.'.$para))
                                                            <br>
                                                            <span class="text-danger">({{$errors->first('paragraph_max_jail.'.$para)}})</span>
                                                        @endif
                                                    </span>
                                                </label>
                                              </span>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <span class="input input--isao">
                                        <textarea class="input__field input__field--isao" name="paragraph_details[]"
                                                  placeholder="{{__('violation.punishment_details_type')}}"
                                                  rows="3">{{old('paragraph_details.'.$para)}}</textarea>
                                        <label class="input__label input__label--isao"
                                               data-content="{{__('violation.punishment_details')}}">
                                        <span class="input__label-content input__label-content--isao">{{__('violation.punishment_details')}}</span>
                                    </label>
                                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-12" id="paragraph_section"></div>
            </fieldset>
        </div>
        <div class="col-md-12">
            <button type="button" class="btn btn-primary btn-sm float-left" id="add_paragraph" style="display:none;">
                <i class="la la-plus"></i>
            </button>
        </div>
        <div class="col-md-12 text-center mb-5">
            <button class="btn btn-primary">
                {{__('violation.save')}}
            </button>
        </div>

    </div>
    {{Form::close()}}
</div>