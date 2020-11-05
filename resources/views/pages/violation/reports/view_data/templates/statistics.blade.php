<div class="container-fluid">
    <div class="row">
        <div class="col-4 text-center">
            <h3 class="font-weight-bold">عدد المخالفات</h3>
            <canvas id="myChart-1" width="400" height="400"></canvas>
        </div>
        <div class="col-4 text-center">
            <h3 class="font-weight-bold">تكلفة المخالفات</h3>
            <canvas id="myChart-2" width="400" height="400"></canvas>
        </div>
        <div class="col-4 text-center">
            <h3 class="font-weight-bold">المخالفات المدفوعة</h3>
            <canvas id="myChart-3" width="400" height="400"></canvas>
        </div>
        <div class="col-4 text-center">
            <ul class="list-unstyled text-left">
                <li><h4>{{app()->getLocale() == 'ar' ? 'افراد': 'person'}}  {{$data['statistics']['person_count'] ?? 0}}</h4></li>
                <li><h4>{{app()->getLocale() == 'ar' ? 'شركات': 'company'}}  {{$data['statistics']['company_count'] ?? 0}} </h4></li>
                <li><h4>{{app()->getLocale() == 'ar' ? 'مصانع': 'manufacturer'}}  {{$data['statistics']['manufacturer_count'] ?? 0}}</h4> </li>
            </ul>
        </div>
        <div class="col-4 text-center">
            <ul class="list-unstyled text-left">
                <li><h4>{{app()->getLocale() == 'ar' ? 'افراد': 'person'}}  {{$data['statistics']['person_fine_cost'] ?? 0}}</h4></li>
                <li><h4>{{app()->getLocale() == 'ar' ? 'شركات': 'company'}}  {{$data['statistics']['company_fine_cost'] ?? 0}}</h4> </li> 
                <li><h4>{{app()->getLocale() == 'ar' ? 'مصانع': 'manufacturer'}}  {{$data['statistics']['manufacturer_fine_cost'] ?? 0}}</h4> </li>
            </ul>
        </div>
        <div class="col-4 text-center">
            <ul class="list-unstyled text-left">
                <li><h4>{{app()->getLocale() == 'ar' ? 'مدفوعة': 'paid'}}  {{$data['statistics']['payed_count'] ?? 0}}</h4></li>
                <li><h4>{{app()->getLocale() == 'ar' ? 'غير مدفوعة': 'unpaid'}}  {{$data['statistics']['unPayed_count'] ?? 0}}</h4> </li> 
            </ul>
        </div>
    </div>
    <hr>
</div>