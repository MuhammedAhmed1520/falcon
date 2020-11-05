<!--notification-->
<div id="logger_container" class="search-aside">
    {{--<div class="object">--}}
    {{--<div class="object-rope"></div>--}}
    {{--<div class="object-shape">--}}
    {{--Coming <span class="soon">Soon</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="container">
        <div class="row mt-1">
            <div class="col-1">
                <div class="dismis-icon search-aside-icon" data-dismis="#logger_container">
                    <i class="la la-arrow-left fa-2x"></i>
                </div>
            </div>
            <div class="col-11">
                <h4 class="mt-2">
                    {{__('settings.logger')}}
                </h4>
            </div>
            <div class="col-md-12" style="max-height: 100vh;overflow-y:scroll ">
                <div class="logger-loader">
                    <div class="position-absolute" style="top: 40%;left: 60%;">
                        <div class="m-loader m-loader--primary m-loader--right m-loader--lg">   </div>
                    </div>
                </div>
                @include('includes.log_content')
            </div>
        </div>
    </div>
</div>