<div class="container-fluid">
    {{Form::open([
        'route'=>['handleEditViolation',$violation->id],
        'method'=>'put',
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
                                        @if($violation->category_id == $category->id) selected @endif>{{app()->getLocale() == 'ar' ? $category->title : $category->type}}</option>
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
                            <option value="1"
                                    @if($violation->assign_approved == 1) selected @endif>{{__('violation.yes')}}</option>
                            <option value="0"
                                    @if($violation->assign_approved == 0) selected @endif>{{__('violation.no')}}</option>
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
                                   value="{{$violation->serial}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('violation_serial'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('violation_serial')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-12"></div>


                    <div class="col-md-12" id="newViolationContainer">
                        @foreach($violation->subjects as $violation_subject)
                            <div class="row">
                                <div class="col-md-6">
                                    <b>{{__('violation.subject_number')}}
                                        <star>*</star>
                                    </b>
                                    <select class="form-control subject_p_select"
                                            name="punishment_subject_paragraphs_id[]">
                                        <option selected disabled>{{__('violation.subject_number')}}</option>
                                        @foreach($subject_punishment as $su_pm_p)
                                            <option data-info="{{$su_pm_p}}"
                                                    @if($su_pm_p->subject_paragraph->trashed()) disabled @endif
                                                    @if($su_pm_p->punishment_paragraph->trashed()) disabled @endif
                                                    @if(($violation_subject->pivot->punishment_subject_paragraphs_id ?? null) == $su_pm_p->id)  selected
                                                    @endif
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

                                </div>
                                <div class="col-md-2">
                                    <b>{{__('violation.amount')}}</b>
                                    <select name="violation_fine_cost[]" class="form-control">
                                        @if($violation->category_id == 1)
                                            <option value="{{$violation_subject->punishment_paragraph->fine['person_fine'] ?? 0}}">{{$violation_subject->punishment_paragraph->fine['person_fine'] ?? 0}}</option>
                                        @else
                                            <option value="{{$violation_subject->punishment_paragraph->fine['min_fine'] ?? 0}}">{{$violation_subject->punishment_paragraph->fine['min_fine'] ?? 0}}</option>
                                            <option value="{{$violation_subject->punishment_paragraph->fine['max_fine'] ?? 0}}">{{$violation_subject->punishment_paragraph->fine['max_fine'] ?? 0}}</option>
                                        @endif
                                    </select>

                                </div>

                                @can('admin-violation-cost')
                                    <div class="col-md-2">
                                        <b>{{__('violation.amount')}} (admin)</b>
                                        <span class="input input--isao">
                                            <input class="input__field input__field--isao arabicnumber" type="text"
                                                   name="amount_admin[]"
                                                   autocomplete="off"
                                                   value="{{$violation_subject->pivot->fine_cost ?? null}}"/>
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
                                @if(!$loop->first)
                                    <div class="col-md-2">
                                        <button class="btn btn-danger btn-sm deleteRowViolation" type="button">
                                            <i class="la la-close"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        @endforeach
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
                                   value="{{$violation->notes}}"/>
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
                                   required=""
                                   autocomplete="off"
                                   value="{{$violation->location_name}}"/>
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
                                          placeholder="{{__('violation.comments_admin_type')}}"
                                          rows="5">{{$violation->comments}}</textarea>
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
            <fieldset>
                <legend>{{__('violation.secondary_info')}}</legend>
                <div class="row">

                    <div class="col-md-7">
                        <b>{{__('violation.violation_details')}}</b>
                        <span class="input input--isao">
                <input class="input__field input__field--isao" type="text" name="violation_details" autocomplete="off"
                       value="{{$violation->details}}"/>
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
                <input class="input__field input__field--isao date_time" type="text" name="violation_date"
                       value="{{$violation->date}}"/>
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
                    @can('violation-action')
                        <div class="col-md-4">
                            <b>{{__('violation.violation_action')}}</b>
                            <select class="form-control" name="violation_action_id" id="select_action">
                                @foreach($actions as $action)
                                    <option value="{{$action->id}}"
                                            @if($violation->action_id == $action->id) selected @endif>{{$action->title}}</option>
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
                                        @if($violation->block == 1) selected @endif>{{__('violation.yes')}}</option>
                                <option value="0"
                                        @if($violation->block == 0) selected @endif>{{__('violation.no')}}</option>
                            </select>
                            @if($errors->has('violation_block'))
                                <br>
                                <span class="text-danger">({{$errors->first('violation_block')}})</span>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <b>{{__('violation.status')}}</b>
                            <select class="form-control" name="violation_status_id" id="status_select">
                                @foreach($status->reverse() as $sts)
                                    <option value="{{$sts->id}}"
                                            @if($violation->status_id == $sts->id) selected @endif>{{__('violation.'.$sts->title)}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('violation_status_id'))
                                <br>
                                <span class="text-danger">({{$errors->first('violation_status_id')}})</span>
                            @endif
                        </div>
                    @endcan
                    <div class="col-md-3">
                        <b>{{__('violation.area')}}
                            <star>*</star>
                        </b>
                        <input class="form-control" name="violation_area" value="{{$violation->area->name ?? ''}}"
                               required="">
                        @if($errors->has('violation_area'))
                            <br>
                            <span class="text-danger">({{$errors->first('violation_area')}})</span>
                        @endif
                    </div>
                    <div class="col-md-12"></div>

                    <div class="col-md-2 committee"
                         style="display:{{in_array($violation->action_id,[6,7])?'block':'none'}};">
                        <br><b>{{__('violation.committee_no')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text" name="committee_no"
                                   value="{{$violation->committee_no}}"/>
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
                    <div class="col-md-3 committee"
                         style="display:{{in_array($violation->action_id,[6,7])?'block':'none'}};">
                        <br><b>{{__('violation.committee_date')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao date_time" type="text" name="committee_date"
                                   value="{{$violation->committee_date}}"/>
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
                    <div class="col-md-6 attachment"
                         style="display:{{(in_array($violation->action_id,[1]) && in_array($violation->status_id,[1]))?'block':'none'}};">
                        <br><b>{{__('violation.attachment')}}</b>
                        <input type="file" name="attachment[]" multiple>
                        <ul class="list-unstyled">
                            @foreach($violation->files as $file)
                                <li class="list-inline-item">
                                    @if(isImage($file->extension))
                                        <div class="shadow-sm">
                                            <img src="{{$file->name}}" style="width: 120px;height: 120px;" alt="">
                                        </div>
                                    @else
                                        <div>
                                            <a href="{{$file->name}}" class="text-info text-center">

                                                <h4 class="text-primary">
                                                    <i class="la la-file-pdf-o text-danger fa-2x"></i>
                                                    {{app()->getLocale() == 'ar' ? 'تحميل الملف اضغط هنا' : 'Dowload Attachment'}}
                                                </h4>
                                            </a>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-12" id="not_personal" @if($violation->category_id == 1) style="display: none" @endif>

            <fieldset>
                <legend>{{__('violation.location_details')}}</legend>
                <div class="row">
                    <div class="col-md-3">
                        <b>{{__('violation.location_name')}}
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
                                   value="{{$violation->company->name ?? ''}}"/>
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
                            <input class="input__field input__field--isao" type="text"
                                   name="company_location_address"
                                   autocomplete="off"
                                   value="{{$violation->company->violation_company->location_address ?? ''}}"/>
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
                            <input class="input__field input__field--isao" type="text"
                                   name="company_location_activity"
                                   autocomplete="off"
                                   value="{{$violation->company->violation_company->location_activity ?? ''}}"/>
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
                                   value="{{$violation->company->violation_company->location_licence ?? ''}}"/>
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
                                   @if($violation->category_id == 1)
                                   value="{{$violation->civilian->name ?? ''}}"
                                   @else
                                   value="{{$violation->company->civilian->name ?? ''}}"
                                    @endif
                            />
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
                        </b>
                        <span class="input input--isao">
                            <button type="button" data-toggle="modal" data-target="#violations_modals"
                                    class="btn btn-sm btn-primary position-absolute right-15"
                                    style="z-index: 99;top: 26px;">
                                <i class="la la-info"></i>
                            </button>
                            <input class="input__field input__field--isao  arabicnumber" type="text" name="civilian_ssn"
                                   autocomplete="off"
                                   @if($violation->category_id == 1)
                                   value="{{$violation->civilian->ssn ?? ''}}"
                                   @else
                                   value="{{$violation->company->civilian->ssn ?? ''}}"
                                    @endif/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('civilian_ssn'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('civilian_ssn')}})</span>
                                @endif
                                @if($errors->has('ssn'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('ssn')}})</span>
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
                                   @if($violation->category_id == 1)
                                   value="{{$violation->civilian->mobile ?? ''}}"
                                   @else
                                   value="{{$violation->company->civilian->mobile ?? ''}}"
                                    @endif/>
                            <label class="input__label input__label--isao"
                                   data-content="{{__('violation.civil_phone')}}">
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
                        <input type="hidden" name="civilian_id" value="{{$violation->civilian->id ?? $violation->company->civilian->id ?? ''}}">
                        <b>{{__('violation.civil_national')}}</b>
                        <select name="civilian_nationality_id" class="form-control">
                            @foreach($nationality as $nation)
                                <option value="{{$nation->id}}"
                                        @if(($violation->civilian->nationality_id ?? '') == $nation->id) selected @endif>{{$nation->name}}</option>
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
                                <option value="{{$type}}"
                                        @if($type == ($violation->civilian->number_type->name ?? null)) selected @endif>{{$type}}</option>
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
                                   value="{{$violation->civilian->other_number ?? ''}}"/>
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
                                        @if($violation->main_officer_id == $officer->id) selected @endif
                                >{{$officer->name}}</option>
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
                            @php
                                $officers_ids = $violation->officers->pluck('id')->toArray() ?? [];
                            @endphp
                            @foreach($officers as $officer)
                                <option value="{{$officer->id}}"
                                        @if(in_array($officer->id,$officers_ids)) selected @endif>{{$officer->name}}</option>
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
                            <input class="input__field input__field--isao" id="tags" type="text" name="lockItem"
                                   value="{{$violation->locked_items->pluck('item') ?? null}}"/>
                            <label class="input__label input__label--isao">
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
            @if(!$violation->payed_at)
                <button class="btn btn-primary">
                    {{__('violation.update')}}
                </button>
            @else
                {{app()->getLocale() == 'ar' ? 'لا يمكن التعديل فى حالة انه تم دفع المخالفة' : 'Can\'t Update In case of Violation Paid'  }}
            @endif
        </div>
    </div>

    {{Form::close()}}
</div>
