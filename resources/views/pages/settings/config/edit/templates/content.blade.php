<div class="container-fluid">
    {{Form::open([
        'route'=>'handleConfig',
        'method'=>'post'
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('tenders.config')}}</legend>
                <div class="row">
                    @foreach($settings['tender'] as $setting)
                        @if($setting->type == 'bool')
                            <div class="col-md-4 pb-2">
                                <input type="checkbox" name="{{$setting->key}}"
                                       data-off="{{__('tenders.off')}}"
                                       data-on="{{__('tenders.on')}}" data-toggle="toggle"
                                       data-onstyle="outline-primary" data-style="ios"
                                       value="1" {{$setting->value ? 'checked':''}}
                                       data-offstyle="outline-secondary">
                                <b>{{__('tenders.'.$setting->key)}}</b>
                                <hr>
                            </div>
                        @endif
                        @if($setting->type == 'text')
                            <div class="col-md-3 pb-2">
                                <b>{{__('tenders.'.$setting->key)}}</b>
                                <span class="input input--isao">
                                    <input class="input__field input__field--isao text-center" name="{{$setting->key}}"
                                           autocomplete="off" type="text"
                                           value="{{old($setting->key) ?? $setting->value ?? ''}}"
                                           placeholder="{{__('tenders.'.$setting->key)}}"/>
                                    <label class="input__label input__label--isao">
                                    <span class="input__label-content input__label-content--isao">
                                        @if($errors->has($setting->key))
                                            <span class="text-danger">({{$errors->first($setting->key)}})</span>
                                        @endif
                                    </span>
                                </label>
                              </span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <hr>
                <div class="row">
                    @foreach($settings['certificate'] as $setting)
                        @if($setting->type == 'bool')
                            <div class="col-md-4 pb-2">
                                <input type="checkbox" name="{{$setting->key}}"
                                       data-off="{{__('tenders.off')}}"
                                       data-on="{{__('tenders.on')}}" data-toggle="toggle"
                                       data-onstyle="outline-primary" data-style="ios"
                                       value="1" {{$setting->value ? 'checked':''}}
                                       data-offstyle="outline-secondary">
                                <b>{{__('setting.'.$setting->key)}}</b>
                                <hr>
                            </div>
                        @endif
                        @if($setting->type == 'text')
                            <div class="col-md-3 pb-2">
                                <b>{{__('setting.'.$setting->key)}}</b>
                                <span class="input input--isao">
                                    <input class="input__field input__field--isao text-center" name="{{$setting->key}}"
                                           autocomplete="off" type="text"
                                           value="{{old($setting->key) ?? $setting->value ?? ''}}"
                                           placeholder="{{__('setting.'.$setting->key)}}"/>
                                    <label class="input__label input__label--isao">
                                    <span class="input__label-content input__label-content--isao">
                                        @if($errors->has($setting->key))
                                            <span class="text-danger">({{$errors->first($setting->key)}})</span>
                                        @endif
                                    </span>
                                </label>
                              </span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <hr>
                <div class="row">
                    @foreach($settings['ppform'] as $setting)
                        @if($setting->type == 'bool')
                            <div class="col-md-4 pb-2">
                                <input type="checkbox" name="{{$setting->key}}"
                                       data-off="{{__('tenders.off')}}"
                                       data-on="{{__('tenders.on')}}" data-toggle="toggle"
                                       data-onstyle="outline-primary" data-style="ios"
                                       value="1" {{$setting->value ? 'checked':''}}
                                       data-offstyle="outline-secondary">
                                <b>{{__('setting.'.$setting->key)}}</b>
                                <hr>
                            </div>
                        @endif
                        @if($setting->type == 'text')
                            <div class="col-md-3 pb-2">
                                <b>{{__('setting.'.$setting->key)}}</b>
                                <span class="input input--isao">
                                    <input class="input__field input__field--isao text-center" name="{{$setting->key}}"
                                           autocomplete="off" type="text"
                                           value="{{old($setting->key) ?? $setting->value ?? ''}}"
                                           placeholder="{{__('setting.'.$setting->key)}}"/>
                                    <label class="input__label input__label--isao">
                                    <span class="input__label-content input__label-content--isao">
                                        @if($errors->has($setting->key))
                                            <span class="text-danger">({{$errors->first($setting->key)}})</span>
                                        @endif
                                    </span>
                                </label>
                              </span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <hr>
                <div class="row">
                    @foreach($settings['front_site'] as $setting)
                        @if($setting->type == 'bool')
                            <div class="col-md-4 pb-2">
                                <input type="checkbox" name="{{$setting->key}}"
                                       data-off="{{__('tenders.off')}}"
                                       data-on="{{__('tenders.on')}}" data-toggle="toggle"
                                       data-onstyle="outline-primary" data-style="ios"
                                       value="1" {{$setting->value ? 'checked':''}}
                                       data-offstyle="outline-secondary">
                                <b>{{__('setting.'.$setting->key)}}</b>
                                <hr>
                            </div>
                        @endif
                        @if($setting->type == 'text')
                            <div class="col-md-3 pb-2">
                                <b>{{__('setting.'.$setting->key)}}</b>
                                <span class="input input--isao">
                                    <input class="input__field input__field--isao text-center" name="{{$setting->key}}"
                                           autocomplete="off" type="text"
                                           value="{{old($setting->key) ?? $setting->value ?? ''}}"
                                           placeholder="{{__('setting.'.$setting->key)}}"/>
                                    <label class="input__label input__label--isao">
                                    <span class="input__label-content input__label-content--isao">
                                        @if($errors->has($setting->key))
                                            <span class="text-danger">({{$errors->first($setting->key)}})</span>
                                        @endif
                                    </span>
                                </label>
                              </span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <hr>
                <div class="row">
                    @foreach($settings['office_agent'] as $setting)
                        @if($setting->type == 'bool')
                            <div class="col-md-4 pb-2">
                                <input type="checkbox" name="{{$setting->key}}"
                                       data-off="{{__('tenders.off')}}"
                                       data-on="{{__('tenders.on')}}" data-toggle="toggle"
                                       data-onstyle="outline-primary" data-style="ios"
                                       value="1" {{$setting->value ? 'checked':''}}
                                       data-offstyle="outline-secondary">
                                <b>{{__('setting.'.$setting->key)}}</b>
                                <hr>
                            </div>
                        @endif
                        @if($setting->type == 'text')
                            <div class="col-md-3 pb-2">
                                <b>{{__('setting.'.$setting->key)}}</b>
                                <span class="input input--isao">
                                    <input class="input__field input__field--isao text-center" name="{{$setting->key}}"
                                           autocomplete="off" type="text"
                                           value="{{old($setting->key) ?? $setting->value ?? ''}}"
                                           placeholder="{{__('setting.'.$setting->key)}}"/>
                                    <label class="input__label input__label--isao">
                                    <span class="input__label-content input__label-content--isao">
                                        @if($errors->has($setting->key))
                                            <span class="text-danger">({{$errors->first($setting->key)}})</span>
                                        @endif
                                    </span>
                                </label>
                              </span>
                            </div>
                        @endif
                        @if($setting->type == 'date')
                            <div class="col-md-3 pb-2">
                                <b>{{__('setting.'.$setting->key)}}</b>
                                <span class="input input--isao">
                                    <input class="input__field input__field--isao text-center date" name="{{$setting->key}}"
                                           autocomplete="off" type="date"
                                           value="{{old($setting->key) ?? $setting->value ?? ''}}"
                                           placeholder="{{__('setting.'.$setting->key)}}"/>
                                    <label class="input__label input__label--isao">
                                    <span class="input__label-content input__label-content--isao">
                                        @if($errors->has($setting->key))
                                            <span class="text-danger">({{$errors->first($setting->key)}})</span>
                                        @endif
                                    </span>
                                </label>
                              </span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </fieldset>
        </div>

        <div class="col-md-12 text-center mt-2 mb-5">
            <button class="btn btn-primary">
                {{__('violation.save')}}
            </button>
        </div>
    </div>
    {{Form::close()}}
</div>
