<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{Form::open([
                'method'=>'post',
                'route'=>['handleRequestReturnOrdersView',request()->id],
            ])}}

            <div class="row">
                <div class="col-md-3">
                    <label>{{__('office_agent.payment_type')}}</label>
                    <select name="payment_type_id" class="form-control">
                        @foreach($payment_types as $type)
                            <option value="{{$type->id}}">{{$type->title}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">{{$errors->first('type')}}</div>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-2">
                    <label>{{__('office_agent.paid_value')}}</label>
                    <input value="{{$cost}}" class="form-control" disabled>
                </div>
                <div class="col-md-12 mt-3">
                    <button class="btn btn-primary">
                        {{__('office_agent.submit_payment')}}
                    </button>
                </div>
            </div>

            {{Form::close()}}
        </div>
    </div>
</div>
