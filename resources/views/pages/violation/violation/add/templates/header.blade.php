<div class="col-md-12">
    <div class="header-toggle">
        <div class="hamburger-container menu">
            <div class="hamburger-icon top"></div>
            <div class="hamburger-icon mid"></div>
            <div class="hamburger-icon bottom"></div>
        </div>
    </div>
    <h3>
        <strong>
            EPA {{__('violation.violation_module')}}
        </strong>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('getDashboardView')}}">{{__('violation.home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('allViolations')}}">{{__('violation.violation_module')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('violation.add_violation')}}</li>
        </ol>
    </nav>
</div>