@extends('portal.layouts.master')
@section('styles')
    {{Html::style('assets/css/font-fileuploader.css')}}
    {{Html::style('assets/css/jquery.fileuploader.min.css')}}
    <style>
        h4 {
            font-size: 20px;
        }
    </style>
@endsection
@section('content')
    <div id="services" class="section is-gray has-title">
        <div class="container-fluid">
            <div class="row direction">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        <!--<span class="section-title">الشهادات</span>-->
                        <!--<h5 class="small-headline">نظام الشهادات</h5>-->
                        <h2 class="font-weight-bold">{{__('portal.new_request')}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mb-5">
            <div class="row direction mt-2">
                <div class="col-md-12 is-12">
                    @include('portal.includes.alerts')
                </div>
                <div class="col-md-12 is-12-desktop">
                    @include('portal.pages.certificate.menu')
                </div>

                <div class="col-md-12">
                    {{Form::open([
                        'method'=>'post',
                        'route'=>['post-update-portal-certificate',$request->id],
                        'enctype'=>'multipart/form-data'
                    ])}}

                    <div class="row direction mt-2">
                        <div class="col-md-6 mt-1">
                            <input type="text" name="company_name" class="ui-input"
                                   placeholder="{{__('portal.company_name')}}"
                                   required=""
                                   value="{{$request->company_name}}"
                                   autocomplete="off">
                            @if($errors->has('company_name'))
                                <span class="tag color-red">{{$errors->first('company_name')}}</span>
                            @endif
                        </div>
                        <div class="col-md-6 mt-1">
                            <input type="text" name="owner_name" class="ui-input"
                                   placeholder="{{__('portal.company_owner_name')}}"
                                   value="{{$request->owner_name}}"
                                   autocomplete="off">
                            @if($errors->has('owner_name'))
                                <span class="tag color-red">{{$errors->first('owner_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row direction mt-2">
                        <div class="col-md-6 mt-1">
                            <input type="text" name="license_number" class="ui-input"
                                   placeholder="{{__('portal.license_number')}}"
                                   required=""
                                   value="{{$request->license_number}}"
                                   autocomplete="off">
                            @if($errors->has('license_number'))
                                <span class="tag color-red">{{$errors->first('license_number')}}</span>
                            @endif
                        </div>
                        <div class="col-md-6 mt-1">
                            <input type="text" name="civil_ssn" class="ui-input arabicnumber"
                                   placeholder="{{__('portal.civil_id')}}"
                                   required=""
                                   value="{{$request->civil_ssn}}"
                                   autocomplete="off">
                            @if($errors->has('civil_ssn'))
                                <span class="tag color-red">{{$errors->first('civil_ssn')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row direction mt-2">
                        <div class="col-md-6 mt-1">
                            <input type="email" name="email" class="ui-input" placeholder="{{__('portal.email')}}"
                                   required=""
                                   value="{{$request->email}}"
                                   autocomplete="off">
                            @if($errors->has('email'))
                                <span class="tag color-red">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-1 col-md-6">
                            <input type="text" name="mobile" class="ui-input" placeholder="{{__('portal.mobile')}}"
                                   required=""
                                   value="{{$request->mobile}}"
                                   autocomplete="off">
                            @if($errors->has('mobile'))
                                <span class="tag color-red">{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                        <div class="mt-1 col-md-6">
                            <input type="tel" name="phone" class="ui-input arabicnumber"
                                   placeholder="{{__('portal.phone')}}"
                                   required=""
                                   value="{{$request->phone}}"
                                   autocomplete="off">
                            @if($errors->has('phone'))
                                <span class="tag color-red">{{$errors->first('phone')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="mt-1 col-md-6">
                            <select name="request_party_id" class="ui-input" required="">
                                <option hidden>{{__('portal.request_party')}}  </option>
                                @foreach($party as $item)
                                    <option value="{{$item->id}}"
                                            @if($request->request_party_id == $item->id)
                                            selected
                                        @endif
                                    >{{$item->name_ar}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('request_party_id'))
                                <span class="tag color-red">{{$errors->first('request_party_id')}}</span>
                            @endif
                        </div>
                        <div class="mt-1 col-md-6">
                            <input type="text" name="request_party_name" class="ui-input arabicnumber"
                                   placeholder="{{__('portal.request_party_name')}}"
                                   required=""
                                   value="{{$request->request_party_name}}"
                                   autocomplete="off">
                            @if($errors->has('request_party_name'))
                                <span class="tag color-red">{{$errors->first('request_party_name')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="mt-1 col-md-6">
                            <select name="reason_id" id="reason_id" class="ui-input" required="">
                                <option hidden>{{__('portal.reason')}}  </option>
                                @foreach($reason as $item)
                                    <option value="{{$item->id}}"
                                            @if($request->reason_id == $item->id)
                                            selected
                                        @endif
                                    >{{$item->name_ar}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('reason_id'))
                                <span class="tag color-red">{{$errors->first('reason_id')}}</span>
                            @endif
                        </div>

                    </div>
                    <div class="row">
                        <div class="mt-1 col-md-6 reason">
                            <textarea name="reason_desc"
                                      placeholder="{{__('portal.reason')}}"
                                      class="ui-input arabicnumber"
                                      value="{{$request->reason_desc}}"></textarea>
                            @if($errors->has('reason_desc'))
                                <span class="tag color-red">{{$errors->first('reason_desc')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="mt-1 col-md-6">
                                    <div class="shadow-lg p-3 ">
                                        <h4>
                                            <b>{{__('certificate.license_file')}}
                                                <star>*</star>
                                            </b>
                                        </h4>
                                        @if($errors->has('license_file'))
                                            <span class="has-text-danger">({{$errors->first('license_file')}})</span>
                                        @endif
                                        <br>
                                        <input type="file" name="license_file">
                                        <br>
                                        <a href="{{$request->file_detail[0]->file}}" class="btn btn-primary"
                                           target="_blank">عرض</a>
                                        <br><br>

                                    </div>
                                </div>
                                <div class="mt-1 col-md-6">
                                    <div class="shadow-lg p-3 ">
                                        <h4>
                                            <b>{{__('certificate.signature_file')}}
                                                <star>*</star>
                                            </b>
                                        </h4>
                                        @if($errors->has('signature_file'))
                                            <span class="has-text-danger">({{$errors->first('signature_file')}})</span>
                                        @endif
                                        <br>
                                        <input type="file" name="signature_file">
                                        <br>
                                        <a href="{{$request->file_detail[1]->file}}" class="btn btn-primary"
                                           target="_blank">عرض</a>
                                        <br><br>

                                    </div>
                                </div>
                                <div class="mt-1 col-md-6">
                                    <div class="shadow-lg p-3 ">
                                        <h4>
                                            <b>{{__('certificate.civil_ssn_file')}}
                                                <star>*</star>
                                            </b>
                                        </h4>
                                        @if($errors->has('civil_ssn_file'))
                                            <span class="has-text-danger">({{$errors->first('civil_ssn_file')}})</span>
                                        @endif
                                        <br>
                                        <input type="file" name="civil_ssn_file">
                                        <br>
                                        <a href="{{$request->file_detail[2]->file}}" class="btn btn-primary"
                                           target="_blank">عرض</a>
                                        <br><br>

                                    </div>
                                </div>
                                <div class="mt-1 col-md-6">
                                    <div class="shadow-lg p-3 ">
                                        <h4>
                                            <b>{{__('certificate.other_file')}}
                                                <star>*</star>
                                            </b>
                                        </h4>
                                        @if($errors->has('other_file'))
                                            <span class="has-text-danger">({{$errors->first('other_file')}})</span>
                                        @endif
                                        <br>
                                        <input type="file" name="other_file">
                                        <br>
                                        @if($request->file_detail[3]->file ?? null)
                                            <a href="{{$request->file_detail[3]->file}}" class="btn btn-primary"
                                               target="_blank">عرض</a>
                                            <br><br>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    @if(getConfig('LARAVEL_CAPATCHA'))
                        <div class="columns" style="padding: 15px">
                            {{captcha_img('flat')}}
                            <div class="column is-2-desktop" style="padding: 0;height: 46px">
                                <input type="text" name="captcha" class="ui-input"
                                       placeholder="{{__('portal.captcha')}}"
                                       required=""
                                       value="{{old('captcha')}}"
                                       autocomplete="off">
                                @if($errors->has('captcha'))
                                    <span class="tag color-red">{{$errors->first('captcha')}}</span>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                        <div class="columns">
                            <div class="column">
                                <div class="g-recaptcha" data-sitekey="{{getConfig('GOOGLE_RECAPTCHA_KEY')}}"
                                     data-callback="correctCaptcha"></div>
                                @if($errors->has('g-recaptcha-response'))
                                    <span class="tag color-red">{{$errors->first('g-recaptcha-response')}}</span>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="columns is-multiline">
                        <div class="column has-text-centered">
                            @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                                <input type="submit" id="s_btn" class="btn btn-danger is-disabled" disabled
                                       value="{{__('portal.create')}}">
                            @else
                                <input type="submit" class="btn btn-danger" value="{{__('portal.create')}}">
                            @endif
                        </div>
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>


    </div>


@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?hl={{app()->getLocale()}}"></script>
    {{Html::script('assets/js/jquery.fileuploader.min.js')}}

    <script>

        function correctCaptcha(response) {
            console.log(response)
            if (response) {
                $('#s_btn').removeClass('is-disabled');
                $('#s_btn').prop('disabled', false);
            }

        };

        @if(old('ssn'))
        @endif
        @if(old('data') || old('type'))
        @endif
        $(document).ready(function () {

            $('input[type="file"]').fileuploader({
                addMore: false,
                limit: 1,
                // extensions: ['jpg', 'jpeg', 'png', 'pdf'],
                inputNameBrackets: true
            });

            $('.reason').hide();
            $('#reason_id').change(function () {
                let reason_id = $(this).val();
                console.log(reason_id);
                if (reason_id == 2) {
                    $('.reason').show();
                } else {
                    $('.reason').hide();
                }

            });
        });
    </script>
@endsection
