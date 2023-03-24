@extends('frontEnd.frontEnd')

@section('content')
<style type="text/css">

    .well {
        border: 1px solid #eeeeee;
        box-shadow: none;
        margin-bottom: 20px;
        min-height: 20px;
        padding: 19px;
        border-radius: 0;
    }
    .well {
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
        box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
    }
    #content h3 {
        letter-spacing: 0;
        line-height: 24px;
        margin-bottom: 0px;
        color: #696969;
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 20px;
        text-transform: uppercase;
        padding: 0 0 10px;
    }
    h3 {
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 24px !important;
        padding: 0px 0px 10px;
    }
    .strong {
        color: #696969;
    }
    label {
        font-size: 14px;
        font-weight: normal;
    }
    body {
        color: #000;
        font-family: "Istok Web",sans-serif;
        font-size: 14px;
        font-weight: 400;
        letter-spacing: 0.6px;
    }
    .btn-primary, #cart .text-right .addtocart, #cart .text-right .checkout, .btn-default, #button-cart, .button.aboutus, .btn-info {
        background: none repeat scroll 0 0 #fdb913;
        border: medium none;
        color: #ffffff;
        display: inline-block;
        font-size: 14px;
        font-weight: normal;
        padding: 10px 12px;
        text-transform: uppercase;
        width: auto;
        height: auto;
        border-radius: 0;
        line-height: normal;
    }

    .form-control {
        display: block;
        width: 100%;
        height: auto;
        padding: 7px 12px;
        font-size: 14px;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #eee;
        border-radius: 0;
        box-shadow: none;
    }

    .appl{
        height: auto;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="well">
                <h3>{{ __('Verify Your Email Address') }}</h3>

                <div class="box-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
