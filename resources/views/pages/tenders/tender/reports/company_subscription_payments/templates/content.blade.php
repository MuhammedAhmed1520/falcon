<div class="container-fluid">
    <ul class="list-unstyled mt-2 mb-4 text-center"> 
        @if(request()->date_from && request()->date_to)
            <li>
                <span class="fs15">{{__('violation.violation_payment_date')}} : </span>
                <span>من  {{request()->date_from }} الى {{request()->date_to}}</span>
            </li>
        @endif 
    </ul>
    <div class="row">
            <div class="col-md-12 mb-2 text-center">
                <span class="fs15"> {{__('dashboard.print_date') }} : </span>
                <span>({{Carbon\Carbon::now()->format('Y-m-d H:i:s')}})</span>
            </div>
        <div class="col-md-12 d-none mb-4 bg-gray">
            <div class="row"> 
                <div class="col-6">
                    <ul class="list-unstyled mt-4 mb-4">
                        <li>
                            <span class="fs15"> {{__('dashboard.print_date') }} : </span>
                            <span>{{Carbon\Carbon::now()->format('Y-m-d H:i:s')}}</span>
                        </li>
                    </ul>
                </div>  
            </div>
        </div> 
        <div class="col-md-12">
            <table class="table table-bordered table-striped table_print">
                <thead class="header_print">
                <tr>
                    <th>#</th>
                    <th>مسلسل</th>
                    <th>اسم الشركة</th>
                    <th>تاريخ الدفع</th>
                    <th>المبلغ</th>
                    <th>نوع الدفع</th>
                    <th>مسلسل الدفع</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subscriptions as $k => $subscription)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>#{{$subscription->id ?? ''}}</td>
                        <td>{{$subscription->company->name ?? ''}}</td>
                        <td>{{$subscription->payed_at ?? '-'}}</td>
                        <td>{{$subscription->cost ?? ''}}</td>
                        <td>{{$subscription->payment_type->title ?? ''}}</td>
                        <td>{{$subscription->payment->knet_data->payment_id ?? '-'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(request()->paginated == 'true')
                <div class="text-center">
                    {{$subscriptions->appends(request()->all())->links() ?? ''}}
                </div> 
            @endif
        </div>
    </div>
</div>