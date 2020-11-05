<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="bg-gray mb-2 p-1">
                <form id="form">
                    <div class="row">
                    <div class="col-md-4">
                        <b>{{__('violation.violation_date')}}</b>
                        <div class="input-group">
                             <input type="text" class="date-range-violation form-control">
                             <div class="input-group-append"> 
                                    <button type="button" id="clear-range-violation" class="btn btn-danger" title="clear" data-clear>
                                        <i class="la la-close"></i>
                                    </button>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <b>{{__('violation.subject_number')}}
                            </b>
                        <select class="form-control" id="subject_p_select" name="punishment_subject_paragraphs_id">
                            <option selected value="ALL">{{__('violation.ALL')}}</option>
                            @foreach($subject_punishment as $su_pm_p)
                                <option data-info="{{$su_pm_p}}"
                                        @if($su_pm_p->subject_paragraph->trashed()) disabled @endif
                                        @if($su_pm_p->punishment_paragraph->trashed()) disabled @endif
                                        @if(old('punishment_subject_paragraphs_id') == $su_pm_p->id)  selected @endif
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
                    <div class="col-md-12"></div>
                    <div class="col-md-4">
                        <b>{{__('violation.violation_payment_date')}}</b>
                        <div class="input-group">
                             <input type="text" class="date-range-payment form-control">
                             <div class="input-group-append"> 
                                    <button type="button" id="clear-range-payment" class="btn btn-danger" title="clear" data-clear>
                                        <i class="la la-close"></i>
                                    </button>
                              </div>
                        </div>
                    </div>
                    {{--<div class="col-md-12"></div>--}}
                    <div class="col-md-4">
                        <i class="la la-info-circle" title="وقت دخول المخالفة على النظام"></i>
                        <b>{{__('violation.violation_create_date')}}</b>
                        <div class="input-group">
                            <input type="text" class="date-range-create form-control">
                             <div class="input-group-append"> 
                                    <button type="button" id="clear-range-create" class="btn btn-danger" title="clear" data-clear>
                                        <i class="la la-close"></i>
                                    </button>
                              </div>
                        </div>
                        
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-4">
                        <b>{{__('violation.violation_type')}}</b>
                        <select class="form-control" name="category_id">
                            <option value="ALL">{{__('violation.ALL')}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <b>{{__('violation.paid')}}</b>
                        <select class="form-control" name="payed">
                            <option value="ALL">{{__('violation.ALL')}}</option>
                            <option value="1">{{__('violation.yes')}}</option>
                            <option value="0">{{__('violation.no')}}</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <b>{{__('violation.status')}}</b>
                        <select class="form-control" name="status_id">
                            <option value="ALL">{{__('violation.ALL')}}</option>
                            @foreach($status as $st)
                                <option value="{{$st->id}}">{{__('violation.'.$st->title)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12"></div>
                    <div class="col-md-4">
                        <b>{{__('violation.violation_action')}}</b>
                        <select class="form-control" name="action_id">
                            <option value="ALL">{{__('violation.ALL')}}</option>
                            @foreach($actions as $action)
                                <option value="{{$action->id}}">{{$action->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <b>{{__('violation.officer')}}</b>
                        <select class="form-control" name="officer_id">
                            <option value="ALL">{{__('violation.ALL')}}</option>
                            @foreach($officers as $officer)
                                <option value="{{$officer->id}}">{{$officer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-8">
                        <b>{{__('violation.area')}}</b>
                        <select class="form-control" name="area_id">
                            <option value="ALL">{{__('violation.ALL')}}</option>
                            @foreach($areas as $area)
                                <option value="{{$area->id}}">{{$area->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-8">
                        <b>{{__('violation.query')}}</b>
                        <input type="text" name="query" class="form-control">
                    </div>
                    @can('report-table-violation')
                    <div class="col-md-12">
                        <br>
                        <input id="table_only" name="table_only" type="checkbox" value="1" checked>
                        <label for="table_only">{{__('violation.table_only')}}</label>
                    </div>
                    @endcan
                    @can('report-statistic-violation')
                    <div class="col-md-12">
                        <input id="statistics_only" name="statistics_only" type="checkbox" value="1">
                        <label for="statistics_only">{{__('violation.statistics_only')}}</label>
                    </div>
                    @endcan
                    <div class="col-md-12">
                        <input id="paginated" name="paginated" type="checkbox" value="1">
                        <label for="paginated">{{__('dashboard.all_data')}}</label>
                    </div>
                    <div class="col-md-12 text-center mt-2 mb-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-info m-0" onclick="report()">
                                {{__('violation.filter')}}
                            </button>
                            <button type="reset" class="btn btn-sm btn-danger m-0">
                                {{__('violation.reset')}}
                            </button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
