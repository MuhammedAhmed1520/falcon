<!-- Modal -->
<div class="modal fade" id="violations_modals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {{Form::open([
                        'route'=>['handleEditViolationAction'],
                        'method'=>'post',
                        'enctype'=>'multipart/form-data'
                    ])}}
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend>{{__('violation.violation_action')}}</legend>
                                <div class="row">
                                        <div class="col-md-4">
                                            <b>{{__('violation.violation_action')}}</b>
                                            <select class="form-control" name="violation_action_id" id="select_action">
                                                @foreach($actions as $action)
                                                    <option value="{{$action->id}}"
                                                           >{{$action->title}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('violation_action_id'))
                                                <br>
                                                <span class="text-danger">({{$errors->first('violation_action_id')}})</span>
                                            @endif
                                            <input type="hidden" name="violation_id" id="violationId">
                                        </div>

                                        <div class="col-md-4">
                                            <b>{{__('violation.violation_block')}}</b>
                                            <select class="form-control" name="violation_block" id="violation_block_select">
                                                <option value="1"
                                                       >{{__('violation.yes')}}</option>
                                                <option value="0"
                                                        >{{__('violation.no')}}</option>
                                            </select>
                                            @if($errors->has('violation_block'))
                                                <br>
                                                <span class="text-danger">({{$errors->first('violation_block')}})</span>
                                            @endif
                                        </div>
                                        {{--<div class="col-md-4"></div>--}}
                                        <div class="col-md-4">
                                            <b>{{__('violation.status')}}</b>
                                            <select class="form-control" name="violation_status_id" id="status_select">
                                                @foreach($status->reverse() as $sts)
                                                    <option value="{{$sts->id}}"
                                                           >{{__('violation.'.$sts->title)}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('violation_status_id'))
                                                <br>
                                                <span class="text-danger">({{$errors->first('violation_status_id')}})</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <b>{{__('violation.area')}}
                                                <star>*</star>
                                            </b>
                                            <input class="form-control" name="violation_area" id="violation_area_id"
                                                   required="">
                                            @if($errors->has('violation_area'))
                                                <br>
                                                <span class="text-danger">({{$errors->first('violation_area')}})</span>
                                            @endif
                                        </div>
                                    <div class="col-md-4 committee">
                                        <br><b>{{__('violation.committee_no')}}</b>
                                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text" name="committee_no"
                                   value=""/>
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
                                    <div class="col-md-4 committee"
                                         >
                                        <br><b>{{__('violation.committee_date')}}</b>
                                        <span class="input input--isao">
                            <input class="input__field input__field--isao date_time" type="text" name="committee_date"
                                   value=""/>
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
                                         >
                                        <br><b>{{__('violation.attachment')}}</b>
                                        <input type="file" name="attachment[]" multiple>
                                        {{--<ul class="list-unstyled">--}}
                                            {{--@foreach($violation->files as $file)--}}
                                                {{--<li class="list-inline-item">--}}
                                                    {{--@if(isImage($file->extension))--}}
                                                        {{--<div class="shadow-sm">--}}
                                                            {{--<img src="{{$file->name}}" style="width: 120px;height: 120px;" alt="">--}}
                                                        {{--</div>--}}
                                                    {{--@else--}}
                                                        {{--<div>--}}
                                                            {{--<a href="{{$file->name}}" class="text-info text-center">--}}

                                                                {{--<h4 class="text-primary">--}}
                                                                    {{--<i class="la la-file-pdf-o text-danger fa-2x"></i>--}}
                                                                    {{--{{app()->getLocale() == 'ar' ? 'تحميل الملف اضغط هنا' : 'Dowload Attachment'}}--}}
                                                                {{--</h4>--}}
                                                            {{--</a>--}}
                                                        {{--</div>--}}
                                                    {{--@endif--}}
                                                {{--</li>--}}
                                            {{--@endforeach--}}
                                        {{--</ul>--}}
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-12 text-center mt-5 mb-5">
                                <input type="submit" class="btn btn-primary" value="{{__('violation.update')}}">
                        </div>
                    </div>

                    {{Form::close()}}
                </div>

            </div>
        </div>
    </div>
</div>