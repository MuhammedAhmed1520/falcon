<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://fonts.googleapis.com/css?family=Amiri" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style media="all">
        body {
            font-family: 'arial', serif;
            direction: rtl;
            background: #ccc;
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

        .font-4 {
            font-size: 24px;
        }

        .font-5 {
            font-size: 28px;
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

        #edits_buttons {
            position: fixed;
            left: 10px;
            bottom: 20px;
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
        <div class="container">
            <div class="row mt-35">

                <!-- center description -->
                <div class="col-md-12 text-center mt-35 drag">
                    <h1 class="lead font-5" contenteditable="true">
                        <strong contenteditable="true">
                            شهادة لمن يهمه الامر
                        </strong>
                    </h1>
                </div>

                <!-- bottom description -->
                <div class="col-md-12 text-right mt-35 drag">
                    <p class="font-4" contenteditable="true">
                        <strong>
                            تفيد الهيئة العامة للبيئة بعدم وجود محاضر مخالفات بيئية محررة وفقاً لاحكام قانون حماية
                            البيئة رقم 42 لسنة 2014 وتعديلاته ولوائحه التنفيذية , بشأن شركة
                            <span style="color:red">" {{$certificate->company_name  ?? ''}} "</span>
                            وذلك طبقا للبيانات والمستندات المتوفرة لدي الهيئة فى تاريخ تحرير هذه الشهادة
                            <br>
                            اعطيت هذه الشهادة للشركة المذكورة بناء على طلبها , دون ادني مسئولية على الهيئة تجاه الغير.
                        </strong>
                    </p>
                </div>

                <!-- center bottom description -->
                <div class="col-md-12 text-center mt-35 drag">
                    <p class="lead font-5" contenteditable="true">
                        <strong contenteditable="true">
                            وهذه شهادة من الهيئة بذلك
                        </strong>
                    </p>
                </div>

                <!-- center bottom description -->
                <div class="col-xs-6 text-center mt-35 drag">
                    <p class="lead font-3" contenteditable="true">
                        <span>{{getSetting("certificate_manager_name_ar")['data']['setting']}}</span>
                        <br>
                        <strong contenteditable="true">
                            {{getSetting("certificate_manager_title_ar")['data']['setting']}}
                        </strong>
                    </p>
                </div>

                <!-- info -->
                <div class="col-xs-6 text-right mt-35 drag">
                    <p class="lead font-3" contenteditable="true">
                        <span>
                           نائب المدير العام للشئون الفنية
                            <small></small>
                        </span>
                        <br>
                        <span>
                            مدير ادارة الالتزام البيئي
                            <small></small>
                        </span>
                        <br>
                        <span>
                            رئيس قسم البلاغات والمخالفات البيئية
                            <small></small>
                        </span>
                        <br>
                        <span>
                            {{--{{dd($certificate->paymentable)}}--}}
                             تم استيفاء مبلغ
                            <small>{{$certificate->paymentable->cost ?? ''}}</small>
                            دينار كويتي نظير اصدار هذه الشهادة
                        </span>
                        <br>
                        <span>
                             صلاحية هذه الشهادة عام ميلادي من تاريخ الاصدار
                            <small></small>
                        </span>
                        <br>
                        <span>
                            للتنسيق والمتابعة
                            <small>{{$certificate->user->name ?? $certificate -> display_name }}</small>
                        </span>
                        <br>
                    </p>
                </div>

            </div>
        </div>
    </div>


    <div id="edits_buttons">
        <ul class="list-unstyled list-inline">
            <li>
                <a href="{{back()->getTargetUrl()}}" class="btn btn-primary">العودة</a>
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
