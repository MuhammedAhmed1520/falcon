<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{Form::open([
                'method'=>'post',
                'enctype'=>'multipart/form-data',
                'route'=>['handleRequestRejectCertifyView',request()->id],
            ])}}

            <div class="row">
                <div class="col-md-3">
                    <label>{{__('office_agent.from_date')}}</label>
                    <input type="text" class="form-control date" name="from" value="{{old('from')}}">
                    <div class="text-danger">{{$errors->first('from')}}</div>
                </div>
                <div class="col-md-3">
                    <label>{{__('office_agent.to_date')}}</label>
                    <input type="text" class="form-control date" name="to" value="{{old('to')}}">
                    <div class="text-danger">{{$errors->first('to')}}</div>
                </div>
                <div class="col-md-3">
                    <label>{{__('office_agent.file')}}</label>
                    <input type="file" class="form-control" name="file">
                    <div class="text-danger">{{$errors->first('file')}}</div>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-12">
                    <label>{{__('office_agent.reason')}}</label>
                    <textarea class="form-control" name="notes" rows="3">{{old('notes')}}</textarea>
                    <div class="text-danger">{{$errors->first('notes')}}</div>
                </div>
                <div class="col-md-12 mt-3">
                    <button class="btn btn-primary">
                        {{__('office_agent.add')}}
                    </button>
                </div>
            </div>

            {{Form::close()}}
        </div>
        <div class="col-md-12 mt-3">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{__('office_agent.from_date')}}</th>
                    <th>{{__('office_agent.to_date')}}</th>
                    <th>{{__('office_agent.file')}}</th>
                    <th width="500">{{__('office_agent.reason')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($officeInactive as $office)
                    <tr>
                        <td>{{$office->from}}</td>
                        <td>{{$office->to}}</td>
                        <td>
                            @if($office->file_path)
                                <a href="{{$office->file_path}}">
                                    {{__('office_agent.download')}}
                                </a>
                            @endif
                        </td>
                        <td>{{$office->notes}}</td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteStopCertify('{{$office->id}}')">
                                <i class="la la-remove"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
