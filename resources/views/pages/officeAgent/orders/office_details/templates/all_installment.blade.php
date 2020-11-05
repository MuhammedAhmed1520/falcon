<div class="row">
    <div class="col-md-12">
        {{--        <hr>--}}
        <h4 class="font-weight-bold text-black">
            <i class="icon icon-archive"></i>
            {{__('office_agent.devices')}}
        </h4>
        @if(request()->route()->getName() == 'getRequestOrdersView')
            @can('edit-office-device')
                <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                        onclick="resetToAddInsatllment()" id="installment_add_modal_btn"
                        data-target="#installment_add_modal">
                    {{__('office_agent.add')}}
                </button>
            @endcan
        @endif
    </div>
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="all_installment_table">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('office_agent.device')}}</th>
                <th>{{__('office_agent.number')}}</th>
                <th>{{__('office_agent.serial')}}</th>
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
                        @if(request()->route()->getName() == 'getRequestOrdersView')
                            @can('edit-office-device')
                                <button class="btn btn-info"
                                        id="device_row_{{$device->id}}"
                                        onclick="editInstallment('{{$device}}')">
                                    <i class="la la-edit mr-0"></i>
                                </button>
                            @endcan
                            @can('edit-office-device')
                                <button class="btn btn-danger"
                                        onclick="deleteInstallment('{{$device->id}}')">
                                    <i class="la la-remove mr-0"></i>
                                </button>
                            @endcan
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
            {{__('office_agent.installment_attachment')}}
        </h4>

        @if(request()->route()->getName() == 'getRequestOrdersView')
            @can('edit-office-device')
                <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                        data-target="#installment_attachment_modal">
                    {{__('office_agent.add')}}
                </button>
            @endcan
        @endif
        @if(count($office_agent->devices_attachments))
            <button type="button" class="btn btn-info mr-1 ml-1 float-right" data-toggle="modal"
                    data-target="#files_viewer_modal"
                    onclick="addFilesViewer('{{$office_agent->devices_attachments ?? []}}')">
                تصفح المرفقات
            </button>
        @endif
    </div>
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="installment_attachment_table">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('office_agent.device')}}</th>
                <th>{{__('office_agent.file')}}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($office_agent->devices_attachments as $devices_attachment)
                <tr id="all_installment_attachment_{{$devices_attachment->id}}">
                    <td>{{$devices_attachment->id}}</td>
                    <td>{{$devices_attachment->device->device_type->name ?? ''}}</td>
                    <td>{{$devices_attachment->file_type->title_ar ?? ''}}
                        <a href="{{$devices_attachment->file_path}}">{{__('office_agent.download')}}</a>
                    </td>
                    <td>

                        @if(request()->route()->getName() == 'getRequestOrdersView')
                            @can('edit-office-device')
                                <button class="btn btn-danger" onclick="deleteInstallmentFile('{{$devices_attachment->id
                        }}')">
                                    <i class="la la-remove mr-0"></i>
                                </button>
                            @endcan
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
