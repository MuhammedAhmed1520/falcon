<div class="row mt-2">
    <div class="col-md-12">
        <hr>
        <h4 class="font-weight-bold text-black">
            <i class="icon icon-user"></i>
            الشركاء
        </h4>
        @if(checkSendAllowed($office_agent))
            <button type="button" class="btn btn-danger float-right" data-toggle="modal" name="add_partner"
                    data-target="#partner_add_modal">
                اضافة شركاء
            </button>
        @endif
    </div>
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="company_partner_table">
            <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الرقم المدني</th>
                <th>ملاحظات</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($office_agent->office_partners as $office_partner)
                <tr id="company_partner_{{$office_partner->id}}">
                    <td>{{$office_partner->id}}</td>
                    <td>{{$office_partner->name}}</td>
                    <td>{{$office_partner->ssn}}</td>
                    <td>{{$office_partner->notes}}</td>
                    <td>
                        @if(checkSendAllowed($office_agent))
                            <button class="btn btn-danger"
                                    name="delete_partner"
                                    onclick="deleteCompanyPartner('{{$office_partner->id}}')">
                                <i class="icon icon-trash mr-0"></i>
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
