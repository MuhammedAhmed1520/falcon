<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    {{Form::open([
        'method'=>'post',
        'route'=>'handleTenderBuyersUpdate',
    ])}}
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
                        <b>{{__('tenders.date')}}</b>
                        <input type="hidden" name="buyer_id" value="">
                        <input type="text" class="form-control date_time" name="date">
                    </div>
                    <div class="col-md-12">
                        <br>
                        <b>{{__('tenders.notes')}}</b>
                        <textarea id="no_notes" class="form-control" name="notes"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="la la-save"></i></button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="la la-close"></i>
                </button>
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>