<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <form action="">
                <b>{{__('violation.query')}}</b>
                <input type="text" name="key" class="form-control" value="{{ request()->get('key')}}">
                <br>
                <button type="submit" class="btn btn-sm btn-info m-0">
                    {{__('violation.filter')}}
                </button>
                <button type="reset" class="btn btn-sm btn-danger m-0">
                    {{__('violation.reset')}}
                </button>

            </form>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('tenders.title')}}</th>
                    <th>{{__('tenders.title_en')}}</th>
                    <th></th>
                    <th>{{__('tenders.order')}}</th>
                    <th>{{__('tenders.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tender_pages as $page)
                    <tr id="page_row_{{$page->id}}">
                        <td>{{$page->id}}</td>
                        <td>{{$page->title_ar}}</td>
                        <td>{{$page->title_en}}</td>
                        <td>
                            <a href="{{route('frontTenderShowTenderPage',['id'=>$page->id])}}" target="_blank">
                                {{route('frontTenderShowTenderPage',['id'=>$page->id])}}
                            </a>
                        </td>
                        <td>{{$page->order}}</td>
                        <td>
                            @can('edit-page')
                            <a href="{{route('editPage',['id'=>$page->id])}}"
                               class="btn btn-info btn-sm m-0">
                                <i class="la la-edit"></i>
                            </a>
                            @endcan
                            @can('delete-page')
                            <button class="btn btn-danger btn-sm m-0 tooltips" onclick="remove('{{$page->id}}')"
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
        <div class="col-md-12 mb-5">
            {{$tender_pages->appends(request()->input())->render('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
