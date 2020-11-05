<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-link" data-toggle="collapse" href="#multiCollapseExample1" role="button"
               aria-expanded="false" aria-controls="multiCollapseExample1">
                <i class="la la-plus"></i>
                <span>{{__('tenders.add_new')}}</span>
            </a>

            @can('create-buyer-tender')
             <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse show" id="multiCollapseExample1">
                        <div class="card card-body">
                            {{Form::open([
                                'method'=>'post',
                                'route'=>['handleTenderBuyersStore',request()->id]
                            ])}}
                            <div class="row">
                                <div class="col-md-4">
                                    <b>{{__('tenders.company')}}</b>
                                    <select class="form-control" id="reference_companies" name="reference_code">
                                        @foreach($companies as $company)
                                            <option value="{{$company->tender_company->reference_code ?? ''}}"
                                                    dir="rtl">{{$company->name}} {{'|'.$company->tender_company->reference_code ?? ''}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('reference_code'))
                                        <span class="text-danger">{{$errors->first('reference_code')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <b>{{__('tenders.payment')}}</b>
                                    <select class="form-control" name="payment_type_id">
                                        @foreach($payment_types as $type)
                                            <option value="{{$type->id}}">{{app()->getLocale() == 'ar' ? $type->title : $type->type}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('payment_type_id'))
                                        <span class="text-danger">{{$errors->first('payment_type_id')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-12"></div>
                                <div class="col-md-8">
                                    <b>{{__('tenders.notes')}}</b>
                                    <textarea name="notes" class="form-control"></textarea>
                                    @if($errors->has('notes'))
                                        <span class="text-danger">{{$errors->first('notes')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button class="btn btn-primary">{{__('tenders.save')}}</button>
                                </div>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
            @endcan
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('tenders.company')}}</th>
                    <th>{{__('tenders.date')}}</th>
                    <th>{{__('tenders.notes')}}</th>
                    <th>{{__('tenders.payment')}}</th>
                    <th>{{__('tenders.extension_request')}}</th>
                    <th>{{__('tenders.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($buyers as $buyer)
                    <tr id="buyer_{{$buyer->id}}">
                        <td>{{$buyer->id}}</td>
                        <td>{{$buyer->company->name ?? ''}}</td>
                        <td>{{$buyer->payed_at ?? ''}}</td>
                        <td>{{$buyer->notes ?? ''}}</td>
                        <td>
                            ({{app()->getLocale() == 'ar' ? $buyer->payment_type->title ?? '' : $buyer->payment_type->type ?? ''}})
                            <span class="text-danger">{{$buyer->cost}}</span>
                            {{__('tenders.kwd')}}
                        </td>
                        <td>
                            @if($buyer->new_closing_date ?? null)
                                <div class="text-center">
                                    {{--<i class="la la-check text-info fa-x"></i>--}}
                                    {{--<br>--}}
                                    <b>{{$buyer->new_closing_date ?? ''}}</b>
                                </div>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            
                            @can('edit-buyer-tender')
                                <button type="button" data-toggle="modal" data-target="#editModal"
                                        data-id="{{$buyer->id ?? ''}}"
                                        data-notes="{{$buyer->notes ?? ''}}" data-dates="{{$buyer->payed_at ?? ''}}"
                                        class="btn btn-info btn-sm m-0">
                                    <i class="la la-edit"></i>
                                </button>
                            @endcan
                            @can('delete-buyer-tender')
                                <button class="btn btn-danger btn-sm m-0 tooltips" onclick="remove('{{$buyer->id}}')"
                                        aria-label="{{__('tenders.delete')}}">
                                    <i class="la la-close"></i>
                                </button>
                            @endcan
                            <button class="btn btn-warning btn-sm" onclick="showPayment({{$buyer->payment}})">
                                <i class="la la-print"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
