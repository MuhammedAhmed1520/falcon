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
    var debounceTimeout = null;

    @if (!Browser::isIE())
    $("#search_site_input").on('input propertychange paste', function (e) {
        let _this = $(this);
        let test = function () {
            // if (_this.val() == '')
            console.log(_this.val());
            $.ajax({
                type: 'get',
                url: '{{route('getSiteSearch')}}',
                data: {
                    'search_key': _this.val()
                },
                success: function (response) {
                    console.log(response);
                    if (response.status) {
                        $('#search_no_data').empty();
                        $('#search_data').empty();
                        let data = response.data;
                        // Certificate
                        $.each(data.certificate, function (index, element) {
                            if (index === 0) {
                                $('#search_data').append(`
                              <button type="button" class="list-group-item list-group-item-action active">
                                الشهادات
                              </button>
                            `);
                            }
                            $('#search_data').append(`
                           <li class="list-group-item">${element.owner_name}</li>
                        `);
                        });

                        // Civilian
                        $.each(data.civilian, function (index, element) {
                            if (index === 0) {
                                $('#search_data').append(`
                              <button type="button" class="list-group-item list-group-item-action active">
                                المخالفون
                              </button>
                            `);
                            }
                            $('#search_data').append(`
                           <li class="list-group-item">${element.name}</li>
                        `);
                        });
                        // company
                        $.each(data.company, function (index, element) {
                            if (index === 0) {
                                $('#search_data').append(`
                              <button type="button" class="list-group-item list-group-item-action active">
                                الشركات
                              </button>
                            `);
                            }
                            $('#search_data').append(`
                           <li class="list-group-item float-right">${element.name}</li>
                        `);
                        });
                        // payment
                        $.each(data.payment, function (index, element) {
                            if (index === 0) {
                                $('#search_data').append(`
                              <button type="button" class="list-group-item list-group-item-action active">
                                المدفوعات
                              </button>
                            `);
                            }
                            $('#search_data').append(`
                           <li class="list-group-item">${element.name}</li>
                        `);
                        });
                        // tender
                        $.each(data.tender, function (index, element) {
                            if (index === 0) {
                                $('#search_data').append(`
                              <button type="button" class="list-group-item list-group-item-action active">
                                الممارسات
                              </button>
                            `);
                            }
                            $('#search_data').append(`
                           <li class="list-group-item">${element.title_ar}</li>
                        `);
                        });
                        // Violation
                        $.each(data.violation, function (index, element) {
                            if (index === 0) {
                                $('#search_data').append(`
                              <button type="button" class="list-group-item list-group-item-action active">
                                المخالفات
                              </button>
                            `);
                            }
                            $('#search_data').append(`
                           <li class="list-group-item">${element.serial}</li>
                        `);
                        });
                    }
                }
            })
        }
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(test, 900);
    });
    @endif

</script>
