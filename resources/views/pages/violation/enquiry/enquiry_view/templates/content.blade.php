<div class="container-fluid mt-5" style="min-height: 100vh">
    <div class="row mt-5">
        <div class="col-md-12 mt-5">
            <h2 class="font-weight-bold">استعلام عن المخالفات</h2><br>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{__('violation.serial')}}</th>
                    <th>{{__('violation.punishment_number')}}</th>
                    <th>{{__('violation.location_name')}}</th>
                    <th>{{__('violation.date_time')}}</th>
                    <th>{{__('violation.paid')}}</th>
                    <th>{{__('violation.amount')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($violations as $k => $violation)

                    <tr>
                        <td>{{$violation->serial}}</td>
                        <td>
                            مادة {{$violation->subjectParagraph->subject_paragraph->subject_rule->number ?? '-'}} -
                            <br>
                            مادة {{$violation->subjectParagraph->punishment_paragraph->punishment_rule->number ?? '-'}}
                            -
                            {{$violation->subjectParagraph->punishment_paragraph->punishment_rule->title ?? '-'}}
                        </td>
                        <td>{{$violation->location_name}}</td>
                        <td>{{$violation->date}}</td>
                        <td>{{$violation->fine_cost}}</td>
                        <td>{{$violation->payed_at ?? 'لم يتم السداد'}}</td>
                        <td>
                            @if(!$violation->block && $violation->action->id == 2)
                            <a href="{{route('getEnquiryPayViolation',['id'=>$violation->id])}}">
                                سداد عرض تفاصيل المخالفة
                            </a>
                            @else 
                            <a href="{{route('getEnquiryPayViolation',['id'=>$violation->id])}}">
                                  عرض تفاصيل المخالفة
                            </a>
                            @endif
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>