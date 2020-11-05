<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        {{Form::open([
            'method'=>'put',
            'route'=>['handleTenderApplicationsUpdate',request()->id]
        ])}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('tenders.edit')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="application_id" id="application_id" value="">
                    <div class="col-md-6">
                        <b>{{__('tenders.date')}}</b>
                        <input type="text" class="form-control date_time" id="submit_date" name="submit_date">
                    </div>
                    <div class="col-md-6">
                        <b>{{__('tenders.price')}}</b>
                        <input class="form-control" id="price" name="price" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="la la-save"></i></button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="la la-close"></i>
                </button>
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>