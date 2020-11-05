<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{Form::open([
                'method'=>'post',
                'enctype'=>'multipart/form-data',
                'route'=>['handleRequestChangeNameOrdersView',request()->id],
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
                <div class="col-md-3">
                    <label>{{__('office_agent.company_name_ar')}}</label>
                    <input name="office_name_ar" class="form-control" value="{{old('office_name_ar')}}">
                    <div class="text-danger">{{$errors->first('office_name_ar')}}</div>
                </div>
                <div class="col-md-3">
                    <label>{{__('office_agent.company_name_en')}}</label>
                    <input name="office_name_en" class="form-control" value="{{old('office_name_en')}}">
                    <div class="text-danger">{{$errors->first('office_name_en')}}</div>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-3">
                    <label>{{__('office_agent.company_file_name')}}</label>
                    <input type="file" name="file" class="form-control">
                    <div class="text-danger">{{$errors->first('file')}}</div>
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
