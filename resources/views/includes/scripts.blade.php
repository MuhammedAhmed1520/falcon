<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
{{Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js')}}
{{Html::script('assets/js/bootstrap.min.js')}}
{{Html::script('assets/js/bootstrap.bundle.min.js')}}
{{Html::script('assets/js/iziToast.min.js')}}
{{Html::script('assets/js/sweetalert2.all.min.js')}}
{{Html::script('assets/js/slider-menu.jquery.min.js')}}
{{Html::script('assets/js/scripts.js')}}
<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>

@if (!Browser::isIE())
    {{Html::script('assets/js/event-listeners.js')}}
@endif
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
