@extends('frontEnd.frontEnd')

@section ('title', 'Address Page')

@section ('content')
<style>
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
        height: 700px;
    }
</style>
<hr>
<div id="account-edit" class="container">
    <div class="row">
            <div class="box">
                <div id="content" class="col-sm-4">   
                    @include('frontEnd.profile.menu')
                </div>
                <div id="content" class="col-sm-8">
                    <form action="{{url('updatePassword')}}" method="POST" role="form" enctype="multipart/form-data" class="form-horizontal">
                         <input type="hidden" name="_token" value="{{csrf_token()}}">
                         <input type="hidden" name="_method" value="PUT">
 
                            <fieldset>
                                <legend>Update Your Password : {{ucwords(auth()->user()->getUserName())}}</legend>
                                <div>
                                    @if(session('msg'))
                                        <div class="alert alert-info">{{session('msg')}}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="oldPassword">Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="oldPassword" name="oldPassword" id="oldPassword" placeholder="Old Password" class="form-control">
                                        @error('oldPassword')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="newPassword">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="newPassword" name="newPassword" id="newPassword" placeholder="New Password" class="form-control">
                                        @error('newPassword')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </fieldset>
                        
                        <div class="buttons clearfix">
                            <div class="pull-left"><a href="{{'/profile'}}" class="btn btn-primary">Back</a></div>
                            <div class="pull-right">
                                <a type="submit" value="Continue" class="btn btn-primary">Continue</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection