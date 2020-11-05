<div class="container-fluid">
    <div class="row">
        @can('create-application-tender')
        <div class="col-md-12">
            <a class="btn btn-link" data-toggle="collapse" href="#multiCollapseExample1" role="button"
               aria-expanded="false" aria-controls="multiCollapseExample1">
                <i class="la la-plus"></i>
                <span>{{__('tenders.add_new')}}</span>
            </a>

            {{Form::open([
                'method'=>'post',
                'route'=>['handleTenderApplicationsStore',request()->id]
            ])}}
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse show" id="multiCollapseExample1">
                        <div class="card card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <b>{{__('tenders.company')}}</b>
                                    <select class="form-control" id="buyer_select" name="buyer_id">
                                        @foreach($buyers as $buyer)
                                            <option value="{{$buyer->id}}">{{$buyer->company->name ?? ''}}
                                                - {{$buyer->company->reference_code ?? ''}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('buyer_id'))
                                        <b class="text-danger">{{$errors->first('buyer_id')}}</b>
                                    @endif
                                </div>
                                <div class="col-md-12"></div>
                                <div class="col-md-4">
                                    <b>{{__('tenders.date')}}</b>
                                    <input type="text" class="form-control date_time" name="submit_date">
                                    @if($errors->has('submit_date'))
                                        <b class="text-danger">{{$errors->first('submit_date')}}</b>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <b>{{__('tenders.price')}}</b>
                                    <input type="text" class="form-control arabicnumber" name="price"
                                           autocomplete="off">
                                    @if($errors->has('price'))
                                        <b class="text-danger">{{$errors->first('price')}}</b>
                                    @endif
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button class="btn btn-primary">{{__('tenders.save')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{Form::close()}}
        </div>
        @endcan
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('tenders.company')}}</th>
                    <th>{{__('tenders.date')}}</th>
                    <th>{{__('tenders.price')}}</th>
                    <th>{{__('tenders.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($applications as  $application)
                    <tr id="application_{{$application->id}}">
                        <td>{{$application->id}}</td>
                        <td>{{$application->buyer->company->name ?? ''}}</td>
                        <td>{{$application->submit_date ?? ''}}</td>
                        <td>{{$application->price ?? ''}}</td>
                        <td>
                            @can('edit-application-tender')
                                <button type="button" data-toggle="modal" data-target="#editModal"
                                        data-app-id="{{$application->id}}"
                                        data-price="{{$application->price}}"
                                        data-submit_date="{{$application->submit_date}}"
                                        class="btn btn-info btn-sm m-0">
                                    <i class="la la-edit"></i>
                                </button>
                            @endcan
                            @can('delete-application-tender')
                                <button class="btn btn-danger btn-sm m-0 tooltips" onclick="remove('{{$application->id}}')"
                                        aria-label="{{__('tenders.delete')}}">
                                    <i class="la la-close"></i>
                                </button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
