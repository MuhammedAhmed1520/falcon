<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>الفورم الخارجية</title>
    <link href="https://fonts.googleapis.com/css?family=Amiri" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/sweetalert2.min.css')}}">
    <style media="all">
        body {
            font-family: 'Arial', serif;
            direction: rtl;
            background: #ccc;
        }

        .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9 {
            float: right;
        }

        #edits_buttons {
            position: fixed;
            left: 10px;
            bottom: 20px;
        }

        .container {
            background: #FFF;
            min-height: 100vh;
        }

        .font-1 {
            font-size: 12px;
        }

        .font-2 {
            font-size: 15px;
        }

        .font-3 {
            font-size: 18px;
        }

        .mt-35 {
            margin-top: 35px;
        }

        #menu {
            visibility: hidden;
            opacity: 0;
            position: fixed;
            background: #fff;
            color: #555;
            font-family: sans-serif;
            font-size: 11px;
            -webkit-transition: opacity .5s ease-in-out;
            -moz-transition: opacity .5s ease-in-out;
            -ms-transition: opacity .5s ease-in-out;
            -o-transition: opacity .5s ease-in-out;
            transition: opacity .5s ease-in-out;
            -webkit-box-shadow: 2px 2px 2px 0px rgba(143, 144, 145, 1);
            -moz-box-shadow: 2px 2px 2px 0px rgba(143, 144, 145, 1);
            box-shadow: 2px 2px 2px 0px rgba(143, 144, 145, 1);
            padding: 0px;
            border: 1px solid #C6C6C6;
        }

        #menu a {
            display: block;
            color: #555;
            text-decoration: none;
            padding: 6px 8px 6px 30px;
            width: 250px;
            position: relative;
        }

        #menu a img,
        #menu a i.fa {
            height: 20px;
            font-size: 17px;
            width: 20px;
            position: absolute;
            left: 5px;
            top: 2px;
        }

        #menu a span {
            color: #BCB1B3;
            float: right;
        }

        #menu a:hover {
            color: #fff;
            background: #3879D9;
        }

        #menu hr {
            border: 1px solid #EBEBEB;
            border-bottom: 0;
        }
    </style>
    <style media="print">
        #menu, #edits_buttons {
            display: none;
        }
    </style>
</head>
<body>
<main>

    <div id="html_content">

        {!! $form_data->html ?? 'No Data' !!}

    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="direction: rtl">
                        <div class="col-md-4">
                            <label>
                                <b>نوع المخالفة</b>
                            </label>
                            <select id="_violation_type" class="form-control">
                                <option value="person">افراد</option>
                                <option value="company">شركات</option>
                                <option value="manufacturer">مصانع</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>
                                <b>الاسم </b>
                            </label>
                            <input type="text" class="form-control" id="_name">
                        </div>
                        <div class="col-md-4">
                            <label>
                                <b>الرقم المدني</b>
                            </label>
                            <input type="text" class="form-control" id="_ssn_number">
                        </div>
                        <div class="col-md-4">
                            <label>
                                <b> رقم المحضر </b>
                            </label>
                            <input type="text" class="form-control" id="_serial">
                        </div>
                        <div class="col-md-4">
                            <label>
                                <b>رقم مادة المخالفة</b>
                            </label>
                            <input type="text" class="form-control" id="_subject">
                        </div>
                        <div class="col-md-4">
                            <label>
                                <b>رقم مادة العقوبة</b>
                            </label>
                            <input type="text" class="form-control" id="_punishment">
                        </div>
                        <div class="col-md-4">
                            <label>
                                <b>الجنسية </b>
                            </label>
                            <input type="text" class="form-control" id="_nationality">
                        </div>
                        <div class="col-md-12">
                            <label>
                                <b>الموقع </b>
                            </label>
                            <input type="text" class="form-control" id="_location">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="addDetails()">اضافة البيانات للفورم</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>

    <div id="edits_buttons">
        <ul class="list-unstyled list-inline">
            <li>
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-default">تعديل
                    البيانات
                </button>
            </li>
            @can('update-ppform-violation',auth()->user())
                <li>
                    <button id="submit_edit" class="btn btn-warning">تعديل</button>
                </li>
            @endcan
            <li>
                <button class="btn btn-info" onclick="window.print()">طباعة</button>
            </li>
            <li>
                {{--                <a href="{{back()->getTargetUrl()}}" class="btn btn-primary">العودة</a>--}}
                <a href="{{route('allViolations')}}" class="btn btn-primary">العودة</a>
            </li>
        </ul>
    </div>
    <div id="menu">
        <a style="cursor: pointer" onclick="window.print()">
            <img
                src="https://cdn4.iconfinder.com/data/icons/small-black-v2/512/device_document_electronic_print_printer_printing-512.png"/>
            طباعة
            <span class="pull-left">Ctrl + P</span>
        </a>
        <hr/>

        <a style="cursor: pointer" onclick="increaseSize(5)">
            تكبير خط
            <span class="pull-left">Ctrl + P</span>
        </a>
        <a style="cursor: pointer" onclick="decreaseSize(5)">
            تصغير خط
            <span class="pull-left">Ctrl + P</span>
        </a>
    </div>
