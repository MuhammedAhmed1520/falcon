
<style>
    a, a:hover {
        color: #7f0808
    }

    .card-navigation {
        font-weight: bold;
        background: #7f0808;
        border: 1px solid #000;
        margin: 2px;
        font-size: 18px;
    }
</style>
<aside class="menu border-dasheds" id="aside_menu">
    <!--<p class="menu-label">-->
    <!--    القائمة الرئيسية-->
    <!--</p>-->
    <!--<ul class="menu-list">-->
    <!--    <a class="has-text-weight-bold">الطلبات </a>-->
<!--    <li><a href="{{route('index-certificate')}}"-->
<!--           class="{{($is_active ?? null)  == 1 ? 'is-active': ''  }}">استعلام عن الطلب</a></li>-->
    <!--    <li>-->

<!--    <li><a href="{{route('create-certificate')}}"-->
<!--           class="{{($is_active ?? null)  == 2 ? 'is-active': ''  }}">تقديم طلب استخراج شهادة</a></li>-->
    <!--    <li>-->
    <!--</ul>-->
    <div class="row direction">
        <div class="col-md-6">
            <div class="col-md-12">
{{--                <hr>--}}
            </div>
            <a href="{{route('index-portal-certificate')}}" class="font_bold size18 text-white">
                <div class="cards card-body card-navigation {{($is_active ?? null)  == 1 ? 'is-active': ''  }}">
                    <div class="card-content">
                        {{__('portal.enq_request')}}
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{route('create-portal-certificate')}}" class="font_bold size18 text-white">
                <div class="cards card-body card-navigation {{($is_active ?? null)  == 2 ? 'is-active': ''  }}">
                    <div class="card-content">
                        {{__('portal.intro_request')}}
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>


    </div>
</aside>
