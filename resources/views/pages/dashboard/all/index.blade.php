@extends('layouts.master')

@section('styles')
    {{Html::style('assets/css/epa_port.css')}}
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.dashboard.all.templates.header')
                @include('pages.dashboard.all.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>





    @if(session()->has('open_menu'))
        <script>
            $(document).ready(function () {
                setTimeout(function () {
                    $('#_{{session()->get('open_menu')}}').trigger("click");

                }, 60);
            });
        </script>
    @endif
    <script>

        Chart.defaults.global.defaultFontFamily = "Tajawal";

            @can('tender-statistics')
        let data0 = {
                datasets: [{
                    {{--label: '{{__('dashboard.violation_number')}}',--}}
                    label: '',
                    data: [{{$tender_statistics['paid_tender_company_count']?? 0}}
                        ,{{$tender_statistics['unpaid_tender_company_count']?? 0}},{{$tender_statistics['file_tender_company_count']?? 0}},{{$tender_statistics['miss_file_tender_company_count']?? 0}}
                        ,{{$tender_statistics['approved_tender_company_count']?? 0}}],
                    backgroundColor: ["#0747a6eb", "#ff9800bd", "#ef334cc7", "#ff9800bd", "#0747a6eb", "#ef334cc7"]
                }],

                labels: [
                    '{{__('settings.paid_tender_company_count')}}',
                    '{{__('settings.unpaid_tender_company_count')}}',
                    '{{__('settings.file_tender_company_count')}}',
                    '{{__('settings.miss_file_tender_company_count')}}',
                    '{{__('settings.approved_tender_company_count')}}'
                ]
            };
        let myChart0 = new Chart(document.getElementById('myChart-0'), {
            type: 'bar',
            data: data0,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


        let tendercurrent_year = [];
        @foreach($tender_statistics['tenders_year'] as $k => $year)
        tendercurrent_year.push('{{$year}}')
            @endforeach
        let myChart8 = new Chart(document.getElementById('myChart-8'), {
                type: 'line',
                data: {
                    datasets: [{
                        label: new Date().getFullYear(),
                        data: tendercurrent_year,
                        backgroundColor: ["#333333b5"]
                    }],
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                },
                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                min: 'January'
                            }
                        }],
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
            @endcan


        @can('office-agent-statistics')
        let data11 = {
                datasets: [{
                    {{--label: '{{__('dashboard.violation_number')}}',--}}
                    label: '',
                    data: [
                        @foreach($office_agent_statistics['order_status'] ?? [] as $stus)
                            {{$stus['agent_counts_count'] ?? 0}},
                        @endforeach 
                    ],
                    backgroundColor: ["#0747a6eb", "#27ae60","#1abc9c","#2ecc71","#3498db"]
                }],

                labels: [
                        @foreach($office_agent_statistics['order_status'] ?? [] as $stus)
                            "{{substr(($stus['name'] ?? ""),0,100)}}",
                        @endforeach 
                ]
            };
        
        let data12 = {
                datasets: [{
                    {{--label: '{{__('dashboard.violation_number')}}',--}}
                    label: '',
                    data: [
                        @foreach($office_agent_statistics['order_type'] ?? [] as $type)
                            "{{$type['agent_counts_count'] ?? 0}}",
                        @endforeach 
                    ],
                    backgroundColor: ["#0747a6eb", "#27ae60","#1abc9c","#2ecc71","#3498db"]
                }],

                labels: [
                        @foreach($office_agent_statistics['order_type'] ?? [] as $type)
                            "{{$type['title_ar'] ?? ""}}",
                        @endforeach 
                ]
            };
        
        <?php $activities = array(
        '1'=>'مكاتب استشارية',
        '2'=>'مختبرات بيئية',
        '3'=>'فحص مواد كيميائية',
        '4'=>'مكاتب هندسية',
        '5'=>'خدمات بيئية'
        ); ?>
        let data13 = {
                datasets: [{ 
                    label: '',
                    data: [
                        @foreach($office_agent_statistics['activities'] ?? [] as $activity)
                            "{{$activity['office_agents_count'] ?? 0}}",
                        @endforeach 
                    ],
                    backgroundColor: ["#0747a6eb", "#27ae60","#1abc9c","#2ecc71","#3498db"]
                }],

                labels: [
                        @foreach($office_agent_statistics['activities'] ?? [] as $activity)
                            "{{$activities[$activity['id']] ?? ""}}",
                        @endforeach 
                ]
            };
            
        let myChart11 = new Chart(document.getElementById('myChart-11'), {
            type: 'bar',
            data: data11,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        myChart11.canvas.parentNode.style.height = '428px';
        
        let myChart12 = new Chart(document.getElementById('myChart-12'), {
            type: 'bar',
            data: data12,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        myChart12.canvas.parentNode.style.height = '428px';
        
        let myChart13 = new Chart(document.getElementById('myChart-13'), {
            type: 'bar',
            data: data13,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });  
        myChart13.canvas.parentNode.style.height = '428px';

        @endcan
        let data1 = {
                datasets: [{
                    {{--label: '{{__('dashboard.violation_number')}}',--}}
                    label: '',
                    data: [
                        {{$total_statistics['person']['total_count'] ?? 0}},
                        {{$total_statistics['company']['total_count'] ?? 0}},
                        {{$total_statistics['manufacturer']['total_count'] ?? 0}}
                    ],
                    backgroundColor: ["#0747a6eb", "#ff9800bd", "#ef334cc7"]
                }],

                labels: [
                    '{{__('settings.person')}}',
                    '{{__('settings.company')}}',
                    '{{__('settings.manufacturer')}}'
                ]
            };

        let data2 = {
            datasets: [{
                {{--label: '{{__('dashboard.violation_paid')}}',--}}
                label: '',
                data: [{{$total_statistics['person']['total_fine_cost']  ?? 0}}, {{$total_statistics['company']['total_fine_cost'] ?? 0}}, {{$total_statistics['manufacturer']['total_fine_cost'] ?? 0}}],
                backgroundColor: ["#0747a6eb", "#ff9800bd", "#ef334cc7"]
            }],

            labels: [
                '{{__('settings.person')}}',
                '{{__('settings.company')}}',
                '{{__('settings.manufacturer')}}'
            ]
        };

        let data3 = {
            datasets: [{
                {{--label: '{{__('dashboard.violation_cost')}}',--}}
                label: '',
                data: [{{$total_statistics['payed_count'] ?? 0}}, {{$total_statistics['unPayed_count'] ?? 0}}],
                backgroundColor: ["#ff9800bd", "#0747a6eb"], "fill": false
            }],

            labels: [
                '{{__('settings.payed')}}',
                '{{__('settings.unpayed')}}'
            ]
        };

        let data4 = {
            datasets: [{
                {{--label: '{{__('dashboard.violation_cost')}}',--}}
                label: '',
                data: [
                    @foreach($total_statistics['officers'] as $officers)
                        '{{$officers->main_violations_count}}',
                    @endforeach
                ],
                backgroundColor: ["#008000", "#4caf50", "#8bc34a", "#ffeb3b"], "fill": false
            }],

            labels: [
                @foreach($total_statistics['officers'] as $officers)
                    '{{$officers->name ?? ''}}',
                @endforeach
            ]
        };
            {{--let users = JSON.parse('{{ json_encode($total_statistics['users']) }}');--}}
            {{--let users = JSON.parse("{!!$total_statistics['users']!!}");--}}
        let users = {!! json_encode($total_statistics['users']) !!};
        let data10 = {
            datasets: [{
                {{--label: '{{__('dashboard.violation_cost')}}',--}}
                label: '',
                data: [
                    @foreach($total_statistics['users'] as $users)
                        '{{$users->logger_count}}',
                    @endforeach
                ],
                backgroundColor: ["#0747a6eb", "#27ae60","#1abc9c","#2ecc71","#3498db","#e74c3c","#9b59b6","#e67e22","#2c3e50","#8e44ad","#f39c12","#bdc3c7"], "fill": false
            }],

            labels: [
                @foreach($total_statistics['users'] as $users)
                    '{{ substr($users->name ?? '',0,15)}}',
                @endforeach
            ]
        };

        let subject_counts = [];
        let subject_names = [];
        @foreach($total_statistics['top_subject'] as $subject)
        subject_counts.push('{{$subject['count']}}')
        subject_names.push('{{$subject['name']}}')
            @endforeach
        let data7 = {
                datasets: [{
                    label: '',
                    data: subject_counts,
                    backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"], "fill": false
                }],

                labels: subject_names
            };


        let myChart1 = new Chart(document.getElementById('myChart-1'), {
            type: 'bar',
            data: data1,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


        let myChart2 = new Chart(document.getElementById('myChart-2'), {
            type: 'bar',
            data: data2,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        let myChart3 = new Chart(document.getElementById('myChart-3'), {
            type: 'bar',
            data: data3,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        let myChart4 = new Chart(document.getElementById('myChart-4'), {
            type: 'horizontalBar',
            data: data4,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var that = this;
            @can('tender-statistics')
        let myChart10 = new Chart(document.getElementById('myChart-10'), {
                type: 'bar',
                data: data10,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    events: ["mousemove", "mouseout", "click", "touchstart", "touchmove", "touchend"],
                    onclick: function (e, data) {
                        let chart = myChart10;
                        var ctx = $("#myChart-10")[0].getContext("2d");
                        var base = myChart10.chartArea.bottom;
                        var height = myChart10.chart.height;
                        var width = myChart10.chart.scales['x-axis-0'].width;
                        var offset = $('#myChart-10').offset().top - $(window).scrollTop();
                        if (e.pageY > base + offset) {
                            var count = myChart10.scales['x-axis-0'].ticks.length;
                            var padding_left = myChart10.scales['x-axis-0'].paddingLeft;
                            var padding_right = myChart10.scales['x-axis-0'].paddingRight;
                            var xwidth = (width - padding_left - padding_right) / count;
                            // don't call for padding areas
                            var bar_index = (e.offsetX - padding_left - myChart10.scales['y-axis-0'].width) / xwidth;
                            if (bar_index > 0 & bar_index < count) {
                                bar_index = Math.floor(bar_index);
                                // console.log(users);
                                let user = users[bar_index];
                                // console.log(bar_index);

                                let url = "{{route('getLoggersView')}}" + "?user_id=" + user.id;
                                window.open(url, '_blank');

                            }
                        }
                    }
                }
            });
            @endcan

        let current_year = [];
        @foreach($total_statistics['current_year'] as $k => $year)
        current_year.push('{{$year}}')
            @endforeach
        let myChart5 = new Chart(document.getElementById('myChart-5'), {
                type: 'line',
                data: {
                    datasets: [{
                        label: new Date().getFullYear(),
                        data: current_year,
                        backgroundColor: ["#ef334cc7"]
                    }],
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                },
                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                min: 'January'
                            }
                        }]
                    }
                }
            });


        let full_array = [];

        <?php
            $colors = ["#1955adbf", "#ffb459bf", "#f35458c7", "#28a745", "#ffc107", "#9c27b0", "#2e2e2e", "#ff5722", "#9c27b0", "#4caf50", "#00bcd4", "#795548", "#607d8b", "#000"];
            ?>
            @foreach($total_statistics['previous_year'] as $k => $year)
            year_array = [];
        @foreach($year as $count)
        year_array.push('{{$count}}');
        @endforeach

        full_array.push({
            label: '{{$k}}',
            data: year_array,
            backgroundColor: ["{{$colors[rand(0,7)]}}"]
        });
            @endforeach

        let myChart6 = new Chart(document.getElementById('myChart-6'), {
                type: 'line',
                data: {
                    datasets: full_array,
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                },
                options: {
                    scales: {
                        xAxes: [{
                            ticks: {
                                min: 'January'
                            }
                        }]
                    }
                }
            });


        let myChart7 = new Chart(document.getElementById('myChart-7'), {
            type: 'doughnut',
            data: data7,
            options: {}
        });


        let grouptitles = [];
        let groupperson = [];
        let groupcompany = [];
        let groupmanufacturer = [];
        @foreach($total_statistics['person'] ?? [] as $k=>$item)
        @if(in_array($k,['total_fine_cost','total_count','id']))
        @continue
        @endif
        grouptitles.push("{{__('settings.'.$k)}}");
        groupperson.push("{{$item}}");
        @endforeach

        @foreach($total_statistics['company'] ?? [] as $k=>$item)
        @if(in_array($k,['total_fine_cost','total_count','id']))
        @continue
        @endif
        groupcompany.push("{{$item}}");
        @endforeach

        @foreach($total_statistics['manufacturer'] ?? [] as $k=>$item)
        @if(in_array($k,['total_fine_cost','total_count','id']))
        @continue
        @endif
        groupmanufacturer.push("{{$item}}");
            @endforeach


        let datagroup = {
                labels: grouptitles,
                datasets: [
                    {
                        label: "{{__('settings.person')}}",
                        backgroundColor: "rgb(7, 71, 166)",
                        // data: [3, 7, 4,7,8,8]
                        data: groupperson
                    },
                    {
                        label: "{{__('settings.company')}}",
                        backgroundColor: "rgb(255, 152, 0)",
                        // data: [4, 3, 5,9,7,3]
                        data: groupcompany
                    },
                    {
                        label: "{{__('settings.manufacturer')}}",
                        backgroundColor: "rgb(254, 99, 132)",
                        // data: [7, 2, 6]
                        data: groupmanufacturer
                    }
                ]
            };

        let myChartGroupBar = new Chart(document.getElementById('myChartGroupBar'), {
            type: 'bar',
            data: datagroup,
            options: {}
        });


    </script>


    <script>
        pusher.subscribe('officer-channel').bind('OfficerEvent', function (data) {

            let serial_data = base64_decode(data[0]);
            let decrypted = JSON.parse(serial_data);
            $('#officers_count').text(decrypted.officer_count);

        });
        pusher.subscribe('rule-channel').bind('RuleEvent', function (data) {

            console.log(data);
            let serial_data = base64_decode(data[0]);
            let decrypted = JSON.parse(serial_data);
            console.log(decrypted);
        });
        pusher.subscribe('violation-channel').bind('ViolationEvent', function (data) {

            console.log(data);
            let serial_data = base64_decode(data[0]);
            let decrypted = JSON.parse(serial_data);

            $('#violations_count').text(decrypted.violation_count);


            let officers_name = [];
            let officers_main_violations_count = [];
            $.each(decrypted.officers, function (index, officer) {
                officers_name.push(officer.name);
                officers_main_violations_count.push(officer.main_violations_count)
            });

            let users_name = [];
            let users_logger_count = [];
            $.each(decrypted.users, function (index, user) {
                users_name.push(user.name);
                users_logger_count.push(user.logger_count)
            });

            subject_counts = [];
            subject_names = [];
            $.each(decrypted.top_subject, function (index, subject) {
                subject_counts.push(subject.count);
                subject_names.push(subject.name);
            });

            current_year = [];
            $.each(decrypted.current_year, function (index, year) {
                current_year.push(year);
            });

            console.log(decrypted);
            myChart1.data.datasets[0].data = [decrypted.person.total_count, decrypted.company.total_count, decrypted.manufacturer.total_count];
            myChart2.data.datasets[0].data = [decrypted.person.total_fine_cost, decrypted.company.total_fine_cost, decrypted.manufacturer.total_fine_cost];
            myChart3.data.datasets[0].data = [decrypted.payed_count, decrypted.unPayed_count];

            myChart4.data.datasets[0].data = officers_main_violations_count;
            myChart4.data.labels = officers_name;

            myChart10.data.datasets[0].data = users_logger_count;
            myChart10.data.labels = users_name;

            myChart5.data.datasets[0].data = current_year;

            myChart7.data.datasets[0].data = subject_counts;
            myChart7.data.labels = subject_names;

            myChart1.update();
            myChart2.update();
            myChart3.update();
            myChart4.update();
            myChart5.update();
            myChart7.update();
            myChart10.update();
        });
        pusher.subscribe('tender-channel').bind('TenderEvent', function (data) {

            let serial_data = base64_decode(data[0]);
            let decrypted = JSON.parse(serial_data);
            console.log(decrypted)
            $('#tender_count').text(decrypted.tender_count)
            $('#paid_tender_company').text(decrypted.paid_tender_company_count)
            $('#miss_file_tender').text(decrypted.miss_file_tender_company_count)

            let users_name = [];
            let users_logger_count = [];
            $.each(decrypted.users, function (index, user) {
                users_name.push(user.name);
                users_logger_count.push(user.logger_count)
            });

            myChart10.data.datasets[0].data = users_logger_count;
            myChart10.data.labels = users_name;

            myChart0.data.datasets[0].data = [decrypted.paid_tender_company_count, decrypted.unpaid_tender_company_count, decrypted.file_tender_company_count,
                , decrypted.miss_file_tender_company_count, decrypted.approved_tender_company_count];

            current_year = [];
            $.each(decrypted.tenders_year, function (index, year) {
                current_year.push(year);
            });
            myChart8.data.datasets[0].data = current_year;

            myChart0.update();
            myChart8.update();
            myChart10.update();
        });


        document.getElementById('myChart-1').onclick = function (e) {
            let slice = myChart1.getElementAtEvent(e);
            if (!slice.length) return; // return if not clicked on slice
            let _index = slice[0]._index;
            let _action_id = 'ALL';
            let header_text = '';
            let header_value = '';
            if (_index == 0) {
                _action_id = '{{$total_statistics['person']['id'] ?? 0}}';
                header_text = 'نوع المخالفة';
                header_value = 'افراد';
            }
            if (_index == 1) {
                _action_id = '{{$total_statistics['company']['id'] ?? 0}}';
                header_text = 'نوع المخالفة';
                header_value = 'شركات';
            }
            if (_index == 2) {
                _action_id = '{{$total_statistics['manufacturer']['id'] ?? 0}}';
                header_text = 'نوع المخالفة';
                header_value = 'مصانع';
            }
            report(header_text, header_value, '', '', '', '', '', '', '', _action_id)
        };

        document.getElementById('myChart-2').onclick = function (e) {
            let slice = myChart2.getElementAtEvent(e);
            if (!slice.length) return; // return if not clicked on slice
            let _index = slice[0]._index;
            let _action_id = 'ALL';
            let header_text = '';
            let header_value = '';
            if (_index == 0) {
                _action_id = '{{$total_statistics['person']['id'] ?? 0}}';
                header_text = 'تكلفة المخالفة';
                header_value = 'افراد';
            }
            if (_index == 1) {
                _action_id = '{{$total_statistics['company']['id'] ?? 0}}';
                header_text = 'تكلفة المخالفة';
                header_value = 'شركات';
            }
            if (_index == 2) {
                _action_id = '{{$total_statistics['manufacturer']['id'] ?? 0}}';
                header_text = 'تكلفة المخالفة';
                header_value = 'مصانع';
            }
            report(header_text, header_value, '', '', '', '', '', '', '', _action_id)
        };

        document.getElementById('myChart-3').onclick = function (e) {
            let slice = myChart3.getElementAtEvent(e);
            if (!slice.length) return; // return if not clicked on slice
            let _index = slice[0]._index;
            let _p_type = 'ALL';

            if (_index == 0) _p_type = 'CAPTURED'
            if (_index == 1) _p_type = 'NOT+CAPTURED'
            location.href = '{{route('getPaymentsView')}}?amount=&status=ALL&type=Violation&status=' + _p_type
        };

        document.getElementById('myChart-4').onclick = function (e) {
            let slice = myChart4.getElementAtEvent(e);
            if (!slice.length) return; // return if not clicked on slice
            let _index = slice[0]._index;
            location.href = '{{route('allOfficers')}}'

        }

        document.getElementById('myChart-0').onclick = function (e) {
            let slice = myChart0.getElementAtEvent(e);
            if (!slice.length) return; // return if not clicked on slice
            let _index = slice[0]._index;
            location.href = '{{route('allCompanies')}}'

        }
        document.getElementById('myChart-8').onclick = function (e) {
            let slice = myChart8.getElementAtEvent(e);
            if (!slice.length) return; // return if not clicked on slice
            let _index = slice[0]._index;
            location.href = '{{route('allTenders')}}'

        }

        document.getElementById('myChartGroupBar').onclick = function (e) {
            let slice = myChartGroupBar.getElementAtEvent(e);
            if (!slice.length) return; // return if not clicked on slice
            let _index = slice[0]._index;
            location.href = '{{route('allViolations')}}'

        }

        document.getElementById('myChart-5').onclick = function (e) {
            let slice = myChart5.getElementAtEvent(e);
            if (!slice.length) return; // return if not clicked on slice
            let _index = slice[0]._model;
            let header_text = 'عرض مخالفات العام ';
            let header_value = 'عرض مخالفات العام ';
            report(header_text, header_value, new Date().getFullYear() + '-01-01', new Date().getFullYear() + '-12-30', '', '', '', '', '', 'ALL', 'ALL', 'ALL', 'ALL', 'ALL', 'ALL', 'ALL')

        };

        document.getElementById('myChart-6').onclick = function (e) {
            let slice = myChart6.getElementAtEvent(e);
            if (!slice.length) return; // return if not clicked on slice
            let _index = slice[0]._datasetIndex;
            console.log(_index)
            let _years = {{collect($total_statistics['previous_year'])->keys()}};
            let header_text = 'عرض مخالفات العام ';
            let header_value = 'عرض مخالفات العام ';
            report(header_text, header_value, _years[_index] + '-01-01', _years[_index] + '-12-30', '', '', '', '', '', 'ALL', 'ALL', 'ALL', 'ALL', 'ALL', 'ALL', 'ALL')

        };

        document.getElementById('myChart-7').onclick = function (e) {
            let slice = myChart7.getElementAtEvent(e);
            if (!slice.length) return; // return if not clicked on slice
            let _index = slice[0]._index;
            let _subjects = {!! $total_statistics['top_subject'] !!};

            let _punishment_subject_paragraphs_id = _subjects[_index].id;
            let header_text = 'رقم المادة';
            let header_value = _subjects[_index].name;
            report(header_text, header_value, '', '', '', '', '', '', '', 'ALL', 'ALL', 'ALL', 'ALL', 'ALL', 'ALL', _punishment_subject_paragraphs_id)
        }

        function report(header_text, header_value, violation_date_from = '', violation_date_to = '',
                        created_date_from = '', created_date_to = '', payed_date_from = '', payed_date_to = '',
                        query = '', category_id = 'ALL', status_id = 'ALL', area_id = 'ALL',
                        action_id = 'ALL', payed = 'ALL', officer_id = 'ALL', punishment_subject_paragraphs_id = 'ALL'
        ) {
            var url = '{{route('generateViolationReportParams')}}';
            url += '?violation_date_from=' + violation_date_from;
            url += '&violation_date_to=' + violation_date_to;
            url += '&created_date_from=' + created_date_from;
            url += '&created_date_to=' + created_date_to;
            url += '&payed_date_from=' + payed_date_from;
            url += '&payed_date_to=' + payed_date_to;

            url += '&category_id=' + category_id;
            url += '&status_id=' + status_id;
            url += '&area_id=' + area_id;
            url += '&action_id=' + action_id;
            // url += '&payment_type_id=' + $('select[name="category_id"]').val();
            url += '&payed=' + payed;
            url += '&officer_id=' + officer_id;
            url += '&statistics_only=' + true;
            url += '&table_only=' + true;
            url += '&punishment_subject_paragraphs_id=' + punishment_subject_paragraphs_id;
            url += '&query=' + query;

            if (header_text && header_value) {

                url += '&header_text=' + header_text;
                url += '&header_value=' + header_value;
            }

            // window.location.href = url;

            var win = window.open(url, "Report", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1200, height=500, top=" + '150' + ", left=" + '110');

        }
    </script>
@endsection
