<div class="container-fluid">
    {{Form::open([
        'method'=>'put',
        'route'=>['handleEditPunishmentRules',$punishment->id]
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">
                    <div class="col-md-3">
                        <span class="input input--isao">
                            <input class="input__field input__field--isao arabicnumber" name="punishment_number"
                                   value="{{$punishment->number}}" type="text" autocomplete="off"
                                   placeholder="{{__('violation.punishment_number_type')}}"/>
                            <label class="input__label input__label--isao"
                                   data-content="{{__('violation.punishment_number')}}">
                            <span class="input__label-content input__label-content--isao">
                                <star>*</star>
                                {{__('violation.punishment_number')}}

                                @if($errors->has('punishment_number'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('punishment_number')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-4">
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" name="punishment_title"
                                   value="{{$punishment->title}}" type="text" autocomplete="off"
                                   placeholder="{{__('violation.punishment_title_type')}}"/>
                            <label class="input__label input__label--isao"
                                   data-content="{{__('violation.punishment_title')}}">
                            <span class="input__label-content input__label-content--isao">
                                <star>*</star>
                                {{__('violation.punishment_title')}}

                                @if($errors->has('subject_title'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('subject_title')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col-md-12">

            <fieldset>
                <legend>{{__('violation.secondary_info')}}</legend>

                @foreach($punishment->paragraphs as $k => $paragraph)
                    <div class="row p-2">

                        <div class="col-md-12" id="paragraph_row">
                            <input type="hidden" name="paragraph_id[]" value="{{$paragraph->id}}">
                            <div class="row  bg-gray mb-4">
                                <div class="col-md-12 float-left text-right">
                                    @can('delete-punishment-paragraph',auth()->user())
                                    <button type="button" class="btn btn-danger mt-2" onclick="remove('{{$paragraph->id}}')">
                                        <i class="la la-close"></i>
                                    </button>
                                    @endcan

                                </div>
                                <div class="col-md-4">
                                <span class="input input--isao">
                                    <input class="input__field input__field--isao" type="text" name="paragraph_title[]"
                                           value="{{$paragraph->title}}" autocomplete="off"
                                           placeholder="{{__('violation.punishment_p_title_type')}}"/>
                                    <label class="input__label input__label--isao"
                                           data-content="{{__('violation.punishment_p_title')}}">
                                    <span class="input__label-content input__label-content--isao">
                                        <star>*</star>
                                        {{__('violation.punishment_p_title')}}
                                        @if($errors->has('paragraph_title.'.$k))
                                            <br>
                                            <span class="text-danger">({{$errors->first('paragraph_title.'.$k)}})</span>
                                        @endif
                                    </span>
                                </label>
                              </span>
                                </div>
                                <div class="col-12"></div>
                                <div class="col-md-2">
                                <span class="input input--isao">
                                    <input class="input__field input__field--isao" type="text"
                                           name="paragraph_min_fine[]" autocomplete="off"
                                           value="{{$paragraph->min_fine}}"
                                           placeholder="{{__('violation.punishment_min_fine_type')}} "/>
                                    <label class="input__label input__label--isao"
                                           data-content="{{__('violation.punishment_min_fine')}}">
                                    <span class="input__label-content input__label-content--isao">
                                        {{__('violation.punishment_min_fine')}}
                                        @if($errors->has('paragraph_min_fine.'.$k))
                                            <br>
                                            <span class="text-danger">({{$errors->first('paragraph_min_fine.'.$k)}})</span>
                                        @endif
                                    </span>
                                </label>
                              </span>
                                </div>
                                <div class="col-md-2">
                                    <span class="input input--isao">
                                        <input class="input__field input__field--isao" type="text"
                                               name="paragraph_max_fine[]" autocomplete="off"
                                               value="{{$paragraph->max_fine}}"
                                               placeholder="{{__('violation.punishment_max_fine_type')}} "/>
                                        <label class="input__label input__label--isao"
                                               data-content="{{__('violation.punishment_max_fine')}}">
                                        <span class="input__label-content input__label-content--isao">
                                            {{__('violation.punishment_max_fine')}}

                                            @if($errors->has('paragraph_max_fine.'.$k))
                                                <br>
                                                <span class="text-danger">({{$errors->first('paragraph_max_fine.'.$k)}})</span>
                                            @endif
                                        </span>
                                    </label>
                                  </span>
                                </div>
                                <div class="col-md-3">
                    <span class="input input--isao">
                        <input class="input__field input__field--isao" type="text" name="paragraph_min_jail[]"
                               autocomplete="off"
                               value="{{$paragraph->min_jail}}"
                               placeholder="{{__('violation.punishment_min_jail_type')}} "/>
                        <label class="input__label input__label--isao"
                               data-content="{{__('violation.punishment_min_jail')}}">
                        <span class="input__label-content input__label-content--isao">
                            {{__('violation.punishment_min_jail')}}
                            @if($errors->has('paragraph_min_jail.'.$k))
                                <br>
                                <span class="text-danger">({{$errors->first('paragraph_min_jail.'.$k)}})</span>
                            @endif
                        </span>
                    </label>
                  </span>
                                </div>
                                <div class="col-md-3">
                    <span class="input input--isao">
                        <input class="input__field input__field--isao" type="text" name="paragraph_max_jail[]"
                               value="{{$paragraph->max_jail}}" autocomplete="off"
                               placeholder="{{__('violation.punishment_max_jail_type')}} "/>
                        <label class="input__label input__label--isao"
                               data-content="{{__('violation.punishment_max_jail')}}">
                        <span class="input__label-content input__label-content--isao">
                            {{__('violation.punishment_max_jail')}}
                            @if($errors->has('paragraph_max_jail.'.$k))
                                <br>
                                <span class="text-danger">({{$errors->first('paragraph_max_jail.'.$k)}})</span>
                            @endif
                        </span>
                    </label>
                  </span>
                                </div>

                                <div class="col-md-12">
                                    <span class="input input--isao">
                                        <textarea class="input__field input__field--isao" name="paragraph_details[]"
                                                  placeholder="{{__('violation.punishment_details_type')}}"
                                                  rows="3">{{$paragraph->details}}</textarea>
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

                @php
                    $range = [];
                    if ($errors->has('paragraph_count')){

                        $count = $errors->first('paragraph_count');
                        $p_count = count($punishment->paragraphs ?? []);
                        if ($count > $p_count){
                            $range = range(0,($count - $p_count)-1);
                        }
                    }
                @endphp
                @foreach($range as $para)
                    <div class="row p-2">

                        <div class="col-md-12" id="paragraph_row">
                            <div class="row  bg-gray mb-4">
                                <div class="col-md-4">
                <span class="input input--isao">
                <input class="input__field input__field--isao" type="text" name="paragraph_title[]"
                       value="{{old('paragraph_title.'.(intval($para)+intval($p_count)))}}"
                       placeholder="{{__('violation.punishment_p_title_type')}}"/>
                <label class="input__label input__label--isao"
                       data-content="{{__('violation.punishment_p_title')}}">
                <span class="input__label-content input__label-content--isao">
                <star>*</star>
                    {{(intval($para)+intval($p_count))}}
                    {{__('violation.punishment_p_title')}}
                    @if($errors->has('paragraph_title.'.(intval($para)+intval($p_count))))
                        <br>
                        <span class="text-danger">({{$errors->first('paragraph_title.'.(intval($para)+intval($p_count)))}})</span>
                    @endif
                </span>
                </label>
                </span>
                                </div>
                                <div class="col-12"></div>
                                <div class="col-md-2">
                <span class="input input--isao">
                <input class="input__field input__field--isao" type="text"
                       name="paragraph_min_fine[]"
                       value="{{old('paragraph_min_fine.'.(intval($para)+intval($p_count)))}}"
                       placeholder="{{__('violation.punishment_min_fine_type')}} "/>
                <label class="input__label input__label--isao"
                       data-content="{{__('violation.punishment_min_fine')}}">
                <span class="input__label-content input__label-content--isao">
                {{__('violation.punishment_min_fine')}}
                    @if($errors->has('paragraph_min_fine.'.(intval($para)+intval($p_count))))
                        <br>
                        <span class="text-danger">({{$errors->first('paragraph_min_fine.'.(intval($para)+intval($p_count)))}})</span>
                    @endif
                </span>
                </label>
                </span>
                                </div>
                                <div class="col-md-2">
                <span class="input input--isao">
                <input class="input__field input__field--isao" type="text"
                       name="paragraph_max_fine[]"
                       value="{{old('paragraph_max_fine.'.(intval($para)+intval($p_count)))}}"
                       placeholder="{{__('violation.punishment_max_fine_type')}} "/>
                <label class="input__label input__label--isao"
                       data-content="{{__('violation.punishment_max_fine')}}">
                <span class="input__label-content input__label-content--isao">
                {{__('violation.punishment_max_fine')}}

                    @if($errors->has('paragraph_max_fine.'.(intval($para)+intval($p_count))))
                        <br>
                        <span class="text-danger">({{$errors->first('paragraph_max_fine.'.(intval($para)+intval($p_count)))}})</span>
                    @endif
                </span>
                </label>
                </span>
                                </div>
                                <div class="col-md-3">
                <span class="input input--isao">
                <input class="input__field input__field--isao" type="text" name="paragraph_min_jail[]"
                       value="{{old('paragraph_min_jail.'.(intval($para)+intval($p_count)))}}"
                       placeholder="{{__('violation.punishment_min_jail_type')}} "/>
                <label class="input__label input__label--isao"
                       data-content="{{__('violation.punishment_min_jail')}}">
                <span class="input__label-content input__label-content--isao">
                {{__('violation.punishment_min_jail')}}
                    @if($errors->has('paragraph_min_jail.'.(intval($para)+intval($p_count))))
                        <br>
                        <span class="text-danger">({{$errors->first('paragraph_min_jail.'.(intval($para)+intval($p_count)))}})</span>
                    @endif
                </span>
                </label>
                </span>
                                </div>
                                <div class="col-md-3">
                <span class="input input--isao">
                <input class="input__field input__field--isao" type="text" name="paragraph_max_jail[]"
                       value="{{old('paragraph_max_jail.'.(intval($para)+intval($p_count)))}}"
                       placeholder="{{__('violation.punishment_max_jail_type')}} "/>
                <label class="input__label input__label--isao"
                       data-content="{{__('violation.punishment_max_jail')}}">
                <span class="input__label-content input__label-content--isao">
                {{__('violation.punishment_max_jail')}}
                    @if($errors->has('paragraph_max_jail.'.(intval($para)+intval($p_count))))
                        <br>
                        <span class="text-danger">({{$errors->first('paragraph_max_jail.'.(intval($para)+intval($p_count)))}})</span>
                    @endif
                </span>
                </label>
                </span>
                                </div>

                                <div class="col-md-12">
                <span class="input input--isao">
                <textarea class="input__field input__field--isao" name="paragraph_details[]"
                          placeholder="{{__('violation.punishment_details_type')}}"
                          rows="3">{{old('paragraph_details.'.(intval($para)+intval($p_count)))}}</textarea>
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
            <button type="button" class="btn btn-primary btn-sm float-left" id="add_paragraph">
                <i class="la la-plus"></i>
            </button>
        </div>
        <div class="col-md-12 text-center mb-5">
            <button class="btn btn-primary">
                {{__('violation.update')}}
            </button>
        </div>

    </div>
    {{Form::close()}}
</div>
