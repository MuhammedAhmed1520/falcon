<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>{{__('violation.subject_title')}}</th>
                    <th>{{__('violation.subject_number')}}</th>
                    <th>{{__('violation.subject_order')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($subjects as $subject)
                    <tr id="subject_{{$subject->id}}">
                        <td>
                            {{$subject->title}}
                        </td>
                        <td>
                            {{$subject->number}}
                        </td>
                        <td>
                            {{$subject->order}}
                        </td>
                        <td>
                            <div class="btn-group direction">
                                @can('show-subject',auth()->user())
                                <button class="btn btn-primary btn-sm m-0"  data-toggle="modal" data-target="#subject_info" data-subject="{{$subject}}">
                                    <i class="la la-info-circle"></i>
                                </button>
                                @endcan
                                    @can('update-subject',auth()->user())

                                    <a href="{{route('editSubjectRules',['id'=>$subject->id])}}"
                                   class="btn btn-info btn-sm m-0">
                                    <i class="la la-edit"></i>
                                    </a>
                                @endcan

                                @can('delete-subject',auth()->user())
                                        <button class="btn btn-danger btn-sm m-0" onclick="remove('{{$subject->id}}')">
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
            {{--{{$subjects->render('pagination::bootstrap-4')}}--}}
        </div>
    </div>
</div>
