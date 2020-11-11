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
                    <th>البريد الالكتروني</th>
                    <th>رقم الهاتف</th>
                    <th>نوع الطلب</th>
                    <th>نوع الصقر</th>
                    <th>فئة الصقر</th>
                    <th>الحالة</th>
                    <th width="20"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($falcons as $falcon)
                    <tr id="user_{{$falcon->id}}">
                        <td>{{$loop->iteration}}</td>
                        <td>
                            {{$falcon->P_O_A_NAME}}
                        </td>
                        <td>
                            {{$falcon->P_O_MAIL}}
                        </td>
                        <td>
                            {{$falcon->P_O_MOBILE}}
                        </td>
                        <td>
                            {{$falcon->type->label ?? ''}}
                        </td>
                        <td>
                            {{$falcon->fal_type->label ?? ''}}
                        </td>
                        <td>
                            {{$falcon->P_FAL_SPECIES}}
                        </td>
                        <td>
                            {{$falcon->P_STATUS_MSG}}
                        </td>
                        <td>
                            <div class="btn-group">
                                @can('show-civil')
                                    <a href="{{route('editCivilian',['id'=>$falcon->id])}}"
                                       class="btn btn-warning btn-sm m-0">
                                        <i class="la la-edit"></i>
                                    </a>
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
