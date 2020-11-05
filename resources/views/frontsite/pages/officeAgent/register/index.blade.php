@extends('frontsite.layouts.master_agent_layout')

@section('styles')
    {{Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css')}}
    <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.2.0/css/all.css'>
    <style>
        .fancy label {
            display: inline-flex;
            align-items: baseline;
        }

        .fancy label input[type=checkbox],
        .fancy label input[type=radio] {
            position: relative;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            font-size: inherit;
            width: 1em;
            margin: 0;
            color: inherit;
            outline: none;
            font-family: 'font-feather' !important;
            transition: 300ms ease-out;
        }

        .fancy label input[type=checkbox]::after,
        .fancy label input[type=radio]::after {
            content: "\e937";
            display: inline-block;
            text-align: center;
            width: 1em;
            padding-left: 12px;
        }

        .fancy label input[type=checkbox]:checked::after,
        .fancy label input[type=radio]:checked::after {
            font-weight: 900;
        }

        .fancy label input[type=checkbox]:active,
        .fancy label input[type=radio]:active {
            -webkit-transform: scale(0.6);
            transform: scale(0.6);
        }

        .fancy label input[type=checkbox] + span,
        .fancy label input[type=radio] + span {
            margin-left: .35em;
        }

        .fancy label input[type=radio]:checked::after {
            content: '\e92b';
            color: #037bff;
            font-size: 20px;
            left: 10px;
            position: relative;
        }


    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-5">
                    <div class="card-body">
                        {{Form::open([
                            'route'=>'handleRegisterRequest-office-agent',
                            'method'=>'post',
                            'id'=>'register_form'
                        ])}}

                        <div class="row mb-4">
                            <div class="col-md-2">
                                <img src="{{asset('assets/images/logo.png')}}" width="40" alt="">
                            </div>
                            <div class="col-md-10 text-right">
                                <ul class="list-unstyled">
                                    <li class="list-inline-item">
                                        <a href="{{route('loginOfficeAgent')}}" class="font-weight-bold">
                                            تسجيل الدخول
                                            <i class="icon icon-log-out"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <h4 class="font-weight-bold">تسجيل الشركات</h4>
                            </div>

                        </div>

                        <div class="row mt-4">
                            <div class="col-md-7 mb-3">
                                <label class="font-weight-bold text-black">اسم الشركة</label>
                                <input type="text" class="form-control" name="office_name_ar"
                                       value="{{old('office_name_ar')}}">
                                <div class="text-left text-danger">{{$errors->first('office_name_ar') ?? ''}}</div>
                            </div>
                            <div class="col-md-12"></div>
                            <div class="col-md-3">
                                <label class="font-weight-bold text-black">اسم الاول</label>
                                <input type="text" class="form-control arabic_character" name="owner_name"
                                       value="{{old('owner_name')}}">
                                <div class="text-left text-danger">{{$errors->first('owner_name') ?? ''}}</div>
                            </div>
                            <div class="col-md-2">
                                <label class="font-weight-bold text-black"> الاب</label>
                                <input type="text" class="form-control arabic_character" name="owner_parent_name"
                                       value="{{old('owner_parent_name')}}">
                                <div class="text-left text-danger">{{$errors->first('owner_parent_name') ?? ''}}</div>
                            </div>
                            <div class="col-md-2">
                                <label class="font-weight-bold text-black">العائلة</label>
                                <input type="text" class="form-control arabic_character" name="owner_family_name"
                                       value="{{old('owner_family_name')}}">
                                <div class="text-left text-danger">{{$errors->first('owner_family_name') ?? ''}}</div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-3">
                                <label class="font-weight-bold text-black">الهاتف النقال </label>
                                <input type="text" class="form-control phone" name="owner_phone"
                                       value="{{old('owner_phone')}}">
                                <div class="text-left text-danger">{{$errors->first('owner_phone') ?? ''}}</div>
                            </div>
                            <div class="col-md-3">
                                <label class="font-weight-bold text-black">الرقم المدني</label>
                                <input type="text" class="form-control ssn" name="owner_ssn"
                                       value="{{old('owner_ssn')}}">
                                <div class="text-left text-danger">{{$errors->first('owner_ssn') ?? ''}}</div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-3">
                                <label class="font-weight-bold text-black">البريد الالكتروني </label>
                                <input type="text" class="form-control" name="owner_email"
                                       value="{{old('owner_email')}}">
                                <div class="text-left text-danger">{{$errors->first('owner_email') ?? ''}}</div>
                            </div>
                            <div class="col-md-3">
                                <label class="font-weight-bold text-black">نأكيد البريد الالكتروني </label>
                                <input type="text" class="form-control" name="owner_email_confirmation"
                                       value="{{old('owner_email_confirmation')}}">
                                <div
                                    class="text-left text-danger">{{$errors->first('owner_email_confirmation') ?? ''}}</div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-3">
                                <label class="font-weight-bold text-black"> إسم المستخدم</label>
                                <input type="text" class="form-control" name="user_name"
                                       value="{{old('user_name')}}">
                                <div class="text-left text-danger">{{$errors->first('user_name') ?? ''}}</div>
                            </div>
                            <div class="col-md-3">
                                <label class="font-weight-bold text-black">كلمة المرور</label>
                                <input type="password" class="form-control" name="password"
                                       value="{{old('password')}}">
                                <div class="text-left text-danger">{{$errors->first('password') ?? ''}}</div>
                            </div>
                            <div class="col-md-3">
                                <label class="font-weight-bold text-black">تأكيد كلمة المرور</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                       value="{{old('password_confirmation')}}">
                                <div
                                    class="text-left text-danger">{{$errors->first('password_confirmation') ?? ''}}</div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <ul class="unstyled centered fancy">
                                    @foreach($office_agent_activies as $k => $type)
                                        <li>
                                            <label for="styled-checkbox-{{$k}}">
                                                <input
                                                    id="styled-checkbox-{{$k}}"
                                                    @if(old('office_type_id') == $type->id) checked @endif
                                                    value="{{$type->id}}"
                                                    name="office_type_id"
                                                    type="radio"
                                                    @if($loop->first) checked="" @endif
                                                    data-amount="{{$type->certificate_purchase_fees_a ?? 0}}"
                                                    @if(!$type->is_active) disabled @endif />
                                                <span> {{$type->title_ar ?? ''}}</span>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                                <div
                                    class="text-left text-danger">{{$errors->first('office_type_id') ?? ''}}</div>
                            </div>

{{--                            <div class="col-md-8">--}}
{{--                                <table class="table table-bordered">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>اسم الشركة</th>--}}
{{--                                        <th>عقد التعاون</th>--}}
{{--                                        <th>العنوان</th>--}}
{{--                                        <th>التخصص</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody id="table_body">--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <button class="btn btn-primary" id="submit_text">دفع</button>
                            </div>
                        </div>

                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')}}
    {{Html::script('assets/js/jquery.mask.min.js')}}
    <script>
        $(document).ready(function () {
            $('.phone').mask('00000000');
            $('.ssn').mask('000000000000');
        });
        $('input[name="office_type_id"]').change(function () {
            let amount = $('input[name="office_type_id"]:checked').attr('data-amount');
            if (amount > 0) {
                $('#submit_text').text('دفع')
            } else {
                $('#submit_text').text('تسجيل')
            }
            findOfficeActivityFront($('input[name="office_type_id"]:checked').val())
        })
        $('#register_form').submit(function (e) {
            e.preventDefault();
            let amount = $('input[name="office_type_id"]:checked').attr('data-amount');
            if (amount == 0) {
                document.getElementById("register_form").submit();
                return
            }
            let check = confirm(' هل انت متأكد من دفع ' + amount + ' دينار ')
            if (check) {
                document.getElementById("register_form").submit();
            }
        })
        findOfficeActivityFront('{{$office_agent_activies->first()->id ?? 0}}');

        function findOfficeActivityFront(activity_id) {
            $('#table_body').empty();
            {{--$.ajax({--}}
            {{--    type: 'get',--}}
            {{--    url: '{{route('findOfficeActivityFront')}}' + '/' + activity_id,--}}
            {{--    success: function (response) {--}}
            {{--        let status = response.status;--}}
            {{--        if (status) {--}}
            {{--            let data = response.data.activity.office_agents;--}}
            {{--            $.each(data, function (index, office) {--}}
            {{--                // body--}}
            {{--                let contract = (office.contract_type ? office.contract_type.title_ar : '');--}}
            {{--                let name = (office.office_name_ar ? office.office_name_ar : '') + ' ' + (office.office_name_en ? office.office_name_en : '');--}}
            {{--                let address = (office.main_address ? (office.main_address.city ? office.main_address.city.governorate.translated.name + ' ' + office.main_address.city.translated.name + ' ' + office.main_address.full_address : '') : '');--}}
            {{--                let specializations = '';--}}
            {{--                $.each(office.specializations, function (index, specialization) {--}}
            {{--                    console.log(specialization)--}}
            {{--                    specializations += specialization.title_ar + ' , '--}}
            {{--                })--}}
            {{--                $('#table_body').append('\n' +--}}
            {{--                    '                                    <tr>\n' +--}}
            {{--                    '                                        <td>' + name + '</td>\n' +--}}
            {{--                    '                                        <td>'+contract+'</td>\n' +--}}
            {{--                    '                                        <td>' + address + '</td>\n' +--}}
            {{--                    '                                        <td>'+specializations+'</td>\n' +--}}
            {{--                    '                                    </tr>');--}}
            {{--                // console.log(office)--}}
            {{--            });--}}
            {{--        }--}}
            {{--    }--}}
            {{--})--}}
        }
    </script>
@endsection
