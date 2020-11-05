<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{Form::open([
                'method'=>'post',
                'enctype'=> "multipart/form-data",
                'route'=>['handleRequestApproveCertifyView',request()->id],
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
                <div class="col-md-3 cash_only">
                    <label>رقم الايصال</label>
                    <input name="receipt_code" class="form-control" value="{{old('receipt_code')}}">
                    <div class="text-danger">{{$errors->first('receipt_code')}}</div>
                </div>
                <div class="col-md-4 cash_only">
                    <label>{{__('office_agent.notes')}}</label>
                    <input name="notes" class="form-control" value="{{old('notes')}}">
                    <div class="text-danger">{{$errors->first('notes')}}</div>
                </div>
                <div class="col-md-3 cash_only">
                    <label>صورة الايصال</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <div class="text-danger">{{$errors->first('image')}}</div>
                </div>
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
