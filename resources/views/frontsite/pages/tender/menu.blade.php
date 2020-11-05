{{--<button class="button is-dark is-medium is-invisible-desktop" onclick="menuToggle()">--}}
{{--    <i class="icon icon-menu"></i>--}}
{{--</button>--}}
<aside class="menu border-dasheds" id="aside_menu">
    <div class="tabs is-toggle is-fullwidth is-large has-background-white">
        <ul dir="ltr" style="display: flex;" class="flex-sm-column">
            <li class="tab_item " style="flex: 1;width: 100%" id="tender_tab_tab"
                data-tab="#tender_tab">
                <a>
                    <span class="icon"><i class="fas fa-image" aria-hidden="true"></i></span>
                    <b class="font_bold f-size-18 has-text-black"> الممارسات</b>
                </a>
            </li>
            <li class="tab_item is-active" style="flex: 1;width: 100%" id="comp_tab_tab" data-tab="#comp_tab">
                <a>
                    <span class="icon"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                    <b class="has-text-black font_bold f-size-18"> تسجيل الشركات</b>
                </a>
            </li>
        </ul>
    </div>
    <div id="comp_tab" class="tab_items columns is-multiline">
        {{--        <div class="column is-3-desktop"></div>--}}
        <div class="column is-3-desktop">
            <a href="{{route('frontTenderRegisterCompany')}}?tab=comp_tab&window={{request()->get('window')}}">
                <div class="card red_blue {{($is_active ?? null)  == 1 ? 'is-active': ''  }}">
                    <div class="card-content font_bold">
                        تسجيل شركة جديدة
                    </div>
                </div>
            </a>
            <a href="{{route('frontTenderResetCode')}}?tab=comp_tab&window={{request()->get('window')}}"
               class="font_bold"
               style="position:relative;top: 5px;">
                نسيت الرقم المرجعي ؟
            </a>


        </div>
        <div class="column is-3-desktop">
            <a href="{{route('frontTenderCompanyEnquiry',['type'=>'files'])}}?tab=comp_tab&window={{request()->get('window')}}"
               class="font_bold">
                <div class="card red_blue {{request()->type == 'files' ? 'is-active': ''}}">
                    <div class="card-content">
                        الاستعلام عن ملفات الشركة
                    </div>
                </div>
            </a>
        </div>
        <div class="column is-3-desktop">
            <a href="{{route('frontTenderCompanyEnquiry',['type'=>'subscriptionPay'])}}?tab=comp_tab&window={{request()->get('window')}}"
               class="font_bold">
                <div class="card red_blue {{request()->type == 'subscriptionPay' ? 'is-active': ''}}">
                    <div class="card-content">
                        دفع اشتراك الشركة
                    </div>
                </div>
            </a>
        </div>
        <div class="column is-3-desktop">
            <a href="{{route('frontTenderCompanyEnquiry',['type'=>'status'])}}?tab=comp_tab&window={{request()->get('window')}}"
               class="font_bold">
                <div class="card red_blue {{request()->type == 'status' ? 'is-active': ''}}">
                    <div class="card-content">
                        استعلام عن حالة الشركة
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div id="tender_tab" style="display: none;" class="tab_items columns is-multiline">
        <div class="column is-3-desktop">
            <a href="{{route('frontTenderAllTenders')}}?tab=tender_tab&window={{request()->get('window')}}"
               class="font_bold">
                <div class="card red_yellow {{($is_active ?? null)  == 3 ? 'is-active': ''  }}">
                    <div class="card-content">
                        عرض كافة الممارسات
                    </div>
                </div>
            </a>
        </div>
        {{--        <div class="column is-1-desktop"></div>--}}
        <div class="column is-3-desktop">
            <a href="{{route('frontTenderAvailableTenders')}}?tab=tender_tab&window={{request()->get('window')}}"
               class="font_bold">
                <div class="card red_yellow {{($is_active ?? null)  == 4 ? 'is-active': ''  }}">
                    <div class="card-content">
                        الممارسات المطروحة
                    </div>
                </div>
            </a>
        </div>
        <div class="column is-3-desktop">
            <a href="{{route('frontTenderRejectTenders')}}?tab=tender_tab&window={{request()->get('window')}}"
               class="font_bold">
                <div class="card red_yellow {{($is_active ?? null)  == 5 ? 'is-active': ''  }}">
                    <div class="card-content">
                        فض العطائات
                    </div>
                </div>
            </a>
        </div>
        <div class="column is-3-desktop">
            <a href="{{route('frontTenderApprovedTenders')}}?tab=tender_tab&window={{request()->get('window')}}"
               class="font_bold">
                <div class="card red_yellow {{($is_active ?? null)  == 6 ? 'is-active': ''  }}">
                    <div class="card-content">
                        الترسيات
                    </div>
                </div>
            </a>
        </div>
    </div>
    {{--    <p class="menu-label">--}}
    {{--        القائمة الرئيسية للشركات--}}
    {{--    </p>--}}
    {{--    <ul class="menu-list">--}}
    {{--        <a class="has-text-weight-bold">الشركات </a>--}}
    {{--        <li><a href="{{route('frontTenderRegisterCompany')}}"--}}
    {{--               class="{{($is_active ?? null)  == 1 ? 'is-active': ''  }}">تسجيل شركة جديدة</a></li>--}}
    {{--        <li>--}}
    {{--        <li><a href="{{route('frontTenderResetCode')}}"--}}
    {{--               class="{{($is_active ?? null)  == 2 ? 'is-active': ''  }}">نسيت الرقم المرجعي ؟</a></li>--}}
    {{--        <li>--}}
    {{--            <a class="has-text-weight-bold">قائمة الاستعلامات</a>--}}
    {{--            <ul>--}}
    {{--                <li><a href="{{route('frontTenderCompanyEnquiry',['type'=>'files'])}}"--}}
    {{--                       class="{{request()->type == 'files' ? 'is-active': ''}}">الاستعلام عن--}}
    {{--                        ملفات الشركة</a></li>--}}
    {{--                <li><a href="{{route('frontTenderCompanyEnquiry',['type'=>'subscriptionPay'])}}"--}}
    {{--                       class="{{request()->type == 'subscriptionPay' ? 'is-active': ''}}">دفع اشتراك الشركة</a>--}}
    {{--                </li>--}}
    {{--                <li><a href="{{route('frontTenderCompanyEnquiry',['type'=>'status'])}}"--}}
    {{--                       class="{{request()->type == 'status' ? 'is-active': ''}}">استعلام عن حالة الشركة</a>--}}
    {{--                </li>--}}
    {{--            </ul>--}}
    {{--        </li>--}}
    {{--        <li>--}}
    {{--            <a class="has-text-weight-bold">عرض الممارسات</a>--}}
    {{--            <ul>--}}
    {{--                <li><a href="{{route('frontTenderAllTenders')}}"--}}
    {{--                       class="{{($is_active ?? null)  == 3 ? 'is-active': ''  }}"> كافة الممارسات </a></li>--}}
    {{--                <li><a href="{{route('frontTenderAvailableTenders')}}"--}}
    {{--                       class="{{($is_active ?? null)  == 4 ? 'is-active': ''  }}"> الممارسات المطروحة</a></li>--}}
    {{--                <li><a href="{{route('frontTenderRejectTenders')}}"--}}
    {{--                       class="{{($is_active ?? null)  == 5 ? 'is-active': ''  }}"> فض العطائات </a></li>--}}
    {{--                <li><a href="{{route('frontTenderApprovedTenders')}}"--}}
    {{--                       class="{{($is_active ?? null)  == 6 ? 'is-active': ''  }}">الترسيات</a></li>--}}
    {{--            </ul>--}}
    {{--        </li>--}}
    {{--    </ul>--}}
