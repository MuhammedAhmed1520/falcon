<div class="container-fluid">
    {{Form::open([
        'method'=>'put',
        'route'=>['updateEnvironmentalRequests',$environmentalRequest->id]
    ])}}

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h2 class="font-weight-bold">بيانات الباحث</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">الاسم
                        </td>
                        <td>
                            <input type="text" name="researcher_name" class="form-control"
                                   value="{{$environmentalRequest->researcher_name}}"
                                   autocomplete="off">
                            @if($errors->has('researcher_name'))
                                <span class="text-danger">{{$errors->first('researcher_name')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">جهة العمل
                        </td>
                        <td>
                            <input type="text" name="researcher_work" class="form-control"
                                   value="{{$environmentalRequest->researcher_work}}"
                                   autocomplete="off">
                            @if($errors->has('researcher_work'))
                                <span class="text-danger">{{$errors->first('researcher_work')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">الهاتف
                        </td>
                        <td>
                            <input type="text" name="researcher_phone" class="form-control"
                                   value="{{$environmentalRequest->researcher_phone}}"
                                   autocomplete="off">
                            @if($errors->has('researcher_phone'))
                                <span class="text-danger">{{$errors->first('researcher_phone')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">البريد الالكتروني
                        </td>
                        <td>
                            <input type="text" name="researcher_email" class="form-control"
                                   value="{{$environmentalRequest->researcher_email}}"
                                   autocomplete="off">
                            @if($errors->has('researcher_email'))
                                <span class="text-danger">{{$errors->first('researcher_email')}}</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h2 class="font-weight-bold">بيانات الجهة الاكاديمية / المعهد</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">اسم الجامعة / المعهد
                        </td>
                        <td>
                            <input type="text" name="academic_name" class="form-control"
                                   value="{{$environmentalRequest->academic_name}}"
                                   autocomplete="off">
                            @if($errors->has('academic_name'))
                                <span class="text-danger">{{$errors->first('academic_name')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">القسم المعنى
                        </td>
                        <td>
                            <input type="text" name="academic_department"
                                   class="form-control"
                                   value="{{$environmentalRequest->academic_department}}"
                                   autocomplete="off">
                            @if($errors->has('academic_department'))
                                <span class="text-danger">{{$errors->first('academic_department')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">اسم المادة
                        </td>
                        <td>
                            <input type="text" name="academic_subject_name"
                                   class="form-control"
                                   value="{{$environmentalRequest->academic_subject_name}}"
                                   autocomplete="off">
                            @if($errors->has('academic_subject_name'))
                                <span class="text-danger">{{$errors->first('academic_subject_name')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px"> الدولة
                        </td>
                        <td>
                            <input type="text" name="academic_country" class="form-control"
                                   value="{{$environmentalRequest->academic_country}}"
                                   autocomplete="off">
                            @if($errors->has('academic_country'))
                                <span class="text-danger">{{$errors->first('academic_country')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px"> البريد الالكتروني
                        </td>
                        <td>
                            <input type="text" name="academic_email" class="form-control"
                                   value="{{$environmentalRequest->academic_email}}"
                                   autocomplete="off">
                            @if($errors->has('academic_email'))
                                <span class="text-danger">{{$errors->first('academic_email')}}</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h2 class="font-weight-bold">بيانات البحث</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            عنوان البحث / المشروع
                        </td>
                        <td>
                            <input type="text" name="search_title" class="form-control"
                                   value="{{$environmentalRequest->search_title}}"
                                   autocomplete="off">
                            @if($errors->has('search_title'))
                                <span class="text-danger">{{$errors->first('search_title')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            اسم مشرف المادة
                        </td>
                        <td>
                            <input type="text" name="search_supervisor_name"
                                   class="form-control"
                                   value="{{$environmentalRequest->search_supervisor_name}}"
                                   autocomplete="off">
                            @if($errors->has('search_supervisor_name'))
                                <span class="text-danger">{{$errors->first('search_supervisor_name')}}</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h2 class="font-weight-bold"> تفاصيل البيانات المطلوبة</h2>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <tr class="d-none  d-md-table-row">
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px" rowspan="12">البيانات المطلوبة
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            التنوع الاحيائي
                        </td>
                        <td>
                            <input type="text" name="section_biodiversity"
                                   class="form-control"
                                   value="{{$environmentalRequest->section_biodiversity}}"
                                   autocomplete="off">
                            @if($errors->has('section_biodiversity'))
                                <span class="text-danger">{{$errors->first('section_biodiversity')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            جودة الهواء
                        </td>
                        <td>
                            <input type="text" name="section_air_quality"
                                   class="form-control"
                                   value="{{$environmentalRequest->section_air_quality}}"
                                   autocomplete="off">
                            @if($errors->has('section_air_quality'))
                                <span class="text-danger">{{$errors->first('section_air_quality')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            الصناعة
                        </td>
                        <td>
                            <input type="text" name="section_industry" class="form-control"
                                   value="{{$environmentalRequest->section_industry}}"
                                   autocomplete="off">
                            @if($errors->has('section_industry'))
                                <span class="text-danger">{{$errors->first('section_industry')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            خرائط الاساس
                        </td>
                        <td>
                            <input type="text" name="section_basemaps" class="form-control"
                                   value="{{$environmentalRequest->section_basemaps}}"
                                   autocomplete="off">
                            @if($errors->has('section_basemaps'))
                                <span class="text-danger">{{$errors->first('section_basemaps')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            البيئة البحرية
                        </td>
                        <td>
                            <input type="text" name="section_marine" class="form-control"
                                   value="{{$environmentalRequest->section_marine}}"
                                   autocomplete="off">
                            @if($errors->has('section_marine'))
                                <span class="text-danger">{{$errors->first('section_marine')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            النفايات
                        </td>
                        <td>
                            <input type="text" name="section_waste" class="form-control"
                                   value="{{$environmentalRequest->section_waste}}"
                                   autocomplete="off">
                            @if($errors->has('section_waste'))
                                <span class="text-danger">{{$errors->first('section_waste')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            الطاقة
                        </td>
                        <td>
                            <input type="text" name="section_energy" class="form-control"
                                   value="{{$environmentalRequest->section_energy}}"
                                   autocomplete="off">
                            @if($errors->has('section_energy'))
                                <span class="text-danger">{{$errors->first('section_energy')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            البيانات الاجتماعية الاقتصادية
                        </td>
                        <td>
                            <input type="text" name="section_social" class="form-control"
                                   value="{{$environmentalRequest->section_social}}"
                                   autocomplete="off">
                            @if($errors->has('section_social'))
                                <span class="text-danger">{{$errors->first('section_social')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            البيئة البرية
                        </td>
                        <td>
                            <input type="text" name="section_wild" class="form-control"
                                   value="{{$environmentalRequest->section_wild}}"
                                   autocomplete="off">
                            @if($errors->has('section_wild'))
                                <span class="text-danger">{{$errors->first('section_wild')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            النفط والغاز
                        </td>
                        <td>
                            <input type="text" name="section_oil" class="form-control"
                                   value="{{$environmentalRequest->section_oil}}"
                                   autocomplete="off">
                            @if($errors->has('section_oil'))
                                <span class="text-danger">{{$errors->first('section_oil')}}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="bg-gray font-weight-bold text-center"
                            style="vertical-align: middle"
                            width="200px">
                            المياه
                        </td>
                        <td>
                            <input type="text" name="section_water" class="form-control"
                                   value="{{$environmentalRequest->section_water}}"
                                   autocomplete="off">
                            @if($errors->has('section_water'))
                                <span class="text-danger">{{$errors->first('section_water')}}</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <label class="font-weight-bold">
                ملاحظات
            </label>
            <input type="text" name="notes"
                   class="form-control"
                   value="{{$environmentalRequest->notes}}"
                   autocomplete="off">
            @if($errors->has('notes'))
                <span class="text-danger">{{$errors->first('notes')}}</span>
            @endif
        </div>
    </div>

    <div class="mt-2 mb-4 text-center">
        @auth()
            <button type="submit" class="btn btn-sm btn-info m-0 d-print-none">{{__('office_agent.edit')}}</button>
        @endauth
        <button type="button" class="btn btn-sm btn-dark m-0 d-print-none" onclick="window.print()">
            {{__('violation.print')}}
        </button>
    </div>

    {{Form::close()}}
</div>

