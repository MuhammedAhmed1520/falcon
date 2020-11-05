<div class="container-fluid">
    {{Form::open([
        'route'=>'handleCreateSubjectRules',
        'method'=>'post'
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">
                    <div class="col-md-3">
                        <span class="input input--isao">
                            <input class="input__field input__field--isao arabicnumber" type="text" autocomplete="off"
                                   name="subject_number"
                                   value="{{old('subject_number')}}"
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
                                   value="{{old('subject_title')}}"
                                   placeholder="{{__('violation.subject_title_type')}}"/>
                            <label class="input__label input__label--isao"
                                   data-content="{{__('violation.subject_title')}}">
                            <span class="input__label-content input__label-content--isao">
                                <star>*</star>
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
                                   value="{{old('subject_order') ?? $next_order ?? 1}}"
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
                    <div class="col-md-12" id="main_p">
                        <span class="input input--isao">
                            <textarea class="input__field input__field--isao" name="main_paragraph"
                                      placeholder="{{__('violation.subject_details_type')}}"
                                      rows="3">{{old('main_paragraph')}}</textarea>
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
                        {{--<input type="checkbox" value="1" name="multi_paragraph" id="multi_paragraph">--}}
                        {{--<label for="multi_paragraph">{{app()->getLocale() == 'ar' ? 'اكثر من فقرة' : 'Multi Paragraph'}}</label>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--@php--}}
                    {{--$range = range(0 , 0);--}}
                    {{--if($errors->has('paragraph_count')){--}}
                        {{--$max = $errors->first('paragraph_count') - 1;--}}
                        {{--$range = range(0 , $max);--}}
                    {{--}--}}
                {{--@endphp--}}

                {{--@foreach($range as $para)--}}
                    {{--<div class="row p-2">--}}
                        {{--<div class="col-md-12" id="paragraph_row">--}}
                            {{--<div class="row  bg-gray mb-4 para_row" style="display: none">--}}
                                {{--<div class="col-md-12 float-left text-right">--}}
                                    {{--<button type="button" class="btn btn-danger mt-2 delete_btn">--}}
                                        {{--<i class="la la-close"></i>--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4">--}}
                                    {{--<span class="input input--isao">--}}
                                        {{--<input class="input__field input__field--isao" type="text" autocomplete="off"--}}
                                               {{--name="paragraph_title[]"--}}
                                               {{--value="{{old('paragraph_title.'.$para)}}"--}}
                                               {{--placeholder="{{__('violation.subject_p_title_type')}}"/>--}}
                                        {{--<label class="input__label input__label--isao"--}}
                                               {{--data-content="{{__('violation.subject_p_title')}}">--}}
                                        {{--<span class="input__label-content input__label-content--isao">--}}
                                            {{--<star>*</star>--}}
                                            {{--{{__('violation.subject_p_title')}}--}}
                                            {{--@if($errors->has('paragraph_title.'.$para))--}}
                                                {{--<br>--}}
                                                {{--<span class="text-danger">({{$errors->first('paragraph_title.'.$para)}})</span>--}}
                                            {{--@endif--}}
                                        {{--</span>--}}
                                    {{--</label>--}}
                                  {{--</span>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-12">--}}
                                    {{--<span class="input input--isao">--}}
                                        {{--<textarea class="input__field input__field--isao" name="paragraph_details[]"--}}
                                                  {{--placeholder="{{__('violation.subject_details_type')}}"--}}
                                                  {{--rows="3">{{old('paragraph_details.'.$para)}}</textarea>--}}
                                        {{--<label class="input__label input__label--isao"--}}
                                               {{--data-content="{{__('violation.subject_details')}}">--}}
                                        {{--<span class="input__label-content input__label-content--isao">{{__('violation.subject_details')}}</span>--}}
                                    {{--</label>--}}
                                  {{--</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-12" id="paragraph_section"></div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</fieldset>--}}
        </div>
        {{--<div class="col-md-12">--}}
            {{--<button type="button" class="btn btn-primary btn-sm float-left" style="display: none" id="add_paragraph">--}}
                {{--<i class="la la-plus"></i>--}}
            {{--</button>--}}
        {{--</div>--}}
        <div class="col-md-12 text-center mb-5">
            <button class="btn btn-primary">
                {{__('violation.save')}}
            </button>
        </div>
    </div>

    {{Form::close()}}
</div>