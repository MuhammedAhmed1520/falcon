<div class="container-fluid">
    {{Form::open([
    'method'=>'post',
        'route'=>['handleUpdataAllLocations',$governorate->id]
    ])}}
    <div class="row">
        <div class="col-md-4">
            <label class="font-weight-bold">{{__('office_agent.government')}} (AR)</label>
            <input type="text" class="form-control" name="title_ar" value="{{$governorate->title_ar ?? ''}}">
            <span class="text-danger">{{$errors->first('title_ar') ?? ''}}</span>
            <span class="text-danger">{{$errors->first('cities') ?? ''}}</span>

        </div>
        <div class="col-md-4">
            <label class="font-weight-bold">{{__('office_agent.government')}} (EN)</label>
            <input type="text" class="form-control" name="title_en" value="{{$governorate->title_en ?? ''}}">
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
                @foreach($governorate->cities as $k => $city)
                    <tr>
                        <td>
                            <button class="btn btn-danger btn-sm remove_btn pr-3" type="button">
                                <i class="la la-remove"></i>
                            </button>
                        </td>
                        <td>
                            <input type="hidden" class="form-control" name="cities[{{$k}}][governorate_id]" value="{{$governorate->id}}">
                            <input type="hidden" class="form-control" name="cities[{{$k}}][id]" value="{{$city->id}}">
                            <input type="text" class="form-control" name="cities[{{$k}}][title_ar]"
                                   value="{{$city->title_ar}}"
                                   autocomplete="off" required/>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="cities[{{$k}}][title_en]"
                                   value="{{$city->title_en}}"
                                   autocomplete="off" required/>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <button class="btn btn-primary">
                {{__('office_agent.edit')}}
            </button>
        </div>
    </div>
    {{Form::close()}}
</div>

