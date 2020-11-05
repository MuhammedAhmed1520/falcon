<div class="row">
    <div class="col">
            <table class="table table-bordered table-striped table_print">
                <thead class="header_print">
                    <tr>
                        <th>#</th>
                        <th>{{__('violation.serial')}}</th>
                        <th>{{__('violation.name')}}</th>
                        <th>{{__('violation.civil_ssn')}}</th>
                        <th>{{__('violation.area')}}</th>
                        <th>{{__('violation.location_name')}}</th>
                        <th>{{__('violation.date_time')}}</th>
                        <th>{{__('violation.paid')}}</th>
                        <th>{{__('violation.punishment_number_subject')}}</th>
                        <th>{{__('violation.status')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data['violations'] as $k => $violation)

                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$violation->serial}}</td>
                        @if($violation->category_id == 1)
                            <td>{{$violation->civilian->name ?? '-'}}</td>
                            <td>{{$violation->civilian->ssn ?? '-'}}</td>
                        @else
                            <td>{{$violation->company->civilian->name ?? '-'}}</td>
                            <td>{{$violation->company->civilian->ssn ?? '-'}}</td>
                        @endif
                        <td>{{$violation->area->name ?? ''}}</td>
                        <td>{{$violation->location_name }}</td>
                        <td>{{$violation->date}}</td>
                        <td>{{$violation->payed_at ?? '-'}}</td>
                        <td>
                            @foreach($violation['subjects'] as $subject)
                            @php
                              $punish = [];
                              $pu =  $subject['punishment_paragraph']['punishment_rule']['number'] ?? '';
                            @endphp
                            @if(!in_array($pu,$punish))
                                @php
                                    array_push($punish,$pu)
                                @endphp
                                {{ $pu ?? '-' }}
                                @if(!$loop->last)
                                    ,
                                @endif
                            @endif    
                            @endforeach    
                        </td>
                        <td>{{$violation->status->title_ar ?? '-'}}</td>
                    </tr> 
                @endforeach
                </tbody>
            </table>
            @if(request()->paginated == 'true')
                <div class="text-center">
                    {{$data['violations']->appends(request()->all())->links() ?? ''}}
                </div> 
            @endif
    </div> 
</div>