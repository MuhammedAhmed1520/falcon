<table class="table table-bordered logger-table">
    @foreach($logger_data as $logger)
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
                                    <span class="text-danger"> {{__('settings.changed_from')}}</span>
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

@can('logger-settings')
    <div class="text-center">
        <a href="{{route('getLoggersView')}}" class="btn btn-primary">{{app()->getLocale() == 'ar' ? 'المزيد' : 'More'}}</a>
    </div>
@endcan
