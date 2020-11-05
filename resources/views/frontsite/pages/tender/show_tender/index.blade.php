@extends('frontsite.layouts.master')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
@endsection
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
                        <h3>عرض تفاصيل الممارسات </h3>
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
                    @if($tender)
                        <nav class="panel ">
                            <b class="panel-heading">
                                <i class="icon icon-eye has-text-link"></i> عرض تفاصيل الممارسة
                            </b>
                            <table class="table" style="width: 100%;border: 1px dashed #ccc;margin-top: 8px">
                                <tbody>
                                <tr>
                                    <td>
                                        <strong>رقم الممارسة</strong>
                                    </td>
                                    <td>{{$tender->number}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>موضوع الممارسة</strong>
                                    </td>
                                    <td>{{$tender->title_ar}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>تاريخ بداية الطرح</strong>
                                    </td>
                                    <td>{{$tender->open_date}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>تاريخ انتهاء الممارسة</strong>
                                    </td>
                                    <td>{{$tender->last_app_date}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>تاريخ الاجتماع التمهيدي</strong>
                                    </td>
                                    <td>{{$tender->meeting_date}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>السعر</strong>
                                    </td>
                                    <td>{{$tender->price}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>التأمين</strong>
                                    </td>
                                    <td>{{$tender->insurance}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>الحالة</strong>
                                    </td>
                                    <td>
                                        <span class="tag is-dark">{{$tender->status->title_ar ?? ''}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>قابل للتجزئة</strong>
                                    </td>
                                    <td>@if($tender->allow_division) <i class="icon icon-check"></i> @else
                                            <b>x</b>  @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>العروض بديلة</strong>
                                    </td>
                                    <td>@if($tender->allow_alternative) <i class="icon icon-check"></i> @else
                                            <b>x</b> @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </nav>

                        @if(count($tender->file ?? []) > 0)
                            <nav class="panel ">
                                <b class="panel-heading">
                                    <i class="icon icon-file-text has-text-link"></i> ملفات خاصة بالممارسة
                                </b>
                                <table class="table" style="width: 100%;border: 1px dashed #ccc;margin-top: 8px">
                                    <tbody>
                                    @foreach($tender->file as $file)
                                        <tr>
                                            <td>
                                                <strong>{{$file->placement->title_ar ?? ''}}</strong>
                                            </td>
                                            <td>
                                                <a href="{{$file->file ?? ''}}">
                                                    تحميل <i class="icon icon-cloud-drizzle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </nav>
                        @endif

                        @if(count($tender->getApplication ?? []) > 0)
                            <nav class="panel ">
                                <b class="panel-heading">
                                    <i class="icon icon-command has-text-link"></i> العروض المقدمة
                                </b>
                                <table class="table" style="width: 100%;border: 1px dashed #ccc;margin-top: 8px">
                                    <thead>
                                    <tr>
                                        <th>اسم الشركة</th>
                                        <th>التاريخ</th>
                                        <th>المبلغ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tender->getApplication as $app)
                                        <tr>
                                            <td>
                                                <strong>{{$app->buyer->company->name ?? ''}}</strong>
                                            </td>
                                            <td>
                                                {{$app->submit_date ?? ''}}
                                            </td>
                                            <td>
                                                {{$app->price ?? ''}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </nav>
                        @endif

                        @if(count($tender->getWinner ?? []) > 0)
                            <nav class="panel ">
                                <b class="panel-heading">
                                    <i class="icon icon-gift has-text-link"></i> الفائزين
                                </b>
                                <table class="table" style="width: 100%;border: 1px dashed #ccc;margin-top: 8px">
                                    <thead>
                                    <tr>
                                        <th>اسم الشركة</th>
                                        <th>السبب</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tender->getWinner as $winner)
                                        <tr>
                                            <td>
                                                <strong>{{$winner->application->buyer->company->name ?? ''}}</strong>
                                            </td>
                                            <td>
                                                {{$winner->reason->reason ?? ''}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </nav>
                        @endif


                        @if($tender->status->title == 'available')
                            @if($errors->has('reference_code'))
                                <div class="message is-danger">
                                    <h4 class="message-header">{{$errors->first('reference_code')}}</h4>
                                </div>
                            @endif
                            @if($errors->has('notes'))
                                <div class="message is-danger">
                                    <h4 class="message-header">{{$errors->first('notes')}}</h4>
                                </div>
                            @endif
                            <div class="tabs is-centered">
                              <ul>
                                <li class="is-active">
                                  <a href="{{route('frontTenderShowTenderDetails',['id'=>request()->id])}}">
                                    <span class="icon is-small"><i class="icon icon-credit-card" aria-hidden="true"></i> </span>
                                    <span>شراء كراسة الشروط</span>
                                  </a>
                                </li>
                                <li>
                                  <a href="{{route('frontTenderShowTenderDetailsPostpone',['id'=>request()->id])}}">
                                    <span class="icon is-small"><i class="icon icon-file-text" aria-hidden="true"></i> </span>
                                    <span>طلب مد فترة العطاء</span>
                                  </a>
                                </li> 
                              </ul>
                            </div>
                            <div class="columns is-multiline"> 
                                <div class="column is-12-desktop">
                                    {{Form::open([
                                        'route'=>'handleTenderFilePayment',
                                        'method'=>'post',
                                    ])}} 
                                    <input type="hidden" name="tender_id" value="{{request()->id}}">
                                    <div class="columns is-multiline">
                                        <div class="column is-8-desktop">
                                            <input type="text" name="reference_code"
                                                   class="ui-input has-text-weight-bold has-text-info"
                                                   placeholder="الرقم المرجعي:*" required="" value=""
                                                   autocomplete="off">
                                        </div>

                                        @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                                            <div class="column is-12-desktop">
                                                <div class="g-recaptcha" data-sitekey="{{getConfig('GOOGLE_RECAPTCHA_KEY')}}"
                                                     data-callback="correctCaptcha"></div>
                                                @if($errors->has('g-recaptcha-response'))
                                                    <span class="tag color-red">{{$errors->first('g-recaptcha-response')}}</span>
                                                @endif
                                            </div>
                                        @endif

                                        @if(getConfig('LARAVEL_CAPATCHA'))
                                            <div class="column is-6-desktop" style="padding: 15px">
                                                <div class="columns is-multiline">
                                                    {{captcha_img('flat')}}
                                                    <div class="column is-5-desktop" style="padding: 0;height: 46px">

                                                        <input type="text" name="captcha" class="ui-input"
                                                               placeholder="ادخل رمز التحقيق:*"
                                                               required="" 
                                                               autocomplete="off">
                                                        @if($errors->has('captcha'))
                                                            <span class="tag color-red">{{$errors->first('captcha')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="column has-text-centered">
                                            @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                                                <input type="submit" id="s_btn" class="btn is-disabled" disabled
                                                       value="شراء">
                                            @else
                                                <input type="submit" class="btn" value="شراء">
                                            @endif
                                        </div>
                                    </div>
                                    {{Form::close()}}
                                </div> 
                            </div>

                        @endif

                    @endif
                </div>
            </div>
        </div>

    </div>


@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?hl=ar"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>

        function correctCaptcha(response) {
            console.log(response)
            if (response) {
                $('#s_btn').removeClass('is-disabled');
                $('#s_btn').prop('disabled', false);
            }

        };

        function correctCaptcha2(response) {
            console.log(response)
            if (response) {
                $('#s_btn2').removeClass('is-disabled');
                $('#s_btn2').prop('disabled', false);
            }

        };
    </script>
    <script>
        $(document).ready(function () {
            $('.date_time').flatpickr({
                defaultDate: "today",
                enableTime: true,
                dateFormat: "Y-m-d H:i",

            });
        });
    </script>
@endsection
