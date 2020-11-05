<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://fonts.googleapis.com/css?family=Amiri" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style media="all">
        body {
            font-family: 'Arial', serif;
            direction: rtl;
            background: #ccc;
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

        {!! $form_data->detail->html ?? 'No Data' !!}

    </div>

    <div id="edits_buttons">
        <ul class="list-unstyled list-inline">
            <li>
                <a href="{{back()->getTargetUrl()}}" class="btn btn-primary">العودة</a>
            </li>
            <li>
                <a href="{{route('allViolations')}}" class="btn btn-danger">قسم المخالفات</a>
            </li>
            <li>
                <button id="submit_edit" class="btn btn-danger">حفظ النموذج</button>
            </li>
            <li>
                <button class="btn btn-info" onclick="window.print()">طباعة</button>
            </li>
        </ul>
    </div>
    <div id="menu">
        <a style="cursor: pointer" onclick="window.print()">
            <img src="https://cdn4.iconfinder.com/data/icons/small-black-v2/512/device_document_electronic_print_printer_printing-512.png"/>
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
<script>
    $('.drag').draggable().click(function () {
        $(this).draggable({disabled: false});
    }).dblclick(function () {
        $(this).draggable({disabled: true});
    });

    $(document).ready(function () {
        $('#violation_civil_name').text('{{$violation_data["civilian_name"]}}').css('color', 'red');
        @if($violation_data["details"])
        $('#violation_reason').text('{{$violation_data["details"]}}').css('color', 'red');
        @endif
        $('#violation_address').text('{{$violation_data["location_name"]}}').css('color', 'red');
        $('#violation_personal_age').text('{{$violation_data["age"]}}').css('color', 'red');
        if ('{{$violation_data["type"]}}' != 'person') {

            $('#violation_personal_only').hide();
        }
        $('#violation_personal_name').text('{{$violation_data["civilian_name"]}}').css('color', 'red');
        $('#violation_personal_name_2').text('{{$violation_data["civilian_name"]}}').css('color', 'red');
        $('#violation_personal_ssn').text('{{$violation_data["ssn"]}}').css('color', 'red');
        $('#violation_personal_ssn_2').text('{{$violation_data["ssn"]}}').css('color', 'red');
        $('#violation_personal_nationality').text('{{$violation_data["nationality"]}}').css('color', 'red');
        $('#violation_personal_nationality_2').text('{{$violation_data["nationality"]}}').css('color', 'red');
        $('#violation_date').text('{{$violation_data["date"]}}').css('color', 'red');
        $('#violation_time').text('{{$violation_data["time"]}}').css('color', 'red');
        $('#violation_punishment_number').text('{{implode(',',$violation_data["punishment"])}}').css('color', 'red');
        $('#violation_serial').text('{{$violation_data["serial"]}}').css('color', 'red');
        $('#violation_serial_2').text('{{$violation_data["serial"]}}').css('color', 'red');
        $('#violation_subject_number').text('({{implode(',',$violation_data["subject"])}})').css('color', 'red');
        $('#violation_subject_number2').text('({{implode(',',$violation_data["subject"])}})').css('color', 'red');
        $('#main_officer').text('{{$violation_data["officer_name"]}}').css('color', 'red');
        $('#user_name').text('{{auth()->user()->name}}').css('color', 'red');
        $('#whatsapp').text('{{getSetting('whatsapp')['data']['setting']}}').css('color', 'red');

        $('#technical_name').text('{{getSetting('technical_name')['data']['setting']}}').css('color', 'red');
        $('#director_name').text('{{getSetting('director_name')['data']['setting']}}').css('color', 'red');
        $('#communication_name').text('{{getSetting('communication_name')['data']['setting']}}').css('color', 'red');
    });
    $('#submit_edit').on('click', function () {

        let html = $('#html_content').html();

        $.ajax({
            url: '{{route('handleAddNewPPFrom',['id'=>request()->id])}}',
            type: 'POST',
            data: {
                _token: '{{csrf_token()}}',
                html: html,
                _form_id: '{{$form_id}}'
            },
            success: function (response) {
                if (response.status) {
                    location.reload();
                }
            }
        })
    })

</script>
<script>
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
