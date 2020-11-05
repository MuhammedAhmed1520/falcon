<div class="container-fluid">
    {{Form::open([
        'method'=>'post',
        'route'=>['handlePostponeView',$tender->id]
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">

                    <div class="col-md-12">
                        <h5>
                            <b>{{__('tenders.old_closing_date')}}</b>
                            <p class="text-danger">{{$tender->last_app_date}}</p>
                        </h5>
                        <br>
                    </div>
                    <div class="col-md-3">
                        <b>{{__('tenders.new_closing_date')}}
                            <star>*</star>
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao date_time" type="text"
                                   name="new_closing_date"
                                   autocomplete="off"
                                   value="{{old('new_closing_date')}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('new_closing_date'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('new_closing_date')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>


                    <div class="col-md-12">
                        <input id="notify" type="checkbox" name="notify" value="1">
                        <label for="notify">{{__('tenders.send_notify')}}</label>
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