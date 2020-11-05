<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-3">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{{__('violation.civil_name')}}</th>
                    <th>{{app()->getLocale() == 'ar' ? 'نوع العملية' : 'Action Type'}}</th>
                    <th>{{app()->getLocale() == 'ar' ? 'التاريخ' : 'Created At'}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($loggerData as $logger)
                    <tr>
                        <td>
                            {{$logger->paymentable->first()->name ?? ''}}
                        </td>
                        <td>
                             {{ $logger->type->name }}
                        </td>
                        <td>
                            {{$logger->updated_at}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
