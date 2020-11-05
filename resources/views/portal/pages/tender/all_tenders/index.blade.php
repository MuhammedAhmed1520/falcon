@extends('portal.layouts.master')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
@endsection
@section('content')


    <div id="services" class="section is-gray has-title">

        <div class="container-fluid">
            <div class="row text-center direction">
                <div class="col-md-12">
                    <div class="section-content text-center">
                        <h2 class="font-weight-bold">{{__('portal.tenders')}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mb-5">
            <div class="row text-left direction mt-2">

                <div class="col-md-12">
                    @include('portal.pages.tender.menu')

                </div>
                <div class="col-md-12">
                    @include('portal.includes.alerts')
                </div>


                <div class="col-md-12">
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th><abbr>{{__('portal.number')}} </abbr></th>
                            <th>{{__('portal.subject')}}</th>
                            <th>{{__('portal.open_date')}}</th>
                            <th><abbr>{{__('portal.status')}}</abbr></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tbody>

                        @foreach($tenders as $tender)
                            <tr>
                                <td>{{$tender->number}}</td>
                                <td>{{$tender->title_ar}}</td>
                                <td>{{$tender->open_date}}</td>
                                <td>
                                    <span class="tag is-dark">{{$tender->status->title_ar ?? ''}}</span>
                                </td>
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
                    "search": "بحث  الممارسات    ",
                     searchPlaceholder: "  ابحث هنا"

                }
            });
            $('input[aria-controls="myTable"]').addClass('ui-input').attr('autofocus', true);
        });
    </script>
@endsection
