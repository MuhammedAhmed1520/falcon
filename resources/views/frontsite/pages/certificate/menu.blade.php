
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
    <div class="columns is-multiline">
        <div class="column is-3-desktop is-3-tablet"></div>
        <div class="column is-3-desktop is-3-tablet">
            <a href="{{route('index-certificate')}}" class="font_bold">
                <div class="card red_blue {{($is_active ?? null)  == 1 ? 'is-active': ''  }}">
                    <div class="card-content">
                       استعلام عن الطلب
                    </div>
                </div>
            </a>
        </div>
        <div class="column is-3-desktop is-3-tablet">
            <a href="{{route('create-certificate')}}" class="font_bold">
                <div class="card red_blue {{($is_active ?? null)  == 2 ? 'is-active': ''  }}">
                    <div class="card-content">
                       تقديم طلب استخراج شهادة
                    </div>
                </div>
            </a>
        </div>
        
          
    </div>
</aside>
<style>
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
.tabs.is-toggle li.is-active a{
    color:#fff;
        background: #0547a6;
    
}

.tabs.is-toggle li.is-active a b{
    color:#fff!important;
     
}
    .card.is-active {
        border:4px solid #fff;
        color: #fff;
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
.red_yellow .card-content{
    text-align:center;
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