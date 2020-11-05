@extends('frontsite.layouts.master_agent_layout')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
    <style>
        .table tbody tr:last-child td, .table tbody tr:last-child th {
            border-bottom-width: 0;
            white-space: nowrap;
            overflow: scroll;
        }

        .w-sm-100 {
            width: 35% !important;
        }

        @media only screen and (max-width: 600px) {

            .w-sm-100 {
                width: 100% !important;
            }
        }
    </style>
@endsection
@section('content')
    <div id="services" style="background: #eee">
        <div class="container pr-4 bg-white">
            <div class="row pt-5 pb-5">
                <div class="col-4 text-center">
                    <img class="img-fluid w-sm-100" src="{{asset('assets/images/Kuwait_logo.png')}}" alt="">
                </div>
                <div class="col-4 text-center">
                    <img class="img-fluid w-sm-100" src="{{asset('assets/images/new_kuwait.png')}}" alt="">
                </div>
                <div class="col-4 text-center">
                    <img class="img-fluid w-sm-100" src="{{asset('assets/images/logo.png')}}" alt="">
                </div>
            </div>


            <div class="row mt-5">
                <div class="col-12">
                    <div style="overflow-x:scroll">
                        <table class="table table-bordered table-striped font_bold">
                            <thead>
                            <tr>
                                <th colspan="2" class="size19" style="background: #999;color: #000;">
                                    المكاتب والدور الاستشارية الهندسية المؤهلة لتصميم وتنفيذ الاشتراطات المنصوص عليها فى
                                    لائحة التدخين للاماكن العامة المغلقة وشبه مغلقة
                                </th>
                            </tr>
                            <tr>
                                <th width="250px" style="background: #ccc">المكتب الهندسي</th>
                                <th style="background: #ccc">العنوان</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($officeAgents as $officeAgent)
                                <tr>
                                    <td>{{$officeAgent->office_name_ar}}</td>
                                    <td>
                                        <ul style="list-style-type: square">
                                            @if(count($officeAgent->addresses))
                                                <li>
                                                    @foreach($officeAgent->addresses as $address)
                                                        {{$address->full_address}} <br>
                                                        قطعة :{{$address->segment}}
                                                        منطقة :{{$address->area}}
                                                        شارع :{{$address->street}}
                                                        مبني :{{$address->building}}
                                                        طابق :{{$address->floor}}
                                                        مدينة :{{$address->city['translated']['name'] ?? ''}}
                                                        محافظة :{{$address->governorate['translated']['name'] ?? ''}}
                                                    @endforeach
                                                </li>
                                            @endif
                                            <li>رقم الهاتف: {{$officeAgent->owner_phone}}</li>
                                            <li>البريد الالكتروني: {{$officeAgent->owner_email}}</li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


    </div>


@endsection
@section('scripts')

    {{Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}
    <style>
        .img-fluid {
            width: 90%;
        }

        .ultext {
            list-style-type: square;
            color: #000;
            font-size: 18px;
        }

        .book-title {
            font-size: 33px;
            font-weight: bold;
            padding-top: 8px;
            width: 157px;
            line-height: 1.2;
            color: #000;
            position: absolute;
            right: 28%;
            top: 60px;
            word-break: break-word;
            text-align: right;
            overflow: hidden;
        }

        .book-title2 {
            font-size: 28px;
            font-weight: bold;
            padding-top: 8px;
            line-height: 1.2;
            color: #000;
        }

        .book-year {
            font-size: 58px;
            font-weight: bold;
            color: #51b1e3;
            position: absolute;
            right: 30%;
            bottom: 170px;
        }

        .book-month {
            font-size: 28px;
            font-weight: bold;
            color: #000;
            position: absolute;
            right: 32%;
            bottom: 125px;
        }

        .font_bold {
            font-weight: bold;
            color: #000;
        }

        .tabs.is-toggle li.is-active a {
            color: #fff;
            background: #0547a6;

        }

        .tabs.is-toggle li.is-active a b {
            color: #fff !important;

        }

        .size25 {
            font-size: 25px;
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
