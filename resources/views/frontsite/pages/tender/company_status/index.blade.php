@extends('frontsite.layouts.master')

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
                        <h3>حالة تسجيل الشركات</h3>
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
                    <h1 style="font-size:25px">
                        {{$company->name}}
                    </h1>
                    <h2 style="color: #666">
                        {{$company->reference_code}}
                    </h2>
                    <br><br>
                
                    @foreach($messages as $msg)
                        <div class="notification {{$msg['color'] ?? ''}}"> 
                           <span style="font-size:20px;">
                            {{$msg['msg'] ?? ''}}
                            <br>
                            @if(($msg['link'] ?? null) == 'frontTenderCompanyEnquiry')
                                <a style="font-size: 15px;" href="{{route('frontTenderCompanyEnquiry',['type'=>'files'])}}">مراجعة الملفات</a>
                            @endif
                            @if(($msg['link'] ?? null) == 'frontTendersubscriptionPayEnquiry')
                                <a style="font-size: 15px;" href="{{route('frontTendersubscriptionPayEnquiry',['code'=>$code])}}">دفع اشتراك  </a>
                            @endif
                           </span>
                        </div>
                        @if(count(($msg['reasons'] ?? [])) > 0)
                        <div class="card">
                            <div class="card-content">
                            <ul>
                                @foreach(($msg['reasons'] ?? [])  as $reason)
                                    <li>
                                        <b>تم رفض الملف</b> 
                                        <p style="color: #006bb0;font-weight:bold"> * {{__('tenders.'.$reason['name'])}} </p>
                                        
                                        <b>تعليق الموظف   : {{$reason['comment'] ?? 'لم يتم التعليق'}}</b> 
                                        @if($reason['expired'] ?? null)
                                            <br/>
                                            <b style="color:red">انتهت صلاحية الملف يوم : </b>
                                             {{$reason['expired_date']}}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            <br><br>
                            </div>
                        </div>
                        @endif
                    @endforeach 

                </div>
            </div>
        </div>

    </div>


@endsection
@section('scripts')

@endsection
