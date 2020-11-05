@extends('portal.layouts.master')

@section('content')
    <div id="services" class="section">
        <div class="row">
        </div>
    </div>
    <div class="container-fluid mb-5">
        <div class="row mt-2 text-left">
            <div class="col-md-12">
                <h3 class="font-weight-bold">{{__('portal.violation_enquiry_title')}}</h3>
            </div>
            <div class="col-md-12">

                {{Form::open([
                    'method'=>'post',
                    'route'=>'handleViolationEnquiryPortal'
                ])}}
                <div class="row direction">
                    <div class="col-md-12">
                        <b class="size19">{{__('portal.violation_enquiry_type')}}  </b>
                        <br><br>
                        @foreach($categories as $category)
                            <div class="radio d-inline-block pl-2">
                                <input type="radio" id="{{$category->type}}" name="category_id"
                                       value="{{$category->id}}"
                                       @if($loop->first) checked @endif >
                                <label class="size18" for="{{$category->type}}">
                                    {{__("portal.".$category->type)}}
                                </label>
                            </div>
                        @endforeach
                        @if($errors->has('category_id'))
                            <span class="tag color-red">{{$errors->first('category_id')}}</span>
                        @endif
                    </div>
                </div>


                <div class="row direction person">
                    <div class="col-md-5">
                        <input type="text" name="ssn" class="ui-input arabicnumber"
                               placeholder="{{__('portal.violation_ssn')}}"
                               value="{{old('ssn')}}"
                               autocomplete="off">
                        @if($errors->has('ssn'))
                            <span class="tag color-red">{{$errors->first('ssn')}}</span>
                        @endif
                    </div>
                </div>

                <div class="row direction">
                    <div class="col-md-5 not_person" style="display: none">
                        <b>{{__('portal.enquiry_method')}}</b>
                        <select class="ui-input" name="type">
                            <option value="ssn">{{__('portal.enquiry_by_ssn')}}</option>
                            <option value="license">{{__('portal.enquiry_by_register_no')}}</option>
                            <option value="name">{{__('portal.enquiry_by_company_name')}}</option>
                        </select>
                        @if($errors->has('type'))
                            <span class="text-danger">{{$errors->first('type')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row direction">
                    <div class="col-md-12 not_person text-left" style="display: none">
                        <b>{{__('portal.enquiry_details')}} </b>
                        <input type="text" name="data" class="ui-input text-left" placeholder="{{__('portal.enquiry_details')}}"
                               value="{{old('data')}}"
                               autocomplete="off">
                        @if($errors->has('data'))
                            <span class="text-danger">{{$errors->first('data')}}</span>
                        @endif
                    </div>
                </div>


                @if(getConfig('LARAVEL_CAPATCHA'))
                    <div class="row mt-2 direction" style="padding: 15px">
                        {{captcha_img('flat')}}
                        <div class="col-md-2" style="padding: 0;height: 46px">

                            <input type="text" name="captcha" class="ui-input" placeholder="{{__('portal.captcha')}}"
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
                    <div class="row  mt-2 direction">
                        <div class="col-md-12">
                            <div class="g-recaptcha" data-sitekey="{{getConfig('GOOGLE_RECAPTCHA_KEY')}}"
                                 data-callback="correctCaptcha"></div>
                            @if($errors->has('g-recaptcha-response'))
                                <span class="tag color-red">{{$errors->first('g-recaptcha-response')}}</span>
                            @endif
                        </div>
                    </div>
                @endif


            </div>
            <div class="col-md-12">
                <div class="text-left mt-2">
                    @if(getConfig('GOOGLE_RECAPTCHA_KEY'))
                        <input type="submit" id="s_btn" class="btn btn-danger is-disablsed" disasbled
                               value="{{__('portal.enquiry')}}">
                    @else
                        <input type="submit" class="btn btn-danger" value="{{__('portal.enquiry')}}">
                    @endif
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>


    </div>


@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?hl={{app()->getLocale()}}"></script>
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

            @if($errors->has('ssn'))
            $('.not_person').hide();
            $('.person').show();
            @endif
            @if($errors->has('data'))
            $('.not_person').show();
            $('.person').hide();
            @endif
            $('input[name="category_id"]').change(function () {


                let category = $(this).val();
                if (category == 1) {
                    $('.not_person').hide();
                    $('.person').show();
                } else {
                    $('.not_person').show();
                    $('.person').hide();
                }

            });
        });
    </script>
@endsection
