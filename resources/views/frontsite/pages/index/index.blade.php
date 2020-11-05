@extends('frontsite.layouts.master_layout')

@section('content')

    <div id="about" class="section">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column is-5">
                    <div class="section-content">
                        <span class="section-title">عننا</span>
                        <h5 class="small-headline">تفاصيل عن الهيئة العامة للبيئة</h5>
                        <h3>الهيئة العامة للبيئة <br> <span class="font-creatives">دولة الكويت  </span></h3>
                        <p>
                            الهيئة العامة للبيئة هي هيئة عامة ذات شخصية اعتبارية ولها ميزانية ملحقة تعنى بشئون البيئة
                            ولها
                            الولاية العامة على شئون البيئة في الدولة وتلحق بمجلس الوزراء ويشرف عليها المجلس الأعلى
                            للبيئة.

                        </p>
                        <br>
                        <p>
                            أنشئت الهيئة العامة للبئية بناءاً على القانون رقم 21 لسنة 1995 والمعدل تحت رقم 16 لسنه 1996،
                            وانتقلت الهيئة العامة للبيئة إلى مبناها الجديد المعد بعناية ليشمل كافة الأقسام الممثلة
                            للهيئة
                            العامة للبيئة ونشاطاتها المتعدده كما صمم هذا المبنى ليكون من المباني الذكية والصديقة للبيئة
                            بالكامل .


                        </p>

                        <div class="columns about-items">
                            <div class="column">
                                <h5>0<i>+</i></h5>
                                <span> مخالفات <br> </span>
                            </div>
                            <div class="column">
                                <h5>0<i>+</i></h5>
                                <span> مناقصات <br> </span>
                            </div>
                            <div class="column">
                                <h5>0<i>+</i></h5>
                                <span> شركات <br> </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-6 is-offset-1">
                    <div class="columns about-images">
                        <div class="column">
                            <div class="about-image"
                                 style="background-image: url('{{asset('front_assets/images/photo-1519893578517.jpg')}}')"></div>
                            <div class="about-image"
                                 style="background-image: url('{{asset('front_assets/images/photo-1713894578517.jpg')}}')"></div>
                        </div>
                        <div class="column">
                            <div class="about-image"
                                 style="background-image: url('{{asset('front_assets/images/photo-1713894578517.jpg')}}')"></div>
                            <div class="about-image"
                                 style="background-image: url('{{asset('front_assets/images/photo-1519893578517.jpg')}}')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="section is-gray has-title">

        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        <span class="section-title">مقالات</span>
                        <h5 class="small-headline">تصفح بعض المقالات</h5>
                        <h3>تعرف على بعض المقالات التى تهمك</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-5">
            <div class="columns is-multiline">
                <div class="column is-2-desktop is-6-mobile">
                    <div class="section-content has-text-centered service-item">
                        <i class="icon icon-file-text f-8x absolute-item-icon"></i>
                        <img src="{{asset('front_assets/images/circle.png')}}" class="image filter-gray" alt="">
                        <h4 class="f-25">نبذة عن الهيئة</h4>
                    </div>
                </div>
                <div class="column is-2-desktop is-6-mobile">
                    <div class="section-content has-text-centered service-item">
                        <i class="icon icon-gift f-8x absolute-item-icon"></i>
                        <img src="{{asset('front_assets/images/circle.png')}}" class="image filter-gray" alt="">
                        <h4 class="f-25">انجازات وطموح</h4>
                    </div>
                </div>
                <div class="column is-2-desktop is-6-mobile">
                    <div class="section-content has-text-centered service-item">
                        <i class="icon icon-users f-8x absolute-item-icon"></i>
                        <img src="{{asset('front_assets/images/circle.png')}}" class="image filter-gray" alt="">
                        <h4 class="f-25">المجلس الاعلى</h4>
                    </div>
                </div>
                <div class="column is-2-desktop is-6-mobile">
                    <div class="section-content has-text-centered service-item">
                        <i class="icon icon-award f-8x absolute-item-icon"></i>
                        <img src="{{asset('front_assets/images/circle.png')}}" class="image filter-gray" alt="">
                        <h4 class="f-25">مجلس الادارة</h4>
                    </div>
                </div>
                <div class="column is-2-desktop is-6-mobile">
                    <div class="section-content has-text-centered service-item">
                        <i class="icon icon-activity f-8x absolute-item-icon"></i>
                        <img src="{{asset('front_assets/images/circle.png')}}" class="image filter-gray" alt="">
                        <h4 class="f-25">مجلس ادارة صندوق حماية البيئة</h4>
                    </div>
                </div>
                <div class="column is-2-desktop is-6-mobile">
                    <div class="section-content has-text-centered service-item">
                        <i class="icon icon-command f-8x absolute-item-icon"></i>
                        <img src="{{asset('front_assets/images/circle.png')}}" class="image filter-gray" alt="">
                        <h4 class="f-25">الادارة التنفيذية</h4>
                    </div>
                </div>
                <div class="column is-2-desktop is-6-mobile">
                    <div class="section-content has-text-centered service-item">
                        <i class="icon icon-box f-8x absolute-item-icon"></i>
                        <img src="{{asset('front_assets/images/circle.png')}}" class="image filter-gray" alt="">

                        <h4 class="f-25">الهيكل التنظيمي</h4>
                    </div>
                </div>
                <div class="column is-2-desktop is-6-mobile">
                    <div class="section-content has-text-centered service-item">
                        <i class="icon icon-monitor f-8x absolute-item-icon"></i>
                        <img src="{{asset('front_assets/images/circle.png')}}" class="image filter-gray" alt="">

                        <h4 class="f-25">قانون البيئة</h4>
                    </div>
                </div>
                <div class="column is-2-desktop is-6-mobile">
                    <div class="section-content has-text-centered service-item">
                        <i class="icon icon-layers f-8x absolute-item-icon"></i>
                        <img src="{{asset('front_assets/images/circle.png')}}" class="image filter-gray" alt="">

                        <h4 class="f-25">اللوائح التنفيذية</h4>
                    </div>
                </div>
                <div class="column is-2-desktop is-6-mobile">
                    <div class="section-content has-text-centered service-item">
                        <i class="icon icon-map-pin f-8x absolute-item-icon"></i>
                        <img src="{{asset('front_assets/images/circle.png')}}" class="image filter-gray" alt="">

                        <h4 class="f-25">خرائط تهمك</h4>
                    </div>
                </div>
                <div class="column is-2-desktop is-6-mobile">
                    <div class="section-content has-text-centered service-item">
                        <i class="icon icon-feather f-8x absolute-item-icon"></i>
                        <img src="{{asset('front_assets/images/circle.png')}}" class="image filter-gray" alt="">

                        <h4 class="f-25">المحميات الطبيعية</h4>
                    </div>
                </div>
            </div>
        </div>


        <!--</iframe>-->
        <!--<div class="columns is-multiline">-->
        <!--<div class="column is-12 has-text-centered">-->
        <!--<img src="front_assets/images/icon_goal4.gif" width="150" class="m-auto" alt="">-->
        <!--<img src="front_assets/images/icon_goal1.gif" width="150" class="m-auto" alt="">-->
        <!--<img src="front_assets/images/icon_goal5.gif" width="150" class="m-auto" alt="">-->
        <!--<img src="front_assets/images/icon_goal2.gif" width="150" class="m-auto" alt="">-->
        <!--<img src="front_assets/images/icon_goal3.gif" width="150" class="m-auto" alt="">-->
        <!--</div>-->
        <!--</div>-->
    </div>

    <div id="services-features" data-navigation-id="services" class="section has-title has-background">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="section-content has-text-centered">
                        <span class="section-title">خدماتنا</span>
                        <h5 class="small-headline">الخدمات المقدمة من الموقع</h5>
                        <h3>اليك بعض الخدمات الالكترونية</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="columns is-multiline">

                <div class="column is-4">
                    <div class="feature-item">
                        <a href="{{route('violationEnquiry')}}" class="link">
                            <div class="feature-step">
                                <i class="icon icon-credit-card features-icon f-6x"></i>
                            </div>
                            <div class="feature-content">
                                <h5>دفع المخالفات البيئية</h5>
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                    النص
                                    العربى، </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="feature-item">
                        {{--<a href="{{route('loginOfficeAgent')}}" class="link">--}}
                        <a href="{{route('main-activity-office-agent')}}" class="link">
                            <div class="feature-step">
                                <i class="icon icon-command features-icon f-6x"></i>
                            </div>
                            <div class="feature-content">
                                <h5>خدمة الاعتماد البيئي / التجديد</h5>
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                    النص
                                    العربى، </p>
                            </div>
                        </a>
                    </div>
                </div>

                {{--<div class="column is-4">--}}
                {{--<div class="feature-item">--}}
                {{--<a href="" class="link">--}}
                {{--<div class="feature-step">--}}
                {{--<i class="icon icon-file features-icon f-6x"></i>--}}
                {{--</div>--}}
                {{--<div class="feature-content">--}}
                {{--<h5>طلب زيارة محمية الجهراء</h5>--}}
                {{--<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد--}}
                {{--النص--}}
                {{--العربى، </p>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</div>--}}

                <div class="column is-4">
                    <div class="feature-item">
                        <a href="{{route('index-environmental-request')}}" class="link">
                            <div class="feature-step">
                                <i class="icon icon-award features-icon f-6x"></i>
                            </div>
                            <div class="feature-content">
                                <h5> استمارة طلب بيانات بيئية</h5>
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                    النص
                                    العربى، </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="feature-item">
                        <a href="{{route('index-visit')}}" class="link">
                            <div class="feature-step">
                                <i class="icon icon-award features-icon f-6x"></i>
                            </div>
                            <div class="feature-content">
                                <h5>تصريح دخول للمحميات الطبيعية</h5>
                                <p>اصدار تصريح دخول محمية الجهراء </p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="column is-4">
                    <div class="feature-item">
                        <a href="{{route('frontTenderRegisterCompany')}}" class="link">
                            <div class="feature-step">
                                <i class="icon icon-archive features-icon f-6x"></i>
                            </div>
                            <div class="feature-content">
                                <h5>نظام الممارسات</h5>
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                    النص
                                    العربى، </p>
                            </div>
                        </a>
                    </div>
                </div>


                {{--<div class="column is-4">--}}
                {{--<div class="feature-item">--}}
                {{--<a href="" class="link">--}}
                {{--<div class="feature-step">--}}
                {{--<i class="icon icon-activity features-icon f-6x"></i>--}}
                {{--</div>--}}
                {{--<div class="feature-content">--}}
                {{--<h5> كراسة إعتماد المكاتب الاستشارية </h5>--}}
                {{--<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد--}}
                {{--النص--}}
                {{--العربى، </p>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="column is-4">--}}
                {{--<div class="feature-item">--}}
                {{--<a href="" class="link">--}}
                {{--<div class="feature-step">--}}
                {{--<i class="icon icon-feather features-icon f-6x"></i>--}}
                {{--</div>--}}
                {{--<div class="feature-content">--}}
                {{--<h5>تراخيص استيراد المواد الكيميائية</h5>--}}
                {{--<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد--}}
                {{--النص--}}
                {{--العربى، </p>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="column is-4">--}}
                {{--<div class="feature-item">--}}
                {{--<a href="" class="link">--}}
                {{--<div class="feature-step">--}}
                {{--<i class="icon icon-briefcase features-icon f-6x"></i>--}}
                {{--</div>--}}
                {{--<div class="feature-content">--}}
                {{--<h5>التوظيف</h5>--}}
                {{--<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد--}}
                {{--النص--}}
                {{--العربى، </p>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</div>--}}

                <div class="column is-4">
                    <div class="feature-item">
                        <a href="{{route('index-industrial')}}" class="link">
                            <div class="feature-step">
                                <i class="icon icon-briefcase features-icon f-6x"></i>
                            </div>
                            <div class="feature-content">
                                <h5>الإستعلام عن الإجراءات الصناعية </h5>
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                    النص
                                    العربى، </p>
                            </div>
                        </a>
                    </div>
                </div>

                {{--<div class="column is-4">--}}
                {{--<div class="feature-item">--}}
                {{--<a href="" class="link">--}}
                {{--<div class="feature-step">--}}
                {{--<i class="icon icon-info features-icon f-6x"></i>--}}
                {{--</div>--}}
                {{--<div class="feature-content">--}}
                {{--<h5>الشكاوي البيئية</h5>--}}
                {{--<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد--}}
                {{--النص--}}
                {{--العربى، </p>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</div>--}}

                <div class="column is-4">
                    <div class="feature-item">
                        <a href="{{route('index-certificate')}}" class="link">
                            <div class="feature-step">
                                <i class="icon icon-file-text features-icon f-6x"></i>
                            </div>
                            <div class="feature-content">
                                <h5>الشهادات و طلبات الاعتمادات</h5>
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                    النص
                                    العربى، </p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="column is-4">
                    <div class="feature-item">
                        <a href="{{route('falcon-index')}}" class="link">
                            <div class="feature-step">
                                <i class="icon icon-airplay features-icon f-6x"></i>
                            </div>
                            <div class="feature-content">
                                <h5>نظام فالكون للصقور</h5>
                                <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                                    النص
                                    العربى، </p>
                            </div>
                        </a>
                    </div>
                </div>
                {{--<div class="column is-4">--}}
                {{--<div class="feature-item">--}}
                {{--<a href="" class="link">--}}
                {{--<div class="feature-step">--}}
                {{--<i class="icon icon-repeat features-icon f-6x"></i>--}}
                {{--</div>--}}
                {{--<div class="feature-content">--}}
                {{--<h5>مصانع تدوير النفايات في دولة الكويت</h5>--}}
                {{--<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد--}}
                {{--النص--}}
                {{--العربى، </p>--}}
                {{--</div>--}}
                {{--</a>--}}
                {{--</div>--}}
                {{--</div>--}}

            </div>
        </div>
    </div>
    </div>

    <div id="person" class="section is-gray">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column is-5 has-text-right-tablet">
                    <iframe
                            src="https://www.meteoblue.com/en/weather/widget/three?geoloc=detect&nocurrent=0&noforecast=0&days=4&tempunit=CELSIUS&windunit=MILE_PER_HOUR&layout=image"
                            frameborder="0"
                            scrolling="NO"
                            allowtransparency="true"
                            sandbox="allow-same-origin allow-scripts allow-popups"
                            style="width: 100%;height: 590px">
                    </iframe>
                </div>
                <div class="column is-7 is-offset-1">
                    <div class="section-content">
                        <span class="section-title">الطقس</span>
                        <h5 class="small-headline">تتعرف على احوال الطقس</h5>
                        <h3>احوال الطقس</h3>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                            العربى،
                            حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى
                            يولدها
                            التطبيق.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="section has-title">

        <div class="container">
            <div class="columns">
                <div class="column is-6">
                    <div class="section-content">
                        <span class="section-title">التواصل</span>
                        <h5 class="small-headline">تواصل معنا</h5>
                        <h3>يسعدنا تواصلك معنا</h3>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-5">
                    <ul class="contact-details">
                        <li>
                            <i class="icon icon-phone"></i>
                            <div class="content">
                                <h5>رقم الهاتف:</h5>
                                <span> (+965) 2220-8310 </span>
                            </div>
                        </li>
                        <li>
                            <i class="icon icon-mail"></i>
                            <div class="content">
                                <h5>البريد الالكتروني:</h5>
                                <span>info@epa.org.kw</span>
                            </div>
                        </li>
                        <li>
                            <i class="icon icon-map-pin"></i>
                            <div class="content">
                                <h5>العنوان الاول:</h5>
                                <span> الشويخ الصناعية - الدائري الرابع - بجانب وزارة الإعلام</span>
                            </div>
                        </li>
                        <li>
                            <i class="icon icon-map-pin"></i>
                            <div class="content">
                                <h5>العنوان الثاني:</h5>
                                <span>شاطئ انجفة - شارع التعاون - قطعه 13 بلاج 17 مقابل منطقة سلوي</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="column is-7">
                    <form action="" class="ajax-form" method="get">
                        <div class="columns">
                            <div class="column">
                                <input type="text" name="name" class="ui-input" placeholder="الاسم:*" required=""
                                       autocomplete="off">
                            </div>
                            <div class="column">
                                <input type="email" name="email" class="ui-input" placeholder="البريد الالكتروني:*"
                                       required=""
                                       autocomplete="off">
                            </div>
                            <div class="column">
                                <input type="tel" name="phone" class="ui-input" placeholder="رقم الهاتف:*" required=""
                                       autocomplete="off">
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column">
                            <textarea type="textarea" name="text" class="ui-input" placeholder="نص الرسالة:*" rows="6"
                                      required=""></textarea>
                            </div>
                        </div>
                        <div class="columns is-multiline">
                            <div class="column has-text-centered">
                                <input type="submit" name="submit" class="btn" value="ارسال">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
