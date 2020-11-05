<!-- Modal -->
<div class="modal fade" id="violations_modals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>{{__('violation.serial')}}</th>
                        <th>{{__('violation.violation_details')}}</th>
                        <th>{{__('violation.violation_action')}}</th>
                        <th>{{__('violation.amount')}}</th>
                        <th>{{__('violation.civil_name')}}</th>
                        <th>{{__('violation.civil_phone')}}</th>
                    </tr>
                    </thead>
                    <tbody id="modal_body">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>