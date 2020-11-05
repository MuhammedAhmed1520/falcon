<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('office_agent.as_office_name')}}</th>
                    <th>{{__('office_agent.as_entity_name')}}</th>
                    <th>{{__('office_agent.en_office_name')}}</th>
                    <th>{{__('office_agent.read_at')}}</th>
                    <th width="50"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->office_name}}</td>
                        <td>{{$order->entity_name}}</td>
                        <td>{{$order->en_office_name }}</td>
                        <td>{{$order->read_at}}</td>
                        <td>
                            <a class="btn btn-info btn-sm"
                               href="{{route('showOfficeAsbestosOrder',['id'=>$order->id])}}">
                                <i class="la la-edit"></i>
                            </a>
                            @can('delete-asbestos')
                            <button class="btn btn-danger btn-sm" onclick="removeAsbest('{{$order->id}}')"><i class="la la-remove"></i></button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mb-5">
            {{$orders->appends(\request()->except(['page']))->render("pagination::bootstrap-4")}}
        </div>
    </div>
</div>
