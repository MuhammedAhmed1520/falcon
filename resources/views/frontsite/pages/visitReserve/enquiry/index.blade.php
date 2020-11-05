@extends('frontsite.layouts.master')

@section('content')
    <div id="services" class="section is-gray has-title">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    @include('frontsite.includes.inner_environmental_breadcrumb')
                </div>
            </div>
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        {{--                        <span class="section-title">المخالفات</span>--}}
                        {{--                        <h5 class="small-headline">نظام المخالفات</h5>--}}
                        <h3>تصريح دخول للمحميات الطبيعية</h3>
                        <h3>Application for a pass to enter Protected Areas - Kuwait</h3>
                        <p>
                            طلب اصدار تصريح دخول محمية الجهراء (رصد وتوثيق من قبل هواة التصوير)
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="columns is-multiline mt-2">
                <div class="column is-12">
                    @include('frontsite.includes.alerts')
                </div>

                <div class="column is-12">

                    {{Form::open([
                        'method'=>'post',
                        'route'=>'handle-create-visit',
                        'id'=>'form',
                        'files' => true

                    ])}}

                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <div class="has-text-centered">
                                                <h1>البيانات الشخصية</h1>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table is-bordered has-text-centered is-narrow is-hoverable is-fullwidth">
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            الاسم / Name
                                                            <span class="tag color-red">*</span>

                                                        </td>
                                                        <td>
                                                            <input type="text" name="name" class="ui-input"
                                                                   value="{{old('name')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('name'))
                                                                <span class="tag color-red">{{$errors->first('name')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            رقم الهاتف / Phone
                                                            <span class="tag color-red">*</span>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="phone" class="ui-input"
                                                                   value="{{old('phone')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('phone'))
                                                                <span class="tag color-red">{{$errors->first('phone')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            البريد الالكترونى  / Email
                                                            <span class="tag color-red">*</span>

                                                        </td>
                                                        <td>
                                                            <input type="text" name="email" class="ui-input"
                                                                   value="{{old('email')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('email'))
                                                                <span class="tag color-red">{{$errors->first('email')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            حسابات وسائل التواصل / Social Media
                                                            <span class="tag color-red">*</span>

                                                        </td>
                                                        <td>
                                                            <textarea type="text" name="social_media" class="ui-input"
                                                                      autocomplete="off">{{old('social_media')}}</textarea>
                                                            @if($errors->has('social_media'))
                                                                <span class="tag color-red">{{$errors->first('social_media')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            صورة من البطاقة المدنية او الجواز / Copy Of Civil Id Or Passport
                                                            <span class="tag color-red">*</span>

                                                        </td>
                                                        <td>
                                                            <input type="file" name="ssn_file" class="ui-input"
                                                                   autocomplete="off">
                                                            @if($errors->has('ssn_file'))
                                                                <span class="tag color-red">{{$errors->first('ssn_file')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            صورة من كتاب الطلب للفرق والجهات/ Attach a Letter of Request for Groups, Private, or
                                                            Gov. Body
{{--                                                            <span class="tag color-red">*</span>--}}

                                                        </td>
                                                        <td>
                                                            <input type="file" name="book_file" class="ui-input"
                                                                   autocomplete="off">
                                                            @if($errors->has('book_file'))
                                                                <span class="tag color-red">{{$errors->first('book_file')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <div class="has-text-centered">
                                                <h1>البيانات</h1>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table is-bordered has-text-centered is-narrow is-hoverable is-fullwidth">
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            نوع الجهة / Type Of Institution
                                                            <span class="tag color-red">*</span>
                                                        </td>
                                                        <td>
                                                            <br>

                                                            <input type="radio" id="govern" @if(old('type_of_institution','govern') == "govern") checked @endif name="type_of_institution" value="govern">
                                                            <label for="govern">
                                                                جهة حكومية/ Body Governmental
                                                            </label><br>

                                                            <input type="radio" id="private"@if(old('type_of_institution','govern') == "private") checked @endif name="type_of_institution" value="private">
                                                            <label for="private">
                                                                جهة خاصة/ Private Entity
                                                            </label><br>

                                                            <input type="radio" id="group" @if(old('type_of_institution','govern') == "group") checked @endif name="type_of_institution" value="group">
                                                            <label for="group">
                                                                فريق / Group
                                                            </label><br>

                                                            <input type="radio" id="personal"@if(old('type_of_institution','govern') == "personal") checked @endif name="type_of_institution" value="personal">
                                                            <label for="personal">
                                                                شخصى / Personal
                                                            </label><br>

                                                            @if($errors->has('type_of_institution'))
                                                                <span class="tag color-red">{{$errors->first('type_of_institution')}}</span>
                                                            @endif
                                                            <br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            اسم الجهة / Name Of Institution
                                                            <span class="tag color-red">*</span>
                                                        </td>
                                                        <td>
                                                            <input type="text" required name="name_of_institution"
                                                                   class="ui-input"
                                                                   value="{{old('name_of_institution')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('name_of_institution'))
                                                                <span class="tag color-red">{{$errors->first('name_of_institution')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                             الغرض من الزيارة / Purpose Of Visit
                                                            <span class="tag color-red">*</span>
                                                        </td>
                                                        <td>
                                                            <br>

                                                            <input type="radio" id="photography" @if(old('purpose_of_visit','photography') == "photography") checked @endif name="purpose_of_visit" value="photography">
                                                            <label for="photography">
                                                                التصوير / Photography
                                                            </label><br>

                                                            <input type="radio" id="educational"@if(old('purpose_of_visit','govern') == "educational") checked @endif name="purpose_of_visit" value="educational">
                                                            <label for="educational">
                                                                 زيارة تعليمية/  Educational Purpose
                                                            </label><br>

                                                            <input type="radio" id="scientific" @if(old('purpose_of_visit','govern') == "scientific") checked @endif name="purpose_of_visit" value="scientific">
                                                            <label for="scientific">
                                                                ابحاث علمية / Scientific Research
                                                            </label><br>

                                                            @if($errors->has('purpose_of_visit'))
                                                                <span class="tag color-red">{{$errors->first('purpose_of_visit')}}</span>
                                                            @endif
                                                            <br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                             مدة التصريح  / Duration Of Visit
                                                            <span class="tag color-red">*</span>
                                                        </td>
                                                        <td>
                                                            <br>

                                                            <input type="radio" id="day" @if(old('duration_of_visit','day') == "day") checked @endif name="duration_of_visit" value="day">
                                                            <label for="day">
                                                                1
                                                                يوم / Day
                                                            </label><br>

                                                            <input type="radio" id="week"@if(old('duration_of_visit','day') == "week") checked @endif name="duration_of_visit" value="week">
                                                            <label for="week">
                                                                1
                                                                اسبوع /  Week
                                                            </label><br>

                                                            <input type="radio" id="month" @if(old('duration_of_visit','day') == "month") checked @endif name="duration_of_visit" value="month">
                                                            <label for="month">
                                                                1
                                                                 شهر / Month
                                                            </label><br>

                                                            <input type="radio" id="3-month" @if(old('duration_of_visit','day') == "3-month") checked @endif name="duration_of_visit" value="3-month">
                                                            <label for="3-month">
                                                                3
                                                                شهور / Month
                                                            </label><br>
                                                            @if($errors->has('duration_of_visit'))
                                                                <span class="tag color-red">{{$errors->first('duration_of_visit')}}</span>
                                                            @endif
                                                            <br>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            تاريخ الزيارة  / Date Of Visit
                                                            <span class="tag color-red">*</span>
                                                        </td>
                                                        <td>
                                                            <input type="date" name="date_of_visit" class="ui-input"
                                                                   value="{{old('date_of_visit')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('date_of_visit'))
                                                                <span class="tag color-red">{{$errors->first('date_of_visit')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                             الموسم  / Season
                                                        </td>
                                                        <td>
                                                            <br>
                                                            <input type="checkbox" @if(in_array("spring_season",old('season',[])))checked @endif id="spring" name="season[]" value="spring_season">
                                                            <label for="spring">
                                                                Spring Season
                                                            </label><br>

                                                            <input type="checkbox"@if(in_array("autumn_season",old('season',[])))checked @endif id="autumn" name="season[]" value="autumn_season">
                                                            <label for="autumn">
                                                                Autumn Season
                                                            </label><br>

                                                            <input type="checkbox"@if(in_array("winter_season",old('season',[])))checked @endif id="winter" name="season[]" value="winter_season">
                                                            <label for="winter">
                                                                Winter Season
                                                            </label><br>

                                                            <input type="checkbox"@if(in_array("summer_season",old('season',[])))checked @endif id="summer" name="season[]" value="summer_season">
                                                            <label for="summer">
                                                                Summer Season
                                                            </label><br>

                                                            @if($errors->has('season'))
                                                                <span class="tag color-red">{{$errors->first('season')}}</span>
                                                            @endif
                                                            <br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            الادوات المستخدمة  / Equipment Used
                                                            <span class="tag color-red">*</span>

                                                        </td>
                                                        <td>
                                                            <br>
                                                            <input type="checkbox"@if(in_array("camera",old('equipment_used',[])))checked @endif  id="camera" name="equipment_used[]" value="camera">
                                                            <label for="camera">
                                                                كاميرا / Cameras
                                                            </label><br>

                                                            <input type="checkbox"@if(in_array("spotting",old('equipment_used',[])))checked @endif  id="spotting" name="equipment_used[]" value="spotting">
                                                            <label for="spotting">
                                                                منظار احادى / Spotting Scope
                                                            </label><br>

                                                            <input type="checkbox"@if(in_array("binoculars",old('equipment_used',[])))checked @endif  id="binoculars" name="equipment_used[]" value="binoculars">
                                                            <label for="binoculars">
                                                                منظار /  Binoculars

                                                            </label><br>

                                                            <input type="checkbox"@if(in_array("other",old('equipment_used',[])))checked @endif  id="other" name="equipment_used[]" value="other">
                                                            <label for="other">
                                                                اخرى /  Other
                                                            </label><br>

                                                            @if($errors->has('equipment_used'))
                                                                <span class="tag color-red">{{$errors->first('equipment_used')}}</span>
                                                            @endif
                                                            <br>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                              نوع وطراز الاداة /  Model of the Equipment
                                                            <span class="tag color-red">*</span>

                                                        </td>
                                                        <td>
                                                            <textarea type="text" name="model_of_the_equipment" class="ui-input"
                                                                      autocomplete="off">{{old('model_of_the_equipment')}}</textarea>
                                                            @if($errors->has('model_of_the_equipment'))
                                                                <span class="tag color-red">{{$errors->first('model_of_the_equipment')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <div class="has-text-centered">
                                                <h1>بيانات المركبة</h1>
                                                <p>
                                                   يسمح فقط للمركبات المسجلة بدخول المحمية
                                                </p>
                                                <p>
                                                    only valid Registered vehicle are allowed to enter the Reserve
                                                </p>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table is-bordered has-text-centered is-narrow is-hoverable is-fullwidth">
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            رقم اللوحة / Vehicle Plate No
                                                            <span class="tag color-red">*</span>

                                                        </td>
                                                        <td>
                                                            <input type="text" name="plate_no" class="ui-input"
                                                                   value="{{old('plate_no')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('plate_no'))
                                                                <span class="tag color-red">{{$errors->first('plate_no')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            نوع وطراز المركبة  / Vehicle Model
                                                            <span class="tag color-red">*</span>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="vehicle_model" class="ui-input"
                                                                   value="{{old('vehicle_model')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('vehicle_model'))
                                                                <span class="tag color-red">{{$errors->first('vehicle_model')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="columns">--}}
{{--                        <div class="column is-12-desktop">--}}
{{--                            <a href="{{asset('storage/files/visits/إقرار وتعهد بالتعليمات الخاصة لمحمية الج EN.docx')}}" class="btn">--}}
{{--                                تحميل الاقرار باللغة العربية--}}
{{--                            </a>--}}
{{--                            <a href="{{asset('storage/files/visits/التعليمات الخاصة لمحمية الجهراء الطبيعية AR.docx')}}" class="btn">--}}
{{--                                تحميل الاقرار باللغة الانجليزية--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <a class = "button is-primary modal-button " style="display: none" data-target = "#modal">Launch Card modal</a>

                    <div class="columns">
                        <div class="column is-12-desktop">
                            <input type="checkbox" id="aggree" value="1">
                            <label for="aggree">
                                أقر بأن بياناتي المسجلة إعلاه صحيحة
                            </label>
                        </div>
                    </div>

                    @if(getConfig('LARAVEL_CAPATCHA'))
                        <div class="columns" style="padding: 15px">
                            {{captcha_img('flat')}}
                            <div class="column is-2-desktop" style="padding: 0;height: 46px">

                                <input type="text" name="captcha" class="ui-input" placeholder="ادخل رمز التحقيق:*"
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
                                <input type="submit" id="s_btn" class="btn is-disabled" disabled
                                       value="ارسال"/>
                            @else
                                <input type="submit" class="btn" value="ارسال">
                            @endif
                        </div>
                    </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>


    </div>

    @include('frontsite.pages.visitReserve.enquiry.modal')


@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?hl=ar"></script>
{{--    {{Html::script('assets/js/jquery.sweet-modal.min.js')}}--}}
{{--    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).ready(function () {
            $(".modal-button").click(function() {
                var target = $(this).data("target");
                $("html").addClass("is-clipped");
                $(target).addClass("is-active");
            });

            {{--$('#form').on('submit',function (e) {--}}
            {{--    var form = this;--}}
            {{--    e.preventDefault();--}}
            {{--    var cost = 1;--}}
            {{--    var duration = $('input[name="duration_of_visit"]:checked').val();--}}
            {{--    console.log(duration);--}}
            {{--    if (duration == 'day'){--}}
            {{--        cost = 1;--}}
            {{--    }--}}
            {{--    if (duration == 'week'){--}}
            {{--        cost = 3;--}}
            {{--    }--}}
            {{--    if (duration == 'month'){--}}
            {{--        cost = 5;--}}
            {{--    }--}}
            {{--    if (duration == '3-month'){--}}
            {{--        cost = 10;--}}
            {{--    }--}}

            {{--    swal.fire({--}}
            {{--        type: 'warning',--}}
            {{--        title: `برجاء العلم انه سيتم مراجعة الطلب وارسال بريد الكترونى لاستكمل الطلب ودفع ${cost} دينار `,--}}
            {{--        showCancelButton: true,--}}
            {{--        confirmButtonText: '{{__('violation.yes')}}',--}}
            {{--        cancelButtonText: '{{__('violation.no')}}',--}}
            {{--        showLoaderOnConfirm: true,--}}
            {{--        preConfirm: function (allow) {--}}
            {{--            if (allow) {--}}
            {{--                form.submit();--}}
            {{--            }--}}
            {{--        },--}}
            {{--        allowOutsideClick: function() {!Swal.isLoading()}--}}
            {{--    }).then(function (result) {--}}
            {{--        if (result.value) {--}}
            {{--            // Swal.fire({--}}
            {{--            //     title: `${result.value.login}'s avatar`,--}}
            {{--            //     imageUrl: result.value.avatar_url--}}
            {{--            // })--}}
            {{--        }--}}
            {{--    })--}}
            {{--})--}}

            // $(".modal-button-close").click(function() {
            //     console.log('exist');
            //     $("html").removeClass("is-clipped");
            //     $("#modal").removeClass("is-active");
            // });

        });
    </script>
    <script>
        function closeModal(event,agree){
            if(agree == 1){
                $('#aggree').prop('checked', true); // Unchecks it
            }else{
                $('#aggree').prop('checked', false); // Checks it
            }
            $('#aggree').trigger('change');
            $("html").removeClass("is-clipped");
            $("#modal").removeClass("is-active");
        }

        function openTab(evt, tabName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("content-tab");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tab");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" is-active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " is-active";
        }


        let capatcha = null;

        function correctCaptcha(response) {
            if (response) {
                capatcha = response;
                // $('#s_btn').removeClass('is-disabled');
                // $('#s_btn').prop('disabled', false);
                if ($('#aggree').prop("checked") == true){
                    $('#s_btn').removeClass('is-disabled');
                    $('#s_btn').prop('disabled', false);
                }
                // $('#aggree').trigger('change')
            }
        };

        $('#aggree').change(function () {
            if (this.checked) {
                $(".modal-button").click();
                if (capatcha) {
                    $('#s_btn').removeClass('is-disabled');
                    $('#s_btn').prop('disabled', false);
                    return
                }
                $('#s_btn').addClass('is-disabled');
                $('#s_btn').prop('disabled', true);

            }
        })



    </script>
@endsection
@section('styles')
    <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <style>
            .customClass{
                font-size: 20px;
                font-weight: bold;
            }
        .modal-content{
            width: 100%;
        }
        </style>
@endsection
