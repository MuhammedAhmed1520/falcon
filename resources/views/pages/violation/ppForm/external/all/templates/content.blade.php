<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>{{__('violation.user')}}</th>
                    <th>{{__('violation.created_at')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($forms as $form)
                    <tr id="form_{{$form->id}}">
                        <td>
                            {{$form->user->name ?? ''}}
                        </td>
                        <td class="text-left" dir="ltr">
                            {{$form->created_at}}
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('editExternalPPForm',['id'=>$form->id])}}" class="btn btn-info btn-sm m-0">
                                    <i class="la la-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm m-0" onclick="remove('{{$form->id}}')">
                                    <i class="la la-remove"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            {{$forms->render("pagination::bootstrap-4")}}
        </div>
    </div>
</div>
