<div class="row">
    <div class="col-md-3">
        <label class="font-weight-bold text-black">رقم الطلب</label>
        <input type="text" class="form-control" value="{{$office_agent->order_serial ?? ''}}" disabled>
    </div>
    <div class="col-md-5">
        <label class="font-weight-bold text-black">حالة الطلب</label>
        <input type="text" class="form-control" disabled value="{{$office_agent->last_processes->first()->status->name ?? ''}}">
    </div>
    <div class="col-md-2">
        <label class="font-weight-bold text-black">تاريخ الطلب</label>
        <input type="text" class="form-control" value="{{$office_agent->endorse_at ?? ''}}" disabled>
    </div>
    <div class="col-md-2">
        <label class="font-weight-bold text-black">نوع الطلب</label>
        <input type="text" class="form-control" disabled value="{{$office_agent->office_order_type->name ?? ''}}">
    </div>
    <div class="col-md-12 mt-1">
        <label class="font-weight-bold text-black"> تعليق الهيئة</label>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>التعليق</th>
                <th>تاريخ التعليق</th>
                <th>الحالة</th>
                <th>حالة الطلب</th>
            </tr>
            </thead>
            <tbody>

            @foreach($office_agent->last_processes as $process)
                <tr>
                    <td>{{$process->comment}}</td>
                    <td>{{$process->created_at}}</td>
                    <?php
                    $class = 'badge-primary';
                    if (($process->status_id ?? null) == 2) {

                        $class = 'badge-danger';
                    }
                    if (($process->status_id ?? null) == 3) {

                        $class = 'badge-warning';
                    }
                    if (($process->status_id ?? null) == 4) {

                        $class = 'badge-success';
                    }
                    ?>
                    <td class="font-weight-bold">
                        <span class="badge {{$class}}">{{$process->status->name ?? ''}}</span>
                    </td>
                    <td>{{$office_agent->order_status->name ?? $office_agent->last_process->status->name ?? ''}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <hr>
    </div>
</div>
