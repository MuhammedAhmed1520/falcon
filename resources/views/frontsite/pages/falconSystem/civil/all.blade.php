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
                        <h3>عرض كافة الطلبات </h3>
                        <a href="{{route('falcon-addCivilFalcon')}}" class="btn btn-secondary">اضافة صقر</a>
                        <a href="{{route('falcon-searchCivilFalcon')}}" class="btn p-5 button is-danger">بحث الطلبات</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>

                <div class="column is-12-desktop is-12-tablet">
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th><abbr>رقم جواز الصقر</abbr></th>
                            <th>نوع الصقر</th>
                            <th>بلد المنشأ</th>
                            {{--<th><abbr>الحالة</abbr></th>--}}
                            <th width="100"></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tbody>

                        @foreach([1] as $order)
                            <tr>
                                <td>{{$order}}</td>
                                <td>{{$order}}</td>
                                <td>{{$order}}</td>
                                {{--<td>--}}
                                {{--                                    <span class="tag is-dark">{{$order->status->title_ar ?? ''}}</span>--}}
                                {{--</td>--}}
                                <td>
                                    <a href="{{route('falcon-editCivilFalcon',['id'=>1])}}"
                                       class="button is-link">
                                        تعديل
                                    </a>
                                    <a class="button is-danger p-0">
                                        <i class="icon icon-trash" style="margin-top: 5px"></i>
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
                    "search": "بحث  الطلبات    ",
                    searchPlaceholder: "  ابحث هنا"

                }
            });
            $('input[aria-controls="myTable"]').addClass('ui-input').attr('autofocus', true);
        });
    </script>
@endsection
