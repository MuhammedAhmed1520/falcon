<div class="row">
    <div class="col-md-3">
        <label class="font-weight-bold text-black">رقم الطلب</label>
        <input type="text" class="form-control" value="{{$office_agent->order_serial ?? ''}}" disabled>
    </div>
    <div class="col-md-5">
        <label class="font-weight-bold text-black">حالة الطلب</label>
        <input type="text" class="form-control" disabled
               value="{{$office_agent->order_status->name ?? $office_agent->last_process->status->name ?? $office_agent->last_process->status_text ?? ''}}">
    </div>
    <div class="col-md-2">
        <label class="font-weight-bold text-black">تاريخ الطلب</label>
        <input type="text" class="form-control" value="{{$office_agent->endorse_at ?? ''}}" disabled>
    </div>
    <div class="col-md-2">
        <label class="font-weight-bold text-black">نوع الطلب</label>
        <input type="text" class="form-control" disabled value="{{$office_agent->office_order_type->title_ar ?? ''}}">
    </div>
    @if($office_agent->order_status_id == getOfficeFinalOpinion('complete_payment')->id)
        <div class="col-md-12 mt-2 mb-3" style="border: 1.5px dashed #aaa">
            <label class="font-weight-bold text-black"> الدفع</label>
            <p>
                تم الموافقة على الملفات والمعلومات المقدمة، يرجى دفع مبلغ
                <span class="text-danger font-weight-bold">({{$office_agent->certificate_type['cost'] ?? ''}})</span>
                لإستكمال إجراءات الطلب والإعتماد

            </p>
            <button class="btn btn-info mb-2"
                    onclick="addPayOfficeAgent('{{$office_agent->id}}','{{$office_agent->certificate_type['type'] ?? ''}}')">
                ادفع الان
            </button>
        </div>
    @endif
    <div class="col-md-12 mt-1">
        <label class="font-weight-bold text-black"> تعليق الهيئة</label>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="300px">التعليق</th>
                <th>تاريخ التعليق</th>
                <th>الحالة</th>
                <th>حالة الطلب</th>
            </tr>
            </thead>
            <tbody>

            @foreach($office_agent->last_processes as $process)
                <tr>
                    <td  width="300px">{{$process->comment}}</td>
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
@if((in_array($office_agent->order_status_id,[2,3,5]))
 || in_array($office_agent->office_order_type_id,[86]))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info" role="alert">
                <b>يرجى استكمال كافة البيانات المطلوبه ومن ثم الضغط على ذر ارسال الموجود بالاسفل</b>
            </div>
        </div>
    </div>
@endif
