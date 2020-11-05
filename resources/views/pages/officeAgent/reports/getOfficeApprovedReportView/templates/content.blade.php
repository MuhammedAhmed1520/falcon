<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-none d-print text-center mt-3 mb-4">
            <div class="text-center">
                <span class="fs15">{{app()->getLocale() == 'ar' ? 'الانشطة' : 'Activity'}} : </span>
                (<span id="company_name"></span>),
                <span class="fs15">{{app()->getLocale() == 'ar' ? 'درجة التصنيف' : 'classification degree'}} : </span>
                (<span id="classification_degree"></span>),
                <span class="fs15">{{__('dashboard.print_date')}} : </span>
                <span>({{Carbon\Carbon::now()->format('Y-m-d H:i:s')}})</span>
            </div>
        </div>
        <div class="col-md-12">
            <form action="">
                <div class="bg-gray d-print-none mb-2 mt-4 p-2">
                    <div class="row ">
                        <div class="col-md-6">
                            <label>{{__('office_agent.activities')}}</label>
                            <select class="form-control" name="office_type_id">
                                @foreach($activities as $activity)
                                    <option value="{{$activity->id}}"
                                            @if($activity->id == request()->get('office_type_id')) selected @endif>{{$activity->title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="font-weight-bold text-black">درجة التصنيف</label>
                            <select class="form-control" name="classification_degree_id">
                                <option value="">-- الكل --</option>
                                @foreach($classification_degrees as $classification_degree)
                                    <option @if(request()->get('classification_degree_id') == $classification_degree->id) selected
                                            @endif  value="{{$classification_degree->id}}">{{$classification_degree->title_ar}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--                        <div class="col-md-3">--}}
                        {{--                            <b>{{__('office_agent.order_date')}}</b>--}}
                        {{--                            <input type="date" class="date-range form-control text-center" dir="ltr"--}}
                        {{--                                   value="{{request()->get('created_at')}}">--}}
                        {{--                            <input type="hidden" name="start_date">--}}
                        {{--                            <input type="hidden" name="end_date">--}}
                        {{--                        </div>--}}
                        <div class="col-md-12 text-left mt-2 mb-2">
                            <div class="btn-group d-print-none">
                                <button type="submit" class="btn btn-sm btn-info m-0">
                                    {{__('violation.filter')}}
                                </button>
                                <button type="reset" class="btn btn-sm btn-danger m-0" onclick="removeReset()">
                                    {{__('violation.reset')}}
                                </button>
                                <button type="button" class="btn btn-sm btn-dark m-0 d-print-none"
                                        onclick="printTrigger()">
                                    {{__('violation.print')}}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--<div class="col-6 d-none d-print">-->
                        <!--    <ul class="list-unstyled mt-4 mb-4"> -->
                        <!--        <li>-->
                    <!--            <span class="fs15">{{__('office_agent.activities')}} : </span>-->
                        <!--            <span id="company_name"></span>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                        <!--<div class="col-6 d-none d-print">-->
                        <!--    <ul class="list-unstyled mt-4 mb-4"> -->
                        <!--        <li>-->
                    <!--            <span class="fs15">{{__('dashboard.print_date')}} : </span>-->
                    <!--            <span>{{Carbon\Carbon::now()->format('Y-m-d H:i:s')}}</span>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table_print">
                    <thead class="header_print">
                    <tr>
                        <th>#</th>
                        <th>{{app()->getLocale() == 'ar' ? 'اسم الشركة' : 'Office Name'}}</th>
                        <th>{{app()->getLocale() == 'ar' ? 'تاريخ انتهاء الاعتماد' : 'Date Finish Approval'}}</th>
                        <th>{{app()->getLocale() == 'ar' ? 'نوع الكراسة' : 'Book Type'}}</th>
                        <th>{{app()->getLocale() == 'ar' ? 'الفئة' : 'Category'}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $k => $company)
                        <tr>
                            <td>
                                {{$k+1}}
                            </td>
                            <td>
                                {{$company->office_name_ar ?? ''}}
                            </td>
                            <td>
                                @if($company->valid_for)
                                    {{Carbon\Carbon::parse(($company->valid_for ?? ''))->format('Y-m-d')}}
                                    <br/>
                                    {{Carbon\Carbon::parse(($company->valid_for ?? ''))->format('H:i')}}
                                @endif
                            </td>
                            <td>
                                {{$company->office_type->title_ar ?? ''}}
                            </td>
                            <td>
                                {{$company->classification_degree->title_ar ?? ''}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
