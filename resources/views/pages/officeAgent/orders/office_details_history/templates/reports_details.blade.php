<div class="row">
    <div class="col-md-12 mt-3">
        <h4 class="font-weight-bold text-black">
            <i class="icon icon-paperclip"></i>
            {{__('office_agent.study_attachment')}}
        </h4>
    </div>
        @if(count($office_agent['studies'] ?? []))
            <button type="button" class="btn btn-info mr-1 ml-1 float-right" data-toggle="modal"
                    data-target="#files_viewer_modal"
                    onclick="addFilesViewer('{{$office_agent['studies'] ?? []}}')">
                تصفح المرفقات
            </button>
        @endif
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="reports_attachment_table">
            <thead>
            <tr>
                <th>#</th>
                <th>الدراسة</th>
                <th>{{__('office_agent.notes')}}</th>
                <th>{{__('office_agent.file')}}</th>
            </tr>
            </thead>
            <tbody>

            @foreach($office_agent['studies'] as $study)
                <tr id="all_study_table_{{$study['id']}}">
                    <td>{{$study['id'] ?? ''}}</td>
                    <td>{{$study['name'] ?? ''}}</td>
                    <td>{{$study['notes'] ?? '' }}</td>
                    <td>
                        <a href="{{$study['file_path'] ?? ''}}">
                            {{__('office_agent.download')}}
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>
</div>
