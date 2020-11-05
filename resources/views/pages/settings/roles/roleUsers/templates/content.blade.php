<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h3>
                المستخدمين الخاصين ب <strong>{{$role->title}}</strong>
            </h3>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th width="20">#</th>
                    <th>{{__('violation.name')}}</th>
                    <th>{{app()->getLocale() == 'ar' ? "اسم المستخدم" : "username"}}</th>
                    {{--<th></th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($role->users as $user)
                    <tr id="role_{{$user->id}}">
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <b>{{$user->name}}</b>

                        </td>
                        <td>
                            <b>{{$user->username}}</b>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
