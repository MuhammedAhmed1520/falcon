<div class="container">
    {{Form::open([
        'route'=>'handleAttachSubjectPunishmentRules',
        'method'=>'post'
    ])}}
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <b>{{__('violation.subject_number')}}
                        <star>*</star>
                    </b>
                    <select class="form-control" name="subject_id">
                        @foreach($subjects as $subject)
                            <option value="{{$subject->id}}"
                                    data-paragraphs="{{$subject->paragraphs}}">{{$subject->title}}
                                | {{__('violation.subject_number')}} {{$subject->number}}</option>
                        @endforeach
                    </select>
                    <br>
                </div>
                <div class="col-md-6">
                    <b>{{__('violation.subject_p_title')}}
                        <star>*</star>
                    </b>
                    <select class="form-control" name="subject_paragraph_id">
                        @foreach($subjects->first()->paragraphs as $paragraph)
                            <option value="{{$paragraph->id}}">{{$paragraph->title}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('subject_paragraph_id'))
                        <span class="text-danger">{{$errors->first('subject_paragraph_id')}}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <b>{{__('violation.punishment_number')}}
                <star>*</star>
            </b>
            <select class="punishmet_paragraph form-control" name="punishment_paragraph_rule_ids[]" multiple>
                @foreach($punishments as $punishment)
                    <option value="{{$punishment->id}}">
                        {{$punishment->punishment_rule->title ?? '-'}}
                        -
                        {{$punishment->punishment_rule->number ?? '-'}}
                        |
                        {{$punishment->title}}
                    </option>
                @endforeach
            </select>
            @if($errors->has('punishment_paragraph_rule_ids'))
                <span class="text-danger">{{$errors->first('punishment_paragraph_rule_ids')}}</span>
            @endif
        </div>
        
        <div class="col-md-12 text-center mb-5 mt-5">
            <button type="submit" class="btn btn-primary">
                {{__('violation.save')}}
            </button>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered" id="data_table">
                <thead>
                    <tr>
                        <th>-</th>
                        <th>-</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subject_punishment as $su_pm_p)
                        <tr id="subject_{{$su_pm_p->id}}">
                            <td>{{__('violation.subject_number')}}
                                . {{$su_pm_p->subject_paragraph->subject_rule->number ?? '-'}} {{$su_pm_p->subject_paragraph->title ?? '-'}}
                                @if($su_pm_p->subject_paragraph->trashed())
                                  <span class="text-danger">(محذوف)</span>
                                @endif
                                | {{__('violation.punishment_number')}}
                                . {{$su_pm_p->punishment_paragraph->punishment_rule->number ?? '-'}} {{$su_pm_p->punishment_paragraph->title ?? '-'}}
                                @if($su_pm_p->punishment_paragraph->trashed()) 
                                  <span class="text-danger">(محذوف)</span> 
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-danger" type="button" onclick="removeRelation('{{$su_pm_p->id}}')">
                                   <i class="la la-close"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{Form::close()}}
</div>
