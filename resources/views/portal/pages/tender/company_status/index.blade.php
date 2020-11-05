@extends('portal.layouts.master')

@section('content')


    <div id="services" class="section is-gray has-title">

        <div class="container-fluid">
            <div class="row direction">
                <div class="col-md-12 text-center">
                    <div class="section-content has-text-centered">
                        <h2 class="font-weight-bold">{{__('portal.company_status')}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mb-5">
            <div class="row direction text-left">
                <div class="col-md-12">
                    @include('portal.pages.tender.menu')

                </div>
                <div class="col-md-12">
                    @include('portal.includes.alerts')
                </div>

                <div class="col-md-12">
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
                                   <a style="font-size: 15px;"
                                      href="{{route('frontTenderCompanyEnquiryPortal',['type'=>'files'])}}">{{__('portal.review_files')}}</a>
                               @endif
                               @if(($msg['link'] ?? null) == 'frontTendersubscriptionPayEnquiry')
                                   <a style="font-size: 15px;"
                                      href="{{route('frontTendersubscriptionPayEnquiryPortal',['code'=>$code])}}">{{__('portal.pay_subscription')}}</a>
                               @endif
                           </span>
                        </div>
                        @if(count(($msg['reasons'] ?? [])) > 0)
                            <div class="card">
                                <div class="card-content">
                                    <ul>
                                        @foreach(($msg['reasons'] ?? [])  as $reason)
                                            <li>
                                                <b>{{__('portal.refuse_files')}}</b>
                                                <p style="color: #006bb0;font-weight:bold">
                                                    * {{__('tenders.'.$reason['name'])}} </p>

                                                <b>{{__('portal.comment')}} {{$reason['comment'] ?? __('portal.no_comment')}}</b>
                                                @if($reason['expired'] ?? null)
                                                    <br/>
                                                    <b style="color:red">{{__('portal.expire_file')}} : </b>
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
