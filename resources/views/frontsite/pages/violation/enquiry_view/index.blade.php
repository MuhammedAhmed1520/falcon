@extends('frontsite.layouts.master')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
@endsection
@section('content')


    <div id="services" class="section is-gray has-title">

        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        <span class="section-title">المخالفات</span>
                        <h5 class="small-headline">نظام المخالفات</h5>
                        <h3>الاستعلام عن مخالفات الشركات والافراد والمصانع</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>
                <div class="column is-2-desktop">
                    @include('frontsite.pages.violation.menu')
                </div>

                <div class="column is-10-desktop is-12-tablet">
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
                                <td>{{$violation['payed_at'] ?? 'لم يتم السداد'}}</td>
                                <td>
                                    @if(!$violation['block'] && ($violation['action']->id ?? null) == 2)
                                        <a href="{{route('getEnquiryPayViolation',['id'=>$violation->id])}}">
                                            سداد عرض تفاصيل المخالفة
                                        </a>
                                    @else
                                        <a href="{{route('getEnquiryPayViolation',['id'=>$violation['id']])}}">
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

    </div>


@endsection
@section('scripts')
    {{Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                paging: false,
                "language": {
                    "search": "بحث  المخالفات    "
                }
            });
            $('input[aria-controls="myTable"]').addClass('ui-input').attr('autofocus', true);
        });
    </script>
@endsection
