<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <form action="">
                <div class="bg-gray mb-2 p-1">
                    <div class="row">
                        <div class="col-md-3">
                            <b>{{__('violation.status')}}</b>
                            <select class="form-control" name="user_id">
                                <option value="" @if(request()->user_id == '') selected @endif>{{__('tenders.All')}}</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id ?? 0}}" @if(request()->user_id == $user->id) selected @endif>{{$user->name ?? ''}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <b>{{__('violation.filter')}}</b>
                            <input type="text" class="date-range form-control flatpickr-input" readonly="readonly">
                            <input type="hidden" name="start_date">
                            <input type="hidden" name="end_date">
                        </div>
                        <div class="col-md-12 text-left mt-2 mb-2">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-sm btn-info m-0">
                                    {{__('violation.filter')}}
                                </button>
                                <button type="reset" class="btn btn-sm btn-danger m-0">
                                    {{__('violation.reset')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-12">
            <table class="table table-bordered logger-table">
    @foreach($loggers as $logger)
        @php
            $type = __('attributes.'.last(explode('\\', $logger->logerable_type)));
        @endphp
        @if($logger->action == "new")
            <tr style="background-color: #e8e8e8;">
                <td class="p-1">
                    <label class="badge badge-success badge-pill">
                        {{__('settings.new')}}
                    </label>
                    <small> {{$logger->user->username ?? ''}}</small>
                    <b class="text-uppercase">{{$type}}</b>
                </td>
                <td class="p-1">{{date("Y-m-d H:m", strtotime($logger->created_at))}}</td>
            </tr>
        @elseif($logger->action == "updated")
            @php
                $logger->logerable_type = str_replace('', '_', $logger->logerable_type);
            @endphp
            <tr style="background-color: #e8e8e8;">
                <td class="p-1 ">
                    <label class="badge badge-primary badge-pill">
                        {{__('settings.update')}}
                    </label>
                    <small> {{$logger->user->username ?? ''}}</small>
                    <b class="text-uppercase">{{$type}}</b>
                </td>
                <td class="p-1">{{date("Y-m-d H:m", strtotime($logger->created_at))}}</td>
            </tr>
            <tr>
                <td class="p-1" colspan="2">
                    <ul class="list-unstyled ">
                        @if(count($logger->data) > 0)
                            @foreach($logger->data as $logger_data)
                                <li class="no-margin">
                                    <b class="text-uppercase">{{app()->getLocale() == 'ar' ? $logger_data->label_ar : str_replace('_', ' ',$logger_data->label)}}</b>
                                    <br>
                                    <span class="text-danger">{{__('settings.changed_from')}}</span>
                                    <small style="font-size: 12px">{{$logger_data->old_value}}</small>
                                    ,
                                    <br>
                                    <span class="text-danger"> {{__('settings.changed_to')}}</span>
                                    <small style="font-size: 12px">{{$logger_data->new_value}}</small>
                                    <hr class="m-1">
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </td>
            </tr>
        @elseif($logger->action == "deleted")
            <tr style="background-color: #e8e8e8;">
                <td class="p-1">
                    <label class="badge badge-danger badge-pill">
                        {{__('settings.delete')}}
                    </label>
                    <small> {{$logger->user->username ?? ''}}</small>
                    <b class="text-uppercase">{{$type}}</b>
                </td>
                <td class="p-1">{{date("Y-m-d H:m", strtotime($logger->created_at))}}</td>
            </tr>
        @else
        @endif
    @endforeach
</table>
        </div>
         
        <div class="col-md-12">
            {{$loggers->appends(request()->input())->render("pagination::bootstrap-4")}}
        </div>
    </div>
</div>