@extends('portal.layouts.master')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
@endsection
@section('content')


    <div id="services" class="section">
        <div class="container-fluid mb-5">
            <div class="row direction mt-2">
                <div class="col-md-12">
                    <table class="table" id="myTable">
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
                                <td>{{$violation['serial']}}</td>
                                <td> 
                                    @foreach($violation['subjects'] as $sub)
                                        <b>{{$sub['subject_paragraph']['subject_rule']['title'] ?? null}}</b>
                                        @if(!$loop->last)
                                            ||
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$violation['location_name']}}</td>
                                <td>{{$violation['date']}}</td>
                                <td>{{$violation['fine_cost']}}</td>
                                <td>{{$violation['payed_at'] ?? __('portal.not_paid')}}</td>
                                <td>
                                    @if(!$violation['block'] && ($violation['action']->id ?? null) == 2)
                                        <a href="{{route('getEnquiryPayViolationPortal',['id'=>$violation->id])}}">
                                            {{__('portal.show_violation')}}
                                        </a>
                                    @else
                                        <a href="{{route('getEnquiryPayViolationPortal',['id'=>$violation['id']])}}">
                                            {{__('portal.show_violation')}}
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

    </div>


@endsection
@section('scripts')
    {{Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                paging: false,
                searching: false,
                "language": {
                    "search": "بحث  المخالفات    "
                }
            });
            $('input[aria-controls="myTable"]').addClass('ui-input').attr('autofocus', true);
        });
    </script>
@endsection
