<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('tenders.edit')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <b>{{__('tenders.title')}}</b>
                        <input type="text" class="form-control date_time" name="title">
                    </div>
                    <div class="col-md-6">
                        <b>{{__('tenders.placement')}}</b>
                        <select class="form-control" name="placement">
                            <option value="">Tender Details</option>
                            <option value="">Bid Opening</option>
                            <option value="">Tender Awarding</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"><i class="la la-save"></i></button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="la la-close"></i>
                </button>
            </div>
        </div>
    </div>
</div>