<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link
            href="https://fonts.googleapis.com/css?family=Tajawal|El+Messiri|Reem+Kufi|Baloo+Bhaijaan|Lateef|Mada|Roboto|Amiri"
            rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
    <style>
        .text-right, .ar_font, .text-right b, .text-right span, .text-right p, .ar_font b, .ar_font span, .ar_font p {
            font-family: 'Tajawal', sans-serif !important;
        }

        .text-left, .en_font, .text-left b, .text-left span, .text-left p, .en_font b, .en_font span, .en_font p {
            font-family: 'Roboto', sans-serif !important;
            text-transform: capitalize;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {{Html::script('assets/js/JsBarcode.all.min.js')}}
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

        .w-50 {
            width: 50%;
            display: inline-block;
            padding: 14px;
            margin-right: -5px;
            scroll-margin-left: -5px;
        }

        h1.lead {
            font-weight: bold;
            font-size: 25px;
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

        .w-50 {
            width: 50%;
        }
    </style>
</head>
<body>
<main>
    <div id="html_content">
        <div class="container"
             style="min-height:0;padding: 15px;border: 10px solid transparent;overflow:hidden;border-image: url({{asset('assets/images/border.png')}}) 30 round;">

            <div class="container text-right" style="min-height:0">
                <div class="row text-center mb-2">
                    <div class="col-md-3">
                        <img src="{{asset('assets/images/logo.png')}}" width="120" height="120"
                             class="mt-4 pull-right float-right"
                             alt="">
                    </div>
                    <div class="col-md-6 pt-1">
                        <h1 style="font-size:50px;font-family: 'Reem Kufi', sans-serif;color: saddlebrown;">شهادة</h1>
                    </div>
                    <div class="col-md-3">
                        <img src="{{asset('assets/images/Kuwait_logo.png')}}" width="120" height="120"
                             class="mt-4 pull-left float-left"
                             alt="">
                    </div>
                </div>
                {{--<svg id="bar_code"></svg>--}}
            </div>
            {!! $form_data->detail->html ?? 'No Data' !!}
        </div>
    </div>


    <div id="edits_buttons">
        <ul class="list-unstyled list-inline">
            <li>
                <a href="{{back()->getTargetUrl()}}" class="btn btn-primary">العودة</a>
            </li>
            {{--            <li>--}}
            {{--                <button id="submit_edit" class="btn btn-warning">حفظ</button>--}}
            {{--            </li>--}}
            <li>
                <button class="btn btn-info" onclick="window.print()">طباعة</button>
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
<script>
    $('.drag').draggable().click(function () {
        $(this).draggable({disabled: false});
    }).dblclick(function () {
        $(this).draggable({disabled: true});
    });

    $('#submit_edit').on('click', function () {

        let html = $('#html_content').html();

        $.ajax({
            url: '{{route('handleFormOfficeHtml')}}',
            type: 'POST',
            data: {
                _token: '{{csrf_token()}}',
                html: html,
                id: '{{request()->id}}'
            },
            success: function (response) {
                if (response.status) {
                    location.reload();
                }
            }
        })
    })

    $('#office_name_ar').text('{{$office_agent->office_name_ar ?? ''}}')
    $('#office_name_en').text('{{$office_agent->office_name_en ?? ''}}')
    $('#valid_for').text('{{$certificate->valid_for ?? $office_agent->valid_for ?? ''}}')
    $('#certificate_title_ar').text("{{$certificate->certificate->title_ar ?? '.'}}")
    $('#certificate_title_en').text("{{$certificate->certificate->title_en ?? '.'}}")
    JsBarcode("#bar_code", "{{$office_agent->private_serial ?? ''}}", {
        height: 40
    });

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
