<div class="container-fluid">
    {{Form::open([
        'route'=>'handleAddViolation',
        'method'=>'post',
        'enctype'=>'multipart/form-data'
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">

                    <div class="col-md-4">
                        <b>{{__('violation.category')}}</b>
                        <select class="form-control" name="violation_category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        @if(old('violation_category_id') == $category->id) selected @endif>{{app()->getLocale() == 'ar' ? $category->title : $category->type}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('violation_category_id'))
                            <br>
                            <span class="text-danger">({{$errors->first('violation_category_id')}})</span>
                        @endif

                    </div>
                    <div class="col-md-2">
                        <b>{{__('violation.singed')}}</b>
                        <select class="form-control" name="violation_assign_approved">
                            <option value="1"  selected >{{__('violation.yes')}}</option>
                            <option value="0">{{__('violation.no')}}</option>
                        </select>
                        @if($errors->has('violation_assign_approved'))
                            <br>
                            <span class="text-danger">({{$errors->first('violation_assign_approved')}})</span>
                        @endif

                    </div>
                    <div class="col-md-3">
                        <b>{{__('violation.serial')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text" required=""
                                   name="violation_serial"
                                   autocomplete="off"
                                   value="{{old('violation_serial')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('violation_serial'))
                                    {{--<br>--}}
                                    <span class="text-danger">({{$errors->first('violation_serial')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-12" id="newViolationContainer">
                        <div class="row">
                            <div class="col-md-6">
                                <b>{{__('violation.subject_number')}}
                                    <star>*</star>
                                </b>
                                <button type="button" data-toggle="modal" data-target="#subject_modal_info"
                                        class="btn btn-sm btn-primary position-absolute right-15  tooltips"
                                        aria-label="{{app()->getLocale() == 'ar' ? 'عرض تفاصيل ' : 'Show  Details'}}"
                                        style="z-index: 99;top: 23px;{{app()->getLocale() == 'en' ? 'right: 18px;'  : 'left: 18px;'}}">
                                    <i class="la la-info"></i>
                                </button>
                                <select class="form-control subject_p_select"
                                        name="punishment_subject_paragraphs_id[]">
                                    <option selected disabled>{{__('violation.subject_number')}}</option>
                                    @foreach($subject_punishment as $su_pm_p)
                                        <option data-info="{{$su_pm_p}}"
                                                @if($su_pm_p->subject_paragraph->trashed()) disabled @endif
                                                @if($su_pm_p->punishment_paragraph->trashed()) disabled @endif

                                                {{--@if(old('punishment_subject_paragraphs_id') == $su_pm_p->id)  selected--}}
                                                {{--@endif--}}
                                                value="{{$su_pm_p->id}}">{{__('violation.subject_number')}}

                                            . {{$su_pm_p->subject_paragraph->subject_rule->number ?? '-'}} {{$su_pm_p->subject_paragraph->title ?? '-'}}
                                            @if($su_pm_p->subject_paragraph->trashed()) <span
                                                    class="text-danger">(محذوف)</span> @endif
                                            | {{__('violation.punishment_number')}}
                                            . {{$su_pm_p->punishment_paragraph->punishment_rule->number ?? '-'}} {{$su_pm_p->punishment_paragraph->title ?? '-'}}
                                            @if($su_pm_p->punishment_paragraph->trashed()) <span
                                                    class="text-danger">(محذوف)</span> @endif
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('punishment_subject_paragraphs_id'))
                                  <br>
                                  <span class="text-danger">({{$errors->first('punishment_subject_paragraphs_id')}})</span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <b>{{__('violation.amount')}}</b>
                                <select name="violation_fine_cost[]" class="form-control">

                                </select>
{{--                                @if($errors->has('violation_fine_cost'))--}}
{{--                                    <span class="text-danger">({{$errors->first('violation_fine_cost')}})</span>--}}
{{--                                @endif--}}
                            </div>

                            @can('admin-violation-cost')
                                <div class="col-md-2">
                                    <b>{{__('violation.amount')}} (admin)</b>
                                    <span class="input input--isao">
                                            <input class="input__field input__field--isao arabicnumber" type="text"
                                                   name="amount_admin[]"
                                                   autocomplete="off"
                                                   />
                                            <label class="input__label input__label--isao">
                                            <span class="input__label-content input__label-content--isao">
{{--                                                @if($errors->has('amount_admin'))--}}
{{--                                                    <br>--}}
{{--                                                    <span class="text-danger">({{$errors->first('amount_admin')}})</span>--}}
{{--                                                @endif--}}
                                            </span>
                                        </label>
                                      </span>
                                </div>
                            @endcan
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button class="btn btn-primary btn-sm mb-3" type="button" onclick="addViolationRow()">
                            <i class="la la-plus"></i>
                        </button>
                    </div>

                    <div class="col-md-7">
                        <b>{{__('violation.notes')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text" name="violation_notes"
                                   autocomplete="off"
                                   value="{{old('violation_notes')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('violation_notes'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('violation_notes')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-12">
                        <b>{{__('violation.location_name')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text" name="violation_location_name"
                                   autocomplete="off"
                                   value="{{old('violation_location_name')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('violation_location_name'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('violation_location_name')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-12">
                        <b>{{__('violation.comments_admin')}}</b>
                        <span class="input input--isao">
                                <textarea class="input__field input__field--isao"
                                          name="violation_comments"
                                          aria-multiline="true"
                                          placeholder="{{__('violation.comments_admin_type')}}"
                                          rows="5">{{old('violation_comments')}}</textarea>
                                <label class="input__label input__label--isao">
                                <span class="input__label-content input__label-content--isao">
                                    @if($errors->has('violation_comments'))
                                        <br>
                                        <span class="text-danger">({{$errors->first('violation_comments')}})</span>
                                    @endif
                            </span>
                            </label>
                          </span>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col-md-12">
            <fieldset class="pb-3">
                <legend>{{__('violation.secondary_info')}}</legend>
                <div class="row">

                    <div class="col-md-7">
                        <b>{{__('violation.violation_details')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text" name="violation_details"
                                   autocomplete="off"
                                   value="{{old('violation_details')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('violation_details'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('violation_details')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-4">
                        <b>{{__('violation.date_time_violation')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao date_time" type="text" name="violation_date"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('violation_date'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('violation_date')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-4">
                        <b>{{__('violation.violation_action')}}</b>
                        <select class="form-control" name="violation_action_id" id="select_action">
                            @foreach($actions as $action)
                                <option value="{{$action->id}}"
                                        @if(old('violation_action_id') == $action->id) selected @endif>{{$action->title}}</option>
                            @endforeach

                        </select>
                        @if($errors->has('violation_action_id'))
                            <br>
                            <span class="text-danger">({{$errors->first('violation_action_id')}})</span>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <b>{{__('violation.violation_block')}}</b>
                        <select class="form-control" name="violation_block">
                            <option value="1"
                                    @if(old('violation_block') === "1" || is_null(old('violation_block'))) selected @endif>{{__('violation.yes')}}</option>
                            <option value="0"
                                    @if(old('violation_block') === "0") selected @endif>{{__('violation.no')}}</option>
                        </select>
                        @if($errors->has('violation_block'))
                            <br>
                            <span class="text-danger">({{$errors->first('violation_block')}})</span>
                        @endif
                    </div>
                    <div class="col-md-3 status">
                        <b>{{__('violation.status')}}</b>
                        <select class="form-control" name="violation_status_id" id="status_select">
                            @foreach($status->reverse() as $sts)
                                <option value="{{$sts->id}}"
                                        @if(old('violation_status_id') == $sts->id) selected @endif> {{__('violation.'.$sts->title)}} </option>
                                        
                            @endforeach
                        </select>
                        @if($errors->has('violation_status_id'))
                            <br>
                            <span class="text-danger">({{$errors->first('violation_status_id')}})</span>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <b>{{__('violation.area')}}
                            <star>*</star>
                        </b>
                        <input class="form-control" type="text" name="violation_area" value="{{old('violation_area')}}"
                               required=""/>
                        @if($errors->has('violation_area'))
                            <br>
                            <span class="text-danger">({{$errors->first('violation_area')}})</span>
                        @endif
                        {{--<select class="form-control" name="violation_area_id">--}}
                        {{--@foreach($areas as $area)--}}
                        {{--<option value="{{$area->id}}"--}}
                        {{--@if(old('violation_area_id') == $area->id) selected @endif>{{$area->name}}</option>--}}
                        {{--@endforeach--}}
                        {{--</select>--}}
                        {{--@if($errors->has('violation_area'))--}}
                        {{--<br>--}}
                        {{--<span class="text-danger">({{$errors->first('violation_area')}})</span>--}}
                        {{--@endif--}}
                    </div>

                    <div class="col-md-12"></div>

                    <div class="col-md-2 committee" style="display:none;">
                        <br><b>{{__('violation.committee_no')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text" name="committee_no"/>
                            <label class="input__label input__label--isao">
                                <span class="input__label-content input__label-content--isao">
                                    @if($errors->has('committee_no'))
                                        <br>
                                        <span class="text-danger">({{$errors->first('committee_no')}})</span>
                                    @endif
                                </span>
                            </label>
                          </span>
                    </div>
                    <div class="col-md-3 committee" style="display:none;">
                        <br><b>{{__('violation.committee_date')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao date_time" type="text" name="committee_date"/>
                            <label class="input__label input__label--isao">
                                <span class="input__label-content input__label-content--isao">
                                    @if($errors->has('committee_date'))
                                        <br>
                                        <span class="text-danger">({{$errors->first('committee_date')}})</span>
                                    @endif
                                </span>
                            </label>
                          </span>
                    </div>
                    <div class="col-md-6 attachment">
                        <br><b>{{__('violation.attachment')}}</b>
                        <input type="file" name="attachment[]" multiple>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-12" id="not_personal">

            <fieldset>
                <legend>{{__('violation.location_details')}}</legend>
                <div class="row">
                    <div class="col-md-3">
                        <b>{{__('violation.company_name')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <button type="button" data-toggle="modal" data-target="#violations_modals"
                                    data-type="company"
                                    class="btn btn-sm btn-primary position-absolute right-15 tooltips"
                                    aria-label="{{app()->getLocale() == 'ar' ? 'عرض تفاصيل سابقة' : 'Show Old Details'}}"
                                    style="z-index: 99;top: -10px;">
                                <i class="la la-info"></i>
                            </button>
                            <input class="input__field input__field--isao" type="text" name="company_name"
                                   autocomplete="off"
                                   value="{{old('company_name')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('company_name'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('company_name')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3">
                        <b>{{__('violation.location_address')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text" name="company_location_address"
                                   autocomplete="off"
                                   value="{{old('company_location_address')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('company_location_address'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('company_location_address')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3">
                        <b>{{__('violation.location_type')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text" name="company_location_activity"
                                   autocomplete="off"
                                   value="{{old('company_location_activity')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('company_location_activity'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('company_location_activity')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3">
                        <b>{{__('violation.location_register_no')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="company_location_licence"
                                   autocomplete="off"
                                   value="{{old('company_location_licence')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('company_location_licence'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('company_location_licence')}})</span>
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
                <legend>{{__('violation.location_owner_details')}}</legend>
                <div class="row">

                    <div class="col-md-3">
                        <b>{{__('violation.civil_name')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text" name="civilian_name"
                                   autocomplete="off"
                                   value="{{old('civilian_name')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('civilian_name'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('civilian_name')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3">
                        <b>{{__('violation.civil_ssn')}}
{{--                            <star class="ssn_star">*</star>--}}
                        </b>
                        <span class="input input--isao">
                            <button type="button" data-toggle="modal" data-target="#violations_modals" data-type="ssn"
                                    class="btn btn-sm btn-primary position-absolute right-15 tooltips"
                                    aria-label="{{app()->getLocale() == 'ar' ? 'عرض تفاصيل سابقة' : 'Show Old Details'}}"
                                    style="z-index: 99;top: 26px;">
                                <i class="la la-info"></i>
                            </button>
                            <input class="input__field input__field--isao arabicnumber" type="text" name="civilian_ssn"
                                   autocomplete="off"
                                   value="{{old('civilian_ssn')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('civilian_ssn'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('civilian_ssn')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-3">
                        <b>{{__('violation.civil_phone')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao arabicnumber" type="text"
                                   name="civilian_mobile"
                                   autocomplete="off"
                                   value="{{old('civilian_mobile')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('civilian_mobile'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('civilian_mobile')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3">
                        <b>{{__('violation.civil_national')}}</b>
                        <select name="civilian_nationality_id" class="form-control">
                            @foreach($nationality as $nation)
                                <option value="{{$nation->id}}">{{$nation->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('civilian_nationality_id'))
                            <br>
                            <span class="text-danger">({{$errors->first('civilian_nationality_id')}})</span>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <b>{{__('violation.number_type')}}</b>
                        <select name="number_type" class="form-control">
                            @foreach($types as $type)
                                <option value="{{$type}}">{{$type}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('number_type'))
                            <br>
                            <span class="text-danger">({{$errors->first('number_type')}})</span>
                        @endif
                    </div>
                    <div class="col-md-5">
                        <b>{{__('violation.other_number')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="other_number"
                                   autocomplete="off"
                                   value="{{old('other_number')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('other_number'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('other_number')}})</span>
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
                <legend>{{__('violation.officer')}}</legend>
                <div class="row">
                    <div class="col-md-3">
                        <b>{{__('violation.main_officer')}}</b>
                        <select class="form-control" name="main_officer_id">
                            @foreach($officers as $officer)
                                <option value="{{$officer->id}}"
                                        @if(old('main_officer_id') == $officer->id) selected @endif>{{$officer->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('main_officer_id'))
                            <br>
                            <span class="text-danger">({{$errors->first('main_officer_id')}})</span>
                        @endif
                    </div>
                    <div class="col-md-9">
                        <b>{{__('violation.other_officers')}}</b>
                        <select class="form-control other_officers" name="officers[]" multiple>
                            @foreach($officers as $officer)
                                <option value="{{$officer->id}}">{{$officer->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('officers'))
                            <br>
                            <span class="text-danger">({{$errors->first('officers')}})</span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <br>
                        <b>{{__('violation.locked_items')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" id="tags" type="text" name="lockItem"/>
                            <label class="input__label input__label--isao"
                                   data-content="{{__('violation.locked_items')}}">
                            <span class="input__label-content input__label-content--isao">

                                @if($errors->has('lockItem'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('lockItem')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                </div>
            </fieldset>
        </div>


        <div class="col-md-12 text-center mt-5 mb-5">
            <button class="btn btn-primary">
                {{__('violation.save')}}
            </button>
        </div>
    </div>

    {{Form::close()}}
</div>
