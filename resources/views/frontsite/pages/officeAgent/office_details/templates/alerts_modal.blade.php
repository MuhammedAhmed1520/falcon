<div class="mb-3" id="accordion2">
    @if(count($office_agent_errors['officeData'] ?? []) > 0)
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <a data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true"
                       aria-controls="collapseOne2">
                        <i class="icon icon-info mr-0 text-danger"></i>
                        عرض بيانات الشركة المطلوبة

                    </a>
                </h5>
            </div>
            <div id="collapseOne2" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion2">
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($office_agent_errors['officeData'] ?? [] as $officeData)

                                <li>{{$officeData}}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    @endif
    @if(count($office_agent_errors['officeAttachments'] ?? []) > 0)
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="false"
                       aria-controls="collapseTwo2">
                        <i class="icon icon-info mr-0 text-danger"></i>
                        عرض ملفات الشركة المطلوبة
                    </a>
                </h5>
            </div>
            <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion2">
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($office_agent_errors['officeAttachments'] ?? [] as $officeAttachment)

                                <li>{{$officeAttachment}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(count($office_agent_errors['partnerData'] ?? []) > 0)
        <div class="card">
            <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree2" aria-expanded="false"
                       aria-controls="collapseThree2">
                        <i class="icon icon-info mr-0 text-danger"></i>
                        عرض بيانات الشركاء المطلوبة
                    </a>
                </h5>
            </div>

            <div id="collapseThree2" class="collapse" aria-labelledby="headingThree" data-parent="#accordion2">
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($office_agent_errors['partnerData'] ?? [] as $partnerData)
                                @foreach($partnerData['validation'] ?? [] as $validation)
                                    <li>{{$validation}} || <b>{{$partnerData['name'] ?? null}}</b></li>
                                @endforeach
                                @foreach($partnerData['attachment_validation'] ?? [] as $_validation)
                                    <li>{{$_validation}} || <b>{{$partnerData['name'] ?? null}}</b></li>@endforeach
                                {{--<li>{{$partnerData}}</li>--}}
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(count($office_agent_errors['humanResource'] ?? []) > 0)
        <div class="card">
            <div class="card-header" id="headingFour">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" data-target="#collapseFour2" aria-expanded="false"
                       aria-controls="collapseFour2">
                        <i class="icon icon-info mr-0 text-danger"></i>
                        عرض بيانات الكوادر البشرية المطلوبة
                    </a>
                </h5>
            </div>
            <div id="collapseFour2" class="collapse" aria-labelledby="headingFour" data-parent="#accordion2">
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($office_agent_errors['humanResource'] ?? [] as $humanResource)

                                @foreach($humanResource['validation'] ?? [] as $validation)
                                    <li>{{$validation}} || <b>{{$humanResource['name'] ?? null}}</b></li>
                                @endforeach

                                @foreach($humanResource['attachment_validation'] ?? [] as $validation)
                                    <li>{{$validation}} || <b>{{$humanResource['name'] ?? null}}</b></li>
                                @endforeach

                                {{--<li>{{$humanResource}}</li>--}}
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(count($office_agent_errors['missedDevices'] ?? []) > 0)
        <div class="card">
            <div class="card-header" id="headingFive">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" data-target="#collapseFive2" aria-expanded="false"
                       aria-controls="collapseFive2">
                        <i class="icon icon-info mr-0 text-danger"></i>
                        عرض بيانات الأجهزة والمعدات المطلوبة
                    </a>
                </h5>
            </div>
            <div id="collapseFive2" class="collapse" aria-labelledby="headingFive" data-parent="#accordion2">
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($office_agent_errors['missedDevices'] ?? [] as $missedDevices)

                                <li>{{$missedDevices}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(count($office_agent_errors['devices'] ?? []) > 0)
        <div class="card">
            <div class="card-header" id="headingSix">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" data-target="#collapseSix2" aria-expanded="false"
                       aria-controls="collapseSix2">
                        <i class="icon icon-info mr-0 text-danger"></i>
                       عرض ملفات الأجهزة والمعدات المطلوبة
                    </a>
                </h5>
            </div>
            <div id="collapseSix2" class="collapse" aria-labelledby="headingSix" data-parent="#accordion2">
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($office_agent_errors['devices'] ?? [] as $device)

                                <li>
                                    <b>{{$device['serial'] ?? ''}}</b>
                                    <b>{{$device['device_type']['name'] ?? ''}}</b>
                                    <ul>
                                        @foreach($device['attachment_validation'] ?? [] as $attachment_validation)
                                            <li>{{$attachment_validation}}</li>
                                        @endforeach
                                    </ul>
                                    <ul>
                                        @foreach($device['validation'] ?? [] as $validation)
                                            <li>{{$validation}}</li>
                                        @endforeach
                                    </ul>

                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(count(collect($office_agent_errors['branches'])->pluck('validation')->collapse()) > 0)
        <div class="card">
            <div class="card-header" id="headingSeven">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" data-target="#collapseSeven2" aria-expanded="false"
                       aria-controls="collapseSeven2">
                        <i class="icon icon-info mr-0 text-danger"></i>
                        عرض بيانات الأفرع الأخرى المطلوبة
                    </a>
                </h5>
            </div>
            <div id="collapseSeven2" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion2">
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($office_agent_errors['branches'] ?? [] as $branches)
                                @foreach($branches['validation'] ?? [] as $validation)

                                    <li>{{$validation}}</li>
                                @endforeach
                                {{--<li>{{$branches}}</li>--}}
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(count($office_agent_errors['payments'] ?? []) > 0)
        <div class="card">
            <div class="card-header" id="headingEight">
                <h5 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" data-target="#collapseEight2" aria-expanded="false"
                       aria-controls="collapseEight2">
                        <i class="icon icon-info mr-0 text-danger"></i>
                        متطلبات المدفوعات
                    </a>
                </h5>
            </div>
            <div id="collapseEight2" class="collapse" aria-labelledby="headingEight" data-parent="#accordion2">
                <div class="card-body">
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($office_agent_errors['payments'] ?? [] as $payment)
                                <li>{{$payment}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
