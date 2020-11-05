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
            {{__('tenders.tender_module')}}
        </strong>
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('getDashboardView')}}">{{__('violation.home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('allTenders')}}">{{__('tenders.tender_module')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('sidebar.add_company')}}</li>
        </ol>
    </nav>
</div>