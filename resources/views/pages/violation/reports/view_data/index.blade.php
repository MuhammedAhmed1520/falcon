@extends('layouts.adminReport')

@section('styles')
    <style>
        .skeleton-nav--center {

            display: block;
            width: auto;
            margin-right: 0;
            min-height: 100vh;
            background-color: #ccc;
            padding: 0;
        }
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container bg-white h-100">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{asset('assets/images/logo.png')}}"  width="120" height="120" class="mt-4 pull-right float-right"
                         alt=""> 
                    <img src="{{asset('assets/images/new_kuwait.png')}}"  width="120" height="120" class="mt-4 pull-left float-left"
                         alt=""> 
                    <h1 class="m-4 text-center">
                        <b class="report_header">الهيئة العامة للبيئة </b><br/>
                        <span class="fs25">تقارير المخالفات البيئية</span>
                    </h1>
                </div> 
                <div class="col-12 mb-4 text-center">
                    <ul class="list-unstyled">
                        @if(request()->violation_date_from && request()->violation_date_to)
                            <li>
                                <span class="fs15">{{__('violation.violation_date')}} : </span>
                                <span>من   {{request()->violation_date_from }} الى {{request()->violation_date_to}}</span>
                            </li>
                        @endif
                        @if(request()->payed_date_from && request()->payed_date_to)
                            <li>
                                <span class="fs15">{{__('violation.violation_payment_date')}} : </span>
                                <span>من  {{request()->payed_date_from }} الى {{request()->payed_date_to}}</span>
                            </li>
                        @endif
                        @if(request()->created_date_from && request()->created_date_to)
                            <li>
                                <span class="fs15">{{__('violation.violation_create_date')}} : </span>
                                <span>من  {{request()->created_date_from }} الى {{request()->created_date_to}}</span>
                            </li>
                        @endif 
                    </ul>
                </div>
                <div class="col-12 mb-2 text-center">
                        @if(request()->subject_number)
                                <span class="fs15">{{__('violation.subject_number')}} : </span>
                                <span>({{request()->subject_number ?? __('dashboard.all')}}),</span>
                        @endif
                        @if(request()->subject_number)
                            <span class="fs15">{{__('violation.subject_number')}} : </span>
                            <span>({{request()->subject_number ?? __('dashboard.all')}}),</span>
                        @endif
                        @if(request()->text_category)
                            <span class="fs15">{{__('dashboard.text_category')}} : </span>
                            <span>({{request()->text_category ?? __('dashboard.all')}}),</span>
                        @endif
                        @if(request()->text_status)
                            <span class="fs15">{{__('dashboard.text_status')}} : </span>
                            <span>({{request()->text_status ?? __('dashboard.all')}}),</span>
                        @endif 
                            <span class="fs15">{{__('dashboard.print_date')}} : </span>
                            <span>({{Carbon\Carbon::now()->format('Y-m-d H:i:s')}}),</span>
                        @if(request()->text_subject)
                            <span class="fs15">{{__('dashboard.text_subject')}} : </span>
                            <span>({{request()->text_subject ?? __('dashboard.all')}}),</span>
                        @endif 
                        @if(request()->text_area)
                            <span class="fs15">{{__('dashboard.text_area')}} : </span>
                            <span>({{request()->text_area ?? __('dashboard.all')}}),</span>
                        @endif 
                        @if(request()->text_action)
                             <span class="fs15">{{__('dashboard.text_action')}} : </span>
                             <span>({{request()->text_action ?? __('dashboard.all')}}),</span>
                         @endif 
                         @if(request()->text_payed)
                             <span class="fs15">{{__('dashboard.text_payed')}} : </span>
                             <span>({{request()->text_payed ?? __('dashboard.all')}}),</span>
                         @endif 
                         @if(request()->text_officer)
                             <span class="fs15">{{__('dashboard.text_officer')}} : </span>
                             <span>({{request()->text_officer ?? __('dashboard.all')}}),</span>
                         @endif  
                         @if(request()->text_query)
                             <span class="fs15">{{__('dashboard.text_query')}} : </span>
                             <span>({{request()->text_query}})</span>
                         @endif
                </div>
                <div class="col-md-12 d-none  mb-4 bg-gray">
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled mt-4 mb-4"> 
                                @if(request()->subject_number)
                                    <li>
                                        <span class="fs15">{{__('violation.subject_number')}} : </span>
                                        <span>{{request()->subject_number ?? __('dashboard.all')}}</span>
                                    </li>
                                @endif
                                @if(request()->text_category)
                                <li>
                                    <span class="fs15">{{__('dashboard.text_category')}} : </span>
                                    <span>{{request()->text_category ?? __('dashboard.all')}}</span>
                                </li>
                                @endif
                                @if(request()->text_status)
                                <li>
                                    <span class="fs15">{{__('dashboard.text_status')}} : </span>
                                    <span>{{request()->text_status ?? __('dashboard.all')}}</span>
                                </li>
                                @endif 
                                <li>
                                    <span class="fs15">{{__('dashboard.print_date')}} : </span>
                                    <span>{{Carbon\Carbon::now()->format('Y-m-d H:i:s')}}</span>
                                </li> 
                                @if(request()->text_subject)
                                <li>
                                    <span class="fs15">{{__('dashboard.text_subject')}} : </span>
                                    <span>{{request()->text_subject ?? __('dashboard.all')}}</span>
                                </li>
                                @endif 
                                @if(request()->text_area)
                                <li>
                                    <span class="fs15">{{__('dashboard.text_area')}} : </span>
                                    <span>{{request()->text_area ?? __('dashboard.all')}}</span>
                                </li>
                                @endif 
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled mt-4 mb-4"> 
                                @if(request()->text_action)
                                <li>
                                    <span class="fs15">{{__('dashboard.text_action')}} : </span>
                                    <span>{{request()->text_action ?? __('dashboard.all')}}</span>
                                </li>
                                @endif 
                                @if(request()->text_payed)
                                <li>
                                    <span class="fs15">{{__('dashboard.text_payed')}} : </span>
                                    <span>{{request()->text_payed ?? __('dashboard.all')}}</span>
                                </li>
                                @endif 
                                @if(request()->text_officer)
                                <li>
                                    <span class="fs15">{{__('dashboard.text_officer')}} : </span>
                                    <span>{{request()->text_officer ?? __('dashboard.all')}}</span>
                                </li>
                                @endif  
                                @if(request()->text_query)
                                <li>
                                    <span class="fs15">{{__('dashboard.text_query')}} : </span>
                                    <span>{{request()->text_query}}</span>
                                </li>
                                @endif 
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 d-none">       
                  
                @if(request()->get('header_text')) 
                    <div class="col-md-12 col-6 mb-3">
                        <div class="statistic-card bg-info-grad shadow-lg overflow-hidden"> 
                            <div class="content text-center font-weight-bold text-white">
                                <h4 class="text-uppercase"> {{request()->get('header_text')}}</h4>
                                <div class="mt-3" style="font-size:20px">{{request()->get('header_value')}}</div>
                            </div> 
                        </div>
                    </div> 
                @endif
            </div>
        </div>
        
                @if($statistics_only)
                <div>
                    @include('pages.violation.reports.view_data.templates.statistics')
                </div>
                @endif

                @if($table_only)
                    @include('pages.violation.reports.view_data.templates.content')
                @endif
            </div>
        </div>
    </div>
    <button class="btn btn-secondary btn-rounded btn-icon d-print-none" onclick="window.print()" style="position: fixed;left: 30px;bottom: 30px;z-index:99999;padding: 10px;font-size: 17px;">
        <i class="la la-print"></i>
    </button>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

    <script>
        let data1 = {
            datasets: [{
                label: '',
                data: [{{$data['statistics']['person_count'] ?? 0}}, {{$data['statistics']['company_count'] ?? 0}}, {{$data['statistics']['manufacturer_count'] ?? 0}}],
                backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
            }],

            labels: [
                'افراد',
                'شركات',
                'مصانع'
            ]
        };

        let data2 = {
            datasets: [{
                label: '',
                data: [{{$data['statistics']['person_fine_cost'] ?? 0}}, {{$data['statistics']['company_fine_cost'] ?? 0}}, {{$data['statistics']['manufacturer_fine_cost'] ?? 0}}],
                backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
            }],

            labels: [
                'افراد',
                'شركات',
                'مصانع'
            ]
        };

        let data3 = {
            datasets: [{
                label: '',
                data: [{{$data['statistics']['payed_count'] ?? 0}}, {{$data['statistics']['unPayed_count'] ?? 0}}],
                backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)"]
            }],

            labels: [
                'المدفوعة',
                'الغير مدفوعة'
            ]
        };

        new Chart(document.getElementById('myChart-1'), {
            type: 'bar',
            data: data1,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function (value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            }
                        }
                    }]
                }
            }
        });


        new Chart(document.getElementById('myChart-2'), {
            type: 'bar',
            data: data2,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function (value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            }
                        }
                    }]
                }
            }
        });

        new Chart(document.getElementById('myChart-3'), {
            type: 'bar',
            data: data3,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function (value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            }
                        }
                    }]
                }
            }
        });


    </script>




@endsection
