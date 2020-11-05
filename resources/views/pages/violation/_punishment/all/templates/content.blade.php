<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>{{__('violation.punishment_title')}}</th>
                    <th>{{__('violation.punishment_number')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($punishments as $punishment)
                    <tr id="punishment_{{$punishment->id}}">
                        <td>
                            {{$punishment->title}}
                        </td>
                        <td>
                            {{$punishment->number}}
                        </td>
                        <td>
                            <div class="btn-group direction">
                                @can('update-punishment',auth()->user())
                                <a href="{{route('editPunishmentRules',['id'=>$punishment->id])}}"
                                   class="btn btn-info btn-sm m-0">
                                    <i class="la la-edit"></i>
                                </a>
                                @endcan
                                @can('delete-punishment',auth()->user())
                                    <button class="btn btn-danger btn-sm m-0" onclick="remove('{{$punishment->id}}')">
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
    </div>
</div>
