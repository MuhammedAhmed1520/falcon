<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>{{__('violation.civil_name')}}</th>
                    <th>{{__('violation.civil_phone')}}</th>
                    <th>{{__('violation.email')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($officers as $officer)
                    <tr id="officer_{{$officer->id}}">
                        <td>
                            {{$officer->name}}
                        </td>
                        <td class="text-left" dir="ltr">
                            {{$officer->phone}}
                        </td>
                        <td>
                            {{$officer->email}}
                        </td>
                        <td>
                            <div class="btn-group">
                                @can('update-officer',auth()->user())
                                <a href="{{route('editOfficer',['id'=>$officer->id])}}" class="btn btn-info btn-sm m-0">
                                    <i class="la la-edit"></i>
                                </a>
                                @endcan
                                @can('delete-officer',auth()->user())
                                   <button class="btn btn-danger btn-sm m-0" onclick="remove('{{$officer->id}}')">
                                    <i class="la la-remove"></i>
                                   </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            {{$officers->render("pagination::bootstrap-4")}}
        </div>
    </div>
</div>
