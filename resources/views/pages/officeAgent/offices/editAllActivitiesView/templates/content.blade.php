<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{Form::open([
                'route'=>['handleEditAllActivitiesView',$activity->id],
                'methods'=>'post'
            ])}}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                @foreach($file_types as $k => $permission)
                                    <a class="nav-item nav-link text-uppercase @if($loop->first) active @endif"
                                       id="nav-{{$k}}-tab"
                                       data-toggle="tab"
                                       href="#nav-{{$k}}" aria-controls="nav-{{$k}}"
                                       aria-selected=" @if($loop->first) true @else false @endif"
                                       role="tab">{{{app()->getLocale() == 'ar' ? $permission[0]->title_ar : $permission[0]->title_en}}}</a>
                                @endforeach
                            </div>

                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            @foreach($file_types as $k => $permission)
                                <div class="tab-pane fade p-2  @if($loop->first)show active @endif" id="nav-{{$k}}"
                                     role="tabpanel" aria-labelledby="nav-{{$k}}-tab">
                                    <div class="row">
                                        @foreach($permission as $p_item)
                                            <div class="col-md-3 mb-1">

                                                <input class="styled-checkbox" name="file_type_ids[]"
                                                       id="styled-checkbox-{{$p_item->id}}" type="checkbox"
                                                       @if(in_array($p_item->id ,$file_types_ids)) checked @endif
                                                       value="{{$p_item->id}}">
                                                <label
                                                    for="styled-checkbox-{{$p_item->id}}">{{app()->getLocale() =='ar'? $p_item->title_ar : $p_item->title_en}}</label>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="text-center col-md-12">
                    <button class="btn btn-primary">
                        {{__('office_agent.edit')}}
                    </button>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
