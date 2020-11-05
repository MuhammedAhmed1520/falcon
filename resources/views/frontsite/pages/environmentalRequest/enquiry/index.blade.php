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
                        <h3> استمارة طلب بيانات بيئية</h3>
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
                        'route'=>'handle-environmental-request',
                        'id'=>'form'
                    ])}}

                    <div class="columns">
                        <div class="column">
                            <div class="box">
                                <div class="media">
                                    <div class="media-content">
                                        <div class="content">
                                            <div class="has-text-centered">
                                                <h1>بيانات الباحث</h1>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table is-bordered has-text-centered is-narrow is-hoverable is-fullwidth">
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">الاسم
                                                        </td>
                                                        <td>
                                                            <input type="text" name="researcher_name" class="ui-input"
                                                                   value="{{old('researcher_name')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('researcher_name'))
                                                                <span class="tag color-red">{{$errors->first('researcher_name')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">جهة العمل
                                                        </td>
                                                        <td>
                                                            <input type="text" name="researcher_work" class="ui-input"
                                                                   value="{{old('researcher_work')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('researcher_work'))
                                                                <span class="tag color-red">{{$errors->first('researcher_work')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">الهاتف
                                                        </td>
                                                        <td>
                                                            <input type="text" name="researcher_phone" class="ui-input"
                                                                   value="{{old('researcher_phone')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('researcher_phone'))
                                                                <span class="tag color-red">{{$errors->first('researcher_phone')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">البريد الالكتروني
                                                        </td>
                                                        <td>
                                                            <input type="text" name="researcher_email" class="ui-input"
                                                                   value="{{old('researcher_email')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('researcher_email'))
                                                                <span class="tag color-red">{{$errors->first('researcher_email')}}</span>
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
                                                <h1>بيانات الجهة الاكاديمية / المعهد</h1>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table is-bordered has-text-centered is-narrow is-hoverable is-fullwidth">
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">اسم الجامعة / المعهد
                                                        </td>
                                                        <td>
                                                            <input type="text" name="academic_name" class="ui-input"
                                                                   value="{{old('academic_name')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('academic_name'))
                                                                <span class="tag color-red">{{$errors->first('academic_name')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">القسم المعنى
                                                        </td>
                                                        <td>
                                                            <input type="text" name="academic_department"
                                                                   class="ui-input"
                                                                   value="{{old('academic_department')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('academic_department'))
                                                                <span class="tag color-red">{{$errors->first('academic_department')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">اسم المادة
                                                        </td>
                                                        <td>
                                                            <input type="text" name="academic_subject_name"
                                                                   class="ui-input"
                                                                   value="{{old('academic_subject_name')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('academic_subject_name'))
                                                                <span class="tag color-red">{{$errors->first('academic_subject_name')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px"> الدولة
                                                        </td>
                                                        <td>
                                                            <input type="text" name="academic_country" class="ui-input"
                                                                   value="{{old('academic_country')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('academic_country'))
                                                                <span class="tag color-red">{{$errors->first('academic_country')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px"> البريد الالكتروني
                                                        </td>
                                                        <td>
                                                            <input type="text" name="academic_email" class="ui-input"
                                                                   value="{{old('academic_email')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('academic_email'))
                                                                <span class="tag color-red">{{$errors->first('academic_email')}}</span>
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
                                                <h1>بيانات البحث</h1>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table is-bordered has-text-centered is-narrow is-hoverable is-fullwidth">
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            عنوان البحث / المشروع
                                                        </td>
                                                        <td>
                                                            <input type="text" name="search_title" class="ui-input"
                                                                   value="{{old('search_title')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('search_title'))
                                                                <span class="tag color-red">{{$errors->first('search_title')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            اسم مشرف المادة
                                                        </td>
                                                        <td>
                                                            <input type="text" name="search_supervisor_name"
                                                                   class="ui-input"
                                                                   value="{{old('search_supervisor_name')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('search_supervisor_name'))
                                                                <span class="tag color-red">{{$errors->first('search_supervisor_name')}}</span>
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
                                                <h1> تفاصيل البيانات المطلوبة</h1>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table is-bordered has-text-centered is-narrow is-hoverable is-fullwidth">
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px" rowspan="12">البيانات المطلوبة
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            التنوع الاحيائي
                                                        </td>
                                                        <td>
                                                            <input type="text" name="section_biodiversity"
                                                                   class="ui-input"
                                                                   value="{{old('section_biodiversity')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('section_biodiversity'))
                                                                <span class="tag color-red">{{$errors->first('section_biodiversity')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            جودة الهواء
                                                        </td>
                                                        <td>
                                                            <input type="text" name="section_air_quality"
                                                                   class="ui-input"
                                                                   value="{{old('section_air_quality')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('section_air_quality'))
                                                                <span class="tag color-red">{{$errors->first('section_air_quality')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            الصناعة
                                                        </td>
                                                        <td>
                                                            <input type="text" name="section_industry" class="ui-input"
                                                                   value="{{old('section_industry')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('section_industry'))
                                                                <span class="tag color-red">{{$errors->first('section_industry')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            خرائط الاساس
                                                        </td>
                                                        <td>
                                                            <input type="text" name="section_basemaps" class="ui-input"
                                                                   value="{{old('section_basemaps')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('section_basemaps'))
                                                                <span class="tag color-red">{{$errors->first('section_basemaps')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            البيئة البحرية
                                                        </td>
                                                        <td>
                                                            <input type="text" name="section_marine" class="ui-input"
                                                                   value="{{old('section_marine')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('section_marine'))
                                                                <span class="tag color-red">{{$errors->first('section_marine')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            النفايات
                                                        </td>
                                                        <td>
                                                            <input type="text" name="section_waste" class="ui-input"
                                                                   value="{{old('section_waste')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('section_waste'))
                                                                <span class="tag color-red">{{$errors->first('section_waste')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            الطاقة
                                                        </td>
                                                        <td>
                                                            <input type="text" name="section_energy" class="ui-input"
                                                                   value="{{old('section_energy')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('section_energy'))
                                                                <span class="tag color-red">{{$errors->first('section_energy')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            البيانات الاجتماعية الاقتصادية
                                                        </td>
                                                        <td>
                                                            <input type="text" name="section_social" class="ui-input"
                                                                   value="{{old('section_social')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('section_social'))
                                                                <span class="tag color-red">{{$errors->first('section_social')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            البيئة البرية
                                                        </td>
                                                        <td>
                                                            <input type="text" name="section_wild" class="ui-input"
                                                                   value="{{old('section_wild')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('section_wild'))
                                                                <span class="tag color-red">{{$errors->first('section_wild')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            النفط والغاز
                                                        </td>
                                                        <td>
                                                            <input type="text" name="section_oil" class="ui-input"
                                                                   value="{{old('section_oil')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('section_oil'))
                                                                <span class="tag color-red">{{$errors->first('section_oil')}}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="has-text-weight-bold has-text-centered has-background-light"
                                                            style="vertical-align: middle"
                                                            width="200px">
                                                            المياه
                                                        </td>
                                                        <td>
                                                            <input type="text" name="section_water" class="ui-input"
                                                                   value="{{old('section_water')}}"
                                                                   autocomplete="off">
                                                            @if($errors->has('section_water'))
                                                                <span class="tag color-red">{{$errors->first('section_water')}}</span>
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
                        <div class="column is-12-desktop">

                            <label class="size18">
                                ملاحظات
                            </label>
                            <input type="text" name="notes"
                                   class="ui-input"
                                   value="{{old('notes')}}"
                                   autocomplete="off">
                            @if($errors->has('notes'))
                                <span class="tag color-red">{{$errors->first('notes')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column is-12-desktop">
                            <input type="checkbox" id="aggree" value="1">
                            <label for="aggree">
                                أقر بأن بياناتي المسجلة إعلاه صحيحة، وسوف أستخدم بيانات نظام معلومات الرقابة البيئية
                                لأغراض البحث العلمي فقط كما هو مسجل في الاستمارة، وسوف أشارك الهيئة العامة للبيئة بنتائج
                                البحث بعد الانتهاء منه.
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


@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?hl=ar"></script>
    <script>
        let capatcha = null;

        function correctCaptcha(response) {
            if (response) {
                capatcha = response;
                // $('#s_btn').removeClass('is-disabled');
                // $('#s_btn').prop('disabled', false);
                $('#aggree').trigger('change')
            }
        };

        $('#aggree').change(function () {
            if (this.checked) {
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
