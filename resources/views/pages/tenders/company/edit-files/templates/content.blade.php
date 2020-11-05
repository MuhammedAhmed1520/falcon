<div class="container-fluid">
    {{Form::open([
        'method'=>'post',
        'route'=>['handleCompnayFiles',$company->id],
        'enctype'=>'multipart/form-data'
    ])}}

    <input type="hidden" name="tender_company_id" value="{{$company->tender_company->id}}">
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">

                    <div class="offset-3 col-md-6">
                        <div class="shadow-lg p-3 mb-5">
                            <h4>
                                <b id="file_1_text">
                                    @if($files['d1']['type'] ?? null)
                                        {{__('tenders.f1_alt')}}
                                    @else
                                        {{__('tenders.f1')}}
                                    @endif
                                </b>
                                <star>*</star>
                            </h4>
                            @if($errors->has('d1'))
                                <span class="text-danger">({{$errors->first('d1')}})</span>
                            @endif
                            <input type="file" name="d1" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="checkbox" name="d1_alt" value="1" id="d1_alt_check"
                                           @if($files['d1']['type'] ?? null) checked @endif>
                                    <label for="d1_alt_check">
                                        {{app()->getLocale() == 'ar' ? ' مكتب/دار إستشاري'  : '  Office / consulting house'}}
                                    </label>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <b class="text-primary">{{__('tenders.file_issue')}}</b>
                                    <input class="form-control" type="text"
                                           name="comment_d1"
                                           autocomplete="off"
                                           value="{{old('comment_d1') ?? $files['d1']['comment'] ?? null}}"/>
                                    @if($errors->has('comment_d1'))
                                        <span class="text-danger">
                                            <span class="text-danger">({{$errors->first('comment_d1')}})</span>
                                        </span>
                                    @endif
                                </div>

                                @if($files['d1']['file'] ?? null)
                                    <div class="col-md-12 mt-1">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>
                                                    <a href="{{$files['d1']['file'] ?? null}}"
                                                       download="">
                                                        <i class="la la-download"></i>
                                                        {{__('tenders.download')}}
                                                    </a>

                                                    <a href="{{$files['d1']['file'] ?? null}}" target="_blank">
                                                        <i class="la la-eye"></i>
                                                        {{__('tenders.view')}}
                                                    </a>
                                                </td>
                                                <td class=" text-right">
                                                    @can('decide-files-tender-company')
                                                        <div class="btn-group">
                                                            @if(($files['d1']['is_approved'] ?? 'undefiend') == '0')
                                                                <button class="btn btn-sm btn-primary" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d1']['id'] ?? null}}',1)">
                                                                    {{__('tenders.approve')}}
                                                                </button>
                                                            @endif
                                                            @if(($files['d1']['is_approved'] ?? 'undefiend') == '1')
                                                                <button class="btn btn-sm btn-danger" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d1']['id'] ?? null}}',0)">
                                                                    {{__('tenders.reject')}}
                                                                </button>
                                                            @endif

                                                            @if(($files['d1']['is_approved'] ?? 'undefiend') == null)
                                                                <button class="btn btn-sm btn-primary" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d1']['id'] ?? null}}',1)">
                                                                    {{__('tenders.approve')}}
                                                                </button>
                                                                <button class="btn btn-sm btn-danger" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d1']['id'] ?? null}}',0)">
                                                                    {{__('tenders.reject')}}
                                                                </button>
                                                            @endif
                                                        </div>
                                                    @endcan
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                @else
                                    <div class="col-md-12 mt-2">
                                        <div class="alert alert-danger text-center">
                                            No Files
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="offset-3 col-md-6">
                        <div class="shadow-lg p-3 mb-5">
                            <h4>
                                <b>{{__('tenders.f2')}}
                                    <star>*</star>
                                </b>
                            </h4>
                            @if($errors->has('d2'))
                                <span class="text-danger">({{$errors->first('d2')}})</span>
                            @endif
                            <br>
                            <input type="file" name="d2" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            <br><br>
                            <div class="row">
                                <div class="col-md-7">
                                    <b class="text-primary">{{__('tenders.file_issue')}}</b>
                                    <input class="form-control" type="text"
                                           name="comment_d2"
                                           autocomplete="off"
                                           value="{{old('comment_d2') ?? $files['d2']['comment'] ?? null}}"/>
                                    @if($errors->has('comment_d2'))
                                        <span class="text-danger">
                                    <span class="text-danger">({{$errors->first('comment_d2')}})</span>
                                </span>
                                    @endif
                                </div>
                                <div class="col-md-5">
                                    <b>{{__('tenders.expire_date')}}</b>
                                    <input type="text" class="form-control date_time" name="expired_date_d2"
                                           value="{{$files['d2']['expired_date'] ?? null}}">
                                </div>

                                @if($files['d2']['file'] ?? null)
                                    <div class="col-md-12 mt-1">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>
                                                    <a href="{{$files['d2']['file'] ?? null}}"
                                                       download="">
                                                        <i class="la la-download"></i>
                                                        {{__('tenders.download')}}
                                                    </a>

                                                    <a href="{{$files['d2']['file'] ?? null}}" target="_blank">
                                                        <i class="la la-eye"></i>
                                                        {{__('tenders.view')}}
                                                    </a>
                                                </td>
                                                <td class=" text-right">
                                                    @can('decide-files-tender-company')
                                                        <div class="btn-group">
                                                            @if(($files['d2']['is_approved'] ?? 'undefiend') == '0')
                                                                <button class="btn btn-sm btn-primary" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d2']['id'] ?? null}}',1)">
                                                                    {{__('tenders.approve')}}
                                                                </button>
                                                            @endif
                                                            @if(($files['d2']['is_approved'] ?? 'undefiend') == '1')
                                                                <button class="btn btn-sm btn-danger" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d2']['id'] ?? null}}',0)">
                                                                    {{__('tenders.reject')}}
                                                                </button>
                                                            @endif

                                                            @if(($files['d2']['is_approved'] ?? 'undefiend') == null)
                                                                <button class="btn btn-sm btn-primary" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d2']['id'] ?? null}}',1)">
                                                                    {{__('tenders.approve')}}
                                                                </button>
                                                                <button class="btn btn-sm btn-danger" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d2']['id'] ?? null}}',0)">
                                                                    {{__('tenders.reject')}}
                                                                </button>
                                                            @endif
                                                        </div>
                                                    @endcan
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                @else
                                    <div class="col-md-12 mt-2">
                                        <div class="alert alert-danger text-center">
                                            No Files
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="offset-3 col-md-6">
                        <div class="shadow-lg p-3 mb-5">
                            <h4>
                                <b>{{__('tenders.f3')}}
                                    <star>*</star>
                                </b>
                            </h4>
                            @if($errors->has('d3'))
                                <span class="text-danger">({{$errors->first('d3')}})</span>
                            @endif
                            <br>
                            <input type="file" name="d3" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            <br><br>
                            <div class="row">
                                <div class="col-md-7">
                                    <b class="text-primary">{{__('tenders.file_issue')}}</b>
                                    <input class="form-control" type="text"
                                           name="comment_d3"
                                           autocomplete="off"
                                           value="{{old('comment_d3') ?? $files['d3']['comment'] ?? null}}"/>
                                    @if($errors->has('comment_d3'))
                                        <span class="text-danger">
                                    <span class="text-danger">({{$errors->first('comment_d3')}})</span>
                                </span>
                                    @endif
                                </div>
                                <div class="col-md-5">
                                    <b>{{__('tenders.expire_date')}}</b>
                                    <input type="text" class="form-control date_time" name="expired_date_d3"
                                           value="{{$files['d3']['expired_date'] ?? null}}"/>
                                </div>

                                @if($files['d3']['file'] ?? null)
                                    <div class="col-md-12 mt-1">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>
                                                    <a href="{{$files['d3']['file'] ?? null}}"
                                                       download="">
                                                        <i class="la la-download"></i>
                                                        {{__('tenders.download')}}
                                                    </a>

                                                    <a href="{{$files['d3']['file'] ?? null}}" target="_blank">
                                                        <i class="la la-eye"></i>
                                                        {{__('tenders.view')}}
                                                    </a>
                                                </td>
                                                <td class=" text-right">
                                                    @can('decide-files-tender-company')
                                                        <div class="btn-group">
                                                            @if(($files['d3']['is_approved'] ?? 'undefiend') == '0')
                                                                <button class="btn btn-sm btn-primary" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d3']['id'] ?? null}}',1)">
                                                                    {{__('tenders.approve')}}
                                                                </button>
                                                            @endif
                                                            @if(($files['d3']['is_approved'] ?? 'undefiend') == '1')
                                                                <button class="btn btn-sm btn-danger" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d3']['id'] ?? null}}',0)">
                                                                    {{__('tenders.reject')}}
                                                                </button>
                                                            @endif

                                                            @if(($files['d3']['is_approved'] ?? 'undefiend') == null)
                                                                <button class="btn btn-sm btn-primary" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d3']['id'] ?? null}}',1)">
                                                                    {{__('tenders.approve')}}
                                                                </button>
                                                                <button class="btn btn-sm btn-danger" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d3']['id'] ?? null}}',0)">
                                                                    {{__('tenders.reject')}}
                                                                </button>
                                                            @endif
                                                        </div>
                                                    @endcan
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                @else
                                    <div class="col-md-12 mt-2">
                                        <div class="alert alert-danger text-center">
                                            No Files
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="offset-3 col-md-6 position-relative overflow-hidden">
                        <div class="card-file-overlay"
                             @if(!$files['d4']['type'] ?? null)  style="display: none" @endif></div>
                        <div class="shadow-lg p-3 mb-5">
                            <h4>
                                <b>{{__('tenders.f4')}}</b>
                            </h4>
                            @if($errors->has('d4'))
                                <span class="text-danger">({{$errors->first('d4')}})</span>
                            @endif
                            <br>
                            <input type="file" name="d4" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="checkbox" name="d4_alt" value="1" id="d4_alt_check"
                                           @if($files['d4']['type'] ?? null) checked @endif>
                                    <label for="d4_alt_check">
                                        {{app()->getLocale() == 'ar' ? 'الغاء عقد التأسيس وعدم استبداله بشئ'  : 'Cancellation of the founding contract and not being replaced by anything'}}
                                    </label>
                                </div>
                            </div>
                            <br>
                            <b class="text-primary">{{__('tenders.file_issue')}}</b>
                            <div class="col-md-12">
                                <input class="form-control" type="text"
                                       name="comment_d4"
                                       autocomplete="off"
                                       value="{{old('comment_d4') ?? $files['d4']['comment'] ?? null}}"/>
                                @if($errors->has('comment_d4'))
                                    <span class="text-danger">
                                    <span class="text-danger">({{$errors->first('comment_d4')}})</span>
                                </span>
                                @endif
                            </div>

                            @if($files['d4']['file'] ?? null)
                                <div class="col-md-12 mt-1">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <a href="{{$files['d4']['file'] ?? null}}"
                                                   download="">
                                                    <i class="la la-download"></i>
                                                    {{__('tenders.download')}}
                                                </a>

                                                <a href="{{$files['d4']['file'] ?? null}}" target="_blank">
                                                    <i class="la la-eye"></i>
                                                    {{__('tenders.view')}}
                                                </a>
                                            </td>
                                            <td class=" text-right">
                                                @can('decide-files-tender-company')
                                                    <div class="btn-group">
                                                        @if(($files['d4']['is_approved'] ?? 'undefiend') == '0')
                                                            <button class="btn btn-sm btn-primary" type="button"
                                                                    onclick="decideCompnayFiles(this,'{{$files['d4']['id'] ?? null}}',1)">
                                                                {{__('tenders.approve')}}
                                                            </button>
                                                        @endif
                                                        @if(($files['d4']['is_approved'] ?? 'undefiend') == '1')
                                                            <button class="btn btn-sm btn-danger" type="button"
                                                                    onclick="decideCompnayFiles(this,'{{$files['d4']['id'] ?? null}}',0)">
                                                                {{__('tenders.reject')}}
                                                            </button>
                                                        @endif

                                                        @if(($files['d4']['is_approved'] ?? 'undefiend') == null)
                                                            <button class="btn btn-sm btn-primary" type="button"
                                                                    onclick="decideCompnayFiles(this,'{{$files['d4']['id'] ?? null}}',1)">
                                                                {{__('tenders.approve')}}
                                                            </button>
                                                            <button class="btn btn-sm btn-danger" type="button"
                                                                    onclick="decideCompnayFiles(this,'{{$files['d4']['id'] ?? null}}',0)">
                                                                {{__('tenders.reject')}}
                                                            </button>
                                                        @endif
                                                    </div>
                                                @endcan
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @else
                                <div class="col-md-12 mt-2">
                                    <div class="alert alert-danger text-center">
                                        No Files
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="offset-3 col-md-6">
                        <div class="shadow-lg p-3 mb-5">
                            <h4>
                                <b>{{__('tenders.f5')}}
                                    <star>*</star>
                                </b>
                            </h4>
                            @if($errors->has('d5'))
                                <span class="text-danger">({{$errors->first('d5')}})</span>
                            @endif
                            <br>
                            <input type="file" name="d5" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            <br><br>
                            <div class="col-md-12">
                                <b class="text-primary">{{__('tenders.file_issue')}}</b>
                                <input class="form-control" type="text"
                                       name="comment_d5"
                                       autocomplete="off"
                                       value="{{old('comment_d5') ?? $files['d5']['comment'] ?? null}}"/>
                                @if($errors->has('comment_d5'))
                                    <span class="text-danger">
                                    <span class="text-danger">({{$errors->first('comment_d5')}})</span>
                                </span>
                                @endif
                            </div>

                            @if($files['d5']['file'] ?? null)
                                <div class="col-md-12 mt-1">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <a href="{{$files['d5']['file'] ?? null}}"
                                                   download="">
                                                    <i class="la la-download"></i>
                                                    {{__('tenders.download')}}
                                                </a>

                                                <a href="{{$files['d5']['file'] ?? null}}" target="_blank">
                                                    <i class="la la-eye"></i>
                                                    {{__('tenders.view')}}
                                                </a>
                                            </td>
                                            <td class=" text-right">
                                                @can('decide-files-tender-company')
                                                    <div class="btn-group">
                                                        @if(($files['d5']['is_approved'] ?? 'undefiend') == '0')
                                                            <button class="btn btn-sm btn-primary" type="button"
                                                                    onclick="decideCompnayFiles(this,'{{$files['d5']['id'] ?? null}}',1)">
                                                                {{__('tenders.approve')}}
                                                            </button>
                                                        @endif
                                                        @if(($files['d5']['is_approved'] ?? 'undefiend') == '1')
                                                            <button class="btn btn-sm btn-danger" type="button"
                                                                    onclick="decideCompnayFiles(this,'{{$files['d5']['id'] ?? null}}',0)">
                                                                {{__('tenders.reject')}}
                                                            </button>
                                                        @endif

                                                        @if(($files['d5']['is_approved'] ?? 'undefiend') == null)
                                                            <button class="btn btn-sm btn-primary" type="button"
                                                                    onclick="decideCompnayFiles(this,'{{$files['d5']['id'] ?? null}}',1)">
                                                                {{__('tenders.approve')}}
                                                            </button>
                                                            <button class="btn btn-sm btn-danger" type="button"
                                                                    onclick="decideCompnayFiles(this,'{{$files['d5']['id'] ?? null}}',0)">
                                                                {{__('tenders.reject')}}
                                                            </button>
                                                        @endif
                                                    </div>
                                                @endcan
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @else
                                <div class="col-md-12 mt-2">
                                    <div class="alert alert-danger text-center">
                                        No Files
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="offset-3 col-md-6">
                        <div class="shadow-lg p-3 mb-5">
                            <h4>
                                <b>{{__('tenders.f6')}}
                                    <star>*</star>
                                </b>
                            </h4>
                            @if($errors->has('d6'))
                                <span class="text-danger">({{$errors->first('d6')}})</span>
                            @endif
                            <br>
                            <input type="file" name="d6" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            <br><br>
                            <div class="col-md-12">
                                <b class="text-primary">{{__('tenders.file_issue')}}</b>
                                <input class="form-control" type="text"
                                       name="comment_d6"
                                       autocomplete="off"
                                       value="{{old('comment_d6') ?? $files['d6']['comment'] ?? null}}"/>
                                @if($errors->has('comment_d6'))
                                    <span class="text-danger">
                                    <span class="text-danger">({{$errors->first('comment_d6')}})</span>
                                </span>
                                @endif
                            </div>
                            @if($files['d6']['file'] ?? null)
                                <div class="col-md-12 mt-1">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <a href="{{$files['d6']['file'] ?? null}}"
                                                   download="">
                                                    <i class="la la-download"></i>
                                                    {{__('tenders.download')}}
                                                </a>

                                                <a href="{{$files['d6']['file'] ?? null}}" target="_blank">
                                                    <i class="la la-eye"></i>
                                                    {{__('tenders.view')}}
                                                </a>
                                            </td>
                                            <td class=" text-right">
                                                @can('decide-files-tender-company')
                                                    <div class="btn-group">
                                                        @if(($files['d6']['is_approved'] ?? 'undefiend') == '0')
                                                            <button class="btn btn-sm btn-primary" type="button"
                                                                    onclick="decideCompnayFiles(this,'{{$files['d6']['id'] ?? null}}',1)">
                                                                {{__('tenders.approve')}}
                                                            </button>
                                                        @endif
                                                        @if(($files['d6']['is_approved'] ?? 'undefiend') == '1')
                                                            <button class="btn btn-sm btn-danger" type="button"
                                                                    onclick="decideCompnayFiles(this,'{{$files['d6']['id'] ?? null}}',0)">
                                                                {{__('tenders.reject')}}
                                                            </button>
                                                        @endif

                                                        @if(($files['d6']['is_approved'] ?? 'undefiend') == null)
                                                            <button class="btn btn-sm btn-primary" type="button"
                                                                    onclick="decideCompnayFiles(this,'{{$files['d6']['id'] ?? null}}',1)">
                                                                {{__('tenders.approve')}}
                                                            </button>
                                                            <button class="btn btn-sm btn-danger" type="button"
                                                                    onclick="decideCompnayFiles(this,'{{$files['d6']['id'] ?? null}}',0)">
                                                                {{__('tenders.reject')}}
                                                            </button>
                                                        @endif
                                                    </div>
                                                @endcan
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @else
                                <div class="col-md-12 mt-2">
                                    <div class="alert alert-danger text-center">
                                        No Files
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>


                    <div class="offset-3 col-md-6">
                        <div class="shadow-lg p-3 mb-5">
                            <h4>
                                <b>{{__('tenders.f7')}}
                                    <star>*</star>
                                </b>
                            </h4>
                            @if($errors->has('d7'))
                                <span class="text-danger">({{$errors->first('d7')}})</span>
                            @endif
                            <br>
                            <input type="file" name="d7" accept="image/jpg,image/jpeg,image/png,application/pdf"/>
                            <br><br>
                            <div class="row">
                                <div class="col-md-7">
                                    <b class="text-primary">{{__('tenders.file_issue')}}</b>
                                    <input class="form-control" type="text"
                                           name="comment_d7"
                                           autocomplete="off"
                                           value="{{old('comment_d7') ?? $files['d7']['comment'] ?? null}}"/>
                                    @if($errors->has('comment_d7'))
                                        <span class="text-danger">
                                    <span class="text-danger">({{$errors->first('comment_d7')}})</span>
                                </span>
                                    @endif
                                </div>
                                <div class="col-md-5">
                                    <b>{{__('tenders.expire_date')}}</b>
                                    <input type="text" class="form-control date_time" name="expired_date_d7"
                                           value="{{$files['d7']['expired_date'] ?? null}}"/>
                                </div>
                                @if($files['d7']['file'] ?? null)
                                    <div class="col-md-12 mt-1">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>
                                                    <a href="{{$files['d7']['file'] ?? null}}"
                                                       download="">
                                                        <i class="la la-download"></i>
                                                        {{__('tenders.download')}}
                                                    </a>

                                                    <a href="{{$files['d7']['file'] ?? null}}" target="_blank">
                                                        <i class="la la-eye"></i>
                                                        {{__('tenders.view')}}
                                                    </a>
                                                </td>
                                                <td class=" text-right">
                                                    @can('decide-files-tender-company')
                                                        <div class="btn-group">
                                                            @if(($files['d7']['is_approved'] ?? 'undefiend') == '0')
                                                                <button class="btn btn-sm btn-primary" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d7']['id'] ?? null}}',1)">
                                                                    {{__('tenders.approve')}}
                                                                </button>
                                                            @endif
                                                            @if(($files['d7']['is_approved'] ?? 'undefiend') == '1')
                                                                <button class="btn btn-sm btn-danger" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d7']['id'] ?? null}}',0)">
                                                                    {{__('tenders.reject')}}
                                                                </button>
                                                            @endif

                                                            @if(($files['d7']['is_approved'] ?? 'undefiend') == null)
                                                                <button class="btn btn-sm btn-primary" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d7']['id'] ?? null}}',1)">
                                                                    {{__('tenders.approve')}}
                                                                </button>
                                                                <button class="btn btn-sm btn-danger" type="button"
                                                                        onclick="decideCompnayFiles(this,'{{$files['d7']['id'] ?? null}}',0)">
                                                                    {{__('tenders.reject')}}
                                                                </button>
                                                            @endif
                                                        </div>
                                                    @endcan
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                @else
                                    <div class="col-md-12 mt-2">
                                        <div class="alert alert-danger text-center">
                                            No Files
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="checkbox" name="notify" value="1" id="notify">
                                <label for="notify">
                                    {{app()->getLocale() == 'ar' ? 'ارسال بريد الكتروني'  : 'send Email'}}
                                </label>
                            </div>
                        </div>
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
