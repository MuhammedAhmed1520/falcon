<!--search -->
<div id="search_container" class="search-aside">
    <!--<div class="object">-->
    <!--    <div class="object-rope"></div>-->
    <!--    <div class="object-shape">-->
    <!--        Coming <span class="soon">Soon</span>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="container">
        <div class="row mt-1">
            <div class="col-1">
                <div class="dismis-icon search-aside-icon" data-dismis="#search_container">
                    <i class="la la-arrow-left fa-2x"></i>
                </div>
            </div>
            <div class="col-11">
                <input type="text" id="search_site_input" class="search-input" name="search" placeholder="search">
            </div>
            <div class="search-loader" style="background: #ffffffa1;width: 100%;height: 100%;position: absolute;z-index: 99;display:none">
                <div class="position-absolute" style="top: 40%;left: 60%;">
                    <div class="m-loader m-loader--primary m-loader--right m-loader--lg">   </div>
                </div>
            </div>
            <div class="col-md-12 mt-5 text-center" id="search_no_data">
                <div class="mt-5"></div>
                <img src="{{asset('assets/images/magnifying-glass.svg')}}" class="mt-5 w-25" alt="">
                <h3>
                    Search for what you need
                </h3>
                <p>
                    Or refine your results with our advanced search.
                </p>
            </div>
            <div class="col-md-12 mt-5 text-center" style="overflow-y: scroll; max-height: 500px" id="search_result_data">
                <ul class="list-group" id="search_data">
                </ul>
            </div>
        </div>
    </div>
</div>