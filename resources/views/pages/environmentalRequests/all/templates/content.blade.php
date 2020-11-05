<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="bg-gray mb-2 p-1">
                    <div class="row">
                        <div class="col-md-4">
                            <b>{{__('violation.date_range')}}</b>
                            <input type="text" class="date-range form-control">
                            <input type="hidden" name="start_date">
                            <input type="hidden" name="end_date">
                        </div>
                        <div class="col-md-4">
                            <b>{{__('violation.query')}}</b>
                            <input type="text" name="key" class="form-control" value="{{ request()->get('key')}}">
                        </div>
                        <div class="col-md-12 text-left mt-2 mb-2">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-sm btn-info m-0">
                                    {{__('violation.filter')}}
                                </button>
                                <button type="reset" class="btn btn-sm btn-danger m-0">
                                    {{__('violation.reset')}}
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
                    <th>الاسم</th>
                    <th>عنوان البحث</th>
                    <th>جهة العمل</th>
                    <th>الهاتف</th>
                    <th>البريد الالكتروني</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($environmentalRequests as  $environmentalRequest)
                    <tr id="tender_{{$environmentalRequest->id}}">
                        <td>{{$environmentalRequest->id }}</td>

                        <td>
                            {{$environmentalRequest->researcher_name}}
                        </td>
                        <td>
                            {{$environmentalRequest->search_title}}
                        </td>
                        <td>
                            {{$environmentalRequest->researcher_work}}
                        </td>
                        <td>
                            {{$environmentalRequest->researcher_phone}}
                        </td>
                        <td>
                            {{$environmentalRequest->researcher_email}}
                        </td>

                        <td>
                            <div class="btn-group direction">
                                @can('edit-environmental')
                                    <a href="{{route('editEnvironmentalRequests',['token'=>$environmentalRequest->token])}}"
                                       class="btn btn-info btn-sm m-0 tooltips"
                                       aria-label="{{__('tenders.edit')}}">
                                        <i class="la la-edit"></i>
                                    </a>
                                @endcan
                                @can('delete-environmental')
                                    <button onclick="deleteRow('{{$environmentalRequest->id}}')"
                                            class="btn btn-danger btn-sm m-0">
                                        <i class="la la-close"></i>
                                    </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mb-5">
            {{$environmentalRequests->appends(request()->input())->render('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
