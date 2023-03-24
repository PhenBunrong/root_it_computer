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

<hr>
<div class="container appl" id="content">
    <div class="row">
        <div class="col-sm-6">
            <div class="well">
                <h3>New Customer</h3>
                <p><strong class="strong">Register Account</strong></p><hr>
                <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                <br><a href="{{ route('register') }}" class="btn btn-primary">Continue</a>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="well">
                <h3>Returning Customer</h3>
                <p><strong class="strong">I am a returning customer</strong></p><hr>
                <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label" for="input-email">E-Mail Address</label>
                        <input type="text" name="email" value="" placeholder="E-Mail Address" id="input-email" class="form-control">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="input-password">Password</label>
                        <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            <a href="{{ route('password.request') }}">Forgotten Password</a>
                    </div>
                        <input type="submit" value="Login" class="btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
