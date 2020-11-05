<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="bg-gray mb-2 p-1">
                    <div class="row">
                        <div class="col-md-4">
                            <b>{{__('violation.date_range')}}</b>
                            <input type="text" class="date-range form-control">
                            <input type="hidden" name="violation_date_from">
                            <input type="hidden" name="violation_date_to">
                        </div>
                        <div class="col-md-3 d-none advanced_item">
                            <b>{{__('violation.violation_action')}}</b>
                            <select class="form-control" name="action_id">
                                <option value="ALL">{{__('violation.ALL')}}</option>
                                @foreach($actions as $action)
                                    <option value="{{$action->id}}"
                                            @if(request()->get('action_id') == $action->id) selected @endif>{{$action->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <b>{{__('violation.paid')}}</b>
                            <select class="form-control" name="payed">
                                <option value="">{{__('violation.ALL')}}</option>
                                <option value="1" @if(request()->get('payed') == "1") selected @endif>{{__('violation.yes')}}</option>
                                <option value="0"
                                        @if(request()->get('payed') == "0") selected @endif>{{__('violation.no')}}</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <b>{{__('violation.status')}}</b>
                            <select class="form-control" name="status_id">
                                <option value="ALL">{{__('violation.ALL')}}</option>
                                @foreach($status as $st)
                                    <option value="{{$st->id}}"
                                            @if(request()->get('status_id') == $st->id) selected @endif>{{__('violation.'.$st->title)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 d-none advanced_item">
                            <b>{{__('violation.query')}}</b>
                            <input type="text" name="key" class="form-control" value="{{ request()->get('key')}}">
                        </div>
                        <div class="col-md-3 d-none advanced_item">
                            <b>{{__('violation.category')}}</b>
                            <select class="form-control" name="category_id">
                                <option value="ALL">{{__('violation.ALL')}}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @if(request()->get('category_id') == $category->id) selected @endif>{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 d-none advanced_item">
                            <b>{{__('violation.officer')}}</b>
                            <select class="form-control select2" name="officer_id">
                                <option value="">{{__('violation.ALL')}}</option>
                                @foreach($officers as $officer)
                                    <option value="{{$officer->id}}"
                                            @if(request()->get('officer_id') == $officer->id) selected @endif>{{$officer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 d-none advanced_item">
                            <b>{{__('violation.area')}}</b>
                            <select class="form-control select2" name="area_id">
                                <option value="">{{__('violation.ALL')}}</option>
                                @foreach($areas as $area)
                                    <option value="{{$area->id}}"
                                            @if(request()->get('area_id') == $area->id) selected @endif>{{$area->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 text-left mt-2 mb-2">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-sm btn-info m-0">
                                    {{__('violation.filter')}}
                                </button>
                                <button type="reset" class="btn btn-sm btn-danger m-0" onclick="removeReset()">
                                    {{__('violation.reset')}}
                                </button>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="button"
                                        aria-pressed="false"
                                        autocomplete="off" onclick="advanced_search()">
                                    <i class="la la-cog"></i>
                                    {{__('violation.advanced_search')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('violation.serial')}}</th>
                    <th>{{__('violation.violation_type')}}</th>
                    <th>{{__('violation.civil_name')}}</th>
                    <th>{{__('violation.civil_ssn')}}</th>
                    <th>{{__('violation.area')}}</th>
                    <th>{{__('violation.amount')}}</th>
                    <th>{{__('violation.created_at')}}</th>
                    <th>{{__('violation.violation_at')}}</th>
                    <th>{{__('violation.paid')}}</th>
                    <th>{{__('violation.notes')}}</th>
                    <th>{{__('violation.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($violations as $violation)
                    <tr id="violation_{{$violation->id}}">
                        <td>{{$violation->id}}</td>
                        <td>{{$violation->serial}}</td>
                        <td>{{$violation->category->title ?? '-'}}</td>
                        @if($violation->category_id == 1)
                            <td>{{$violation->civilian->name ?? '-'}}</td>
                            <td>{{$violation->civilian->ssn ?? '-'}}</td>
                        @else
                            <td>{{$violation->company->civilian->name ?? '-'}}</td>
                            <td>{{$violation->company->civilian->ssn ?? '-'}}</td>
                        @endif
                        <td>{{$violation->area->name ?? '-'}}</td>
                        <td>{{$violation->fine_cost ?? '-'}}</td>
                        
                        <td>{{$violation->date ?? '-'}}</td>
                        <td>{{$violation->created_at ?? '-'}}</td>
                        <td class="text-center">{!! $violation->payed_at ?? '<i class="la la-close"></i>' !!}</td>
                        <td>{{$violation->notes ?? '-'}}</td>
                        <td>
                            <div class="btn-group direction">
                                @can('update-violation',auth()->user())
                                    <a href="{{route('editViolation',['id'=>$violation->id])}}"
                                       class="btn btn-primary btn-sm m-0 tooltips" aria-label="{{app()->getLocale() == 'ar' ? ' تعديل ': 'Edit'}}"">
                                        <i class="la la-edit"></i>
                                    </a>
                                @endcan
                                {{--<button class="btn btn-info btn-sm m-0 tooltips" aria-label="{{app()->getLocale() == 'ar' ? 'عرض': 'SHOW'}}">--}}
                                {{--<i class="la la-eye"></i>--}}
                                {{--</button>--}}
                                @can('ppform-civilian-violation',auth()->user())
                                    @if($violation->action->type == 'referral_to_prosecution')
                                        <a href="{{route('addViolationPPFromView',['id'=>$violation->id])}}"
                                           class="btn btn-success btn-sm m-0 tooltips" aria-label="{{app()->getLocale() == 'ar' ? 'نموذج احالة': 'PP FORM'}}">
                                            <i class="la la-users"></i>
                                        </a>
                                    @endif
                                @endcan
                                <a href="{{route('getViolationPayment',['id'=>$violation->id])}}"
                                   class="btn btn-warning btn-sm m-0 tooltips" aria-label="{{app()->getLocale() == 'ar' ? ' الدفع ': 'INVOICE'}}">
                                    <i class="la la-money"></i>
                                </a>
                                <a href="{{route('showViolationData',['id'=>$violation->id])}}"
                                   class="btn btn-primary btn-sm m-0 tooltips" aria-label="{{app()->getLocale() == 'ar' ? ' عرض المخالفة ': 'Show'}}">
                                    <i class="la la-eye"></i>
                                </a>
                                
                                @can('delete-violation',auth()->user())
                                    <button class="btn btn-danger btn-sm m-0 tooltips"
                                            onclick="remove('{{$violation->id}}')" aria-label="{{app()->getLocale() == 'ar' ? 'حذف': 'REMOVE'}}">
                                        <i class="la la-remove"></i>
                                    </button>
                                @endcan
                                @can('violation-action')
                                        @if(!$violation->payed_at)
                                            <button class="btn btn-info btn-sm m-0 tooltips"
                                                    onclick="actionModal({{$violation}})" aria-label="{{app()->getLocale() == 'ar' ? 'تعديل الاجراء النهائي': 'Action'}}">
                                                <i class="la la-pencil"></i>
                                            </button>
                                        @endif
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mb-5">
            {{$violations->appends(\request()->except(['page']))->render("pagination::bootstrap-4")}}
        </div>
    </div>
</div>
