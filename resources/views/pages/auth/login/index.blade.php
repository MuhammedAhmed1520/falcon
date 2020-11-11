@extends('layouts.auth')

@section('styles')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <style>
        body, html {
            height: 100%
        }

        body {
            background: #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto
        }

        #signin {
            width: 330px;
            max-width: 95%;
            background: #fff;
            margin: 20px;
            box-shadow: 0 0 64px rgba(0, 0, 0, .5);
            padding: 60px;
            position: relative;
            overflow: hidden
        }

        #signin .form-title {
            font: 500 16px/1 Roboto, sans-serif;
            color: #000;
            text-align: center;
            margin: 35px 0
        }

        #signin .input-field {
            position: relative;
            height: 50px;
            margin: 35px 0 5px;
            transition: all .3s
        }

        .text-danger {
            color: #721c24;
        }

        #signin .input-field i {
            position: absolute;
            bottom: 28px;
            left: 15px;
            color: #BBB;
            height: 0;
            visibility: hidden;
            font-size: 100%;
            transition: height 250ms
        }

        #signin .input-field label {
            width: 100%;
            height: 100%;
            position: absolute;
            margin-top: 20px;
            left: 4px;
            font: 400 16px/1 Roboto, sans-serif;
            color: #000;
            opacity: 1;
            transition: all .3s
        }

        #signin .input-field input {
            width: calc(100% - 70px);
            height: 4px;
            font: 500 16px/1 Roboto, sans-serif;
            padding: 0 20px 0 50px;
            border: none;
            box-shadow: 0 10px 10px rgba(0, 0, 0, .25);
            color: #fff;
            background: #2b477b;
            border-radius: 6px;
            outline: 0;
            overflow: hidden;
            position: absolute;
            bottom: 0;
            left: 0;
            transition: all .3s
        }

        #signin .check, #signin .login {
            width: 100%;
            background: linear-gradient(350deg, #12529d, #2b477b);
            position: absolute;
            left: 0
        }

        #signin .forgot-pw {
            font: 600 14px/1 Roboto, sans-serif;
            color: #1447a5;
            text-decoration: none;
            float: right;
            margin: 0 0 25px;
            display: block
        }

        #signin .login {
            min-height: 15px;
            text-align: center;
            text-decoration: none;
            font: 500 16px/1 Roboto, sans-serif;
            padding: 20px;
            display: block;
            color: #FFF;
            border: none;
            outline: 0;
            cursor: pointer;
            bottom: 0
        }

        #signin .check {
            height: 100%;
            top: 100%;
            text-align: center;
            visibility: hidden;
            transition: all 1s
        }

        #signin .check.in {
            visibility: visible;
            top: 0
        }

        #signin .check i {
            color: #FFF;
            font-size: 64px;
            line-height: 7.4
        }

        #signin .input-field input:focus {
            color: #eee
        }

        #signin .input-field input.not-empty, #signin .input-field input:focus {
            height: auto;
            padding: 14px 20px 14px 50px
        }

        #signin .input-field input.not-empty + i, #signin .input-field input:focus + i {
            font-size: 24px;
            bottom: 26px;
            height: 10px;
            visibility: visible
        }

        #signin .input-field input.not-empty + i + label, #signin .input-field input:focus + i + label {
            font-size: 12px;
            margin-top: -15px;
            opacity: .7;
            animation: label .3s 1
        }

        @keyframes label {
            0%, 100% {
                margin-top: -15px
            }
            50% {
                margin-top: -25px
            }
        }

        #gif {
            width: 50%
        }

        #gif a img {
            max-width: 100%;
            box-shadow: 0 0 64px rgba(0, 0, 0, .5)
        }
        .active-dir{
            /*padding: 10px;*/
            /*color: #FFF;*/
            background-color: #1b4e91;
            /*border: 1px solid #CCC;*/
            border-radius: 10px;
            min-height: 15px;
            text-align: center;
            text-decoration: none;
            font: 500 16px/1 Roboto, sans-serif;
            padding: 15px;

            color: #FFF;
            border: none;
            outline: 0;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    @include('pages.auth.login.templates.content')
@endsection

@section('scripts')
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script>
        $("input").on('focusout', function () {
            $(this).each(function (i, e) {
                if ($(e).val() != "") {
                    $(e).addClass('not-empty');
                } else {
                    $(e).removeClass('not-empty');
                }
            });
        });

        $(".login").on('click', function () {
            $(this).animate({
                fontSize: 0
            }, 300, function () {
                $(".check").addClass('in');
            });
        });
    </script>
@endsection
