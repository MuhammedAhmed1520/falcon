@extends('frontsite.layouts.master_agent_layout')

@section('content')

    {{--<div class="card">--}}
    <div class="d-md-flex bg-white">
        <div class="col-md-6 d-flex justify-content-center align-items-center text-center" style="min-height: 100vh">
            <div class="">
                <img src="{{asset('assets/images/falcon.png')}}" class="w-50  animate__animated animate__zoomIn"
                     alt="">
                <h3 class="font-weight-bold  animate__animated animate__fadeInRight">الدخول على نظام المالك</h3>
                <a class="btn btn-secondary animate__animated animate__fadeIn bg-dark mt-5 mb-5" href="{{route('falcon-civilLogin')}}">
                    الدخول
                </a>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center text-center"
             style="min-height: 100vh;background: #000;">
            <div class="">
                <img src="{{asset('assets/images/falcon.png')}}" class="w-50 animate__animated animate__zoomIn"
                     style="filter: invert(1);"
                     alt="">
                <h3 class="font-weight-bold text-white animate__animated animate__fadeInLeft">الدخول على نظام
                    المستشفي</h3>
                <a class="btn btn-secondary bg-white text-black-50 mt-5 mb-5 animate__animated animate__fadeIn" href="{{route('falcon-hospitalLogin')}}">
                    الدخول
                </a>
            </div>
        </div>
    </div>
    {{--</div>--}}
@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js?hl=ar"></script>
    <script>
        $(document).ready(function () {

        });
    </script>
    <script>
        function closeModal(event, agree) {
            if (agree == 1) {
                $('#aggree').prop('checked', true); // Unchecks it
            } else {
                $('#aggree').prop('checked', false); // Checks it
            }
            $('#aggree').trigger('change');
            $("html").removeClass("is-clipped");
            $("#modal").removeClass("is-active");
        }

        function openTab(evt, tabName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("content-tab");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tab");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" is-active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " is-active";
        }


        let capatcha = null;

        function correctCaptcha(response) {
            if (response) {
                capatcha = response;
                // $('#s_btn').removeClass('is-disabled');
                // $('#s_btn').prop('disabled', false);
                if ($('#aggree').prop("checked") == true) {
                    $('#s_btn').removeClass('is-disabled');
                    $('#s_btn').prop('disabled', false);
                }
                // $('#aggree').trigger('change')
            }
        };

        $('#aggree').change(function () {
            if (this.checked) {
                $(".modal-button").click();
                if (capatcha) {
                    $('#s_btn').removeClass('is-disabled');
                    $('#s_btn').prop('disabled', false);
                    return
                }
                $('#s_btn').addClass('is-disabled');
                $('#s_btn').prop('disabled', true);

            }
        })


    </script>
@endsection
@section('styles')

@endsection
