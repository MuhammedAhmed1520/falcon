<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                {{Form::open([
                    'method'=>'post',
                    'route'=>['handleUpdateWinnerApplication',request()->id]
                ])}}
                <div class="row">

                    <div class="col-md-4">
                        <b>{{__('tenders.select_winner')}}</b>
                        <select class="form-control multi-select" name="application_id[]" multiple>
                            @foreach($applications as $app)
                                <option @if(in_array($app->id , $winner['application_ids']->toArray() ?? [])) selected @endif value="{{$app->id}}">{{$app->buyer->company->name ?? ''}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('application_id'))
                            <span class="text-danger">
                            {{$errors->first('application_id')}}
                            </span>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <b>{{__('tenders.reason')}}</b>
                        <textarea class="form-control" name="reason">{{old('reason') ?? $winner['reason']->reason ?? ''}}</textarea>
                        @if($errors->has('reason'))
                            <span class="text-danger">
                            {{$errors->first('reason')}}
                            </span>
                        @endif
                    </div>

                    <div class="col-md-12 text-center mt-3 mb-5">
                        <button class="btn btn-primary">
                            {{__('tenders.save')}}
                        </button>
                    </div>

                </div>
            </fieldset>
        </div>
    </div>
</div>