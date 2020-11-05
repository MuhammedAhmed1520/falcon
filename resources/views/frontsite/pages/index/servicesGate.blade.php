@extends('frontsite.layouts.master')

@section('styles')
    <style>
        .bg-item h3 {
            font-size: 30px;
            color: #000;
            font-weight: bold;
        }
        .bg-item img{
            border-radius:50%;
        }
        .bg-item:hover img{
            box-shadow:1px 1px 12px #888;
        }
        a:hover{
            text-decoration:none;
        }
        .small_img{
                width: 35%;
        }
    </style>
@endsection
@section('content')


    <div id="services" class="section is-gray has-title">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    @include('frontsite.includes.inner_paymentGate_breadcrumb')
                </div>
            </div>
            <div class="columns">
                <div class="column is-4 has-text-centered bg-item">
                    <a href="https://khadamat.epa.org.kw/violation-frames/enquiry">
                        <img  class="small_img" src="{{ asset('assets/images/service_gate/2.png') }}">
                        <h3 class=" has-text-centered">
                            دفع المخالفات البيئية
                        </h3>
                    </a>
                </div>
                <div class="column is-4 has-text-centered bg-item">
                    <a href="https://khadamat.epa.org.kw/violation-certificate-frames">
                         <img  class="small_img" src="{{ asset('assets/images/service_gate/1.png') }}">
                        <h3 class=" has-text-centered">
                           دفع رسوم شهادة عدم وجود محاضر
                        </h3>
                    </a>
                </div>
                <div class="column is-4 has-text-centered bg-item">
                    <a href="https://khadamat.epa.org.kw/tender-frames/company-appends/subscriptionPay?tab=comp_tab&window=">
                        <img  class="small_img" src="{{ asset('assets/images/service_gate/3.png') }}">
                        <h3 class=" has-text-centered">
                           دفع اشتراك الشركات بالممارسات
                        </h3>
                    </a>
                </div>
            </div>
            <div class="columns">
                <div class="column is-4 has-text-centered bg-item">
                    <a href="https://khadamat.epa.org.kw/tender-frames/all-available-tenders?tab=tender_tab&window=">
                       <img  class="small_img" src="{{ asset('assets/images/service_gate/4.png') }}">
                        <h3 class=" has-text-centered">
                            شراء كراسه ممارسة
                         </h3>
                    </a>
                </div>
                <div class="column is-4 has-text-centered bg-item">
                    <a href="https://khadamat.epa.org.kw/office-agent-frames/login">
                         <img  class="small_img" src="{{ asset('assets/images/service_gate/5.png') }}">
                        <h3 class=" has-text-centered">
                            دفع رسوم طلب اعتماد بيئي
                         </h3>
                    </a>
                </div>
                <div class="column is-4 has-text-centered bg-item">
                    <a href="https://khadamat.epa.org.kw/office-agent-frames/login">
                        <img  class="small_img" src="{{ asset('assets/images/service_gate/6.png') }}">
                        <h3 class=" has-text-centered">
                            دفع رسوم شهادة اعتماد بيئي
                        </h3>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
