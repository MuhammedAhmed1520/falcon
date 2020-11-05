@extends('frontsite.layouts.master')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
@endsection
@section('content')
    <div id="services" class="section is-gray has-title">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    @include('frontsite.includes.inner_activity_breadcrumb')
                </div>
                <div class="column is-12">
                    <a class="font_bold" href="{{route('loginOfficeAgent')}}">تسجيل الدخول</a>
                    |
                    <a class="font_bold" href="{{route('register-office-agent')}}">تسجيل طلب جديد </a>
                </div>
            </div>
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        {{--                        <span class="section-title">المخالفات</span>--}}
                        {{--                        <h5 class="small-headline">نظام المخالفات</h5>--}}
                        <h3>كراسات الانشطة</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>

                @foreach($office_agent_activies as $office_agent_activity)
                    <div class="column is-4-desktop">
                        <a href="{{route('main-activity-office-agent')}}?tab=comp_tab&window={{request()->get('window')}}"
                           class="font_bold">
                            <div
                                class="card  @if($office_agent_activity->id == request()->id) red_blue is-active @endif">
                                <div class="card-content">
                                    {{$office_agent_activity->title_ar}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="column is-12">
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th><abbr>رقم </abbr></th>
                            <th>الشركة</th>
                            <th>عقد التعاون او الوكالة</th>
                            <th><abbr>العنوان</abbr></th>
                            <th><abbr>التخصصات</abbr></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tbody>

                        @foreach($offices as $office)
                            <tr>
                                <td>{{$office->id}}</td>
                                <td>{{$office->office_name_ar. ' | ' . $office->office_name_en}}</td>
                                <td>{{$office->contract_type->title_ar ?? ''}}</td>
                                <td>
                                    @if($office->main_address->area ?? '')
                                        <label class="font-weight-bold text-black">القطعة </label>
                                        {{$office->main_address->area ?? ''}}
                                    @endif

                                    @if($office->main_address->segment ?? '')
                                        <label class="font-weight-bold text-black">القسيمة</label>
                                        {{$office->main_address->segment ?? ''}}
                                    @endif

                                    @if($office->main_address->street ?? '')
                                        <label class="font-weight-bold text-black">الشارع </label>
                                        {{$office->main_address->street ?? ''}}
                                    @endif

                                    @if($office->main_address->building ?? '')
                                        <label class="font-weight-bold text-black">البناية</label>
                                        {{$office->main_address->building ?? ''}}
                                    @endif

                                    @if($office->main_address->floor ?? '')
                                        <label class="font-weight-bold text-black">الدور</label>
                                        {{$office->main_address->floor ?? ''}}
                                    @endif
                                    @if($office->main_address->full_address ?? '')
                                        <label class="font-weight-bold text-black">العنوان بالكامل</label>
                                        {{$office->main_address->full_address ?? ''}}
                                    @endif
                                </td>
                                <td>
                                    @foreach($office->specializations->pluck(['title_ar']) ?? [] as $sp)
                                        {{$sp}} ,
                                    @endforeach
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
                    "search": "بحث  الشركات المعتمدة    ",
                    searchPlaceholder: "  ابحث هنا"

                }
            });
            $('input[aria-controls="myTable"]').addClass('ui-input').attr('autofocus', true);
        });
    </script>
    <style>
        .font_bold {
            font-weight: bold;
        }

        .tabs.is-toggle li.is-active a {
            color: #fff;
            background: #0547a6;

        }

        .tabs.is-toggle li.is-active a b {
            color: #fff !important;

        }

        .card.is-active {
            border: 2px solid #A66405;
            color: #fff;
            text-decoration: underline;

        }

        .red_blue {
            /*color: #fff;*/
            /*background: linear-gradient(to right, rgb(81, 177, 227), rgb(137, 198, 232))*/
            color: #fff;
            background: #0547a6;
            transition: all 0.5s ease-in-out;
        }

        .red_blue:hover {
            background: #053d8d;
        }

        .red_blue .card-content,
        .red_yellow .card-content {
            text-align: center;
        }

        .column a:hover {
            text-decoration: none;
        }

        .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
            color: #333;
            font-size: 22px;
            font-weight: bold;
        }
    </style>
@endsection
