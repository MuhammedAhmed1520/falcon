<div class="row">
    <div class="col-md-12 mt-3">
        {{Form::open([
            'method'=>'post',
            'route'=>['adminOfficeAgentAddStudy',request()->id],
            'id'=>'adminOfficeAgentAddStudyForm'
        ])}}
        <div class="row">
            <div class="col-md-3">
                <label class="font-weight-bold text-black">الدراسة</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col-md-3">
                <label class="font-weight-bold text-black">{{__('office_agent.file')}}</label>
                <input class="form-control" type="file" name="file">
            </div>
            <div class="col-md-12">
                <label class="font-weight-bold text-black">{{__('office_agent.notes')}}</label>
                <input type="text" class="form-control" name="notes">
            </div>
            <div class="col-md-12 mt-3">

                @if(request()->route()->getName() == 'getRequestOrdersView')
                    <button class="btn btn-primary">
                        {{__('office_agent.add')}}
                    </button>
                @endif
            </div>
        </div>
        {{Form::close()}}
    </div>
    <div class="col-md-12 mt-3">
        <hr>
        <h4 class="font-weight-bold text-black">
            <i class="icon icon-paperclip"></i>
            {{__('office_agent.study_attachment')}}
        </h4>
    </div>
        @if(count($office_agent->studies))
            <button type="button" class="btn btn-info mr-1 ml-1 float-right" data-toggle="modal"
                    data-target="#files_viewer_modal"
                    onclick="addFilesViewer('{{$office_agent->studies ?? []}}')">
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
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($office_agent->studies as $study)
                <tr id="all_study_table_{{$study->id}}">
                    <td>{{$study->id}}</td>
                    <td>{{$study->name}}</td>
                    <td>{{$study->notes }}</td>
                    <td>
                        <a href="{{$study->file_path}}">
                            {{__('office_agent.download')}}
                        </a>
                    </td>
                    <td>
                        @if(request()->route()->getName() == 'getRequestOrdersView')
                            @can('edit-office-studies')
                            <a class="btn btn-danger" href="javascript:deleteStudy('{{$study->id}}')">
                                <i class="la la-trash mr-0"></i>
                            </a>
                            @endcan()
                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>
</div>
