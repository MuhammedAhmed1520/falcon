<div class="container-fluid">
    {{Form::open([
        'method'=>'put',
        'route'=>['updatePages',$page->id]
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">

                    <div class="col-md-3">
                        <b>{{__('tenders.title')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="title_ar"
                                   autocomplete="off"
                                   value="{{$page->title_ar}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('title_ar'))
                                    <span class="text-danger">({{$errors->first('title_ar')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-3">
                        <b>{{__('tenders.title_en')}} </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="title_en"
                                   autocomplete="off"
                                   value="{{$page->title_en}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('title_en'))
                                    <span class="text-danger">({{$errors->first('title_en')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-3">
                        <b>{{__('tenders.order')}}</b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" type="text"
                                   name="order"
                                   autocomplete="off"
                                   value="{{$page->order}}"/>
                            <label class="input__label input__label--isao">
                            <span class="input__label-content input__label-content--isao">
                                @if($errors->has('order'))
                                    <span class="text-danger">({{$errors->first('order')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>
                    <div class="col-md-12">
                        <textarea name="content" id="editor">{{$page->content}}</textarea>
                        @if($errors->has('content'))
                            <b class="text-danger">({{$errors->first('content')}})</b>
                        @endif
                        <div class="col-md-12 text-center mt-5 mb-5">
                            <button class="btn btn-primary mt-5">
                                {{__('tenders.edit')}}
                            </button>
                        </div>

                    </div>
                </div>
            </fieldset>

        </div>
    </div>
    {{Form::close()}}
</div>