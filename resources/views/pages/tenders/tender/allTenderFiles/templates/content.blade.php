<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-link" data-toggle="collapse" href="#multiCollapseExample1" role="button"
               aria-expanded="true" aria-controls="multiCollapseExample1">
                <i class="la la-plus"></i>
                <span>{{__('tenders.add_new')}}</span>
            </a>

            @can('create-files-tender')
                <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse active collapse show" id="multiCollapseExample1">
                        <div class="card card-body">
                            {{Form::open([
                                'method'=>'post',
                                'enctype'=>'multipart/form-data',
                                'route'=>['createTenderFileDetails',$tender->id]
                            ])}}
                            <div class="row">
                                <div class="col-md-3">
                                    <b>{{__('tenders.title')}} </b>
                                    <input type="text" class="form-control" name="title_ar" autocomplete="off">
                                    @if($errors->has('title_ar'))
                                        <span class="text-danger">{{$errors->first('title_ar')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <b>{{__('tenders.title_en')}}</b>
                                    <input type="text" class="form-control" name="title_en" autocomplete="off">
                                    @if($errors->has('title_en'))
                                        <span class="text-danger">{{$errors->first('title_en')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <b>{{__('tenders.placement')}}</b>
                                    <select class="form-control" name="placement_id">
                                        @foreach($placements as $place)
                                            @if(app()->getLocale() == 'ar')
                                                <option value="{{$place->id}}">{{$place->title_ar}}</option>
                                            @else
                                                <option value="{{$place->id}}">{{$place->title_en}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('placement_id'))
                                        <span class="text-danger">{{$errors->first('placement_id')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <b>{{__('tenders.file')}}</b><br>
                                    <input type="file" class="form-control" name="file" accept="application/pdf">
                                    @if($errors->has('file'))
                                        <span class="text-danger">{{$errors->first('file')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button class="btn btn-primary">{{__('tenders.save')}}</button>
                                </div>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
            @endcan
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('tenders.title')}}</th>
                    <th>{{__('tenders.title_en')}}</th>
                    <th>{{__('tenders.placement')}}</th>
                    <th>{{__('tenders.file')}}</th>
                    <th>{{__('tenders.operation')}}</th>
                </tr>
                </thead>
                <tbody>

                @foreach($tender->file as $files)
                    <tr>
                        <td>{{$files->id}}</td>
                        <td>{{$files->title_ar}}</td>
                        <td>{{$files->title_en}}</td>
                        <td>{{$files->placement->title_ar ?? ''}}</td>
                        <td>
                            @if($files->getFile)
                                @php
                                    $file_path = $files->file
                                @endphp
                                <a href="{{ $file_path }}" download>
                                    <i class="la la-download"></i>
                                    {{__('tenders.download')}}
                                </a>
                                <a href="{{ $file_path }}">
                                    <i class="la la-eye"></i>
                                    {{__('tenders.view')}}
                                </a>
                            @endif
                        </td>
                        <td>
                            {{--<button type="button" data-toggle="modal" data-target="#editModal"--}}
                            {{--class="btn btn-info btn-sm m-0">--}}
                            {{--<i class="la la-edit"></i>--}}
                            {{--</button>--}}
                            @can('delete-files-tender')
                                <button class="btn btn-danger btn-sm m-0 tooltips" onclick="remove('{{$files->id}}')"
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
