<div class="row">
    <div class="col-md-12">
        {{--        <hr>--}}
        <h4 class="font-weight-bold text-black">
            <i class="icon icon-archive"></i>
            {{__('office_agent.devices')}}
        </h4>
    </div>
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="all_installment_table">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('office_agent.device')}}</th>
                <th>{{__('office_agent.number')}}</th>
                <th>{{__('office_agent.serial')}}</th>
            </tr>
            </thead>
            <tbody>

            @foreach($office_agent['devices'] as $device)
                <tr id="all_installment_table_{{$device['id'] ?? ''}}">
                    <td>{{$device['id'] ?? ''}}</td>
                    <td>{{$device['device_type']['name'] ?? ''}} {{$device['device_others'] ?? ''}}</td>
                    <td>{{$device['number'] ?? ''}}</td>
                    <td>{{$device['serial'] ?? ''}}</td>
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
        @if(count($office_agent['devices_attachments'] ?? []))
            <button type="button" class="btn btn-info mr-1 ml-1 float-right" data-toggle="modal"
                    data-target="#files_viewer_modal"
                    onclick="addFilesViewer('{{collect($office_agent['devices_attachments'] ?? [])}}')">
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
            </tr>
            </thead>
            <tbody>
            @foreach($office_agent['devices_attachments'] as $devices_attachment)
                <tr id="all_installment_attachment_{{$devices_attachment['id']}}">
                    <td>{{$devices_attachment['id']}}</td>
                    <td>{{$devices_attachment['device']['device_type']['name'] ?? ''}}</td>
                    <td>{{$devices_attachment['file_type']['title_ar'] ?? ''}}
                        <a href="{{$devices_attachment['file_path'] ?? ''}}">{{__('office_agent.download')}}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
