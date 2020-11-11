<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>{{__('violation.name')}}</th>
                    <th>{{__('settings.permissions')}}</th>
                    <th>عدد المستخدمين</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr id="role_{{$role->id}}">
                        <td>
                            {{$role->title}}
                        </td>
                        <td>
                            {{count($role->permissions)}}
                            {{__('settings.permission')}}
                        </td>
                        <td>
                            {{$role->users_count}}
                        </td>
                        <td>
                            <div class="btn-group">
                                @can('edit-role')
{{--                                <a href="{{route('getRoleUsers',['id'=>$role->id])}}" class="btn btn-success btn-sm m-0">--}}
{{--                                    <i class="la la-eye"></i>--}}
{{--                                </a>--}}
                                <a href="{{route('editRole',['id'=>$role->id])}}" class="btn btn-info btn-sm m-0">
                                    <i class="la la-edit"></i>
                                </a>
                                @endcan
                                @can('delete-role')
                                <button class="btn btn-danger btn-sm m-0" onclick="remove('{{$role->id}}')">
                                    <i class="la la-remove"></i>
                                </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
