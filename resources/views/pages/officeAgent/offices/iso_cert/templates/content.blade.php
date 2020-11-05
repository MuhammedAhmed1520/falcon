<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
            {{Form::open([
                'method'=>'post',
                'route'=>'handleIsoCertRequest'
            ])}}
            <div class="row">
                <div class="col-md-4">
                    <label class="font-weight-bold">{{__('office_agent.name')}}</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
                <div class="col-md-8">
                    <label class="font-weight-bold">{{__('office_agent.activities')}}</label>
                    <select name="activity_ids[]" class="form-control select2" multiple>
                        @foreach($activities as $activity)
                            <option value="{{$activity->id}}">{{$activity->title_ar}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{$errors->first('activity_ids')}}</span>
                </div>
                <div class="col-md-12 mt-2">
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
                    <th>{{__('office_agent.name')}}</th>
                    <th>{{__('office_agent.activities')}}</th>
                    <th width="20"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($isos as $iso)
                    <tr>
                        <td>
                            {{$iso->name}}
                        </td>
                        <td>
                            @foreach($iso->activities->pluck('title_ar') as $title)
                                {{$title}}
                                @if(!$loop->last)
                                    |
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="deleteIso('{{$iso->id}}')">
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