</aside>
<style>
    @media only screen and (max-width: 600px) {
        .flex-sm-column {
            flex-direction: column;
        }

    }

    .tab_items {
        min-height: 100px;
    }

    .border-dashed {
        border: 2px dashed #aaa;
        padding: 15px;
    }

    .font_bold {
        font-weight: bold;
    }

    .f-size-18 {
        font-size: 22px;
    }

    .tabs.is-toggle li.is-active a {
        color: #fff;
        background: #0547a6;

    }

    .tabs.is-toggle li.is-active a b {
        color: #fff !important;

    }

    .card.is-active {
        border: 2px solid #A66405;
        color: #fff;
        text-decoration: underline;

    }

    .red_grad {
        /*color: #fff;*/
        /*background: linear-gradient(to right, rgb(120, 189, 67), rgb(187, 213, 85));*/
        background: #555;
        color: #fff;
        /*background: linear-gradient(to right, #EB5757, #000)*/
    }

    .red_blue {
        /*color: #fff;*/
        /*background: linear-gradient(to right, rgb(81, 177, 227), rgb(137, 198, 232))*/
        color: #fff;
        background: #0547a6;
        transition: all 0.5s ease-in-out;
    }

    .red_blue:hover {
        background: #053d8d;
    }

    .red_yellow {
        color: #fff;
        transition: all 0.5s ease-in-out;
        background: #0547a6
        /*background: linear-gradient(to right, rgb(160, 137, 87), rgb(205, 177, 141))*/
    }

    .red_yellow:hover {
        background: #053d8d;
    }

    .red_blue .card-content,
    .red_yellow .card-content {
        text-align: center;
    }

    .column a:hover {
        text-decoration: none;
    }

    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
        color: #333;
        font-size: 22px;
        font-weight: bold;
    }
</style>
<script>
    // alert($(window).width())
    if ($(window).width() < 725) {
        // menuToggle()
    }

    function menuToggle() {
        $('#aside_menu').slideToggle();
    }

    @if(request()->get('tab'))
    $('.tab_items').hide();
    $('.tab_item').removeClass('is-active')
    $('#{{request()->get('tab')}}_tab').addClass('is-active')
    $('#{{request()->get('tab')}}').show();
    @endif

    $('.tab_item').on('click', function () {
        $('.tab_item').removeClass('is-active')
        $(this).addClass('is-active')
        $('.tab_items').hide();
        let tab = $(this).data('tab');
        $(tab).show();
        // alert(tab)

        $('.env_loader').show();
        if (tab == '#comp_tab') {
            location.href = "{{route('frontTenderRegisterCompany')}}?tab=comp_tab&window={{request()->get('window')}}";
        } else {

            location.href = "{{route('frontTenderAllTenders')}}?tab=tender_tab&window={{request()->get('window')}}";
        }
    });
</script>
