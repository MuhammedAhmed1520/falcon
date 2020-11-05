@extends('frontsite.layouts.master')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
@endsection
@section('content')


    <div id="services" class="section is-gray has-title">

        <div class="container">
            <div class="columns">
                @include('frontsite.includes.inner_breadcrumb')
            </div>
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        {{--                        <span class="section-title">الممارسات</span>--}}
                        {{--                        <h5 class="small-headline">نظام الممارسات</h5>--}}
                        <h3>عرض كافة الممارسات </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="columns is-multiline mt-2">

                <div class="column is-12">
                    @include('frontsite.pages.tender.menu')

                </div>
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>
                <div class="column is-1-desktop">
                    {{--                    @include('frontsite.pages.tender.menu')--}}
                </div>

                <div class="column is-10-desktop is-12-tablet">
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th><abbr>رقم </abbr></th>
                            <th>موضوع</th>
                            <th>تاريخ الطرح</th>
                            <th><abbr>الحالة</abbr></th>
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
                                    <a href="{{route('frontTenderShowTenderDetails',['id'=>$tender->id])}}"
                                       class="button is-link">
                                        عرض التفاصيل
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
                "language": {
                    "search": "بحث  الممارسات    ",
                     searchPlaceholder: "  ابحث هنا"

                }
            });
            $('input[aria-controls="myTable"]').addClass('ui-input').attr('autofocus', true);
        });
    </script>
@endsection
