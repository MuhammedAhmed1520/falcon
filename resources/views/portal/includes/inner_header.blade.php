<div style="background-color: #151517;">
    <div class="container m-container">
        <div class="columns">
            <div class="column is-12">
                <nav class="navbar is-dark navbar-is-dark" role="navigation" aria-label="main navigation">
                    <div class="navbar-brand">
                        <a href="{{$shared_main_settings['front_site']->where('key','front_home')->first()->value ?? null}}" class="navbar-item" href="">
                            <img src="{{asset('assets/images/logo.png')}}" style="width: 120px;max-height: 120px">
                        </a>

                        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                           data-target="navbarBasicExample">
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                        </a>
                    </div>

                    <div id="navbarBasicExample" class="navbar-menu">
                        <div class="navbar-end" dir="rtl">
                            <a href="{{$shared_main_settings['front_site']->where('key','front_about_epa')->first()->value ?? null}}" class="navbar-item">
                                <span class="item_text">
                                    عن الهيئة
                                </span>
                            </a>
                            <a href="{{$shared_main_settings['front_site']->where('key','front_eservices')->first()->value ?? null}}" class="navbar-item">
                                <span class="item_text">
                                    الخدمات الالكترونية
                                </span>
                            </a>
                            <a href="{{$shared_main_settings['front_site']->where('key','front_manages')->first()->value ?? null}}" class="navbar-item">
                                <span class="item_text">
                                    الادارات
                                </span>
                            </a>
                            <a href="{{$shared_main_settings['front_site']->where('key','front_projects')->first()->value ?? null}}" class="navbar-item">
                                <span class="item_text">
                                    المشاريع
                                </span>
                            </a>
                            <a href="{{$shared_main_settings['front_site']->where('key','front_news')->first()->value ?? null}}" class="navbar-item">
                                <span class="item_text">
                                    الاخبار والفعاليات
                                </span>
                            </a>
                            <a href="{{$shared_main_settings['front_site']->where('key','front_liberary')->first()->value ?? null}}" class="navbar-item">
                                <span class="item_text">
                                    مكتبة الهيئة
                                </span>
                            </a>
                            <a href="{{$shared_main_settings['front_site']->where('key','front_contact')->first()->value ?? null}}" class="navbar-item">
                                    <span class="item_text">
                                        تواصل معنا
                                    </span>
                            </a>
                        </div>

                        {{--                        <div class="navbar-end">--}}
                        {{--                            <div class="navbar-item">--}}
                        {{--                                <div class="buttons">--}}
                        {{--                                    --}}{{--                                    <a class="button is-primary">--}}
                        {{--                                    --}}{{--                                        <strong>Sign up</strong>--}}
                        {{--                                    --}}{{--                                    </a>--}}
                        {{--                                    --}}{{--                                    <a class="button is-light">--}}
                        {{--                                    --}}{{--                                        Log in--}}
                        {{--                                    --}}{{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                    <div class="navbar-contents">

                        <a href="{{$shared_main_settings['front_site']->where('key','front_youtube')->first()->value ?? null}}"  class="navbar-item">
                            <img class="item_image" src="{{asset('front_assets/images/youtube.png')}}" alt="">
                        </a>
                        <a href="{{$shared_main_settings['front_site']->where('key','front_facebook')->first()->value ?? null}}"  class="navbar-item">
                            <img class="item_image" src="{{asset('front_assets/images/facebook.png')}}" alt="">
                        </a>
                        <a href="{{$shared_main_settings['front_site']->where('key','front_twitter')->first()->value ?? null}}"  class="navbar-item">
                            <img class="item_image" src="{{asset('front_assets/images/twitter.png')}}" alt="">
                        </a>
                        <a href="{{$shared_main_settings['front_site']->where('key','front_instagram')->first()->value ?? null}}"  class="navbar-item">
                            <img class="item_image" src="{{asset('front_assets/images/instagram.png')}}" alt="">
                        </a>
                        <a href="{{$shared_main_settings['front_site']->where('key','front_home')->first()->value ?? null}}"  class="navbar-item">
                            <img class="item_image" src="{{asset('front_assets/images/Home.png')}}" alt="">
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>

<style>
    .navbar-is-dark {
        color: #fff;
        background: #141417 !important;
        direction: ltr;
        height: 125px;
    }

    .navbar-contents {
        direction: rtl;
        display: flex;
        position: absolute;
        bottom: -5px;
        left: 40%;
    }

    .navbar-item:hover {
        text-decoration: none;
        background: transparent;
    }

    .item_text {
        font-size: 18px;
    }

    .item_image {
        width: 35px;
        max-height: 35px !important;
    }

    @media screen and (min-width: 1088px) {
        .navbar-end {
            margin-right: 0;
        }
    }

    @media screen and (min-width: 1472px) {
        .m-container {
            max-width: 1479px;
            width: 1472px;
        }
        .navbar-contents {
            left: 20%;
            bottom: 40px;
        }
    }
    .navbar-burger {
        color: #fff;
        border: 1px solid #888;
        border-radius: 5px;
        margin-top: 15px;
    }

</style>
<script>
    $(document).ready(function () {

        // Check for click events on the navbar burger icon
        $(".navbar-burger").click(function () {

            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");

        });
    });
</script>
