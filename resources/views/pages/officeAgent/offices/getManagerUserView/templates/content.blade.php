<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('office_agent.management')}}</th>
                    <th>{{__('office_agent.username')}}</th>
                    <th>{{__('office_agent.start_date')}}</th>
                    <th>{{__('office_agent.end_date')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_users as $user)
                    <tr id="violation_{{$user->id}}">
                        <td>{{$user->id}}</td>
                        <td>{{$user->departments->first()->title_ar ?? ''}}</td>
                        <td>{{$user->name ?? ''}} {{$user->username ?? ''}}</td>
                        <td>
                            <input type="text" class="form-control date" name="start_date">
                        </td>
                        <td>
                            <input type="text" class="form-control date" name="end_date">
                        </td>
                        <td>
                            @if($user->pivot->authorized ?? null)
                                <button class="btn btn-danger" onclick="changeState('{{$user->id}}')">
                                    <i class="la la-user"></i>
                                </button>
                            @else
                                <button class="btn btn-info" onclick="changeState('{{$user->id}}')">
                                    <i class="la la-user"></i>
                                </button>
                            @endif
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
