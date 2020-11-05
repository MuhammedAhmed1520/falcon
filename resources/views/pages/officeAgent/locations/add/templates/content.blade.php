<div class="container-fluid">
    {{Form::open([
    'method'=>'post',
        'route'=>'handleCreateAllLocations'
    ])}}
    <div class="row">
        <div class="col-md-4">
            <label class="font-weight-bold">{{__('office_agent.government')}} (AR)</label>
            <input type="text" class="form-control" name="title_ar">
            <span class="text-danger">{{$errors->first('title_ar') ?? ''}}</span>
            <span class="text-danger">{{$errors->first('cities') ?? ''}}</span>
        </div>
        <div class="col-md-4">
            <label class="font-weight-bold">{{__('office_agent.government')}} (EN)</label>
            <input type="text" class="form-control" name="title_en">
            <span class="text-danger">{{$errors->first('title_en') ?? ''}}</span>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th width="50">
                        <button class="btn btn-primary" type="button" onclick="addRow()">
                            <i class="la la-plus"></i>
                        </button>
                    </th>
                    <th>{{__('office_agent.city')}} (AR)</th>
                    <th>{{__('office_agent.city')}} (EN)</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <button class="btn btn-primary">
                {{__('office_agent.add')}}
            </button>
        </div>
    </div>
    {{Form::close()}}
</div>

