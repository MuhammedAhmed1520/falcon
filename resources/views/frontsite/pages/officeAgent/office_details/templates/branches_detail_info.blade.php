<div class="row mt-2">
    <div class="col-md-12">
        <hr>
        <h4 class="font-weight-bold text-black">
            <i class="icon icon-user"></i>
            {{__('office_agent.branches')}}
        </h4>
        @if(checkSendAllowed($office_agent))
            <button type="button" class="btn btn-danger float-right" data-toggle="modal" name="add_branch"
                    data-target="#branches_add_modal">
                {{__('office_agent.add')}}
            </button>
        @endif
    </div>
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="branches_partner_table">
            <thead>
            <tr>
                <th>#</th>
                <th>النوع</th>
                <th>العنوان</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($office_agent->addresses as $address)
                <tr id="branch_address_{{$address->id}}">
                    <td>{{$address->id}}</td>
                    <td>{{$address->address_type}}</td>
                    <td>
                        القسيمة: {{$address->segment}}
                        المنطقة: {{$address->area}}
                        المبني: {{$address->building}}
                        الطابق: {{$address->floor}}
                        شارع: {{$address->street}}
                        العنوان بالكامل: {{$address->full_address}}
                    </td>
                    <td>
                        @if(checkSendAllowed($office_agent))
                            <button class="btn btn-danger" onclick="deleteBranchAddress('{{$address->id}}')" name="delete_branch">
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
