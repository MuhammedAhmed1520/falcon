@extends('layouts.master')

@section('styles')
    <!-- end of plugin styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    {{Html::style('assets/css/scroller.bootstrap.min.css')}}
    {{Html::style('assets/css/colReorder.bootstrap.min.css')}}
    {{Html::style('assets/css/dataTables.bootstrap.css')}}
    {{Html::style('assets/css/dataTables.bootstrap.css')}}
    {{Html::style('assets/css/responsive.dataTables.min.css')}}
    {{Html::style('assets/css/tables.css')}}

    <style>
        .table-bordered td, .table-bordered th {
            padding: 0;
        }

        @guest()
            .skeleton-nav--center {
            margin: auto;
            margin-right: auto;
        }
        @endguest
    </style>
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.visits.edit.templates.header')
                @include('pages.visits.edit.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    {{Html::script('assets/js/datatable/jquery.dataTables.js')}}
    {{Html::script('assets/js/datatable/dataTables.tableTools.js')}}
    {{Html::script('assets/js/datatable/dataTables.colReorder.js')}}
    {{Html::script('assets/js/datatable/dataTables.bootstrap.js')}}
    {{Html::script('assets/js/datatable/dataTables.buttons.min.js')}}
    {{Html::script('assets/js/datatable/jquery.dataTables.min.js')}}
    {{Html::script('assets/js/datatable/dataTables.responsive.min.js')}}
    {{Html::script('assets/js/datatable/dataTables.rowReorder.min.js')}}
    {{Html::script('assets/js/datatable/buttons.colVis.min.js')}}
    {{Html::script('assets/js/datatable/buttons.html5.min.js')}}
    {{Html::script('assets/js/datatable/buttons.bootstrap.min.js')}}
    {{Html::script('assets/js/datatable/buttons.print.min.js')}}
    {{Html::script('assets/js/datatable/dataTables.scroller.min.js')}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    <script type="text/javascript" src="{{asset("assets/js/jquery.qrcode.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/qrcode.js")}}"></script>
    <script>
        function approveVisit(event,token){
            event.preventDefault();
            Swal.fire({
                type: 'warning',
                title: '{{__('violation.are_sure')}}',
                showCancelButton: true,
                confirmButtonText: '{{__('violation.yes')}}',
                cancelButtonText: '{{__('violation.no')}}',
                showLoaderOnConfirm: true,
                preConfirm: function (allow) {
                    if (allow) {
                        $.ajax({
                            url: "{{route('approveVisitAdmin')}}",
                            method: "post",
                            data: {
                                _token: '{{csrf_token()}}',
                                token: token,
                            },
                            success: function (response) {
                                console.log(response)
                                if (response.status) {
                                    // $(`#tender_${id}`).remove()
                                    location.reload()
                                }
                            }
                        })
                    }
                },
                allowOutsideClick: function() {!Swal.isLoading()}
            }).then(function (result) {
                if (result.value) {
                    // Swal.fire({
                    //     title: `${result.value.login}'s avatar`,
                    //     imageUrl: result.value.avatar_url
                    // })
                }
            })
        }
        $(document).ready(function () {
            setTimeout(function () {
                $('#_2').trigger("click");
                $('#_23').trigger("click");
            }, 60);
        });

    </script>
    <script>

        $(document).ready(function () {

// Generate and Output QR Code
            $('#qrcode').qrcode(
                {
                    width: 100,
                    height: 100,
                    text: '{{route("showVisitAdmin",["token" => $visit->token])}}'
                })
        })
    </script>
@endsection
