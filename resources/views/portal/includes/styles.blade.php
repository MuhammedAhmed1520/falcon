<!-- Fonts -->
<link href="{{asset('front_assets/fonts/font-roboto/font-roboto.css')}}" rel="stylesheet">
<link href="{{asset('front_assets/fonts/font-montserrat/font-montserrat.css')}}" rel="stylesheet">
<link href="{{asset('front_assets/fonts/font-playfair/font-playfair.css')}}" rel="stylesheet">
<link href="{{asset('front_assets/fonts/font-feather/font-feather.css')}}" rel="stylesheet" type="text/css">

<!-- Stylesheets -->
<link href="{{asset('front_assets/css/reset.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('front_assets/css/styles.css')}}" rel="stylesheet" type="text/css">
<!-- core css-->
{{Html::style('assets/css/bootstrap.min.css')}}
{{Html::style('assets/css/bootstrap-grid.min.css')}}
{{Html::style('assets/css/bootstrap-reboot.min.css')}}
<!--ar-->
@if(app()->getLocale() == 'ar')
    {{Html::style('assets/css/bootstrap-rtl.css')}}
    {{Html::style('front_assets/css/portal-ar.css')}}
@else
    {{Html::style('front_assets/css/portal-en.css')}}
@endif
<!--ar-->
<style>
    .btn {
        border-radius: 1px;
        padding: 5px 15px;
    }

    .btn-danger {
        border-color: #8a0707;
        background: #8a0707;
    }

    .btn-danger:active, .btn-danger:focus, .btn-danger:hover {
        border-color: #630707;
        background: #630707;
    }
    .fileuploader-input .fileuploader-input-button, .fileuploader-popup .fileuploader-popup-content .fileuploader-popup-button.button-success {
        background: linear-gradient(135deg, #8a0707 0, #630707 100%)!important;
    }


    .fileuploader-input .fileuploader-input-caption {
        color: #111!important;
    }

    star {
        color: red;
    }

    .size18 {
        font-size: 17px;
        font-weight: bold;
    }
</style>
