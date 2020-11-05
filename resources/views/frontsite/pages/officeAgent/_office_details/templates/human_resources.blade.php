<div class="row">
    <div class="col-md-12 mt-3">
        @foreach($classification_degrees as $classification_degree)
            <div class="alert alert-danger class_degree_ids" role="alert"
                 id="class2_degree_id_{{$classification_degree->id}}"
                 @if($office_agent->classification_degree_id != $classification_degree->id) style="display: none;" @endif>
                <b>{{$classification_degree->description_ar}}</b>
            </div>
        @endforeach
    </div>
    <div class="col-md-12 mt-3">
        @include('frontsite.pages.officeAgent.office_details.templates.edit_employee')
    </div>
    <div class="col-md-12 mt-3">
        @include('frontsite.pages.officeAgent.office_details.templates.all_employee')
    </div>
</div>
