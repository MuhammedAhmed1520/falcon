<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <label>{{__('office_agent.query')}}</label>
                <input type="text" class="form-control col-md-4" name="query" value="{{request()->get('query')}}">
                <button class="btn btn-primary">
                    <i class="la la-search"></i>
                </button>
            </form>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th width="20">#</th>
                    <th>الاسم</th>
                    <th>رقم الجواز</th>
                    <th>تاريخ انتهاء البطاقة المدنية</th>
                    <th>البريد الالكتروني</th>
                    <th>رقم الهاتف</th>
                    <th>العنوان</th>
                    <th width="20"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr id="user_{{$user->id}}">
                        <td>{{$loop->iteration}}</td>
                        <td>
                            {{$user->P_O_A_NAME}}
                        </td>
                        <td>
                            {{$user->P_O_PASSPORT_NO}}
                        </td>
                        <td>
                            {{$user->P_CIVIL_EXPIRY_DT}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            {{$user->P_O_MOBILE}}
                        </td>
                        <td>
                            {{$user->P_O_ADDRESS}}
                        </td>
                        <td>
                            <div class="btn-group">
                                {{--                                <a href="{{route('editUser',['id'=>$user->id])}}" class="btn btn-info btn-sm m-0">--}}
                                {{--                                    <i class="la la-edit"></i>--}}
                                {{--                                </a>--}}
                                {{--                                <button class="btn btn-danger btn-sm m-0" onclick="removeUser('{{$user->id}}')">--}}
                                {{--                                    <i class="la la-remove"></i>--}}
                                {{--                                </button>--}}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mb-5">
            {{$users->appends(\request()->except(['page']))->render("pagination::bootstrap-4")}}
        </div>
    </div>
</div>
