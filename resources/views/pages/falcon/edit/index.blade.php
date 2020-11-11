@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
    <div class="skeleton-nav--center">
        <div class="container-fluid">
            <div class="row">
                @include('pages.falcon.edit.templates.header')
                @include('pages.falcon.edit.templates.content')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js" type="text/javascript"></script>
    <script>
        $(".date").flatpickr();

        $("#form").validate({
            rules: {
                P_REQUEST_TYP: {
                    required: true,
                },
                P_O_CIVIL_ID: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    },
                    number: true,
                },
                P_O_A_NAME: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    },
                },
                P_O_ADDRESS: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    },
                },
                P_O_MOBILE: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    },
                    number: true,
                },
                P_O_PASSPORT_NO: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    },
                    number: true,
                },
                P_CIVIL_EXPIRY_DT: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    },
                    date: true,
                },
                P_O_MAIL: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    },
                    email: true
                },

                P_NW_CIVIL_ID: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 4;
                    },
                    number: true,
                },
                P_NW_A_NAME: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 4;
                    }
                },
                P_NW_ADDRESS: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 4;
                    }
                },
                P_NW_PASSPORT_NO: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 4;
                    },
                    number: true
                },
                P_NW_CIVIL_EXPIRY: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 4;
                    },
                    date: true
                },
                P_NW_MOBILE: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 4;
                    }
                },
                P_NW_O_MAIL: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 4;
                    }
                },

                P_CUR_PASS_FAL: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 4;
                    }
                },
                P_FAL_SEX: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    }
                },
                P_FAL_SPECIES: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    }
                },
                P_FAL_TYPE: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    }
                },
                P_FAL_OTHER_TYPE: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1 && $('select[name="P_FAL_TYPE"] > option:selected').val() == 9;
                    }
                },
                P_FAL_ORIGIN_COUNTRY: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    }
                },
                P_FAL_CITES_NO: {
                    required: (element) => {
                        return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                    }
                },
                // P_FAL_RING_NO: {
                //     required: (element) => {
                //         return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                //     }
                // },
                // P_FAL_INJ_DATE: {
                //     required: (element) => {
                //         return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                //     }
                // },
                // P_FAL_INJ_HOSPITAL: {
                //     required: (element) => {
                //         return $('select[name="P_REQUEST_TYP"] > option:selected').val() == 1;
                //     },
                //     number: true,
                // },
            },
            submitHandler: function (form) {
                // some other code
                // maybe disabling submit button
                // then:
                // form.submit();
                let form_data = new FormData(form);
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.status) {
                            location.href = '{{route('getAllFalconsCivilians')}}'

                        } else {
                            $('.tag').text('')
                            let errors = response.data.validation_errors;
                            $.each(errors, (k, v) => {
                                let selector = k.replace(/\./g, '').replace(/\./g, '').replace(/\./g, '');

                                $(`#${selector}`).text(v[0])
                            })

                        }
                    }
                });
            }
        });
        $(`select[name="P_REQUEST_TYP"]`).on('change', () => {
            let value = $("select[name=\"P_REQUEST_TYP\"] option:selected").val();
            console.log(value)
            if (value == 4) {
                $('#current_falcon').show();
                $('#new_owner').show();
            } else {
                $('#current_falcon').hide();
                $('#new_owner').hide()
            }
        });

        $(`select[name="P_FAL_TYPE"]`).on('change', () => {
            let value = $("select[name=\"P_FAL_TYPE\"] option:selected").val();
            //P_FAL_TYPE == اخري
            if (value == 9) {
                $('#falcon_other_type').show();
            } else {
                $('#falcon_other_type').hide();
            }
        })
        // $(document).ready(function () {
        //     setTimeout(function () {
        //         $('#_3').trigger("click");
        //
        //     }, 60);
        // });
    </script>

@endsection
