<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <form action="">
                <b>{{__('violation.query')}}</b>
                <input type="text" name="key" class="form-control" value="{{ request()->get('key')}}" autocomplete="off">
                <br>
                <button type="submit" class="btn btn-sm btn-info m-0">
                    {{__('violation.filter')}}
                </button>
                <button type="reset" class="btn btn-sm btn-danger m-0">
                    {{__('violation.reset')}}
                </button>

            </form>
        </div>
        <div class="col-md-12">

            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('tenders.tender_no')}}</th>
                    <th>{{__('tenders.title')}}</th>
                    <th>{{__('tenders.opening_date')}}</th>
                    <th>{{__('tenders.closing_date')}}</th>
                    <th>{{__('tenders.meeting_date')}}</th>
                    <th>{{__('tenders.price')}}</th>
                    <th>{{__('tenders.insurance')}}</th>
                    <th>{{__('tenders.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tenders as $tender)
                    <tr id="tender_{{$tender->id}}">
                        <td>{{$tender->id}}</td>
                        <td>{{$tender->number}}</td>
                        <td>{{$tender->title_ar}}</td>
                        <td>{{$tender->open_date}}</td>
                        <td>{{$tender->last_app_date}}</td>
                        <td>{{$tender->meeting_date}}</td>
                        <td>{{$tender->price}}</td>
                        <td>{{$tender->insurance ?? 0 }}%</td>
                        <td>

                            <div class="btn-group direction">
                                @can('all-buyer-tender')
                                <a href="{{route('getTenderBuyersView',['id'=>$tender->id])}}"
                                   class="btn btn-warning btn-sm m-0 tooltips" aria-label="{{__('tenders.buyers')}}">
                                    <i class="la la-users"></i>
                                </a>
                                @endcan
                                @can('all-application-tender')
                                <a href="{{route('getTenderApplicationsView',['id'=>$tender->id])}}"
                                   class="btn btn-primary btn-sm m-0 tooltips"
                                   aria-label="{{__('tenders.applications')}}">
                                    <i class="la la-question"></i>
                                </a>
                                @endcan
                                @can('select-tender-winner')
                                    <a style="margin-left: 10px !important;" href="{{route('getSelectWinnersView',['id'=>$tender->id])}}"
                                       class="btn btn-success btn-sm m-0 tooltips"
                                       aria-label="{{__('tenders.select_winner')}}">
                                        <i class="la la-database"></i>
                                    </a>
                                @endcan

                                @can('all-files-tender')
                                <a href="{{route('getTenderFilesView',['id'=>$tender->id])}}"
                                   class="btn btn-dark btn-sm m-0 tooltips" aria-label="{{__('tenders.files')}}">
                                    <i class="la la-files-o"></i>
                                </a>
                                @endcan
                                @can('postpone-tender')
                                <a href="{{route('getTenderPostponeView',['id'=>$tender->id])}}"
                                   class="btn btn-outline-dark  btn-sm m-0 tooltips" aria-label="{{__('tenders.postpone')}}">
                                    <i class="la la-calendar-times-o"></i>
                                </a>
                                @endcan
                                @can('edit-tender')
                                <a href="{{route('editTender',['id'=>$tender->id])}}"
                                   class="btn btn-info btn-sm m-0 tooltips"
                                   aria-label="{{__('tenders.edit')}}">
                                    <i class="la la-edit"></i>
                                </a>
                                @endcan
                                @can('delete-tender')
                                <button class="btn btn-danger btn-sm m-0 tooltips" onclick="remove('{{$tender->id}}')"
                                        aria-label="{{__('tenders.delete')}}">
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
            {{$tenders->appends(request()->input())->render('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
