<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('office_agent.company_name')}}</th>
                    <th>{{__('office_agent.username')}}</th>
                    <th>{{__('office_agent.email')}}</th>
                    <th>{{__('office_agent.type')}}</th>
                    @can('show-office-password')
                        <th>{{__('office_agent.password')}}</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($officeUsers as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->office_agent->office_name_ar ?? ''}}</td>
                        <td>{{$user->user_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->office_agent->office_type->title_ar ?? ''}}</td>
                        @can('show-office-password')
                            <td>{{$user->plain_password}}</td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mb-5">
            {{--                        {{$officeUsers->appends(\request()->except(['page']))->render("pagination::bootstrap-4")}}--}}
        </div>
    </div>
</div>
