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
        #menu {
            display: none;
        }
    </style>
</head>
<body>
<main>

    <div id="html_content">
        <div class="container">
            <div class="row mt-35">
                <!-- top header -->
                <div class="col-md-offset-6 col-md-6 text-right drag">
                    <h4 contenteditable="true">
                        <strong>
                            السيد المستشار/
                            <span> النائب العام</span>
                        </strong>
                    </h4>
                    <h5>تحية طيبة وبعد ،</h5>
                </div>

                <!-- center description -->
                <div class="col-md-12 text-center mt-35 drag">
                    <p class="lead font-3" contenteditable="true" style="text-decoration: underline;">
                        <strong contenteditable="true">
                            الموضوع: مخالفة قانون حماية البيئة رقم 42 لسنة 2014 والمعدل بالقانون رقم 99 لسنة 2015
                            <br>
                            بشأن قيام السيد/
                            <span contenteditable="false" id="violation_civil_name"> ...................................... </span>
                            ب
                            <span contenteditable="false" id="violation_reason"> ...................................... </span>
                        </strong>
                    </p>
                </div>

                <!-- top table -->
                <table class="table table-bordered drag" style="margin-bottom: 5px;">
                    <tbody>
                    <tr>
                        <th rowspan="2" class="text-center" style="vertical-align: middle;">موقع المخالفة</th>
                        <th class="text-center">الموقع</th>
                        <th class="text-center">المحافظة</th>
                        <th class="text-center">المنطقة</th>
                        <th class="text-center">القطعة</th>
                        <th class="text-center">الشارع</th>
                        <th class="text-center">رقم الموقع</th>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <strong id="violation_address">..........................................</strong>
                        </td>
                        <td class="text-center">
                            <strong contenteditable="true">____</strong>
                        </td>
                        <td class="text-center">
                            <strong contenteditable="true">____</strong>
                        </td>
                        <td class="text-center">
                            <strong contenteditable="true">____</strong>
                        </td>
                        <td class="text-center">
                            <strong contenteditable="true">____</strong>
                        </td>
                        <td class="text-center">
                            <strong contenteditable="true">____</strong>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <!-- middle table personal only -->
                <table class="table table-bordered drag"  id="violation_personal_only">
                    <tbody>
                    <tr>
                        <th rowspan="2" class="text-center" style="vertical-align: middle;">بيانات المخالف</th>
                        <th class="text-center">الاسم</th>
                        <th class="text-center">الرقم المدني</th>
                        <th class="text-center">الجنسية</th>
                        <th class="text-center">العمر وقت ارتكاب المخالفة</th>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <strong id="violation_personal_name">..........................................</strong>
                        </td>
                        <td class="text-center">
                            <strong id="violation_personal_ssn">-</strong>
                        </td>
                        <td class="text-center">
                            <strong id="violation_personal_nationality">-</strong>
                        </td>
                        <td class="text-center">
                            <strong id="violation_personal_age">-</strong>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <!-- bottom description -->
                <div class="col-md-12 text-right mt-35 drag">
                    <p class="font-3" contenteditable="true">
                        <strong>

                            بالاشارة الى الموضوع اعلاه ، مرفق طي كتابنا هذا محضر ضبط المخالفة رقم
                            <span id="violation_serial_2">......</span>

                            بشأن ضبط السيد/
                            <span id="violation_personal_name_2">...........</span>

                            <span id="violation_personal_nationality_2">....</span>
                            الجنسية

                            ( ب.م رقم <span id="violation_personal_ssn_2">...........................</span> )

                            بتاريخ <span id="violation_date"> ......... </span>

                            فى تمام الساعة <span id="violation_time">.......</span>

                            فى الموقع المشار اليه اعلاه، وذلك بالمخالفة لنص المادة <span id="violation_subject_number"> ..... </span>

                            من قانون حماية البيئة رقم 42 لسنة 2014 والمعدل بالقانون رقم 99 لسنة 2015 ، والمؤثم بنص المادة
                            رقم (<span id="violation_punishment_number"> ... </span>)

                            من القانون ذاته لذا نأمل الاطلاع والايعاز لمن يلزم باتخاذ اجراءات الاحالة للنيابة المختصة عملا
                            بنص المادة 171 من القانون عاليه، لاتخاذ تدابيرها نحو هذه المخالفة

                        </strong>
                    </p>
                </div>

                <!-- center bottom description -->
                <div class="col-md-12 text-center mt-35 drag">
                    <p class="lead font-3" contenteditable="true">
                        <strong contenteditable="true">
                            وتفضلوا بقبول فائق الاحترام
                        </strong>
                    </p>
                </div>

                <!-- center bottom description -->
                <div class="col-xs-6 text-center mt-35 drag">
                    <p class="lead font-3" contenteditable="true">
                        <span>عبدالله احمد الحمود الصباح</span>
                        <br>
                        <strong contenteditable="true">
                            رئيس مجلس الادارة - المدير العام
                        </strong>
                    </p>
                </div>

                <!-- info -->
                <div class="col-xs-6 text-right mt-35 drag">
                    <p class="lead font-3" contenteditable="true">
                        <strong contenteditable="true">
                            المرفقات </strong>
                        <br>
                        <span> -محضر ضبط المخالفة رقم
                    <small id="violation_serial">.....</small>
                </span>
                        <br>
                        <span> -نسخة هوية الضبطية القضيائية للسيد/
                    <small id="main_officer">.....</small>
                </span>
                        <br>
                        <span> -نسخة اللائحة التنفيذية للمادة
                    <small id="violation_subject_number2">.....</small>
                </span>
                        <br>
                        <span> -نائب المدير العام للشئون الفنية
                    <small id="technical_name">.....</small>
                </span>
                        <br>
                        <span> -مدير ادارة الالتزام البيئي
                    <small id="director_name">.....</small>
                </span>
                        <br>
                        <span> -رئيس قسم البلاغات والمخالفات البيئية
                    <small id="communication_name">.....</small>
                </span>
                        <br>
                        <span> للاستفسار
                    <small id="user_name">.....</small>
                </span>
                        <br>
                        <span> للتنسيق لحضور ممثلي الهيئة التواصل من خلال رقم الواتس اب المخصص
                    <small id="whatsapp">......</small>
                </span>
                        <br>
                    </p>
                </div>

            </div>
        </div>
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
