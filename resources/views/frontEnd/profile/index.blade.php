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
<div id="account-edit" class="container ">
    <div class="row">
            <div class="box">
                <div id="content" class="col-sm-4">   
                    @include('frontEnd.profile.menu')
                </div>
                <div id="content" class="col-sm-8">
               
                <form  action="{{url('updateAccount')}}" method="POST" role="form" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">  
                            <fieldset>
                                <legend>Your Personal Details : {{ucwords(auth()->user()->getUserName())}}</legend>
                                <div>
                                    @if(session('msg'))
                                        <div class="alert alert-info">{{session('msg')}}</div>
                                    @endif
                                </div>

                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="name">First Name </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{auth()->user()->name}}" placeholder="First Name" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="lname">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="lname" value="{{auth()->user()->lname}}" placeholder="Last Name" id="lname" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="email">E-Mail</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" value="{{auth()->user()->email}}" placeholder="E-Mail" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group required">
                                    <label class="col-sm-2 control-label" for="phone">Telephone</label>
                                    <div class="col-sm-10">
                                        <input type="tel" name="phone" value="{{auth()->user()->phone}}" placeholder="Telephone" id="phone" class="form-control">
                                    </div>
                                </div>
                    
                            </fieldset>
                        
                        <div class="buttons clearfix">
                            <div class="pull-left"><a href="{{'/profile'}}"  class="btn btn-primary">Back</a></div>
                            <div class="pull-right">
                                <button type="submit" value="Continue" class="btn btn-primary">Continue</button>
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