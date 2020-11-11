<div class="container-fluid">
    {{Form::open([
        'route'=>['handleEditRole',$role->id],
        'method'=>'put'
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('violation.main_info')}}</legend>
                <div class="row">

                    <div class="col-md-4">
                        <b>
                            <star>*</star> {{__('violation.name')}}
                        </b>
                        <span class="input input--isao">
                            <input class="input__field input__field--isao" name="title" autocomplete="off" type="text"
                                   value="{{$role->title}}" placeholder="{{__('violation.name_type')}}"/>
                            <label class="input__label input__label--isao" data-content="{{__('violation.name')}}">
                            <span class="input__label-content input__label-content--isao">

                                @if($errors->has('title'))
                                    <br>
                                    <span class="text-danger">({{$errors->first('title')}})</span>
                                @endif
                            </span>
                        </label>
                      </span>
                    </div>

                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                @foreach($permissions as $k => $permission)
                                    @if(!auth()->user()->checkFullAccess())
                                        @if( $k != 'roles')
                                            <a class="nav-item nav-link text-uppercase @if($loop->first) active @endif"
                                               id="nav-{{$k}}-tab"
                                               data-toggle="tab"
                                               href="#nav-{{$k}}" aria-controls="nav-{{$k}}"
                                               aria-selected=" @if($loop->first) true @else false @endif"
                                               role="tab">{{{app()->getLocale() == 'ar' ? $permission[0]->for_ar : $permission[0]->for}}}</a>
                                        @endif
                                    @else
                                        <a class="nav-item nav-link text-uppercase @if($loop->first) active @endif"
                                           id="nav-{{$k}}-tab"
                                           data-toggle="tab"
                                           href="#nav-{{$k}}" aria-controls="nav-{{$k}}"
                                           aria-selected=" @if($loop->first) true @else false @endif"
                                           role="tab">{{{app()->getLocale() == 'ar' ? $permission[0]->for_ar : $permission[0]->for}}}</a>
                                    @endif
                                @endforeach
                            </div>

                        </nav>
                        <div class="tab-content" id="nav-tabContent">

                            @foreach($permissions as $k => $permission)
                                @if(!auth()->user()->checkFullAccess())
                                    @if( $k != 'roles')
                                        <div class="tab-pane fade p-2  @if($loop->first) show active @endif"
                                             id="nav-{{$k}}"
                                             role="tabpanel" aria-labelledby="nav-{{$k}}-tab">
                                            <div class="row">
                                                @foreach($permission as $p_item)
                                                    <div class="col-md-3 mb-1">

                                                        <input class="styled-checkbox" name="permissions[]"
                                                               id="styled-checkbox-{{$p_item->id}}" type="checkbox"
                                                               @if(in_array($p_item->id,$role->permission_ids->toArray())) checked
                                                               @endif
                                                               value="{{$p_item->id}}">
                                                        <label
                                                            for="styled-checkbox-{{$p_item->id}}">{{app()->getLocale() =='ar'? $p_item->name_ar : $p_item->name}}</label>

                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="tab-pane fade p-2  @if($loop->first) show active @endif" id="nav-{{$k}}"
                                         role="tabpanel" aria-labelledby="nav-{{$k}}-tab">
                                        <div class="row">
                                            @foreach($permission as $p_item)
                                                <div class="col-md-3 mb-1">

                                                    <input class="styled-checkbox" name="permissions[]"
                                                           id="styled-checkbox-{{$p_item->id}}" type="checkbox"
                                                           @if(in_array($p_item->id,$role->permission_ids->toArray())) checked
                                                           @endif
                                                           value="{{$p_item->id}}">
                                                    <label
                                                        for="styled-checkbox-{{$p_item->id}}">{{app()->getLocale() =='ar'? $p_item->name_ar : $p_item->name}}</label>

                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </fieldset>
        </div>

        <div class="col-md-12 text-center mt-2 mb-5">
            <button class="btn btn-primary">
                {{__('violation.update')}}
            </button>
        </div>
    </div>
    {{Form::close()}}
</div>
