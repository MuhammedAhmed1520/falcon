<!-- Scripts -->
<script src="{{asset('front_assets/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('front_assets/js/jquery.uploader.min.js')}}" type="text/javascript"></script>
<script src="{{asset('front_assets/js/jquery.notify.min.js')}}" type="text/javascript"></script>
<script src="{{asset('front_assets/js/jquery.slick.min.js')}}" type="text/javascript"></script>
<script src="{{asset('front_assets/js/scripts.js')}}" type="text/javascript"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js')}}" type="text/javascript"></script>

<script>

    $(".arabicnumber").on('input propertychange paste', function (e) {
        //if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        if (e.which != 8 && e.which != 0 && (e.which < 96 || e.which > 105)) {
            return false;
        }

        //---------------Arabic Numbers--------------------
        var yas = $(this).val();
        yas = (yas.replace(/[٠١٢٣٤٥٦٧٨٩]/g, function (d) {
            return d.charCodeAt(0) - 1632;
        }).replace(/[٠١٢٣٤٥٦٧٨٩]/g, function (d) {
            return d.charCodeAt(0) - 1776;
        }));
        if (isNaN(yas)) {
            yas = "";
        }
        $(this).val(yas);
        //---------------Arabic Numbers END------------------

    });
</script>