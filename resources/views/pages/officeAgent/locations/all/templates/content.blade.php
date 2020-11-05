<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('office_agent.government')}}</th>
                    <th>{{__('office_agent.city_count')}}</th>
                    <th width="50"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($governorates as $governrate)
                    <tr>
                        <td>{{$governrate->id}}</td>
                        <td>{{$governrate['translated']['name'] ?? ''}}</td>
                        <td>{{count($governrate->cities ?? [])}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('editAllLocations',['id'=>$governrate->id])}}"
                                   aria-label="{{__('office_agent.edit')}}"
                                   class="btn btn-info tooltips">
                                    <i class="la la-edit"></i>
                                </a>
                                <button class="btn btn-danger" onclick="removeGov('{{$governrate->id}}')">
                                    <i class="la la-remove"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
