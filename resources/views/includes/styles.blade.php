<!--Fonts css-->
{{Html::style('assets/css/flaticons.css')}}

<!-- core css-->
{{Html::style('assets/css/bootstrap.min.css')}}
{{Html::style('assets/css/bootstrap-grid.min.css')}}
{{Html::style('assets/css/bootstrap-reboot.min.css')}}
@if(app()->getLocale() == 'ar')
    <!--ar-->
    {{Html::style('assets/css/bootstrap-rtl.css')}}
    <!--ar-->
@endif
{{Html::style('assets/css/animate.css')}}
{{Html::style('assets/css/iziToast.min.css')}}
{{Html::style('assets/css/sweetalert2.min.css')}}
{{Html::style('assets/css/app.css')}}
{{Html::style('assets/css/slider-menu.jquery.css')}}
{{Html::style('assets/css/slider-menu.theme.jquery.css')}}
@if(app()->getLocale() == 'ar')
    <!--ar-->
    {{Html::style('assets/css/adg3-skeleton-nav-rtl.css')}}
    <!--ar-->
@else
    {{Html::style('assets/css/adg3-skeleton-nav.css')}}
@endif
{{Html::style('assets/css/bundle.css')}}
@if(app()->getLocale() == 'ar')
    <!--ar-->
    {{Html::style('assets/css/ar.css')}}
    <!--ar-->
@else
    {{Html::style('assets/css/main.css')}}
@endif
<!--[if lt IE 9]>
    {{Html::script('assets/js/html5shiv.min.js')}}
    {{Html::script('assets/js/respond.min.js')}}

<![endif]-->
