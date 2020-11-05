<div class="row mt-2">
    <div class="col-md-12">
        <hr>
        <h4 class="font-weight-bold text-black">
            <i class="icon icon-user"></i>
            {{__('office_agent.branches')}}
        </h4>
    </div>
    <div class="col-md-12 mt-4">
        <table class="table table-ressponsive" id="branches_partner_table">
            <thead>
            <tr>
                <th>#</th>
                <th>{{__('office_agent.type')}}</th>
                <th>{{__('office_agent.address')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($office_agent['addresses'] as $address)
                <tr id="branch_address_{{$address['id'] ?? ''}}">
                    <td>{{$address['id'] ?? ''}}</td>
                    <td>{{$address['address_type'] ?? ''}}</td>
                    <td>
                        {{__('office_agent.segment')}}: {{$address['segment'] ?? ''}}
                        {{__('office_agent.area')}}: {{$address['area'] ?? ''}}
                        {{__('office_agent.building')}}: {{$address['building'] ?? ''}}
                        {{__('office_agent.floor')}}: {{$address['floor'] ?? ''}}
                        {{__('office_agent.street')}}: {{$address['street'] ?? ''}}
                        {{__('office_agent.full_address')}}: {{$address['full_address'] ?? ''}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
