<div class="row mt-2">
    <div class="col-md-12">
        <hr>
        <h4 class="font-weight-bold text-black">
            <i class="icon icon-user"></i>
            {{__('office_agent.company_partners')}}
        </h4>
    </div>
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="company_partner_table">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('office_agent.name')}}</th>
                <th>{{__('office_agent.ssn')}}</th>
                <th>{{__('office_agent.notes')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($office_agent['office_partners'] as $office_partner)
                <tr id="company_partner_{{$office_partner['id'] ?? ''}}">
                    <td>{{$office_partner['id'] ?? ''}}</td>
                    <td>{{$office_partner['name'] ?? ''}}</td>
                    <td>{{$office_partner['ssn'] ?? ''}}</td>
                    <td>{{$office_partner['notes'] ?? ''}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
