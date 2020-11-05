<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{Form::open([
                'method'=>'post',
                'enctype'=>'multipart/form-data',
                'route'=>['handleAllActivitiesDecisionsRequest',request()->id],
            ])}}
            <div class="row">
                <div class="col-md-4">
                    <label class="font-weight-bold">{{__('office_agent.name')}}</label>
                    <div class="input-group ">
{{--                        <div class="input-group-prepend">--}}
{{--                            <span class="input-group-text" id="basic-addon1">اقرار</span>--}}
{{--                        </div>--}}
                        <input type="text" class="form-control" name="title" autocomplete="off"
                               value="{{old('title')}}">
                    </div>
                    <span class="text-danger">{{$errors->first('title') ?? ''}}</span>
                </div>
                <div class="col-md-4">
                    <label class="font-weight-bold">{{__('office_agent.file')}}</label>
                    <input type="file" class="form-control" name="file">
                    <span class="text-danger">{{$errors->first('file') ?? ''}}</span>
                </div>
                <div class="col-md-12 mt-2">
                    <button class="btn btn-primary">
                        {{__('office_agent.add')}}
                    </button>
                </div>
            </div>
            {{Form::close()}}
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th></th>
                    <th></th>
                    <th width="20"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($decisions as $decision)
                    <tr>
                        <td>{{$decision->id}}</td>
                        <td>{{$decision->title ?? ''}}</td>
                        <td>
                            <a href="{{$decision->file ?? ''}}" download="">
                                <i class="la la-download"></i>
                                {{__('office_agent.download')}}
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="deleteDecision('{{$decision->id}}')">
                                <i class="la la-remove"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mb-5">
            {{--            {{$violations->appends(\request()->except(['page']))->render("pagination::bootstrap-4")}}--}}
        </div>
    </div>
</div>
