<option
{{--    @if(($last_process->department_id ?? null) == $department->id) selected--}}
{{--    @endif--}}
    value="{{$department['id'] ?? null}}">{{$department['title_ar'] ?? null}}</option>
@foreach($department['childrens'] ?? [] as $department)
    @include('pages.officeAgent.orders.office_details.templates.recursive_option_tree',['department'=>$department])
@endforeach
