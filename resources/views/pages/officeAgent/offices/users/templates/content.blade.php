<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{Form::open([
                'method'=>'post',
                'route'=>'handleAttachUsers'
            ])}}
            <div class="row">
                <div class="col-md-12">
                    @can('create-user')
                        <a class="btn btn-warning font-weight-bold mb-4"
                           href="{{route('addUsers')}}">{{__('sidebar.add_user')}}</a>
                    @endcan
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">{{__('office_agent.management')}}</label>
                    <select name="department_id" class="form-control">
                        @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->title_ar ?? ''}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">{{$errors->first('department_id')}}</div>
                </div>
                <div class="col-md-8">
                    <label class="font-weight-bold">{{__('office_agent.username')}}</label>
                    <select name="user_ids[]"  class="form-control select2">
                        @foreach($users  as $user)
                            <option value="{{$user->id}}">{{$user->username ?? ''}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">{{$errors->first('user_ids')}}</div>
                </div>
                <div class="col-md-10 mt-3">
                    <button class="btn btn-primary">
                        {{__('office_agent.add')}}
                    </button>
                </div>
            </div>

            {{Form::close()}}
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('office_agent.management')}}</th>
                    <th>{{__('office_agent.username')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_users as $user)
                    <tr id="violation_{{$user->id}}">
                        <td>{{$user->id}}</td>
                        <td>{{$user->department->title_ar ?? ''}}</td>
                        <td>{{$user->user->name ?? ''}}</td>
                        <td>
                            <button class="btn btn-danger" onclick="removeUser('{{$user->id}}')">
                                <i class="la la-remove"></i>
                            </button>
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
