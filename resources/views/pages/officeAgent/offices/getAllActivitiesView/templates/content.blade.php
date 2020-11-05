<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('office_agent.activity')}}</th>
                    <th width="20"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($activities as $activity)
                    <tr>
                        <td>{{$activity->id}}</td>
                        <td>{{$activity->title_ar ?? ''}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary btn-sm font-weight-bold"
                                   href="{{route('editAllActivitiesView',['id'=>$activity->id])}}">
                                    {{__('office_agent.getAllActivitiesPermissionsView')}}
                                </a>
                                <a class="btn btn-danger btn-sm font-weight-bold"
                                   href="{{route('getAllActivitiesDecisionsView',['id'=>$activity->id])}}">
                                    {{__('office_agent.getAllActivitiesDecisionsView')}}
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mb-5">
            {{--            {{$violations->appends(\request()->except(['page']))->render("pagination::bootstrap-4")}}--}}
        </div>
    </div>
</div>
