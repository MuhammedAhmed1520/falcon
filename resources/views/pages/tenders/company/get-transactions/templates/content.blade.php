<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary" onclick="window.print()"><i class="la la-print"></i></button>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr class="bg-primary text-white">
                    <th>المبلغ</th>
                    <th>تفاصيل الدفع</th>
                    <th>نوع الدفع</th>
                    <th>تاريخ الدفع</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subscription as $sup)
                    <tr style="background: #eee">
                        <td>{{$sup->cost}}</td>
                        <td>{{$sup->coscheck_info ?? '-'}}</td>
                        <td>{{$sup->payment_type->title ?? ''}}</td>
                        <td>{{$sup->payed_at}}</td>
                    </tr>
                    @if($sup->payment->knet_data ?? null)
                        <tr>
                            <td>Payment ID</td>
                            <td colspan="3">{{$sup->payment->knet_data->payment_id}}</td>
                        </tr>
                        <tr>
                            <td>Result</td>
                            <td colspan="3">{{$sup->payment->knet_data->result}}</td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td colspan="3">{{$sup->payment->knet_data->created_at}}</td>
                        </tr>
                        <tr>
                            <td>Tran ID</td>
                            <td colspan="3">{{$sup->payment->knet_data->tran_id}}</td>
                        </tr>
                        <tr>
                            <td>Ref</td>
                            <td colspan="3">{{$sup->payment->knet_data->ref}}</td>
                        </tr>
                        <tr>
                            <td>Track ID</td>
                            <td colspan="3">{{$sup->payment->knet_data->track_id}}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <div class="col-md-12 mb-5">
                {{$subscription->appends(\request()->except(['page']))->render("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
</div>