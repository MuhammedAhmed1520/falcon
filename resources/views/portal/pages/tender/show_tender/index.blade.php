@extends('portal.layouts.master')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
@endsection
@section('content')


    <div id="services" class="section is-gray has-title">

        <div class="container-fluid">
            <div class="row direction">
                <div class="col-md-12">
                    <div class="text-center">
                        <h2 class="font-weight-bold">{{__('portal.show_details')}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mb-5">
            <div class="row direction mt-2">

                <div class="col-md-12">
                    @include('portal.pages.tender.menu')
                </div>
                <div class="col-md-12">
                    @include('portal.includes.alerts')
                </div>

                <div class="col-md-12">
                    @if($tender)
                        <nav class="panel ">
                            <b class="panel-heading">
                                <i class="icon icon-eye has-text-link"></i> {{__('portal.show_tender_details')}}
                            </b>
                            <table class="table" style="width: 100%;border: 1px dashed #ccc;margin-top: 8px">
                                <tbody>
                                <tr>
                                    <td>
                                        <strong>{{__('portal.number')}}</strong>
                                    </td>
                                    <td>{{$tender->number}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>{{__('portal.subject')}}  </strong>
                                    </td>
                                    <td>{{$tender->title_ar}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>{{__('portal.open_date')}}</strong>
                                    </td>
                                    <td>{{$tender->open_date}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>{{__('portal.closing_date')}}</strong>
                                    </td>
                                    <td>{{$tender->last_app_date}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>{{__('portal.meeting_date')}}</strong>
                                    </td>
                                    <td>{{$tender->meeting_date}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>{{__('portal.price')}}</strong>
                                    </td>
                                    <td>{{$tender->price}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>{{__('portal.insurance')}}</strong>
                                    </td>
                                    <td>{{$tender->insurance}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>{{__('portal.status')}}</strong>
                                    </td>
                                    <td>
                                        <span class="tag is-dark">{{$tender->status->title_ar ?? ''}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>{{__('portal.allow_division')}}</strong>
                                    </td>
                                    <td>@if($tender->allow_division) <i class="icon icon-check"></i> @else
                                            <b>x</b>  @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>{{__('portal.allow_alternative')}}  </strong>
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
                                    <i class="icon icon-file-text has-text-link"></i>   {{__('portal.files')}}
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
                                                    {{__('portal.download')}} <i class="icon icon-cloud-drizzle"></i>
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
                                    <i class="icon icon-command has-text-link"></i>
                                    {{__('portal.applications')}}
                                </b>
                                <table class="table" style="width: 100%;border: 1px dashed #ccc;margin-top: 8px">
                                    <thead>
                                    <tr>
                                        <th>{{__('portal.company_name')}}  </th>
                                        <th>{{__('portal.date')}}</th>
                                        <th>{{__('portal.amount')}}</th>
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
                                    <i class="icon icon-gift has-text-link"></i> {{__('portal.winners')}}
                                </b>
                                <table class="table" style="width: 100%;border: 1px dashed #ccc;margin-top: 8px">
                                    <thead>
                                    <tr>
                                        <th>{{__('portal.company_name')}}</th>
                                        <th>{{__('portal.reason')}}</th>
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
                                    <h4 class="message-header text-danger">{{$errors->first('reference_code')}}</h4>
                                </div>
                            @endif
                            @if($errors->has('notes'))
                                <div class="message is-danger">
                                    <h4 class="message-header text-danger">{{$errors->first('notes')}}</h4>
                                </div>
                            @endif
                            <div class="tabs is-centered">
                                <ul>
                                    <li class="is-active">
                                        <a href="{{route('frontTenderShowTenderDetailsPortal',['id'=>request()->id])}}">
{{--                                            <span class="icon is-small"><i class="icon icon-credit-card"--}}
{{--                                                                           aria-hidden="true"></i> </span>--}}
                                            <h4> {{__('portal.buy_book')}} </h4>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('frontTenderShowTenderDetailsPostponePortal',['id'=>request()->id])}}">
{{--                                            <span class="icon is-small"><i class="icon icon-file-text"--}}
{{--                                                                           aria-hidden="true"></i> </span>--}}
                                            <h4> {{__('portal.postpone_tender')}} </h4>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="columns is-multiline">
                                <div class="column is-12-desktop">
                                    {{Form::open([
                                        'route'=>'handleTenderFilePaymentPortal',
                                        'method'=>'post',
                                    ])}}
                                    <input type="hidden" name="tender_id" value="{{request()->id}}">
                                    <div class="row is-multiline">
                                        <div class="col-md-7">
                                            <input type="text" name="reference_code"
                                                   class="ui-input has-text-weight-bold has-text-info"
                                                   placeholder="{{__('portal.code')}}" required="" value=""
                                                   autocomplete="off">
                                        </div>

                                        @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                                            <div class="col-md-12 mt-2">
                                                <div class="g-recaptcha"
                                                     data-sitekey="{{getConfig('GOOGLE_RECAPTCHA_KEY')}}"
                                                     data-callback="correctCaptcha"></div>
                                                @if($errors->has('g-recaptcha-response'))
                                                    <span
                                                        class="tag color-red">{{$errors->first('g-recaptcha-response')}}</span>
                                                @endif
                                            </div>
                                        @endif

                                        @if(getConfig('LARAVEL_CAPATCHA'))
                                            <div class="col-md-6 mt-2   " style="padding: 15px">
                                                <div class="columns is-multiline">
                                                    {{captcha_img('flat')}}
                                                    <div class="column is-5-desktop" style="padding: 0;height: 46px">

                                                        <input type="text" name="captcha" class="ui-input"
                                                               placeholder="{{__('portal.captcha')}}"
                                                               required=""
                                                               autocomplete="off">
                                                        @if($errors->has('captcha'))
                                                            <span
                                                                class="tag color-red">{{$errors->first('captcha')}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="col-md-12 text-left mt-2">
                                            @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                                                <input type="submit" id="s_btn" class="btn btn-danger is-disabled" disabled
                                                       value="{{__('portal.buy')}}">
                                            @else
                                                <input type="submit" class="btn btn-danger" value="{{__('portal.buy')}}">
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
    <script src="https://www.google.com/recaptcha/api.js?hl={{app()->getLocale()}}"></script>
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
