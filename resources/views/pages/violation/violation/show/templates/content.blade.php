<div class="container-fluid">
   <div class="row">
        <div class="col-md-12">
            <h3> {{app()->getLocale() == 'ar' ? 'بيانات المخالفة':'Violation Details'}}  </h3>
            <button class="btn btn-primary mb-1" onclick="window.print()">
                <i class="la la-print"></i>
            </button>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                            <td>
                                <b>{{__('violation.id')}}</b>
                            </td>
                            <td width="75%">
                                <b>{{$violation->id}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.serial')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->serial}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.status')}}</b>
                            </td>
                            <td width="65%">
{{--                                {{dd($violation)}}--}}
                                <b>{{__('violation.'.$violation['status']['title'] ?? '')}}</b>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <b>{{__('violation.singed')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->assign_approved ? __('violation.yes') : __('violation.no')}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.violation_block')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->block ? __('violation.yes') : __('violation.no')}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.subject_number')}}</b>
                            </td>
                            <td width="65%">
                                @foreach($violation->subjects as $sub)
                                    <b>{{$sub->subject_paragraph->subject_rule->title?? null}}</b>
                                    @if(!$loop->last)
                                        ||
                                    @endif
                                @endforeach
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.violation_type')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->category->title ?? ''}} </b>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.location_name')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->location_name}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.violation_create_date')}}</b>
                            </td>
                            <td width="65%" class="text-left" dir="ltr">
                                <b>{{$violation->created_at}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.created_at')}}</b>
                            </td>
                            <td width="65%" class="text-left" dir="ltr">
                                <b>{{$violation->date}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.civil_name')}}</b>
                            </td>
                            <td width="65%">
                                @if($violation->category_id == 1)
                                    <b>{{$violation->civilian->name ?? '-'}}</b>
                                @else
                                    <b>{{$violation->company->civilian->name ?? '-'}}</b>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.civil_ssn')}}</b>
                            </td>
                            <td width="65%">
                                @if($violation->category_id == 1)
                                    <b>{{$violation->civilian->ssn ?? '-'}}</b>
                                @else
                                    <b>{{$violation->company->civilian->ssn ?? '-'}}</b>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.violation_action')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->action->title}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.notes')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->notes}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.amount')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->fine_cost}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.main_officer')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->main_officer->name ?? ''}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.other_officers')}}</b>
                            </td>

                            <td width="65%">
                                @foreach($violation->officers as $officer)
                                    <b>{{$officer->name ?? null}}</b>
                                    @if(!$loop->last)
                                        ||
                                    @endif
                                @endforeach
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>{{__('violation.locked_items')}}</b>
                            </td>
                            <td width="65%">
                                @foreach($violation->locked_items as $item)
                                    <b>{{$item->item ?? null}}</b>
                                    @if(!$loop->last)
                                        ||
                                    @endif
                                @endforeach
                            </td>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <b>{{__('violation.status')}}</b>
                            </td>
                            <td width="65%">
                                <b>{{$violation->payed_at ? $violation->payed_at : 'لم يتم سداد المخالفة'}}</b>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <b>{{__('violation.attachment')}}</b>
                            </td>
                            <td width="65%">
                                <ul class="list-unstyled">
                                    <li class="list-inline-item">
                                      <div class="shadow-sm">
                                          @foreach($violation->files as $file)
                                            <img src="{{$file->name}}" style="width: 120px;height: 120px;" alt="">
                                        @endforeach
                                        </div>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                </tbody>
            </table>

        </div>
   </div>
</div>
