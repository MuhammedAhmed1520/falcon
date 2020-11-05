{{--<div class="row">--}}
{{--    <div class="col-md-12 mt-3">--}}
{{--        {{Form::open([--}}
{{--            'method'=>'post',--}}
{{--            'route'=>['adminOfficeAgentAddStudy',request()->id],--}}
{{--            'id'=>'adminOfficeAgentAddStudyForm'--}}
{{--        ])}}--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-3">--}}
{{--                <label class="font-weight-bold text-black">اسم الملف</label>--}}
{{--                <input type="text" class="form-control" name="name">--}}
{{--            </div>--}}
{{--            <div class="col-md-3">--}}
{{--                <label class="font-weight-bold text-black">الملف</label>--}}
{{--                <input class="form-control" type="file" name="file">--}}
{{--            </div>--}}
{{--            <div class="col-md-12">--}}
{{--                <label class="font-weight-bold text-black">ملاحظات</label>--}}
{{--                <input type="text" class="form-control" name="notes">--}}
{{--            </div>--}}
{{--            <div class="col-md-12 mt-3">--}}
{{--                <button class="btn btn-primary">--}}
{{--                    اضافة--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        {{Form::close()}}--}}
{{--    </div>--}}
{{--    <div class="col-md-12 mt-3">--}}
{{--        <hr>--}}
{{--        <h4 class="font-weight-bold text-black">--}}
{{--            <i class="icon icon-paperclip"></i>--}}
{{--            المرفقات--}}
{{--        </h4>--}}
{{--    </div>--}}
{{--    <div class="col-md-12 mt-4">--}}
{{--        <table class="table table-ressponsive" id="archives_attachment_table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>#</th>--}}
{{--                <th>اسم الملف</th>--}}
{{--                <th>ملاحظات</th>--}}
{{--                <th>الملف</th>--}}
{{--                <th></th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}

{{--            @foreach($office_agent->studies as $study)--}}
{{--                <tr id="all_study_table_{{$study->id}}">--}}
{{--                    <td>{{$study->id}}</td>--}}
{{--                    <td>{{$study->name}}</td>--}}
{{--                    <td>{{$study->notes }}</td>--}}
{{--                    <td>--}}
{{--                        <a href="{{$study->file_path}}">--}}
{{--                            تنزيل--}}
{{--                        </a>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <a class="btn btn-danger" href="javascript:deleteStudy('{{$study->id}}')">--}}
{{--                            <i class="la la-trash mr-0"></i>--}}
{{--                        </a>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}

{{--            </tbody>--}}
{{--        </table>--}}

{{--    </div>--}}
{{--</div>--}}
