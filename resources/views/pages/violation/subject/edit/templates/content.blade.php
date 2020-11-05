<div class="container-fluid">
    {{Form::open([
        'route'=>['handleEditSubjectRules',$subject->id],
        'method'=>'put'
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">
                    <div class="col-md-3">
                        <span class="input input--isao">
                            <input type="hidden" name="subject_number" value="{{$subject->number}}">
                            <input class="input__field input__field--isao arabicnumber" type="text" autocomplete="off"
                                   name="subject_number"
                                   disabled
                                   value="{{$subject->number}}"
                                   placeholder="{{__('violation.subject_number_type')}}"/>
                            <label class="input__label input__label--isao"
                                   data-content="{{__('violation.subject_number')}}">
                            <span class="input__label-content input__label-content--isao">
                                <star>*</star>
                                {{__('violation.subject_number')}}

                                @if($errors->has('subject_number'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('subject_number')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-4">
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text" autocomplete="off"
                                   name="subject_title"
                                   value="{{$subject->title}}"
                                   placeholder="{{__('violation.subject_title_type')}}"/>
                            <label class="input__label input__label--isao"
                                   data-content="{{__('violation.subject_title')}}">
                            <span class="input__label-content input__label-content--isao">
                                {{__('violation.subject_title')}}

                                @if($errors->has('subject_title'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('subject_title')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-2">
                        <span class="input input--isao">
                            <input class="input__field input__field--isao arabicnumber" type="text" autocomplete="off"
                                   name="subject_order"
                                   value="{{$subject->order}}"
                                   placeholder="{{__('violation.subject_order_type')}} "/>
                            <label class="input__label input__label--isao"
                                   data-content="{{__('violation.subject_order')}}">
                            <span class="input__label-content input__label-content--isao">{{__('violation.subject_order')}}

                                @if($errors->has('subject_order'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('subject_order')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-12" id="main_p" style="display: {{$subject->type == 0 ? 'block':'none'}}">
                        <span class="input input--isao">
                            <input type="hidden" name="paragraph_id" value="{{$subject->paragraphs->first()->id ?? 0}}">
                            <textarea class="input__field input__field--isao" name="main_paragraph"
                                      placeholder="{{__('violation.subject_details_type')}}"
                                      rows="3">{{$subject->type == 1 ? '' :$subject->paragraphs->first()->details ?? ''}}</textarea>
                            <label class="input__label input__label--isao"
                                   data-content="{{__('violation.subject_details')}}">
                            <span class="input__label-content input__label-content--isao">{{__('violation.subject_details')}}</span>
                        </label>
                      </span>
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="col-md-12">
            {{--<fieldset>--}}
                {{--<legend>{{__('violation.secondary_info')}}</legend>--}}

                {{--<div class="row">--}}
                    {{--<div class="col-md-12">--}}
                        {{--<input type="checkbox" value="1" name="multi_paragraph"--}}
                               {{--id="multi_paragraph" @if($subject->type == 1) checked="checked" @endif>--}}
                        {{--<label for="multi_paragraph">{{app()->getLocale() == 'ar' ? 'اكثر من فقرة' : 'Multi Paragraph'}}</label>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--@foreach($subject->paragraphs as $k => $paragraph)--}}

                    {{--<div class="row p-2">--}}
                        {{--<div class="col-md-12" id="paragraph_row">--}}
{{--                            <input type="hidden" name="paragraph_id[]" value="{{$paragraph->id}}">--}}
                            {{--<div class="row  bg-gray mb-4 para_row"--}}
                                 {{--@if($subject->type == 0) style="display: none" @endif>--}}
                                {{--<div class="col-md-12 float-left text-right">--}}
                                    {{--@can('delete-subject-paragraph',auth()->user())--}}
                                        {{--<button type="button" class="btn btn-danger mt-2"--}}
                                                {{--onclick="remove('{{$paragraph->id}}')">--}}
                                            {{--<i class="la la-close"></i>--}}
                                        {{--</button>--}}
                                    {{--@endcan--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4">--}}
                                    {{--<span class="input input--isao">--}}
                                        {{--<input class="input__field input__field--isao" type="text" autocomplete="off"--}}
                                               {{--name="paragraph_title[]"--}}
                                               {{--value="{{$paragraph->title}}"--}}
                                               {{--placeholder="{{__('violation.subject_p_title_type')}}"/>--}}
                                        {{--<label class="input__label input__label--isao"--}}
                                               {{--data-content="{{__('violation.subject_p_title')}}">--}}
                                        {{--<span class="input__label-content input__label-content--isao">--}}
                                            {{--<star>*</star>--}}
                                            {{--{{__('violation.subject_p_title')}}--}}
                                            {{--@if($errors->has('paragraph_title.'.$k))--}}
                                                {{--<br>--}}
                                                {{--<span class="text-danger">({{$errors->first('paragraph_title.'.$k)}})</span>--}}
                                            {{--@endif--}}
                                        {{--</span>--}}
                                    {{--</label>--}}
                                  {{--</span>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-12">--}}
                                    {{--<span class="input input--isao">--}}
                                        {{--<textarea class="input__field input__field--isao" name="paragraph_details[]"--}}
                                                  {{--placeholder="{{__('violation.subject_details_type')}}"--}}
                                                  {{--rows="3">{{$paragraph->details}}</textarea>--}}
                                        {{--<label class="input__label input__label--isao"--}}
                                               {{--data-content="{{__('violation.subject_details')}}">--}}
                                        {{--<span class="input__label-content input__label-content--isao">{{__('violation.subject_details')}}--}}
                                            {{--@if($errors->has('paragraph_details.'.$k))--}}
                                                {{--<br>--}}
                                                {{--<span class="text-danger">({{$errors->first('paragraph_details.'.$k)}})</span>--}}
                                            {{--@endif--}}
                                        {{--</span>--}}
                                    {{--</label>--}}
                                  {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
                {{--@php--}}
                    {{--$range = [];--}}
                    {{--if ($errors->has('paragraph_count')){--}}

                        {{--$count = $errors->first('paragraph_count');--}}
                        {{--$p_count = count($subject->paragraphs ?? []);--}}
                        {{--if ($count > $p_count){--}}
                            {{--$range = range(0,($count - $p_count)-1);--}}
                        {{--}--}}
                    {{--}--}}
                {{--@endphp--}}
                {{--@foreach($range as $para)--}}
                    {{--<div class="row p-2">--}}
                        {{--<div class="col-md-12" id="paragraph_row">--}}
                            {{--<input type="hidden" name="paragraph_id[]" value="0">--}}
                            {{--<div class="row  bg-gray mb-4 para_row"--}}
                                 {{--@if($subject->type == 0) style="display: none" @endif>--}}
                                {{--<div class="col-md-4">--}}
                                    {{--<span class="input input--isao">--}}
                                        {{--<input class="input__field input__field--isao" type="text" autocomplete="off"--}}
                                               {{--name="paragraph_title[]"--}}
                                               {{--value="{{old('paragraph_title.'.(intval($para)+intval($p_count)))}}"--}}
                                               {{--placeholder="{{__('violation.subject_p_title_type')}}"/>--}}
                                        {{--<label class="input__label input__label--isao"--}}
                                               {{--data-content="{{__('violation.subject_p_title')}}">--}}
                                        {{--<span class="input__label-content input__label-content--isao">--}}
                                            {{--<star>*</star>--}}
                                            {{--{{__('violation.subject_p_title')}}--}}
                                            {{--@if($errors->has('paragraph_title.'.(intval($para)+intval($p_count))))--}}
                                                {{--<br>--}}
                                                {{--<span class="text-danger">({{$errors->first('paragraph_title.'.(intval($para)+intval($p_count)))}})</span>--}}
                                            {{--@endif--}}
                                        {{--</span>--}}
                                    {{--</label>--}}
                                  {{--</span>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-12">--}}
                                    {{--<span class="input input--isao">--}}
                                        {{--<textarea class="input__field input__field--isao" name="paragraph_details[]"--}}
                                                  {{--placeholder="{{__('violation.subject_details_type')}}"--}}
                                                  {{--rows="3">{{old('subject_details.'.(intval($para)+intval($p_count)))}}</textarea>--}}
                                        {{--<label class="input__label input__label--isao"--}}
                                               {{--data-content="{{__('violation.subject_details')}}">--}}
                                        {{--<span class="input__label-content input__label-content--isao">{{__('violation.subject_details')}}--}}
                                            {{--@if($errors->has('paragraph_details.'.(intval($para)+intval($p_count))))--}}
                                                {{--<br>--}}
                                                {{--<span class="text-danger">({{$errors->first('paragraph_details.'.(intval($para)+intval($p_count)))}})</span>--}}
                                            {{--@endif--}}
                                        {{--</span>--}}
                                    {{--</label>--}}
                                  {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
                {{--<div class="row">--}}

                    {{--<div class="col-md-12" id="paragraph_section"></div>--}}
                {{--</div>--}}
            {{--</fieldset>--}}
        </div>
        <div class="col-md-12">
            {{--<button type="button" class="btn btn-primary btn-sm float-left" id="add_paragraph"--}}
                    {{--@if($subject->type == 0) style="display: none" @endif>--}}
                {{--<i class="la la-plus"></i>--}}
            {{--</button>--}}
        </div>
        <div class="col-md-12 text-center mb-5">
            <button class="btn btn-primary">
                {{__('violation.update')}}
            </button>
        </div>
    </div>

    {{Form::close()}}
</div>