</main>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script type="text/javascript" src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    function addDetails() {
        let _violation_type = $('#_violation_type').val();
        let _ssn_number = $('#_ssn_number').val();
        let _location = $('#_location').val();
        let _name = $('#_name').val();
        let _subject = $('#_subject').val();
        let _punishment = $('#_punishment').val();
        let _serial = $('#_serial').val();
        let _nationality = $('#_nationality').val();

        let full_age = getAgeFromSSN(_ssn_number);
        let section_person = $('#violation_personal_only');
        if (_violation_type != 'person') {
            section_person.hide()
        } else {
            section_person.show()

        }

        $('#violation_personal_age').text(full_age).css({color: 'red'});

        $('#violation_personal_ssn').text(_ssn_number).css({color: 'red'});
        $('#violation_personal_ssn_2').text(_ssn_number).css({color: 'red'});

        $('#violation_civil_name').text(_name).css({color: 'red'});
        $('#violation_personal_name').text(_name).css({color: 'red'});
        $('#violation_personal_name_2').text(_name).css({color: 'red'});

        $('#violation_address').text(_location).css({color: 'red'});

        $('#violation_serial_2').text(_serial).css({color: 'red'});
        $('#violation_serial').text(_serial).css({color: 'red'});

        $('#violation_personal_nationality').text(_nationality).css({color: 'red'});
        $('#violation_personal_nationality_2').text(_nationality).css({color: 'red'});

        $('#violation_subject_number').text(_subject).css({color: 'red'});
        $('#violation_punishment_number').text(_punishment).css({color: 'red'});


        $('#myModal').modal('hide')
    }

    function getAgeFromSSN($ssn) {
        try {

            let $x = $ssn.substr(0, 7);
            let $year = (((18 + parseInt($x[0]) - 1)) + $x[1] + $x[2]);
            let $birth_date = moment([$year, $x[3].concat($x[4]), $x[5].concat($x[6])]);
            let today = moment();

            let a = $birth_date;
            let b = moment([{{date('Y')}}, {{date('m')}}, {{date('d')}}]);

            let years = a.diff(b, 'year');
            b.add(years, 'years');

            let months = a.diff(b, 'months');
            b.add(months, 'months');

            let days = a.diff(b, 'days');

            return Math.abs(years) + ' عام ' + Math.abs(months) + ' اشهر' + Math.abs(days) + ' ايام';


        } catch ($exception) {
            return 0;
        }
    }

    $('#submit_edit').on('click', function () {


        let html = $('#html_content').html();

        $.ajax({
            url: '{{route('handleEditExtrenalPPFrom',['id'=>request()->id])}}',
            type: 'POST',
            data: {
                _token: '{{csrf_token()}}',
                html: html,
                user_id: '{{auth()->user()->id ?? 0}}'
            },
            success: function (response) {
                if (response.status) {

                    Swal.fire({
                        type: 'success',
                        text: 'تم التعديل بنجاح  ؟',
                        title: 'نجاح',
                    })
                    window.location.href = '{{route('allExternalPPFromView')}}'
                    //
                }
            }
        })
    })

</script>
<script>

    $('.drag').draggable().click(function () {
        $(this).draggable({disabled: false});
    }).dblclick(function () {
        $(this).draggable({disabled: true});
    });

    let i = document.getElementById("menu").style;
    let element = null;
    if (document.addEventListener) {
        document.addEventListener('contextmenu', function (e) {
            let posX = e.clientX;
            let posY = e.clientY;
            element = document.elementFromPoint(posX, posY);
            menu(posX, posY);
            e.preventDefault();
        }, false);
        document.addEventListener('click', function (e) {
            i.opacity = "0";
            setTimeout(function () {
                i.visibility = "hidden";
            }, 100);
        }, false);
    } else {
        document.attachEvent('oncontextmenu', function (e) {
            let posX = e.clientX;
            let posY = e.clientY;
            menu(posX, posY);
            e.preventDefault();
        });
        document.attachEvent('onclick', function (e) {
            i.opacity = "0";
            setTimeout(function () {
                i.visibility = "hidden";
            }, 100);
        });
    }

    function increaseSize(size) {
        if (element) {
            var current_font = window.getComputedStyle(element, null).getPropertyValue('font-size').replace("px", "");

            console.log(current_font)
            console.log(size)
            element.style.fontSize = parseInt(current_font) + parseInt(size) + "px";
        }
    }

    function decreaseSize(size) {
        if (element) {
            var current_font = window.getComputedStyle(element, null).getPropertyValue('font-size').replace("px", "");

            console.log(current_font)
            console.log(size)
            element.style.fontSize = parseInt(current_font) - parseInt(size) + "px";
        }
    }

    function menu(x, y) {
        i.top = y + "px";
        i.left = x + "px";
        i.visibility = "visible";
        i.opacity = "1";
    }
</script>
</body>
</html>
