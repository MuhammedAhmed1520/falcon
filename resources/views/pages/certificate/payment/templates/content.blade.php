<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">

                    <div class="col-md-12 mt-3">
                        <h3>بيانات الدفع </h3>
                        @if($certificate->paymentable->knet_data ?? null)
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <b>Product Name</b>
                                    </td>
                                    <td width="65%">
                                        <b>شهادة لمن يهمه الامر بعدم وجود محاضر بمخالفات بيئية</b>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Name</b>
                                    </td>
                                    <td width="65%">
                                        <b>{{$certificate->company_name}}</b>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Owner Name</b>
                                    </td>
                                    <td width="65%">
                                        <b>{{$certificate->owner_name}}</b>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>License No.</b>
                                    </td>
                                    <td width="65%">
                                        <b>{{$certificate->license_number}}</b>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>For Follow Ups</b>
                                    </td>
                                    <td width="65%">
                                        <b>{{$certificate->user->name ?? ''}}</b>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Email Address</b>
                                    </td>
                                    <td width="65%">
                                        <b>{{$certificate->email}}</b>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Civil SSN</b>
                                    </td>
                                    <td width="65%">
                                        <b>{{$certificate->civil_ssn}}</b>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>Mobile No.</b>
                                    </td>
                                    <td width="65%">
                                        <b>{{$certificate->mobile}}</b>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <b>RESULT</b>
                                    </td>
                                    <td width="65%">
                                        <b>{{$certificate->paymentable->knet_data->result ?? ''}}</b>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <b>DATE</b>
                                    </td>
                                    <td width="65%">
                                        <b>{{$certificate->paymentable->knet_data->created_at->format('Y-m-d') ?? ''}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>TIME</b>
                                    </td>
                                    <td width="65%">
                                        <b>{{$certificate->paymentable->knet_data->created_at->format('H:s:i') ?? ''}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>AMOUNT</b>
                                    </td>
                                    <td width="65%">
                                        <b>{{$certificate->paymentable->knet_data->amount ?? ''}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>TRANSACTION ID</b>
                                    </td>
                                    <td width="65%">
                                        <b>{{$certificate->paymentable->knet_data->tran_id ?? ''}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>REFERENCE ID</b>
                                    </td>
                                    <td width="65%">
                                        <b>{{$certificate->paymentable->knet_data->ref ?? ''}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>payment ID</b>
                                    </td>
                                    <td width="65%">
                                        <b>{{$certificate->paymentable->knet_data->payment_id ?? ''}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>TRACK ID</b>
                                    </td>
                                    <td width="65%">
                                        <b>{{$certificate->paymentable->knet_data->track_id ?? ''}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Status</b>
                                    </td>
                                    <td width="65%">
                                        <b>Paid</b>
                                    </td>
                                </tr>
                            </table>
                        @else
                            <div class="alert alert-danger" role="alert">
                                <h3>
                                    {{app()->getLocale() == 'ar' ? 'لم يتم الدفع' : 'No Payment'}}
                                </h3>
                            </div>
                        @endif
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

