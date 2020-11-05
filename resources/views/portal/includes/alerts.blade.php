@if(session()->has('success'))
    <div class="text-success">
        <strong>{{__('violation.success')}}</strong> {{session()->get('success')}}
    </div>
@endif

@if(session()->has('info'))
    <div class="text-info">
        <strong>{{__('violation.info')}}</strong> {{session()->get('info')}}
    </div>
@endif

@if(session()->has('error'))
    <div class="text-danger">
        <strong>{{__('violation.error')}}</strong> {{session()->get('error')}}
    </div>
@endif
