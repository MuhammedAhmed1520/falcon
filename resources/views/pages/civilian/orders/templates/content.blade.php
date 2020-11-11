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
                    <th>اسم صاحب الصقر</th>
                    <th>فئة الصقر</th>
                    <th>رقم الشريحة</th>
                    <th>رقم الحلقة</th>
                    <th>نوع الطلب</th>
                    <th>نوع الصقر</th>
                    <th>بلد المنشأ</th>
                    <th>رقم ملحق سايتس</th>
                    <th>المستشفي</th>
                    <th>الحالة</th>
                </tr>
                </thead>
                <tbody>
                @foreach($falcons as $order)
                    <tr id="user_{{$order->id}}">
                        <td>{{$loop->iteration}}</td>
                        <td>
                            {{$order->P_O_A_NAME}}
                        </td>
                        <td>
                            {{$order->P_FAL_SPECIES}}
                        </td>
                        <td>
                            {{$order->P_FAL_PIT_NO}}
                        </td>
                        <td>
                            {{$order->P_FAL_RING_NO}}
                        </td>
                        <td>
                            {{$order->type->label ?? ''}}
                        </td>
                        <td>
                            {{$order->fal_type->label ?? ''}}
                        </td>
                        <td>
                            {{$order->origin_country->label ?? ''}}
                        </td>
                        <td>
                            {{$order->fal_city->label ?? ''}}
                        </td>
                        <td>
                            {{$order->hospital->label ?? ''}}
                        </td>
                        <td>
                            {{$order->P_STATUS_MSG ?? ''}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mb-5">
        </div>
    </div>
</div>
