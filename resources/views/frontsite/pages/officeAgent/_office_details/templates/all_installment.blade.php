<div class="row mt-4">
    <div class="col-md-12">
        {{--        <hr>--}}
        <h4 class="font-weight-bold text-black">
            <i class="icon icon-archive"></i>
            الاجهزة والمعدات
        </h4>
        @if(checkSendAllowed($office_agent))
            <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                    onclick="resetToAddInsatllment()" id="installment_add_modal_btn"
                    data-target="#installment_add_modal">
                اضافة جهاز
            </button>
        @endif
    </div>
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="all_installment_table">
            <thead>
            <tr>
                <th>#</th>
                <th>الجهاز</th>
                <th>العدد</th>
                <th>الرقم التسلسلي</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($office_agent->devices as $device)
                <tr id="all_installment_table_{{$device->id}}">
                    <td>{{$device->id  ?? ''}}</td>
                    <td>{{$device->device_type->name ?? ''}} {{$device->device_others ?? ''}}</td>
                    <td>{{$device->number ?? ''}}</td>
                    <td>{{$device->serial ?? ''}}</td>
                    <td>
                        @if(checkSendAllowed($office_agent))
                            <button class="btn btn-info"
                                    id="device_row_{{$device->id}}"
                                    onclick="editInstallment('{{$device}}')">
                                <i class="icon icon-edit mr-0"></i>
                            </button>
                            <button class="btn btn-danger"
                                    onclick="deleteInstallment('{{$device->id}}')">
                                <i class="icon icon-trash mr-0"></i>
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="row mt-4">
    <div class="col-md-12">
        <hr>
        <h4 class="font-weight-bold text-black">
            <i class="icon icon-paperclip"></i>
            مرفقات الاجهزة و المعدات
        </h4>
        @if(checkSendAllowed($office_agent))
            <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                    data-target="#installment_attachment_modal">
                اضافة مرفقات
            </button>
        @endif
    </div>
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="installment_attachment_table">
            <thead>
            <tr>
                <th>#</th>
                <th>الجهاز</th>
                <th>الملف</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($office_agent->devices_attachments as $devices_attachment)
                <tr id="all_installment_attachment_{{$devices_attachment->id}}">
                    <td>{{$devices_attachment->id}}</td>
                    <td>{{$devices_attachment->device->device_type->name ?? ''}}</td>
                    <td>{{$devices_attachment->file_type->title_ar ?? ''}}
                        <a href="{{$devices_attachment->file_path}}">تنزيل</a>
                    </td>
                    <td>
                        @if(checkSendAllowed($office_agent))
                            <button class="btn btn-danger" onclick="deleteInstallmentFile('{{$devices_attachment->id
                        }}')">
                                <i class="icon icon-trash mr-0"></i>
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
