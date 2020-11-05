<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="col-md-4">
                    <b>{{__('violation.query')}}</b>
                    <input type="text" name="query" class="form-control" value="{{ request()->get('query') }}" autocomplete="off">
                </div>
                <div class="col-md-4 mt-3">
                    <button type="submit" class="btn btn-sm btn-info m-0">
                        {{__('violation.filter')}}
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>{{__('violation.civil_name')}}</th>
                    <th>{{__('violation.civil_phone')}}</th>
                    <th>{{__('violation.civil_ssn')}}</th>
                    <th>{{__('violation.civil_national')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($civilians as $civilian)
                    <tr>
                        <td>
                            {{$civilian->name}}
                        </td>
                        <td class="text-left" dir="ltr">
                            {{$civilian->prefix  .'-'. $civilian->mobile}}
                        </td>
                        <td>
                            {{$civilian->ssn}}
                        </td>
                        <td>
                            {{$civilian->nationality->name ?? ''}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            {{$civilians->appends(\request()->except(['page']))->render("pagination::bootstrap-4")}}
        </div>
    </div>
</div>
