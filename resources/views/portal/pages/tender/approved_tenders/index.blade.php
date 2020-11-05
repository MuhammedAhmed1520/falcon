@extends('portal.layouts.master')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
@endsection
@section('content')


    <div id="services" class="section is-gray has-title">

        <div class="container-fluid">
            <div class="row direction">
                <div class="col-md-12">
                    <div class="text-center">
                        {{--                        <span class="section-title">الممارسات</span>--}}
                        {{--                        <h5 class="small-headline">نظام الممارسات</h5>--}}
                        <h2 class="font-weight-bold">{{__('portal.all_approved_tenders')}} </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mb-5">
            <div class="row direction is-multiline mt-2">


                <div class="col-md-12">
                    @include('portal.pages.tender.menu')

                </div>

                <div class="col-md-12">
                    @include('portal.includes.alerts')
                </div>
                <div class="column is-1-desktop">
                    {{--                    @include('frontsite.pages.tender.menu')--}}
                </div>

                <div class="col-md-12 ">
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th><abbr>{{__('portal.number')}} </abbr></th>
                            <th>{{__('portal.subject')}} </th>
                            <th>{{__('portal.meeting_date')}} </th>
                            <th><abbr>{{__('portal.winner')}} </abbr></th>
                            <th><abbr>{{__('portal.total_offer')}} </abbr></th>
                            <th>{{__('portal.notes')}} </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tbody>

                        @foreach($tenders as $tender)
                            <tr>
                                <td>{{$tender->number}}</td>
                                <td>{{$tender->title_ar}}</td>
                                <td>{{$tender->meeting_date}}</td>
                                <td>
                                    @foreach($tender->getWinner as $winner)
                                        {{$winner->application->buyer->company->name ?? ''}}
                                    @endforeach
                                </td>
                                <td>{{$tender->price}}</td>
                                <td>{{$tender->getWinner->first()->reason->reason ?? ''}}</td>
                                <td>
                                    <a href="{{route('frontTenderShowTenderDetailsPortal',['id'=>$tender->id])}}"
                                       class="button is-link">
                                        {{__('portal.show_details')}}
                                    </a>
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
                    "search": "بحث الترسيات  ",
                     searchPlaceholder: "  ابحث هنا"
                }
            });
            $('input[aria-controls="myTable"]').addClass('ui-input').attr('autofocus', true);
        });
    </script>
@endsection
