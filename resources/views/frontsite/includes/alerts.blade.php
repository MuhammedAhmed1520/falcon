@if(session()->has('success'))
    <div class="notification is-success customClass">
        <strong>{{__('violation.success')}}</strong> {{session()->get('success')}}
    </div>
@endif

@if(session()->has('info'))
    <div class="notification is-info">
        <strong>{{__('violation.info')}}</strong> {{session()->get('info')}}
    </div>
@endif

@if(session()->has('error'))
    <div class="notification is-danger">
        <strong>{{__('violation.error')}}</strong> {{session()->get('error')}}
    </div>
@endif
