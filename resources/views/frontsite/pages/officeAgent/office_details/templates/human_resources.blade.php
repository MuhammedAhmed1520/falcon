<div class="row">
    <div class="col-md-12 mt-3">
        @if($office_agent->classification_degree_id == 16  )
            @if(count($office_agent->human_resources ?? []) < 5 && $office_agent->contract_type_id != 15)
                <div class="alert alert-danger class_degree_ids" role="alert">
                    <b>{{$classification_degrees->where('id',16)->first()->description_ar}}</b>
                </div>
            @endif
                @if(count($office_agent->human_resources ?? []) < 2 && $office_agent->contract_type_id == 15)
                <div class="alert alert-danger class_degree_ids" role="alert">
                    <b>{{$classification_degrees->where('id',17)->first()->description_ar}}</b>
                </div>
            @endif
        @elseif($office_agent->classification_degree_id == 17)
            @if(count($office_agent->human_resources ?? []) < 2)
                <div class="alert alert-danger class_degree_ids" role="alert">
                    <b>{{$classification_degrees->where('id',17)->first()->description_ar}}</b>
                </div>
            @endif
        @endif
{{--        @foreach($classification_degrees as $classification_degree)--}}
{{--            --}}
{{--            <div class="alert alert-danger class_degree_ids" role="alert"--}}
{{--                 id="class2_degree_id_{{$classification_degree->id}}"--}}
{{--                 @if(!$office_agent->classification_degree_id)--}}
{{--                 style="display: none;"--}}
{{--                 @endif--}}
{{--                 @if((count($office_agent->human_resources ?? []) >= 5) && $office_agent->classification_degree_id == 16) --}}
{{--                 style="display: none;"--}}
{{--                 @endif--}}
{{--                 @if((count($office_agent->human_resources ?? []) >= 2) && $office_agent->classification_degree_id == 17)--}}
{{--                 style="display: none;" --}}
{{--                 @endif>--}}
{{--                --}}{{--@if($office_agent->classification_degree_id != $classification_degree->id) style="display: none;" @endif--}}

{{--                <b>{{$classification_degree->description_ar}}</b>--}}
{{--            </div>--}}
{{--        @endforeach--}}
    </div>
    <div class="col-md-12 mt-3">
        @include('frontsite.pages.officeAgent.office_details.templates.edit_employee')
    </div>
    <div class="col-md-12 mt-3">
        @include('frontsite.pages.officeAgent.office_details.templates.all_employee')
    </div>
</div>
