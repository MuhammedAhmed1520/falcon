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
                        {{--                        <a href="{{route('falcon-searchCivilFalcon')}}" class="btn p-5 button is-danger">بحث الطلبات</a>--}}
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
                            <th><abbr>رقم الطلب</abbr></th>
                            <th>رقم الشريحة</th>
                            <th>فئة الصقر</th>
                            <th>نوع الصقر</th>
                            <th>بلد المنشأ</th>
                            <th><abbr>الحالة</abbr></th>
                            <th width="350"></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tbody>

                        @foreach($falcons as $falcon)
                            <tr id="row_{{$falcon->id}}">
                                <td>
                                    @if($falcon->P_OUT_REQUEST_NO ?? '')
                                        <span class="tag is-dark">{{$falcon->P_OUT_REQUEST_NO ?? ''}}</span>
                                    @endif
                                </td>
                                <td>{{$falcon->P_CUR_PASS_FAL ?? ''}}</td>
                                <td>{{$falcon->P_FAL_SPECIES ?? ''}}</td>
                                <td>{{$falcon->fal_type->label ?? ''}}</td>
                                <td>{{$falcon->origin_country->label ?? ''}}</td>
                                <td>
                                    @if($falcon->P_STATUS_MSG ?? '')
                                        <span class="tag is-dark">{{$falcon->P_STATUS_MSG ?? ''}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if(!$falcon->P_OUT_REQUEST_NO && $falcon->P_FAL_PIT_NO)
                                        <a class="button is-success p-0" onclick="sendRow('{{$falcon->id}}')">
                                            ارسال
                                        </a>
                                    @endif
                                    <a href="{{route('falcon-editCivilFalcon',['id'=>$falcon->id])}}"
                                       class="button is-link">
                                        تعديل
                                    </a>
                                    <a class="button is-danger p-0" onclick="deleteRow('{{$falcon->id}}')">
                                        <i class="icon icon-trash" style="margin-top: 5px"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @foreach($online_falcons as $online_falcon)
                            <tr>
                                <td>{{$online_falcon['requestNo'] ?? ''}}</td>
                                <td>{{$online_falcon['pitNo'] ?? ''}}</td>
                                <td>{{$online_falcon['falSpecies'] ?? ''}}</td>
                                <td>{{getDataByKey('lookup3' , $online_falcon['falType'] ?? '0') ?? ''}}</td>
                                <td>{{getDataByKey('lookup4', $online_falcon['falOriginCountry'] ?? '0') ?? ''}}</td>
                                <td>
                                    @if($online_falcon['submitStatus'] ?? '')
                                        <span class="tag is-dark">{{$online_falcon['submitStatus'] ?? ''}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('falcon-getNewOwner',['P_O_CIVIL_ID'=>$P_O_CIVIL_ID,'pitNo'=>$online_falcon['pitNo'],'P_REQUEST_TYP'=>4])}}"
                                       class="button is-link">
                                        نقل ملكية
                                    </a>
                                    <a href="{{route('falcon-getCivilLoss',['P_O_CIVIL_ID'=>$P_O_CIVIL_ID,'pitNo'=>$online_falcon['pitNo'],'P_REQUEST_TYP'=>2])}}"
                                       class="button is-link">
                                        فقدان الجواز
                                    </a>
                                    @if(($online_falcon['MESSAGE_ID'] ?? null) == 'MSG_M090')
                                        <a class="button is-warning p-0"
                                           onclick="payment('{{$online_falcon['pitNo']}}')">
                                            الدفع
                                        </a>
                                    @endif
                                    <a class="button is-dark p-0 mt-2"
                                       onclick="sendGeneralRequest('{{$P_O_CIVIL_ID}}','{{$online_falcon['pitNo']}}','3')">
                                        تجديد وثيقة منتهية
                                    </a>
                                    <a class="button is-danger p-0 mt-2"
                                       onclick="sendGeneralRequest('{{$P_O_CIVIL_ID}}','{{$online_falcon['pitNo']}}','5')">
                                        اتلاف جواز عند موت الصقر
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
        function deleteRow(id) {
            Swal.fire({
                title: 'انتبه',
                text: 'هل انت متأكد ؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
            }).then(function (result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{route('civilDeleteFalcon')}}",
                        method: "post",
                        data: {
                            _token: '{{csrf_token()}}',
                            id: id
                        },
                        success: function (response) {
                            if (response.status) {
                                $(`#row_${id}`).remove()
                                // location.reload()
                                // let oTable = $('#data_table').dataTable();
                                // oTable.fnDeleteRow(oTable.find(`#violation_${id}`).eq(0))
                            }
                        }
                    })

                }
            })
        }

        function sendRow(id) {
            Swal.fire({
                title: 'اعادة ارسال البيانات',
                text: 'هل انت متأكد ؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
            }).then(function (result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{route('civilResendData')}}",
                        method: "post",
                        data: {
                            _token: '{{csrf_token()}}',
                            id: id
                        },
                        success: function (response) {
                            if (response.status) {
                                location.reload()
                                // let oTable = $('#data_table').dataTable();
                                // oTable.fnDeleteRow(oTable.find(`#violation_${id}`).eq(0))
                            }
                        }
                    })

                }
            })
        }

        function payment(P_FAL_PIT_NO) {
            Swal.fire({
                title: 'دفع الرسوم',
                text: 'هل انت متأكد ؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
            }).then(function (result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{route('civilPayment')}}",
                        method: "post",
                        data: {
                            _token: '{{csrf_token()}}',
                            P_FAL_PIT_NO: P_FAL_PIT_NO
                        },
                        success: function (response) {
                            if (response.status) {
                                location.href = response.data.payment_link
                                // location.reload()
                                return
                                // let oTable = $('#data_table').dataTable();
                                // oTable.fnDeleteRow(oTable.find(`#violation_${id}`).eq(0))
                            }
                            Swal.fire({
                                icon: 'danger',
                                title: 'حدث خطأ',
                                text: response.msg
                            })
                        }
                    })

                }
            })
        }

        function sendGeneralRequest(P_O_CIVIL_ID, P_FAL_PIT_NO, P_REQUEST_TYP) {
            Swal.fire({
                title: 'نتبيه',
                text: 'هل انت متأكد ؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم',
                cancelButtonText: 'ﻻ',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
            }).then(function (result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{route('sendGeneralRequest')}}",
                        method: "post",
                        data: {
                            _token: '{{csrf_token()}}',
                            P_O_CIVIL_ID: P_FAL_PIT_NO,
                            P_FAL_PIT_NO: P_FAL_PIT_NO,
                            P_REQUEST_TYP: P_REQUEST_TYP,
                        },
                        success: function (response) {
                            if (response.status) {
                                // location.reload()
                                Swal.fire({
                                    icon: 'success',
                                    title: 'تمت العملية بنجاح',
                                    text: response.msg
                                })
                                return
                                // let oTable = $('#data_table').dataTable();
                                // oTable.fnDeleteRow(oTable.find(`#violation_${id}`).eq(0))
                            }
                            Swal.fire({
                                icon: 'danger',
                                title: 'حدث خطأ',
                                text: response.msg
                            })
                        }
                    })

                }
            })
        }
    </script>
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
