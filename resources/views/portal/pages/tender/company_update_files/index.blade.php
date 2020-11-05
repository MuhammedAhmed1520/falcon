@extends('portal.layouts.master')
@section('styles')

    {{Html::style('assets/css/font-fileuploader.css')}}
    {{Html::style('assets/css/jquery.fileuploader.min.css')}}
    <style>
        .notification {
            padding: 7px;
            margin: 10px;
        }

        h4 {
            font-size: 20px;
        }

        .is-warning {
            background-color: #909090 !important;
            color: #FFF !important;
        }

        star {
            color: red;
        }
    </style>
@endsection
@section('content')


    <div id="services" class="section is-gray has-title">

        <div class="container-fluid"> 
            <div class="row direction">
                <div class="col-md-12">
                    <div class="text-center">
                        {{--                        <span class="section-title">الممارسات</span>--}}
                        {{--                        <h5 class="small-headline">نظام الممارسات</h5>--}}
                        <h2 class="font-weight-bold"> {{__('portal.company_file_p')}} "{{request()->code}}"</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row direction">
                <div class="col-md-12">
                    @include('portal.pages.tender.menu')

                </div>
                <div class="col-md-12">
                    @include('portal.includes.alerts')
                </div>


                <div class="col-md-12">
                    {{Form::open([
                        'method'=>'post',
                        'route'=>['frontUpdateCompanyFilesPortal',request()->code],
                        'enctype'=>'multipart/form-data'
                    ])}}
                    <input type="hidden" name="tender_company_id" value="{{$company->id}}">
                    <div class="row direction">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="offset-3 col-md-6">
                                            <div class="shadow-lg p-3 ">
                                                <h4>
                                                    <b>{{__('tenders.f1')}}
                                                        <star>*</star>
                                                    </b>
                                                </h4>
                                                @if($errors->has('d1'))
                                                    <span class="has-text-danger">({{$errors->first('d1')}})</span>
                                                @endif
                                                <br>
                                                <input type="file" name="d1">
                                                <br><br>
                                                <div class="row">
                                                    @if($files['d1']['file'] ?? null)
                                                        <div class="col-md-12 mt-1">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <a href="{{$files['d1']['file'] ?? null}}"
                                                                           target="_blank">
                                                                            <i class="la la-eye"></i>
                                                                            {{__('tenders.view')}}
                                                                        </a>
                                                                    </td>
                                                                    <td class="has-text-left">
                                                                        @if(($files['d1']['is_approved'] ?? 'undefiend') == null)
                                                                            <span
                                                                                class="text-danger">{{__('portal.no_confirm')}}</span>
                                                                        @endif

                                                                        @if(($files['d1']['is_approved'] ?? 'undefiend') == '0')
                                                                            <span class="text-danger">{{__('portal.rejected')}}</span>
                                                                        @endif

                                                                        @if(($files['d1']['is_approved'] ?? 'undefiend') == '1')
                                                                            <span class="text-info">{{__('portal.confirmed')}}</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    @else
                                                        <div class="col-md-12 ">
                                                            <div class="notification is-warning m-2 has-text-centered ">
                                                                <strong>No Files</strong>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="offset-3 col-md-6">
                                            <div class="shadow-lg p-3 ">
                                                <h4>
                                                    <b>{{__('tenders.f2')}}
                                                        <star>*</star>
                                                    </b>
                                                </h4>
                                                @if($errors->has('d2'))
                                                    <span class="has-text-danger">({{$errors->first('d2')}})</span>
                                                @endif
                                                <br>
                                                <input type="file" name="d2">
                                                <br><br>
                                                <div class="row">
                                                    @if($files['d2']['file'] ?? null)
                                                        <div class="col-md-12 mt-1">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <a href="{{$files['d2']['file'] ?? null}}"
                                                                           target="_blank">
                                                                            <i class="la la-eye"></i>
                                                                            {{__('tenders.view')}}
                                                                        </a>
                                                                    </td>
                                                                    <td class="has-text-left">
                                                                        @if(($files['d2']['is_approved'] ?? 'undefiend') == null)
                                                                            <span
                                                                                class="text-danger">{{__('portal.no_confirm')}}</span>
                                                                        @endif

                                                                        @if(($files['d2']['is_approved'] ?? 'undefiend') == '0')
                                                                            <span class="text-danger">{{__('portal.rejected')}}</span>
                                                                        @endif

                                                                        @if(($files['d2']['is_approved'] ?? 'undefiend') == '1')
                                                                            <span class="text-info">{{__('portal.confirmed')}}</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    @else
                                                        <div class="col-md-12 ">
                                                            <div class="notification is-warning m-2 has-text-centered">
                                                                <strong>No Files</strong>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                        <div class="offset-3 col-md-6">
                                            <div class="shadow-lg p-3 ">
                                                <h4>
                                                    <b>{{__('tenders.f3')}}
                                                        <star>*</star>
                                                    </b>
                                                </h4>
                                                @if($errors->has('d3'))
                                                    <span class="has-text-danger">({{$errors->first('d3')}})</span>
                                                @endif
                                                <br>
                                                <input type="file" name="d3">
                                                <br><br>
                                                <div class="row">
                                                    @if($files['d3']['file'] ?? null)
                                                        <div class="col-md-12 mt-1">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <a href="{{$files['d3']['file'] ?? null}}"
                                                                           target="_blank">
                                                                            <i class="la la-eye"></i>
                                                                            {{__('tenders.view')}}
                                                                        </a>
                                                                    </td>
                                                                    <td class="has-text-left">
                                                                        @if(($files['d3']['is_approved'] ?? 'undefiend') == null)
                                                                            <span
                                                                                class="text-danger">{{__('portal.no_confirm')}}</span>
                                                                        @endif

                                                                        @if(($files['d3']['is_approved'] ?? 'undefiend') == '0')
                                                                            <span class="text-danger">{{__('portal.rejected')}}</span>
                                                                        @endif

                                                                        @if(($files['d3']['is_approved'] ?? 'undefiend') == '1')
                                                                            <span class="text-info">{{__('portal.confirmed')}}</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    @else
                                                        <div class="col-md-12 ">
                                                            <div class="notification is-warning m-2 has-text-centered">
                                                                <strong>No Files</strong>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                        <div class="offset-3 col-md-6">
                                            <div class="shadow-lg p-3 ">
                                                <h4>
                                                    <b>{{__('tenders.f4')}}</b>
                                                </h4>
                                                @if($errors->has('d4'))
                                                    <span class="has-text-danger">({{$errors->first('d4')}})</span>
                                                @endif
                                                <br>
                                                <input type="file" name="d4">
                                                <br><br>

                                                @if($files['d4']['file'] ?? null)
                                                    <div class="col-md-12 mt-1">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td>
                                                                    <a href="{{$files['d4']['file'] ?? null}}"
                                                                       target="_blank">
                                                                        <i class="la la-eye"></i>
                                                                        {{__('tenders.view')}}
                                                                    </a>
                                                                </td>

                                                                <td class="has-text-left">
                                                                    @if(($files['d4']['is_approved'] ?? 'undefiend') == null)
                                                                        <span
                                                                            class="text-danger">{{__('portal.no_confirm')}}</span>
                                                                    @endif

                                                                    @if(($files['d4']['is_approved'] ?? 'undefiend') == '0')
                                                                        <span class="text-danger">{{__('portal.rejected')}}</span>
                                                                    @endif

                                                                    @if(($files['d4']['is_approved'] ?? 'undefiend') == '1')
                                                                        <span class="text-info">{{__('portal.confirmed')}}</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                @else
                                                    <div class="col-md-12 ">
                                                        <div class="notification is-warning m-2 has-text-centered">
                                                            <strong>No Files</strong>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="offset-3 col-md-6">
                                            <div class="shadow-lg p-3 ">
                                                <h4>
                                                    <b>{{__('tenders.f5')}}
                                                        <star>*</star>
                                                    </b>
                                                </h4>
                                                @if($errors->has('d5'))
                                                    <span class="has-text-danger">({{$errors->first('d5')}})</span>
                                                @endif
                                                <br>
                                                <input type="file" name="d5">
                                                <br><br>

                                                @if($files['d5']['file'] ?? null)
                                                    <div class="col-md-12 mt-1">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td>
                                                                    <a href="{{$files['d5']['file'] ?? null}}"
                                                                       target="_blank">
                                                                        <i class="la la-eye"></i>
                                                                        {{__('tenders.view')}}
                                                                    </a>
                                                                </td>
                                                                <td class="has-text-left">
                                                                    @if(($files['d5']['is_approved'] ?? 'undefiend') == null)
                                                                        <span
                                                                            class="text-danger">{{__('portal.no_confirm')}}</span>
                                                                    @endif

                                                                    @if(($files['d5']['is_approved'] ?? 'undefiend') == '0')
                                                                        <span class="text-danger">{{__('portal.rejected')}}</span>
                                                                    @endif

                                                                    @if(($files['d5']['is_approved'] ?? 'undefiend') == '1')
                                                                        <span class="text-info">{{__('portal.confirmed')}}</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                @else
                                                    <div class="col-md-12 ">
                                                        <div class="notification is-warning m-2 has-text-centered">
                                                            <strong>No Files</strong>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="offset-3 col-md-6">
                                            <div class="shadow-lg p-3 ">
                                                <h4>
                                                    <b>{{__('tenders.f6')}}
                                                        <star>*</star>
                                                    </b>
                                                </h4>
                                                @if($errors->has('d6'))
                                                    <span class="has-text-danger">({{$errors->first('d6')}})</span>
                                                @endif
                                                <br>
                                                <input type="file" name="d6">
                                                <br><br>
                                                @if($files['d6']['file'] ?? null)
                                                    <div class="col-md-12 mt-1">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td>
                                                                    <a href="{{$files['d6']['file'] ?? null}}"
                                                                       target="_blank">
                                                                        <i class="la la-eye"></i>
                                                                        {{__('tenders.view')}}
                                                                    </a>
                                                                </td>
                                                                <td class="has-text-left">
                                                                    @if(($files['d6']['is_approved'] ?? 'undefiend') == null)
                                                                        <span
                                                                            class="text-danger">{{__('portal.no_confirm')}}</span>
                                                                    @endif

                                                                    @if(($files['d6']['is_approved'] ?? 'undefiend') == '0')
                                                                        <span class="text-danger">{{__('portal.rejected')}}</span>
                                                                    @endif

                                                                    @if(($files['d6']['is_approved'] ?? 'undefiend') == '1')
                                                                        <span class="text-info">{{__('portal.confirmed')}}</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                @else
                                                    <div class="col-md-12 ">
                                                        <div class="notification is-warning m-2 has-text-centered">
                                                            <strong>No Files</strong>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="offset-3 col-md-6">
                                            <div class="shadow-lg p-3 ">
                                                <h4>
                                                    <b>{{__('tenders.f7')}}
                                                        <star>*</star>
                                                    </b>
                                                </h4>
                                                @if($errors->has('d7'))
                                                    <span class="has-text-danger">({{$errors->first('d7')}})</span>
                                                @endif
                                                <br>
                                                <input type="file" name="d7">
                                                <br><br>
                                                <div class="row">
                                                    @if($files['d7']['file'] ?? null)
                                                        <div class="col-md-12 mt-1">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>
                                                                        <a href="{{$files['d7']['file'] ?? null}}"
                                                                           target="_blank">
                                                                            <i class="la la-eye"></i>
                                                                            {{__('tenders.view')}}
                                                                        </a>
                                                                    </td>
                                                                    <td class="has-text-left">
                                                                        @if(($files['d7']['is_approved'] ?? 'undefiend') == null)
                                                                            <span
                                                                                class="text-danger">{{__('portal.no_confirm')}}</span>
                                                                        @endif

                                                                        @if(($files['d7']['is_approved'] ?? 'undefiend') == '0')
                                                                            <span class="text-danger">{{__('portal.rejected')}}</span>
                                                                        @endif

                                                                        @if(($files['d7']['is_approved'] ?? 'undefiend') == '1')
                                                                            <span class="text-info">{{__('portal.confirmed')}}</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    @else
                                                        <div class="col-md-12 ">
                                                            <div class="notification is-warning m-2 has-text-centered">
                                                                <strong>No Files</strong>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 text-center mt-2">
                                            <input type="submit" id="s_btn" class="btn btn-danger"
                                                   value="تأكيد">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>


    </div>


@endsection
@section('scripts')
    {{Html::script('assets/js/jquery.fileuploader.min.js')}}
    <script>
        $(document).ready(function () {

            $('input[type="file"]').fileuploader({
                addMore: false,
                limit: 1,
                extensions: ['jpg', 'jpeg', 'png', 'pdf'],
                inputNameBrackets: true,
                captions: {
                    button: function (options) {
                        return "{{__('portal.choose')}} " + (options.limit == 1 ? " {{__('portal.file')}}" : " {{__('portal.files')}}");
                    },
                    feedback: function (options) {
                        return "{{__('portal.choose')}} " + (options.limit == 1 ? " {{__('portal.file')}}" : " {{__('portal.files')}}") + " {{__('portal.to_upload')}}";
                    }
                }
            });
        })
    </script>
@endsection
